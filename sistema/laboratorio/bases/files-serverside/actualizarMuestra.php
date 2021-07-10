<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioNMu"], "int", $horizonte);
 $id = sqlValue($_GET["idMu"], "int", $horizonte);
 $muestra = sqlValue($_POST["nombreM"], "text", $horizonte);
 $condicion = sqlValue($_POST["condicionM"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE muestras set muestra_mu = $muestra, id_condicion_mu = $condicion, usuario_reg_mu = $idUsuario, fecha_reg_mu = $now where id_mu = $id limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>