<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$id_s = sqlValue($_POST["id_s"], "text", $horizonte);
	$nombre = sqlValue($_POST["nombre"], "text", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT id_do, ext_do, que_es_do from documentos where nombre_do = $nombre and aleatorio_do = $id_s order by id_do desc ") or die (mysqli_error($horizonte));
	$row = mysqli_fetch_row($result);
	
	echo $row[0].'*{'.$row[1].'*{'.$row[2];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>