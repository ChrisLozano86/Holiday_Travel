<?php
include_once '../../class/Suplemento.php';
$idSuplementoHabitacion = (isset($_REQUEST['idSuplementoHabitacion'])) ? $_REQUEST['idSuplementoHabitacion'] : null;

    
    if($idSuplementoHabitacion){        
        $suplemento = Suplemento::buscarPorId($idSuplementoHabitacion);        
    }else{
        $suplemento = new Suplemento();
    }

    //Request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       
        
        $suplemento->setSuplemento($_POST['suplemento']);
        $suplemento->setDescripcion($_POST['descripcion']);  
        if($suplemento->guardar()){
            header("Location: index.php");   
        }
        
    }

      
   
    if (isset($_REQUEST['idSuplementoHabitacion'])){
      
      $title = 'Editar suplemento de habitación';
    }else{
      $title = 'Registrar nuevo suplemento de habitación';
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
            <input class="form-control" type="hidden" name="idSuplementoHabitacion" id="idSuplementoHabitacion" value="<?php echo $suplemento->getIdSuplementoHabitacion(); ?>">
            </div>

            <div class="form-group">
            <label for="nombre_comercial">Suplemento de habitación <span class="text text-danger">*</span></label>
            <input class="form-control" type="text" name="suplemento" id="suplemento" value="<?php echo $suplemento->getSuplemento(); ?>" required>
            </div>

            <div class="form-group">
            <label for="contenido">Descripción</label>
           <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ><?php echo $suplemento->getDescripcion(); ?></textarea>
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