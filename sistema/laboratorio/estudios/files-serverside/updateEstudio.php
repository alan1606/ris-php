<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idE = sqlValue($_POST["idEstudioE"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioE"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreE"], "text", $horizonte);
 $precio = sqlValue($_POST["precioE"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioUrgenciaE"], "double", $horizonte);
 $idArea = sqlValue($_POST["areaE"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $dEntrega = sqlValue($_POST["dEntregaE"], "int", $horizonte);
 //$precioM = sqlValue($_POST["precioMe"], "double", $horizonte); $precioM1 = sqlValue($_POST["precioMe1"], "double", $horizonte);
 //$costoMaquila = sqlValue($_POST["precioEmaquila"], "double", $horizonte);
 //$costoMaquilaU = sqlValue($_POST["precioEmaquilaU"], "double", $horizonte);
 
 //primero tenemos que saber si existe su tabulador, sino entnces escogemos el tabulador base
	$tabu = $_POST['miSucursalNS'].'_precio'; $resultT = mysqli_query($horizonte, "SHOW COLUMNS FROM conceptos LIKE '$tabu' ");
	$existsT = (mysqli_num_rows($resultT))?TRUE:FALSE;
	if($existsT) {
		$precio_nor = $_POST['miSucursalNS'].'_precio'; $precio_ur = $_POST['miSucursalNS'].'_precio_u';
		//$precio_nor_me = $_POST['miSucursalNS'].'_precio_mem'; $precio_ur_me = $_POST['miSucursalNS'].'_precio_mem_u';
	}else{
		$precio_nor = 'precio_to'; $precio_ur = 'precio_urgencia_to';
		//$precio_nor_me = 'precio_membrecia_to'; $precio_ur_me = 'precio_membrecia1';
	}
   
 $sql = "UPDATE conceptos SET concepto_to = $nombre, $precio_nor = $precio, $precio_ur = $precioU, dias_entrega_to = $dEntrega, id_area_to = $idArea where id_to = $idE limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>