@extends('layouts.default')
@section('page_title', 'Gestores en México | Apostillado de Antecedentes de Reincidencia penal')
@section('content')
	<div class="aliceBlue paddingContent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 requisitos">
	                <img src="/assets/images/bandera-Mexico.svg" class="imgSVG bandera" alt="Gestores en México" title="Gestores en México y Argentina" />
	                <img src="/assets/images/bandera-Argentina.svg" class="imgSVG bandera" alt="Gestores en México" title="Gestores en México y Argentina" />
		            {{-- <h1 class="titulo mayus">Apostillado de Antecedentes de Reincidencia penal</h1> --}}
                    <h1 class="titulo mayus">{{ $transaction->form->title }}</h1>
                    <p>
                        {{ $transaction->form->description }}
                    </p>
	                {{-- <p>En caso de que tu trámite requiera envío de documentos originales a nuestras oficinas, te notificaremos por correo electrónico.</p>
	                <p><em>Tiempo requerido: de 3 a 4 días hábiles aprox.</em></p>
	                <h4 class="mayus light azul">Requisitos</h4>
	                <ul>
	                    <li>Requisito 1</li>
	                    <li>Requisito 2</li>
	                </ul> --}}
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