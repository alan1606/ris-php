<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $id = sqlValue($_GET["idCo"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioNM"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreC"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $descripcion = sqlValue($_POST["descripcionC"], "text", $horizonte);
 $tipo = sqlValue($_POST["id_tipoCosumible"], "int", $horizonte);
 $unidad = sqlValue($_POST["id_umBasex"], "int", $horizonte);
 $presentacion = sqlValue($_POST["id_presentacionCosumible"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE inventario set usuario_i = $idUsuario, item_i = $nombre, fecha_i = $now, descripcion_i = $descripcion, id_tipo_i = $tipo, id_unidad_i = $unidad, id_presentacion_i = $presentacion where id_i = $id limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>