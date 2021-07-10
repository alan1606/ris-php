<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idusuarioNM"], "int", $horizonte);
 $numero = sqlValue($_POST["numeroCama"], "int", $horizonte);
 $ubicacion = sqlValue($_POST["ubicacionCama"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $area = sqlValue($_POST["area_cama"], "int", $horizonte);
 $descripcion = sqlValue($_POST["miDiagnostico"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO camas(no_ca, ubicacion_ca, usuario_ca, fecha_ca, area_ca, descripcion_ca)";
 $sql.= "VALUES ($numero, $ubicacion, $idUsuario, $now, $area, $descripcion)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>