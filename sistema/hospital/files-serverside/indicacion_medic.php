<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$id_m = sqlValue($_POST["id_m"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT descripcion_to from conceptos where id_to = $id_m limit 1 ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	echo $row[0];
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>