<?php
    
     require_once '../../class/Pago.php';
     require_once '../../class/Reserva.php';

     $historial_pago=new Pago(); 
     $reserva=new Reserva();
    
    $idReserva = (isset($_POST['idReserva'])) ? $_POST['idReserva'] : null;
    $precio = (isset($_POST['precio'])) ? $_POST['precio'] : null;
    if($idReserva){        
        $historial_pago->eliminarHistorialPago($idReserva);
        $reserva->actualizarSaldoRestante($idReserva, $precio);
        $reserva->actualizarPagoAgencia($idReserva, 'No Pagado');
        $reserva->actualizarPagoOperadora($idReserva, 'No Pagado');
        echo $idReserva;
        header('Location: payment_confirm.php?processing=1');
    }else{
        header('Location: index.php');
    }
    
?>