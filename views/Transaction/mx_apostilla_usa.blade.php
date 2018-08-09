<div class="col-md-4">
    <select name="attr_pais" class="form-control light" disabled>
        @foreach ($contries as $contry)
            <option value="{{ $contry->id }}" {{ $contry->id == 230 ? 'selected' : '' }} >{{ utf8_encode($contry->name) }}</option>
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