@extends('layouts.default')
@section('page_title', 'Gestores en México | Trámites internacionales')
@section('content')
	<div class="container paddingContent">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <h1 class="titulo mayus">Trámites internacionales</h1>
	        </div>
            <div class="col-md-8 col-md-offset-2 internacionales">
                <h2>Gestores en México tiene mucha experiencia en prestación de servicios migratorios</h2>
                <h3>En el cual contamos con abogados altamente especializados en materia migratoria, de esa manera podremos brindarle un servicio seguro, transparente y con resultados favorables.</h3>
                
                <h4>Nuestros servicios en materia Migratoria son:</h4>
                <div class="col-md-6">
                    <ul>
                        <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Visitantes</li>
                        <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Residencia Temporal</li>
                        <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Residencia Permanente</li>
                        <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Cambio de condición de Estancia</li>
                        <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Condicion Migratoria por vínculo familiar</li>
                        <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Regularización Migratoria</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Visa de Estudiante</li>
                        <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Visa por oferta de empleo</li>
                        <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Reposición de Residencia por extravío</li>
                        <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Permiso de Salida y entrada</li>
                        <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Notificaciones al INM <span>(Instituto Nacional de Migración)</span></li>
                        <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Naturalización</li>
                    </ul>
                </div>
            </div>
	    </div>
	    <div class="row">
	        <div class="col-md-12">
                <div class="formBg clearfix">
                    <div class="center back">
                        <div class="tituloForm">
                            <h3 class="light">Para recibir mayor información de algún trámite internacional<br> 
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
                            <div class="form-group col-md-6">
                                <input class="form-control" name="tramite-internacional" type="text" id="tramite-internacional" placeholder="Trámite que deseas" tabindex="4" title="Trámite internacional">
                            </div>
                            <div class="col-md-6">
                                <label>País desde donde nos contactas</label>
                                <select name="pais" class="form-control">
                                    <option value="" selected>País desde donde nos contactas</option>
                                    @foreach ($countries as $cuontry)
                                        <option value="{{ $cuontry->id }}" {{ ($cuontry->id == 142) ? 'selected' : '' }}>{{ utf8_encode($cuontry->name) }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="attr_pais" value="142">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="mensaje" rows="4" id="mensaje" placeholder="Detalles de tu trámite" tabindex="5"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="Privacidad" checked="checked"> He leído y acepto el <a href="/aviso-privacidad" role="button" class="transitions" target="_blank">Aviso de Privacidad</a>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input class="btn btn-large btn-success transitions" type="submit" tabindex="6" value="Enviar" >
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
                        <p>En Gestores de México nunca aceptamos pagos a nombre de una persona física.</p>
                    </div>
	            </div>
	        </div>
	    </div>
	</div>
@stop