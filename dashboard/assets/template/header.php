<?php
session_start();
if ($_SESSION['idRol'] == null) {
  header('Location: login.php');
}
require_once '../../class/Reserva.php';
$notifications = Reserva::recuperarPendientesPago();
$num_notifications = count($notifications);
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

        <li class="nav-item d-none d-sm-inline-block">
          <a href="https://console.indigitall.com/" target="_blank" class="nav-link">Configuración Push</a>
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
        <?php if ($_SESSION['idRol'] == 1 or $_SESSION['idRol'] == 2) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <?php if ($num_notifications > 0) { ?>
                <span class="badge badge-danger navbar-badge"><?php echo $num_notifications; ?></span>
              <?php } ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <?php if ($num_notifications > 0) { ?>
                <span class="dropdown-header"><?php echo $num_notifications . ' reservaciones requieren su atención'; ?></span>
                <?php foreach ($notifications as $item) : ?>
                  <div class="dropdown-divider"></div>
                  <a href="../reservations/save.php?idReserva=<?php echo $item['idReserva'] ?>" class="dropdown-item">
                    <small> <i class="fas fa-exclamation-triangle mr-2"></i> <?php echo $item['nombre_comercial'] ?></small>
                    <br>
                    <small class=" text-muted"><?php $fecha = date_create($item['fecha_limite']);
                                                echo 'Fecha limite de pago: ' . date_format($fecha, 'd-m-Y') ?></small>
                  </a>
                  <div class="dropdown-divider"></div>
                <?php endforeach; ?>
                <a href="../reservations/index.php" class="dropdown-item dropdown-footer">Ver todas las reservaciones</a>
              <?php } else { ?>

                <small style="margin-left:50px;">No hay notificaciones pendientes</small>
              <?php } ?>

            </div>
          </li>
        <?php } ?>


      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../index.php" class="brand-link">
        <img src="../../assets/img/gears.png" alt="CPANEL" class="brand-image img-circle elevation-3" style="opacity: .8">
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
              if ($_SESSION['idRol'] == 1) {
                echo 'Super Administrador';
              } elseif ($_SESSION['idRol'] == 2) {
                echo 'Administrador';
              } else {
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
                <?php if ($_SESSION['idRol'] == 1 or $_SESSION['idRol'] == 2) { ?>
                  <li class="nav-item">
                    <a href="../users/index.php" class="nav-link">
                      <i class="fas fa-users"></i>
                      <p>Administrar usuarios</p>
                    </a>
                  </li>
                <?php
                }
                if ($_SESSION['idRol'] == 1 or $_SESSION['idRol'] == 2 or $_SESSION['idRol'] == 3) { ?>
                  <li class="nav-item">
                    <a href="../travel_agencies/index.php" class="nav-link">
                      <i class="fa fa-hotel"></i>
                      <p>Solicitudes de Agencias</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="../markups/index.php" class="nav-link">
                      <i class="fas fa-file-invoice-dollar"></i>
                      <p>Comisiones de Agencias</p>
                    </a>
                  </li>
                <?php }
                if ($_SESSION['idRol'] == 1 or $_SESSION['idRol'] == 2 or $_SESSION['idRol'] == 3) { ?>
                  <li class="nav-item">
                    <a href="../reservations/index.php" class="nav-link">
                      <i class="fas fa-clipboard-check"></i>
                      <p>Reservaciones</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-suitcase"></i>

                      <p>Habitaciones y Alimentos
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">

                      <li class="nav-item">
                        <a href="../bedrooms_categories/index.php" class="nav-link">
                          <i class="fas fa-bed ml-4"></i>
                          <p>Tipos de Habitación</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="../supplements/index.php" class="nav-link">
                          <i class="fas fa-umbrella-beach ml-4"></i>
                          <p>Suplementos</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="../food_plans/index.php" class="nav-link">
                          <i class="fas fa-utensils ml-4"></i>
                          <p>Plan de Alimentos</p>
                        </a>
                      </li>
                    </ul>
                  </li>

                <?php }
                if ($_SESSION['idRol'] == 1 or $_SESSION['idRol'] == 2 or $_SESSION['idRol'] == 4) { ?>
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
                    <a href="#" class="nav-link">
                      <i class="fas fa-plane"></i>

                      <p>Circuitos
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">

                      <li class="nav-item">
                        <a href="../circuits_carrusel/index.php" class="nav-link">
                          <i class="fas fa-spinner ml-4"></i>
                          <p>Carrusel</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="../category_one/index.php" class="nav-link">
                          <i class="fas fa-suitcase-rolling ml-4"></i>
                          <p>Categoría 1</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="../category_two/index.php" class="nav-link">
                          <i class="fas fa-suitcase ml-4"></i>
                          <p>Categoría 2</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="../category_three/index.php" class="nav-link">
                          <i class="fas fa-award ml-4"></i>
                          <p>Categoría 3</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="../circuits/index.php" class="nav-link">
                          <i class="fas fa-edit ml-4"></i>
                          <p>Gestionar circuitos</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                <?php
                }
                ?>
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