<?php
    
     require_once '../../class/TipoHabitacion.php';
  
    
    $idTipoHabitacion = (isset($_REQUEST['idTipoHabitacion'])) ? $_REQUEST['idTipoHabitacion'] : null;
    if($idTipoHabitacion){
        $tipo_habitacion = TipoHabitacion::buscarPorId($idTipoHabitacion);        
        $tipo_habitacion->eliminar(); 
        header("Location: index.php");
    }else{
        header("Location: index.php");
    }
    
?>