<div class="col-md-4">
    <select name="attr_estado" id="attr_estado" class="form-control light" disabled>
        <option value="">Seleccionar Estado</option>
        @foreach ($states as $state)
            @if ($state->id == 9)
                <option value="{{ $state->id }}" selected>{{ utf8_encode($state->name) }}</option>
            @endif
            <option value="{{ $state->id }}">{{ utf8_encode($state->name) }}</option>
        @endforeach
    </select>
    <input type="hidden" name="attr_estado" value="9">
</div>
<div class="col-md-4">
    <select name="attr_pais" class="form-control light" disabled>
        <option value="" selected>País donde surtirá efecto</option>
        @foreach ($contries as $contry)
            @if ($contry->id == 142)
                <option value="{{ $contry->id }}" selected >{{ utf8_encode($contry->name) }}</option>
            @endif
            <option value="{{ $contry->id }}">{{ utf8_encode($contry->name) }}</option>
        @endforeach
    </select>
    <input type="hidden" name="attr_pais" value="142">
</div>
<div class="col-md-12">
    <h6>Adjunta copia de tu documento (archivos .jpg con peso máximo de 1Mb)</h6>
</div>
<div class="col-md-12">
    <div class="form-group">
        <input name="attr_image" id="file-1" type="file" class="file" data-preview-file-type="any">
    </div>
</div>