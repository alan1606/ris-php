<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $id = sqlValue($_GET["idvr"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioNM"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreC"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $tipo = sqlValue($_POST["tipoC"], "int", $horizonte);
 $descripcion = sqlValue($_POST["descripcionC"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE valores_referencia set usuario_reg_vr = $idUsuario, valor_referencia_vr = $nombre, fecha_reg_vr = $now, descripcion_vr = $descripcion, tipo_vr = $tipo where id_vr = $id limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>