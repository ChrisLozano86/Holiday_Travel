<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
<p>Se ha detectado que la siguiente reservación con fecha limite de pago para el <strong>{FECHA_LIMITE}</strong>, no ha cubierto la totalidad del pago.</p>
<p style="background-color: #3e9f8f; color: white;"> Información de la reservación </p>

            <table border="1" cellpadding="2" cellspacing="0">
                <tr>
                    <td style="width: 180px;"><strong>Agencia</strong></td>
                    <td>{AGENCIA}</td>
                </tr>
                <tr>
                    <td style="width: 180px;"><strong>Cliente</strong></td>
                    <td>{BROKER}</td>
                </tr>
                <tr>
                    <td style="width: 180px;"><strong>Broker</strong></td>
                    <td>{CLAVE}</td>
                </tr>
                <tr>
                    <td style="width: 180px;"><strong>Clave</strong></td>
                    <td>{TITULAR}</td>
                </tr>
            </table>
</body>
</html>