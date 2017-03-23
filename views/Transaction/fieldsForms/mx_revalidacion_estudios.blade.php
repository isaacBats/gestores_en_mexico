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
    <select name="hold_pais" class="form-control light">
        <option value="" selected>País donde cursaste tus estudios</option>
        @foreach ($contries as $contry)
            <option value="{{ $contry->id }}">{{ utf8_encode($contry->name) }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4">
    <select name="nivel" id="nivel" class="form-control light">
        <option value="">Seleccionar nivel de estudios</option>
        <option value="primaria">Primaria</option>
        <option value="secundaria">Secundaria</option>
        <option value="bachillerato">Bachillerato</option>
        <option value="licenciatura">Licenciatura</option>
    </select>
</div>
<div class="col-md-4">
    <input name="attr_institucion" class="form-control materail-input light" id="cedula" placeholder="Institución">
</div>
<div class="col-md-4">
    <input name="attr_semestre" class="form-control materail-input light" id="semestre" placeholder="Semestre">
</div>