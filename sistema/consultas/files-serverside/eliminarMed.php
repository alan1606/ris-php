<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idMEDC = sqlValue($_POST["idMEDC"], "int", $horizonte);
 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte); 
 	$sql = "delete from medicamentos_receta where id_mr = $idMEDC and id_co_mr = $idC limit 1";
	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>