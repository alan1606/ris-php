<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idEstudio = sqlValue($_POST["idEstudioE"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioE"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombreE"]), "text", $horizonte);
 $precio = sqlValue($_POST["precioE"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioUrgenciaE"], "double", $horizonte);

 $precioM = sqlValue($_POST["precioME"], "double", $horizonte);
 $precioMU = sqlValue($_POST["precioUrgenciaME"], "double", $horizonte);

 $idArea = sqlValue($_POST["areaE"], "int", $horizonte);
 $formato = sqlValue($_POST["input"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $noTemp = sqlValue(date('Y-m-d-H-i-s'), "date", $horizonte);
 $dEntrega = sqlValue($_POST["dEntregaE"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE conceptos set concepto_to = $nombre, precio_to = $precio, precio_urgencia_to = $precioU, id_area_to = $idArea, formato = $formato, dias_entrega_to = $dEntrega, usuario_to = $idUsuario, fecha_to = $now, precio_m = $precioM, precio_mu = $precioMU where id_to = $idEstudio";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>