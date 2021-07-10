<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $valor = sqlValue($_POST["val"], "double", $horizonte);
 $id_to = sqlValue($_POST["id_to"], "int", $horizonte);
 $id_u = sqlValue($_POST["id_u"], "int", $horizonte);
 $id_su = sqlValue($_POST["id_su"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 //primero tenemos que saber si existe su tabulador, sino entnces escogemos el tabulador base
 $tabu = $_POST['id_su'].'_precio'; $resultT = mysqli_query($horizonte, "SHOW COLUMNS FROM conceptos LIKE '$tabu' ");
 $existsT = (mysqli_num_rows($resultT))?TRUE:FALSE;
 if($existsT){
	$precio_nor = $_POST['id_su'].'_precio'; $precio_ur = $_POST['id_su'].'_precio_u';
	
	//Checamos si hay cambio, sino hay cambio entonces no se actualiza
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT $precio_nor from conceptos where id_to = $id_to ") or die (mysqli_error($horizonte));
	$row = mysqli_fetch_row($result);
	 
	if($row[0] < $valor or $row[0] > $valor){
		mysqli_select_db($horizonte, $database_horizonte);
 		$sql = "UPDATE conceptos set $precio_nor = $valor, usuario_to = $id_u, fecha_to = $now where id_to = $id_to";
		
		$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

 		if (!$update) { echo $sql; }else{ echo 1; }
	}else{ echo 1; }
 }else{
	 //Checamos si hay cambio, sino hay cambio entonces no se actualiza
	 mysqli_select_db($horizonte, $database_horizonte);
	 $result = mysqli_query($horizonte, "SELECT precio_to from conceptos where id_to = $id_to ") or die (mysqli_error($horizonte));
	 $row = mysqli_fetch_row($result);
	 
	 if($row[0] < $valor or $row[0] > $valor){
		mysqli_select_db($horizonte, $database_horizonte);
	 	$sql = "UPDATE conceptos set precio_to = $valor, usuario_to = $id_u, fecha_to = $now where id_to = $id_to";
		$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

 		if (!$update) { echo $sql; }else{ echo 1; }
	 }else{ echo 1; }
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>