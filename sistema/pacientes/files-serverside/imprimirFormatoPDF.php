<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

	$idU = sqlValue($_GET["idU"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte); 
 	$result = mysqli_query($horizonte, "SELECT variable_temporal_u from usuarios where id_u = $idU") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

	echo $row[0]; 
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>