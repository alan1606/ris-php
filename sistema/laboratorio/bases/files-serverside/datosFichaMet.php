<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $id = sqlValue($_POST["idMe"], "int", $horizonte); 
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT metodo_me from metodos where id_me = $id ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

	echo $row[0]."{;]".$row[0];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>