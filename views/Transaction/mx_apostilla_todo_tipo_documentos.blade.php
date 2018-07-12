@extends('layouts.default')
@section('page_title', 'Gestores en México | Apostilla de todo tipo de documentos')
@section('content')
	<div class="aliceBlue paddingContent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 requisitos">
                    {{-- <h1 class="titulo mayus">Apostilla de documentos no listados</h1>
                    <p>Si el documento que necesita apostillar no figura en el catálogo, pregúntenos si es posible apostillarlo, o envíenos la imagen por anversos y reveso al correo contacto@gestoresenmexico.com Desde ya, estamos a tu disposición para realizar cualquier tipo de trámite que requiera ser apostillado.</p>
                    <p><em>En caso de que tu trámite requiera envío de documentos originales a nuestras oficinas, te notificaremos por correo electrónico.</em></p>
                    <h4 class="mayus light azul noneo">Requisitos</h4>
                    <ul class="noneo">
                        <li>Requisito 1</li>
                        <li>Requisito 2</li>
                    </ul> --}}
                    <h1 class="titulo mayus">{{ $transaction->form->title }}</h1>
                    <p>
                        {{ $transaction->form->description }}
                    </p>
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
                        <h2><i class="fa fa-whatsapp" aria-hidden="true"></i> {{ $whats }}</h2>
                        <p class="centrar">Desde cualquier parte de México</p>
                        <p>En Gestores de México nunca aceptamos pagos a nombre de una persona física.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop