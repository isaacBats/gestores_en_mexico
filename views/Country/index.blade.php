@extends('layouts.admin')
@section('page_title', 'Lista de atributos')
@section('content')
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Lista de países activos para tramites</h3>
      </div>
      <div class="panel-body">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="table-responsive">
            <table class="table table-hover nomargin">
              <thead>
                <tr>
                  <th class="text-center">
                    <label class="ckbox ckbox-info">
                      <input type="checkbox">
                      <span></span>
                    </label>
                  </th>
                  <th>#</th>
                  <th>Nombre</th>
                </tr>
              </thead>
              <tbody>
                {{--*/ $i = 1 /*--}}
                @foreach ($countries as $row)
                  <tr>
                    <td class="text-center">
                      <label class="ckbox ckbox-primary">
                        <input type="checkbox" name="{{ $row->id }}">
                        <span></span>
                      </label>
                    </td>
                    <td>{{ $i++ }}</td>
                    <td>{{ $row->name }}</td>
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