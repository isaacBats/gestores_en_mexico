@extends('layouts.admin')
@section('page_title', 'Editar atributo')
@section('content')
	<div class="col-sm-8 col-sm-offset-2">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Editar atributo</h3>
			</div>
			<div class="panel-body">
				{{ $form }}
			</div>
		</div>
	</div>
@stop