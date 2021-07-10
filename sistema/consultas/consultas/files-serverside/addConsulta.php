<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioNC"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreC"], "text", $horizonte);
 $idArea = sqlValue($_POST["areaC"], "int", $horizonte);
 $precio = sqlValue($_POST["precioC"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioCurgencia"], "double", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $precio1 = sqlValue($_POST["precioC1"], "double", $horizonte);
 $precioU1 = sqlValue($_POST["precioCurgencia1"], "double", $horizonte);
 $precioM = sqlValue($_POST["precioMe"], "double", $horizonte);
 $precioM1 = sqlValue($_POST["precioMe1"], "double", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO conceptos (usuario_to, concepto_to, id_area_to, precio_to, precio_urgencia_to, fecha_to, id_departamento_to, id_tipo_concepto_to, precio1_to, precio1_urgencia_to, precio_membrecia_to, precio_membrecia1)";
 $sql.= "VALUES ($idUsuario, $nombre, $idArea, $precio, $precioU, $now, 4, 1, $precio1, $precioU1, $precioM, $precioM1)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>