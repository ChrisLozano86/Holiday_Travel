<?php
require_once '../../class/Reserva.php';
require_once '../../class/Pago.php';

$idReserva = (isset($_REQUEST['idReserva'])) ? $_REQUEST['idReserva'] : null;
$pagos_reservas = Pago::recuperarPagosAgencia($idReserva); 
$pagos_reservasO = Pago::recuperarPagosOperadora($idReserva); 
   

    if($idReserva){        
        $reserva = Reserva::buscarPorId($idReserva); 
    
    }else{
        $reserva = new Reserva(); 
       
    }

   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

          $idReserva = (isset($_POST['idReserva'])) ? $_POST['idReserva'] : null;
          $agencia = (isset($_POST['agencia'])) ? $_POST['agencia'] : null;
          $porcentaje = (isset($_REQUEST['porcentaje'])) ? $_REQUEST['porcentaje'] : null;
          $precio_neto = (isset($_REQUEST['precio_neto'])) ? $_REQUEST['precio_neto'] : null;
          $titular = (isset($_REQUEST['titular'])) ? $_REQUEST['titular'] : null;
          $fecha_reservacion = (isset($_POST['fecha_reservacion'])) ? $_POST['fecha_reservacion'] : null;
          $broker = (isset($_REQUEST['broker'])) ? $_REQUEST['broker'] : null;
          $clave = (isset($_REQUEST['clave'])) ? $_REQUEST['clave'] : null;
          $descripcion = (isset($_REQUEST['descripcion'])) ? $_REQUEST['descripcion'] : null;  
          $destino = (isset($_REQUEST['destino'])) ? $_REQUEST['destino'] : null;  
          $fecha_inicio = (isset($_REQUEST['fecha_inicio'])) ? $_REQUEST['fecha_inicio'] : null;
          $precio = (isset($_REQUEST['precio'])) ? $_REQUEST['precio'] : null;
         

          
          $estatus_servicio = (isset($_REQUEST['estatus_servicio'])) ? $_REQUEST['estatus_servicio'] : null;
          $fecha_limite = (isset($_REQUEST['fecha_limite'])) ? $_REQUEST['fecha_limite'] : null;
          
          if($idReserva==""){
            $fecha_notificacion = date('Y-m-d',strtotime($fecha_limite."- 7 days"));
            $pago_agencia = 'No Pagado';
            $pago_operadora = 'No Pagado';
          }else{
            $fecha_notificacion = (isset($_REQUEST['fecha_notificacion'])) ? $_REQUEST['fecha_notificacion'] : null;
            $pago_operadora = (isset($_REQUEST['pago_operadora'])) ? $_REQUEST['pago_operadora'] : null;
            $pago_agencia = (isset($_REQUEST['pago_agencia'])) ? $_REQUEST['pago_agencia'] : null;
          }

          if(count($pagos_reservas)>0){
            $moneda = (isset($_REQUEST['moneda_aux'])) ? $_REQUEST['moneda_aux'] : null;
            $saldo_restante = (isset($_REQUEST['saldo_restante'])) ? $_REQUEST['saldo_restante'] : null;
          }else{
            $moneda = (isset($_REQUEST['moneda'])) ? $_REQUEST['moneda'] : null;
            $saldo_restante = $precio;
          }


          if(count($pagos_reservasO)>0){
            //$moneda = (isset($_REQUEST['moneda_aux'])) ? $_REQUEST['moneda_aux'] : null;
            $saldo_restanteO = (isset($_REQUEST['saldo_restanteO'])) ? $_REQUEST['saldo_restanteO'] : null;
          }else{
            $moneda = (isset($_REQUEST['moneda'])) ? $_REQUEST['moneda'] : null;
            $saldo_restanteO = $precio_neto;
          }

          $estatus_notificacion = (isset($_REQUEST['estatus_notificacion'])) ? $_REQUEST['estatus_notificacion'] : null;
          $estatus_reserva = (isset($_REQUEST['estatus_reserva'])) ? $_REQUEST['estatus_reserva'] : null;
          
          $reserva->setAgencia($agencia);
          $reserva->setPorcentaje($porcentaje);
          $reserva->setPrecioNeto($precio_neto);
          $reserva->setTitular($titular);
          $reserva->setFechaReservacion($fecha_reservacion);
          $reserva->setBroker($broker);
          $reserva->setClave($clave);
          $reserva->setDescripcion($descripcion);
          $reserva->setDestino($destino);
          $reserva->setFechaInicio($fecha_inicio);
          $reserva->setPrecio($precio);
          $reserva->setMoneda($moneda);
          $reserva->setEstatusServicio($estatus_servicio);
          $reserva->setPagoOperadora($pago_operadora);
          $reserva->setPagoAgencia($pago_agencia);
          $reserva->setFechaLimite($fecha_limite);
          $reserva->setFechaNotificacion($fecha_notificacion);
          $reserva->setEstatusNotificacion($estatus_notificacion);  
          $reserva->setEstatusReserva($estatus_reserva);  
          $reserva->setSaldoRestante($saldo_restante); 
          $reserva->setSaldoRestanteOperadora($saldo_restanteO); 
          $reserva->guardar();

          header('Location: index.php');
              
            
    }
      
    include_once '../../assets/template/header.php';
?>


<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
          <a href="index.php" class="btn btn-warning">Regresar</a><br>
          
          <?php 
          if (isset($_REQUEST['idReserva'])){
            
            $title = 'Editar reserva ';
          }else{
            $title = 'Crear nueva reserva';
          }
          ?>


          <div  style="width:80%; margin-left:10%; background-color: white; padding:20px; border-radius:10px;">

          <h4 class="text-center"><?php echo $title ?></h4> <br>
      

            <form action="save.php" method="post" id="promo_form">

            <div class="form-group">
            <input class="form-control" type="hidden" name="idReserva" id="idReserva" value="<?php echo $reserva->getIdReserva(); ?>">
            </div>

            <div class="form-group">
            <input class="form-control" type="hidden" name="fecha_notificacion" id="fecha_notificacion" value="<?php echo $reserva->getFechaNotificacion(); ?>">
            </div>

            <div class="form-group">
            <input class="form-control" type="hidden" name="estatus_notificacion" id="estatus_notificacion" value="<?php echo $reserva->getEstatusNotificacion(); ?>">
            </div>

            <div class="form-group">
            <input class="form-control" type="hidden" name="saldo_restante" id="saldo_restante" value="<?php echo $reserva->getSaldoRestante(); ?>">
            </div>

            <div class="form-group">
            <input class="form-control" type="hidden" name="saldo_restanteO" id="saldo_restanteO" value="<?php echo $reserva->getSaldoRestanteOperadora(); ?>">
            </div>

            <div class="form-group">
              <input class="form-control" type="hidden" name="pago_operadora" id="pago_operadora" value="<?php echo $reserva->getPagoOperadora(); ?>">
            </div>

            <div class="form-group">
              
              <input class="form-control" type="hidden" name="pago_agencia" id="pago_agencia" value="<?php echo $reserva->getPagoAgencia(); ?>" >
            </div>




            <div class="form-group">
            <label for="agencia">Agencia <span class="text text-danger">*</span> </label>
            <input class="form-control" type="text" name="agencia" id="agencia" value="<?php echo $reserva->getAgencia(); ?>" required>
            </div>

            <div class="form-group form-inline">
            <label for="porcentaje" class="mr-2">Porcentaje <span class="text text-danger">*</span> </label>
            <input class="form-control" type="number" min="1" max="100" name="porcentaje" id="porcentaje" style="width: 10%;" value="<?php if ($reserva->getPorcentaje()!= ""){echo $reserva->getPorcentaje();}else{ echo 14;} ?>" required>
            <span class="ml-2 font-weight-bold">%</span>
            </div>

            <div class="form-group form-inline">
            <label for="precio_neto" class="mr-2">Precio Neto  <span class="text text-danger">*</span> </label>
            
            <span class="mr-1">$</span><input class="form-control mr-2" type="text" name="precio_neto" id="precio_neto" value="<?php echo $reserva->getPrecioNeto(); ?>" style="width: 27%;" required <?php if(count($pagos_reservasO)>0){echo 'readonly';} ?> placeholder="0.00">
            <?php if(count($pagos_reservasO)>0){ ?>
              <input class="form-control" type="text" name="moneda_aux" id="moneda_aux" value="<?php echo $reserva->getMoneda(); ?>" style="width: 15%;" readonly >
            <?php }else{ ?>
            <select name="moneda" id="moneda" class="form-control" style="width: 15%;">
              <option value="MXN" <?php if($reserva->getMoneda()=='MXN'){ echo 'selected';}?>>MXN</option>
              <option value="USD" <?php if($reserva->getMoneda()=='USD'){ echo 'selected';}?>>USD</option>
            </select>
            <?php } ?>
            <?php if(count($pagos_reservasO)>0){echo '<p class="badge badge-info mt-2">Esta reserva ya tiene pagos de Operadora registrados, para editar el precio neto primero debe reestablecer el historial pagos.</p>';} ?>
            </div>

            <div class="form-group">
            <label for="agencia">Titular  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="text" name="titular" id="titular" value="<?php echo $reserva->getTitular(); ?>" required>
            </div>

            <div class="form-group">
            <label for="fecha_reservacion">Fecha de reservación  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="date" name="fecha_reservacion" id="fecha_reservacion" style="width: 50%;" value="<?php echo $reserva->getFechaReservacion(); ?>" required>
            </div>

            <div class="form-group">
              <label for="broker">Broker  <span class="text text-danger">*</span> </label>
            <select name="broker" id="broker" class="form-control" style="width: 50%;" required>
              <option value="">Selecciona un broker</option>
              <option value="Hotelbeds"  <?php if($reserva->getBroker()=='Hotelbeds'){ echo 'selected';}?>>Hotelbeds</option>
              <option value="HotelDo" <?php if($reserva->getBroker()=='HotelDo'){ echo 'selected';}?>>HotelDo</option>
              <option value="Restel" <?php if($reserva->getBroker()=='Restel'){ echo 'selected';}?>>Restel</option>
              <option value="Jumbo Tours" <?php if($reserva->getBroker()=='Jumbo Tours'){ echo 'selected';}?>>Jumbo Tours</option>
              <option value="Go Global" <?php if($reserva->getBroker()=='Go Global'){ echo 'selected';}?>>Go Global</option>
              <option value="Nuitee" <?php if($reserva->getBroker()=='Nuitee'){ echo 'selected';}?>>Nuitee</option>
              <option value="Nuitee" <?php if($reserva->getBroker()=='Hotel'){ echo 'selected';}?>>Hotel</option>
            </select> 
            </div>


            <div class="form-group">
            <label for="clave">Clave  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="text" name="clave" id="clave" value="<?php echo $reserva->getClave(); ?>" required>
            </div>

            <div class="form-group">
            <label for="descripcion">Hotel  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="text" name="descripcion" id="descripcion" value="<?php echo $reserva->getDescripcion(); ?>" required>
            </div>

            <div class="form-group">
            <label for="descripcion">Destino  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="text" name="destino" id="destino" value="<?php echo $reserva->getDestino(); ?>" required>
            </div>

            <div class="form-group">
            <label for="fecha_inicio">Fecha de inicio  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" style="width: 50%;" value="<?php echo $reserva->getFechaInicio(); ?>" required>
            </div>


            <div class="form-group form-inline">
            <label for="precio" class="mr-2">Precio  <span class="text text-danger">*</span> </label>
            
            <span class="mr-1">$</span><input class="form-control mr-2" type="text" name="precio" id="precio" value="<?php echo $reserva->getPrecio(); ?>" style="width: 27%;" required <?php if(count($pagos_reservas)>0){echo 'readonly';} ?> placeholder="0.00">
            <?php if(count($pagos_reservas)>0){ ?>
              <input class="form-control" type="text" name="moneda_aux" id="moneda_aux" value="<?php echo $reserva->getMoneda(); ?>" style="width: 15%;" readonly >
            <?php }else{ ?>
            <select name="moneda" id="moneda" class="form-control" style="width: 15%;">
              <option value="MXN" <?php if($reserva->getMoneda()=='MXN'){ echo 'selected';}?>>MXN</option>
              <option value="USD" <?php if($reserva->getMoneda()=='USD'){ echo 'selected';}?>>USD</option>
            </select>
            <?php } ?>
            <?php if(count($pagos_reservas)>0){echo '<p class="badge badge-info mt-2">Esta reserva ya tiene pagos registrados, para editar el precio primero debe reestablecer el historial pagos.</p>';} ?>
            </div>

            <div class="form-group">
              <label for="estatus_servicio">Estatus Servicio  <span class="text text-danger">*</span></label>
            <select name="estatus_servicio" id="estatus_servicio" class="form-control" style="width: 50%;">
              <option value="OK" <?php if($reserva->getPagoOperadora()=='OK'){ echo 'selected';}?>>OK</option>
              <option value="XL" <?php if($reserva->getPagoOperadora()=='XL'){ echo 'selected';}?>>XL</option>
              <option value="RQ" <?php if($reserva->getPagoOperadora()=='RQ'){ echo 'selected';}?>>RQ</option>
              <option value="NC" <?php if($reserva->getPagoOperadora()=='NC'){ echo 'selected';}?>>NC</option>
              <option value="RJ" <?php if($reserva->getPagoOperadora()=='RJ'){ echo 'selected';}?>>RJ</option>
              <option value="PP" <?php if($reserva->getPagoOperadora()=='PP'){ echo 'selected';}?>>PP</option>
              <option value="PR" <?php if($reserva->getPagoOperadora()=='PR'){ echo 'selected';}?>>PR</option>
              <option value="XL" <?php if($reserva->getPagoOperadora()=='XL'){ echo 'selected';}?>>XL con cargo</option>
              <option value="Error" <?php if($reserva->getPagoOperadora()=='Error'){ echo 'selected';}?>>Error al cancelar</option>
            </select> 
            </div>


            <div class="form-group">
            <label for="fecha_limite">Fecha límite  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="date" name="fecha_limite" id="fecha_limite" style="width: 50%;" value="<?php echo $reserva->getFechaLimite(); ?>" required>
            </div>


            <div class="form-group">
              <label for="estatus_reserva">Estatus de la reservación  <span class="text text-danger">*</span> </label>
            <select name="estatus_reserva" id="estatus_reserva" class="form-control" style="width: 50%;" required>
              <option value="Activa"  <?php if($reserva->getEstatusReserva()=='Activa'){ echo 'selected';}?>>Activa</option>
              <option value="Cancelada"  <?php if($reserva->getEstatusReserva()=='Cancelada'){ echo 'selected';}?>>Cancelada</option>
            </select> 
            </div>

            <div class="form-group">
            <input type="submit" class="btn btn-default btn-custom" value="Guardar Reservación">
            </div>  
           
            </form>
           
          
          </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <?php
    
    include_once '../../assets/template/footer.php';
?>