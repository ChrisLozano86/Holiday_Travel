<?php
require_once '../../class/Agencia.php';

    $idAgencia = (isset($_REQUEST['idAgencia'])) ? $_REQUEST['idAgencia'] : null;
    
    if($idAgencia){        
        $agencia = Agencia::buscarPorId($idAgencia);        
    }else{
        header('Location: index.php');
    }

    //Request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $agencia->setMarkupOperadora($_POST['markup_operadora']);
        $agencia->setComisionAgencia($_POST['comision_agencia']);
       

     

       //$agencia->establecerComision();
       
      if($agencia->establecerComision()){
            header('Location: index.php?status_code=1');
        }else{
            header('Location: index.php?status_code=3');
        } 
        
    }
include_once '../../assets/template/header.php';
?>

<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
          <a href="index.php" class="btn btn-warning">Regresar</a><br>


          <div  style="width:80%; margin-left:10%; background-color: white; padding:20px; border-radius:10px;">
            
          <h4 class="section-form"><?php echo 'Establecer comisión agencia '.$agencia->getNombreComercial(); ?></h4>
           
            <form action="save.php" method="post" id="slider_form" enctype="multipart/form-data">

            <div class="form-group">
            <input class="form-control" type="hidden" name="idAgencia" id="idAgencia" value="<?php echo $agencia->getIdAgencia(); ?>">
            </div>

            

            <div class="form-group">
            <label for="nombre_comercial">Nombre Comercial <span class="text text-danger">*</span></label>
            <input class="form-control" type="text" name="nombre_comercial" id="nombre_comercial" value="<?php echo $agencia->getNombreComercial(); ?>" readonly>
            </div>

            <div class="form-group form-inline">
            <label for="porcentaje" class="mr-2">Markup Operadora <span class="text text-danger">*</span> </label>
            <input class="form-control" type="number" min="1" max="100" name="markup_operadora" id="markup_operadora" style="width: 10%;" value="<?php if ($agencia->getMarkupOperadora()!= ""){echo $agencia->getMarkupOperadora();}else{ echo 0;} ?>" required>
            <span class="ml-2 font-weight-bold">%</span>
            </div>

            <div class="form-group form-inline">
            <label for="porcentaje" class="mr-2">Comision Agencia <span class="text text-danger">*</span> </label>
            <input class="form-control" type="number" min="1" max="100" name="comision_agencia" id="comision_agencia" style="width: 10%;" value="<?php if ($agencia->getComisionAgencia()!= ""){echo $agencia->getComisionAgencia();}else{ echo 0;} ?>" required>
            <span class="ml-2 font-weight-bold">%</span>
            </div>


            
            <div class="form-group">
            <input type="submit" class="btn btn-default btn-custom" value="Guardar cambios">
            </div>  
           
            </form>
            
            
            

            </div>

          </div>
          <!-- /.col -->
        </div>
        <br>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php    
include_once '../../assets/template/footer.php';

?>