<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["idE"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $dx = sqlValue($_POST["dx"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
mysqli_select_db($horizonte, $database_horizonte); // El estatus debe ser 4, por lo mientras pondré 2
 $sql = "UPDATE venta_conceptos SET interpretacion_vc = $dx, estatus_vc = 4, usuarioEdo4_e = $idU, fechaEdo4_e = $now where id_vc = $idE limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>