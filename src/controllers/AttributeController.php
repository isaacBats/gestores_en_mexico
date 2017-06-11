<?php

use Olive\controllers\Controller;
use Olive\infrastructure\AttributeRepo;

class AttributeController extends Controller
{
	private $attributeRepo;
	
	function __construct ()
	{
		parent::__construct ();
		$this->attributeRepo = new AttributeRepo();
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
		$update = $this->attributeRepo->update($attribute);
		
		if ($update->get('errors'))
            $this->session->setFlash("alert", ["message" => var_export($update->get('errors')), "class" => "alert-warning"]);
        else
            $this->session->setFlash('alert', ['message' => 'Atributo editado correctamente!', 'class' => 'alert-info']);

        header('Location: /admin/atributos');

	}
}