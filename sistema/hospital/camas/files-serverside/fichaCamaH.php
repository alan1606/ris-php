<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idN = sqlValue($_POST["idN"], "int", $horizonte);
  
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT no_ca, ubicacion_ca, area_ca, descripcion_ca from camas where id_ca = $idN ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
			 
 	$datos = $row[0]."*}".$row[1]."*}".$row[2]."*}".$row[3];

echo $datos;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>