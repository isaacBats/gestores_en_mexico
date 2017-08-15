<!-- Copiar datos -->
<div class="col-md-12">
    <h5>Datos para el envío del documento</h5>
    {{-- <label>Utilizar los mismos datos del titular para el envío
        <input name="cb_reciver" type="checkbox" id="cb_reciver" class="check">
    </label> --}}
</div>
<div id="validacion_opcionales">
    {{-- <div class="col-md-4">
        <input name="reciv_name" class="form-control materail-input light" id="reciv_name" placeholder="Nombre(s)" required>
    </div>
    <div class="col-md-4">
        <input name="reciv_paterno" class="form-control materail-input light" id="reciv_paterno" placeholder="Apellido paterno" required>
    </div>
    <div class="col-md-4">
        <input name="reciv_materno" class="form-control materail-input light" id="reciv_materno" placeholder="Apellido materno" required>
    </div>
    <div class="col-md-4">
        <input name="reciv_email" class="form-control materail-input light" id="reciv_email" placeholder="Email" type="email" required>
    </div>
    <div class="col-md-4">
        <input name="reciv_tel" class="form-control materail-input light" id="reciv_tel" placeholder="Teléfono" required>
    </div>
    <div class="col-md-4">
        <input name="reciv_mobil" class="form-control materail-input light" id="reciv_mobil" placeholder="Celular" required>
    </div> --}}
    <div class="col-md-4">
        <input name="reciv_calle" class="form-control materail-input light" id="reciv_calle" placeholder="Calle" required>
    </div>
    <div class="col-md-4">
        <input name="reciv_num_ext" class="form-control materail-input light" id="reciv_num_ext" placeholder="Número exterior" required>
    </div>
    <div class="col-md-4">
        <input name="reciv_num_int" class="form-control materail-input light" id="reciv_num_int" placeholder="Número interior" required>
    </div>
    <div class="col-md-4">
        <input name="reciv_colonia" class="form-control materail-input light" id="reciv_colonia" placeholder="Colonia" required>
    </div>
    <div class="col-md-4">
        <input name="reciv_cp" class="form-control materail-input light" id="reciv_cp" placeholder="Código Postal" required>
    </div>
    <div class="col-md-4">
        <input name="reciv_municipio" class="form-control materail-input light" id="reciv_municipio" placeholder="Delegación / Municipio" required>
    </div>

    <div class="col-md-4">
        {{-- // TODO: @vistaReciver Quitar el combo de seleccion de pais y cambiar la logica para que el campo sea un input text. --}}
        <select name="reciv_pais" id="reciv_pais" class="form-control light">
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
        <select name="reciv_estado" id="reciv_estado" class="form-control light">
            <option value="">Seleccionar {{ ($codeContry == 'mx') ? 'Estado' : 'Provincia' }}</option>
            @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ utf8_encode($state->name) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <input name="reciv_referencia" class="form-control materail-input light" id="reciv_referencia" placeholder="Referencia" >
    </div>
</div>