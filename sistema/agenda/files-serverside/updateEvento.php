<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id = sqlValue($_POST["id"], "int", $horizonte);
 $que = sqlValue($_POST["que"], "int", $horizonte);
 $quien = sqlValue($_POST["quien"], "int", $horizonte);
 $titulo = sqlValue(mb_strtoupper($_POST["titulo"]), "text", $horizonte);
 $start = sqlValue($_POST["start"], "date", $horizonte);
 $end = sqlValue($_POST["end"], "date", $horizonte);
 $descripcion = sqlValue(mb_strtoupper($_POST["descripcion"]), "text", $horizonte);
 $id_user_r = sqlValue($_POST["id_user_r"], "int", $horizonte);
 $estatus = sqlValue($_POST["estatus"], "text", $horizonte); 
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 if($_POST["estatus"]=='PENDIENTE'){
	 $color = sqlValue('gray', "text", $horizonte);
	 $sql = "UPDATE events set title = $titulo, color = $color, description = $descripcion, estatus = $estatus where id = $id limit 1";
 }else if($_POST["estatus"]=='CONFIRMADO'){
	 $color = sqlValue('green', "text", $horizonte);
	 $sql = "UPDATE events set title = $titulo, color = $color, description = $descripcion, estatus = $estatus, id_u_confirma = $id_user_r, fecha_confirma = $now where id = $id limit 1";
 }else if($_POST["estatus"]=='CANCELADO'){
 	 $color = sqlValue('red', "text", $horizonte);
	 $sql = "UPDATE events set title = $titulo, color = $color, description = $descripcion, estatus = $estatus, id_u_cancela = $id_user_r, fecha_cancela = $now where id = $id limit 1";
 }
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if(!$update){echo $sql;}
 else{ echo '1'.';'.$color; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>