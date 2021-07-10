<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idE = sqlValue($_POST["idEqui"], "int", $horizonte); 
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT modelo_eq, marca_eq, descripcion_eq from catalogo_equipos where id_eq = $idE ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

	echo $row[0]."{;]".$row[1]."{;]".$row[2];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>