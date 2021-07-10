<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["idC"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE venta_conceptos SET estatus_vc = 3, usuarioEdo3_e = $idU, fechaEdo3_e = $now where id_vc = $idE ";
  
 $update = mysqli_query($horizonte, $sql);
	
 if (!$update) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>