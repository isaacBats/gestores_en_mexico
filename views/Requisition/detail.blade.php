{{--*/ use Olive\helpers\Utils; /*--}}
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
					<form action="" method="post" id="form-detail-transaction">
						<table class="table table-bordered table-striped-col nomargin">
							<tbody>
								<tr>
									<th class="text-right" >#</th>
									<td>GMX-{{ $requisition->id }}</td>
								</tr>
								<tr>
									<th class="text-right" >Código</th>	
									<td>{{ $requisition->id_public }}</td>
								</tr>
								<tr>
									<th class="text-right" >Registro</th>	
									<td>{{ $requisition->date_created->format('d-m-Y H:i:s') }}</td>
								</tr>
								<tr>
									<th class="text-right" >Tramite</th>	
									<td>{{ $requisition->transaction->name }}</td>
								</tr>
								<tr>
									<th class="text-right" >Lugar de solicitud</th>	
									<td>{{ $requisition->client->state->name }}</td>
								</tr>
								<tr>
									<th class="text-right" >Copias adicionales</th>	
									<td>
										@if ($requisition->transaction->h_copies)
											@foreach ($requisition->attributes as $attribute)
												@if ($attribute->attribute->attribute == 'attr_copies')
													{{ $attribute->value }}
												@endif
											@endforeach
										@else
											0
										@endif									
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
											<input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control" value="{{ $fecha_entrega }}">
										</div>
									</td>
								</tr>
								<tr>
									<th>Estatus</th>
									<td>
										<div class="form-group">
											<select name="status" id="status" class="form-control" data-email="{{ $requisition->client->email }}" data-idtransaction={{ $requisition->id }}>
												@foreach ($options as $key => $item)
													<option value={{ $item }} {{ $requisition->status == $item ? 'selected' : ''}} >{{ Utils::getStatus($item) }}</option>
												@endforeach	
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<th>Mensajería</th>
									<td>
										<div class="form-group col-sm-6">
											<input type="text" name="attr_mensajeria" class="form-control" value="{{ !is_null($requisition->messeger) ? $requisition->messeger : '' }}" />
										</div>
									</td>
								</tr>
								<tr>
									<th>Guía</th>
									<td>
										<div class="form-group col-sm-6">
											<input type="text" name="attr_guia" class="form-control" value="{{ !is_null($requisition->guia) ? $requisition->guia : '' }}" />
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
						<tbody id="data-reciver">
							<tr>
								<td class="text-right" >Nombre</td>
								<td id="reciver-name">{{ $requisition->client->first_name }}</td>
							</tr>
							<tr>
								<td class="text-right" >Apellido Paterno</td>	
								<td id="reciver-last-name">{{ $requisition->client->middle_name }}</td>
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
								<td id="reciver-email">{{ $requisition->client->email }}</td>
							</tr>
							<tr>
								<td class="text-right" >Telefono Fijo</td>	
								<td>{{ $requisition->client->telephone }}</td>
							</tr>
							<tr>
								<td class="text-right" >Celular</td>	
								<td>{{ $requisition->client->mobile }}</td>
							</tr>
							<tr>
								
								<td class="panel-title" >Dirección de envio</td>
							</tr>
							<tr>
								<td class="text-right" >Pais</td>	
								<td>{{ $requisition->client->contry->name }}</td>
							</tr>
							<tr>
								<td class="text-right" >Dirección</td>	
								<td>{{ $requisition->client->address . ' No. Ext: ' . $requisition->client->num_extern . ' No. Int: ' . $requisition->client->num_inside }}</td>
							</tr>
							<tr>
								<td class="text-right" >Colonia</td>	
								<td>{{ $requisition->client->settlement }}</td>
							</tr>
							<tr>
								<td class="text-right" >C.P.:</td>	
								<td>{{ $requisition->client->zip_code }}</td>
							</tr>
							<tr>
								<td class="text-right" >Delegación / Municipio</td>	
								<td>{{ $requisition->client->township }}</td>
							</tr>
							<tr>
								<td class="text-right" >Estado</td>	
								<td>{{ $requisition->client->state->name }}</td>
							</tr>
							<tr>
								<td class="text-right" >Referencia</td>	
								<td>{{ $requisition->client->reference }}</td>
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
							@foreach ($attributes as $key => $attribute)
								@if ($key != 'attr_copies' 
									&& $key != 'attr_total' 
									&& $key != 'attr_image')
									<tr>
										<td class="text-right" >{{ $attribute['name'] }}</td>
										<td>{{ $attribute['value'] }}</td>
									</tr>
								@endif
								@if ($key == 'attr_image')
									<tr>
										<td class="text-right">{{ $attribute['name'] }}</td>
										<td>
											<img src="{{ $attribute['value'] }}" class="mw-80 img-thumbnail">
										</td>
									</tr>
								@endif
							@endforeach
							@if ($requisition->message)
								<tr>
									<td class="text-right" >Mensaje Cliente</td>
									<td>{{ $requisition->message }}</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	{{-- Comentarios publicos y privados --}}
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Comentarios privados</h3>
			</div>
			<div class="panel-body">
				<form action="/comment/private/add" method="post">
					<input type="hidden" name="id_requisition" value="{{ $requisition->id }}">
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
									<th>Usuario</th>
									<th>Comentario</th>
								</tr>
							</thead>
							<tbody>
								{{--*/ $i = 1 /*--}}
								@foreach ($requisition->comments_private as $private)
									<tr>
										<td>{{ $i++ }}</td>
										<td>{{ $private->created_at->format('d-m-Y H:i:s') }}</td>
										<td>{{ $private->user->first_name .' '. $private->user->last_name }}</td>
										<td>{{ $private->comment }}</td>
									</tr>
								@endforeach
							</tbody>
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
					<input type="hidden" name="id_requisition" value="{{ $requisition->id }}">
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
									<th>Usuario</th>
									<th>Comentario</th>
								</tr>
							</thead>
							<tbody>
								{{--*/ $i = 1 /*--}}
								@foreach ($requisition->comments_public as $public)
									<tr>
										<td>{{ $i++ }}</td>
										<td>{{ $public->created_at->format('d-m-Y H:i:s') }}</td>
										<td>{{ $public->user->first_name .' '. $public->user->last_name }}</td>
										<td>{{ $public->comment }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="modal fade" id="modalNotification" tabindex="-1" role="dialog">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h4 class="modal-title">Modal title</h4>
		      	</div>
		      	<div class="modal-body">
		        	<p>One fine body&hellip;</p>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        	<button type="button" class="btn btn-primary btn-submit">Save changes</button>
		      	</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@stop
@section('scripts')
	<script src="/assets/lib/summernote/summernote.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		  'use strict';
		  $('.summernote').summernote({
		    height: 80,
		    placeholder: 'Escribe un comentario'
		  });

		});
	</script>
@stop
@section('css')
	<link rel="stylesheet" href="/assets/lib/summernote/summernote.css">
@stop
