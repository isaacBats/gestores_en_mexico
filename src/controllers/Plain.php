<?php 
/*
 * This file is part of AtaqueVisual.
 *
 * (c) Isaac Daniel Batista <@codeisaac>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// namespace Olive\controllers;
use Olive\controllers\Controller;
use Olive\infrastructure\ContryRepo as CountryRepo;
use Olive\infrastructure\RequisitionRepo;
use Olive\infrastructure\CmsOptionRepo;
use Olive\traits\RecaptchaVerifier;

class Plain extends Controller
{	
    use RecaptchaVerifier;
    
    const ACTIVE = 1;
    const INACTIVE = 0;

    private $requisitionRepo;
	
	private $cmsOptionRepo;
	
	function __construct()
	{
		parent::__construct();
		$this->requisitionRepo = new RequisitionRepo();
		$this->cmsOptionRepo = new CmsOptionRepo();
	}

	public function home( $req , $res ){		
		return $this->renderView($res, 'Plain.home');
	}

	public function nosotros ($req, $res)
	{		
		return $this->renderView($res, 'Plain.nosotros');
	}

	public function listado ($req, $res)
	{		
		return $this->renderView($res, 'Plain.listado');
	}

	public function internacional ($req, $res)
	{		
		$countriesRepo = new CountryRepo();
		$countries = $countriesRepo->where(['is_active' => self::ACTIVE]);
		return $this->renderView($res, 'Plain.formulario-internacional', compact('countries'));
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
		// Verificar reCAPTCHA al inicio
        $recaptchaToken = $_POST['g-recaptcha-response'] ?? '';
        $score = $this->verifyRecaptcha($recaptchaToken);
        
        if (!$score || $score < 0.5) { // 0.5 es el umbral recomendado por Google
            $this->session->setFlash("alert", [
                "message" => "Error de verificación de seguridad. Por favor, intente nuevamente.", 
                "status" => "Error:", 
                "class" => "alert-danger"
            ]);
            header('Location: /contacto');
            exit();
        }

        // Proceder con el envío del formulario
        $data = $req->data;
        unset($data['_RAW_HTTP_DATA']);
        unset($data['g-recaptcha-response']);
        
        if(ENVIROMENT === 'prod' )
            $usuario = 'contacto@gestoresenmexico.com';
        else
            $usuario = 'klonate@gmail.com';
        
        $subject = 'Nuevo Contacto :D';
        
        if ($mail = $this->mailer($res, compact('subject', 'data', 'usuario'), 'Emails.email_contacto')){
            $this->session->setFlash("alert", ["message" => "Se ha enviado tu petición correctamente. En breve nos pondremos en contacto contigo", "status" => "Exito:", "class" => "alert-success"]);
        } else {
            $this->session->setFlash("alert", ["message" => "Error al enviar el formulario. Intente más tarde.", "status" => "Error:", "class" => "alert-danger"]);
        }
        
        header('Location: /contacto');
	}

	public function aviso ($req, $res)
	{		
		return $this->renderView($res, 'Plain.aviso');
	}

	// TODO: @Plain Agregar el link de preguntas frecuentes en el front.
	// TODO: @Plain Agregar una tabla y un formulario para crear preguntas para esta seccion
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

	public function statusPublico($req, $res)
	{
		try {
			$clave = $req->data['clave'];
			$requisition = $this->requisitionRepo->where(['id_public' => $clave])->first();
			$comments = $requisition->comments_public ? $requisition->comments_public : NULL;
			return $this->renderView($res, 'Plain.status', compact('comments', 'clave'));
		} catch (Exception $e) {
			throw new Exception("Error: {$e->getMessage()}", 1);
		}
	}

	public function infoHeader ($req, $res)
	{
		$this->addBread(['label' => 'Configuración Header']);
        
		$headerInfo = $this->cmsOptionRepo->where(['name :like' => '%header%']);
		$phone = null;
		$whats = null;
		$direction = null;
		$correo = null;
		$horaIni = null;
		$horaFin = null;
		
		foreach ($headerInfo as $info) {
			if($info->name == 'telephone_header') {
				$phone = $info->value;
			}

			if($info->name == 'whatsapp_header') {
				$whats = $info->value;
			}

			if($info->name == 'direccion_header') {
				$direction = $info->value;
			}

			if($info->name == 'email_header') {
				$correo = $info->value;
			}

			if($info->name == 'hora_ini_header') {
				$horaIni = $info->value;
			}

			if($info->name == 'hora_fin_header') {
				$horaFin = $info->value;
			}
		}
		
		return $this->renderView($res, 'Plain.admin_header_options', compact('phone', 'whats', 'direction', 'correo', 'horaIni', 'horaFin'));
	}

	public function updateHeader ($req, $res)
	{
		try {
			unset($req->data['_RAW_HTTP_DATA']);
			$data = $req->data;
			foreach ($data as $key => $value) {
				$cmsOption = new \Olive\models\CmsOption();
				$cmsOption->name = $key;
				$cmsOption->value = $value;
				$this->cmsOptionRepo->createOrUpdate($cmsOption);
			}
			$this->session->setFlash("alert", ["message" => "Datos actualizados correctamente!", "status" => "Exito:", "class" => "alert-success"]);
		} catch (\Exception $e) {
			throw new Exception("Error: {$e->getMessage()}", 1);
		}

		header('Location: /admin/static/header');
	}

	public function infoFooter ($req, $res)
	{
		echo 'Info Footer';
	}

	public function infoAccounts ($req, $res)
	{
		$this->addBread(['label' => 'Configuración Cuentas de Pago']);
        
		$accountInfoBank = null;
		if ($accountInfoBank = $this->cmsOptionRepo->where(['name' => 'account_bank'])->first()) {
			$data = unserialize($accountInfoBank->value);
			$accountInfoBank = $data['infoBank'];
		}

		return $this->renderView($res, 'Plain.admin_account_options', compact('accountInfoBank'));
	}

	public function updateAccounts ($req, $res)
	{
		unset($req->data['_RAW_HTTP_DATA']);
		$serialize = serialize($req->data);
		
		try {
			$cmsOption = new \Olive\models\CmsOption();
			$cmsOption->name = 'account_bank';
			$cmsOption->value = $serialize;
			$this->cmsOptionRepo->createOrUpdate($cmsOption);
			$this->session->setFlash("alert", ["message" => "Datos de la cuenta actualizados correctamente!", "status" => "Exito:", "class" => "alert-success"]);
		} catch (\Exception $e) {
			throw new Exception("Error: {$e->getMessage()}", 1);
		}

		header('Location: /admin/static/cuentas');

	}

	public function test ($req, $res)
	{
		$color = 'Red';
		$usuario = 'klonate@gmail.com';
		$subject = 'Test email';
		if ($mail = $this->mailer($res, compact('color', 'usuario', 'subject'), 'Emails.test') === true)
			exit('Se ha enviado el correo ');
		else {
			die('No se mando el correo');
		}
	}
}
