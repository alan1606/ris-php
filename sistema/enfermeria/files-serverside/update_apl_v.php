<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

$id_p = sqlValue($_POST["id_p"], "int", $horizonte);
$id_va = sqlValue($_POST["id_va"], "int", $horizonte);
$fecha = sqlValue($_POST["fecha"], "date", $horizonte);
$now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
$id_u = sqlValue($_SESSION["id"], "int", $horizonte);

//Primero borramos, si es que hay, a todos los registros de vacunas de cuadro basico de este paciente en vacunas aplicadas
mysqli_select_db($horizonte, $database_horizonte);
$sql1 = "update vacunas_aplicadas set aplicada_va = 1, fecha_aplicacion_va = $fecha, id_usuario_va = $id_u, fecha_va = $now where id_paciente_va = $id_p and esquema = 1 and id_va = $id_va limit 1";
$update = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));

if (!$update) { echo $sql1; }else { echo 1; }
	
//Cerrar conexión a la Base de Datos
mysqli_close($horizonte);
?>