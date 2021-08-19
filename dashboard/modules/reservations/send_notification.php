<?php
require_once 'class/Reserva.php';
$estatusNotificacion = new Reserva();
$reservaciones = Reserva::enviarNotificaciones();


        
$template_file = "../template/email_template/template_notificacion.php";
$email_from = "Servicio de notificaciones <soporte@htop.com.mx>";
$email_to = 'agencias@holidaytravel.com.mx, direcciongeneral@holidaytravel.com.mx, contabilidad@holidaytravel.com.mx, edmundo.sanchez@htop.com.mx';
$email_subject = "Notificación de fecha de pago de reservación"; 

foreach($reservaciones as $item){

$agencia = $item['nombre_comercial'];
$titular = $item['titular'];
$clave = $item['clave'];
$date = date_create($item['fecha_limite']); 
$fecha_limite = date_format($date,"d-m-Y");
$broker = $item['broker'];

$swap_var = array(
    "{SITE_ADDR}" => "https://www.htop.com.mx",
    "{CLAVE}" => $clave,
    "{FECHA_LIMITE}" => $fecha_limite,
    "{AGENCIA}" => $agencia,
    "{TITULAR}" => $titular,
    "{BROKER}" => $broker,
   
);

$email_headers = "From: ".$email_from."\r\nReply-To: ".$email_from."\r\n";
$email_headers .= "MIME-Version: 1.0\r\n";
$email_headers .= "Content-Type: text/html; charset=UTF-8 \r\n";

if (file_exists($template_file)){
    $email_message = file_get_contents($template_file);
}else{
    die ("Error al cargar el template");
}

foreach (array_keys($swap_var) as $key){
    if (strlen($key) > 2 && trim($swap_var[$key]) != '')
        $email_message = str_replace($key, $swap_var[$key], $email_message);
}


if (mail($email_to, $email_subject, $email_message, $email_headers) ){ 
 
    $estatusNotificacion->actualizarEstatusNotificacion($item[0], 1);

}else{


echo 'Error en el módulo de notificaciones';
}


}