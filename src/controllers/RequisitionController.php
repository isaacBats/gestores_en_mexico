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
use Olive\models\Requisition;
use Olive\infrastructure\RequisitionRepo;
use Olive\infrastructure\ClientRepo;
/**
* Requisition Controller
*/
class RequisitionController extends Controller
{
	private $requisitionRepo;
	private $clientRepo;
	
	function __construct()
	{
		parent::__construct();
		$this->requisitionRepo = new RequisitionRepo();
		$this->clientRepo = new ClientRepo();
	}
	
	public function showRequisitions($req, $res)
	{
		$limit = isset($req->data['numpp']) ? $req->data['numpp'] : 10;
        $page = isset($req->data['page']) ? ($req->data['page'] * $limit) - $limit : 0;
        $fstatus = isset($req->data['status']) ? $req->data['status'] : '';
        $desde = isset($req->data['desde']) ? $req->data['desde'] : '';
        $hasta = isset($req->data['hasta']) ? $req->data['hasta'] : '';
        $buscar = isset($req->data['buscar']) ? $req->data['buscar'] : '';

		$this->addBread(['label' => 'Lista de tramites']);
        $status = Requisition::fields()['status']['options'];
        $where = array();

        if(!empty($fstatus)) {
        	if($fstatus != 'todos')
        		$where['status'] = $fstatus;
        }

        if(!empty($desde)) {
        	$fdesde = new DateTime($desde);
        	$where['date_created >='] = $fdesde->format('Y-m-d');
        }

        if(!empty($hasta)) {
        	$fhasta = new DateTime($hasta);
        	$where['date_created <='] = $fhasta->format('Y-m-d');
        }

        if (!empty($buscar)) {
        	$buscar = strtolower($buscar);
        	if(substr($buscar, 0, 3) == 'ge-') {
        		$id = substr($buscar, 3);
        		$where['id'] = $id;
        	} elseif (filter_var($buscar, FILTER_VALIDATE_EMAIL)) {
        		$user = $this->clientRepo->where(['email' => $buscar])->first();
        		$where['id_client'] = $user->id;
        	} else {
        		$user = $this->clientRepo->where(['first_name :like' => $buscar])
        			->orWhere(['middle_name :like' => $buscar])
        			->orWhere(['last_name :like' => $buscar]);
        		if($user->count() > 1)
        			$where['id_client :in'] = array_column($user->toArray(),'id');
        		else
        			$where['id_client'] = $user->first()->id;
        	}
        }

        $all = $this->requisitionRepo->where($where);
        $requisitions = $all->order(['id' => 'DESC'])->limit($limit)->offset($page);
        $count = $this->requisitionRepo->where($where)->count();
        
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

		$fecha_entrega = ($requisition->date_sender) 
        ? $requisition->date_sender->format('Y-m-d')
        : gmdate('Y-m-d',strtotime('+'.$delivery_max.' day', $requisition->date_created->getTimestamp()));
        
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

	/**
	 * Send mail when status updated
	 * @param   Object $req In the object $req->data two parameters are expected
	 *                 $req->data['mail'] Is the mail of receiver
	 *                 $req->data['transaction'] **Optional id of transaction.
	 * @param   Object $res 
	 * @return  Http status
	 */
	public function sendMail($req, $res)
	{
		$mail = $req->data['mail'];
		$transaction = isset($req->data['transaction']) ? $req->data['transaction'] : null;
		$json = new stdClass();
		$mailStatus = $this->mailer($res, ['usuario' => $mail, 'subject' => 'Esta es una notificación de envio de documento', 'id' => $transaction], 'Emails.email_notificacion_envio');

		if(!$mailStatus) {
			$json->exito = false;
			$json->message = 'No se pudo mandar el correo';
		}

		$json->exito = true;
		$json->message = "Se ha mandado una notificaci&oacuten v&iacutea correo a <strong>{$mail}</strong>, para informarle que su documento ha sido enviado.";
		
		$res->addHeader( "Content-Type", "application/json; charset=utf-8");
        $res->add(json_encode($json, JSON_UNESCAPED_UNICODE));
        echo $res->send();
	}

    /**
     * Delete requisition in Administrator page
     * @param  Object $req 
     * @param  Object $res
     */
    public function delete($req, $res)
    {
        $requisition = $this->requisitionRepo->get($req->params['id']);
        try {
            $this->requisitionRepo->delete($requisition);
            $this->session->setFlash('alert', ['status' => 'Exito:', 'message' => "Se ha borrado correctamente el tramite GMX-{$requisition->id}!", 'class' => 'alert-info']);
        } catch (Spot\Exception $e) {
            $this->session->setFlash("alert", ['status' => 'Error:', 'message' => $e->getMessage(), "class" => "alert-warning"]);
        }
        header('Location: /admin/tramites');
    }
}