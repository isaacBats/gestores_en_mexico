<?php

use Olive\controllers\Controller;
use Olive\infrastructure\ContryRepo;
use Olive\infrastructure\StateRepo;
use Olive\infrastructure\TransactionRepo;
use Olive\infrastructure\SettlementRepo;
use \Upload\Storage\FileSystem;
use \Upload\File;

class Transaction extends Controller
{
	const RECIVER = 1;
	const NO_RECIVER = 0;

	private $stateRepo;
	private $contryRepo;
	private $transactionRepo;
	private $settlementRepo;

	
	function __construct()
	{
		parent::__construct();
		$this->stateRepo = new StateRepo();
		$this->contryRepo = new ContryRepo();
		$this->transactionRepo = new TransactionRepo();
		$this->settlementRepo = new SettlementRepo();
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

			} catch (\Exception $e) {

			    $errorsFile = $file->getErrors();
			}
		}

		if (isset($data['cb_reciver'])) {
			$settlemetn = $this->settlementRepo->getSettlementByZipCode($data['hold_cp']);
			$client = new Olive\models\Client();
			$client->first_name = $data['hold_name'];
			$client->middle_name = $data['hold_paterno'];
			$client->last_name = $data['hold_materno'];
			$client->email = $data['hold_email'];
			$client->telephone = $data['hold_tel'];
			$client->mobile = $data['hold_mobil'];
			$client->address = $data['hold_calle'];
			$client->num_inside = $data['hold_num_int'];
			$client->num_extern = $data['hold_num_ext'];
			// Para las pruebas se pondra por defecto 1
			$client->id_settlement = ($settlemetn) ? $settlemetn->id : 1;
			$client->id_township = $data['hold_municipio'];
			$client->id_state = $data['hold_estado'];
			$client->id_contry = $data['hold_pais'];
			$client->reference = $data['hold_referencia'];
			$client->is_reciver = self::RECIVER;
		}

		
		echo '<pre>'; print_r([ 'data' => $req->data, 'files' => $_FILES, 'file' => $file, 'error' => $errors]); exit;
	}
}