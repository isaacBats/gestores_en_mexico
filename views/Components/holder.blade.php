<div class="col-md-12">
    <h5>Datos del solicitante</h5>
    <label>Utilizar los mismos datos del titular para el envío
        <input name="cb_reciver" type="checkbox" id="cb_reciver" class="check">
    </label>
</div>
<div class="col-md-4">
    <input name="hold_name" class="form-control materail-input light" id="hold_name" placeholder="Nombre(s)" required>
</div>
<div class="col-md-4">
    <input name="hold_paterno" class="form-control materail-input light" id="hold_paterno" placeholder="Apellido paterno" required>
</div>
<div class="col-md-4">
    <input name="hold_materno" class="form-control materail-input light" id="hold_materno" placeholder="Apellido materno" required>
</div>
<div class="col-md-4">
    <input name="hold_email" class="form-control materail-input light" id="hold_email" placeholder="Email" type="email" required>
</div>
<div class="col-md-4">
    <input name="hold_tel" class="form-control materail-input light" id="hold_tel" placeholder="Teléfono" required>
</div>
<div class="col-md-4">
    <input name="hold_mobil" class="form-control materail-input light" id="hold_mobil" placeholder="Celular" required>
</div>
<div class="col-md-12">
    <h5>Datos para el envío del documento</h5>
</div>
<div id="validacion_opcionales">
    <div class="col-md-4">
        <input name="hold_calle" class="form-control materail-input light" id="hold_calle" placeholder="Calle" required>
    </div>
    <div class="col-md-4">
        <input name="hold_num_ext" class="form-control materail-input light" id="hold_num_ext" placeholder="Número exterior" required>
    </div>
    <div class="col-md-4">
        <input name="hold_num_int" class="form-control materail-input light" id="hold_num_int" placeholder="Número interior" >
    </div>
    <div class="col-md-4">
        <input name="hold_colonia" class="form-control materail-input light" id="hold_colonia" placeholder="Colonia" required>
    </div>
    <div class="col-md-4">
        <input name="hold_cp" class="form-control materail-input light" id="hold_cp" placeholder="Código Postal" required>
    </div>
    <div class="col-md-4">
        <input name="hold_municipio" class="form-control materail-input light" id="hold_municipio" placeholder="Delegación / Municipio" required>
    </div>

    <div class="col-md-4">
        {{-- // TODO: @vistaReciver Quitar el combo de seleccion de pais y cambiar la logica para que el campo sea un input text. --}}
        <select name="hold_pais" id="hold_pais" class="form-control light">
            <option value="" selected>País donde surtirá efecto</option>
            @foreach ($contries as $contry)
                <option value="{{ $contry->id }}" {{ ($contry->code === strtoupper($codeContry)) ? 'selected' : '' }}>
                    {{ utf8_encode($contry->name) }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        {{-- // TODO: @vistaReciver Quitar el combo de seleccion de estado y cambiar la logica para que el campo sea un input text. --}}
        <select name="hold_estado" id="hold_estado" class="form-control light">
            <option value="">Seleccionar {{ ($codeContry == 'mx') ? 'Estado' : 'Provincia' }}</option>
            @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ utf8_encode($state->name) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <input name="hold_referencia" class="form-control materail-input light" id="hold_referencia" placeholder="Referencia" >
    </div>
</div>