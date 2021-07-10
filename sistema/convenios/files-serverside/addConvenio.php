<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioP"], "int", $horizonte);
 $clave = sqlValue($_POST["claveC"], "text", $horizonte);
 $nombre = sqlValue($_POST["nombreC"], "text", $horizonte);
 $descripcion = sqlValue($_POST["descripcionC"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO convenios (clave_cv, convenio_cv, descripcion_cv, usuario_cv, fecha_cv)";
 $sql.= "VALUES ($clave, $nombre, $descripcion, $idUsuario, now())";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo 'ok';
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>