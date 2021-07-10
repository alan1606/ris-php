<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUM = sqlValue($_POST["idUM"], "int", $horizonte); 
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT unidad_un, abreviacion_un from unidades where id_un = $idUM ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

	echo $row[0]."{;]".$row[1];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>