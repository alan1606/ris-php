<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioNC"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreC"], "text", $horizonte);
 $idArea = sqlValue($_POST["areaC"], "int", $horizonte);
 $precio = sqlValue($_POST["precioC"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioCurgencia"], "double", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO conceptos (usuario_to, concepto_to, id_area_to, precio_to, precio_urgencia_to, fecha_to, id_departamento_to, id_tipo_concepto_to)";
 $sql.= "VALUES ($idUsuario, $nombre, $idArea, $precio, $precioU, $now, 4, 1)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>