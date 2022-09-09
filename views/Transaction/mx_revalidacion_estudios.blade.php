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
    <select name="hold_pais" class="form-control light">
        <option value="" selected>País donde cursaste tus estudios</option>
        @foreach ($contries as $contry)
            <option value="{{ $contry->id }}">{{ $contry->name }}</option>
        @endforeach
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
