@extends('layouts.default')
@section('page_title', 'Gestores en México | Apostilla de constancia de soltería')
@section('content')
	<div class="aliceBlue paddingContent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 requisitos">
                    <h1 class="titulo mayus">Apostilla de constancia de soltería</h1>
                    <p>Para hacer válida tu constancia en otro país dentro del convenio de la haya, necesitarás apostillarla, Nosotros lo hacemos por ti. No la tienes aún?  </p>
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
                    <div class="col-md-12 blanco">
                        <h2><i class="fa fa-whatsapp" aria-hidden="true"></i> 55 2718 9072</h3>
                        <p class="centrar">Desde cualquier parte de México</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop