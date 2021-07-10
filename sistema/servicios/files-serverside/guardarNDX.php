<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $nombre_ndx = sqlValue($_POST["nombre_ndx"], "text", $horizonte);
 $idU = sqlValue($_POST["id_u_ndx"], "int", $horizonte);
 $clave_ndx = sqlValue($_POST["clave_ndx"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte); 
$sql="INSERT INTO diagnosticos(nombre_di,clave_di,usuario_di,fecha_di) VALUES ($nombre_ndx, $clave_ndx, $idU, $now)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>