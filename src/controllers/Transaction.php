<?php

use Olive\controllers\Controller;
use Olive\infrastructure\ContryRepo;
use Olive\infrastructure\StateRepo;
use Olive\infrastructure\TransactionRepo;
use Olive\infrastructure\SettlementRepo;
use Olive\infrastructure\PriceRepo;
use Olive\infrastructure\RequisitionRepo;
use Olive\infrastructure\ClientRepo;
use Olive\infrastructure\TownshipRepo;
use Olive\infrastructure\AttributeRepo;
use Olive\infrastructure\DataRequisitionRepo;
use \Upload\Storage\FileSystem;
use \Upload\File;

class Transaction extends Controller
{
	const RECIVER = 1;
	const NO_RECIVER = 0;

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

	
	function __construct()
	{
		parent::__construct();
		$this->stateRepo = new StateRepo();
		$this->contryRepo = new ContryRepo();
		$this->transactionRepo = new TransactionRepo();
		$this->settlementRepo = new SettlementRepo();
		$this->priceRepo = new PriceRepo();
		$this->requisitionRepo = new RequisitionRepo();
		$this->clientRepo = new ClientRepo();
		$this->townshipRepo = new TownshipRepo();
		$this->attributeRepo = new AttributeRepo();
		$this->dataRequisitionRepo = new DataRequisitionRepo();
	}

	public function showFormTransaction($req, $res)
	{
		$codeContry = strtolower($req->params['code_contry']);
		$states = $this->stateRepo->getStatesByContry($codeContry);
		$contries = $this->contryRepo->all();
		$transaction = $this->transactionRepo->findBySlug($req->params['slug']);

		$template = 'Transaction.' . $codeContry . '_' . str_replace('-', '_', $req->params['slug']);
		$templateFields = 'Transaction.fieldsForms.' . $codeContry . '_' . str_replace('-', '_', $req->params['slug']);
		
		return $this->renderView($res, $template, compact('states', 'contries', 'templateFields', 'transaction', 'codeContry'));
	}

	public function saveTrancaction($req, $res)
	{
		// Para guardar el archivo si es que trae.
		$data = $req->data;

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
		$price = $this->priceRepo->getPrice($data['attr_estado'], $data['id_transaction']);
		$newRequisition = new Olive\models\Requisition();
		$newRequisition->id_transaction = $data['id_transaction'];
		$newRequisition->id_price = $price->id;
		$newRequisition->total_cost = $data['attr_total'];
		$newRequisition->status = 'pending';
		$newRequisition->message = $data['attr_mensaje'];
		
		if (isset($data['cb_reciver'])) {
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
			// Para las pruebas se pondra por defecto 1
			$newClient->id_settlement = ($settlemetn) ? $settlemetn->id : 1;
			$newClient->id_township = $settlemetn->id_township;
			$newClient->id_state = $data['hold_estado'];
			$newClient->id_contry = $data['hold_pais'];
			$newClient->reference = $data['hold_referencia'];
			$newClient->is_reciver = self::RECIVER;

			if ($client = $this->clientRepo->save($newClient)) {
				$newRequisition->id_client = $client->id;
				$newRequisition->id_reciver = $client->id;
			} else {
				$this->session->set('errors_solicitante_envio', $this->clientRepo->getErrors());
				$this->session->setFlash("alert", ["message" => "Error en los datos de la persona que lo solicita y que lo recive", "status" => "Error:", "class" => "alert-danger"]);
	            header('Location: /tramites/'.$req->params['code_contry'].'/' . $req->params['slug']);
	            exit();
			}
		} else {
			$hold_settlemetn = $this->settlementRepo->getSettlementByZipCode($data['hold_cp']);
			$newHold = new Olive\models\Client();
			$newHold->first_name = $data['hold_name'];
			$newHold->middle_name = $data['hold_paterno'];
			$newHold->last_name = $data['hold_materno'];
			$newHold->email = $data['hold_email'];
			$newHold->telephone = $data['hold_tel'];
			$newHold->mobile = $data['hold_mobil'];
			$newHold->address = $data['hold_calle'];
			$newHold->num_inside = $data['hold_num_int'];
			$newHold->num_extern = $data['hold_num_ext'];
			// Para las pruebas se pondra por defecto 1
			$newHold->id_settlement = ($hold_settlemetn) ? $hold_settlemetn->id : 1;
			$newHold->id_township = $hold_settlemetn->id_township;
			$newHold->id_state = $data['hold_estado'];
			$newHold->id_contry = $data['hold_pais'];
			$newHold->reference = $data['hold_referencia'];
			$newHold->is_reciver = self::NO_RECIVER;

			if ($hold = $this->clientRepo->save($newHold)) {
				$newRequisition->id_client = $hold->id;
			} else {
				$this->session->set('errors_solicitante', $this->clientRepo->getErrors());
				$this->session->setFlash("alert", ["message" => "Error al agregar los datos de la persona que lo solicita", "status" => "Error:", "class" => "alert-danger"]);
	            header('Location: /tramites/'.$req->params['code_contry'].'/' . $req->params['slug']);
	            exit();
			}

			$reciver_settlemetn = $this->settlementRepo->getSettlementByZipCode($data['reciv_cp']);
			$newReciver = new Olive\models\Client();
			$newReciver->first_name = $data['reciv_name'];
			$newReciver->middle_name = $data['reciv_paterno'];
			$newReciver->last_name = $data['reciv_materno'];
			$newReciver->email = $data['reciv_email'];
			$newReciver->telephone = $data['reciv_tel'];
			$newReciver->mobile = $data['reciv_mobil'];
			$newReciver->address = $data['reciv_calle'];
			$newReciver->num_inside = $data['reciv_num_int'];
			$newReciver->num_extern = $data['reciv_num_ext'];
			// Para las pruebas se pondra por defecto 1
			$newReciver->id_settlement = ($reciver_settlemetn) ? $reciver_settlemetn->id : 1;
			$newReciver->id_township = $reciver_settlemetn->id_township;
			$newReciver->id_state = $data['reciv_estado'];
			$newReciver->id_contry = $data['reciv_pais'];
			$newReciver->reference = $data['reciv_referencia'];
			$newReciver->is_reciver = self::NO_RECIVER;

			if ($reciver = $this->clientRepo->save($newReciver)) {
				$newRequisition->id_reciver = $reciver->id;
			} else {
				$this->session->set('errors_recive', $this->clientRepo->getErrors());
				$this->session->setFlash("alert", ["message" => "Error al agregar los datos de la persona que lo recive", "status" => "Error:", "class" => "alert-danger"]);
	            header('Location: /tramites/'.$req->params['code_contry'].'/' . $req->params['slug']);
	            exit();
			}
		}
		
		if(!$requisition = $this->requisitionRepo->save($newRequisition)) {
			$this->session->set('errors_tramite', $this->requisitionRepo->getErrors());
			$this->session->setFlash("alert", ["message" => "No se pudo completar tu tramite", "status" => "Error:", "class" => "alert-danger"]);
            header('Location: /tramites/'.$req->params['code_contry'].'/' . $req->params['slug']);
            exit();
		}
		
		$attrbs = array_filter($data, function($val, $key) {
			return (substr($key, 0,4) == 'attr');
		}, ARRAY_FILTER_USE_BOTH);

		$attrNoInserted = array();
		foreach ($attrbs as $key => $attr) {
			if ($key != 'attr_mensaje' && $key != 'attr_total'){
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
			if (isset($data['cb_reciver'])) {
				$c = $r = $client->toArray();
				$c['date_created'] = $c['date_created']->format('Y-m-d');
				$r['date_created'] = $r['date_created']->format('Y-m-d');
			} else {
				$c = $hold->toArray();
				$c['date_created'] = $c['date_created']->format('Y-m-d');
				$r = $reciver->toArray();
				$r['date_created'] = $r['date_created']->format('Y-m-d');
			}

			// $r = array_map(function ($clie) {
			// 		$date = new DateTime($clie['date_created']);
			// 		$clie['date_created'] = $date->format('Y-m-d');
			// 		return $clie;
			// 	}, $reciver->toArray());
			// $usersList = ['info@gestoresenmexico.com', 'ataquevisual@gmail.com', 'klonate@gmail.com'];
			$usersList = ['klonate@gmail.com'];
			foreach ($usersList as $user) {
				$this->mailer($res, ['usuario' => $user, 'subject' => 'Nuevo Tramite', 'data' => $requisition, 'requisition' => $dataRequisition, 'client' => $c, 'reciver' => $r], 'Emails.email_admins');
			}
			$rs = new stdClass();
			$rs->message = "Tu tramite sé ha completado. En breve te llegara un correo con la clave y datos de tu registro.";
			$rs->status = "Exito:";
			$this->session->set("requisition_result", $rs);
            header('Location: /gracias');
            exit();
		}


	}
}