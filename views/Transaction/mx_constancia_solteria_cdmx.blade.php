@extends('layouts.default')
@section('page_title', 'Gestores en México | Constancia de soltería CDMX')
@section('content')
	<div class="aliceBlue paddingContent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 requisitos">
                    <h1 class="titulo mayus">Constancia de soltería CDMX</h1>
                    <p>¿Es necesario para usted  acreditar su estado civil? tal vez contraerá matrimonio o se la soliciten. La tramitamos por usted.</p>
                    <p>Es necesario presentar la copia de tu acta de nacimiento de reciente expedición (no mayor a 5 meses).</p>
                    <p><em>En caso de que tu trámite requiera envío de documentos originales a nuestras oficinas, te notificaremos por correo electrónico.</em></p>
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