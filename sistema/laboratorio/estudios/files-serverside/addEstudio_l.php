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
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $noTemp = sqlValue($_POST["aleatorioB"], "text", $horizonte);
 $dEntrega = sqlValue($_POST["dEntregaE"], "int", $horizonte);
 $formato = sqlValue($_POST["input"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO conceptos (usuario_to, concepto_to, precio_to, precio_urgencia_to, id_area_to, formato, fecha_to, id_departamento_to, id_tipo_concepto_to, aleatorio_c, dias_entrega_to, precio_m, precio_mu)";
 $sql.= "VALUES ($idUsuario, $nombre, $precio, $precioU, $idArea, $formato, $now, 1, 3, $noTemp, $dEntrega, $precioM, $precioMU)";	
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) { echo $sql; }else{
	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT id_to from conceptos order by id_to desc limit 1 ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $idBase = sqlValue($row[0], "int", $horizonte);
	 
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql4 = "UPDATE asignar_muestra set id_base_am = $idBase, temporal_am = 0 where aleatorio_am = $noTemp";
	$update4 = mysqli_query($horizonte, $sql4) or die (mysqli_error($horizonte));
	 
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql3 = "UPDATE asignar_metodo set id_base_ame = $idBase, temporal_ame = 0 where aleatorio_ame = $noTemp";
	$update3 = mysqli_query($horizonte, $sql3) or die (mysqli_error($horizonte));
	 
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>