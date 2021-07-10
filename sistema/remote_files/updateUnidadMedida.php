<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

 $idU = sqlValue($_POST["id_usr_update"], "int", $horizonte);
 $idUM = sqlValue($_POST["id_unidad_m"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["unidad_m"]), "text", $horizonte);
 $abreviacion = sqlValue($_POST["abreviacion_u"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE unidades set unidad_un = $nombre, abreviacion_un = $abreviacion, usuario_un = $idU, fecha_un = $now where id_un = $idUM  limit 1";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if(!$update){echo $sql;} else{echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>