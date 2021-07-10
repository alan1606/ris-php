<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["id_rl"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql = "UPDATE resultados_laboratorio SET boleano_rl = 0 where id_rl = $idE limit 1 ";
 	$update = mysqli_query($horizonte, $sql);
	
	if (!$update) { echo $sql; }else { echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>