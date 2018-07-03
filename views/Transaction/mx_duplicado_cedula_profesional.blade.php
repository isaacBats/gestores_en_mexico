@extends('layouts.default')
@section('page_title', 'Gestores en México | Duplicado de cédula profesional')
@section('content')
	<div class="aliceBlue paddingContent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 requisitos">
                    {{-- <h1 class="titulo mayus">Duplicado de cédula profesional</h1>
                    <h4 class="mayus light azul">Duplicado de cédula profesional </h4>
                    <p>¿Por alguna razón ajena a ti extraviaste tu cedula profesional? no te preocupes ¡Nosotros tramitamos tu reposición por ti.</p>
                    <p>El trámite es realizado en la Dirección General de Profesiones de la Secretaria de Educación Pública.</p>
                    <p>El tiempo de gestoría empieza a correr desde la fecha en que se agenda cita en la dependencia para ingreso a trámite.</p>
                    <h4 class="mayus light azul">Requisitos</h4>
                    <ul>
                        <li>4 fotografías recientes, tamaño infantil en blanco y negro con fondo blanco en papel mate</li>
                        <li>Copia de la Cédula Profesional y/o del Título Profesional que contenga en su reverso el sello del registro ante la Dirección General de Profesiones</li>
                        <li>Recibo del pago de derechos </li>
                        <li>Solicitud debidamente requisitada (misma que será enviada por correo electrónico)</li>
                        <li>Poder notarial</li>
                    </ul>
                    <p>El domicilio de envío de sus documentos y el nombre del gestor responsable de realizar su trámite se le notificara vía correo electrónico una vez reportado su pago.</p>

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
@stop