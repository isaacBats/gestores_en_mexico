<div class="row">
    <div class="col-md-8 col-md-offset-2 form">
        <form action="" method="post" enctype="multipart/form-data" id="form-transaction">
            <input type="hidden" name="id_transaction" id="id_transaction" value="{{ $transaction->id }}">        
            <h3 class="light azul">Completa el siguiente formulario
            <span>para solicitar tu trámite</span></h3>
            <div class="col-md-12">
                <h5>Datos generales para el trámite</h5>
            </div>
            <div id="validacion_forzosos" >
                @include($templateFields, compact('states', 'transaction'))
                @include('Components.holder', compact('states', 'contries', 'codeContry'))
            </div>
            @include('Components.reciver', compact('states', 'contries', 'codeContry'))
            <div class="col-md-12">
                <div class="field">
                    <textarea class="light" name="form_mensaje" rows="4" id="mensaje" placeholder="Mensaje adicional :)" tabindex="5"></textarea>
                </div>
            </div>
            <div class="col-md-12 calculoCosto">
                <h4>Costo por concepto de <span class="tituloTramite">{{ utf8_encode($transaction->name) }}</span></h4>
                <div class="col-md-8 col-md-offset-2" id="pricesTransaction">
                    <p id="costoTramite" >
                        Costo del trámite $
                        <span id="costoTramitePesos" >0</span>
                        <sup>mn</sup>
                    </p>
                    @if ($transaction->h_copies)
                        <p id="costoCopias">
                            Copias adicionales
                            <input type="number" min="0" max="20" name="copies" id="copies" value="1"> $
                            <span id="costoCopiasPesos">0</span>
                            <sup>mn</sup>
                        </p>
                    @endif
                    <p id="costoEnvio">
                        Envío $<span id="costoEnvioPesos">0</span><sup>mn</sup>
                    </p>
                    <p id="costoTotal">
                        Total $
                        <strong id="costoTotalPesos">0</strong>
                        <sup>mn</sup>
                    </p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label>
                        <input name="terminos" type="checkbox" id="terminosycondiciones" checked="checked" class="check" required> He leído y acepto el <a href="/aviso-privacidad" target="_blank" class="transitions">Aviso de Privacidad</a>
                    </label>
                </div>
                <span id="validation_error" style="color:red;" ></span>
                <br/>
                <input type="submit" id="button_Send" class="btn material-btn_lg material-btn_success main-container__column" value="Enviar mi solicitud" />
            </div>
        </form>
    </div>
</div>