<?php
require_once 'class/Reserva.php';
$estatusNotificacion = new Reserva();
$reservaciones = Reserva::enviarNotificaciones();


        
$template_file = "../../../template/email_template/template_notificacion.php";
$email_from = "Solicitud de registro <soporte@htop.com.mx>";
$email_to = 'chris.lozano8603@gmail.com';
$email_subject = "Notificación de fecha de pago de reservación"; 

foreach($reservaciones as $item){

$clave = $item['clave'];
$fecha_limite = $item['fecha_limite'];

$swap_var = array(
    "{SITE_ADDR}" => "https://www.htop.com.mx",
    "{CLAVE}" => $clave,
    "{FECHA_LIMITE}" => $fecha_limite,
   
);

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


header('Location: index.php');
}


}