@extends('layouts.default')
@section('page_title', 'Gestores en México | Registro de título y cédula profesional')
@section('content')
	<div class="aliceBlue paddingContent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 requisitos">
                    <h1 class="titulo mayus">Registro de título y cédula profesional</h1>
                    <p>Toda la documentación que se presenta es en original, respecto a los documentos académicos deben de estar debidamente legalizados. </p>
                    <h4 class="mayus light azul">Requisitos</h4>
                    <ul>
                        <li>Acta de nacimiento</li>
                        <li>Certificado de bachillerato o equivalente</li>
                        <li>Certificado de estudios profesionales</li>
                        <li>Constancia de liberación del servicio social expedida por la Institución que la otorgo</li>
                        <li>Acta de examen profesional o constancia de que no es exigible dicho examen</li>
                        <li>Título Profesional</li>
                        <li>3 fotografías recientes, tamaño infantil en blanco y negro con fondo blanco en papel mate con retoque de frente</li>
                        <li>Recibo de pago de derechos</li>
                        <li>Solicitud debidamente requisitada (misma que será enviada por correo electrónico)</li>
                        <li>Poder notarial</li>
                    </ul>
                    <p>El domicilio de envío de sus documentos originales y el nombre del gestor responsable de realizar su trámite se le notificara vía correo electrónico una vez reportado su pago.</p>
                    <p><em>En caso de que tu trámite requiera envío de documentos originales a nuestras oficinas, te notificaremos por correo electrónico.</em></p>
                    <p>¿Terminaste tu licenciatura y aun no tienes la cédula que lo acredita?</p>
                    <p>En gestoresenmexico.com gestionamos tu registro de título y la expedición de la cédula, tramítala aquí.</p>
                </div>
            </div>
            @include('Components.generalForm', compact('states', 'contries', 'templateFields', 'transaction'))
        </div>
    </div>
    <div class="callCentre paddingContent">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 centrar">
                <h3 class="blanco mayus light">¿Necesitas algún trámite?</h3>
                <h4 class="blanco light centrar mayus">comunícate con nosotros</h4>

                <div class="row">
                    <div class="col-md-12 blanco">
                        <h2><i class="fa fa-whatsapp" aria-hidden="true"></i> 55 2718 9072</h3>
                        <!-- <p class="centrar">Desde la Ciudad de México</p> -->
                    </div>
                    <!-- <div class="col-md-6 blanco">
                        <h2><i class="fa fa-phone" aria-hidden="true"></i> 555 5555 5555</h3>
                        <p class="centrar">Del interior de la República</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
@stop