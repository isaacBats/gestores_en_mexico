<div class="col-md-12">
    <h5>Datos del titular</h5>
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="nombres" placeholder="Nombre(s)" required="true">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="apellidoPaterno" placeholder="Apellido paterno" required="true">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="apellidoMaterno" placeholder="Apellido materno" required="true">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="email" placeholder="Email" type="email" required="true">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="telefono" placeholder="Teléfono" required="true">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="celular" placeholder="Celular" required="true">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="calle" placeholder="Calle" required="true">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="numeroext" placeholder="Número exterior" required="true">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="numeroint" placeholder="Número interior" required="true">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="colonia" placeholder="Colonia" required="true">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="cp" placeholder="Código Postal" required="true">
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="delmun" placeholder="Delegación / Municipio" required="true">
</div>
<div class="col-md-4">
    <select name="estado" id="estado" class="form-control light">
        <option value="" selected>País donde surtirá efecto</option>
        @foreach ($contries as $contry)
            <option value="{{ $contry->id }}">{{ utf8_encode($contry->name) }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4">
    <select name="estadodireccion" id="estadodireccion" class="form-control light">
        <option value="">Seleccionar Estado</option>
        @foreach ($states as $state)
            <option value="{{ $state->id }}">{{ utf8_encode($state->name) }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4">
    <input class="form-control materail-input light" id="referencia" placeholder="Referencia" required="true">
</div>