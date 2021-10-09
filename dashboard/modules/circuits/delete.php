<?php
    
    require_once '../../class/Circuito.php';
  
    
    $idSlider = (isset($_REQUEST['idSlider'])) ? $_REQUEST['idSlider'] : null;
    if($idSlider){
        $slider = Circuito::buscarPorId($idSlider);        
        $slider->eliminar();
        unlink($slider->getUrlImagen1()); 
        header('Location: index.php');
    }else{
        header('Location: index.php');
    }
    
?>