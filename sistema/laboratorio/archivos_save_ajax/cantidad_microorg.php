<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_rl = sqlValue($_POST["id_rl"], "int", $horizonte);
 $valor = sqlValue($_POST["valor"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql = "UPDATE resultados_laboratorio SET r_valor_texto = $valor where id_rl = $id_rl ";
 	$update = mysqli_query($horizonte, $sql);
	
	if (!$update) { echo $sql; }else { echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>