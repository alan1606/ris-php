<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$id_p = sqlValue($_POST["id_p"], "int", $horizonte); $contacto = sqlValue($_POST["contacto"], "text", $horizonte);
$parentesco = sqlValue($_POST["parentesco"], "int", $horizonte); $telefono = sqlValue($_POST["telefono"], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$sql = "UPDATE pacientes SET contactoEmergencia_p = $contacto, parentesco_contacto_p = $parentesco, tEmergencia_p = $telefono where id_p = $id_p limit 1";
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

if (!$update) { echo $sql; }else {echo 1;}
	
//Cerrar conexión a la Base de Datos
mysqli_close($horizonte);
?>