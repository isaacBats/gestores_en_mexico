<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmación - Gestores en México</title>
</head>
<body style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; margin:0 auto; background:#f7fcfe; color:#363c45;">
    <table width="600" border="0" cellpadding="0" style="background:#fff; padding:20px; margin:0 auto; border:1px solid #ebebeb;">
        <tbody>
            <tr>
                <td>
                    <table width="100%" border="0">
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ $_SERVER['HTTP_HOST'] }}/assets/images/logo-azul.png" width="140" height="80" alt="Gestores en México" />
                                </td>
                                <td width="70%">
                                    <h2 style="font-size:12px; text-align:right; color:#4682b4;">CONSULTORIA ESPECIALIZADA EN GESTORIA DE TRÁMITES <br>
                                    Y SERVICIOS ADMINISTRATIVOS E INTEGRALES</h2>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="20px">
                    <hr style="background:#6a6e74;">
                    <h4 style="text-align:center;">Confirmación de solicitud de trámite</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" style="text-align:center; color:#fff;" >
                        <tbody>
                            <tr>
                                <td width="30%">&nbsp;</td>
                                <td width="40%" style="padding:6px 0;">
                                    <div style="background:#f44336; display:block;">
                                        <p>Folio: 
                                            <span style="font-weight:bold;">GMX-{{ $data->id }}</span>
                                        </p>
                                    </div>
                                </td>
                                <td width="30%">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <h2 style="font-size:18px; text-align:center; font-weight:normal; color:#4682b4;">
                        ¡Gracias por enviarnos tus datos! <br>
                        <span style="font-size:12px;">uno de nuestros asesores te contactará para el seguimiento de tu trámite</span>
                    </h2>
                    <p style="color: #f44336; font-size:12px; text-align:center; font-style:italic;">
                        Tu trámite ha sido confirmado, por favor guarda esta información
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 style="color:#4682b4; font-size:9px;">Solicitante</h5>
                    @foreach ($client as $key => $c)
                        <p style="font-size:12px;">{{ $key }} <span style="font-weight:bold;">{{ $c }} </span></p>
                    @endforeach
                    {{-- <p style="font-size:12px;">Nombre(s): <span style="font-weight:bold;">Juan </span></p>
                    <p style="font-size:12px;">Apellido paterno: <span style="font-weight:bold;">Pérex</span></p>
                    <p style="font-size:12px;">Apellido materno: <span style="font-weight:bold;">Lopex</span></p>
                    <p style="font-size:12px;">Trámite: <span style="font-weight:bold;">Apostilla de Acta del Registro Civil</span></p>
                    <p style="font-size:12px;">Cantidad de copias: <span style="font-weight:bold;">1</span></p>
                    <p style="font-size:12px;">Estado: <span style="font-weight:bold;">Torreón, Coahuila</span></p>
                    <p style="font-size:12px;">Fecha de solicitud: <span style="font-weight:bold;">11 de enero de 2017</span></p>
                    <p style="font-size:12px;">Costo total: <span style="font-weight:bold;">$1,350 <sup style="font-size:8px;">MN</sup></span></p> --}}
                    <h5 style="color:#4682b4; font-size:9px;">Formas de pago</h5>
                    <p style="font-size:12px;">Depósito o transferencia electrónica</p>
                    <p style="font-size:12px;">Institución bancaria: <span style="font-weight:bold;">Banamex</span></p>
                    <p style="font-size:12px;">Titular: <span style="font-weight:bold;">Consultoría Especializada en Gestoria de Trámites y Servicios Administrativos e Integrales. S. de R.L.</span></p>
                    <p style="font-size:12px;">Número de cuenta: <span style="font-weight:bold;">0123456789</span></p>
                    <p style="font-size:12px;">Clabe interbancaria: <span style="font-weight:bold;">01234567891234</span></p>    
                    <p style="font-size:12px; margin-top:20px;"> <span style="font-weight:bold;">Importante: </span>Al finalizar el proceso, es necesario que nos envíes tu comprobante o ticket de pago al correo documentos@gestoresenmexico.com añadiendo número de folio del recuadro rojo en la página de confirmación.</p>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" style="background:#ededed; color:#717170;">
                        <tbody>
                            <tr>    
                                <td>
                                    <img src="{{ $_SERVER['HTTP_HOST'] }}/assets/images/logoBottom.png" width="100" height="62" alt="Gestores en México" />
                                </td>
                                <td style="padding:10px; text-align:right; font-size:12px;">
                                    <p>Gestores en México<br>
                                    info@gestoreseenmexico.com<br>
                                    Tel: (55) 2718 9072</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>