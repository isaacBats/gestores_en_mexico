<?php 

namespace Olive\controllers;
	
	use PHPRouter\Route;
	use Monolog\Logger;
	use Monolog\Handler\StreamHandler;

	/**
	 *	Controlador base para Olive	
	 * 	@author Isaac Batista 2017
	 */
	class Controller
	{	
		public $spot;
		public $session_handle;
		public $session;
		public $bread = array();
		public $entity;
		private $_mail;
		
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
			$this->log->pushHandler(new StreamHandler(__DIR__.'/logs/luna.log', Logger::INFO ) );
			
			global $mail;
			$this->_mail = $mail;
		}

		/**
		 * Mejor visualizacion de print_r
		 * @param  * $mixed Mixed data to print
		 */
		protected static function vdd($mixed){
			echo "<pre>";
			var_dump($mixed);
			print_r($mixed);
			exit;
		}

		 /**
         * Hace render 
         * @param array $data
         * @param Zapha\Reponse $res
         * @return Blade Render String
         */
        public function renderView($res, $template, $data = [])
        {
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
	         echo $res->blade->render($template, $data);
	    }

		protected function mailer($res, $data, $template) {
	        /* Para pasar un adjunto en el controlador
	          $attachment['path']='assets/files/pdfs/texto.pdf';
	          $attachment['name']='HolaName.pdf';
	          $this->mailer($res, ["attachment"=> $attachment,.....
	         * */
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
		public static function form( \Spot\Entity $entity, $values = null, $action = "" , $method = 'post')
		{	
 			$fields = $entity->fields();
 			$html = "<form action='{$action}' method='{$method}'>";

			foreach ($fields as $key => $value) {
				if( $key != "id" && $key != 'is_active' && is_array( $value ) && !isset( $value["value"] ) ){
					$val = ($values != NULL && isset($values[$key])) ? $values[$key] : "";
					$html .= "<div class='form-group'>";
					// If field is options 
					if(isset($value['options'])) {
						$html .= "<select name='{$key}' class='form-control'>
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
					} else {
						$html .= "<label>{$key}</label>";
						$val = ($key == 'password') ? '' : $val;
						$html .= "<input type='text' class='form-control' name='{$key}' value='{$val}' >";	
					}
					$html .= "</div>";
				}
			}
			$html.= "<input type='submit' class=\"btn btn-primary col-sm-offset-11\" value='send'>";
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