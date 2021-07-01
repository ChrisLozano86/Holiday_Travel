<html>
<!-- #A3D0F8 -->

<body style="color: #000; font-size: 16px; text-decoration: none; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #efefef;">

	<div id="wrapper" style="max-width: 800px; margin: auto auto; padding: 20px;">

		<div id="logo">
			<center>
				<h1 style="margin: 0px;"><a href="{SITE_ADDR}" target="_blank"><img style="width:500px; height:auto;" src="https://htop.com.mx/img/logo2.png"></a></h1>
			</center>
		</div>

		<div id="content" style="font-size: 16px; padding: 25px; background-color: #fff;
				-webkit-border-radius: 10px; border-radius: 10px; -khtml-border-radius: 10px;
				border-color: #2f7468; border-width: 4px 1px; border-style: solid;">

			<h1 style="font-size: 22px;">
				<center>Notificación de fecha de pago de reservación</center>
			</h1>

			

			<p>Se ha detectado que la siguiente reservación con fecha limite de pago para el <strong>{FECHA_LIMITE}</strong>, no ha cubierto la totalidad del pago.</p>
			<p > Información de la reservación </p>

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

			<p>Para ver los detalles de esta reservación por favor ingrese al <a href="https://htop.com.mx/cpanel">CPANEL</a> </p>

			

		</div>
		
		
	</div>
</body>

</html>