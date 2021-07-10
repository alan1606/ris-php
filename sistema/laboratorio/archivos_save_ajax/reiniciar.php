<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idEvc = sqlValue($_POST["idEvc"], "int", $horizonte);
 
mysqli_select_db($horizonte, $database_horizonte);
	$sql = "UPDATE venta_conceptos SET estatus_vc = 1 where id_vc = $idEvc ";
	$update = mysqli_query($horizonte, $sql);
	
	if (!$update) { echo $sql; }
	else {
		mysqli_select_db($horizonte, $database_horizonte);
		$sqlNotaToma = "DELETE from resultados_laboratorio where id_estudio_vc_rl = $idEvc ";
		$updateNotaToma = mysqli_query($horizonte, $sqlNotaToma);
		
		if (!$updateNotaToma) { echo $sqlNotaToma; }
		else { echo 1; }
	}
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>