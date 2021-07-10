<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idN = sqlValue($_POST["idN"], "int", $horizonte);
  
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT nombre_nm, nota_nm, id_area_nm from notas_medicas where id_nm = $idN ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
			 
 	$datos = $row[0]."*}".$row[1]."*}".$row[2];

echo $datos;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>