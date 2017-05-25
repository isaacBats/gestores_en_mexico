@extends('layouts.admin')
@section('page_title', 'Lista de tramites')
@section('content')
	<div class="row">
		<div class="panel panel-default">
			{{-- <div class="panel-heading">
				<h3 class="panel-title">Ingresos / Listado de Registrados</h3>
			</div> --}}
			<div class="panel-body">
				<div class="col-sm-8 col-sm-offset-2 table-responsive">
					<form action="">
						<table class="table table-bordered table-striped-col nomargin">
							<tbody>
								<tr>
									<th class="text-right" >#</th>
									<td>GE-{{ $requisition->id }}</td>
								</tr>
								<tr>
									<th class="text-right" >Código</th>	
									<td>{{ $requisition->id_public}}</td>
								</tr>
								<tr>
									<th class="text-right" >Registro</th>	
									<td>{{ $requisition->date_created->format('d-m-Y H:i:s') }}</td>
								</tr>
								<tr>
									<th class="text-right" >Tramite</th>	
									<td>{{ utf8_encode($requisition->transaction->name) }}</td>
								</tr>
								<tr>
									<th class="text-right" >Opción</th>	
									<td>Aqui va el estado seleccionado al inicio del tramite</td>
								</tr>
								<tr>
									<th class="text-right" >Copias adicionales</th>	
									<td>
										@foreach ($requisition->attributes as $attribute)
											@if ($attribute->attribute->attribute == 'attr_copies')
												{{ $attribute->value }}
											@endif
										@endforeach									
									</td>
								</tr>
								<tr>
									<th class="text-right" >Costo Envío</th>	
									<td>{{ $requisition->price->copy_send }}</td>
								</tr>
								<tr>
									<th class="text-right" >Costo Tramite</th>	
									<td>{{ $requisition->price->cost }}</td>
								</tr>
								<tr>
									<th class="text-right" >Costo copias</th>	
									<td>{{ $requisition->price->copy_cost }}</td>
								</tr>
								<tr>
									<th class="text-right" >Total</th>	
									<td>{{ sprintf("$%01.2f", $requisition->total_cost) }}</td>
								</tr>
								<tr>
									<th>Fecha de entrega</th>
									<td>
										<div class="input-group mb20">
											<spana class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</spana>
											<input type="date" id="fecha_entrega" class="form-control">
										</div>
									</td>
								</tr>
								<tr>
									<th>Estatus</th>
									<td>
										<div class="form-group">
											<select name="status" id="status" class="form-control">
												@foreach ($options as $key => $item)
													<option value={{ $key }}>{{ $item }}</option>
												@endforeach	
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<th>Mensajería</th>
									<td>
										<div class="form-group col-sm-6">
											<input type="text" name="mensajeria" class="form-control" />
										</div>
									</td>
								</tr>
								<tr>
									<th>Guía</th>
									<td>
										<div class="form-group col-sm-6">
											<input type="text" name="guia" class="form-control" />
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="col-sm-offset-5 mt10">
							<button class="btn btn-primary btn-sm" >Modificar</button>
							<button class="btn btn-success btn-sm" >Cancelar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-sm-6">
					<table class="table table-bordered table-striped-col nomargin">
						<thead>
							<tr>
								<td class="panel-title" >Destinatario</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-right" >Nombre</td>
								<td>{{ $requisition->client->first_name }}</td>
							</tr>
							<tr>
								<td class="text-right" >Apellido Paterno</td>	
								<td>{{ $requisition->client->middle_name }}</td>
							</tr>
							<tr>
								<td class="text-right" >Apellido Materno</td>	
								<td>{{ $requisition->client->last_name }}</td>
							</tr>
							<tr>
								<td class="panel-title" >Datos contacto</td>
							</tr>
							<tr>
								<td class="text-right" >Correo</td>	
								<td>{{ $requisition->reciver->email }}</td>
							</tr>
							<tr>
								<td class="text-right" >Telefono Fijo</td>	
								<td>{{ $requisition->reciver->telephone }}</td>
							</tr>
							<tr>
								<td class="text-right" >Celular</td>	
								<td>{{ $requisition->reciver->mobile }}</td>
							</tr>
							<tr>
								
								<td class="panel-title" >Dirección de envio</td>
							</tr>
							<tr>
								<td class="text-right" >Pais</td>	
								<td>{{ $requisition->reciver->contry->name }}</td>
							</tr>
							<tr>
								<td class="text-right" >CP</td>	
								<td>00998</td>
							</tr>
							<tr>
								<td class="text-right" >Calle</td>	
								<td>{{ $requisition->reciver->address }}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-sm-6">
					<table class="table table-bordered table-striped-col nomargin">
						<thead>
							<tr>
								<td class="panel-title">Datos tramite</td>
							</tr>
						</thead>
						<tbody>
							@foreach ($requisition->attributes as $attribute)
								@if ($attribute->attribute->attribute != 'attr_copies' 
									&& $attribute->attribute->attribute != 'attr_total' 
									&& $attribute->attribute->attribute != 'attr_image')
									<tr>
										<td class="text-right" >{{ $attribute->attribute->attribute }}</td>
										<td>{{ $attribute->value }}</td>
									</tr>
								@endif
								@if ($attribute->attribute->attribute == 'attr_image')
									<tr>
										<td class="text-right">{{ $attribute->attribute->attribute }}</td>
										<td>
											<img src="{{ $attribute->value }}" class="mw-80 img-thumbnail">
										</td>
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Comentarios privados</h3>
			</div>
			<div class="panel-body">
				<form action="/comment/private/add" method="post">
					<input type="hidden" name="requisition_id" value="{{ $requisition->id }}">
					<div class="form-group">
						<textarea class="summernote" name="comment" ></textarea>
						<input type="submit" value="Agregar comentario privado" class="btn btn-primary pull-right mt10">
					</div>
				</form>
				<div class="col-sm-12">
					<h3 class="panel-title">Comentarios</h3>
					<br>
					<div class="table-responsive">
						<table class="table table-bordered table-striped-col nomargin">
							<thead>
								<tr>
									<th>#</th>
									<th>Registro</th>
									<th>Usiario</th>
									<th>Fecha</th>
									<th>Comentario</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Comentarios publicos</h3>
			</div>
			<div class="panel-body">
				<form action="/comment/public/add" method="post">
					<input type="hidden" name="requisition_id" value="{{ $requisition->id }}">
					<div class="form-group">
						<textarea class="summernote" name="comment" ></textarea>
						<input type="submit" value="Agregar comentario publico" class="btn btn-primary pull-right mt10">
					</div>
				</form>
				<div class="col-sm-12">
					<h3 class="panel-title">Comentarios</h3>
					<br>
					<div class="table-responsive">
						<table class="table table-bordered table-striped-col nomargin">
							<thead>
								<tr>
									<th>#</th>
									<th>Registro</th>
									<th>Usiario</th>
									<th>Fecha</th>
									<th>Comentario</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
@stop
@section('scripts')
	<script src="/assets/lib/summernote/summernote.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		  'use strict';
		  $('.summernote').summernote({
		    height: 80,
		    placeholder: 'Write one comment...'
		  });

		});
	</script>
@stop
@section('css')
	<link rel="stylesheet" href="/assets/lib/summernote/summernote.css">
@stop