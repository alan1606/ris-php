<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idusuarioNM"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreNM"], "text", $horizonte);
 $nota = sqlValue($_POST["input"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $area = sqlValue($_POST["area_nota"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO formatos(nombre_fo, formato_fo, usuario_fo, fecha_nm, id_area_fo)";
 $sql.= "VALUES ($nombre, $nota, $idUsuario, $now, $area)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>