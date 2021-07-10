<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $id = sqlValue($_POST["idCo"], "int", $horizonte); 
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT condicion_co from condiciones where id_co = $id ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

	echo $row[0]."{;]".$row[0];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>