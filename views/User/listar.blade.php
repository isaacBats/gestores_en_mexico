@extends('layouts.admin')
@section('page_title', 'Lista de usuarios')
@section('css')
<link rel="stylesheet" href="/assets/lib/jquery-toggles/toggles-full.css">
@stop
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
						@foreach ($users as $person)
							<tr>
								<td class="text-center">{{ $i++ }}</td>
								<td>{{ $person->first_name .' '. $person->last_name}}</td>
								<td>{{ $person->email }}</td>
								<td>{{ $person->user_name }}</td>
								<td class="text-center">{{ $person->type_user }}</td>
								<td>
									<ul class="table-options">
										<li><a href="/admin/usuario/editar/{{ $person->id }}"><i class="fa fa-pencil"></i></a></li>
										<li><a href="/admin/usuario/borrar/{{ $person->id }}" id="delete-user"><i class="fa fa-trash"></i></a></li>
										<li>
							                <div class="toggle toggle-light info" data-toggle-on="{{ $person->is_active }}" data-user-id="{{ $person->id }}"></div>
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
@stop
@section('scripts')
<script src="/assets/lib/jquery-toggles/toggles.min.js"></script>
<script type="text/javascript">
	$('.toggle').toggles({
		text: {
			on: 'Activo',
			off: 'Inactivo'
		},
		width: 70,
	});

	// Desactiva / activa usuario 
	$('table').on('click', '.toggle', function () {
		var $toggleData = $(this).data('toggles');
		var data = {};
		data.status = $toggleData.active;
		data.user = $(this).data('user-id');
		$.post('/admin/usuario/cambiar-status', data, function(json){
			$('html,body').animate({
                scrollTop: $(".mainpanel").offset().top
            }, 2000);
			json = JSON.parse(json);
            var html = '<div class="alert '+(json.exito ? 'alert-info' : 'alert-warning')+' fade in">' +
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                            json.message +
                        '</div>';
            $('.contentpanel').prepend(html);
		});
	});
</script>
@stop