@extends('layouts.admin')
@section('page_title', $state->name)
@section('content')
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Precios para los tramites en {{ utf8_encode($state->name) }}</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped nomargin">
						<thead>
							<tr>
								<th>#</th>
								<th>Tramite</th>
								<th>Precio</th>
								<th>Precio por copia</th>
								<th>Precio envio</th>
								<th>Tiempo minimo</th>
								<th>Tiempo maximo</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							{{--*/ $i = 1 /*--}}
							@foreach ($prices as $row)
								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $row->transaction->name }}</td>
									<td>{{ $row->cost }}</td>
									<td>{{ $row->copy_cost }}</td>
									<td>{{ $row->copy_send }}</td>
									<td>{{ $row->delivery_min }}</td>
									<td>{{ $row->delivery_max }}</td>
									<td>
										<ul class="table-options">
											<li>
												<a href="/admin/precios/editar/{{ $state->code }}/{{ $row->id }}">
													<i class="fa fa-pencil"></i>
												</a>
											</li>
											<li>
												<a href="/admin/precios/{{ $state->code }}/{{ $paramStateName }}/delete/{{ $row->id }}" id="delete-price">
													<i class="fa fa-trash"></i>
												</a>
											</li>
										</ul>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>
@stop
@section('scripts')
	<script type="text/javascript">
		$('a#delete-price').on('click', function(event) {
	        event.preventDefault();
	        var routeAction = $(this).attr('href');
	        var $modal = $('#generalModal');
	        var $form = $modal.find('form');
	        var trFather = $(this).parent().parent().parent().parent();
	        var precio = trFather.find('td')[1].innerHTML;
	        $form.attr('action', routeAction).attr('method', 'post');
	        $modal.find('.modal-title').html('Eliminar precio');
	        $modal.find('.modal-body p').html('¿Seguro que quieres eliminar el precio de <strong>'+precio+'</strong> ?');
	        $modal.find('#btn-submit').html('Eliminar');
	        $modal.modal('show');
	    });
	</script>
@stop