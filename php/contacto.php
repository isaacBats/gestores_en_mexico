<?php
/*Formulario de contacto HTML5, PHP Y Bootstraps
Creado por: www.render2web.com
Version: 1.1*/

//Comprobamos que se haya presionado el boton enviar
if(isset($_POST['enviar'])){
	//Guardamos en variables los datos enviados
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$mensaje = $_POST['mensaje'];
	
	///Validamos del lado del servidor que el nombre y el email no estén vacios
	if($nombre == ''){
		echo "Ingresa tu nombre";
	}
	else if($email == ''){
		echo "Ingresa tu email";
}else{
	$para = "ataquevisual@gmail.com,jm217938@hotmail.com";//Email al que se enviará
	$asunto = "Nuevo mensaje desde GestoresEnMéxico.com";//Puedes cambiar el asunto del mensaje desde aqui
	//Este sería el cuerpo del mensaje
	$mensaje = "
		<table border='0' cellspacing='3' cellpadding='2'>
		  <tr>
			<td width='30%' align='left' bgcolor='#99d4bf'><strong>Nombre:</strong></td>
			<td width='80%' align='left'>$nombre</td>
		  </tr>
		  <tr>
			<td width='30%' align='left' bgcolor='#99d4bf'><strong>Apellidos:</strong></td>
			<td width='70%' align='left'>$apellidos</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#99d4bf'><strong>E-mail:</strong></td>
			<td align='left'>$email</td>
		  </tr>
		   <tr>
			<td width='30%' align='left' bgcolor='#99d4bf'><strong>Teléfono:</strong></td>
			<td width='70%' align='left'>$telefono</td>
		  </tr>
		  <tr>
		  <tr>
			<td align='left' bgcolor='#99d4bf'><strong>Comentario:</strong></td>
			<td align='left'>$mensaje</td>
		  </tr>
	</table>	
";	
	
//Cabeceras del correo
	$to = "ataquevisual@gmail.com";
	// $headers .= "Bcc: $emailList\r\n";
    // $headers = "From: $nombre <$email>\r\n"; //Quien envia?
    $headers = "From: AtaqueVisual\r\n" . "X-Mailer: php";
    $headers .= "X-Mailer: PHP5\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //

	
//Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
	if(mail($para, $asunto, $mensaje, $headers)){
		echo "tu mensaje se ha enviado correctamente";
		echo "<br />";
		echo 'GRACIAS';
	}else{
		echo "Hubo un error en el envío inténtelo más tarde";
		}
	}
}	
?>
<script LANGUAGE="JavaScript">
	var pagina="http://www.gestoresenmexico.com/gracias.php"
	function redireccionar()
	{
	location.href=pagina
		}
	setTimeout ("redireccionar()", 
	1);
</script>
