<?php 

// namespace Olive\controllers;
use Olive\controllers\Controller;
use Olive\infrastructure\ContryRepo as CountryRepo;

class Plain extends Controller
{	

	const ACTIVE = 1;
	const INACTIVE = 0;

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
		$countriesRepo = new CountryRepo();
		$countries = $countriesRepo->where(['is_active' => self::ACTIVE]);
		return $this->renderView($res, 'Plain.contacto', compact('countries'));
	}

	public function sendFormContact($req, $res)
	{
		$data = $req->data;
		unset($data['_RAW_HTTP_DATA']);
		
		if(ENVIROMENT === 'prod' )
			$usuario = 'contacto@gestoresenmexico.com';
		else
			$usuario = 'klonate@gmail.com';
		
		$subject = 'Nuevo Contacto :D';
		if ($mail = $this->mailer($res, compact('subject', 'data', 'usuario'), 'Emails.email_contacto'))
			$this->session->setFlash("alert", ["message" => "Se ha enviado tu petición correctamente. En breve nos pondremos en contacto contigo", "status" => "Exito:", "class" => "alert-success"]);
		else
			$this->session->setFlash("alert", ["message" => $mail, "status" => "Error:", "class" => "alert-danger"]);

    header('Location: /contacto');
    exit();
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
		self::vdd($_SERVER);
		$color = 'Red';
		$usuario = 'klonate@gmail.com';
		$subject = 'Test email';
		if ($mail = $this->mailer($res, compact('color', 'usuario', 'subject'), 'Emails.test'))
			exit('Se ha enviado el correo ');
		else
			die('No se mando el correo');
	}

}