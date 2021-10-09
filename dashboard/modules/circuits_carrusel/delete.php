<?php
    
     require_once '../../class/CircuitosCarrusel.php';
  
    
    $idSlider = (isset($_REQUEST['idSlider'])) ? $_REQUEST['idSlider'] : null;
    if($idSlider){
        $slider = CircuitosCarrusel::buscarPorId($idSlider);        
        $slider->eliminar();
        unlink($slider->getUrlImagen1()); 
        header('Location: index.php');
    }else{
        header('Location: index.php');
    }
    
?>