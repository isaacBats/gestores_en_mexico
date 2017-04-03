<?php 

// namespace Olive\controllers;

use Olive\controllers\Controller;

class Plain extends Controller
{	
	public function home( $req , $res ){		
		return $this->renderView($res, 'Plain.home');
	}

	public function nosotros ($req, $res)
	{		
		return $this->renderView($res, 'Plain.nosotros');
	}

	public function comoFunciona ($req, $res)
	{		
		return $this->renderView($res, 'Plain.comoFunciona');
	}

	public function contacto ($req, $res)
	{		
		return $this->renderView($res, 'Plain.contacto');
	}

	public function aviso ($req, $res)
	{		
		return $this->renderView($res, 'Plain.aviso');
	}

	public function preguntas ($req, $res)
	{		
		return $this->renderView($res, 'Plain.preguntas');
	}

	public function construction ($req, $res)
	{
		return $this->renderView($res, 'Plain.construction');
	}

	public function gracias ($req, $res)
	{
		$rs = $this->session->get('requisition_result');
		$this->session->set('requisition_result', NULL);
		return $this->renderView($res, 'Plain.gracias', compact('rs'));
	}

	public function test ($req, $res)
	{
		$name = isset($req->data['name']) ? $req->data['name'] : 'Daniel';
		$saludo = 'Hola como estas ' . $name;
		self::vdd(compact('saludo', 'name'));
	}

}