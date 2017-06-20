@extends('layouts.admin')
@section('page_title', 'Lista de atributos')
@section('content')
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Lista de atributos para los formularios de tramites</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped nomargin">
						<thead>
							<tr>
								<th>#</th>
								<th>Atributo</th>
								<th>Nombre</th>
								<th>Creado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($attributes as $row)
								<tr>
									<td></td>
									<td>{{ $row->attribute }}</td>
									<td>{{ $row->display_name }}</td>
									<td>{{ $row->date_created->format('d-m-Y H:i:s') }}</td>
									<td>
										<ul class="table-options">
											<li>
												<a href="/admin/atributo/{{ $row->id }}">
													<i class="fa fa-edit"></i>
												</a>
											</li>
											<li>
												<a href="/admin/atributo/borrar/{{ $row->id }}" id="delete-attribute" >
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