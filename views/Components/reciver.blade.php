<!-- Copiar datos -->
<div class="col-md-12">
    <h5>Datos para el envío del documento</h5>
    <label>Utilizar los mismos datos del titular para el envío
        <input name="cb_reciver" type="checkbox" id="copiarDatos" checked="checked" class="check">
    </label>
</div>
<div id="validacion_opcionales">
    <div class="col-md-4">
        <input name="reciv_name" class="form-control materail-input light" id="des-nombres" placeholder="Nombre(s)" required="true">
    </div>
    <div class="col-md-4">
        <input name="reciv_paterno" class="form-control materail-input light" id="des-apellidoPaterno" placeholder="Apellido paterno" required="true">
    </div>
    <div class="col-md-4">
        <input name="reciv_materno" class="form-control materail-input light" id="des-apellidoMaterno" placeholder="Apellido materno" required="true">
    </div>
    <div class="col-md-4">
        <input name="reciv_email" class="form-control materail-input light" id="des-email" placeholder="Email" type="email" required="true">
    </div>
    <div class="col-md-4">
        <input name="reciv_tel" class="form-control materail-input light" id="des-telefono" placeholder="Teléfono" required="true">
    </div>
    <div class="col-md-4">
        <input name="reciv_mobil" class="form-control materail-input light" id="des-celular" placeholder="Celular" required="true">
    </div>
    <div class="col-md-4">
        <input name="reciv_calle" class="form-control materail-input light" id="des-calle" placeholder="Calle" required="true">
    </div>
    <div class="col-md-4">
        <input name="reciv_num_ext" class="form-control materail-input light" id="des-numeroext" placeholder="Número exterior" required="true">
    </div>
    <div class="col-md-4">
        <input name="reciv_num_int" class="form-control materail-input light" id="des-numeroint" placeholder="Número interior" required="true">
    </div>
    <div class="col-md-4">
        <input name="reciv_colonia" class="form-control materail-input light" id="des-colonia" placeholder="Colonia" required="true">
    </div>
    <div class="col-md-4">
        <input name="reciv_cp" class="form-control materail-input light" id="des-cp" placeholder="Código Postal" required="true">
    </div>
    <div class="col-md-4">
        <input name="reciv_municipio" class="form-control materail-input light" id="des-delmun" placeholder="Delegación / Municipio" required="true">
    </div>

    <div class="col-md-4">
        <select name="reciv_pais" id="des-estado" class="form-control light">
            <option value="" selected>País donde surtirá efecto</option>
            @foreach ($contries as $contry)
                <option value="{{ $contry->id }}">{{ utf8_encode($contry->name) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <select name="reciv_estado" id="des-estadodireccion" class="form-control light">
            <option value="">Seleccionar Estado</option>
            @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ utf8_encode($state->name) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <input name="reciv_referencia" class="form-control materail-input light" id="des-referencia" placeholder="Referencia" required="true">
    </div>
</div>