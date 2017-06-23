@extends('layouts.admin')
@section('page_title', $state->name)
@section('content')
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Editar precios para {{ utf8_encode($price->transaction->name) }} en {{ $state->name }}</h3>
			</div>
			<div class="panel-body">
				<form method="post" >
					<div class="form-group col-sm-3">
						<label for="cost">Costo</label>
						<input type="text" name="cost" class="form-control" value="{{ $price->cost }}" />
					</div>
					@if ($price->transaction->h_copies)
						<div class="form-group col-sm-3">
							<label for="copy_cost">Costo copia</label>
							<input type="text" name="copy_cost" class="form-control" value="{{ $price->copy_cost }}" />
						</div>
						<div class="form-group col-sm-3">
							<label for="copy_send">Costo copia envio</label>
							<input type="text" name="copy_send" class="form-control" value="{{ $price->copy_send }}" />
						</div>
					@endif
					<div class="form-group col-sm-3">
						<label for="">Tiempo mínimo de entrega</label>
						<input type="text" name="delivery_min" class="form-control" value="{{ $price->delivery_min }}" />
					</div>
					<div class="form-group col-sm-3">
						<label for="">Tiempo máximo de entrega</label>
						<input type="text" name="delivery_max" class="form-control" value="{{ $price->delivery_max }}" />
					</div>
					<div class="form-group col-sm-3">
						<input type="submit" value="Actualizar" class="btn btn-primary" style="margin-top: 21px">
					</div>
				</form>
			</div>
		</div>
	</div>
@stop