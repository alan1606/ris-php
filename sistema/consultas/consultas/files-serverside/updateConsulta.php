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
 $precio1 = sqlValue($_POST["precioC1"], "double", $horizonte);
 $precioU1 = sqlValue($_POST["precioCurgencia1"], "double", $horizonte);
 $precioM = sqlValue($_POST["precioMe"], "double", $horizonte);
 $precioM1 = sqlValue($_POST["precioMe1"], "double", $horizonte);
  
 $sql = "UPDATE conceptos SET concepto_to = $nombre, id_area_to = $idArea, precio_to = $precio, precio_urgencia_to = $precioU, precio1_to = $precio1, precio1_urgencia_to = $precioU1, precio_membrecia_to = $precioM, precio_membrecia1 = $precioM1 where id_to = $idConsulta limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>