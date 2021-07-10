<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idE = sqlValue($_POST["idE"], "int", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT concepto_to, id_area_to, precio_to, precio_urgencia_to, formato, dias_entrega_to, precio_m, precio_mu from conceptos where id_to = $idE ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

 	$datos = $row[0]."*}".$row[1]."*}".$row[2]."*}".$row[3]."*}".$row[4]."*}".$row[5]."*}".$row[6]."*}".$row[7];

echo $datos;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>