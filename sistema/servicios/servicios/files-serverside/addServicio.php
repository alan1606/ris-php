<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioS"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreS"], "text", $horizonte);
 $precio = sqlValue($_POST["precioS"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioUrgenciaS"], "double", $horizonte);
 $idDepartamento = sqlValue(4, "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $precioM = sqlValue($_POST["precioMe"], "double", $horizonte);
 $precioM1 = sqlValue($_POST["precioMe1"], "double", $horizonte);//$sucursal = sqlValue($_POST["miSucursalNS"], "int", $horizonte);
 
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

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO conceptos (usuario_to, concepto_to, $precio_nor, $precio_ur, fecha_to, id_departamento_to, id_tipo_concepto_to, id_area_to)";
 $sql.= "VALUES ($idUsuario, $nombre, $precio, $precioU, $now, 4, 2, 21)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>