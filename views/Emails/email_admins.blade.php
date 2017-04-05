<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmación - Gestores en México</title>
</head>
<body style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; margin:0 auto; background:#f7fcfe; color:#363c45;">
    <table width="600" border="0" cellpadding="0" style="background:#fff; padding:20px;">
        <tbody>
            <tr>
                <td>
                    <table width="100%" border="0">
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ $_SERVER['HTTP_HOST'] }}/assets/images/logo.png" width="140" height="80" alt="Gestores en México" />
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
                                            <span style="font-weight:bold;">{{ $data->id }}</span>
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
                    <p style="font-size:12px;">Fecha de solicitud: <span style="font-weight:bold;"> {{ $data->data_created }}"</span></p>
                    <h5 style="color:#4682b4; font-size:9px;">Registro de trámite</h5>
                    @foreach ($requisition as $key => $r)
                        <p style="font-size:12px;">{{ $key }}: <span style="font-weight:bold;">{{ $r }}</span></p>
                    @endforeach
                    <h5 style="color:#4682b4; font-size:9px;">Dirección de Solicitante</h5>
                    @foreach ($client as $key => $c)
                        <p style="font-size:12px;">{{ $key }}: <span style="font-weight:bold;">{{ $c }} </span></p>
                    @endforeach
                    <h5 style="color:#4682b4; font-size:9px;">Datos de envío</h5>
                    @foreach ($reciver as $key => $re)
                        <p style="font-size:12px;">{{ $key }}: <span style="font-weight:bold;">{{ $re }} </span></p>
                    @endforeach
                    <p style="font-size:12px;">Costo total: <span style="font-weight:bold;">${{ $data->total_cost }} <sup style="font-size:8px;">MN</sup></span></p>
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
                                    Tel: (55) 5555 5555</p>
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