<?php
    
     require_once '../../class/Pago.php';
     require_once '../../class/Reserva.php';

     $historial_pago=new Pago(); 
     $reserva=new Reserva();
    
    $idReserva = (isset($_POST['idReserva'])) ? $_POST['idReserva'] : null;
    $precioNeto = (isset($_POST['precioNeto'])) ? $_POST['precioNeto'] : null;
    
    if($idReserva){        
        $historial_pago->eliminarHistorialPago($idReserva,2);
        $reserva->actualizarSaldoRestanteOperadora($idReserva, $precioNeto);
        $reserva->actualizarPagoAgencia($idReserva, 'No Pagado');
        $reserva->actualizarPagoOperadora($idReserva, 'No Pagado');
        echo $idReserva;
        header('Location: payment_confirm.php?processing=1');
    }else{
        header('Location: index.php');
    }
    
?>