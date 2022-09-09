<div class="col-md-4">
    <select name="attr_estado" id="attr_estado" class="form-control light">
        <option value="">Seleccionar Estado</option>
        @foreach ($states as $state)
            <option value="{{ $state->id }}">{{ $state->name }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-12">
    <h6>Adjunta copia de tu identificación (archivos .jpg con peso máximo de 1Mb)</h6>
</div>
<div class="col-md-12">
    <div class="form-group">
        <input name="attr_image" id="file-1" type="file" class="file" data-preview-file-type="any">
    </div>
</div>
