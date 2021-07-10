<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idV = sqlValue($_POST["idV"], "int", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT vacuna_v, enfermedad_v, edad_v, aplicacion_v, dosis_v, esquema_v from catalogo_vacunas where id_v = $idV ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
			 
 	$datos = $row[0].'-}*{'.$row[1].'-}*{'.$row[2].'-}*{'.$row[3].'-}*{'.$row[4].'-}*{'.$row[5];

echo $datos;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>