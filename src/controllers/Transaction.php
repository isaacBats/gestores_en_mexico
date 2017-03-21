<?php

use Olive\controllers\Controller;
use Olive\infrastructure\ContryRepo;
use Olive\infrastructure\StateRepo;

class Transaction extends Controller
{
	private $stateRepo;
	private $contryRepo;
	
	function __construct()
	{
		parent::__construct();
		$this->stateRepo = new StateRepo();
		$this->contryRepo = new ContryRepo();
	}

	public function show($req, $res)
	{
		$states = $this->stateRepo->all();
		$contries = $this->contryRepo->all();
		
		$template = 'Transaction.' . strtolower($req->params['code_contry']) . '_' . str_replace('-', '_', $req->params['slug']);
		$templateFields = 'Transaction.fieldsForms.' . strtolower($req->params['code_contry']) . '_' . str_replace('-', '_', $req->params['slug']);
		
		return $this->renderView($res, $template, compact('states', 'contries', 'templateFields'));
	}
}