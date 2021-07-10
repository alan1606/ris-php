<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["id_u"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombre"]), "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $descripcion = sqlValue(mb_strtoupper($_POST["descripcion"]), "text", $horizonte);
 $tipo = sqlValue($_POST["tipo"], "int", $horizonte);
 $unidad = sqlValue($_POST["unidad"], "int", $horizonte);
 $presentacion = sqlValue($_POST["presentacion"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO inventario(usuario_i, item_i, fecha_i, descripcion_i, id_tipo_i, id_unidad_i, id_presentacion_i)";
 $sql.= "VALUES ($idUsuario, $nombre, $now, $descripcion, $tipo, $unidad, $presentacion)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update){echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>