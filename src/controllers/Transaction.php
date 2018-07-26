<?php
/*
 * This file is part of AtaqueVisual.
 *
 * (c) Isaac Daniel Batista <@codeisaac>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Olive\controllers\Controller;
use Olive\infrastructure\AttributeRepo;
use Olive\infrastructure\ContryRepo;
use Olive\infrastructure\CmsOptionRepo;
use Olive\infrastructure\ClientRepo;
use Olive\infrastructure\DataRequisitionRepo;
use Olive\infrastructure\FormRepo;
use Olive\infrastructure\PriceRepo;
use Olive\infrastructure\RequisitionRepo;
use Olive\infrastructure\SettlementRepo;
use Olive\infrastructure\StateRepo;
use Olive\infrastructure\TownshipRepo;
use Olive\infrastructure\TransactionRepo;
use \Upload\Storage\FileSystem;
use \Upload\File;

class Transaction extends Controller
{
	const RECIVER = 1;
	const NO_RECIVER = 0;
	const ACTIVE = 1;
	const INACTIVE = 0;

	private $dataRequisitionRepo;
	private $requisitionRepo;
	private $transactionRepo;
	private $settlementRepo;
	private $attributeRepo;
	private $townshipRepo;
	private $contryRepo;
	private $clientRepo;
	private $stateRepo;
	private $priceRepo;
	private $formRepo;
	private $cmsOptionRepo;
	private $clientController;

	
	function __construct()
	{
		parent::__construct();
		$this->dataRequisitionRepo = new DataRequisitionRepo();
		$this->stateRepo = new StateRepo();
		$this->contryRepo = new ContryRepo();
		$this->transactionRepo = new TransactionRepo();
		$this->settlementRepo = new SettlementRepo();
		$this->priceRepo = new PriceRepo();
		$this->requisitionRepo = new RequisitionRepo();
		$this->clientRepo = new ClientRepo();
		$this->townshipRepo = new TownshipRepo();
		$this->attributeRepo = new AttributeRepo();
		$this->formRepo = new FormRepo();
		$this->cmsOptionRepo = new CmsOptionRepo();
		$this->clientController = new Client();
	}

	public function showFormTransaction($req, $res)
	{
		$codeContry = strtolower($req->params['code_contry']);
		$states = $this->stateRepo->getStatesByContry($codeContry);
		$contries = $this->contryRepo->where(['is_active' => self::ACTIVE]);
		$transaction = $this->transactionRepo->findBySlug($req->params['slug']);
		$costo = null;

		if($transaction->code_product == 'SERV_CER_LIBGRAV' || $transaction->code_product == 'SERV_DOC_FOLCDMX') {
			foreach ($transaction->price as $price) {
				if($price->id_state == 9)
					$costo = $price;
			}
		}
		$slugReplace = str_replace('-', '_', $req->params['slug']);
		$fields = "Transaction.{$codeContry}_{$slugReplace}";
		$arch = __OLIVE__ . '/views/' . str_replace('.', '/', $fields) . '.blade.php';
		if (file_exists($arch)) {
			return $this->renderView($res, 'layouts.template_forms_transactions', compact('states', 'contries', 'fields', 'transaction', 'codeContry', 'costo'));
		} else {
			return $this->renderView($res, 'Errors.404', ['error' => 'No se encontro el formulario']);
		}
		
	}

	public function saveTrancaction($req, $res)
	{
		// Para guardar el archivo si es que trae.
		$data = $req->data;
		if (isset($_FILES['attr_image'])) {
			if ($_FILES['attr_image']['error'] == 0 ) {
				$storage = new FileSystem(__ASSETS__.'storage');
				$file = new File('attr_image', $storage);
				$file->setName($file->getName().'_'.uniqid());
				$file->addValidations(array(
				    new \Upload\Validation\Mimetype(['image/png', 'image/jpeg', 'image/jpg', 'image/gif']),
				    new \Upload\Validation\Size('5M')
				));
				try {
				    
				    $file->upload();
				$data['attr_image'] = '/assets/storage/'.$file->getNameWithExtension();

				} catch (\Exception $e) {

				    $errorsFile = $file->getErrors();
				}
			}
		}
		$price = $this->priceRepo->getPrice($data['attr_estado'], $data['id_transaction']);
		$newRequisition = new Olive\models\Requisition();
		$newRequisition->id_transaction = $data['id_transaction'];
		$newRequisition->id_price = $price->id;
		$newRequisition->total_cost = $data['attr_total'];
		$newRequisition->status = 'solicitud';
		$newRequisition->message = $data['attr_mensaje'];
		
		$settlemetn = $this->settlementRepo->getSettlementByZipCode($data['hold_cp']);
		$newClient = new Olive\models\Client();
		$newClient->first_name = $data['hold_name'];
		$newClient->middle_name = $data['hold_paterno'];
		$newClient->last_name = $data['hold_materno'];
		$newClient->email = $data['hold_email'];
		$newClient->telephone = $data['hold_tel'];
		$newClient->mobile = $data['hold_mobil'];
		$newClient->address = $data['hold_calle'];
		$newClient->num_inside = $data['hold_num_int'];
		$newClient->num_extern = $data['hold_num_ext'];
		$newClient->settlement = $data['hold_colonia'];
		$newClient->township = $data['hold_municipio'];
		$newClient->zip_code = $data['hold_cp'];
		$newClient->id_state = $data['hold_estado'];
		$newClient->id_contry = $data['hold_pais'];
		$newClient->reference = $data['hold_referencia'];
		
		$client = $this->clientRepo->save($newClient);
		
		if ($client) {
			$newRequisition->id_client = $client->id;
			$newRequisition->id_reciver = $client->id;
		} else {
			$this->session->set('errors_solicitante_envio', $this->clientRepo->getErrors());
			$this->session->setFlash("alert", ["message" => "Error en los datos de la persona que lo solicita", "status" => "Error:", "class" => "alert-danger"]);
            header('Location: /tramites/'.$req->params['code_contry'].'/' . $req->params['slug']);
            exit();
		}
		
		if(!$requisition = $this->requisitionRepo->save($newRequisition)) {
			$error = $this->requisitionRepo->getErrors();
			$this->session->set('errors_tramite', $error);
			$this->session->setFlash("alert", ["message" => "No se pudo completar tu tramite", "status" => "Error:", "class" => "alert-danger"]);
            header('Location: /tramites/'.$req->params['code_contry'].'/' . $req->params['slug']);
            exit();
		}
		
		$attrbs = array_filter($data, function($val, $key) {
			return (substr($key, 0,4) == 'attr');
		}, ARRAY_FILTER_USE_BOTH);

		$attrNoInserted = array();
		foreach ($attrbs as $key => $attr) {
			if ($key != 'attr_mensaje' && $key != 'attr_total' && $attr != ''){
				if(!$attribute = $this->attributeRepo->findByName($key)) {
					$newAttribute = new Olive\models\Attribute();
					$newAttribute->attribute = $key;
					$attribute = $this->attributeRepo->save($newAttribute);
				}

				$newDataRequisition = new Olive\models\DataRequisition();
				$newDataRequisition->id_requisition = $requisition->id;
				$newDataRequisition->id_attribute = $attribute->id;
				$newDataRequisition->value = $attr;
				if(!$dataRequisition = $this->dataRequisitionRepo->save($newDataRequisition)) {
					array_push($attrNoInserted, $newDataRequisition);
				}
			}
		}
		if(sizeof($attrNoInserted) > 0) {
			$this->session->setFlash("alert", ["message" => "No se pudo completar tu tramite. Intentalo en unos minutos", "status" => "Error:", "class" => "alert-danger"]);
            header('Location: /tramites/'.$req->params['code_contry'].'/' . $req->params['slug']);
            exit();	
		} else {
			$c = $r = $this->clientController->getMap($client);
			// Admin List contacts
			$usersList = ['info@gestoresenmexico.com', 'ataquevisual@gmail.com', 'klonate@gmail.com', 'jm217938@hotmail.com'];
			// $usersList = ['klonate@gmail.com'];
			$attributesController = new AttributesController();
			$attributes = $attributesController->getAttributesByRequisition($requisition->id);
			foreach ($usersList as $user) {
				$this->mailer($res, ['usuario' => $user, 'subject' => 'Nuevo Tramite', 'data' => $requisition, 'requisition' => $dataRequisition, 'client' => $c, 'attributes' => $attributes], 'Emails.email_admins');
			}

			// List users reciver
			$infoBank = null;
			if ($infoBank = $this->cmsOptionRepo->where(['name' => 'account_bank'])->first()) {
				$unserialize = unserialize($infoBank->value);
				$infoBank = $unserialize['infoBank'];
			}
			$this->mailer($res, ['usuario' => $client->email, 'subject' => 'Confirmación de solicitud de trámite', 'data' => $requisition, 'client' => $c, 'infoBank' => $infoBank], 'Emails.email_confirmation');

			$rs = new stdClass();
			$rs->message = "Tu tramite sé ha completado. En breve te llegara un correo con la clave y datos de tu registro.";
			$rs->status = "Exito:";
			$this->session->set("requisition_result", $rs);
            header('Location: /gracias');
            exit();
		}


	}
}