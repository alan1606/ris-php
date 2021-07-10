<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$idG = sqlValue($_POST["idG"], "int", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT c.concepto_to, c.descripcion_to from conceptos c where c.id_to = $idG ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
			 
 	$datos = $row[0]."*}".$row[1];

echo $datos;
 
//Cerrar conexión a la Base de Datos
mysqli_close($horizonte);
?>