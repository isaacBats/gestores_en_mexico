<!-- Copiar datos -->
<div class="col-md-12">
    <h5>Datos para el envío del documento</h5>
    <label>Utilizar los mismos datos del titular para el envío
        <input type="checkbox" id="copiarDatos" checked="checked" class="check">
    </label>
</div>
<div id="validacion_opcionales">
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-nombres" placeholder="Nombre(s)" required="true">
    </div>
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-apellidoPaterno" placeholder="Apellido paterno" required="true">
    </div>
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-apellidoMaterno" placeholder="Apellido materno" required="true">
    </div>
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-email" placeholder="Email" type="email" required="true">
    </div>
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-telefono" placeholder="Teléfono" required="true">
    </div>
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-celular" placeholder="Celular" required="true">
    </div>
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-calle" placeholder="Calle" required="true">
    </div>
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-numeroext" placeholder="Número exterior" required="true">
    </div>
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-numeroint" placeholder="Número interior" required="true">
    </div>
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-colonia" placeholder="Colonia" required="true">
    </div>
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-cp" placeholder="Código Postal" required="true">
    </div>
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-delmun" placeholder="Delegación / Municipio" required="true">
    </div>

    <div class="col-md-4">
        <select name="estado" id="des-estado" class="form-control light">
            <option value="" selected>País donde surtirá efecto</option>
            @foreach ($contries as $contry)
                <option value="{{ $contry->id }}">{{ utf8_encode($contry->name) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <select name="des-estadodireccion" id="des-estadodireccion" class="form-control light">
            <option value="">Seleccionar Estado</option>
            @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ utf8_encode($state->name) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <input class="form-control materail-input light" id="des-referencia" placeholder="Referencia" required="true">
    </div>
</div>