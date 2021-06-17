<?php

require_once '../../class/Pago.php';
require_once '../../class/Reserva.php';
include_once '../../assets/template/header.php';
$idReserva = (isset($_REQUEST['idReserva'])) ? $_REQUEST['idReserva'] : null;      
$reserva = Reserva::buscarPorId($idReserva);  

$comision_agencia = $reserva->getPrecio() * ($reserva->getComisionAgencia()/100);
$markup_operadora = $reserva->getPrecio() * ($reserva->getMarkupOperadora()/100);





?>

<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">

        <div class="row">

        <div class="col">
        <a href="../reservations/index.php" class="btn btn-default btn-lg btn-custom" > <i class="fas fa-clipboard-check"></i> Ver todas las reservaciones</a><br><br>
        <div  style="width:80%; margin-left:10%; margin-top:30px; background-color: white; padding:20px; border-radius:10px;">
        <h4 class="section-form">Markup (<?php echo $reserva->getBroker()." - ".$reserva->getClave(); ?> ) </h4>


            <table class="table table-borderless">
              <tr>
                <td class="w-50">
                <strong> Tarifa Neta: </strong> $<?php echo $reserva->getPrecioNeto()." ". $reserva->getMoneda(); ?>
                </td>
              </tr>
              <tr>
                <td>
                <strong> Markup Operadora <?php echo $reserva->getMarkupOperadora(); ?>%  </strong> $<?php echo $markup_operadora." ". $reserva->getMoneda(); ?>
                </td>
                
              </tr>

              <tr>
                <td>
                <strong> Comisión Agencia <?php echo $reserva->getComisionAgencia(); ?>%  </strong> $<?php echo $comision_agencia." ". $reserva->getMoneda(); ?>
                </td>
              </tr>

              <tr>
              <td>
                <strong> Total: </strong> $<?php echo $reserva->getPrecio()." ". $reserva->getMoneda(); ?>
                </td>
               
              </tr>
              
            </table>

           
          
        </div>
          </div>
          <!-- /.col -->
        </div>
      
        <!-- /.row 2 -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include_once '../../assets/template/footer.php';
?>