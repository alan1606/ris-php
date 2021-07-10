<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idDX = sqlValue($_POST["idDX"], "int", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte); 
 	$sql = "delete from dx_consultas where id_dx_dxc = $idDX and temp_dxc = 1 limit 1";
	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>