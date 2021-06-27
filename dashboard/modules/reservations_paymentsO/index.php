<?php

require_once '../../class/Pago.php';
require_once '../../class/Reserva.php';
include_once '../../assets/template/header.php';
$idReserva = (isset($_REQUEST['idReserva'])) ? $_REQUEST['idReserva'] : null;
$pagos_reservas = Pago::recuperarPagosOperadora($idReserva);
$monto = Pago::recuperarTotalAbonado($idReserva,2);       
$reserva = Reserva::buscarPorId($idReserva);  
$nombre_agencia = Reserva::buscarNombreAgencia($idReserva);

$total_abonado = 0;
foreach($monto as $pago){
  $total_abonado = ($total_abonado + $pago['monto']);
}



?>

<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">

        <div class="row">

        <div class="col">
        <a href="../reservations/index.php" class="btn btn-default btn-lg btn-custom" > <i class="fas fa-clipboard-check"></i> Ver todas las reservaciones</a><br><br>
        <div  style="width:80%; margin-left:10%; margin-top:30px; background-color: white; padding:20px; border-radius:10px;">
        <h4 class="section-form">Referencia de pago operadora (<?php echo $reserva->getBroker()." - ".$reserva->getClave(); ?> ) </h4>

        <?php 
        
       if($reserva->getSaldoRestante()!=0){ 
        
        $num_pago = count($pagos_reservas)+1 ?>
            <small style="margin-left: 82%;">Número de Pago: <?php echo $num_pago ?> </small>
        
        <?php } ?>
            <table class="table table-borderless">
              <tr>
                <td class="w-50">
                <strong> Agencia: </strong> <?php echo $nombre_agencia['nombre_comercial']; ?>
                </td>
                <td class="w-50">
                    <strong> Registrado por: </strong> <?php echo $_SESSION['nombre']; ?>
                </td>
              </tr>
              <tr>
                <td>
                <strong> Titular: </strong> <?php echo $reserva->getTitular(); ?>
                </td>
                <td>  <strong>Fecha: </strong><?php echo date("d-m-Y"); ?> </td>
              </tr>

              <tr>
                <td>
                <strong> Precio Neto: </strong> $<?php echo $reserva->getPrecioNeto().$reserva->getMoneda(); ?>
                </td>
                <td><strong>Hora:</strong> <?php echo date("H:i:s"); ?></td>
              </tr>

              
            </table>

           <hr>
        
        <form action="payment_register.php" method="post" id="promo_form">
            <div class="form-group">
            <input class="form-control" type="hidden" name="idReserva" id="idReserva" value="<?php echo $idReserva ?>">
            </div>

            <div class="form-group">
            <input class="form-control" type="hidden" name="fecha_pago" id="fecha_pago" value="<?php echo date("Y-m-d H:i:s"); ?>">
            </div>

            <div class="form-group">
            <input class="form-control" type="hidden" name="categoria_pago" id="categoria_pago" value="2">
            </div>

            <div class="form-group form-inline">
            <label for="saldo_abonado" class="mr-2">Saldo abonado</label>
            <span class="mr-1">$</span>
            <input class="form-control mr-2" type="number" style="width: 25%;" name="saldo_abonado" id="saldo_abonado" value="<?php echo $total_abonado; ?>" readonly>
            <input class="form-control" style="width: 8%;" type="text" name="moneda" id="moneda" value="<?php echo $reserva->getMoneda(); ?>" readonly>&nbsp;
            <?php if($reserva->getSaldoRestanteOperadora()==0){ echo '<i class="far fa-check-circle fa-2x text-success"></i>';} ?>
            </div>

            <div class="form-group form-inline">
            <label for="referencia" class="mr-2">Saldo Neto restante</label>
            <span class="mr-1">$</span>
            <input class="form-control mr-2" style="width: 25%;" type="number" name="saldo_restanteO" id="saldo_restanteO" value="<?php echo $reserva->getSaldoRestanteOperadora(); ?>" readonly>
            <input class="form-control" style="width: 8%;" type="text" name="moneda" id="moneda" value="<?php echo $reserva->getMoneda(); ?>" readonly>
            </div>

            <?php 
              if($reserva->getSaldoRestanteOperadora()!=0){
            ?>
           
              <div class="form-group form-inline">
            <label for="tipo_cambio">Tipo de cambio <span class="text text-danger mr-2">*</span></label>
            <input class="form-control mr-2" style="width: 10%;"  type="number" name="tipo_cambio" id="tipo_cambio" min=1 value="1" style="width: 20%;"  <?php if($reserva->getMoneda() =='MXN'){ echo 'readonly'; }?> required >
            <span>MXN</span>
              </div>
            

            <div class="form-group form-inline">
            <label for="monto">Importe de pago <span class="text text-danger mr-2">*</span></label>
            <span class="mr-1">$</span>
            <input class="form-control mr-2" style="width: 23%;" type="number" name="monto" id="monto" min="0" max="<?php echo $reserva->getSaldoRestanteOperadora(); ?>" value="" placeholder="0" required>
            <input class="form-control" style="width: 8%;" type="text" name="moneda" id="moneda" value="<?php echo $reserva->getMoneda(); ?>" readonly>
            </div>

            <div class="form-group">
              <label for="forma_pago">Forma de pago <span class="text text-danger">*</span></label>
            <select name="forma_pago" id="forma_pago" class="form-control" style="width: 50%;" required>
              <option value="">Selecciona una opción</option>
              <option value="Efectivo">Efectivo</option>
              <option value="Transferencia">Transferencia</option>
              <option value="Tarjeta de crédito">Tarjeta de crédito</option>
              <option value="Depósito Bancario">Depósito Bancario</option>
              <option value="Paypal">Paypal</option>
            </select> 
            </div>

            <div class="form-group">
            <label for="referencia">Referencia <span class="text text-danger">*</span></label>
            <input class="form-control" type="text" name="referencia" id="referencia" value="" required>
            </div>

            <div class="form-group">
            <label for="referencia">Comentario <small>Opcional</small></label>
            <textarea class="form-control" rows="2" name="descripcion" id="descripcion"></textarea>
            </div>
            
            <div class="form-group">
            <input type="submit" class="btn btn-default btn-custom" value="Guardar Pago">
            </div> 
            <?php
              }else{
                echo '<p class="alert alert-success">El pago operadora ha sido pagado, consulte el historial de pagos para más detalle.</p>';
              }
            ?>
          </form>
        
        </div>
        </div>
        <!-- /.row 1 -->
        </div>


        <div class="row">
          <div class="col">

          <div  style="width:80%; margin-left:10%; margin-top:30px; background-color: white; padding:20px; border-radius:10px;">
            
          <h4 class="section-form">Historial de pagos operadora</h4>
          
          <?php
            if(count($pagos_reservas)>0){
          ?>
          <table>

          <table class="table table-bordered table-responsive" id="table-data" style="font-size: 14px;" >
              <thead class="thead-dark">
              <tr class="text-center">
              <th scope="col">No. de pago</th>
              <th scope="col">Fecha y hora de pago</th>
              <th scope="col">Referencia</th>
              <th scope="col">Forma de pago</th>
              <th scope="col">Monto</th>
              <th scope="col">Tipo de cambio</th>
              <th scope="col">Comentario</th>
              <th scope="col">Registrado por</th>
              <th scope="col">Papeleta</th>
             </tr>
            </thead>
            <tbody>
          <?php 
            $num_movimiento = 0;
            foreach($pagos_reservas as $item):
        
         
         ?>
          <tr>
                
                <td><?php $num_movimiento=$num_movimiento+1; echo $num_movimiento;  ?></td>
                <td>
                 <?php $date= date_create($item['fecha_pago']); echo date_format($date,"d-m-Y - H:i:s"); ?>
                </td>
                <td><?php echo $item['referencia']; ?></td>
                <td><?php echo $item['forma_pago']; ?></td>
                <td><?php echo $item['monto'].$reserva->getMoneda(); ?></td>
                <td><?php echo $item['tipo_cambio'].' MXN' ?></td>
                <td><small><?php echo $item['descripcion']; ?></small></td>
                <td><?php echo $item['creado_por']; ?></td>
                <td><a href="../payments_reports/crearPdf.php?idReserva=<?php echo $item['idReserva']; ?>&idPagoReserva=<?php echo $item['idPagoReserva']; ?>"><img src="../../assets/img/icon-pdf.png" width="70" height="70" alt="Descargar papeleta"></a></a></td>
               
               
          
          
          </tr>     
          <?php
            endforeach;
          ?>
            </tbody>
          </table>
          <br>
          <hr>
          
                  <form action="delete.php" method="post" onsubmit="return confirm('¿Está seguro que desea realizar esta acción? \n Se borrará todo el historial de pagos de esta reservación.');">
              <input type="hidden" name="idReserva" value="<?php echo $reserva->getIdReserva(); ?>">
              <input type="hidden" name="precioNeto" value="<?php echo $reserva->getPrecioNeto(); ?>">
              <input type="hidden" name="precio" value="<?php echo $reserva->getPrecio(); ?>">
              
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-exclamation-triangle mr-2"></i>Borrar historial de pagos</button>
              </form>
            <small class="text text-danger">*Esta acción borrará todo el historial de pagos y se reestablecerá el pago de la reservación a su estado inicial, se requiere autorización de un administrador.</small>
          <?php
            }else{
              echo ' <p class="text text-primary">No se han recibido pagos operadora de esta reservación</p>';
            }
          ?>
         
          </div>
            
          </div>
          <!-- /.col -->
        </div>
        <br>
        <!-- /.row 2 -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include_once '../../assets/template/footer.php';
?>