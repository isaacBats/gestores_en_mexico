@extends('layouts.admin')
@section('page_title', 'Lista de formularios')
@section('content')
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Editar {{ $transaction->name }}</h3>
      </div>
        <div class="panel-body">
            <div class="col-sm-8 col-sm-offset-2">
                <form method="post">
                    <div class="form-group">
                        <label for="title" >Titulo</label>
                        <input type="text" name="title" class="form-control" placeholder="Titulo" id="title" value="{{ $transaction->form->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description" >Descripción</label>
                        <textarea name="description" class="form-control summernote" id="description">
                          {{ $transaction->form->description }}  
                        </textarea>
                    </div>
                    <input type="submit" class="btn btn-primary col-sm-offset-10" value="Actualizar">
                </form>
            </div>
        </div>
    </div>
  </div>
@stop
@section('scripts')
    <script src="/assets/lib/summernote/summernote.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          'use strict';
          $('.summernote').summernote({
            height: 350,
            placeholder: 'Decripción del formulario aquí'
          });

        });
    </script>
@stop
@section('css')
    <link rel="stylesheet" href="/assets/lib/summernote/summernote.css">
@stop