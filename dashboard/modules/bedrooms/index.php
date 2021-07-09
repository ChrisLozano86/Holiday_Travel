<?php
if(!isset($_GET['idReserva'])){
  header('Location: ../reservations/index.php');
}
include_once '../../assets/template/header.php';
require_once ('../../class/Reserva.php');
require_once ('../../class/Habitacion.php');
$reserva = Reserva::buscarPorId($_GET['idReserva']);
$habitaciones = Habitacion::recuperarTodos($_GET['idReserva']);
$nombre_agencia = Reserva::buscarNombreAgencia($_GET['idReserva']);



?>
<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">

          <a href="../reservations/index.php" class="btn btn-primary"><i class="fas fa-chevron-circle-left mr-2"></i>Regresar a reservaciones</a><br><br>
          
            <h3>Gestionar habitaciones para la reservacion (<?php echo $reserva->getBroker() .' - '. $reserva->getClave(); ?>) </h3>
            <table class="table table-borderless">
              <tr>
                <td class="w-50">
                <strong> Agencia: </strong> <?php echo $nombre_agencia[1]; ?>
                </td>
                <td class="w-50">
                <strong> Titular: </strong> <?php echo $reserva->getTitular(); ?>
                </td>
              </tr>
              <tr>
                <td>
                <strong>Fecha de la reservación: </strong><?php echo $reserva->getFechaReservacion()?>
                </td>
                <td>  </td>
              </tr>

              <tr>
                <td>
                
              </tr>

            </table>
            <a href="save.php?idReserva=<?php echo $_GET['idReserva'] ?>" class="btn btn-primary"><i class="fas fa-plus-circle fa-2x"></i></a><br><br>
            <?php  if (count($habitaciones) > 0): ?>
            <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No. de habitación</th>
      <th scope="col">Tipo de habitación</th>
      <th scope="col">Suplemento</th>
      <th scope="col">Plan de alimentos</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>

      
    </tr>
  </thead>
  <tbody>
    <?php 
    $numero_habitacion = 0;
    foreach ($habitaciones as $item):
    $numero_habitacion ++;
     ?>
    <tr>
     <td class="text-center"><strong><?php echo $numero_habitacion;?></strong></td>
     <td><?php echo $item['tipo_habitacion'];?></td>
     <td><?php echo $item['suplemento'];?></td>
     <td><?php echo $item['plan_alimento'];?></td>
     <td class="text-center"><a href="save.php?idReserva=<?php echo $item[0];?>" class="btn btn-warning far fa-edit"></a></td>
     <td class="text-center"><a href="delete.php?idReserva=<?php echo $item[0];?>" onclick="return confirm('¿Está seguro que desea eliminar esta habitación?')" class="btn btn-danger fas fa-trash-alt"></a></td> 
      

    <?php 

    endforeach;
    ?>


   </tr>
  </tbody>
</table>
<?php else: ?>
            <p class="alert alert-warning"> No hay habitaciones registradas para esta reservación </p>
        <?php endif; ?>
            
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