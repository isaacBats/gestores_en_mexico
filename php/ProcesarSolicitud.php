<?php

/*
  © 2017 Israel Morales Polendo
 * Solicita el calculo de la información requerida a la bd
 */

function ProcesarSolicitudDeTiempoRequerido($db, $data){
    $conn2 = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['db'],$db['port']);
    $sql = "CALL consultar_tiempo_requerido('" . $data->gral_clave . "','" . $data->estado . "','" . $data->estado_envio . "');";
    
    $result = mysqli_query($conn2, $sql);
    
    $datos = mysqli_fetch_assoc($result);
    
    $info = array("entrega_min" => $datos["entrega_min"], "entrega_max" => $datos["entrega_max"]);
    
    return $info;
}

function ProcesarSolicitudDeCostos($db, $data){
    $conn2 = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['db'],$db['port']);
    $sql = "CALL consultar_costos('" . $data->gral_clave . "','" . $data->estado . "','" . $data->estado_envio . "');";
    
    $result = mysqli_query($conn2, $sql);
    
    $datos = mysqli_fetch_assoc($result);
    
    $info = array("costo" => $datos["costo"], "costo_por_copia" => $datos["costo_por_copia"], "costo_envio" => $datos["costo_envio"]);
    
    return $info;
}


function ProcesarSolicitud ($db, $data){

    $conn2 = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['db'],$db['port']);
        
    $sql = "bla";
    
    if (! $data->copiarDatos){
    
    $sql = "CALL nueva_solicitud_destinatariodiferente("
            . "'" . $data->datosGrales->gral_clave . "',"
            . "'" . $data->datosGrales->gral_estado . "',"
            . "'" . $data->datosGrales->gral_ncopias . "',"

            . "'" . $data->datosTitular->nombres . "',"
            . "'" . $data->datosTitular->apellidoPaterno . "',"
            . "'" . $data->datosTitular->apellidoMaterno . "',"
            . "'" . $data->datosTitular->email . "',"
            . "'" . $data->datosTitular->telefono . "',"
            . "'" . $data->datosTitular->celular . "',"
            . "'" . $data->datosTitular->calle . "',"
            . "'" . $data->datosTitular->numeroext . "',"
            . "'" . $data->datosTitular->numeroint . "',"
            . "'" . $data->datosTitular->colonia . "',"
            . "'" . $data->datosTitular->cp . "',"
            . "'" . $data->datosTitular->delmun . "',"
            . "'" . $data->datosTitular->estado . "',"
            . "'" . $data->datosTitular->estadodireccion . "',"
            . "'" . $data->datosTitular->referencia . "',"

            . "'" . $data->datosDestinatario->nombres . "',"
            . "'" . $data->datosDestinatario->apellidoPaterno . "',"
            . "'" . $data->datosDestinatario->apellidoMaterno . "',"
            . "'" . $data->datosDestinatario->email . "',"
            . "'" . $data->datosDestinatario->telefono . "',"
            . "'" . $data->datosDestinatario->celular . "',"
            . "'" . $data->datosDestinatario->calle . "',"
            . "'" . $data->datosDestinatario->numeroext . "',"
            . "'" . $data->datosDestinatario->numeroint . "',"
            . "'" . $data->datosDestinatario->colonia . "',"
            . "'" . $data->datosDestinatario->cp . "',"
            . "'" . $data->datosDestinatario->delmun . "',"
            . "'" . $data->datosDestinatario->estado . "',"
            . "'" . $data->datosDestinatario->estadodireccion . "',"
            . "'" . $data->datosDestinatario->referencia . "',"

            . "'" . $data->mensaje . "'"
            . ");";
    } else {
        
    $sql = "CALL nueva_solicitud_mismodestinatario("
            . "'" . $data->datosGrales->gral_clave . "',"
            . "'" . $data->datosGrales->gral_estado . "',"
            . "'" . $data->datosGrales->gral_ncopias . "',"

            . "'" . $data->datosTitular->nombres . "',"
            . "'" . $data->datosTitular->apellidoPaterno . "',"
            . "'" . $data->datosTitular->apellidoMaterno . "',"
            . "'" . $data->datosTitular->email . "',"
            . "'" . $data->datosTitular->telefono . "',"
            . "'" . $data->datosTitular->celular . "',"
            . "'" . $data->datosTitular->calle . "',"
            . "'" . $data->datosTitular->numeroext . "',"
            . "'" . $data->datosTitular->numeroint . "',"
            . "'" . $data->datosTitular->colonia . "',"
            . "'" . $data->datosTitular->cp . "',"
            . "'" . $data->datosTitular->delmun . "',"
            . "'" . $data->datosTitular->estado . "',"
            . "'" . $data->datosTitular->estadodireccion . "',"
            . "'" . $data->datosTitular->referencia . "',"

            . "'" . $data->mensaje . "'"
            . ");";
    }
    
    
    $result = mysqli_query($conn2, $sql);
    
    $datos = mysqli_fetch_assoc($result);
    
    $info = array("clave" => $datos["clave"], "fecha" => $datos["fecha"], "costoTramite" => $datos["costoTramite"], "costoEnvio" => $datos["costoEnvio"], "costoTotal" => $datos["costoTotal"], "institucionBancaria" => $datos["institucionBancaria"], "titularCuenta" => $datos["titularCuenta"], "numeroCuenta" => $datos["numeroCuenta"], "clabeCuenta" => $datos["clabeCuenta"]);
    
    return $info;
}

?>
