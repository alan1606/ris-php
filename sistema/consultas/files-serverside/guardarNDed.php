<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $nombre = sqlValue($_POST["nombre_nmed"], "text", $horizonte);
 $idU = sqlValue($_POST["id_u_nmed"], "int", $horizonte);
 $clave = sqlValue($_POST["clave_nmed"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $descripcion = sqlValue($_POST["descripcion_nmed"], "text", $horizonte);
 $dosis = sqlValue($_POST["dosis_nmed"], "text", $horizonte);
 $presentacion = sqlValue($_POST["presentacion_nmed"], "text", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte); 
$sql="INSERT INTO medicamentos(clave_med,nombre_generico_med,descripcion_med,cantidad_med, usuario_med, fecha_med) VALUES ($clave, $nombre, $descripcion, $dosis, $idU, $now)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>