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
<div class="col-md-4">
    <input name="attr_folreal" class="form-control materail-input light" id="folioReal" placeholder="Folio Real" >
</div>
<div class="col-md-12">
    <input name="attr_dominm" class="form-control materail-input light" id="domicilioInmueble" placeholder="Domicilio del Inmueble">
</div>
<div class="col-md-12">
    <input name="attr_nomprop" class="form-control materail-input light" id="nombrePropietario" placeholder="Nombre del o los Propietarios ">
</div>



