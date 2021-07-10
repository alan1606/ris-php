<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idS = sqlValue($_POST["idS"], "int", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT concepto_to, precio_to, precio_urgencia_to from conceptos where id_to = $idS ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
			 
 	$datos = $row[0]."*}".$row[1]."*}".$row[2]."*}".$row[3]."*}".$row[4];

echo $datos;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>