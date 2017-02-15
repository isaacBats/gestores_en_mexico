<?php

/*
  © 2017 Israel Morales Polendo
 * Recibe la solicitud de pedido, envia mails y guarda la solicitud en la BD
 */

include "SendALittleMailToMe.php";
include "MysqlVariables.php";
include "ProcesarSolicitud.php";


  if (isset($_GET["data"])) {

    $data = json_decode($_GET['data']);

    $jsondata["success"] = true;
        $jsondata["data"] = array(
          'message' => 'OKAY'
        );

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
        
        $info = ProcesarSolicitud($dbCredentials, $data);

        
        CorreoAVentas($data,$info);
        CorreoACliente($data, $info);
        
        

  } else {
    $jsondata["success"] = false;
        $jsondata["data"] = array(
          'message' => "SOMETHING WENT WRONG"
        );

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
  }



?>
