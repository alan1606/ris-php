<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idS = sqlValue($_POST["idS"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
mysqli_select_db($horizonte, $database_horizonte);
$sql = "UPDATE venta_conceptos SET estatus_vc = 2, usuarioEdo2_e = $idU, fechaEdo2_e = $now where id_vc = $idS ";  
$update = mysqli_query($horizonte, $sql);
	
if (!$update) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>