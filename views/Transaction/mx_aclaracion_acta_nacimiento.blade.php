@extends('layouts.default')
@section('page_title', 'Gestores en México | Acta de nacimiento')
@section('content')
	<div class="aliceBlue paddingContent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 requisitos">
                    {{-- <h1 class="titulo mayus">Aclaración acta de nacimiento</h1>
                    <p>Aclaración de acta de nacimiento "y" conjuntiva o copulativa.</p>
                    <ul>
                        <li>Aclaración de apellidos paterno o materno</li>
                        <li>Aclaración de nombre o nombres de pila</li>
                        <li>Aclaración de fecha de registro</li>
                        <li>Aclaración por sexo (femenino/masculino)</li>
                        <li>Aclaración de  lugar de nacimiento</li>
                        <li>Aclaración de datos de actas de defunción</li>
                    </ul>
                    <h4 class="mayus light azul">Requisitos básicos</h4>
                    <ul>
                        <li>5 o más documentos en original y copia del titular de la aclaración donde venga el dato correcto</li>
                        <li>Copia del acta que desea aclarar</li>
                    </ul>
                    <p><strong>Trámite únicamente para la CDMX.</strong></p>
                    <p><em>En caso de que tu trámite requiera envío de documentos originales a nuestras oficinas, te notificaremos por correo electrónico.</em></p> --}}
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
                        <h2><i class="fa fa-whatsapp" aria-hidden="true"></i> 55 2718 9072</h3>
                        <p class="centrar">Desde cualquier parte de México</p>
                        <p>En Gestores de México nunca aceptamos pagos a nombre de una persona física.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop