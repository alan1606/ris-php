<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idNM = sqlValue($_POST["idNM"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT nota_nm from notas_medicas where id_nm = $idNM ") or die (mysqli_error($horizonte));
	$row = mysqli_fetch_row($result);
	
 echo $row[0];
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>