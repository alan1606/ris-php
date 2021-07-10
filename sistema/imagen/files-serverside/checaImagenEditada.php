<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idEstudio = sqlValue($_POST["idEstudio"], "int", $horizonte);
 $noImgen = sqlValue($_POST["noImgen"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT editada_ie from img_endoscopia where id_estudio_vc_ie = $idEstudio and imagen_ie = $noImgen limit 1 ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	echo $row[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>