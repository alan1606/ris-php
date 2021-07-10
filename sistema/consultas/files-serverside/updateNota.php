<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idNM = sqlValue($_POST["idNM"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombreNM"]), "text", $horizonte);
 $nota = sqlValue($_POST["input"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE notas_medicas set nombre_nm = $nombre, nota_nm = $nota where id_nm = $idNM";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>