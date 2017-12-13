@extends('layouts.default')
@section('page_title', 'Gestores en México | Estatus de tu tramite')
@section('content')
	@forelse ($comments as $comment)
		@if ($comment->type === 'public')
			<div class="container">
				<div class="row">
					<div class="row pushTreinta">
						<span>
							{{ $comment->comment }}
						</span>
					</div>
				</div>
			</div>
		@endif
	@empty
		<span>No hay comentarios para este tramite.!!!</span>
	@endforelse
@stop