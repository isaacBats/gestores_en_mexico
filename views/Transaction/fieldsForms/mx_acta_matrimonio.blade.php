<div class="col-md-4">
    <input name="attr_nombre_esposo" class="form-control materail-input light" id="nombres" placeholder="Nombre(s) del Esposo">
</div>
<div class="col-md-4">
    <input name="attr_paterno_esposo" class="form-control materail-input light" id="apellidoPaterno" placeholder="Apellido paterno del Esposo">
</div>
<div class="col-md-4">
    <input name="attr_materno_esposo" class="form-control materail-input light" id="apellidoMaterno" placeholder="Apellido materno del Esposo">
</div>

<div class="col-md-4">
    <input name="attr_nombre_esposa" class="form-control materail-input light" id="nombres" placeholder="Nombre(s) de la Esposa">
</div>
<div class="col-md-4">
    <input name="attr_paterno_esposa" class="form-control materail-input light" id="apellidoPaterno" placeholder="Apellido paterno de la Esposa">
</div>
<div class="col-md-4">
    <input name="attr_materno_esposa" class="form-control materail-input light" id="apellidoMaterno" placeholder="Apellido materno de la Esposa">
</div>

<div class="col-md-4">
    <h5>Fecha de matrimonio</h5>
</div>
<div class="col-md-8">
    <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" placeholder="Fecha de matrimonio">
        <input class="form-control" size="16" type="text" name="attr_fmatrimonio" readonly="">
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    <br>
</div>
<div class="col-md-4">
    <input name="attr_municipio" class="form-control materail-input light" id="municiopioDelRegistro" placeholder="Municipio o Delegación de Registro">
</div>
<div class="col-md-4">
    <select name="attr_regimen_matrimonial"  class="form-control light">
        <option value="">Régimen Matrimonial</option>
        <option value="sociedad_conyugal">Sociedad conyugal</option>
        <option value="separacion_bienes">Separación de bienes</option>
    </select>
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
    <input name="attr_nombre_padre_esposo" class="form-control materail-input light" id="nombre_del_padre_de_esposo" placeholder="Nombre del Padre del Esposo">
</div>
<div class="col-md-4">
    <input name="attr_nombre_madre_esposo" class="form-control materail-input light" id="nombre_de_madre_de_esposo" placeholder="Nombre de la Madre del Esposo">
</div>
<div class="col-md-4">
    <input name="attr_nombre_padre_esposa" class="form-control materail-input light" id="nombre_del_padre_de_esposa" placeholder="Nombre del Padre de la Esposa">
</div>
<div class="col-md-4">
    <input name="attr_nombre_madre_esposa" class="form-control materail-input light" id="nombre_de_madre_de_esposa" placeholder="Nombre de la Madre de la Esposa">
</div>
<div class="col-md-4">
    <select name="attr_estado" id="gral-estado" class="form-control light">
        <option value="">Seleccionar Estado</option>
        @foreach ($states as $state)
            <option value="{{ $state->id }}">{{ utf8_encode($state->name) }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-12">
    <h6>Adjunta copia de tu documento (archivos .jpg con peso máximo de 1Mb)</h6>
</div>
<div class="col-md-12">
    <div class="form-group">
        <input name="attr_image" id="file-1" type="file" class="file" data-preview-file-type="any">
    </div>
</div>