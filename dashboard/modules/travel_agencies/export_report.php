<?php
require_once ('../../class/Agencia.php');
$agencia = Agencia::recuperarTodos();

$salida = "";
$salida .= "<table border='1'>";
$salida .= "<thead>  <th>Razon Social</th> <th>Nombre Comercial</th> <th>RFC</th> <th>Calle</th> <th>Num Ext</th> <th>Num Int</th> <th>Colonia</th> <th>Municipio</th> <th>Ciudad</th> <th>Estado</th> <th>CP</th>  <th>Pais</th> <th>Moneda</th> <th>Tel 1</th> <th>Tel 2</th> <th>Tel 3</th> <th> Pagina Web</th> <th>Activo</th> <th>Clave Back Office</th> <th>Header Footer</th> <th>Menu</th> <th>Logo</th>  <th>Observaciones</th> <th>Nombre</th> <th>Apellido Paterno</th> <th>Apellido Materno</th> <th>Cargo</th> <th>Sexo</th> <th>Tel Directo</th> <th>Tel Movil</th> <th>Email Contacto</th> <th>Email Servidor</th> <th>Clave</th> <th>Servidor SMTP</th> <th>Port SMTP</th> <th>Fecha de Creacion</th> </thead>";
foreach($agencia as $item){

    $salida .= "<tr> <td>".$item[1]."</td> <td>".$item[2]."</td><td>".$item[3]."</td> <td>".$item[4]."</td> <td>".$item[5]."</td><td>".$item[6]."</td> <td>".$item[7]."</td> <td>".$item[8]."</td><td>".$item[9]."</td> <td>".$item[10]."</td> <td>".$item[11]."</td><td>".$item[12]."</td> <td>".$item[13]."</td> <td>".$item[14]."</td><td>".$item[15]."</td> <td>".$item[16]."</td> <td>".$item[17]."</td><td>".$item[18]."</td> <td>".$item[19]."</td> <td>".$item[20]."</td><td>".$item[21]."</td> <td>".$item[22]."</td> <td>".$item[23]."</td><td>".$item[24]."</td> <td>".$item[25]."</td> <td>".$item[26]."</td><td>".$item[27]."</td> <td>".$item[28]."</td> <td>".$item[29]."</td><td>".$item[30]."</td> <td>".$item[31]."</td> <td>".$item[32]."</td><td>".$item[33]."</td> <td>".$item[34]."</td> <td>".$item[35]."</td> <td>".$item[36]."</td></tr>";

}
$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Holiday_Report_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>