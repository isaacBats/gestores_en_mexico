<?php 

namespace Olive\controllers;
	
	use PHPRouter\Route;
	use Monolog\Logger;
	use Monolog\Handler\StreamHandler;


	/**
	 *
	 *	Controlador base para Olive
	 * 	
	 * 	@author Isaac Batista 2017
	 */
	
	
		
	class Controller
	{
		
		public $spot;
		public $session_handle;
		public $session;
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
		 * 
		 * @param  * $mixed Mixed data to print
		 */
		protected static function vdd($mixed){
			echo "<pre>";
			var_dump($mixed);
			print_r($mixed);
		}

		 /**
         * Hace render 
         * @param array $data
         * @param Zapha\Reponse $res
         * @return Mustache Render String
         */
        public function renderView($res, $template, $data = [])
        {
        	$session = $this->session_handle->getSegment('Olive\Session');
	        $data = array_merge(["user" => $session->get("user")], $data);
	        $alert = $this->session->getFlash("alert");
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
		 * Imprime un formulario de prueba en base a la entidad
		 * @param  [type] $array  [description]
		 * @param  string $action [description]
		 * @return [type]         [description]
		 */
		public function formTest( $action = "" , $values = NULL ){
			
			$entity = new $this->entity_name();
 			$fields = $entity->fields();
 				
			$html = "<form action='{$action}' method='post'>";

			foreach ($fields as $key => $value) {

				if( $key != "id" && is_array( $value ) && !isset( $value["value"] ) ){

					$value = $values != NULL && isset( $values[$key] )?$values[$key]:"";
					$html .= "<label>{$key}</label><br>";
					$html .= "<input type='text' name='{$key}' value='{$value}' ><br />";	
				}
				
			}

			$html.= "<input type='submit' value='send'>";
			$html.= "</form>";
			return $html;
		}

		
		// TODO: Extender para que trabaje mejor con la URL completa
		public function url( $lang , $url = ""){
			if( $url == ""){
				return "/".$lang.$_SERVER["REQUEST_URI"];
			}else{
				$ur = explode( "/" , $url );
				$url = implode( "/" , array_map( function($s){return urlencode($s); } , $ur ) );
				return "/".$lang.$url;
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
	
	}


	
//  AUTOLOAD CONTROLLERS
foreach( scandir( __OLIVE__.'/src/controllers' ) as $class ){
	$buffer = explode("." , $class);
	if( end( $buffer ) == "php"){
		require_once(__OLIVE__.'/src/controllers/'.$class);
	}
}