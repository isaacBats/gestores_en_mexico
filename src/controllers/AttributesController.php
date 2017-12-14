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
use Olive\infrastructure\AttributeRepo;
use Olive\infrastructure\ContryRepo;
use Olive\infrastructure\DataRequisitionRepo;
use Olive\infrastructure\StateRepo;


class AttributesController extends Controller
{
	private $attributeRepo;
	private $dataRequisitionRepo;
	private $contryRepo;
	private $stateRepo;

	public function __construct()
	{
		parent::__construct ();
		$this->attributeRepo = new AttributeRepo();
		$this->dataRequisitionRepo = new DataRequisitionRepo();
		$this->contryRepo = new ContryRepo();
		$this->stateRepo = new StateRepo();
	}

	public function getAttributesByRequisition ($requisitionId) 
	{
		$attributes = $this->dataRequisitionRepo->get_attributes_of_requisition($requisitionId);
		$array = array();
		foreach ($attributes as $key => $attribute) {
			
			if ($attribute->attribute->attribute == 'attr_pais'){
				$array[$attribute->attribute->attribute] = [
					'name' => $attribute->attribute->display_name,
					'value' => $this->contryRepo->getName($attribute->value),
				];
			} elseif ($attribute->attribute->attribute == 'attr_estado') {
				$array[$attribute->attribute->attribute] = [
					'name' => $attribute->attribute->display_name,
					'value' => $this->stateRepo->getName($attribute->value),
				];
			} else {
				$array[$attribute->attribute->attribute] = [
					'name' => $attribute->attribute->display_name, 
					'value' => $attribute->value,
				];
			}


		}
		return $array;
	}

	public function index ($req, $res)
	{
		$this->addBread(['label' => 'Lista de atributos']);
		$attributes = $this->attributeRepo->all();

		return $this->renderView($res, 'Attribute.index', compact('attributes'));
	}

	public function edit ($req, $res) 
	{
		$this->addBread(['label' => 'Atributos', 'url' => '/admin/atributos']);
        $this->addBread(['label' => 'Editar atributo']);

        $attribute = $this->attributeRepo->get($req->params['id']);
        
        $form = self::form(new Olive\models\Attribute, $attribute->toArray());
        return $this->renderView($res, 'Attribute.edit', compact('form'));
	}

	public function update($req, $res)
	{
		$attribute = $this->attributeRepo->get($req->params['id']);
		$attribute->attribute = $req->data['attribute'];
		$attribute->display_name = $req->data['display_name'];		
		try {
			$this->attributeRepo->update($attribute);
			$this->session->setFlash('alert', ['message' => 'Atributo editado correctamente!', 'class' => 'alert-info']);
		} catch (Spot\Exception $e) {
            $this->session->setFlash("alert", ["message" => $e->getMessage(), "class" => "alert-warning"]);
		}
        header('Location: /admin/atributos');
	}

	public function delete($req, $res)
	{
		$attribute = $this->attributeRepo->get($req->params['id']);
		try {
			$this->attributeRepo->delete($attribute);
			$this->session->setFlash('alert', ['message' => "Se ha borrado el atributo {$attribute->display_name} correctamente!", 'class' => 'alert-info']);
		} catch (Spot\Exception $e) {
            $this->session->setFlash("alert", ["message" => $e->getMessage(), "class" => "alert-warning"]);
		}
        header('Location: /admin/atributos');
	}


}