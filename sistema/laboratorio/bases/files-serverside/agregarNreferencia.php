<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioNM"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreC"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $descripcion = sqlValue($_POST["descripcionC"], "text", $horizonte);
 $tipo = sqlValue($_POST["tipoC"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO valores_referencia(usuario_reg_vr, valor_referencia_vr, fecha_reg_vr, descripcion_vr, tipo_vr)";
 $sql.= "VALUES ($idUsuario, $nombre, $now, $descripcion, $tipo)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>