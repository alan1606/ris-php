<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$aleatorio = sqlValue($_POST["aleatorioM"], "text", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT otras_indicaciones from venta_conceptos where no_temp_vc = $aleatorio ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	echo $row[0];
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>