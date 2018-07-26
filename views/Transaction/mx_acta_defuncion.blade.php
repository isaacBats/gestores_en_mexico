<div class="col-md-4">
    <input name="attr_name" class="form-control materail-input light" id="nombres" placeholder="Nombre(s)">
</div>
<div class="col-md-4">
    <input name="attr_paterno" class="form-control materail-input light" id="apellidoPaterno" placeholder="Apellido paterno">
</div>
<div class="col-md-4">
    <input name="attr_materno" class="form-control materail-input light" id="apellidoMaterno" placeholder="Apellido materno">
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
            <option value="{{ $state->id }}">{{ utf8_encode($state->name) }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4">
    <h5>Fecha de nacimiento</h5>
</div>
<div class="col-md-8">
    <input class="form-control" size="16" type="date" name="attr_fnacimiento">
    <br>
</div>
<div class="col-md-4">
    <h5>Fecha de defunción</h5>
</div>
<div class="col-md-8">
    <input class="form-control" size="16" type="date" name="attr_fdefuncion">
    <br>
</div>
<div class="col-md-4">
    <input name="attr_no_acta" class="form-control materail-input light" id="no_acta" placeholder="No. de acta">
</div>
<div class="col-md-4">
    <input name="attr_no_libro" class="form-control materail-input light" id="no_libro" placeholder="No. de libro">
</div>
<div class="col-md-4">
    <input name="attr_foja" class="form-control materail-input light" id="foja" placeholder="Foja y/o Partida">
</div>

<div class="col-md-4">
    <input name="attr_juzgado" class="form-control materail-input light" id="juzgado_oficialia" placeholder="Juzgado u Oficialia">
</div>

<div class="col-md-4">
    <input name="attr_nom_padre" class="form-control materail-input light" id="nombre_padre" placeholder="Nombre del padre">
</div>
<div class="col-md-4">
    <input name="attr_nom_madre" class="form-control materail-input light" id="nombre_madre" placeholder="Nombre de la madre">
</div>

<div class="col-md-12">
    <h6><span class="azul italic">**Opcional** </span>Adjunta copia de tu documento (archivos .jpg con peso máximo de 1Mb)</h6>
</div>

<div class="col-md-12">
    <div class="form-group">
        <input name="attr_image" id="file-1" type="file" class="file" data-preview-file-type="any">
    </div>
</div>