<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idU = sqlValue($_POST["id_u"], "int", $horizonte);
 $formato = sqlValue($_POST["formato"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombre"]), "text", $horizonte);
 $idF = sqlValue($_POST["id_f"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE formatos set nombre_fo = $nombre, formato_fo = $formato, usuario_fo = $idU, fecha_nm = $now where id_fo = $idF";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>