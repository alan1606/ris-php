<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $aleatorio = sqlValue($_POST["aleatorio"], "text", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
 	$result1 = mysqli_query($horizonte, "SELECT id_paciente_vc, DATE_FORMAT(fecha_venta_vc,'%d/%c/%Y') from venta_conceptos where no_temp_vc = $aleatorio limit 1 ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1); $idP = sqlValue($row1[0], "int", $horizonte);
 	
	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT nombre_p, apaterno_p, amaterno_p from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	$nombre = $row[0]." ".$row[1]." ".$row[2];
	
	echo $nombre.";}".$row1[1];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>