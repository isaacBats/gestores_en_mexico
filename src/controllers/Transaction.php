<?php

use Olive\controllers\Controller;
use Olive\infrastructure\ContryRepo;
use Olive\infrastructure\StateRepo;
use Olive\infrastructure\TransactionRepo;
use \Upload\Storage\FileSystem;
use \Upload\File;

class Transaction extends Controller
{
	private $stateRepo;
	private $contryRepo;
	private $transactionRepo;
	
	function __construct()
	{
		parent::__construct();
		$this->stateRepo = new StateRepo();
		$this->contryRepo = new ContryRepo();
		$this->transactionRepo = new TransactionRepo();
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

		    $errors = $file->getErrors();
		}

		
		
		echo '<pre>'; print_r([ 'data' => $req->data, 'files' => $_FILES, 'file' => $file, 'error' => $errors]); exit;
	}
}