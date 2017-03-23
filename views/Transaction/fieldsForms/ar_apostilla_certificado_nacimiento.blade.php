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
<div class="col-md-12">
    <h6>Adjunta copia de tu documento (archivos .jpg con peso máximo de 1Mb)</h6>
</div>
<div class="col-md-12">
    <div class="form-group">
        <input name="attr_image" id="file-1" type="file" class="file" data-preview-file-type="any">
    </div>
</div>