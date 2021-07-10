<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idS = sqlValue($_POST["idS"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $input = sqlValue($_POST["input"], "text", $horizonte);
 
mysqli_select_db($horizonte, $database_horizonte);
$sql = "UPDATE venta_conceptos SET estatus_vc = 5, usuarioEdo5_e = $idU, fechaEdo5_e = $now, interpretacion_vc = $input, salvado_vc = 1 where id_vc = $idS ";  
$update = mysqli_query($horizonte, $sql);
	
if (!$update) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>