<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idS = sqlValue($_POST["idS"], "int", $horizonte);
 $idSucu = sqlValue($_POST["idSucursal"], "int", $horizonte);
 
 //primero tenemos que saber si existe su tabulador, sino entnces escogemos el tabulador base
	$tabu = $_POST['idSucursal'].'_precio'; $resultT = mysqli_query($horizonte, "SHOW COLUMNS FROM conceptos LIKE '$tabu' ");
	$existsT = (mysqli_num_rows($resultT))?TRUE:FALSE;
	if($existsT) {
		$precio_nor = $_POST['idSucursal'].'_precio'; $precio_ur = $_POST['idSucursal'].'_precio_u';
	}else{
		$precio_nor = 'precio_to'; $precio_ur = 'precio_urgencia_to';
	}
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT concepto_to, $precio_nor, $precio_ur, $precio_nor, $precio_nor from conceptos where id_to = $idS ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
			 
 	$datos = $row[0]."*}".$row[1]."*}".$row[2]."*}".$row[3]."*}".$row[4];

echo $datos;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>