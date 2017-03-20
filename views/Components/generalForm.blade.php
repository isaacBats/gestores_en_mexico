<div class="row">
    <div class="col-md-8 col-md-offset-2 form">
        <h3 class="light azul">Completa el siguiente formulario
        <span>para solicitar tu trámite</span></h3>
        <div class="col-md-12">
            <h5>Datos generales para cualquier trámite</h5>
        </div>
        <div id="validacion_forzosos" >
            <div class="col-md-4">
                <select name="gral-estado" id="gral-estado" class="form-control light">
                    <option value="">Seleccionar Estado</option>
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{ utf8_encode($state->name) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <select name="gral-ncopias" id="gral-ncopias" class="form-control light">
                    <option value="0">Copias</option>
                    <option value="1">1 Copia</option>
                    <option value="2">2 Copias</option>
                    <option value="3">3 Copias</option>
                    <option value="4">4 Copias</option>
                    <option value="5">5 Copias</option>
                </select>
            </div>
            <div class="col-md-4">
                <select name="gral-paisEfecto" id="gral-paisEfecto" class="form-control light">
                    <option value="" selected>País donde surtirá efecto</option>
                    @foreach ($contries as $contry)
                        <option value="{{ $contry->id }}">{{ utf8_encode($contry->name) }}</option>
                    @endforeach
                </select>
            </div>
            @include('Components.holder', compact('states', 'contries'))
        </div>
        @include('Components.reciver', compact('states', 'contries'))
        <div class="col-md-12">
            <div class="field">
                <textarea class="light" name="mensaje" rows="4" id="mensaje" placeholder="Mensaje adicional :)" tabindex="5"></textarea>
            </div>
        </div>

        <div class="col-md-12 calculoCosto">
            <h4>Costo por concepto de <span class="tituloTramite">Acta de nacimiento</span></h4>
            <div class="col-md-8 col-md-offset-2">
                <div class="col-md-6">
                    <span id="costoTramite" class="costoTexto">Costo del trámite</span>
                    <span id="costoCopias" class="costoTexto">Copias adicionales</span>
                    <span id="costoEnvio" class="costoTexto">Envío</span>
                    <span id="costoTotal" class="costoTexto">Total</span>
                </div>
                <div class="col-md-6">
                    <span id="costoTramitePesos" class="costoNumeros">$ 1,390 <sup>mn</sup></span>
                    <span id="costoCopiasPesos" class="costoNumeros">$ 200 <sup>mn</sup></span>
                    <span id="costoEnvioPesos" class="costoNumeros">$ 350 <sup>mn</sup></span>
                    <span id="costoTotalPesos" class="costoNumeros"><strong>$1,940 <sup>mn</sup></strong></span>
                </div>

            </div>
            <hr>
            <div class="col-md-12">
                <label>
                    <input type="checkbox" id="terminosycondiciones" checked="checked" class="check" required="true"> He leído y acepto el <a href="aviso-de-privacidad.php" target="_blank" class="transitions">Aviso de Privacidad</a>
                </label>
            </div>
            <span id="validation_error" style="color:red;" ></span>
            <br/>
            <button id="button_Send" class="btn material-btn_lg material-btn_success main-container__column">Enviar mi solicitud</button>

        </div>
    </div>
</div>