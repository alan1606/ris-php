<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idusuarioFI"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombreFI"]), "text", $horizonte);
 $formato = sqlValue($_POST["input"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $a = sqlValue($_POST["a"], "text", $horizonte);
 $temporal = sqlValue($_POST["temporal"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO formatos_conceptos(nombre_fc, formato_fc, temporal_fc, fecha_fc, id_concepto_fc, usuario_fc) VALUES($nombre, $formato, $temporal, $now, $a, $idUsuario)";	 
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>