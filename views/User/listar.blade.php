@extends('layouts.admin')
@section('page_title', 'Lista de usuarios')
@section('content')
	<div class="panel">
		<div class="panel-heading">
			<h4 class="panel-title">Lista de usuarios</h4>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped nomargin">
					<thead>
						<tr>
							<th class="text-center">
		                    	#
		                  	</th>
							<th>Name</th>
							<th>Email</th>
							<th>Username</th>
							<th class="text-center">Tipo</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						{{--*/ $i = 1 /*--}}
						@foreach ($users as $user)
							<tr>
								<td class="text-center">{{ $i++ }}</td>
								<td>{{ $user->first_name .' '. $user->last_name}}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->user_name }}</td>
								<td class="text-center">{{ $user->type_user }}</td>
								<td>
									<ul class="table-options">
										<li><a href="/admin/usuario/editar/{{ $user->id }}"><i class="fa fa-pencil"></i></a></li>
										<li><a href="/admin/usuario/borrar/{{ $user->id }}" id="delete-user"><i class="fa fa-trash"></i></a></li>
									</ul>
								</td>
			                </tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop