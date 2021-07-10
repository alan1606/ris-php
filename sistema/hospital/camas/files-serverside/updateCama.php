<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idN = sqlValue($_POST["idEstudioE"], "int", $horizonte);
 $numero = sqlValue($_POST["numeroCama"], "int", $horizonte);
 $ubicacion = sqlValue($_POST["ubicacionCama"], "text", $horizonte);
 $area = sqlValue($_POST["area_cama"], "int", $horizonte);
 $descripcion = sqlValue($_POST["miDiagnostico"], "text", $horizonte);
 
 $sql = "UPDATE camas SET no_ca = $numero, ubicacion_ca = $ubicacion, area_ca = $area, descripcion_ca = $descripcion where id_ca = $idN limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>