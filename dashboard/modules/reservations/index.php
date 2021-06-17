<?php 
session_start(); 
if($_SESSION['idRol']== null){
  header('Location: ../../login.php');
} 
require_once '../../class/Reserva.php';
$notifications = Reserva::recuperarPendientesPago();
$num_notifications = count($notifications);
$reservaciones = Reserva::recuperarTodos();
$actualizar_reserva = new Reserva();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $idReserva = $_POST['idReserva'];

  if(isset($_POST['estatus_reserva'])){

    $actualizar_reserva->actualizarEstatusReserva($idReserva, $_POST['estatus_reserva']);

  }
  
  header('Location: index.php');

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>CPANEL | Holiday Travel</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/css/adminlte.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-------> 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!--Icon-->
    <link rel="shortcut icon" href="../../assets/img/favicon.png">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../../index.php" class="nav-link" target="_blank">Ver sitio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://webmail.hostinger.mx" target="_blank" class="nav-link">Webmail</a>
      </li>

      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="https://auth-db270.hostinger.mx/" target="_blank" class="nav-link">PHPMyAdmin</a>
      </li> -->
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo $_SESSION['nombre']; ?>&nbsp;<i class="fas fa-chevron-down"></i>
     </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item" href="../../logout.php">Cerrar Sesión</a>
        </div>
      </li>

 <!-- Notifications Dropdown Menu -->
 <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <?php if($num_notifications>0){?>
          <span class="badge badge-danger navbar-badge"><?php echo $num_notifications; ?></span>
          <?php } ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
       <?php if($num_notifications>0){ ?>
          <span class="dropdown-header"><?php echo $num_notifications.' reservaciones requieren su atención';?></span>
          <?php  foreach($notifications as $item ): ?>
          <div class="dropdown-divider"></div>
          <a href="../reservations/save.php?idReserva=<?php echo $item[0] ?>" class="dropdown-item">
         <small> <i class="fas fa-exclamation-triangle mr-2"></i> <?php echo $item['agencia'] ?></small>
         <br>
          <small class=" text-muted"><?php $fecha = date_create($item['fecha_limite']); echo 'Fecha limite de pago: '. date_format($fecha, 'd-m-Y') ?></small>
          </a>
          <div class="dropdown-divider"></div>
          <?php endforeach;?>
           <a href="../reservations/index.php" class="dropdown-item dropdown-footer">Ver todas las reservaciones</a>
          <?php }else{ ?>
         
            <small style="margin-left:50px;">No hay notificaciones pendientes</small>
          <?php } ?>
         
        </div>
      </li>  
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="../../assets/img/gears.png" alt="CPANEL" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CPANEL</span><br>
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../assets/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="../../index.php" class="d-block">
         <?php
         if($_SESSION['idRol']==1){
            echo 'Super Administrador';
         }elseif($_SESSION['idRol']==2){
          echo 'Administrador';
         }else{
          echo 'Colaborador';
         }
         ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Módulos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if ($_SESSION['idRol']!=3){ ?>
            <li class="nav-item">
                <a href="../users/index.php" class="nav-link">
                <i class="fas fa-users"></i>
                  <p>Administrar usuarios</p>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="../travel_agencies/index.php" class="nav-link">
                  <i class="fa fa-hotel"></i>
                  <p>Solicitudes de Agencias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../slider/index.php" class="nav-link">
                  <i class="fas fa-image"></i>
                  <p>Slider Principal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../promos/index.php" class="nav-link">
                  <i class="fas fa-tags"></i>
                  <p>Promociones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../reservations/index.php" class="nav-link">
                 <i class="fas fa-clipboard-check"></i>
                  <p>Reservaciones</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">CPANEL</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CPANEL</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h3 class="text-center"> Administrar reservaciones </h3>

            
            
              <a href="save.php" class="btn btn-default btn-custom" > <i class="fas fa-plus"></i> Agregar nueva reservación</a><br><br>

              <br>

<?php  if (count($reservaciones) > 0): ?>

<hr>

<table class="table table-bordered table-responsive" id="table-data" style="font-size: 14px;" >
<thead class="thead-dark">
<tr class="text-center">
<th scope="col">Clave Interna</th>
<th scope="col">Agencia</th>
<th scope="col">Titular</th>
<th scope="col">Fecha Reservación</th>
<th scope="col">Broker</th>
<th scope="col">Clave</th>
<th scope="col">Hotel</th>
<th scope="col">Destino</th>
<th scope="col"> <span style="color:#292b2c;" class="d-block">Reservación</span>Fecha Inicio</th>
<th scope="col">Precio</th>
<th scope="col">Estatus servicio</th>
<th scope="col">Pago operadora</th>
<th scope="col"> <span style="color:#292b2c;" class="d-block">Reservación</span>Pago agencia</th>
<th scope="col"> <span style="color:#292b2c;" class="d-block">Reservación</span>Fecha limite</th>
<th scope="col">Estatus Reservación</th>
<th scope="col">Markup</th>
<th scope="col">Editar</th>
<th scope="col">Eliminar</th>

</tr>
</thead>
<tbody>
<?php 

foreach ($reservaciones as $item):
  
 $fecha_notificacion= date_create($item['fecha_notificacion']);
 $fecha_actual=date_create(date('d-m-Y'));  
/*  $interval = date_diff($fecha_notificacion, $fecha_actual);
 echo $interval->d; */


 if($fecha_actual>$fecha_notificacion){

    if($item['pago_operadora']== 'No Pagado'){

      $notificacion_class = 'class="table-danger"'; 

    }elseif($item['pago_agencia']== 'No Pagado' ){

        $notificacion_class = 'class="table-danger"'; 
        
    }else{
      $notificacion_class = 'class="table-success"';    
    }
 }elseif($item['pago_agencia']== 'Pagado' AND $item['pago_operadora']== 'Pagado' ){
    $notificacion_class = 'class="table-success"'; 
 }else{
    $notificacion_class = 'class="table-warning"'; 
 }

 if($item['estatus_reserva']== 'Cancelada'){
  $notificacion_class = 'class="table-dark"';
 }


 ?>
<tr <?php echo $notificacion_class; ?>>
<td class="text-center"><?php echo $item['idReserva']; ?></td>
<td><?php echo $item['agencia']; ?></td>
<td><?php echo $item['titular']; ?></td>
<td><?php $date= date_create($item['fecha_reservacion']); echo date_format($date,"d-m-Y"); ?></td>
<td><?php echo $item['broker']?></td>
<td><?php echo $item['clave']; ?></td>
<td><?php echo $item['descripcion']; ?></td>
<td><?php echo $item['destino']; ?></td>
<td><?php $date= date_create($item['fecha_inicio']); echo date_format($date,"d-m-Y"); ?></td>
<td>$<?php echo $item['precio'].$item['moneda']; ?></td>
<td class="text-center"><?php echo $item['estatus_servicio']; ?></td>
<td class="text-center">

<?php 
// Form Pago Operadora 
if ($item['pago_operadora'] =='No Pagado'){
  
?>

<form action="../reservations_paymentsO/index.php" method="post"> 
   <input type="hidden" name="idReserva" value="<?php echo $item[0] ?>">
  <button type="submit" class="btn btn-danger">
  <span class="badge"><?php echo $item['pago_operadora']?></span>
  </button> 
 </form>
<?php }else{ ?>
  <form action="../reservations_paymentsO/index.php" method="post"> 
   <input type="hidden" name="idReserva" value="<?php echo $item[0] ?>">
  <button type="submit" class="btn btn-success">
  <span class="badge"><?php echo $item['pago_operadora']?></span>
  </button> 
 </form>
<?php } ?>

</td>

<td class="text-center">
<?php
// Form Pago Agencia 
 if ($item['pago_agencia'] =='No Pagado'){
   
  ?>

<form action="../reservations_payments/index.php" method="post"> 
   <input type="hidden" name="idReserva" value="<?php echo $item[0] ?>">
  <button type="submit" class="btn btn-danger">
  <span class="badge"><?php echo $item['pago_agencia']?></span>
  </button> 
 </form>
<?php }else{ ?>
  <form action="../reservations_payments/index.php" method="post"> 
   <input type="hidden" name="idReserva" value="<?php echo $item[0] ?>">
  <button type="submit" class="btn btn-success">
  <span class="badge"><?php echo $item['pago_agencia']?></span>
  </button> 
 </form>
<?php } ?>
</td>
<td class="text-center font-weight-bold"><?php $date= date_create($item['fecha_limite']); echo date_format($date,"d-m-Y"); ?></td>
<td class="text-center">
<?php if ($item['estatus_reserva'] =='Cancelada'){
 echo '<a href="" class="btn btn-danger" data-toggle="modal" data-target="#modalEstatusReserva'.$item[0].'"><span class="badge">'.$item['estatus_reserva'].'</span></a>';
}else{
  echo '<a href="" class="btn btn-success" data-toggle="modal" data-target="#modalEstatusReserva'.$item[0].'"><span class="badge">'.$item['estatus_reserva'].'</span></a>';
} 
?>
</td>
<td class="text-center"><a href="markup.php?idReserva=<?php echo $item[0];?>" > <span class="btn btn-custom"><i class="fas fa-file-invoice-dollar"></i> </span> </a></td>
<td class="text-center"><a href="save.php?idReserva=<?php echo $item[0];?>" class="btn btn-warning far fa-edit"></a></td>
<td class="text-center"><a href="delete.php?idReserva=<?php echo $item[0];?>" onclick="return confirm('¿Está seguro que desea eliminar esta reservación?')" class="btn btn-danger fas fa-trash-alt"></a></td> 
</tr>



<!-- Modal Estatus Reservación-->
<div class="modal fade" id="modalEstatusReserva<?php echo $item[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cambiar estatus de la reservación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

     
              <form action="" method="post">

              <div class="form-group">
        <label>Clave de la reservación: <?php echo $item['clave'];?></label>
        </div>

        <div class="form-group">
        <input class="form-control" type="hidden" name="idReserva" id="idReserva" value="<?php echo $item[0]; ?>">
        </div>

        <div class="form-group">
              <label for="estatus_reserva">Estatus de la reservación  <span class="text text-danger">*</span> </label>
            <select name="estatus_reserva" id="estatus_reserva" class="form-control" style="width: 50%;" required>
              <option value="Activa"  <?php if($item['estatus_reserva']=='Activa'){ echo 'selected';}?>>Activa</option>
              <option value="Cancelada"  <?php if($item['estatus_reserva']=='Cancelada'){ echo 'selected';}?>>Cancelada</option>
            </select> 
            </div>
        <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Confirmar cambios">
        </div> 
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>
</tbody>
</table>


<?php else: ?>
<p class="alert alert-info"> No se encontraron reservaciones registradas </p>
<?php endif; ?>

    
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <p>Copyright &copy; <?php echo date('Y') ?>. Todos los derechos reservados | Holiday Travel</p>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

  <script
  src="sdk.min.js"
  onload="indigitall.init({
    appKey: '708a03e9-a616-4de1-a4f2-c353b456ee92',
    workerPath: 'worker.min.js',
    requestLocation: true
  })"
  async>
</script>
  <!-- /.content-wrapper -->
  <!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/js/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="../../assets/js/additional-methods.js"></script>
<script src="../../assets/js/user_validate.js"></script> 
<script src="../../assets/js/slider_validate.js"></script> 
<script src="../../assets/js/promo_validate.js"></script> 
<script src="../../assets/js/data.js"></script>
</body>
</html>
