<!DOCTYPE html>
<html lang="es">
<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>Gestores en México | Acta de nacimiento</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
    <meta name="keywords" content="">

    <?php include_once(dirname(__FILE__).'/head.php');?>

    <meta property="og:url"                content="http://www.gestoresenmexico.com" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Trámite de acta de nacimiento" />
    <meta property="og:description"        content="Realizamos casi todo tipo de trámites" />
    <meta property="og:image"              content="http://gestoresenmexico.com/images/imagen.jpg" />

</head>
<body class="gradient">

<?php include_once(dirname(__FILE__).'/menu.php');?>



<div class="aliceBlue paddingContent">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 requisitos">
                <h1 class="titulo mayus" id="titulo" >Acta de Nacimiento</h1>
                <input type="hidden" id="clave" value="ACTNAC">
                <p>En caso de que tu trámite requiera envío de documentos originales a nuestras oficinas, te notificaremos por correo electrónico.</p>
                <p id ="tiempo_requerido_ok"><em>Tiempo requerido: de <span id="entrega_minima">_</span> a <span id="entrega_maxima">_</span> días hábiles aprox.</em></p>
                <p id="tiempo_requerido_nook"><em>Seleccione el Estado y la direcci&oacute;n de destino para calcular el tiempo estimado de env&iacute;o</em></p>
                <h4 class="mayus light azul">Requisitos</h4>
                <ul>
                    <li>Requisito 1</li>
                    <li>Requisito 2</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 form">
                <h3 class="light azul">Completa el siguiente formulario
                <span>para solicitar tu trámite</span></h3>
                <div class="col-md-12">
                    <h5>Datos generales para el trámite</h5>
                </div>
                <div id="validacion_forzosos" >
                <div class="col-md-4">
                    <select name="gral-estado" id="gral-estado" class="form-control light">
                        <option value="0">Seleccionar Estado</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja_California">Baja California</option>
                        <option value="Baja_California_Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Coahuila_de_Zaragoza">Coahuila de Zaragoza</option>
                        <option value="Colima">Colima</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Distrito_Federal">Distrito Federal</option>
                        <option value="Durango">Durango</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Mexico">México</option>
                        <option value="Michoacan_de_Ocampo">Michoacán de Ocampo</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo_Leon">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana_Roo">Quintana Roo</option>
                        <option value="San_Luis_Potosi">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz_de_Ignacio_de_la_Llave">Veracruz de Ignacio de la Llave</option>
                        <option value="Yucatan">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <select name="gral-ncopias" id="gral-ncopias" class="form-control light">
                        <option value="0">Copias</option>
                        <option value="1">1 Copia</option>
                        <option value="2">2 Copias</option>
                        <option value="3">3 Copias</option>
                        <option value="4">4 Copias</option>
                        <option value="5">5 Copias</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <select name="gral-paisEfecto" id="gral-paisEfecto" class="form-control light">
                        <option value="0" selected>País donde surtirá efecto</option>
                        <option value="AF">Afganistán</option>
                        <option value="AL">Albania</option>
                        <option value="DE">Alemania</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antártida</option>
                        <option value="AG">Antigua y Barbuda</option>
                        <option value="AN">Antillas Holandesas</option>
                        <option value="SA">Arabia Saudí</option>
                        <option value="DZ">Argelia</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaiyán</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrein</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BE">Bélgica</option>
                        <option value="BZ">Belice</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermudas</option>
                        <option value="BY">Bielorrusia</option>
                        <option value="MM">Birmania</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia y Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BR">Brasil</option>
                        <option value="BN">Brunei</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="BT">Bután</option>
                        <option value="CV">Cabo Verde</option>
                        <option value="KH">Camboya</option>
                        <option value="CM">Camerún</option>
                        <option value="CA">Canadá</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CY">Chipre</option>
                        <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comores</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, República Democrática del</option>
                        <option value="KR">Corea</option>
                        <option value="KP">Corea del Norte</option>
                        <option value="CI">Costa de Marfíl</option>
                        <option value="CR">Costa Rica</option>
                        <option value="HR">Croacia (Hrvatska)</option>
                        <option value="CU">Cuba</option>
                        <option value="DK">Dinamarca</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egipto</option>
                        <option value="SV">El Salvador</option>
                        <option value="AE">Emiratos Árabes Unidos</option>
                        <option value="ER">Eritrea</option>
                        <option value="SI">Eslovenia</option>
                        <option value="ES">España</option>
                        <option value="US">Estados Unidos</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Etiopía</option>
                        <option value="FJ">Fiji</option>
                        <option value="PH">Filipinas</option>
                        <option value="FI">Finlandia</option>
                        <option value="FR">Francia</option>
                        <option value="GA">Gabón</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GD">Granada</option>
                        <option value="GR">Grecia</option>
                        <option value="GL">Groenlandia</option>
                        <option value="GP">Guadalupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GY">Guayana</option>
                        <option value="GF">Guayana Francesa</option>
                        <option value="GN">Guinea</option>
                        <option value="GQ">Guinea Ecuatorial</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="HT">Haití</option>
                        <option value="HN">Honduras</option>
                        <option value="HU">Hungría</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IQ">Irak</option>
                        <option value="IR">Irán</option>
                        <option value="IE">Irlanda</option>
                        <option value="BV">Isla Bouvet</option>
                        <option value="CX">Isla de Christmas</option>
                        <option value="IS">Islandia</option>
                        <option value="KY">Islas Caimán</option>
                        <option value="CK">Islas Cook</option>
                        <option value="CC">Islas de Cocos o Keeling</option>
                        <option value="FO">Islas Faroe</option>
                        <option value="HM">Islas Heard y McDonald</option>
                        <option value="FK">Islas Malvinas</option>
                        <option value="MP">Islas Marianas del Norte</option>
                        <option value="MH">Islas Marshall</option>
                        <option value="UM">Islas menores de Estados Unidos</option>
                        <option value="PW">Islas Palau</option>
                        <option value="SB">Islas Salomón</option>
                        <option value="SJ">Islas Svalbard y Jan Mayen</option>
                        <option value="TK">Islas Tokelau</option>
                        <option value="TC">Islas Turks y Caicos</option>
                        <option value="VI">Islas Vírgenes (EEUU)</option>
                        <option value="VG">Islas Vírgenes (Reino Unido)</option>
                        <option value="WF">Islas Wallis y Futuna</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italia</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japón</option>
                        <option value="JO">Jordania</option>
                        <option value="KZ">Kazajistán</option>
                        <option value="KE">Kenia</option>
                        <option value="KG">Kirguizistán</option>
                        <option value="KI">Kiribati</option>
                        <option value="KW">Kuwait</option>
                        <option value="LA">Laos</option>
                        <option value="LS">Lesotho</option>
                        <option value="LV">Letonia</option>
                        <option value="LB">Líbano</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libia</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lituania</option>
                        <option value="LU">Luxemburgo</option>
                        <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                        <option value="MG">Madagascar</option>
                        <option value="MY">Malasia</option>
                        <option value="MW">Malawi</option>
                        <option value="MV">Maldivas</option>
                        <option value="ML">Malí</option>
                        <option value="MT">Malta</option>
                        <option value="MA">Marruecos</option>
                        <option value="MQ">Martinica</option>
                        <option value="MU">Mauricio</option>
                        <option value="MR">Mauritania</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">México</option>
                        <option value="FM">Micronesia</option>
                        <option value="MD">Moldavia</option>
                        <option value="MC">Mónaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="MS">Montserrat</option>
                        <option value="MZ">Mozambique</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Níger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk</option>
                        <option value="NO">Noruega</option>
                        <option value="NC">Nueva Caledonia</option>
                        <option value="NZ">Nueva Zelanda</option>
                        <option value="OM">Omán</option>
                        <option value="NL">Países Bajos</option>
                        <option value="PA">Panamá</option>
                        <option value="PG">Papúa Nueva Guinea</option>
                        <option value="PK">Paquistán</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Perú</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PF">Polinesia Francesa</option>
                        <option value="PL">Polonia</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="UK">Reino Unido</option>
                        <option value="CF">República Centroafricana</option>
                        <option value="CZ">República Checa</option>
                        <option value="ZA">República de Sudáfrica</option>
                        <option value="DO">República Dominicana</option>
                        <option value="SK">República Eslovaca</option>
                        <option value="RE">Reunión</option>
                        <option value="RW">Ruanda</option>
                        <option value="RO">Rumania</option>
                        <option value="RU">Rusia</option>
                        <option value="EH">Sahara Occidental</option>
                        <option value="KN">Saint Kitts y Nevis</option>
                        <option value="WS">Samoa</option>
                        <option value="AS">Samoa Americana</option>
                        <option value="SM">San Marino</option>
                        <option value="VC">San Vicente y Granadinas</option>
                        <option value="SH">Santa Helena</option>
                        <option value="LC">Santa Lucía</option>
                        <option value="ST">Santo Tomé y Príncipe</option>
                        <option value="SN">Senegal</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leona</option>
                        <option value="SG">Singapur</option>
                        <option value="SY">Siria</option>
                        <option value="SO">Somalia</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="PM">St Pierre y Miquelon</option>
                        <option value="SZ">Suazilandia</option>
                        <option value="SD">Sudán</option>
                        <option value="SE">Suecia</option>
                        <option value="CH">Suiza</option>
                        <option value="SR">Surinam</option>
                        <option value="TH">Tailandia</option>
                        <option value="TW">Taiwán</option>
                        <option value="TZ">Tanzania</option>
                        <option value="TJ">Tayikistán</option>
                        <option value="TF">Territorios franceses del Sur</option>
                        <option value="TP">Timor Oriental</option>
                        <option value="TG">Togo</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad y Tobago</option>
                        <option value="TN">Túnez</option>
                        <option value="TM">Turkmenistán</option>
                        <option value="TR">Turquía</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UA">Ucrania</option>
                        <option value="UG">Uganda</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistán</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Vietnam</option>
                        <option value="YE">Yemen</option>
                        <option value="YU">Yugoslavia</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabue</option>
                    </select>
                </div>

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
                        <option value="0" selected>País donde surtirá efecto</option>
                        <option value="AF">Afganistán</option>
                        <option value="AL">Albania</option>
                        <option value="DE">Alemania</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antártida</option>
                        <option value="AG">Antigua y Barbuda</option>
                        <option value="AN">Antillas Holandesas</option>
                        <option value="SA">Arabia Saudí</option>
                        <option value="DZ">Argelia</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaiyán</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrein</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BE">Bélgica</option>
                        <option value="BZ">Belice</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermudas</option>
                        <option value="BY">Bielorrusia</option>
                        <option value="MM">Birmania</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia y Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BR">Brasil</option>
                        <option value="BN">Brunei</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="BT">Bután</option>
                        <option value="CV">Cabo Verde</option>
                        <option value="KH">Camboya</option>
                        <option value="CM">Camerún</option>
                        <option value="CA">Canadá</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CY">Chipre</option>
                        <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comores</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, República Democrática del</option>
                        <option value="KR">Corea</option>
                        <option value="KP">Corea del Norte</option>
                        <option value="CI">Costa de Marfíl</option>
                        <option value="CR">Costa Rica</option>
                        <option value="HR">Croacia (Hrvatska)</option>
                        <option value="CU">Cuba</option>
                        <option value="DK">Dinamarca</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egipto</option>
                        <option value="SV">El Salvador</option>
                        <option value="AE">Emiratos Árabes Unidos</option>
                        <option value="ER">Eritrea</option>
                        <option value="SI">Eslovenia</option>
                        <option value="ES">España</option>
                        <option value="US">Estados Unidos</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Etiopía</option>
                        <option value="FJ">Fiji</option>
                        <option value="PH">Filipinas</option>
                        <option value="FI">Finlandia</option>
                        <option value="FR">Francia</option>
                        <option value="GA">Gabón</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GD">Granada</option>
                        <option value="GR">Grecia</option>
                        <option value="GL">Groenlandia</option>
                        <option value="GP">Guadalupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GY">Guayana</option>
                        <option value="GF">Guayana Francesa</option>
                        <option value="GN">Guinea</option>
                        <option value="GQ">Guinea Ecuatorial</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="HT">Haití</option>
                        <option value="HN">Honduras</option>
                        <option value="HU">Hungría</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IQ">Irak</option>
                        <option value="IR">Irán</option>
                        <option value="IE">Irlanda</option>
                        <option value="BV">Isla Bouvet</option>
                        <option value="CX">Isla de Christmas</option>
                        <option value="IS">Islandia</option>
                        <option value="KY">Islas Caimán</option>
                        <option value="CK">Islas Cook</option>
                        <option value="CC">Islas de Cocos o Keeling</option>
                        <option value="FO">Islas Faroe</option>
                        <option value="HM">Islas Heard y McDonald</option>
                        <option value="FK">Islas Malvinas</option>
                        <option value="MP">Islas Marianas del Norte</option>
                        <option value="MH">Islas Marshall</option>
                        <option value="UM">Islas menores de Estados Unidos</option>
                        <option value="PW">Islas Palau</option>
                        <option value="SB">Islas Salomón</option>
                        <option value="SJ">Islas Svalbard y Jan Mayen</option>
                        <option value="TK">Islas Tokelau</option>
                        <option value="TC">Islas Turks y Caicos</option>
                        <option value="VI">Islas Vírgenes (EEUU)</option>
                        <option value="VG">Islas Vírgenes (Reino Unido)</option>
                        <option value="WF">Islas Wallis y Futuna</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italia</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japón</option>
                        <option value="JO">Jordania</option>
                        <option value="KZ">Kazajistán</option>
                        <option value="KE">Kenia</option>
                        <option value="KG">Kirguizistán</option>
                        <option value="KI">Kiribati</option>
                        <option value="KW">Kuwait</option>
                        <option value="LA">Laos</option>
                        <option value="LS">Lesotho</option>
                        <option value="LV">Letonia</option>
                        <option value="LB">Líbano</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libia</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lituania</option>
                        <option value="LU">Luxemburgo</option>
                        <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                        <option value="MG">Madagascar</option>
                        <option value="MY">Malasia</option>
                        <option value="MW">Malawi</option>
                        <option value="MV">Maldivas</option>
                        <option value="ML">Malí</option>
                        <option value="MT">Malta</option>
                        <option value="MA">Marruecos</option>
                        <option value="MQ">Martinica</option>
                        <option value="MU">Mauricio</option>
                        <option value="MR">Mauritania</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX" selected>México</option>
                        <option value="FM">Micronesia</option>
                        <option value="MD">Moldavia</option>
                        <option value="MC">Mónaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="MS">Montserrat</option>
                        <option value="MZ">Mozambique</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Níger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk</option>
                        <option value="NO">Noruega</option>
                        <option value="NC">Nueva Caledonia</option>
                        <option value="NZ">Nueva Zelanda</option>
                        <option value="OM">Omán</option>
                        <option value="NL">Países Bajos</option>
                        <option value="PA">Panamá</option>
                        <option value="PG">Papúa Nueva Guinea</option>
                        <option value="PK">Paquistán</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Perú</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PF">Polinesia Francesa</option>
                        <option value="PL">Polonia</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="UK">Reino Unido</option>
                        <option value="CF">República Centroafricana</option>
                        <option value="CZ">República Checa</option>
                        <option value="ZA">República de Sudáfrica</option>
                        <option value="DO">República Dominicana</option>
                        <option value="SK">República Eslovaca</option>
                        <option value="RE">Reunión</option>
                        <option value="RW">Ruanda</option>
                        <option value="RO">Rumania</option>
                        <option value="RU">Rusia</option>
                        <option value="EH">Sahara Occidental</option>
                        <option value="KN">Saint Kitts y Nevis</option>
                        <option value="WS">Samoa</option>
                        <option value="AS">Samoa Americana</option>
                        <option value="SM">San Marino</option>
                        <option value="VC">San Vicente y Granadinas</option>
                        <option value="SH">Santa Helena</option>
                        <option value="LC">Santa Lucía</option>
                        <option value="ST">Santo Tomé y Príncipe</option>
                        <option value="SN">Senegal</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leona</option>
                        <option value="SG">Singapur</option>
                        <option value="SY">Siria</option>
                        <option value="SO">Somalia</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="PM">St Pierre y Miquelon</option>
                        <option value="SZ">Suazilandia</option>
                        <option value="SD">Sudán</option>
                        <option value="SE">Suecia</option>
                        <option value="CH">Suiza</option>
                        <option value="SR">Surinam</option>
                        <option value="TH">Tailandia</option>
                        <option value="TW">Taiwán</option>
                        <option value="TZ">Tanzania</option>
                        <option value="TJ">Tayikistán</option>
                        <option value="TF">Territorios franceses del Sur</option>
                        <option value="TP">Timor Oriental</option>
                        <option value="TG">Togo</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad y Tobago</option>
                        <option value="TN">Túnez</option>
                        <option value="TM">Turkmenistán</option>
                        <option value="TR">Turquía</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UA">Ucrania</option>
                        <option value="UG">Uganda</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistán</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Vietnam</option>
                        <option value="YE">Yemen</option>
                        <option value="YU">Yugoslavia</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabue</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <!--<input class="form-control materail-input light" id="estadodireccion" placeholder="Estado" required="true">-->
                    <select name="estadodireccion" id="estadodireccion" class="form-control light">
                        <option value="0">Seleccionar Estado</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja_California">Baja California</option>
                        <option value="Baja_California_Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Coahuila_de_Zaragoza">Coahuila de Zaragoza</option>
                        <option value="Colima">Colima</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Distrito_Federal">Distrito Federal</option>
                        <option value="Durango">Durango</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Mexico">México</option>
                        <option value="Michoacan_de_Ocampo">Michoacán de Ocampo</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo_Leon">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana_Roo">Quintana Roo</option>
                        <option value="San_Luis_Potosi">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz_de_Ignacio_de_la_Llave">Veracruz de Ignacio de la Llave</option>
                        <option value="Yucatan">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input class="form-control materail-input light" id="referencia" placeholder="Referencia" required="true">
                </div>
                </div>
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
                        <option value="0" selected>País donde surtirá efecto</option>
                        <option value="AF">Afganistán</option>
                        <option value="AL">Albania</option>
                        <option value="DE">Alemania</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antártida</option>
                        <option value="AG">Antigua y Barbuda</option>
                        <option value="AN">Antillas Holandesas</option>
                        <option value="SA">Arabia Saudí</option>
                        <option value="DZ">Argelia</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaiyán</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrein</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BE">Bélgica</option>
                        <option value="BZ">Belice</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermudas</option>
                        <option value="BY">Bielorrusia</option>
                        <option value="MM">Birmania</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia y Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BR">Brasil</option>
                        <option value="BN">Brunei</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="BT">Bután</option>
                        <option value="CV">Cabo Verde</option>
                        <option value="KH">Camboya</option>
                        <option value="CM">Camerún</option>
                        <option value="CA">Canadá</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CY">Chipre</option>
                        <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comores</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, República Democrática del</option>
                        <option value="KR">Corea</option>
                        <option value="KP">Corea del Norte</option>
                        <option value="CI">Costa de Marfíl</option>
                        <option value="CR">Costa Rica</option>
                        <option value="HR">Croacia (Hrvatska)</option>
                        <option value="CU">Cuba</option>
                        <option value="DK">Dinamarca</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egipto</option>
                        <option value="SV">El Salvador</option>
                        <option value="AE">Emiratos Árabes Unidos</option>
                        <option value="ER">Eritrea</option>
                        <option value="SI">Eslovenia</option>
                        <option value="ES">España</option>
                        <option value="US">Estados Unidos</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Etiopía</option>
                        <option value="FJ">Fiji</option>
                        <option value="PH">Filipinas</option>
                        <option value="FI">Finlandia</option>
                        <option value="FR">Francia</option>
                        <option value="GA">Gabón</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GD">Granada</option>
                        <option value="GR">Grecia</option>
                        <option value="GL">Groenlandia</option>
                        <option value="GP">Guadalupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GY">Guayana</option>
                        <option value="GF">Guayana Francesa</option>
                        <option value="GN">Guinea</option>
                        <option value="GQ">Guinea Ecuatorial</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="HT">Haití</option>
                        <option value="HN">Honduras</option>
                        <option value="HU">Hungría</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IQ">Irak</option>
                        <option value="IR">Irán</option>
                        <option value="IE">Irlanda</option>
                        <option value="BV">Isla Bouvet</option>
                        <option value="CX">Isla de Christmas</option>
                        <option value="IS">Islandia</option>
                        <option value="KY">Islas Caimán</option>
                        <option value="CK">Islas Cook</option>
                        <option value="CC">Islas de Cocos o Keeling</option>
                        <option value="FO">Islas Faroe</option>
                        <option value="HM">Islas Heard y McDonald</option>
                        <option value="FK">Islas Malvinas</option>
                        <option value="MP">Islas Marianas del Norte</option>
                        <option value="MH">Islas Marshall</option>
                        <option value="UM">Islas menores de Estados Unidos</option>
                        <option value="PW">Islas Palau</option>
                        <option value="SB">Islas Salomón</option>
                        <option value="SJ">Islas Svalbard y Jan Mayen</option>
                        <option value="TK">Islas Tokelau</option>
                        <option value="TC">Islas Turks y Caicos</option>
                        <option value="VI">Islas Vírgenes (EEUU)</option>
                        <option value="VG">Islas Vírgenes (Reino Unido)</option>
                        <option value="WF">Islas Wallis y Futuna</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italia</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japón</option>
                        <option value="JO">Jordania</option>
                        <option value="KZ">Kazajistán</option>
                        <option value="KE">Kenia</option>
                        <option value="KG">Kirguizistán</option>
                        <option value="KI">Kiribati</option>
                        <option value="KW">Kuwait</option>
                        <option value="LA">Laos</option>
                        <option value="LS">Lesotho</option>
                        <option value="LV">Letonia</option>
                        <option value="LB">Líbano</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libia</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lituania</option>
                        <option value="LU">Luxemburgo</option>
                        <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                        <option value="MG">Madagascar</option>
                        <option value="MY">Malasia</option>
                        <option value="MW">Malawi</option>
                        <option value="MV">Maldivas</option>
                        <option value="ML">Malí</option>
                        <option value="MT">Malta</option>
                        <option value="MA">Marruecos</option>
                        <option value="MQ">Martinica</option>
                        <option value="MU">Mauricio</option>
                        <option value="MR">Mauritania</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX" selected>México</option>
                        <option value="FM">Micronesia</option>
                        <option value="MD">Moldavia</option>
                        <option value="MC">Mónaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="MS">Montserrat</option>
                        <option value="MZ">Mozambique</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Níger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk</option>
                        <option value="NO">Noruega</option>
                        <option value="NC">Nueva Caledonia</option>
                        <option value="NZ">Nueva Zelanda</option>
                        <option value="OM">Omán</option>
                        <option value="NL">Países Bajos</option>
                        <option value="PA">Panamá</option>
                        <option value="PG">Papúa Nueva Guinea</option>
                        <option value="PK">Paquistán</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Perú</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PF">Polinesia Francesa</option>
                        <option value="PL">Polonia</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="UK">Reino Unido</option>
                        <option value="CF">República Centroafricana</option>
                        <option value="CZ">República Checa</option>
                        <option value="ZA">República de Sudáfrica</option>
                        <option value="DO">República Dominicana</option>
                        <option value="SK">República Eslovaca</option>
                        <option value="RE">Reunión</option>
                        <option value="RW">Ruanda</option>
                        <option value="RO">Rumania</option>
                        <option value="RU">Rusia</option>
                        <option value="EH">Sahara Occidental</option>
                        <option value="KN">Saint Kitts y Nevis</option>
                        <option value="WS">Samoa</option>
                        <option value="AS">Samoa Americana</option>
                        <option value="SM">San Marino</option>
                        <option value="VC">San Vicente y Granadinas</option>
                        <option value="SH">Santa Helena</option>
                        <option value="LC">Santa Lucía</option>
                        <option value="ST">Santo Tomé y Príncipe</option>
                        <option value="SN">Senegal</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leona</option>
                        <option value="SG">Singapur</option>
                        <option value="SY">Siria</option>
                        <option value="SO">Somalia</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="PM">St Pierre y Miquelon</option>
                        <option value="SZ">Suazilandia</option>
                        <option value="SD">Sudán</option>
                        <option value="SE">Suecia</option>
                        <option value="CH">Suiza</option>
                        <option value="SR">Surinam</option>
                        <option value="TH">Tailandia</option>
                        <option value="TW">Taiwán</option>
                        <option value="TZ">Tanzania</option>
                        <option value="TJ">Tayikistán</option>
                        <option value="TF">Territorios franceses del Sur</option>
                        <option value="TP">Timor Oriental</option>
                        <option value="TG">Togo</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad y Tobago</option>
                        <option value="TN">Túnez</option>
                        <option value="TM">Turkmenistán</option>
                        <option value="TR">Turquía</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UA">Ucrania</option>
                        <option value="UG">Uganda</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistán</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Vietnam</option>
                        <option value="YE">Yemen</option>
                        <option value="YU">Yugoslavia</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabue</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <!--<input class="form-control materail-input light" id="des-estadodireccion" placeholder="Estado" required="true">-->
                    <select name="des-estadodireccion" id="des-estadodireccion" class="form-control light">
                        <option value="0">Seleccionar Estado</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja_California">Baja California</option>
                        <option value="Baja_California_Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Coahuila_de_Zaragoza">Coahuila de Zaragoza</option>
                        <option value="Colima">Colima</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Distrito_Federal">Distrito Federal</option>
                        <option value="Durango">Durango</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Mexico">México</option>
                        <option value="Michoacan_de_Ocampo">Michoacán de Ocampo</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo_Leon">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana_Roo">Quintana Roo</option>
                        <option value="San_Luis_Potosi">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz_de_Ignacio_de_la_Llave">Veracruz de Ignacio de la Llave</option>
                        <option value="Yucatan">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input class="form-control materail-input light" id="des-referencia" placeholder="Referencia" required="true">
                </div>
                </div>
                <div class="col-md-12">
                    <div class="field">
                        <textarea class="light" name="mensaje" rows="4" id="mensaje" placeholder="Mensaje adicional :)" tabindex="5"></textarea>
                    </div>
                </div>

                <div class="col-md-12 calculoCosto">
                    <h4>Costo por concepto de <span class="tituloTramite">Acta de nacimiento</span></h4>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-md-6">
                            <span id="costoTramite" class="costoTexto">Costo del trámite</span>
                            <span id="costoCopias" class="costoTexto">Copias adicionales</span>
                            <span id="costoEnvio" class="costoTexto">Envío</span>
                            <span id="costoTotal" class="costoTexto">Total</span>
                        </div>
                        <div class="col-md-6">
                            <span id="costoTramitePesos" class="costoNumeros">$ 1,390 <sup>mn</sup></span>
                            <span id="costoCopiasPesos" class="costoNumeros">$ 200 <sup>mn</sup></span>
                            <span id="costoEnvioPesos" class="costoNumeros">$ 350 <sup>mn</sup></span>
                            <span id="costoTotalPesos" class="costoNumeros"><strong>$1,940 <sup>mn</sup></strong></span>
                        </div>

                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label>
                            <input type="checkbox" id="terminosycondiciones" checked="checked" class="check" required="true"> He leído y acepto el <a href="aviso-de-privacidad.php" target="_blank" class="transitions">Aviso de Privacidad</a>
                        </label>
                    </div>
                    <span id="validation_error" style="color:red;" ></span>
                    <br/>
                    <button id="button_Send" class="btn material-btn_lg material-btn_success main-container__column">Enviar mi solicitud</button>

                </div>
            </div>
        </div>

    </div>
</div>

<div class="callCentre paddingContent">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 centrar">
            <h3 class="blanco mayus light">¿Necesitas algún trámite?</h3>
            <h4 class="blanco light centrar mayus">comunícate con nosotros</h4>

            <div class="row">
                <div class="col-md-6 blanco">
                    <h2><i class="fa fa-phone" aria-hidden="true"></i> 555 5555 5555</h3>
                    <p class="centrar">Desde la Ciudad de México</p>
                </div>
                <div class="col-md-6 blanco">
                    <h2><i class="fa fa-phone" aria-hidden="true"></i> 555 5555 5555</h3>
                    <p class="centrar">Del interior de la República</p>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once(dirname(__FILE__).'/footer.php');?>


    <!-- Main Scripts-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/search.js"></script>
    <script src="js/ttmenu.js"></script>
    <script src="js/jquery.fitvids.js"></script>
    <script src="js/validationnshit.js"></script>


<!-- Carousel -->
    <script type="text/javascript">
    $(document).ready(function () {
        
      $('#validacion_opcionales').find(':input').prop('disabled', true);
      $('#tiempo_requerido_ok').hide();
      
      $("#button_Send")[0].addEventListener("click", send);
      $("#copiarDatos")[0].addEventListener("click", toggleAtributosOpcionales);
      $("#gral-estado")[0].addEventListener("change", solicitarCostos);
      $("#gral-ncopias")[0].addEventListener("change", refrescarCostos);
      $("#estadodireccion")[0].addEventListener("change", refrescarCostos);
      $("#des-estadodireccion")[0].addEventListener("change", refrescarCostos);
      $("#copiarDatos")[0].addEventListener("click", refrescarCostos);

        $('.carousel').carousel({
            interval: 3000
        });

        $('.carousel').carousel('cycle');
    });
    
    function refrescarCostos(){
        if ($("#gral-estado")[0].value != 0){
            solicitarCostos();

        }
    }
    
    function solicitarCostos() {
        
        var estado_envio;
        
        if ($("#copiarDatos")[0].checked){
            estado_envio = $("#estadodireccion")[0].value;
        } else {
            estado_envio = $("#des-estadodireccion")[0].value;
        }
        
        var requestJSON = {
            "estado" : $("#gral-estado")[0].value,
            "gral_clave" : $("#clave")[0].value,
            "estado_envio" : estado_envio
        }
        
        $.ajax({
            data : {"data" : JSON.stringify(requestJSON)},
            type : "GET",
            dataType : "json",
            url : "php/ConsultarCostos.php"
          })
          .done(function( data, textStatus, jqXHR ) {
              
              actualizarCostos(data.data.datos.costo, data.data.datos.costo_por_copia, data.data.datos.costo_envio);
              
            if (console && console.log){
              console.log(data.success + ": " + data.data.message);
            }

          })
          .fail(function(jqXHR, textStatus, errorThorn) {
            if (console && console.log){
              console.log("La solicitud a fallado: " +  textStatus);
            }
          });
        
    }
    
    function solicitarTiempoDeEnvio() {
        
        var estado_envio;
        
        if ($("#copiarDatos")[0].checked){
            estado_envio = $("#estadodireccion")[0].value;
        } else {
            estado_envio = $("#des-estadodireccion")[0].value;
        }
        
        var requestJSON = {
            "estado" : $("#gral-estado")[0].value,
            "gral_clave" : $("#clave")[0].value,
            "estado_envio" : estado_envio
        }
        
        $.ajax({
            data : {"data" : JSON.stringify(requestJSON)},
            type : "GET",
            dataType : "json",
            url : "php/ConsultarTiemposDeEnvio.php"
          })
          .done(function( data, textStatus, jqXHR ) {
              
              actualizarTiemposDeEnvio(data.data.datos.entrega_min, data.data.datos.entrega_max);
              
            if (console && console.log){
              console.log(data.success + ": " + data.data.message);
            }

          })
          .fail(function(jqXHR, textStatus, errorThorn) {
            if (console && console.log){
              console.log("La solicitud a fallado: " +  textStatus);
            }
          });
        
    }
    
    function actualizarTiemposDeEnvio(min, max){
        $("#entrega_minima").text(min);
        $("#entrega_maxima").text(max);
        
        $('#tiempo_requerido_ok').show();  
        $('#tiempo_requerido_nook').hide();
    }
    
    function actualizarCostos( costo, costo_copia, costo_envio){
        
        var costo_total;
        var numero_copias = parseInt($("#gral-ncopias")[0].value);
        var costo_total_copias = numero_copias * parseFloat(costo_copia);
        
        if (costo_envio == null){
            costo_envio = "Debe seleccionar un destino";
            costo_total = parseFloat(costo) + costo_total_copias;
           
        } else {
            costo_total = parseFloat(costo) + costo_total_copias + parseFloat(costo_envio);
            costo_envio = "$" + costo_envio + " MXN";
            solicitarTiempoDeEnvio();/////////////////////////////////////////////////////////////
        }
        
        $("#costoTramitePesos").text("$" + costo + " MXN");
        $("#costoCopiasPesos").text("$" + costo_total_copias + " MXN");
        $("#costoEnvioPesos").text(costo_envio);
        
        $("#costoTotalPesos").text("$" + costo_total + " MXN");
    }
    
    function toggleAtributosOpcionales() {
        if ($('#validacion_opcionales').find(':input').prop('disabled')){
            $('#validacion_opcionales').find(':input').prop('disabled', false);
        } else {
            $('#validacion_opcionales').find(':input').prop('disabled', true);
        }
    }

    function send() {

        var valido;
        valido = validar_regCivil_acta_de_nacimiento();

        if (!valido)
            return;

      var datosGrales = {
          "gral_clave" : $("#clave")[0].value,
          "gral_titulo" : $("#titulo").text(),
        "gral_estado" : $("#gral-estado")[0].value,
        "gral_estadoTexto" : $("#gral-estado :selected").text(),
        "gral_ncopias" : $("#gral-ncopias")[0].value,
        "gral_paisEfecto" : $("#gral-paisEfecto")[0].value
      }

      var datosTitular = {
        "nombres" : $("#nombres")[0].value,
        "apellidoPaterno" : $("#apellidoPaterno")[0].value,
        "apellidoMaterno" : $("#apellidoMaterno")[0].value,
        "email" : $("#email")[0].value,
        "telefono" : $("#telefono")[0].value,
        "celular" : $("#celular")[0].value,
        "calle" : $("#calle")[0].value,
        "numeroext" : $("#numeroext")[0].value,
        "numeroint" : $("#numeroint")[0].value,
        "colonia" : $("#colonia")[0].value,
        "cp" : $("#cp")[0].value,
        "delmun" : $("#delmun")[0].value,
        "estado" : $("#estado")[0].value,
        "estadodireccion" : $("#estadodireccion")[0].value,
        "estadodireccionTexto" : $("#estadodireccion :selected").text(),
        "referencia" : $("#referencia")[0].value
      }

      var datosDestinatario = {
        "nombres" : $("#des-nombres")[0].value,
        "apellidoPaterno" : $("#des-apellidoPaterno")[0].value,
        "apellidoMaterno" : $("#des-apellidoMaterno")[0].value,
        "email" : $("#des-email")[0].value,
        "telefono" : $("#des-telefono")[0].value,
        "celular" : $("#des-celular")[0].value,
        "calle" : $("#des-calle")[0].value,
        "numeroext" : $("#des-numeroext")[0].value,
        "numeroint" : $("#des-numeroint")[0].value,
        "colonia" : $("#des-colonia")[0].value,
        "cp" : $("#des-cp")[0].value,
        "delmun" : $("#des-delmun")[0].value,
        "estado" : $("#des-estado")[0].value,
        "estadodireccion" : $("#des-estadodireccion")[0].value,
        "estadodireccionTexto" : $("#des-estadodireccion :selected").text(),
        "referencia" : $("#des-referencia")[0].value
      }

      var requestJSON;

      if ($("#copiarDatos")[0].checked == false) {
        requestJSON = {
          "datosGrales" : datosGrales,
          "datosTitular" : datosTitular,
          "datosDestinatario" : datosDestinatario,
          "mensaje" : $("#mensaje")[0].value,
          "copiarDatos" : $("#copiarDatos")[0].checked
        }
      }
      else {
          requestJSON = {
            "datosGrales" : datosGrales,
            "datosTitular" : datosTitular,
            "datosDestinatario" : datosTitular,
            "mensaje" : $("#mensaje")[0].value,
            "copiarDatos" : $("#copiarDatos")[0].checked
          }
        }


      $.ajax({
        data : {"data" : JSON.stringify(requestJSON)},
        type : "GET",
        dataType : "json",
        url : "php/ReceiveRequest.php"
      })
      .done(function( data, textStatus, jqXHR ) {
        if (console && console.log){
          console.log(data.success + ": " + data.data.message);
        }
        window.location.href="gracias.php";
      })
      .fail(function(jqXHR, textStatus, errorThorn) {
        if (console && console.log){
          console.log("La solicitud a fallado: " +  textStatus);
        }
      });


    }

    </script>

</body>
</html>
