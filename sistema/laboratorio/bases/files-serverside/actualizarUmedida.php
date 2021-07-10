<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioUM"], "int", $horizonte);
 $idUM = sqlValue($_GET["idUM"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreUM"], "text", $horizonte);
 $abreviacion = sqlValue($_POST["abreviacionUM"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE unidades set unidad_un = $nombre, abreviacion_un = $abreviacion, usuario_un = $idUsuario, fecha_un = $now where  id_un = $idUM limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>