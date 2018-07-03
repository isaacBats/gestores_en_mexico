@extends('layouts.default')
@section('page_title', 'Gestores en México | Estatus de tu tramite')
@section('content')
	@forelse ($comments as $comment)
		@if ($comment->type === 'public')
			<div class="container">
				<div class="row">
					<div class="row pushTreinta">
						<div class="col-md-8 col-md-offset-2">
							<h1 class="mayus">Detalles de tu trámite</h1>
						</div>
						<div class="col-md-8 col-md-offset-2 detalles">
							{{ $comment->comment }}
						</div>
					</div>
				</div>
			</div>
		@endif
	@empty
		<span>No hay comentarios para este tramite.!!!</span>
	@endforelse
@stop