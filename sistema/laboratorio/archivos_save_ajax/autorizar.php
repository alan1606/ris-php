<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $ref = sqlValue($_POST["refPro"], "text", $horizonte);
 $idEvc = sqlValue($_POST["idEstudioPro"], "int", $horizonte);
 $idP = sqlValue($_POST["idPacientePro"], "int", $horizonte);
 $idU = sqlValue($_POST["idUserPro"], "int", $horizonte);
 //$nota = sqlValue($_POST["notaPro"], "text", $horizonte);
 $checaPro = sqlValue($_POST["checaPro"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
mysqli_select_db($horizonte, $database_horizonte);
if($checaPro == 1){ 
	$sql = "UPDATE venta_conceptos SET estatus_vc = 7, usuarioEdo4_e = $idU, fechaEdo4_e = $now where id_vc = $idEvc ";
}elseif($checaPro == 2){ 
	$sql = "UPDATE venta_conceptos SET estatus_vc = 7, usuarioEdo4_e = $idU, fechaEdo4_e = $now where referencia_vc = $ref and estatus_vc = 4 and tipo_concepto_vc = 3 "; 
}
  
$update = mysqli_query($horizonte, $sql);
	
if (!$update) { echo $sql; }else { echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>