<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idE = sqlValue($_POST["idE"], "int", $horizonte); 
 
 //primero tenemos que saber si existe su tabulador, sino entnces escogemos el tabulador base
	$tabu = $_POST['idSucursal'].'_precio'; $resultT = mysqli_query($horizonte, "SHOW COLUMNS FROM conceptos LIKE '$tabu' ");
	$existsT = (mysqli_num_rows($resultT))?TRUE:FALSE;
	if($existsT) {
		$precio_nor = $_POST['idSucursal'].'_precio'; $precio_ur = $_POST['idSucursal'].'_precio_u';
		//$precio_nor_me = $_POST['idSucursal'].'_precio_mem'; $precio_ur_me = $_POST['idSucursal'].'_precio_mem_u';
	}else{
		$precio_nor = 'precio_to'; $precio_ur = 'precio_urgencia_to';
		//$precio_nor_me = 'precio_membrecia_to'; $precio_ur_me = 'precio_membrecia1';
	}
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT concepto_to, id_area_to, $precio_nor, $precio_ur, dias_entrega_to, costo_maquila_to, costo_maquila_u_to, $precio_nor, $precio_nor from conceptos where id_to = $idE ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
			 
 	$datos = $row[0]."*}".$row[1]."*}".$row[2]."*}".$row[3]."*}".$row[4]."*}".$row[5]."*}".$row[6]."*}".$row[7]."*}".$row[8];

echo $datos;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>