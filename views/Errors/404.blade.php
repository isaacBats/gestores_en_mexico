@extends('layouts.default')
@section('page_title', 'Gestores en México | Aviso de Privacidad')
@section('content')
    <div class="aliceBlue paddingContent">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-5 col-md-6">
                    <h1 class="titulo mayus">404 Not Found</h1>
                    <!-- <h3 class="mayus light">trámites sin complicaciones, tan sólo en 3 sencillos pasos</h3> -->
                </div>
            </div>

            <div class="row pushTreinta">
                <div class="col-md-12 mayus azul h3">
                    {{ $error }}
                </div>
            </div>

        </div>
    </div>

    <div class="callCentre paddingContent">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 centrar">
                <h3 class="blanco mayus light">¿Necesitas algún trámite?</h3>
                <h4 class="blanco light centrar mayus">comunícate con nosotros</h4>
                
                <div class="row">
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
    </div>
@stop