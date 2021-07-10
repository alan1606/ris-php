<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["id_u"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombre"]), "text", $horizonte);
 $abreviacion = sqlValue($_POST["abreviacion"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO unidades (unidad_un, abreviacion_un, usuario_un, fecha_un)";
 $sql.= "VALUES ($nombre, $abreviacion, $idUsuario, $now)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if(!$update){ echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>