<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idEvc = sqlValue($_POST["idE"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
mysqli_select_db($horizonte, $database_horizonte);
$sql = "UPDATE venta_conceptos SET estatus_vc = 8, usuarioEdo5_e = $idU, fechaEdo5_e = $now where id_vc = $idEvc ";
  
$update = mysqli_query($horizonte, $sql);
	
if (!$update) { echo $sql; }else { echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>