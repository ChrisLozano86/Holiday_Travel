<?php
session_start();
require_once '../../class/Reserva.php';
require_once '../../class/Pago.php';
$registrar_pago_agencia = new Pago();
$actualizar_reserva = new Reserva();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $idReserva = (isset($_POST['idReserva'])) ? $_POST['idReserva'] : null;
    $fecha_pago = (isset($_POST['fecha_pago'])) ? $_POST['fecha_pago'] : null;
    $saldo_abonado = (isset($_POST['saldo_abonado'])) ? $_POST['saldo_abonado'] : null;
    $saldo_restante= (isset($_POST['saldo_restante'])) ? $_POST['saldo_restante'] : null;
    $monto= (isset($_POST['monto'])) ? $_POST['monto'] : null;
    $forma_pago = (isset($_POST['forma_pago'])) ? $_POST['forma_pago'] : null;
    $referencia = (isset($_POST['referencia'])) ? $_POST['referencia'] : null;
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
    $moneda = (isset($_POST['moneda'])) ? $_POST['moneda'] : null;
    if($moneda=='MXN'){
        $tipo_cambio = 1;
    }else{
        $tipo_cambio = (isset($_POST['tipo_cambio'])) ? $_POST['tipo_cambio'] : null;
    }
    
    $categoria_pago = (isset($_POST['categoria_pago'])) ? $_POST['categoria_pago'] : null;

    
    //Operaciones
    //$monto = $monto + $saldo_abonado;
    $nuevo_saldo = $saldo_restante - $monto;

    //Registro de pago
    $registrar_pago_agencia->setIdReserva($idReserva);
    $registrar_pago_agencia->setFechaPago($fecha_pago);
    $registrar_pago_agencia->setReferencia($referencia);
    $registrar_pago_agencia->setMonto($monto);
    $registrar_pago_agencia->setTipoCambio($tipo_cambio);
    $registrar_pago_agencia->setFormaPago($forma_pago);
    $registrar_pago_agencia->setDescripcion($descripcion);
    $registrar_pago_agencia->setCreadoPor($_SESSION['nombre']);
    $registrar_pago_agencia->setCategoriaPago($categoria_pago);
    if($registrar_pago_agencia->guardar()){


        //Pago Agencia
        if($categoria_pago == 1){ 

        

        //Actualización saldo restante
        $actualizar_reserva->actualizarSaldoRestante($idReserva, $nuevo_saldo);

         //Actualización estatus pago agencia
        if($nuevo_saldo == 0){
            $actualizar_reserva->actualizarPagoAgencia($idReserva, "Pagado");  
            header('Location: payment_confirm.php?status_code=2&idReserva='.$idReserva);
         }else{

         header('Location: payment_confirm.php?status_code=1&idReserva='.$idReserva);
         }

        }

        //Pago Operadora
        if($categoria_pago == 2){
        
        $actualizar_reserva->actualizarPagoOperadora($idReserva, "Pagado");  
        header('Location: payment_confirm.php?status_code=3&idReserva='.$idReserva);


        }

    }else{

        header('Location: index.php?error_code=1');
    }
   

}