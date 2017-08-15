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