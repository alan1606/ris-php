<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $nombre = sqlValue(mb_strtoupper($_POST["nombreP"]), "text", $horizonte);
 $area = sqlValue($_POST["areaB"], "int", $horizonte);
 $unidadMedidaResultado = sqlValue($_POST["id_umBase"], "int", $horizonte);
 $equipo = sqlValue($_POST["equipoMu1"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioP"], "int", $horizonte);
 $precioEstimado = sqlValue($_POST["precioP"], "double", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorioB"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO bases (usuario_reg_b, base_b, id_area_b, unidad_medida_r_b, precio_maquila_b, fecha_reg_b, aleatorio_b, id_equipo_b)";
 $sql.= "VALUES ($idUsuario, $nombre, $area, $unidadMedidaResultado, $precioEstimado, $now, $aleatorio, $equipo)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT id_b from bases order by id_b desc limit 1 ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $idBase = sqlValue($row[0], "int", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql1 = "UPDATE asignar_consumibles set id_base_ac = $idBase, temporal_ac = 0 where aleatorio_ac = $aleatorio";
	$update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
	
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql2 = "UPDATE asignar_indicacion set id_base_ai = $idBase, temporal_ai = 0 where aleatorio_ai = $aleatorio";
	$update2 = mysqli_query($horizonte, $sql2) or die (mysqli_error($horizonte));
	
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql3 = "UPDATE asignar_metodo set id_base_ame = $idBase, temporal_ame = 0 where aleatorio_ame = $aleatorio";
	$update3 = mysqli_query($horizonte, $sql3) or die (mysqli_error($horizonte));
	
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql4 = "UPDATE asignar_muestra set id_base_am = $idBase, temporal_am = 0 where aleatorio_am = $aleatorio";
	$update4 = mysqli_query($horizonte, $sql4) or die (mysqli_error($horizonte));
	
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql5 = "UPDATE asignar_valor_referencia set id_base_avr = $idBase, temporal_avr = 0 where aleatorio_avr = $aleatorio";
	$update5 = mysqli_query($horizonte, $sql5) or die (mysqli_error($horizonte));
	
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>