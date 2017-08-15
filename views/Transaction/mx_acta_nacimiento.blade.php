@extends('layouts.default')
@section('page_title', 'Gestores en México | Acta de nacimiento')
@section('content')
	<div class="aliceBlue paddingContent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 requisitos">
                    <h1 class="titulo mayus" id="titulo" >Acta de Nacimiento</h1>
                    <input type="hidden" id="clave" value="ACTNAC">
                    <p>En caso de que tu trámite requiera envío de documentos originales a nuestras oficinas, te notificaremos por correo electrónico.</p>
                    <p id ="tiempo_requerido_ok"><em>Tiempo requerido: de <span id="entrega_minima">_</span> a <span id="entrega_maxima">_</span> días hábiles aprox.</em></p>
                    <p id="tiempo_requerido_nook"><em>Seleccione el Estado y la direcci&oacute;n de destino para calcular el tiempo estimado de env&iacute;o</em></p>
                    <h4 class="mayus light azul">Requisitos</h4>
                    <ul>
                        <li>Requisito 1</li>
                        <li>Requisito 2</li>
                    </ul>
                </div>
            </div>
            @include('Components.generalForm', compact('states', 'contries'))
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