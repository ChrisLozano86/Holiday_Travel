<?php
    
     require_once '../../class/Suplemento.php';
  
    
    $idSuplementoHabitacion = (isset($_REQUEST['idSuplementoHabitacion'])) ? $_REQUEST['idSuplementoHabitacion'] : null;
    if($idSuplementoHabitacion){
        $suplemento = Suplemento::buscarPorId($idSuplementoHabitacion);        
        $suplemento->eliminar(); 
        header("Location: index.php");
    }else{
        header("Location: index.php");
    }
    
?>