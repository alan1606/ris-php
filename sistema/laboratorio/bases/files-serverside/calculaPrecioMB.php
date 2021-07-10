<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT aleatorio_ac from asignar_consumibles where id_ac = $idC ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $aleatorio = sqlValue($row[0], "text", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
 	$result1 = mysqli_query($horizonte, "SELECT SUM(precio_ac*cantidad_ac) from asignar_consumibles where aleatorio_ac = $aleatorio ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
			 
 	$datos = $row1[0];

echo $datos;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>