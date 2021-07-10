<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idVC = sqlValue($_POST["idVC"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE venta_conceptos SET estatus_vc = 9, usuarioEdo6_e = $idU, fechaEdo6_e = $now where id_vc = $idVC limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else {
	 echo 1;
}
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>