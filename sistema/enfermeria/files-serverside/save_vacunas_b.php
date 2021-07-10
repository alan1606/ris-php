<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

$id_p = sqlValue($_POST["id_p"], "int", $horizonte);
$vacuna = sqlValue($_POST["vacuna"], "text", $horizonte);
$aplicada = sqlValue($_POST["aplicada"], "int", $horizonte);
$enfermedad = sqlValue($_POST["enfermedad"], "text", $horizonte);
$edad = sqlValue($_POST["edad"], "text", $horizonte);
$dosis = sqlValue($_POST["dosis"], "text", $horizonte);
$fecha_a = sqlValue($_POST["fecha_a"], "date", $horizonte);
$aleatorio = sqlValue($_POST["aleatorio"], "text", $horizonte);
$now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
$id_u = sqlValue($_SESSION["id"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$sql = "insert into vacunas_aplicadas(id_paciente_va, vacuna_va, aplicada_va, enfermedad_va, edad_va, dosis_va, fecha_aplicacion_va, id_usuario_va, fecha_va, esquema) values($id_p, $vacuna, $aplicada, $enfermedad, $edad, $dosis, $fecha_a, $id_u, $now, 1)";
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

if (!$update) { echo $sql; }else {echo 1;}
	
//Cerrar conexión a la Base de Datos
mysqli_close($horizonte);
?>