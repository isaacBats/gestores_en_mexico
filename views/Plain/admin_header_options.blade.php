@extends('layouts.admin')
@section('page_title', 'Lista de formularios')
@section('content')
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Panel de configuración de las opciones del header</h3>
      </div>
      <div class="panel-group" id="accordion">
            <div class="panel">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    1. Teléfono
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                  <form method="post">
                      <div class="form-group">
                          <label for="telephone" >Teléfono Primario</label>
                          <input type="text" name="telephone" class="form-control" placeholder="55-5555-5555" id="telephone" value="{{ $transaction->form->title }}">
                      </div>
                      <input type="submit" class="btn btn-primary col-sm-offset-10" value="Actualizar">
                  </form>
                </div>
              </div>
            </div>
            {{-- <div class="panel">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
                      2. How long do I have to wait after payment?
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                    One of the main advantages of the download sales is the immediate delivery of the product at any time of the day. So, once the payment is accepted, it is a matter of minutes till you get the e-mails. Even better: the download links and the License number(s) are also shown in your browser right after the transaction, so there is even no need to wait.
                  </div>
                </div>
            </div> --}}
            {{--<div class="panel">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
                    3. In which currency can I pay?
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                  <p>The payments can be done in 15 different currencies (see [info] on the ShareIt transaction page). However, if you prefer to pay in US Dollars, British Pounds or any currency other than Euro, please consider that various exchange fees will be applied. For currencies other than USD or GBP, for example, the charge applied by ShareIt can be as much as 9 %.</p>
                </div>
              </div>
            </div> --}}
          </div>
    </div>
  </div>
@stop
{{-- @section('scripts')
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
@stop --}}