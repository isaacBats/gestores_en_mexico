<div class="col-md-12">
    <h5>Datos del solicitante</h5>
</div>
<div class="col-md-4">
    <input name="hold_name" class="form-control materail-input light" id="nombres" placeholder="Nombre(s)" required>
</div>
<div class="col-md-4">
    <input name="hold_paterno" class="form-control materail-input light" id="apellidoPaterno" placeholder="Apellido paterno" required>
</div>
<div class="col-md-4">
    <input name="hold_materno" class="form-control materail-input light" id="apellidoMaterno" placeholder="Apellido materno" required>
</div>
<div class="col-md-4">
    <input name="hold_email" class="form-control materail-input light" id="email" placeholder="Email" type="email" required>
</div>
<div class="col-md-4">
    <input name="hold_tel" class="form-control materail-input light" id="telefono" placeholder="Teléfono" required>
</div>
<div class="col-md-4">
    <input name="hold_mobil" class="form-control materail-input light" id="celular" placeholder="Celular" required>
</div>
<div class="col-md-4">
    <input name="hold_calle" class="form-control materail-input light" id="calle" placeholder="Calle" required>
</div>
<div class="col-md-4">
    <input name="hold_num_ext" class="form-control materail-input light" id="numeroext" placeholder="Número exterior" required>
</div>
<div class="col-md-4">
    <input name="hold_num_int" class="form-control materail-input light" id="numeroint" placeholder="Número interior" required>
</div>
<div class="col-md-4">
    <input name="hold_colonia" class="form-control materail-input light" id="colonia" placeholder="Colonia" required>
</div>
<div class="col-md-4">
    <input name="hold_cp" class="form-control materail-input light" id="cp" placeholder="Código Postal" required>
</div>
<div class="col-md-4">
    <input name="hold_municipio" class="form-control materail-input light" id="delmun" placeholder="Delegación / Municipio" required>
</div>
<div class="col-md-4">
    <select name="hold_pais" class="form-control light">
        <option value="" selected>País donde surtirá efecto</option>
        @foreach ($contries as $contry)
            <option value="{{ $contry->id }}">{{ utf8_encode($contry->name) }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4">
    <select name="hold_estado" class="form-control light">
        <option value="">Seleccionar Estado</option>
        @foreach ($states as $state)
            <option value="{{ $state->id }}">{{ utf8_encode($state->name) }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4">
    <input name="hold_referencia" class="form-control materail-input light" id="referencia" placeholder="Referencia" required>
</div>