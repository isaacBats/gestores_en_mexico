@extends('layouts.default')
@section('page_title', 'Gestores en México | Contacto')
@section('content')
	<div class="container paddingContent">
	    <div class="row">
	        <div class="col-md-12">
	            <h1 class="titulo mayus">Contacto</h1>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-md-6 google-maps noneo">
	                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60205.37718509265!2d-99.22448158264157!3d19.419487475335025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x42e2e5c1a219c3af!2sBosque+de+Chapultepec!5e0!3m2!1ses!2smx!4v1485971076645" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
	        </div>
	        <div class="col-md-12">  
                <div class="formBg clearfix">
                    <div class="center back">
                        <div class="tituloForm">
                            <h3 class="light">Para recibir mayor información <br> 
                                <span>regístrate en el siguiente formulario</span>
                            </h3>
                        </div>
                     
                    </div>

                    <div id="formulario">
                        <form class="form-inline" role="form" action="/contacto" method="POST" id="contacto" >
                            <div class="form-group col-md-6">
                                <input class="form-control" name="nombre" type="text" required="required" id="nombre" placeholder="nombre" tabindex="1" title="Nombre">
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control" name="apellidos" type="text" id="apellidos" placeholder="apellidos" tabindex="2" title="apellidos">
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control" name="email" type="email" required="required" id="email" placeholder="email" tabindex="3" title="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control" name="telefono" type="text" id="telefono" placeholder="teléfono" tabindex="4" title="Telefono">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="mensaje" rows="4" id="mensaje" placeholder="mensaje :)" tabindex="5"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="Privacidad" checked="checked"> He leído y acepto el <a href="/aviso-privacidad" role="button" class="transitions" target="_blank">Aviso de Privacidad</a>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input class="btn btn-large btn-success transitions" type="submit" tabindex="6" >
                            </div>
                        </form>
                    </div>
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
	                <div class="col-md-12 blanco">
                        <h2><i class="fa fa-whatsapp" aria-hidden="true"></i> 55 2718 9072</h3>
                        <p class="centrar">Desde cualquier parte de México</p>
                    </div>
	            </div>
	        </div>
	    </div>
	</div>
@stop