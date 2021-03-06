<?php
require_once '../../class/Reserva.php';
require_once '../../class/Pago.php';
require_once '../../class/Agencia.php';


$idReserva = (isset($_REQUEST['idReserva'])) ? $_REQUEST['idReserva'] : null;
$pagos_reservas = Pago::recuperarPagosAgencia($idReserva); 
$pagos_reservasO = Pago::recuperarPagosOperadora($idReserva); 
$agencias = Agencia::recuperarIdAgencias(); 
$total_agencias = Agencia::recuperarTodos();
$agenciasSC = Agencia::recuperarIdAgenciasSC(); 


    if($idReserva){        
        $reserva = Reserva::buscarPorId($idReserva); 
    
    }else{
        $reserva = new Reserva(); 
       
    }

   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

          $idReserva = (isset($_POST['idReserva'])) ? $_POST['idReserva'] : null;
          $idAgencia = (isset($_POST['idAgencia'])) ? $_POST['idAgencia'] : null;
          $precio_neto = (isset($_REQUEST['precio_neto'])) ? $_REQUEST['precio_neto'] : null;
          $titular = (isset($_REQUEST['titular'])) ? $_REQUEST['titular'] : null;
          $fecha_reservacion = (isset($_POST['fecha_reservacion'])) ? $_POST['fecha_reservacion'] : null;
          $broker = (isset($_REQUEST['broker'])) ? $_REQUEST['broker'] : null;
          $clave = (isset($_REQUEST['clave'])) ? $_REQUEST['clave'] : null;
          $tipo_servicio = (isset($_REQUEST['tipo_servicio'])) ? $_REQUEST['tipo_servicio'] : null;
          $detalle_servicio = (isset($_REQUEST['detalle_servicio'])) ? $_REQUEST['detalle_servicio'] : null;
          $destino = (isset($_REQUEST['destino'])) ? $_REQUEST['destino'] : null;  
          $descripcion = (isset($_REQUEST['descripcion'])) ? $_REQUEST['descripcion'] : null;  
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
          
          $reserva->setIdAgencia($idAgencia);
          $reserva->setPrecioNeto($precio_neto);
          $reserva->setTitular($titular);
          $reserva->setFechaReservacion($fecha_reservacion);
          $reserva->setBroker($broker);
          $reserva->setClave($clave);
          $reserva->setDescripcion($descripcion);
          $reserva->setTipoServicio($tipo_servicio);
          $reserva->setDetalleServicio($detalle_servicio);
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

          <?php 
         
            if(count($total_agencias)>0):

          ?>
      

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

         
          <?php 
              if(count($agenciasSC)>0){
                echo ' <div class="alert alert-danger">';
                $plural = '';
                $num_agencias = count($agenciasSC);
                if(count($agenciasSC)>1){
                  $plural = 's';
                }

                echo "<small> Hay $num_agencias agencia$plural sin comisi??n o markup establecido </small>";
                echo '<ul>';
                foreach($agenciasSC as $sc){
                  ?>
                  
                 <li> <strong> <?php echo $sc['nombre_comercial']; ?> </strong> no tiene comisi??n o markup definido, puede hacer clic <a href="../markups/save.php?idAgencia=<?php echo $sc[0]; ?>">aqu?? </a> para modificar sus ajustes.</li>
                  
               <?php
                }
                echo '</ul>';
                echo '</div>';
              }


            ?>
          
          
          </div>


            <div class="form-group">
            <label for="agencia">Agencia <span class="text text-danger">*</span> </label>

           

            <select name="idAgencia" id="idAgencia" class="form-control" style="width: 50%;" required>
              <option value="">Selecciona una agencia</option>
              <?php foreach($agencias as $agencia): ?>
              <option value="<?php echo $agencia[0]; ?>"  <?php if($reserva->getIdAgencia()== $agencia[0]  ){ echo 'selected';}?>> <?php echo $agencia['nombre_comercial'];?> </option>
             <?php endforeach; ?>
            </select> 
            
            </div>


            <div class="form-group">
            <label for="agencia">Titular  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="text" name="titular" id="titular" value="<?php echo $reserva->getTitular(); ?>" required>
            </div>

            <div class="form-group">
            <label for="fecha_reservacion">Fecha de reservaci??n  <span class="text text-danger">*</span> </label>
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
              <option value="Hotel" <?php if($reserva->getBroker()=='Hotel'){ echo 'selected';}?>>Hotel</option>
              <option value="Kaluah" <?php if($reserva->getBroker()=='Kaluah'){ echo 'selected';}?>>Kaluah</option>
              <option value="Taylor Beds" <?php if($reserva->getBroker()=='Taylor Beds'){ echo 'selected';}?>>Taylor Beds</option>
              <option value="Fontan Ixtapa" <?php if($reserva->getBroker()=='Fontan Ixtapa'){ echo 'selected';}?>>Fontan Ixtapa</option>
              <option value="Posada Real" <?php if($reserva->getBroker()=='Posada Real'){ echo 'selected';}?>>Posada Real</option>
              <option value="Friendly Vallarta" <?php if($reserva->getBroker()=='Friendly Vallarta'){ echo 'selected';}?>>Friendly Vallarta</option>
            </select> 
            </div>


            <div class="form-group">
            <label for="clave">Clave  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="text" name="clave" id="clave" value="<?php echo $reserva->getClave(); ?>" required>
            </div>

            <div class="form-group">
              <label for="tipo_servicio">Servicio <span class="text text-danger">*</span> </label>
            <select name="tipo_servicio" id="tipo_servicio" class="form-control" style="width: 50%;" required>
              <option value="">Selecciona un servicio </option>
              <option value="Hotel"  <?php if($reserva->getTipoServicio()=='Hotel'){ echo 'selected';}?>>Hotel</option>
              <option value="Vuelo" <?php if($reserva->getTipoServicio()=='Vuelo'){ echo 'selected';}?>>Vuelo</option>
              <option value="Crucero" <?php if($reserva->getTipoServicio()=='Crucero'){ echo 'selected';}?>>Crucero</option>
              <option value="Tour" <?php if($reserva->getTipoServicio()=='Tour'){ echo 'selected';}?>>Tour</option>
              <option value="Circuito" <?php if($reserva->getTipoServicio()=='Circuito'){ echo 'selected';}?>>Circuito</option>
              <option value="Renta de auto" <?php if($reserva->getTipoServicio()=='Renta de auto'){ echo 'selected';}?>>Renta de auto</option>
              <option value="Traslado" <?php if($reserva->getTipoServicio()=='Traslado'){ echo 'selected';}?>>Traslado</option>
              <option value="Paquete" <?php if($reserva->getTipoServicio()=='Paquete'){ echo 'selected';}?>>Paquete</option>
              <option value="Seguro" <?php if($reserva->getTipoServicio()=='Seguro'){ echo 'selected';}?>>Seguro</option>
            </select> 
            </div>

            <div class="form-group">
            <label for="contenido">Detalle del servicio</label>
           <textarea class="form-control" name="detalle_servicio" id="detalle_servicio" rows="2" ><?php echo $reserva->getDetalleServicio(); ?></textarea>
            </div>  

            <div class="form-group">
            <label for="descripcion">Destino  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="text" name="destino" id="destino" value="<?php echo $reserva->getDestino(); ?>" required>
            </div>
            <br>
            <!--Habitaciones -->
            
              
             <?php 

                 //include_once 'partials/frm_reservations.php'; 

             ?>




            <div class="form-group">
            <label for="contenido">Observaciones</label>
           <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ><?php echo $reserva->getDescripcion(); ?></textarea>
            </div>  

            <div class="form-group">
            <label for="fecha_inicio">Fecha de inicio  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" style="width: 50%;" value="<?php echo $reserva->getFechaInicio(); ?>" required>
            </div>

            <div class="form-group form-inline">
            <label for="moneda" class="mr-2">Moneda a utilizar<span class="text text-danger">*</span> </label>
            <?php if(count($pagos_reservas)>0 OR count($pagos_reservasO)>0){ ?>
              <input class="form-control" type="text" name="moneda_aux" id="moneda_aux" value="<?php echo $reserva->getMoneda(); ?>" style="width: 15%;" readonly >
            <?php }else{ ?>
            <select name="moneda" id="moneda" class="form-control" style="width: 25%;" onchange="establecerMoneda();">
              <option value="MXN" <?php if($reserva->getMoneda()=='MXN'){ echo 'selected';}?>>Peso Mexicano</option>
              <option value="USD" <?php if($reserva->getMoneda()=='USD'){ echo 'selected';}?>>D??lar estadounidense</option>
              <option value="AUD" <?php if($reserva->getMoneda()=='AUD'){ echo 'selected';}?>>D??lar australiano</option>
              <option value="CAD" <?php if($reserva->getMoneda()=='CAD'){ echo 'selected';}?>>D??lar canandiene</option>
              <option value="CRC" <?php if($reserva->getMoneda()=='CRC'){ echo 'selected';}?>>Col??n Costarricense</option>
              <option value="EUR" <?php if($reserva->getMoneda()=='EUR'){ echo 'selected';}?>>Euro</option>
              <option value="HNL" <?php if($reserva->getMoneda()=='HNL'){ echo 'selected';}?>>Lempira</option>
              <option value="GBP" <?php if($reserva->getMoneda()=='GBP'){ echo 'selected';}?>>Libra esterlina</option>
              <option value="PEN" <?php if($reserva->getMoneda()=='PEN'){ echo 'selected';}?>>Nuevo Sol Peruano</option>
              <option value="ARS" <?php if($reserva->getMoneda()=='ARS'){ echo 'selected';}?>>Peso argentino</option>
              <option value="CLP" <?php if($reserva->getMoneda()=='CLP'){ echo 'selected';}?>>Peso chileno</option>
              <option value="PEN" <?php if($reserva->getMoneda()=='PEN'){ echo 'selected';}?>>Peso colombiano</option>
              <option value="GTQ" <?php if($reserva->getMoneda()=='GTQ'){ echo 'selected';}?>>Quetzal Guatemalteco</option>
              <option value="BRL" <?php if($reserva->getMoneda()=='BRL'){ echo 'selected';}?>>Real Brasile??o</option>
              

            </select>
            <?php } ?>
            </div>


            <div class="form-group form-inline">
            <label for="precio_neto" class="mr-2">Precio Neto  <span class="text text-danger">*</span> </label>
            
            <span class="mr-1">$</span><input class="form-control mr-2" type="text" name="precio_neto" id="precio_neto" value="<?php echo $reserva->getPrecioNeto(); ?>" style="width: 27%;" required <?php if(count($pagos_reservas)>0 OR count($pagos_reservasO)>0){echo 'readonly';} ?> placeholder="0.00">
            
              <input class="form-control" type="text" name="moneda_precio_neto" id="moneda_precio_neto" value="<?php if($reserva->getMoneda()==""){ echo 'MXN'; }else{ echo $reserva->getMoneda();} ?>" style="width: 15%;" readonly >
            
            </div>


            <div class="form-group form-inline">
            <label for="precio" class="mr-2">Precio Total <span class="text text-danger">*</span> </label>
            
            <span class="mr-1">$</span><input class="form-control mr-2" type="text" name="precio" id="precio" value="<?php echo $reserva->getPrecio(); ?>" style="width: 27%;" required <?php if(count($pagos_reservas)>0 OR count($pagos_reservasO)>0){echo 'readonly';} ?> placeholder="0.00">
            <input class="form-control" type="text" name="moneda_precio_total" id="moneda_precio_total" value="<?php if($reserva->getMoneda()==""){ echo 'MXN'; }else{ echo $reserva->getMoneda();} ?>" style="width: 15%;" readonly >
            <br>
            <?php if(count($pagos_reservas)>0 OR count($pagos_reservasO)>0){echo '<p class="badge badge-info mt-2">Esta reserva ya tiene pagos registrados en su historial, para editar el precio primero debe reestablecer el historial pagos.</p>';} ?>
            </div>
            
            <div class="form-group">
              <label for="estatus_servicio">Estatus Servicio  <span class="text text-danger">*</span></label>
            <select name="estatus_servicio" id="estatus_servicio" class="form-control" style="width: 50%;">
              <option value="OK" >OK</option>
              <option value="XL" >XL</option>
              <option value="RQ" >RQ</option>
              <option value="NC" >NC</option>
              <option value="RJ" >RJ</option>
              <option value="PP" >PP</option>
              <option value="PR" >PR</option>
              <option value="XL" >XL con cargo</option>
              <option value="Error" >Error al cancelar</option>
            </select> 
            </div>


            <div class="form-group">
            <label for="fecha_limite">Fecha l??mite  <span class="text text-danger">*</span> </label>
            <input class="form-control" type="date" name="fecha_limite" id="fecha_limite" style="width: 50%;" value="<?php echo $reserva->getFechaLimite(); ?>" required>
            </div>


            <div class="form-group">
              <label for="estatus_reserva">Estatus de la reservaci??n  <span class="text text-danger">*</span> </label>
            <select name="estatus_reserva" id="estatus_reserva" class="form-control" style="width: 50%;" required>
              <option value="Activa"  <?php if($reserva->getEstatusReserva()=='Activa'){ echo 'selected';}?>>Activa</option>
              <option value="Cancelada"  <?php if($reserva->getEstatusReserva()=='Cancelada'){ echo 'selected';}?>>Cancelada</option>
            </select> 
            </div>

            <div class="form-group">
            <input type="submit" class="btn btn-default btn-custom" value="Guardar Reservaci??n">
            </div>  
           
            </form>


            <script>
              
                function establecerMoneda(){
                    var moneda = document.getElementById('moneda').value;
                       

                        document.getElementById('moneda_precio_neto').value = moneda;
                        document.getElementById('moneda_precio_total').value = moneda;
                    
                }

          </script>
           <?php else: ?>
          <p class="alert alert-info"> No se encontraron agencias registradas  </p>
          <?php endif; ?>
          
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