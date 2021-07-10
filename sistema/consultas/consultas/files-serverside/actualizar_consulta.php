<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioE"], "int", $horizonte);
 $idConsulta = sqlValue($_POST["idEstudioE"], "int", $horizonte);
 $nombre = sqlValue(strtoupper($_POST["nombreE"]), "text", $horizonte);
 $precio = sqlValue($_POST["precioE"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioUrgenciaE"], "double", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $precioM = sqlValue($_POST["precioME"], "double", $horizonte);
 $precioMU = sqlValue($_POST["precioUrgenciaME"], "double", $horizonte);
  
 $sql = "UPDATE conceptos SET concepto_to = $nombre, precio_to = $precio, precio_urgencia_to = $precioU, precio_m = $precioM, precio_mu = $precioMU where id_to = $idConsulta limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>