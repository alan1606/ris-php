<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

$id_p = sqlValue($_POST["id_p"], "int", $horizonte);

//Primero borramos, si es que hay, a todos los registros de vacunas de cuadro basico de este paciente en vacunas aplicadas
mysqli_select_db($horizonte, $database_horizonte);
$sql1 = "delete from vacunas_aplicadas where id_paciente_va = $id_p and esquema = 1";
$delete = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));

if (!$delete) { echo $sql1; }else { echo 1; }
	
//Cerrar conexión a la Base de Datos
mysqli_close($horizonte);
?>