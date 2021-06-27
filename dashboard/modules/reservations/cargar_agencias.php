<?php
require_once '../../class/Agencia.php';
$agencias = Agencia::recuperarIdAgencias(); 
echo $lista_agencias = get_listar_agencias($agencias);


function get_listar_agencias($agencias){

$data='';

$data.= '<option value=""> Elige una opción </option>';

foreach($agencias as $agencia): 

   $data.= '<option value="'.$agencia[0].'">  '.$agencia["nombre_comercial"].' </option>';
   
endforeach;

return $data;
}





