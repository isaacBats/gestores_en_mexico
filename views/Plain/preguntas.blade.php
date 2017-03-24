@extends('layouts.default')
@section('page_title', 'Gestores en México | Preguntas frecuentes')
@section('content')
	<div class="aliceBlue paddingContent">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12">
	                <h1 class="titulo mayus">Preguntas frecuentes</h1>
	                <!-- <h3 class="mayus light">trámites sin complicaciones, tan sólo en 3 sencillos pasos</h3> -->
	            </div>
	        </div>

	        <div class="row pushTreinta">
	            <div class="col-md-12">

	                <div class="panel-group material-accordion material-accordion_primary" id="accordion1">

	                    <div class="panel panel-default material-accordion__panel material-accordion__panel">
	                        <div class="panel-heading material-accordion__heading" id="acc1_headingOne">
	                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#acc1_collapseOne" class="material-accordion__title">¿Puedo solicitar una acta de nacimiento si vivo en otro Estado?</a></h4>
	                        </div>

	                        <div id="acc1_collapseOne" class="panel-collapse collapse in material-accordion__collapse">
	                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, qui in provident cumque eligendi unde recusandae nisi quidem non voluptatibus, aperiam perspiciatis eius eaque corrupti reprehenderit, voluptas explicabo iure quo.
	                            </div>
	                        </div>
	                    </div>

	                    <div class="panel panel-default material-accordion__panel">
	                        <div class="panel-heading material-accordion__heading">
	                            <h4 class="panel-title"><a class="collapsed material-accordion__title" data-toggle="collapse" data-parent="#accordion1" href="#acc1_collapseTwo">¿Cuántas copias certificadas puedo solicitar?</a></h4>
	                        </div>
	                        <div id="acc1_collapseTwo" class="panel-collapse collapse material-accordion__collapse">
	                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab laudantium eaque ex, quibusdam ducimus quidem dignissimos alias asperiores doloremque sunt aliquam dolor totam, neque fuga placeat quis cum suscipit. Facere.
	                            </div>
	                        </div>
	                    </div>

	                    <div class="panel panel-default material-accordion__panel">
	                        <div class="panel-heading material-accordion__heading">
	                            <h4 class="panel-title"><a class="collapsed material-accordion__title" data-toggle="collapse" data-parent="#accordion3" href="#acc3_collapseThree">¿Puedo solicitar un documento de alguien de mi familia?</a></h4>
	                        </div>
	                        <div id="acc3_collapseThree" class="panel-collapse collapse material-accordion__collapse">
	                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab laudantium eaque ex, quibusdam ducimus quidem dignissimos alias asperiores doloremque sunt aliquam dolor totam, neque fuga placeat quis cum suscipit. Facere.
	                            </div>
	                        </div>
	                    </div>

	                    <div class="panel panel-default material-accordion__panel">
	                        <div class="panel-heading material-accordion__heading">
	                            <h4 class="panel-title"><a class="collapsed material-accordion__title" data-toggle="collapse" data-parent="#accordion4" href="#acc4_collapseFour">¿Cómo puedo pagar?</a></h4>
	                        </div>
	                        <div id="acc4_collapseFour" class="panel-collapse collapse material-accordion__collapse">
	                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab laudantium eaque ex, quibusdam ducimus quidem dignissimos alias asperiores doloremque sunt aliquam dolor totam, neque fuga placeat quis cum suscipit. Facere.
	                            </div>
	                        </div>
	                    </div>

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