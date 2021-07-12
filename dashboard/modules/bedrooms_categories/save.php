<?php
include_once '../../class/TipoHabitacion.php';
$idTipoHabitacion = (isset($_REQUEST['idTipoHabitacion'])) ? $_REQUEST['idTipoHabitacion'] : null;

    
    if($idTipoHabitacion){        
        $tipo_habitacion = TipoHabitacion::buscarPorId($idTipoHabitacion);        
    }else{
        $tipo_habitacion = new TipoHabitacion();
    }

    //Request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       
        
        $tipo_habitacion->setTipo($_POST['tipo']);
        $tipo_habitacion->setDescripcion($_POST['descripcion']);  
        if($tipo_habitacion->guardar()){
            header("Location: index.php");   
        }
        
    }

      
   
    if (isset($_REQUEST['idTipoHabitacion'])){
      
      $title = 'Editar tipo de habitación';
    }else{
      $title = 'Registrar nuevo tipo de habitación';
    }
    

    include_once '../../assets/template/header.php';
?>

<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">


          <a href="index.php" class="btn btn-info">Regresar</a><br>

          <div  style="width:80%; margin-left:10%; background-color: white; padding:20px; border-radius:10px;">
            <h4 class="text-center"><?php echo $title; ?></h4> <br>
            <form action="save.php" method="post">

            <div class="form-group">
            <input class="form-control" type="hidden" name="idTipoHabitacion" id="idTipoHabitacion" value="<?php echo $tipo_habitacion->getIdTipoHabitacion(); ?>" required>
            </div>

            <div class="form-group">
            <label for="nombre_comercial">Tipo de habitación <span class="text text-danger">*</span></label>
            <input class="form-control" type="text" name="tipo" id="tipo" value="<?php echo $tipo_habitacion->getTipo(); ?>">
            </div>

            <div class="form-group">
            <label for="contenido">Descripción</label>
           <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ><?php echo $tipo_habitacion->getDescripcion(); ?></textarea>
            </div> 

           

            <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Guardar">
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