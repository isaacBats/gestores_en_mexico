@extends('layouts.admin')
@section('page_title', 'Lista de precios')
@section('content')
	<div class="row">
		<h1>Precios</h1>
		@foreach ($contries as $contry)
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">{{ $contry->name }}</h3>
				</div>
				<div class="panel-body">
					<div class="table-responnsive">
						<table class="table table-striped nomargin">
							<thead>
								<tr>
									<th>#</th>
									<th>Estado</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								{{--*/ $i = 1 /*--}}
								@foreach ($states as $key => $state)
									@if($state->id_contry === $contry->id) 
										<tr>
											<td>{{ $i++ }}</td>
											<td>{{ $state->name }}</td>
											<td>
												<ul class="table-options">
													<li>
														<a href="/admin/precios/{{ $state->code_slug }}/{{ $state->slug }}">
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
									@endif
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@stop