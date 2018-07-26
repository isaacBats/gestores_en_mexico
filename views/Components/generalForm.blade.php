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
                @include($fields, compact('states', 'transaction'))
                <div class="col-md-12">
                    <div class="field">
                        <textarea class="light" name="attr_mensaje" rows="4" id="mensaje" placeholder="Mensaje adicional :)" tabindex="5"></textarea>
                    </div>
                </div>
            </div>
            @include('Components.holder', compact('states', 'contries', 'codeContry'))
            <div class="col-md-12 calculoCosto">
                <h4>Costo por concepto de <span class="tituloTramite">{{ utf8_encode($transaction->name) }}</span></h4>
                <div class="col-md-8 col-md-offset-2" id="pricesTransaction">
                    @if ($transaction->code_product == 'SERV_CER_LIBGRAV' || $transaction->code_product == 'SERV_DOC_FOLCDMX')
                        <input type="hidden" name="price_id" id="price_id" value="{{ $costo->id }}"> 
                        <p id="costoTramite" >
                            Costo del trámite $
                            <span id="costoTramitePesos" >{{ $costo->cost }}</span>
                            <sup>mn</sup>
                        </p>
                    @else
                        <input type="hidden" name="price_id" id="price_id" value=""> 
                        <p id="costoTramite" >
                            Costo del trámite $
                            <span id="costoTramitePesos" >0</span>
                            <sup>mn</sup>
                        </p>
                    @endif
                    @if ($transaction->h_copies)
                        <p id="costoCopias">
                            Copias adicionales
                            <input type="hidden" name="value_price_copy" id="value_price_copy" value="">
                            <input type="number" min="0" max="20" name="attr_copies" id="attr_copies" value="0"> $
                            <span id="costoCopiasPesos">0</span>
                            <sup>mn</sup>
                        </p>
                    @endif
                    @if ($transaction->code_product == 'SERV_CER_LIBGRAV' || $transaction->code_product == 'SERV_DOC_FOLCDMX')
                        <p id="costoEnvio">
                            Envío $<span id="costoEnvioPesos">{{ $costo->copy_send }}</span><sup>mn</sup>
                        </p>
                        <p id="costoTotal">
                            Total $
                            <input id="costoTotalPesos" name="attr_total" value="{{ $costo->cost + $costo->copy_send }}" readonly>
                            <sup>mn</sup>
                        </p>
                    @else
                        <p id="costoEnvio">
                            Envío $<span id="costoEnvioPesos">0</span><sup>mn</sup>
                        </p>
                        <p id="costoTotal">
                            Total $
                            <input id="costoTotalPesos" name="attr_total" value="0" readonly>
                            <sup>mn</sup>
                        </p>
                    @endif
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