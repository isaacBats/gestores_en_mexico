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

	public function detailRequisition($req, $res)
	{
		$this->addBread(['url' => '/admin/tramites', 'label' => 'Lista de tramites']);
		$this->addBread(['label' => 'Detalle']);
		
		$requisition = $this->requisitionRepo->get($req->params['id']);
		$options = $requisition->fields()['status']['options'];
		
		return $this->renderView($res, 'Requisition.detail', compact('requisition', 'options'));
		
	}
}