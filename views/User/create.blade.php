@extends('layouts.admin')
@section('page_title', 'Crear usuario')
@section('content')
	<div class="col-sm-8 col-sm-offset-2">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Crear usuario</h3>
			</div>
			<div class="panel-body">
				{{ $form }}
			</div>
		</div>
	</div>
@stop