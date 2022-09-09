<div class="col-md-4">
    <input name="attr_name" class="form-control materail-input light" id="nombres" placeholder="Nombre(s)" required >
</div>
<div class="col-md-4">
    <input name="attr_paterno" class="form-control materail-input light" id="apellidoPaterno" placeholder="Apellido paterno" required >
</div>
<div class="col-md-4">
    <input name="attr_materno" class="form-control materail-input light" id="apellidoMaterno" placeholder="Apellido materno" required >
</div>
<div class="col-md-4">
    <input name="attr_curp" class="form-control materail-input light" id="curp" placeholder="CURP">
</div>
<div class="col-md-4">
    <select name="attr_sexo" id="sexo" class="form-control light">
        <option value="">Seleccionar sexo</option>
        <option value="1">Hombre</option>
        <option value="2">Mujer</option>
    </select>
</div>
<div class="col-md-4">
    <select name="attr_estado" id="attr_estado" class="form-control light">
        <option value="">Seleccionar Estado</option>
        @foreach ($states as $state)
            <option value="{{ $state->id }}">{{ $state->name }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4 col-md-offset-8">
    <input name="attr_municipio" class="form-control materail-input light" id="municiopioDelRegistro" placeholder="Municipio o Delegación">
</div>
<div class="col-md-4">
    <h5>Fecha de nacimiento</h5>
</div>
<div class="col-md-8">
    <input class="form-control" size="16" type="date" name="attr_fnacimiento">
    <br>
</div>
