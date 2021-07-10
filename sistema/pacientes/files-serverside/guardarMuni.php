<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idEstado = sqlValue($_POST["estadoNM"], "int", $horizonte);
 $nombre_nm = sqlValue($_POST["nombre_nm"], "text", $horizonte);
 $idU = sqlValue($_POST["id_u_nmuni"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT d_estado from mexico where id_mx = $idEstado limit 1") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $miEstado = sqlValue($row[0], "text", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte); 
 $sql="INSERT INTO mexico(d_estado, d_municipio, usuario_mx, fecha_mx) VALUES ($miEstado, $nombre_nm, $idU, $now)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>