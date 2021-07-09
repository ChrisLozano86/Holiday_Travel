<?php
    
     require_once '../../class/Habitacion.php';
  
    
    $idHabitacion = (isset($_REQUEST['idHabitacion'])) ? $_REQUEST['idHabitacion'] : null;
    $idReserva = (isset($_REQUEST['idReserva'])) ? $_REQUEST['idReserva'] : null;
    if($idHabitacion){
        $habitacion = Habitacion::buscarPorId($idHabitacion);        
        $habitacion->eliminar(); 
        header("Location: index.php?idReserva=$idReserva");
    }else{
        header("Location: index.php?idReserva=$idReserva");
    }
    
?>