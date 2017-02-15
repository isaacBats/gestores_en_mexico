<?php

/*
  © 2017 Israel Morales Polendo
 * Recibe la solicitud de cierto tramite en cierto estado y obtiene los precios
 */

include "MysqlVariables.php";
include "ProcesarSolicitud.php";

if (isset($_GET["data"])) {

    $data = json_decode($_GET['data']);
    $info = ProcesarSolicitudDeCostos($dbCredentials, $data); 

    $jsondata["success"] = true;
        $jsondata["data"] = array(
          'message' => 'OKAY',
          'datos' => $info
        );

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
        

  } else {
    $jsondata["success"] = false;
        $jsondata["data"] = array(
          'message' => "SOMETHING WENT WRONG"
        );

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
  }

?>