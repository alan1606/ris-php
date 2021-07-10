<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

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
 $dicom = sqlValue($_POST["dicom_i"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO conceptos (usuario_to, concepto_to, precio_to, precio_urgencia_to, id_area_to, formato, fecha_to, id_departamento_to, id_tipo_concepto_to, aleatorio_c, dicom, precio_m, precio_mu)";
 $sql.= "VALUES ($idUsuario, $nombre, $precio, $precioU, $idArea, $formato, $now, 2, 4, $noTemp, $dicom, $precioM, $precioMU)";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>