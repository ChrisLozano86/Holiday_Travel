<?php
    
     require_once '../../class/PlanAlimento.php';
  
    
    $idPlanAlimento = (isset($_REQUEST['idPlanAlimento'])) ? $_REQUEST['idPlanAlimento'] : null;
    if($idPlanAlimento){
        $plan_alimento = PlanAlimento::buscarPorId($idPlanAlimento);        
        $plan_alimento->eliminar(); 
        header("Location: index.php");
    }else{
        header("Location: index.php");
    }
    
?>