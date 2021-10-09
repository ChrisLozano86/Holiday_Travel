<?php
    
     require_once '../../class/DestinosUno.php';
  
    
    $idSlider = (isset($_REQUEST['idSlider'])) ? $_REQUEST['idSlider'] : null;
    if($idSlider){
        $promocion = DestinosUno::buscarPorId($idSlider);        
        $promocion->eliminar();
        unlink($promocion->getUrlImagen1()); 
        unlink($promocion->getDescripcion()); 
        header('Location: index.php');
    }else{
        header('Location: index.php');
    }
    
?>