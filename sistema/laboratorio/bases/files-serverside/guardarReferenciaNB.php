<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $referencia = sqlValue($_POST["referencia"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);

	 mysqli_select_db($horizonte, $database_horizonte); 
	 $resultC = mysqli_query($horizonte, "SELECT id_vr, valor_referencia_vr from valores_referencia where id_vr = $referencia ") or die (mysqli_error($horizonte));
	 $rowC = mysqli_fetch_row($resultC);
	 
 $idR = sqlValue($rowC[0], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 //buscamos el id de la base con el noAleatorio, si existe la base, entonces la insertamos, sino no
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC5 = mysqli_query($horizonte, "SELECT count(id_b) from bases where aleatorio_b = $noTemp ") or die (mysqli_error($horizonte));
 $rowC5 = mysqli_fetch_row($resultC5);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultC1 = mysqli_query($horizonte, "SELECT count(id_avr) from asignar_valor_referencia where id_valor_referencia_avr = $referencia and aleatorio_avr = $noTemp") or die (mysqli_error($horizonte));
 $rowC1 = mysqli_fetch_row($resultC1);
 
 if($rowC5[0]>0){
	mysqli_select_db($horizonte, $database_horizonte); 
 	$resultC6 = mysqli_query($horizonte, "SELECT id_b from bases where aleatorio_b = $noTemp ") or die (mysqli_error($horizonte));
 	$rowC6 = mysqli_fetch_row($resultC6);
	
	//if($rowC1[0]<1){
		mysqli_select_db($horizonte, $database_horizonte); 
		$sql="INSERT INTO asignar_valor_referencia(aleatorio_avr,id_valor_referencia_avr,usuario_reg_avr,fecha_reg_avr, id_base_avr)";
		$sql.= "VALUES ($noTemp, $referencia, $idU, $now, $rowC6[0])";
		$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		if (!$update) { echo $sql; }else{ echo 1; }
	//}else{echo 1;}
 }else{
	if($rowC1[0]<1){
		mysqli_select_db($horizonte, $database_horizonte); 
		$sql="INSERT INTO asignar_valor_referencia(aleatorio_avr,id_valor_referencia_avr,usuario_reg_avr,fecha_reg_avr)";
		$sql.= "VALUES ($noTemp, $referencia, $idU, $now)";
		$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		if (!$update) { echo $sql; }else{ echo 1; }
	}else{echo 1;}
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>