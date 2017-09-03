@extends('layouts.default')
@section('page_title', 'Gestores en México | Nosotros')
@section('content')
	<div class="container paddingContent">
	    <div class="row">
	        <div class="col-md-12">
	            <h1 class="titulo mayus">Gracias</h1>
	            <h2>
	            	<strong>{{ $rs->status }}</strong> {{ $rs->message }}
	            </h2>
	        </div>

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