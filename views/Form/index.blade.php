@extends('layouts.admin')
@section('page_title', 'Lista de formularios')
@section('content')
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Lista de formularios para tramites</h3>
      </div>
        <div class="panel-body">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="table-responsive">
                    <table class="table table-hover nomargin">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{--*/ $i = 1 /*--}}
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ utf8_encode($transaction->name) }}</td>
                                <td>
                                    <ul class="table-options">
                                        <li>
                                            <a href="/admin/formulario/{{ $transaction->id }}">
                                                <i class="fa fa-edit"></i>
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
  </div>
@stop