@extends('layouts.admin')
@section('page_title', 'Crear usuario')
@section('content')
	<div class="col-sm-8 col-sm-offset-2">
		<div class="panel">
			<div class="panel-heading">
				<h2>{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }} <small class="help-block">({{ strtolower($user->user_name) }})</small></h3>
				<hr class="darken">
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="col-sm-10 col-offset-sm-1 col-md-6">
							<a href="javascript:void(0);" class="profile-photo">
								<img src="/{{ $user->image }}" class="img-responsive">
							</a>
						</div>
						<div class="col-sm-10 col-offset-sm-1 col-md-6 card-profile">
							<p>
								<strong>Nombre: </strong> {{ $user->first_name }} {{ $user->last_name }}
							</p>
							<p>
								<strong>Email: </strong> {{ $user->email }}
							</p>
							<p>
								<strong>Tipo de usuario: </strong> {{ $user->type_user == 'admin' ? 'Administrador' : 'Usuario' }}
							</p>
							<p>
								Usuario <strong class="{{ $user->is_active ? : 'text-danger' }}">{{ $user->is_active ? 'Activo' : 'Inactivo' }}</strong>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-3 col-sm-offset-9">
						<a href="/admin/usuario/editar/{{ $user->id }}" class="btn btn-warning"  style="font-size: 18px;"> <strong class="glyphicon glyphicon-refresh" style="color: white;"></strong> Editar perfil</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop