<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioNM"], "int", $horizonte);
 $id = sqlValue($_GET["idIn"], "int", $horizonte);
 $indicacion = sqlValue($_POST["nombreM"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE indicaciones set indicacion_in = $indicacion, usuario_reg_in = $idUsuario, fecha_reg_in = $now where id_in = $id limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>