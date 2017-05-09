@extends('layouts.admin')
@section('page_title', 'Lista de tramites')
@section('content')
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Ingresos / Listado de Registrados</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped nomargin">
						<thead>
							<tr>
								<th>#</th>
								<th>Registro</th>
								<th>Cliente</th>
								<th>Correo</th>
								<th>Estatus</th>
								<th>Tramite</th>
								<th>Total</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($requisitions as $row)
								<tr>
									<td>GE-{{ $row->id }}</td>
									<td>{{ $row->date_created->format('d-m-Y H:i:s') }}</td>
									<td>{{ $row->client->first_name }} {{ $row->client->middle_name }} {{ $row->client->last_name }}</td>
									<td>{{ $row->client->email }}</td>
									<td>{{ $row->status }}</td>
									<td>{{ utf8_encode($row->transaction->name) }}</td>
									<td>{{ sprintf("$%01.2f", $row->total_cost) }}</td>
									<td>
										<ul class="table-options">
											<li>
												<a href="">
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