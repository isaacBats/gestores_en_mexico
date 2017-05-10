<?php
use Olive\controllers\Controller;
use Olive\infrastructure\RequisitionRepo;
/**
* Requisition Controller
*/
class RequisitionController extends Controller
{
	private $requisitionRepo;
	
	function __construct()
	{
		parent::__construct();
		$this->requisitionRepo = new RequisitionRepo();
	}
	
	public function showRequisitions($req, $res)
	{
		$this->addBread(['label' => 'Lista de tramites']);
        $requisitions = $this->requisitionRepo->all();
        return $this->renderView($res, 'Requisition.listar', compact('requisitions'));
	}
}