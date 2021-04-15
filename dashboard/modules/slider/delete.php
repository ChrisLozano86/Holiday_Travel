<?php
    
     require_once '../../class/Slider.php';
  
    
    $idArticulo = (isset($_REQUEST['idArticulo'])) ? $_REQUEST['idArticulo'] : null;
    if($idArticulo){
        $articulo = Slider::buscarPorId($idArticulo);        
        $articulo->eliminar();
        unlink($articulo->getUrlImagen1()); 
        header('Location: index.php');
    }
    
?>