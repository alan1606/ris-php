<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

$id_p = sqlValue($_POST["id_p"], "int", $horizonte);
$antecedente = sqlValue($_POST["antecedente"], "text", $horizonte);
$personal = sqlValue($_POST["personal"], "int", $horizonte);
$nota_p = sqlValue($_POST["nota_p"], "text", $horizonte);
$familiar = sqlValue($_POST["familiar"], "int", $horizonte);
$nota_f = sqlValue($_POST["nota_f"], "text", $horizonte);
$aleatorio = sqlValue($_POST["aleatorio"], "text", $horizonte);
$now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
$id_u = sqlValue($_SESSION["id"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$sql = "insert into antecedentes(id_paciente_an, antecedente_an, personal_an, actual_an, nota_personal_an, familiar_an, nota_familiar_an, id_usuario_an, fecha_an, aleatorio_an) values($id_p, $antecedente, $personal, 0, $nota_p, $familiar, $nota_f, $id_u, $now, $aleatorio)";
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

if (!$update) { echo $sql; }else {echo 1;}
	
//Cerrar conexión a la Base de Datos
mysqli_close($horizonte);
?>