<?php

use Olive\controllers\Controller;
use Olive\models\Requisition;
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
		$limit = isset($req->data['numpp']) ? $req->data['numpp'] : 10;
        $page = isset($req->data['page']) ? ($req->data['page'] * $limit) - $limit : 0;

		$this->addBread(['label' => 'Lista de tramites']);
        $status = Requisition::fields()['status']['options'];
        $where = array();

        
        $all = $this->requisitionRepo->where($where);
        $requisitions = $all->order(['id' => 'DESC'])->limit($limit)->offset($page);
        $count = $all->count();
        dump(['count' => $count, 'all' => $all->toArray(), 'requisitions' => $requisitions->toArray(), 'where' => $where]);
        $end = ($page + $limit >= $count) ? $count : $page + $limit;

        return $this->renderView($res, 'Requisition.listar', compact('requisitions', 'status', 'page', 'count', 'end'));
	}

	public function detailRequisition($req, $res)
	{
		$this->addBread(['url' => '/admin/tramites', 'label' => 'Lista de tramites']);
		$this->addBread(['label' => 'Detalle']);
		
		$requisition = $this->requisitionRepo->get($req->params['id']);
		$delivery_max = $requisition->price->delivery_max;

		$options = $requisition->fields()['status']['options'];
		$fecha_entrega = gmdate('d-m-Y',strtotime('+'.$delivery_max.' day', $requisition->date_created->getTimestamp()));

		$attributesController = new AttributesController();
		$attributes = $attributesController->getAttributesByRequisition($requisition->id);
		
		return $this->renderView($res, 'Requisition.detail', compact('requisition', 'options', 'fecha_entrega', 'attributes'));
		
	}

	/**
	 * Update the requisition in Administrator page
	 * @param  Object $req 
	 * @param  Object $res 
	 * @return Redirect to request
	 */
	public function update($req, $res)
	{
		$id = $req->params['id'];
		$requisition = $this->requisitionRepo->get($id);
		$requisition->status = $req->data['status'];
		$requisition->messeger = $req->data['attr_mensajeria'];
		$requisition->guia = $req->data['attr_guia'];
		$requisition->date_sender = new DateTime($req->data['fecha_entrega']);
		
		try {
			$this->requisitionRepo->update($requisition);
            $this->session->setFlash('alert', ['message' => 'Se ha actualizado con exito.', 'class' => 'alert-info']);
		} catch (Spot\Exception $e) {
            $this->session->setFlash("alert", ["message" => $e->getMessage(), "class" => "alert-warning"]);
		}
        header('Location: ' . $_SERVER['HTTP_REFERER']);
		
	}
}