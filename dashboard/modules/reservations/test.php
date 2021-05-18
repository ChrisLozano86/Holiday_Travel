<?php

if($_POST){

$fecha_limite = $_POST['fecha_limite'];

$fecha_notificacion = date('Y-m-d', strtotime($fecha_limite."- 1 week"));

echo 'La fecha limite es '.$fecha_notificacion;

}

?>

<form action="" method="POST">

<input type="date" name="fecha_limite">
<input type="submit">

</form>


SELECT * 
FROM reservaciones
WHERE fecha_notificacion > CURDATE() 
ORDER BY idReserva DESC


<?php
$datetime1 = date_create('2009-10-14');
$datetime2 = date_create('2009-10-13');
$interval = date_diff($datetime1, $datetime2);
echo $interval->format('%R%a días');
$diff=$datetime2->diff($datetime1);
print_r ($diff);
//echo($interval->d . " dias ");
//echo($interval->h . " horas");