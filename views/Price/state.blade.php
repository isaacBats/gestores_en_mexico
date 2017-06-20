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
									<td>{{ utf8_encode($row->transaction->name) }}</td>
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
												<a href="">
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