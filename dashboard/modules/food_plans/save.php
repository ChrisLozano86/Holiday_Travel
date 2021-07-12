<?php
include_once '../../class/PlanAlimento.php';
$idPlanAlimento = (isset($_REQUEST['idPlanAlimento'])) ? $_REQUEST['idPlanAlimento'] : null;

    
    if($idPlanAlimento){        
        $plan_alimento = PlanAlimento::buscarPorId($idPlanAlimento);        
    }else{
        $plan_alimento = new PlanAlimento();
    }

    //Request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       
        
        $plan_alimento->setPlan($_POST['plan']);
        $plan_alimento->setDescripcion($_POST['descripcion']);  
        if($plan_alimento->guardar()){
            header("Location: index.php");   
        }
        
    }

      
   
    if (isset($_REQUEST['idPlanAlimento'])){
      
      $title = 'Editar plan de alimento';
    }else{
      $title = 'Registrar nuevo plan de alimento';
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
            <input class="form-control" type="hidden" name="idPlanAlimento" id="idPlanAlimento" value="<?php echo $plan_alimento->getIdPlanAlimento(); ?>">
            </div>

            <div class="form-group">
            <label for="nombre_comercial">Suplemento de habitación <span class="text text-danger">*</span></label>
            <input class="form-control" type="text" name="plan" id="suplemento" value="<?php echo $plan_alimento->getPlan(); ?>" required>
            </div>

            <div class="form-group">
            <label for="contenido">Descripción</label>
           <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ><?php echo $plan_alimento->getDescripcion(); ?></textarea>
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