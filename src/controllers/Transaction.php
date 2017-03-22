<?php

use Olive\controllers\Controller;
use Olive\infrastructure\ContryRepo;
use Olive\infrastructure\StateRepo;
use Olive\infrastructure\TransactionRepo;

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
		$states = $this->stateRepo->all();
		$contries = $this->contryRepo->all();
		$transaction = $this->transactionRepo->findBySlug($req->params['slug']);

		$template = 'Transaction.' . strtolower($req->params['code_contry']) . '_' . str_replace('-', '_', $req->params['slug']);
		$templateFields = 'Transaction.fieldsForms.' . strtolower($req->params['code_contry']) . '_' . str_replace('-', '_', $req->params['slug']);
		
		return $this->renderView($res, $template, compact('states', 'contries', 'templateFields', 'transaction'));
	}

	public function saveTrancaction($req, $res)
	{
		var_dump($req); exit;
	}
}