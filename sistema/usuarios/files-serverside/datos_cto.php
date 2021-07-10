<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idTo = sqlValue($_POST["id"], "int", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT concepto_to, id_area_to, precio_to, precio_urgencia_to, precio_m, precio_mu from conceptos where id_to = $idTo ") or die (mysqli_error($horizonte));
	$row = mysqli_fetch_row($result);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$resultN = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where id_concepto_es = $idTo") or die (mysqli_error($horizonte));
	$rowN = mysqli_fetch_row($resultN);
	
	echo $row[0].'{}*'.$row[1].'{}*'.$row[2].'{}*'.$row[3].'{}*'.$row[4].'{}*'.$row[5].'{}*'.$rowN[0];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>