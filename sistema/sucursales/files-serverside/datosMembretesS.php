<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$id_s = sqlValue($_POST["id_s"], "int", $horizonte);
	$que_es = sqlValue($_POST["que_es"], "text", $horizonte);
 	
	//Saber si hay encabezado
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where id_quien_do = $id_s and que_es_do = $que_es and nombre_do = 'ENCABEZADO' ") or die (mysqli_error($horizonte)); $row = mysqli_fetch_row($result);
	
	//Saber si hay pie
	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where id_quien_do = $id_s and que_es_do = $que_es and nombre_do = 'PIE' ") or die (mysqli_error($horizonte)); $row1 = mysqli_fetch_row($result1);
	
	echo $row[0].'*{'.$row[1].'*{'.$row[2].'*{'.$row1[0].'*{'.$row1[1].'*{'.$row1[2];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>