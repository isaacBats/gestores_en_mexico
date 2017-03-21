<div class="col-md-4">
    <input class="form-control materail-input light" id="nombres" placeholder="Nombre(s)">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="apellidoPaterno" placeholder="Apellido paterno">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="apellidoMaterno" placeholder="Apellido materno">
</div>

<div class="col-md-4">
    <input class="form-control materail-input light" id="curp" placeholder="CURP">
</div>
<div class="col-md-4">
    <select name="estado" id="sexo" class="form-control light">
        <option value="0">Seleccionar sexo</option>
        <option value="1">Hombre</option>
        <option value="2">Mujer</option>
    </select>
</div>
<div class="col-md-4">
    <select name="gral-estado" id="gral-estado" class="form-control light">
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
    <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
        <input class="form-control" size="16" type="text" value="" readonly="">
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    <input type="hidden" id="dtp_input2" value=""><br>
</div>
<div class="col-md-4">
    <h5>Fecha de registro</h5>
</div>
<div class="col-md-8">
    <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
        <input class="form-control" size="16" type="text" value="" readonly="">
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    <input type="hidden" id="dtp_input2" value=""><br>
</div>

<div class="col-md-4">
    <input class="form-control materail-input light" id="no_acta" placeholder="No. de acta">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="no_libro" placeholder="No. de libro">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="foja" placeholder="Foja y/o Partida">
</div>

<div class="col-md-4">
    <input class="form-control materail-input light" id="juzgado_oficialia" placeholder="Juzgado u Oficialia">
</div>

<div class="col-md-4">
    <input class="form-control materail-input light" id="nombre_padre" placeholder="Nombre del padre">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="nombre_madre" placeholder="Nombre de la madre">
</div>

<div class="col-md-12">
    <h6>Adjunta copia de tu documento (archivos .jpg con peso máximo de 1Mb)</h6>
</div>

<div class="col-md-12">
    <div class="form-group">
        <input id="file-1" type="file" class="file" multiple=true data-preview-file-type="any">
    </div>
</div>