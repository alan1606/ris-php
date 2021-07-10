<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

 $idU = sqlValue($_POST["id_usr_reg"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["unidad_m"]), "text", $horizonte);
 $abreviacion = sqlValue($_POST["abreviacion_u"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO unidades(unidad_un, abreviacion_un, usuario_un, fecha_un)";
 $sql.= "VALUES ($nombre, $abreviacion, $idU, $now)";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if(!$update){echo $sql;} else{echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>