{{--*/ use Olive\helpers\Utils; /*--}}
@extends('layouts.admin')
@section('page_title', 'Lista de tramites')
@section('content')
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Ingresos / Listado de Registrados</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<form id="bootpag_text_count">                
		                <div class="col-sm-12">
	                        <div class="form-group col-md-3">
	                        	<label class="control-label" for="status">Estatus:</label>
	                            <select name="status" class="form-control" id="status">
	                                <option value="todos">Todos</option>
	                                @foreach ($status as $item)
										<option value={{ $item }}>{{ Utils::getStatus($item) }}</option>
									@endforeach
	                            </select>
	                        </div>
	                        <div class="form-group col-md-5">
	                            <div class="col-md-6">
	                            	<span>Registro desde </span>
	                            	<input class="form-control" type="date" name="desde" id="desde">
	                            </div>
	                            <div class="col-md-6">
	                            	<span> hasta </span>
									<input class="form-control" type="date" name="hasta" id="hasta">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                        	<span>Buscar</span>
	                        	<div class="input-group">
					            	<input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar por...">
					            	<span class="input-group-btn">
					              		<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
					            	</span>
					          	</div><!-- input-group -->
					        </div>
	                        <div class="col-md-1">
	                        	<span>.</span>
	                        	<button type="submit" class="btn btn-default" id="btn-buscador" >Filtrar</button>
	                        </div>
		                </div>
		                <div class="col-sm-12">
		                	<div class="col-sm-1 push-right">
				                <div class="form-group" id="bootpag_nummc">
				                    <label for="exampleInputName2">Mostrar &nbsp;</label>
				                    <input type="hidden" value="1" name="page" id="current_page">
				                    <select id="bootpag_text_count_select" name="numpp" class="form-control input-sm">
				                        <option value="5">5</option>
				                        <option value="10">10</option>
				                        <option value="25">25</option>
				                        <option value="50">50</option>
				                        <option value="100">100</option>
				                    </select>
				                    <label for="exampleInputName2">&nbsp; Registros</label>
				                </div>    
		                	</div>
		                </div>
		            </form>
				</div>
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
									<td>GMX-{{ $row->id }}</td>
									<td>{{ $row->date_created->format('d-m-Y H:i:s') }}</td>
									<td>{{ $row->client->first_name }} {{ $row->client->middle_name }} {{ $row->client->last_name }}</td>
									<td>{{ $row->client->email }}</td>
									<td>{{ Utils::getStatus($row->status) }}</td>
									<td>{{ utf8_encode($row->transaction->name) }}</td>
									<td>{{ sprintf("$%01.2f", $row->total_cost) }}</td>
									<td>
										<ul class="table-options">
											<li>
												<a href="/admin/tramites/{{ $row->id }}">
													<i class="fa fa-search"></i>
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
					<div class="col-md-6">
						<p id="bootpag_text">
							Mostrando registros del <b>{{ $page + 1 }}</b> al <b>{{ $end }}</b> de un total de <b>{{ $count }}</b> registros.
						</p>
					</div>
    				<div class="col-md-6"><p id="bootpag_pag" data-count="{{ $count }}"></p></div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('scripts')
	<script src="/assets/js/jquery.bootpag.min.js"></script>
	<script src="/assets/lib/purl/purl.min.js"></script>
	<script src="/assets/js/requisitions.paginador.js"></script>
@stop