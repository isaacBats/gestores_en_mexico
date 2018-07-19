<?php 
/*
 * This file is part of AtaqueVisual.
 *
 * (c) Isaac Daniel Batista <@codeisaac>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Olive\controllers;
	
require_once __OLIVE__ . '/src/helpers/helpers.php';

use PHPRouter\Route;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Olive\helpers\Utils;
use Olive\infrastructure\CmsOptionRepo;

/**
 *	Controlador base para Olive	
 * 	@author Isaac Batista 2017
 */
class Controller
{	
	public $session_handle;
	public $session;
	public $bread = array();
	public $entity;
	private $_mail;
  protected $dotenv;
	
	/**
	 * Comienza la session en el constructor de la accion
	 */
	function __construct()
	{
		if( !isset($_SESSION)){
			session_start();
		}

    global $session_handle;
		$this->session_handle = $session_handle;
		$this->session = $this->session_handle->getSegment('Olive\controllers');

		// create a log channel
		$this->log = new Logger('luna');
		$this->log->pushHandler(new StreamHandler(__DIR__.'/logs/controllers_log.log', Logger::INFO ) );
		
		global $mail;
		$this->_mail = $mail;

    $dotenv = new \Dotenv\Dotenv(__DIR__.'/../../');
    $dotenv->load();
	}

	/**
     * Hace render 
     * @param array $data
     * @param Zapha\Reponse $res
     * @return Blade Render String
     */
    public function renderView($res, $template, $data = [])
    {
    	$alert = null;
    	$session = $this->session_handle->getSegment('Olive\Session');
        $data = array_merge(["user" => $session->get("user")], $data);
        $alert = $this->session->getFlash("alert");
        $bread = $this->bread();
        $data = array_merge(['bread' => $bread], $data);
        $showmodal = $this->session->getFlash("showmodal");
        if ($alert) {
            $data = array_merge(["alert" => $alert], $data);
        }
        if ($showmodal) {
            $data = array_merge(["showmodal" => $showmodal], $data);
        }
        $data = array_merge(["system" => ['current'=>time()]], $data);

        // Info header
        $cmsOptionRepo = new CmsOptionRepo();
        $headerInfo = $cmsOptionRepo->where(['name :like' => '%header%']);
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

        $data = array_merge([
            'phone' => $phone,
            'whats' => $whats,
            'direction' => $direction,
            'correo' => $correo,
            'horaIni' => $horaIni,
            'horaFin' => $horaFin
        ], $data);

        try {
        	echo $res->blade->render($template, $data);
         	
        } catch (ErrorException $e) {
         	echo 'No se puede mostrar tu petición: ' . $e->getMessage();
        } 
    }

	protected function mailer($res, $data, $template) {
        /* Para pasar un adjunto en el controlador
          $attachment['path']='assets/files/pdfs/texto.pdf';
          $attachment['name']='HolaName.pdf';
          $this->mailer($res, ["attachment"=> $attachment,.....
         * */
        $cmsOptionRepo = new CmsOptionRepo();
        $headerInfo = $cmsOptionRepo->where(['name :like' => '%header%']);
        $phone = null;
        $whats = null;
        $correo = null;
        
        foreach ($headerInfo as $info) {
            if($info->name == 'telephone_header') {
                $phone = $info->value;
            }

            if($info->name == 'whatsapp_header') {
                $whats = $info->value;
            }

            if($info->name == 'email_header') {
                $correo = $info->value;
            }
        }

        $data = array_merge([
            'phoneManager' => $phone,
            'whatsManager' => $whats,
            'correoManager' => $correo
        ], $data);

        $this->_mail->clearAddresses();
        $this->_mail->CharSet = "UTF-8";
        $this->_mail->AddAddress($data['usuario']);
        $this->_mail->Subject = $data['subject'];
        $this->_mail->Body = $res->blade->render($template, $data);
        if (isset($data['attachment'])) {
            $this->_mail->AddAttachment($data['attachment']['path'], $name = $data['attachment']['name'], $encoding = 'base64', $type = 'application/octet-stream');
        }
        // $this->_mail->Send();
        if( ! $this->_mail->send() ) {
            return $this->_mail->ErrorInfo;
		} 

		return true;
    }

	/**
	 * TODO: mover a una clase de fromularios y pasar como una propiedad referenciada a un objeto
	 * Imprime un formulario en base a la entidad
	 * @param  Spot\Entity $entity
	 * @param  array $values
	 * @param  string $action
	 * @param  string $method
	 * @return string $html
	 */
	public static function form( \Spot\Entity $entity, $values = null, $action = "" , $method = 'post', $button = 'send')
	{	
		$fields = $entity->fields();
		$html = "<form action='{$action}' method='{$method}' enctype='multipart/form-data'>";
		
		foreach ($fields as $key => $value) {
			if( $key != "id" && $key != 'is_active' && is_array( $value ) && !isset( $value["value"] ) ){
				$val = ($values != NULL && isset($values[$key])) ? $values[$key] : "";
				
				$html .= "<div class='form-group'>";
				// If field is options 
				if(isset($value['options'])) {
					$html .= "<label>{$key}</label><select name='{$key}' class='form-control'>
								<option value=''>Select a {$key}</option>";
					foreach ($value['options'] as $option) {
						$html .= "<option value='{$option}' ";
						$html .= ($val == $option) ? 'selected' : '';
						$html .= ">{$option}</option>";
					}
					$html .= "</select>";
				} 
				// If field is email
				elseif ($key == 'email') {
					$html .= "<label>{$key}</label>";
					$html .= "<input type='email' class='form-control' name='{$key}' value='{$val}' >";
				}
				elseif ($key == 'is_active') {
					$html .= "<label class=\"ckbox\">
								<input type=\"checkbox\" name='{$key}' ".($val ? 'checked value="1"' : 'value="0"')."> <span>Usuario activo</span>
							  </label>";
				} elseif ($key == 'image') {
                    $html .= "<label>{$key}</label>
                    <input type='file' name='image' />";
                } else {
					$html .= "<label>{$key}</label>";
					$val = ($key == 'password') ? '' : $val;
					$html .= "<input type='text' class='form-control' name='{$key}' value='{$val}' >";	
				}
				$html .= "</div>";
			}
		}
		$html.= "<input type='submit' class=\"btn btn-primary col-sm-offset-10\" value='{$button}'>";
		$html.= "</form>";
		return $html;
	}

	
	// TODO: Extender para que trabaje mejor con la URL completa
	public function url($url = ""){
		if( $url == ""){
			return "/".$_SERVER["REQUEST_URI"];
		}else{
			$ur = explode( "/" , $url );
			$url = implode( "/" , array_map( function($s){return urlencode($s); } , $ur ) );
			return $url;
		}
	}

	/**
	 * Devuelve el string correcto dependiendo el LANG recibido
	 * @param string $lang 
	 * @param string $es 
	 * @param string $en 
	 * @return string
	 */
	public function trans($lang="es",$es,$en){
		if ($lang == "en" ){
			return $en;
		}
		else{
			return $es;
		}
	}

	/**
	 * Create slug for urls
	 * @param  string $str 
	 * @return string
	 */
	public function url_slug($str) 
	{ 
	  return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), 
	  	array('', '-', ''), $this->remove_accent($str))); 
	}

	public function remove_accent($str){ 
	  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ'); 
	  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o'); 
	  return str_replace($a, $b, $str); 
	} 

	/**
	 * Add a breadcrumb
	 * @return string $out html create with the breadcrumb
	 */
	public function bread( ){
        $out = '
                <ol class="breadcrumb breadcrumb-quirk">
                    <li><a href="/admin/index"><i class="fa fa-home mr5"></i> Home</a></li>';
        $size = sizeof( $this->bread );
        $outc = 1;
        foreach( $this->bread  as $step ){
            if( $size == $outc){
                $out .= '<li class="active"><a href="javascript:void(0);">' . $step["label"] . '</a></li>';
            }else{
            	$out .= '<li><a href="'.$this->url($step["url"]).'">'.$step["label"].'</a></li>';
            }
            $outc++;
        }
        $out .= '</ol>';
        return $out;
    }

    public function addBread( $array ){
        array_push( $this->bread  , $array );
    }

}
	
//  AUTOLOAD CONTROLLERS
foreach( scandir( __OLIVE__.'/src/controllers' ) as $class ){
	$buffer = explode("." , $class);
	if( end( $buffer ) == "php"){
		require_once(__OLIVE__.'/src/controllers/'.$class);
	}
}