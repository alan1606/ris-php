<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idMetodo = sqlValue($_POST["idMetodo"], "int", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte); 
 	$sql = "delete from asignar_metodo where id_ame = $idMetodo limit 1";
	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>