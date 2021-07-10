<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idE = sqlValue($_POST["idEstudioE"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioE"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreE"], "text", $horizonte);
 $precio = sqlValue($_POST["precioE"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioUrgenciaE"], "double", $horizonte);
 $precio1 = sqlValue($_POST["precioE1"], "double", $horizonte);
 $precioU1 = sqlValue($_POST["precioUrgenciaE1"], "double", $horizonte);
 $formato = sqlValue($_POST["miDiagnostico"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $idArea = sqlValue($_POST["areaE"], "int", $horizonte);
 
 $sql = "UPDATE conceptos SET concepto_to = $nombre, precio_to = $precio, precio_urgencia_to = $precioU, formato = $formato, precio1_to = $precio1, precio_urgencia1_to = $precioU1, id_area_to = $idArea where id_to = $idE limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>