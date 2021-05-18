<?php
    
     require_once '../../class/Reserva.php';
  
    
    $idReserva = (isset($_REQUEST['idReserva'])) ? $_REQUEST['idReserva'] : null;
    if($idReserva){
        $reserva = Reserva::buscarPorId($idReserva);        
        $reserva->eliminar(); 
        header('Location: index.php');
    }else{
        header('Location: index.php');
    }
    
?>