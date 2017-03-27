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
    <select name="attr_estado" id="attr_estado" class="form-control light">
        <option value="">Seleccionar Estado</option>
        @foreach ($states as $state)
            <option value="{{ $state->id }}">{{ utf8_encode($state->name) }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4">
    <select name="hold_pais" class="form-control light">
        <option value="" selected>País donde surtirá efecto</option>
        @foreach ($contries as $contry)
            <option value="{{ $contry->id }}">{{ utf8_encode($contry->name) }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4 col-md-offset-8">
    <select name="attr_sexo" id="sexo" class="form-control light">
        <option value="">Seleccionar sexo</option>
        <option value="1">Hombre</option>
        <option value="2">Mujer</option>
    </select>
</div>
<div class="col-md-4">
    <h5>Fecha de nacimiento</h5>
</div>
<div class="col-md-8">
    <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
        <input class="form-control" size="16" type="text" name="attr_fnacimiento" readonly="">
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    <br>
</div>
<div class="col-md-12">
    <h6>Adjunta copia de tu documento (archivos .jpg con peso máximo de 1Mb)</h6>
</div>
<div class="col-md-12">
    <div class="form-group">
        <input name="attr_image" id="file-1" type="file" class="file" data-preview-file-type="any">
    </div>
</div>