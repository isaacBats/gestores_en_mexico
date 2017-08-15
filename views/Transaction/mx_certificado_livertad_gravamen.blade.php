@extends('layouts.default')
@section('page_title', 'Gestores en México | Certificado de libertad o gravamen')
@section('content')
	<div class="aliceBlue paddingContent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 requisitos">
                    <h1 class="titulo mayus">Certificado de libertad o gravamen</h1>
                    <p>El certificado de libertad de existencia o inexistencia de gravámenes, se emite para comprobar la situación jurídica un inmueble en cuanto a los gravámenes, como hipotecas por ejemplo.</p>
                    <p><em>En caso de que tu trámite requiera envío de documentos originales a nuestras oficinas, te notificaremos por correo electrónico.</em></p>
                    
                    <h4 class="mayus light azul">Requisitos</h4>
                    <ul>
                        <li>Domicilio del Inmueble </li>
                        <li>Nombre del o los Propietarios </li>
                        <li>Folio Real</li>
                    </ul>
                    <p><strong>Trámite únicamente para la CDMX.</strong></p>
                    <p>Los requisitos arriba señalados son indispensables, la falta de uno de ellos imposibilita el trámite. Favor de anotarlos en la parte de “comentarios".</p>
                </div>
            </div>
            @include('Components.generalForm', compact('states', 'contries', 'templateFields', 'transaction', 'costo'))
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