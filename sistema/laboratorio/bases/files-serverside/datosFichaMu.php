<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $id = sqlValue($_POST["idMu"], "int", $horizonte); 
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT muestra_mu, id_condicion_mu from muestras where id_mu = $id ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

	echo $row[0]."{;]".$row[1];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>