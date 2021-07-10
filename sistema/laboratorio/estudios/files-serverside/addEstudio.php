<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioE"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreE"], "text", $horizonte);
 $precio = sqlValue($_POST["precioE"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioUrgenciaE"], "double", $horizonte);
 $idArea = sqlValue($_POST["areaE"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $noTemp = sqlValue($_POST["aleatorioB"], "text", $horizonte);
 $dEntrega = sqlValue($_POST["dEntregaE"], "int", $horizonte);
 //$precioM = sqlValue($_POST["precioMe"], "double", $horizonte); $precioM1 = sqlValue($_POST["precioMe1"], "double", $horizonte);
 
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
 $sql = "INSERT INTO conceptos (usuario_to, concepto_to, $precio_nor, $precio_ur, id_area_to, fecha_to, id_departamento_to, id_tipo_concepto_to, aleatorio_c, dias_entrega_to)";
 $sql.= "VALUES ($idUsuario, $nombre, $precio, $precioU, $idArea, $now, 1, 3, $noTemp, $dEntrega)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
 	mysqli_select_db($horizonte, $database_horizonte); 
	$resultC = mysqli_query($horizonte, "SELECT max(id_to) from conceptos limit 1 ") or die (mysqli_error($horizonte));
	$rowC = mysqli_fetch_row($resultC);
	
	mysqli_select_db($horizonte, $database_horizonte); 
	$resultC1 = mysqli_query($horizonte, "SELECT aleatorio_c from conceptos where id_to = $rowC[0] limit 1 ") or die (mysqli_error($horizonte));
	$rowC1 = mysqli_fetch_row($resultC1); $ale = sqlValue($rowC1[0], "text", $horizonte);
	
	$sqlF = "UPDATE asignar_bases SET id_estudio_ab = $rowC[0], aleatorio_ab = $ale where aleatorio_ab = $noTemp";

	mysqli_select_db($horizonte, $database_horizonte);
	$insertar = mysqli_query($horizonte, $sqlF, $horizonte);
		
	if (!$insertar) { echo $sqlF; }else { echo 1; }
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>