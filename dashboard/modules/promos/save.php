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
      $descripcion = (isset($_REQUEST['descripcion'])) ? $_REQUEST['descripcion'] : null;       
      $fecha_publicacion = date('Y-m-d');
      $visible = (isset($_REQUEST['visible'])) ? $_REQUEST['visible'] : null;
      $servicio = NULL;
      $hotel = NULL;
      $precio = NULL;
     
            $promocion->setTitulo($titulo);
            $promocion->setFechaPublicacion($fecha_publicacion);
            $promocion->setVisible($visible);
            $promocion->setServicio($servicio);
            $promocion->setHotel($hotel);
            $promocion->setPrecio($precio);
           
             
             $rutaServidorImages = 'uploads/images';
             $rutaServidorFiles = 'uploads/files';

             
            
             
            if ($_FILES['url_img1']['name']!="") {
    
                    if (!is_dir('uploads/images')) {
                      mkdir('uploads/images', 0777, true); 
                    }
                   
                    $rutaTemporalImg = $_FILES['url_img1']['tmp_name'];
                    $extensionImg = pathinfo($_FILES['url_img1']['name'], PATHINFO_EXTENSION);
                    $nombreImagen1 = date('YmdHis').'_promocion.'.$extensionImg;
                    $rutaDestinoImg = $rutaServidorImages.'/'.$nombreImagen1;
                    unlink($url_imagen1);
                    move_uploaded_file($rutaTemporalImg, $rutaDestinoImg); 
                    $promocion->setUrlImagen1($rutaDestinoImg); 
                  
              } else{
              $promocion->setUrlImagen1($url_imagen1);    
            } 


            if ($_FILES['file1']['name']!="") {
    
              if (!is_dir('uploads/files')) {
                mkdir('uploads/files', 0777, true); 
              }
             
              $rutaTemporalFile = $_FILES['file1']['tmp_name'];
              $extensionFile = pathinfo($_FILES['file1']['name'], PATHINFO_EXTENSION);
              $nombreArchivo1 = date('YmdHis').'_promocion.'.$extensionFile;
              $rutaDestinoFile = $rutaServidorFiles.'/'.$nombreArchivo1;
              unlink($descripcion);
              move_uploaded_file($rutaTemporalFile, $rutaDestinoFile); 
              $promocion->setDescripcion($rutaDestinoFile); 
            
        } else{
        $promocion->setDescripcion($descripcion);    
      } 

            
              $promocion->guardar();
              header('Location: index.php');
              
            
    }
      
    include_once '../../assets/template/header.php';
?>




  <?php
    
    include_once '../../assets/template/footer.php';
?>