<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $id = sqlValue($_POST["idTco"], "int", $horizonte); 
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT tipo_cti from catalogo_tipo_inventario where id_cti = $id ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

	echo $row[0]."{;]".$row[0];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>