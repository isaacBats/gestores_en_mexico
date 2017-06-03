<?php

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


}