<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idE = sqlValue($_POST["idP"], "int", $horizonte); 
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT clave_est, nombre_est, precio_est, precio_maquila_est, depto_est, area_est, formato from estudios where id_est = $idE ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
			 
 	$datos = $row[0]."*}".$row[1]."*}".$row[2]."*}".$row[3]."*}".$row[4]."*}".$row[5]."*}".$row[6];

echo $datos;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>