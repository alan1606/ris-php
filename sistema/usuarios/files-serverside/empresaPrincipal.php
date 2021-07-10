<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $estatus = sqlValue($_POST["estatus"], "int", $horizonte);
 $id_eu = sqlValue($_POST["id_eu"], "int", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorio"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE sucursales_usuarios set primaria_su = 0 where aleatorio_su = $aleatorio";
 $update = mysqli_query($horizonte, $sql);
	
 if (!$update) { 
 	echo 'Ocurrió un error inesperado :/'; 
 }else{ 
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql1 = "UPDATE sucursales_usuarios set primaria_su = 1 where aleatorio_su = $aleatorio and id_su = $id_eu limit 1";
 	$update1 = mysqli_query($horizonte, $sql1);
	if (!$update1) { echo 'Ocurrió un error inesperado :/'; }else{ echo 1; }
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>