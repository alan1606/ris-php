<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioP"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreP"], "text", $horizonte);
 //$idDepartamento = sqlValue($_POST["sexoP"], "int", $horizonte);
 $clave = sqlValue($_POST["telmovilP"], "text", $horizonte);
 $precioM = sqlValue($_POST["telparticularP"], "double", $horizonte);
 $idArea = sqlValue($_POST["areasE"], "int", $horizonte);
 $precioF = sqlValue($_POST["edadP"], "double", $horizonte);
 $formato = sqlValue($_POST["miDiagnostico"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO estudios (usuario_est, nombre_est, precio_est, precio_maquila_est, depto_est, area_est, fecha_registro_est, clave_est, habilitado_est, formato)";
 $sql.= "VALUES ($idUsuario, $nombre, $precioF, $precioM, 1, $idArea, $now, $clave, 1, $formato)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo 'bad';
 }else{ 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT id_est from estudios order by id_est desc limit 1 ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	echo $row[0];

 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>