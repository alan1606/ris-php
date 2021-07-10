<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$id_n = sqlValue($_POST["id_n"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT nota_nh from notas_de_hospital where id_nh = $id_n limit 1 ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	echo $row[0];
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>