<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$id_p = sqlValue($_POST["id_p"], "int", $horizonte); $id_tamiz = sqlValue($_POST["id_tamiz"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$sql = "UPDATE pacientes SET tamiz_p = $id_tamiz where id_p = $id_p limit 1";
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

if (!$update) { echo $sql; }else {echo 1;}
	
//Cerrar conexión a la Base de Datos
mysqli_close($horizonte);
?>