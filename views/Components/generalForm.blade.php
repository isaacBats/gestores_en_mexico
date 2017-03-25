<div class="row">
    <div class="col-md-8 col-md-offset-2 form">
        <form action="" method="post" enctype="multipart/form-data" id="form-transaction">
            <input type="hidden" name="id_transaction" value="{{ $transaction->id }}">        
            <h3 class="light azul">Completa el siguiente formulario
            <span>para solicitar tu trámite</span></h3>
            <div class="col-md-12">
                <h5>Datos generales para el trámite</h5>
            </div>
            <div id="validacion_forzosos" >
                @include($templateFields, compact('states', 'transaction'))
                @include('Components.holder', compact('states', 'contries'))
            </div>
            @include('Components.reciver', compact('states', 'contries'))
            <div class="col-md-12">
                <div class="field">
                    <textarea class="light" name="form_mensaje" rows="4" id="mensaje" placeholder="Mensaje adicional :)" tabindex="5"></textarea>
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
                        <input type="checkbox" id="terminosycondiciones" checked="checked" class="check" required> He leído y acepto el <a href="/aviso-privacidad" target="_blank" class="transitions">Aviso de Privacidad</a>
                    </label>
                </div>
                <span id="validation_error" style="color:red;" ></span>
                <br/>
                <input type="submit" id="button_Send" class="btn material-btn_lg material-btn_success main-container__column" value="Enviar mi solicitud" />
            </div>
        </form>
    </div>
</div>