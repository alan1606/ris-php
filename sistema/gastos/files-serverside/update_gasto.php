<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idU = sqlValue($_POST["idUsuarioC"], "int", $horizonte);
 $nombre = sqlValue(strtoupper($_POST["nombre_g"]), "text", $horizonte);
 $descripcion = sqlValue(strtoupper($_POST["descripcion_g"]), "text", $horizonte);
 $idG = sqlValue($_POST["id_cto"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
  
 $sql = "UPDATE conceptos SET concepto_to = $nombre, descripcion_to = $descripcion where id_to = $idG limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>