<?php
include_once '../../class/Habitacion.php';
include_once '../../class/TipoHabitacion.php';
include_once '../../class/Suplemento.php';
include_once '../../class/PlanAlimento.php';

$idHabitacion = (isset($_REQUEST['idHabitacion'])) ? $_REQUEST['idHabitacion'] : null;
$idReserva= (isset($_REQUEST['idReserva'])) ? $_REQUEST['idReserva'] : null;


$tipo_habitaciones = TipoHabitacion::recuperarTodos();
$suplementos = Suplemento::recuperarTodos();
$planes_alimento = PlanAlimento::recuperarTodos();
    
    if($idHabitacion){        
        $habitacion = Habitacion::buscarPorId($idHabitacion);        
    }else{
        $habitacion = new Habitacion();
    }

    //Request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $habitacion->setIdReserva($_POST['idReserva']);
        $habitacion->setIdTipoHabitacion($_POST['tipo_habitacion']);
        $habitacion->setIdSuplemento($_POST['suplemento']);
        $habitacion->setIdPlanAlimento($_POST['plan_alimento']); 
        $habitacion->setCosto($_POST['costo']);  
        if($habitacion->guardar()){
            header("Location: index.php?idReserva=$idReserva");   
        }
        
    }

      
   
    if (isset($_REQUEST['idHabitacion'])){
      
      $title = 'Editar habitación';
    }else{
      $title = 'Registrar nueva habitación';
    }
    

    include_once '../../assets/template/header.php';
?>

<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">


          <a href="index.php?idReserva=<?php echo $idReserva; ?>" class="btn btn-info">Regresar</a><br>

          <div  style="width:80%; margin-left:10%; background-color: white; padding:20px; border-radius:10px;">
            <h4 class="text-center"><?php echo $title; ?></h4> <br>
            <form action="save.php" method="post">

            <div class="form-group">
            <input class="form-control" type="hidden" name="idHabitacion" id="idHabitacion" value="<?php echo $idHabitacion; ?>">
            </div>

            <div class="form-group">
            <input class="form-control" type="hidden" name="idReserva" id="idReserva" value="<?php echo $idReserva; ?>">
            </div>

            <div class="form-group">
            <label for="nombre">Tipo de habitación</label>
            <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 50%;" required>
      <option value="">Selecciona un tipo de habitación</option>
     <?php
      foreach($tipo_habitaciones as $th){
     ?>
        <option <?php if($habitacion->getIdTipoHabitacion()==$th[0]){ echo 'selected'; }   ?>     value="<?php echo $th[0]; ?>"> <?php echo $th[1]; ?></option>

        <?php
        }
        ?>
    </select>
            </div>
          

            <div class="form-group">
            <label for="nombre">Suplemento</label>
            <select name="suplemento" id="suplemento" class="form-control" style="width: 50%;" required>
      <option value="">Selecciona un suplemento</option>
      <?php
      foreach($suplementos as $s){
     ?>
        <option <?php if($habitacion->getIdSuplemento()==$s[0]){ echo 'selected'; }   ?>     value="<?php echo $s[0]; ?>"> <?php echo $s[1]; ?></option>

        <?php
        }
        ?>
       
                                                  
    </select>
            </div>

            <div class="form-group">
            <label for="nombre">Plan de alimento</label>
            <select name="plan_alimento" id="plan_alimento" class="form-control" style="width: 50%;" required>
            <option value="">Selecciona un plan de alimento</option>
            <?php
      foreach($planes_alimento as $pa){
     ?>
        <option <?php if($habitacion->getIdPlanAlimento()==$pa[0]){ echo 'selected'; }   ?>     value="<?php echo $pa[0]; ?>"> <?php echo $pa[1]; ?></option>

        <?php
        }
        ?>
       
                                                  
    </select>
            </div>

            <div class="form-group form-inline">
              <span>$</span>
            <input class="form-control" type="number"  min="0" name="costo" id="costo" style="width: 50%;" value="<?php echo $habitacion->getCosto(); ?>" placeholder="0.00" required>
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