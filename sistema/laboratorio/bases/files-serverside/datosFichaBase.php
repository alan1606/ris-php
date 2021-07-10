<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 if(isset($_POST["aleatorio"])){ $aleatorio = sqlValue($_POST["aleatorio"], "text", $horizonte); }else{$aleatorio = 0;}
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT base_b, precio_maquila_b, id_area_b, unidad_medida_r_b, id_equipo_b, id_b from bases where aleatorio_b = $aleatorio ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	$idArea = sqlValue($row[2], "int", $horizonte);
	$idUM = sqlValue($row[3], "int", $horizonte);
	$idEquipo = sqlValue($row[4], "int", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
 	$result1 = mysqli_query($horizonte, "SELECT nombre_a from areas where id_a = $idArea ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
	mysqli_select_db($horizonte, $database_horizonte);
 	$result2 = mysqli_query($horizonte, "SELECT unidad_un, abreviacion_un from unidades where id_un = $idUM ") or die (mysqli_error($horizonte));
 	$row2 = mysqli_fetch_row($result2);
	
	mysqli_select_db($horizonte, $database_horizonte);
 	$result3 = mysqli_query($horizonte, "SELECT modelo_eq from catalogo_equipos where id_eq = $idEquipo ") or die (mysqli_error($horizonte));
 	$row3 = mysqli_fetch_row($result3);
			 
 	$datos = $row[0]."{;]".$row[1]."{;]".$idArea."{;]".$idUM."{;]".$row3[0]."{;]".$row2[0]."{;]".$row[5]."{;]".$row2[1]."{;]".$row[3]."{;]".$row[4]."{;]".$row1[0]."{;]".$idEquipo;

echo $datos;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>