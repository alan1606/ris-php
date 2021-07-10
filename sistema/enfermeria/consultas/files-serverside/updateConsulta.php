<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioNC"], "int", $horizonte);
 $idConsulta = sqlValue($_POST["idConsulta"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreC"], "text", $horizonte);
 $idArea = sqlValue($_POST["areaC"], "int", $horizonte);
 $precio = sqlValue($_POST["precioC"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioCurgencia"], "double", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
  
 $sql = "UPDATE conceptos SET concepto_to = $nombre, id_area_to = $idArea, precio_to = $precio, precio_urgencia_to = $precioU where id_to = $idConsulta limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>