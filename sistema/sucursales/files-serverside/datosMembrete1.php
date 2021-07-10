<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$id_s = sqlValue($_POST["id_s"], "text", $horizonte);
	$nombre = sqlValue($_POST["nombre"], "text", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT count(id_do) from documentos where que_es_do = $nombre and aleatorio_do = $id_s") or die (mysqli_error($horizonte));
	$row1 = mysqli_fetch_row($result1);
 
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT id_do, ext_do, count(id_do) from documentos where que_es_do = $nombre and aleatorio_do = $id_s and nombre_do = 'ENCABEZADO'") or die (mysqli_error($horizonte));
	$row = mysqli_fetch_row($result);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result2 = mysqli_query($horizonte, "SELECT id_do, ext_do, count(id_do) from documentos where que_es_do = $nombre and aleatorio_do = $id_s and nombre_do = 'PIE'") or die (mysqli_error($horizonte));
	$row2 = mysqli_fetch_row($result2);
	
	echo $row[0].'*{'.$row[1].'*{'.$row1[0].'*{'.$row2[0].'*{'.$row2[1];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>