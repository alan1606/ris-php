<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioNI"], "int", $horizonte);
 $id = sqlValue($_GET["idCo"], "int", $horizonte);
 $condicion = sqlValue($_POST["nombreCM"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE condiciones set condicion_co = $condicion, usuario_reg_co = $idUsuario, fecha_co = $now where id_co = $id limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>