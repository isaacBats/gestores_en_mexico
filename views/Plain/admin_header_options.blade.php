@extends('layouts.admin')
@section('page_title', 'Lista de formularios')
@section('content')
  <form method="post">
    <div class="row">
      <input type="submit" class="btn btn-primary btn-lg col-sm-offset-10" value="Salvar todos los cambios">
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
                    <div class="form-group">
                        <label for="telephone" >Teléfono Primario</label>
                        <input type="text" name="telephone_header" class="form-control" placeholder="(55)5555 5555" id="telephone" value="{{ $phone }}">
                    </div>
              </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
                  2. Whatsapp
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body">
                    <div class="form-group">
                        <label for="whatsapp" >Whatsapp</label>
                        <input type="text" name="whatsapp_header" class="form-control" placeholder="(55)5555 5555" id="whatsapp" value="{{ $whats }}">
                    </div>
              </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
                  3. Dirección
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
              <div class="panel-body">
                    <div class="form-group">
                        <label for="direccion" >Dirección</label>
                        <input type="text" name="direccion_header" class="form-control" placeholder="Dirección" id="direccion" value="{{ $direction }}">
                    </div>
              </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour">
                  4. Email
                </a>
              </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
              <div class="panel-body">
                    <div class="form-group">
                        <label for="email" >Correo</label>
                        <input type="text" name="email_header" class="form-control" placeholder="contacto@gestores.com" id="email" value="{{ $correo }}">
                    </div>
              </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFive">
                  5. Horario
                </a>
              </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
              <div class="panel-body">
                <div class="form-group col-sm-3">
                    <label for="hora_ini" >Hora Inicio</label>
                    <input type="text" name="hora_ini_header" class="form-control" placeholder="8:00 hrs" id="hora_ini" value="{{ $horaIni }}">
                    <span class="help-block">Favor de poner el sufijo <strong>hr</strong> ú <strong>hrs</strong> según corresponda</span>
                </div>
                <div class="form-group col-sm-3">
                    <label for="hora_fin" >Hora Fin</label>
                    <input type="text" name="hora_fin_header" class="form-control" placeholder="18:00 hrs" id="hora_fin" value="{{ $horaFin }}">
                    <span class="help-block">Favor de poner el sufijo <strong>hr</strong> ú <strong>hrs</strong> según corresponda</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
@stop