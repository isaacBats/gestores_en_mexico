@extends('layouts.default')
@section('page_title', 'Gestores en México | Apostilla de acta de matrimonio')
@section('content')
	<div class="aliceBlue paddingContent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 requisitos">
                    <h1 class="titulo mayus">Apostilla de acta de matrimonio</h1>
                    <p>¿Va a utilizar su acta en otro país? le será necesario el sello del convenio de la halla, evite perder tiempo, hágalo rápido y a la primera, sin largas filas. Nosotros lo hacemos por usted. ¿No la tiene aún? Tramítala aquí.</p>
                    <p><em>En caso de que tu trámite requiera envío de documentos originales a nuestras oficinas, te notificaremos por correo electrónico.</em></p>
                    <p><strong>Para este trámite nos es necesario contar con el original de su acta a apostillar de reciente expedición, es necesario nos la haga llegar, si no la tiene aún despreocúpese, la tramitamos por usted, déjenos saberlo en el espacio de comentarios.</strong></p>
                    <h4 class="mayus light azul noneo">Requisitos</h4>
                    <ul class="noneo">
                        <li>Requisito 1</li>
                        <li>Requisito 2</li>
                    </ul>
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
                    <div class="col-md-6 blanco">
                        <h2><i class="fa fa-phone" aria-hidden="true"></i> 555 5555 5555</h3>
                        <p class="centrar">Desde la Ciudad de México</p>
                    </div>
                    <div class="col-md-6 blanco">
                        <h2><i class="fa fa-phone" aria-hidden="true"></i> 555 5555 5555</h3>
                        <p class="centrar">Del interior de la República</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop