<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioNA"], "int", $horizonte);
 $id = sqlValue($_GET["idAre"], "int", $horizonte);
 $area = sqlValue($_POST["areaE1"], "text", $horizonte);
 $clave = sqlValue($_POST["claveE1"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE areas set nombre_a = $area, usuario_a = $idUsuario, fecha_a = $now, clave_a = $clave where id_a = $id limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>