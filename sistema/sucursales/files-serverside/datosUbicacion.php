<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idU = sqlValue($_POST["idU"], "int", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT X(GeomFromText(AsText(coordenadas_su))), Y(GeomFromText(AsText(coordenadas_su))) from sucursales where id_su = $idU ") or die (mysqli_error($horizonte));
	$row = mysqli_fetch_row($result);
	
	echo $row[0].'{}*'.$row[1];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>