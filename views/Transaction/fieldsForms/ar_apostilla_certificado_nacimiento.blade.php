<div class="col-md-4">
    <select name="attr_estado" id="gral-estado" class="form-control light">
        <option value="">Seleccionar Provincia</option>
        @foreach ($states as $state)
            <option value="{{ $state->id }}">{{ utf8_encode($state->name) }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4">
    <select name="attr_copias" id="estado" class="form-control light">
        <option value="">Copias</option>
        <option value="1">1 Copia</option>
        <option value="2">2 Copias</option>
        <option value="3">3 Copias</option>
        <option value="4">4 Copias</option>
        <option value="5">5 Copias</option>
    </select>
</div>
<div class="col-md-4">
    <select name="attr_pais" class="form-control light">
        <option value="" selected>País donde surtirá efecto</option>
        @foreach ($contries as $contry)
            <option value="{{ $contry->id }}">{{ utf8_encode($contry->name) }}</option>
        @endforeach
    </select>
</div>