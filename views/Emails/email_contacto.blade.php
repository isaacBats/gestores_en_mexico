<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contacto - Gestores en México</title>
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
                    <h4 style="text-align:center;">Formulario de contacto</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h2 style="font-size:18px; text-align:center; font-weight:normal; color:#4682b4;">
                        Este es un mail de un contacto nuevo
                    </h2>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 style="color:#4682b4; font-size:9px;">Datos de contacto</h5>
                    <p style="font-size:12px;">Nombre(s): <span style="font-weight:bold;">{{ $data['nombre'] }}</span></p>
                    <p style="font-size:12px;">Apellidos: <span style="font-weight:bold;">{{ $data['apellidos'] }}</span></p>
                    <p style="font-size:12px;">Correo: <span style="font-weight:bold;">{{ $data['email'] }}</span></p>
                    <p style="font-size:12px;">Teléfono: <span style="font-weight:bold;">{{ $data['telefono'] }}</span></p>
                    <p style="font-size:12px;">País: <span style="font-weight:bold;">{{ $data['pais'] }}</span></p>
                    <p style="font-size:12px;">Mensaje:</p>
                    <p style="font-size:12px;">{{ $data['mensaje'] }}</p>
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
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>