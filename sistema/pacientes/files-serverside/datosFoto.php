<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$aleatorio = sqlValue($_POST["aleatorio"], "text", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT id_do from documentos where nombre_do = $aleatorio and que_es_do = 'FOTO' ") or die (mysqli_error($horizonte));
	$row = mysqli_fetch_row($result);
	
	echo $row[0];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>