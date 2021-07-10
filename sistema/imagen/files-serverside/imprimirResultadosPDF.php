<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$idEvc = sqlValue($_GET["idE"], "int", $horizonte); $i = 0; $f = 0; $idU = sqlValue($_GET["idU"], "int", $horizonte); $filillas = 0;

	mysqli_select_db($horizonte, $database_horizonte); 
 	$result = mysqli_query($horizonte, "SELECT interpretacion_vc from venta_conceptos where id_vc = $idEvc") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
  
$tabla = sqlValue($row[0], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sqlX = "UPDATE usuarios SET variable_temporal_u = $tabla where id_u = $idU limit 1";
 $updateX = mysqli_query($horizonte, $sqlX) or die (mysqli_error($horizonte));
	
 if(!$updateX){ echo $sqlX; }else{ echo $tabla; }
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>