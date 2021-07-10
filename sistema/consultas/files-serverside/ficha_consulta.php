<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$idE = sqlValue($_POST["idE"], "int", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT c.concepto_to, c.precio_to, c.precio_urgencia_to, c.precio_m, c.precio_mu, concat(u.nombre_u, ' ', u.apaterno_u) from conceptos c left join usuarios u on u.temporal_u = c.aleatorio_c where c.id_to = $idE ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
			 
 	$datos = $row[0]."*}".$row[1]."*}".$row[2]."*}".$row[3]."*}".$row[4]."*}".$row[5];

echo $datos;
 
//Cerrar conexión a la Base de Datos
mysqli_close($horizonte);
?>