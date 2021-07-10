<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$id_p = sqlValue($_POST["id_p"], "int", $horizonte); $id_ec = sqlValue($_POST["id_ec"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$sql = "UPDATE pacientes SET edo_civil_p = $id_ec where id_p = $id_p limit 1";
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

if (!$update) { echo $sql; }else {echo 1;}
	
//Cerrar conexión a la Base de Datos
mysqli_close($horizonte);
?>