<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

 $id_user = $_SESSION['id']; $acceso_user = $_SESSION['MM_UserGroup'];

 $id_u = sqlValue($id_user, "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombre_v"]), "text", $horizonte);
 $enfermedad = sqlValue(mb_strtoupper($_POST["enfermedad_v"]), "text", $horizonte);
 $edad = sqlValue(mb_strtoupper($_POST["edad_v"]), "text", $horizonte);
 $aplicacion = sqlValue(mb_strtoupper($_POST["aplicacion_v"]), "text", $horizonte);
 $dosis = sqlValue(mb_strtoupper($_POST["dosis_v"]), "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO catalogo_vacunas (id_usuario_v, vacuna_v, fecha_v, enfermedad_v, edad_v, aplicacion_v, dosis_v) VALUES ($id_u, $nombre, $now, $enfermedad, $edad, $aplicacion, $dosis)";
  
$insert = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$insert) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>