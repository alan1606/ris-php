<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idVC = sqlValue($_POST["idVC"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT referencia_vc, id_paciente_vc from venta_conceptos where id_vc = $idVC ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	$idP = sqlValue($row[1], "int", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT nombre_p, apaterno_p, amaterno_p from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
	$nombre = $row1[0].' '.$row1[1].' '.$row1[2];
	
	$datos = $nombre.';*-'.$row[0];
	
echo $datos;
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>