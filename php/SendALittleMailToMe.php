<?php

/*
  © 2017 Israel Morales Polendo
 * Utilerías para el envio de correos
 */


//le envia el correo al depto de ventas
function CorreoAVentas($datos,$info){

    $mailVentas = "israel.morales1@outlook.com, hector@ataquevisual.com.mx";
    $mailCCVentas = "";

    $mensaje = "<html>
<head>
<meta charset=\"UTF-8\">
<title>Confirmación - Gestores en México</title>
</head>

<body style=\"font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; margin:0 auto; background:#f7fcfe; color:#363c45;\">
	<table width=\"600\" border=\"0\" cellpadding=\"0\" style=\"background:#fff; padding:20px;\">
  <tbody>
    <tr>
      <td><table width=\"100%\" border=\"0\">
  <tbody>
    <tr>
      <td><img src=\"http://www.gestoresenmexico.com/images/logo.png\" width=\"140\" height=\"80\" alt=\"\"/></td>
      <td width=\"70%\">
      	<h2 style=\"font-size:12px; text-align:right; color:#4682b4;\">CONSULTORIA ESPECIALIZADA EN GESTORIA DE TRÁMITES <br>
        Y SERVICIOS ADMINISTRATIVOS E INTEGRALES</h2>
      </td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
    <tr>
      <td height=\"20px\">
      <hr style=\"background:#6a6e74;\">
      	<h4 style=\"text-align:center;\">Confirmación de solicitud de trámite</h4>
      </td>
    </tr>
    <tr>
      <td><table width=\"100%\" border=\"0\" cellpadding=\"0\" style=\"text-align:center; color:#fff;\" >
  <tbody>
    <tr>
      <td width=\"30%\">&nbsp;</td>
      <td width=\"40%\" style=\"padding:6px 0;\">
      	<div style=\"background:#f44336; display:block;\"><p>Folio: <span style=\"font-weight:bold;\">" . $info['clave'] . "</span></p></div>
      </td>
      <td width=\"30%\">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>

    <tr>
      <td>

        <p style=\"font-size:12px;\">Fecha de solicitud: <span style=\"font-weight:bold;\">" . $info['fecha'] . "</span></p>

      	<h5 style=\"color:#4682b4; font-size:9px;\">Solicitante</h5>

      	<p style=\"font-size:12px;\">Nombre(s): <span style=\"font-weight:bold;\">" . $datos->datosTitular->nombres . " </span></p>
        <p style=\"font-size:12px;\">Apellido paterno: <span style=\"font-weight:bold;\">" . $datos->datosTitular->apellidoPaterno . "</span></p>
        <p style=\"font-size:12px;\">Apellido materno: <span style=\"font-weight:bold;\">" . $datos->datosTitular->apellidoMaterno . "</span></p>
        <p style=\"font-size:12px;\">Email: <span style=\"font-weight:bold;\">" . $datos->datosTitular->email . "</span></p>
        <p style=\"font-size:12px;\">Teléfono: <span style=\"font-weight:bold;\">" . $datos->datosTitular->telefono . " / " . $datos->datosTitular->celular . "</span></p>

        <h5 style=\"color:#4682b4; font-size:9px;\">Registro de trámite</h5>

        <p style=\"font-size:12px;\">Trámite: <span style=\"font-weight:bold;\">" . $datos->datosGrales->gral_titulo . "</span></p>
        <p style=\"font-size:12px;\">Cantidad de copias: <span style=\"font-weight:bold;\">" . $datos->datosGrales->gral_ncopias . "</span></p>
        <p style=\"font-size:12px;\">Estado: <span style=\"font-weight:bold;\">" . $datos->datosGrales->gral_estadoTexto . "</span></p>

<h5 style=\"color:#4682b4; font-size:9px;\">Dirección</h5>

<p style=\"font-size:12px;\">Calle: <span style=\"font-weight:bold;\">" . $datos->datosTitular->calle . "</span></p>
<p style=\"font-size:12px;\">Número exterior: <span style=\"font-weight:bold;\">" . $datos->datosTitular->numeroext . "</span></p>
<p style=\"font-size:12px;\">Número interior: <span style=\"font-weight:bold;\">" . $datos->datosTitular->numeroint . "</span></p>
<p style=\"font-size:12px;\">Colonia: <span style=\"font-weight:bold;\">" . $datos->datosTitular->colonia . "</span></p>
<p style=\"font-size:12px;\">Delegación/Municipio: <span style=\"font-weight:bold;\">" . $datos->datosTitular->delmun . "</span></p>
<p style=\"font-size:12px;\">Estado: <span style=\"font-weight:bold;\">" . $datos->datosTitular->estadodireccionTexto . "</span></p>
<p style=\"font-size:12px;\">C.P.: <span style=\"font-weight:bold;\">" . $datos->datosTitular->cp . "</span></p>
<p style=\"font-size:12px;\">Referencia: <span style=\"font-weight:bold;\">" . $datos->datosTitular->referencia . "</span></p>


<h5 style=\"color:#4682b4; font-size:9px;\">Datos de envío</h5>

<p style=\"font-size:12px;\">Calle: <span style=\"font-weight:bold;\">" . $datos->datosDestinatario->calle . "</span></p>
<p style=\"font-size:12px;\">Número exterior: <span style=\"font-weight:bold;\">" . $datos->datosDestinatario->numeroext . "</span></p>
<p style=\"font-size:12px;\">Número interior: <span style=\"font-weight:bold;\">" . $datos->datosDestinatario->numeroint . "</span></p>
<p style=\"font-size:12px;\">Colonia: <span style=\"font-weight:bold;\">" . $datos->datosDestinatario->colonia . "</span></p>
<p style=\"font-size:12px;\">Delegación/Municipio: <span style=\"font-weight:bold;\">" . $datos->datosDestinatario->delmun . "</span></p>
<p style=\"font-size:12px;\">Estado: <span style=\"font-weight:bold;\">" . $datos->datosDestinatario->estadodireccionTexto . "</span></p>
<p style=\"font-size:12px;\">C.P.: <span style=\"font-weight:bold;\">" . $datos->datosDestinatario->cp . "</span></p>
<p style=\"font-size:12px;\">Referencia: <span style=\"font-weight:bold;\">" . $datos->datosDestinatario->referencia . "</span></p>


        <h5 style=\"color:#4682b4; font-size:9px;\">Costo</h5>

<p style=\"font-size:12px;\">Trámite: <span style=\"font-weight:bold;\">$" . $info['costoTramite'] . " <sup style=\"font-size:8px;\">MN</sup></span></p>
<p style=\"font-size:12px;\">Copias adicionales: <span style=\"font-weight:bold;\">" . $datos->datosGrales->gral_ncopias . "</span></p>
<p style=\"font-size:12px;\">Costo de envío: <span style=\"font-weight:bold;\">$" . $info['costoEnvio'] . " <sup style=\"font-size:8px;\">MN</sup></span></p>

        <p style=\"font-size:12px;\">Costo total: <span style=\"font-weight:bold;\">$" . $info['costoTotal'] . " <sup style=\"font-size:8px;\">MN</sup></span></p>


      </td>
    </tr>
    <tr>

    </tr>
    <td><table width=\"100%\" border=\"0\" cellpadding=\"0\" style=\"background:#ededed; color:#717170;\">
  <tbody>
    <tr>
    <td><img src=\"http://www.gestoresenmexico.com/images/logoBottom.png\" width=\"100\" height=\"62\" alt=\"\"/></td>
      <td style=\"padding:10px; text-align:right; font-size:12px;\"><p>Gestores en México<br>
info@gestoreseenmexico.com<br>
Tel: (55) 5555 5555
      </td>

    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
</body>
</html>";

    //cosas que debe llevar el mail
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <webmaster@gestoresenmexico.com>' . "\r\n";
    $headers .= 'Cc: ' . $mailCCVentas . "\r\n";

    $para = $mailVentas;
    $asunto = "Confirmación de solicitud de trámite";

    mail($para,$asunto,$mensaje,$headers);
}

function CorreoACliente($datos, $info){
    
    $mailCliente = "";
    $mailCCCliente = "";
    
    if ($datos->datosTitular->email == $datos->datosDestinatario->email){
        $mailCliente = $datos->datosTitular->email;
    } else {
        $mailCliente = $datos->datosTitular->email . ", " . $datos->datosDestinatario->email;
    }

    $mensaje = "<html>
<head>
<meta charset=\"UTF-8\">
<title>Confirmación - Gestores en México</title>
</head>

<body style=\"font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; margin:0 auto; background:#f7fcfe; color:#363c45;\">
	<table width=\"600\" border=\"0\" cellpadding=\"0\" style=\"background:#fff; padding:20px;\">
  <tbody>
    <tr>
      <td><table width=\"100%\" border=\"0\">
  <tbody>
    <tr>
      <td><img src=\"http://www.gestoresenmexico.com/images/logo.png\" width=\"140\" height=\"80\" alt=\"\"/></td>
      <td width=\"70%\">
      	<h2 style=\"font-size:12px; text-align:right; color:#4682b4;\">CONSULTORIA ESPECIALIZADA EN GESTORIA DE TRÁMITES <br>
        Y SERVICIOS ADMINISTRATIVOS E INTEGRALES</h2>
      </td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
    <tr>
      <td height=\"20px\">
      <hr style=\"background:#6a6e74;\">
      	<h4 style=\"text-align:center;\">Confirmación de solicitud de trámite</h4>
      </td>
    </tr>
    <tr>
      <td><table width=\"100%\" border=\"0\" cellpadding=\"0\" style=\"text-align:center; color:#fff;\" >
  <tbody>
    <tr>
      <td width=\"30%\">&nbsp;</td>
      <td width=\"40%\" style=\"padding:6px 0;\">
      	<div style=\"background:#f44336; display:block;\"><p>Folio: <span style=\"font-weight:bold;\">" . $info['clave'] . "</span></p></div>
      </td>
      <td width=\"30%\">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
    <tr>
      <td><h2 style=\"font-size:18px; text-align:center; font-weight:normal; color:#4682b4;\">¡Gracias por enviarnos tus datos! <br>
        <span style=\"font-size:12px;\">uno de nuestros asesores te contactará para el seguimiento de tu trámite</span></h2>
        <p style=\"color: #f44336; font-size:12px; text-align:center; font-style:italic;\">Tu trámite ha sido confirmado, por favor guarda esta información</p>
        </td>
    </tr>
    <tr>
      <td>
      	<h5 style=\"color:#4682b4; font-size:9px;\">Solicitante</h5>

      	<p style=\"font-size:12px;\">Nombre(s): <span style=\"font-weight:bold;\">" . $datos->datosTitular->nombres . " </span></p>
        <p style=\"font-size:12px;\">Apellido paterno: <span style=\"font-weight:bold;\">" . $datos->datosTitular->apellidoPaterno . "</span></p>
        <p style=\"font-size:12px;\">Apellido materno: <span style=\"font-weight:bold;\">" . $datos->datosTitular->apellidoMaterno . "</span></p>
        <p style=\"font-size:12px;\">Trámite: <span style=\"font-weight:bold;\">" . $datos->datosGrales->gral_titulo . "</span></p>
        <p style=\"font-size:12px;\">Cantidad de copias: <span style=\"font-weight:bold;\">" . $datos->datosGrales->gral_ncopias . "</span></p>
        <p style=\"font-size:12px;\">Estado: <span style=\"font-weight:bold;\">" . $datos->datosTitular->estadodireccionTexto . "</span></p>
        <p style=\"font-size:12px;\">Fecha de solicitud: <span style=\"font-weight:bold;\">" . $info['fecha'] . "</span></p>
        <p style=\"font-size:12px;\">Costo total: <span style=\"font-weight:bold;\">$" . $info['costoTotal'] . " <sup style=\"font-size:8px;\">MN</sup></span></p>
        <h5 style=\"color:#4682b4; font-size:9px;\">Formas de pago</h5>
        <p style=\"font-size:12px;\">Depósito o transferencia electrónica</p>
        <p style=\"font-size:12px;\">Institución bancaria: <span style=\"font-weight:bold;\">" . $info['institucionBancaria'] . "</span></p>
        <p style=\"font-size:12px;\">Titular: <span style=\"font-weight:bold;\">" . $info['titularCuenta'] . "</span></p>
        <p style=\"font-size:12px;\">Número de cuenta: <span style=\"font-weight:bold;\">" . $info['numeroCuenta'] . "</span></p>
        <p style=\"font-size:12px;\">Clabe interbancaria: <span style=\"font-weight:bold;\">" . $info['clabeCuenta'] . "</span></p>

        <p style=\"font-size:12px; margin-top:20px;\"> <span style=\"font-weight:bold;\">Importante: </span>Al finalizar el proceso, es necesario que nos envíes tu comprobante o ticket de pago al correo documentos@gestoresenmexico.com añadiendo número de folio del recuadro rojo en la página de confirmación.</p>

      </td>
    </tr>
    <tr>

    </tr>
    <td><table width=\"100%\" border=\"0\" cellpadding=\"0\" style=\"background:#ededed; color:#717170;\">
  <tbody>
    <tr>
    <td><img src=\"http://www.gestoresenmexico.com/images/logoBottom.png\" width=\"100\" height=\"62\" alt=\"\"/></td>
      <td style=\"padding:10px; text-align:right; font-size:12px;\"><p>Gestores en México<br>
info@gestoreseenmexico.com<br>
Tel: (55) 5555 5555
      </td>

    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
</body>
</html>";

    //cosas que debe llevar el mail
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <webmaster@gestoresenmexico.com>' . "\r\n";
    $headers .= 'Cc: ' . $mailCCCliente . "\r\n";

    $para = $mailCliente;
    $asunto = "Confirmación de solicitud de trámite";

    mail($para,$asunto,$mensaje,$headers);
}
?>
