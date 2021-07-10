<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["idC"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $dxEnvio = sqlValue(mb_strtoupper($_POST["dxEnvio"]), "text", $horizonte);
 $anestesiologo = sqlValue($_POST["anestesiologo"], "int", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
	$sql = "UPDATE venta_conceptos SET estatus_vc = 2, usuarioEdo2_e = $idU, fechaEdo2_e = $now, id_anesteciologo_vc = $anestesiologo where id_vc = $idE ";
  
$update = mysqli_query($horizonte, $sql);
	
if (!$update) {
 	echo $sql;
 }else {
	
	mysqli_select_db($horizonte, $database_horizonte);
	$queryT = mysqli_query($horizonte, "SELECT referencia_vc FROM venta_conceptos where id_vc = $idE") or die (mysqli_error($horizonte));
    $rowT = mysqli_fetch_row($queryT); $refe = sqlValue($rowT[0], "text", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$sql1 = "UPDATE orden_venta SET observaciones_i_ov = $dxEnvio where referencia_ov = $refe ";
  
	$update1 = mysqli_query($horizonte, $sql1);

	 echo 1;
}
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>