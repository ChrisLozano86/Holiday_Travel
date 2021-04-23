<?php
require_once '../../class/promocion.php';
$promocions = Promocion::recuperarTodos();
$idPromocion = (isset($_REQUEST['idPromocion'])) ? $_REQUEST['idPromocion'] : null;

    if($idPromocion){        
        $promocion = Promocion::buscarPorId($idPromocion);   
          
    }else{
        $promocion = new Promocion(); 
       
    }

   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : null;
      $url_imagen1 = (isset($_REQUEST['url_imagen1'])) ? $_REQUEST['url_imagen1'] : null;     
      $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
      $fecha_publicacion = date('Y-m-d');
      $visible = (isset($_REQUEST['visible'])) ? $_REQUEST['visible'] : null;
      $servicio = (isset($_REQUEST['servicio'])) ? $_REQUEST['servicio'] : null;
      $hotel = (isset($_REQUEST['hotel'])) ? $_REQUEST['hotel'] : null;
      $precio = (isset($_REQUEST['precio'])) ? $_REQUEST['precio'] : null;
     
            $promocion->setTitulo($titulo);
            $promocion->setDescripcion($descripcion);
            $promocion->setFechaPublicacion($fecha_publicacion);
            $promocion->setVisible($visible);
            $promocion->setServicio($servicio);
            $promocion->setHotel($hotel);
            $promocion->setPrecio($precio);
           
             
             $rutaServidor = 'uploads/images';
             $rutaServidorFiles = 'uploads/files';
            
             
            if ($_FILES['url_img1']['name']!=null) {
    
                    if (!is_dir('uploads/images')) {
                      mkdir('uploads/images', 0777, true); 
                    }
                   
                    $rutaTemporal1 = $_FILES['url_img1']['tmp_name'];
                    $extension = pathinfo($_FILES['url_img1']['name'], PATHINFO_EXTENSION);
                    $nombreImagen1 = date('YmdHis').'_promocion.'.$extension;
                    $rutaDestino1 = $rutaServidor.'/'.$nombreImagen1;
                    unlink($url_imagen1);
                    move_uploaded_file($rutaTemporal1, $rutaDestino1); 
                    $promocion->setUrlImagen1($rutaDestino1); 
                  
              } else{
              $promocion->setUrlImagen1($url_imagen1);    
            } 

            
              $promocion->guardar();
              header('Location: index.php');
              
            
    }
      
    include_once '../../assets/template/header.php';
?>


<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
          <a href="index.php" class="btn btn-warning">Regresar</a><br>
          
          <?php 
          if (isset($_REQUEST['idPromocion'])){
            
            $title = 'Editar promocion ';
          }else{
            $title = 'Crear nueva promocion';
          }
          ?>


          <div  style="width:80%; margin-left:10%; background-color: white; padding:20px; border-radius:10px;">

          <h4 class="text-center"><?php echo $title ?></h4> <br>
      

            <form action="save.php" method="post" id="promocion_form" enctype="multipart/form-data">

            <div class="form-group">
            <input class="form-control" type="hidden" name="idPromocion" id="idPromocion" value="<?php echo $promocion->getidPromocion(); ?>">
            </div>

            <div class="form-group">
            <input class="form-control" type="hidden" name="url_imagen1" id="url_imagen1" value="<?php echo $promocion->getUrlImagen1(); ?>">
            </div>


            <div class="form-group">
            <label for="titulo">Título de la promoción</label>
            <input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $promocion->getTitulo(); ?>">
            </div>

            <div class="form-group">
            <label for="url_img1">Imagen </label>
            <?php    if(isset($_REQUEST['idPromocion'])): ?>
              </br>
            <img src="<?= $promocion->getUrlImagen1(); ?>" style="width:100px" />
            </br></br>
            <?php endif; ?>
            <input type="file" class="form-control-file" name="url_img1" id="url_img1">
            </div>

            <div class="form-group">
            <label for="contenido">Descripción</label>
           <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ><?php echo $promocion->getDescripcion(); ?></textarea>
            </div>  

            <div class="form-group">
            <label for="contenido">Servicio</label>
           <textarea class="form-control" name="servicio" id="servicio" rows="3" ><?php echo $promocion->getServicio(); ?></textarea>
            </div>  

            <div class="form-group">
            <label for="contenido">Hotel</label>
            <input class="form-control" type="text" name="hotel" id="hotel" value="<?php echo $promocion->getHotel();  ?>">
            </div>  

            
            <div class="form-group">
            <label for="contenido">Precio</label>
            <input class="form-control" type="text" name="precio" id="precio" value="<?php  echo $promocion->getPrecio();  ?>">
            </div>  

            <div class="form-group">
              <label for="visible">Visible</label>
            <select name="visible" id="visible" class="form-control" style="width: 50%;">
              <option value="0" <?php if($promocion->getVisible()==0){echo 'selected';}?>>No</option>
              <option value="1" <?php if($promocion->getVisible()==1){echo 'selected';}?>>Sí</option>
            </select> 
            </div>


            <div class="form-group">
            <input type="submit" class="btn btn-primary btn-custom" value="Guardar Promoción">
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