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
        $requisitions = $this->requisitionRepo->all()->order(['id' => 'DESC']);
        return $this->renderView($res, 'Requisition.listar', compact('requisitions'));
	}

	public function detailRequisition($req, $res)
	{
		$this->addBread(['url' => '/admin/tramites', 'label' => 'Lista de tramites']);
		$this->addBread(['label' => 'Detalle']);
		
		$requisition = $this->requisitionRepo->get($req->params['id']);
		$delivery_max = $requisition->price->delivery_max;

		$options = $requisition->fields()['status']['options'];
		$fecha_entrega = gmdate('d-m-Y',strtotime('+'.$delivery_max.' day', $requisition->date_created->getTimestamp()));
		
		return $this->renderView($res, 'Requisition.detail', compact('requisition', 'options'));
		
	}

	public function update($req, $res)
	{
		$id = $req->params['id'];
		$requisition = $this->requisitionRepo->get($id);
		$requisition->status = $req->data['status'];
		
		try {
			$this->requisitionRepo->update($requisition);
            $this->session->setFlash('alert', ['message' => 'Se ha actualizado con exito.', 'class' => 'alert-info']);
		} catch (Spot\Exception $e) {
            $this->session->setFlash("alert", ["message" => $e->getMessage(), "class" => "alert-warning"]);
		}
        header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}
}