@extends('layouts.admin')
@section('page_title', 'Lista de tramites')
@section('content')
	@foreach ($requisitions as $row)
		<h4>{{ $row->status }}</h4>
	@endforeach
@stop