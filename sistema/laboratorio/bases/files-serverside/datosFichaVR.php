<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $id = sqlValue($_POST["idVr"], "int", $horizonte); 
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT valor_referencia_vr, tipo_vr, descripcion_vr from valores_referencia where id_vr = $id ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

	echo $row[0]."{;]".$row[1]."{;]".$row[2];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>