<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php"); //CONSIDERANDOLO CLINICAMENTE SANO

 	$idC = sqlValue($_POST["idC"], "int", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT interpretacion_vc from venta_conceptos where id_vc = $idC limit 1") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	echo $row[0];
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>