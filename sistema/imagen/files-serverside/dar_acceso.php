<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["idE"], "int", $horizonte);
 $medico = sqlValue($_POST["medico"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $result1 = mysqli_query($horizonte, "SELECT count(id_as) from acceso_simple where id_u_as = $medico and id_vc_as = $idE ") or die (mysqli_error($horizonte));
 $row1 = mysqli_fetch_row($result1);
 
 if($row1[0]<1){
	 mysqli_select_db($horizonte, $database_horizonte);
 	$sql = "insert into acceso_simple (id_u_as, id_vc_as, usuario_as, fecha_as) values($medico, $idE, $idU, $now) ";
 	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 	if (!$update) { echo $sql; }else { echo 1; }
 }else{echo 2;}
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>