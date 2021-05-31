<?php
require_once '../../class/Reserva.php';
$idReserva = (isset($_REQUEST['idReserva'])) ? $_REQUEST['idReserva'] : null;

    if($idReserva){        
        $reserva = Reserva::buscarPorId($idReserva);   
          
    }else{
        $reserva = new Reserva(); 
       
    }

   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

          $idReserva = (isset($_POST['idReserva'])) ? $_POST['idReserva'] : null;
          $agencia = (isset($_POST['agencia'])) ? $_POST['agencia'] : null;
          $titular = (isset($_REQUEST['titular'])) ? $_REQUEST['titular'] : null;
          $fecha_reservacion = (isset($_POST['fecha_reservacion'])) ? $_POST['fecha_reservacion'] : null;
          $broker = (isset($_REQUEST['broker'])) ? $_REQUEST['broker'] : null;
          $clave = (isset($_REQUEST['clave'])) ? $_REQUEST['clave'] : null;
          $descripcion = (isset($_REQUEST['descripcion'])) ? $_REQUEST['descripcion'] : null;  
          $destino = (isset($_REQUEST['destino'])) ? $_REQUEST['destino'] : null;  
          $fecha_inicio = (isset($_REQUEST['fecha_inicio'])) ? $_REQUEST['fecha_inicio'] : null;
          $precio = (isset($_REQUEST['precio'])) ? $_REQUEST['precio'] : null;
          $estatus_servicio = (isset($_REQUEST['estatus_servicio'])) ? $_REQUEST['estatus_servicio'] : null;
          $pago_operadora = (isset($_REQUEST['pago_operadora'])) ? $_REQUEST['pago_operadora'] : null;
          $pago_agencia = (isset($_REQUEST['pago_agencia'])) ? $_REQUEST['pago_agencia'] : null;
          $fecha_limite = (isset($_REQUEST['fecha_limite'])) ? $_REQUEST['fecha_limite'] : null;
          
          if($idReserva==""){
            
            $fecha_notificacion = date('Y-m-d',strtotime($fecha_limite."- 7 days"));
          }else{
            $fecha_notificacion = (isset($_REQUEST['fecha_notificacion'])) ? $_REQUEST['fecha_notificacion'] : null;
          }
          $estatus_notificacion = (isset($_REQUEST['estatus_notificacion'])) ? $_REQUEST['estatus_notificacion'] : null;
          $estatus_reserva = (isset($_REQUEST['estatus_reserva'])) ? $_REQUEST['estatus_reserva'] : null;
          
          $reserva->setAgencia($agencia);
          $reserva->setTitular($titular);
          $reserva->setFechaReservacion($fecha_reservacion);
          $reserva->setBroker($broker);
          $reserva->setClave($clave);
          $reserva->setDescripcion($descripcion);
          $reserva->setDestino($destino);
          $reserva->setFechaInicio($fecha_inicio);
          $reserva->setPrecio($precio);
          $reserva->setEstatusServicio($estatus_servicio);
          $reserva->setPagoOperadora($pago_operadora);
          $reserva->setPagoAgencia($pago_agencia);
          $reserva->setFechaLimite($fecha_limite);
          $reserva->setFechaNotificacion($fecha_notificacion);
          $reserva->setEstatusNotificacion($estatus_notificacion);  
          $reserva->setEstatusReserva($estatus_reserva);  
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
            <label for="agencia">Nombre de la agencia <span class="text text-danger">*</span> </label>
            <input class="form-control" type="text" name="agencia" id="agencia" value="<?php echo $reserva->getAgencia(); ?>" required>
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


            <div class="form-group">
            <label for="precio">Precio  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="text" name="precio" id="precio" value="<?php echo $reserva->getPrecio(); ?>" style="width: 50%;" required>
            </div>

            <div class="form-group">
              <label for="estatus_servicio">Estatus Servicio  <span class="text text-danger">*</span></label>
            <select name="estatus_servicio" id="estatus_servicio" class="form-control" style="width: 50%;">
              <option value="OK">OK</option>
            </select> 
            </div>

            <div class="form-group">
              <label for="pago_operadora">Pago Operadora  <span class="text text-danger">*</span></label>
            <select name="pago_operadora" id="pago_operadora" class="form-control" style="width: 50%;">
              <option value="">Seleccione una opción</option>
              <option value="No Pagado" <?php if($reserva->getPagoOperadora()=='No Pagado'){ echo 'selected';}?>>No Pagado</option>
              <option value="Pagado" <?php if($reserva->getPagoOperadora()=='Pagado'){ echo 'selected';}?>>Pagado</option>
            </select> 
            </div>

            <div class="form-group">
              <label for="pago_agencia">Pago Agencia  <span class="text text-danger">*</span></label>
            <select name="pago_agencia" id="pago_agencia" class="form-control" style="width: 50%;">
            <option value="">Seleccione una opción</option>
              <option value="No Pagado" <?php if($reserva->getPagoOperadora()=='No Pagado'){ echo 'selected';}?>>No Pagado</option>
              <option value="Pagado" <?php if($reserva->getPagoOperadora()=='Pagado'){ echo 'selected';}?>>Pagado</option>
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