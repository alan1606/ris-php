<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $time = $_POST["time"];
 $now = date('Y-m-d H:i:s');
 $now1 = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 $fecha1 = new DateTime($time); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);
 $anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
 $miTime = sprintf("%02d", $dias)."D/".sprintf("%02d", $horas).":".sprintf("%02d", $minutos).":".sprintf("%02d", $segundos);
 
 //Se van a finalizar todas aquellas consultas que esten en estado proceso por más de 5 horas 
 	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT id_vc, fechaEdo2_e, usuarioEdo2_e from venta_conceptos where tipo_concepto_vc = 2 and estatus_vc = 2") or die (mysqli_error($horizonte)); 
	
	while ( $row = mysqli_fetch_row($result) ){
		mysqli_select_db($horizonte, $database_horizonte);
		$segundos=strtotime($now) - strtotime($row[1]); 
		if($segundos >= 18000){ 
			$resultEP = mysqli_query($horizonte, "UPDATE venta_conceptos set estatus_vc = 5, usuarioEdo3_e = $row[2], fechaEdo3_e = $now1 where id_vc = $row[0]") or die (mysqli_error($horizonte));
 			$rowEP = mysqli_fetch_row($resultEP);
		}
	} 
 ////////////////
 
 //Se van a finalizar todas aquellas consultas que esten en estado pendiente por más de un día 
 	mysqli_select_db($horizonte, $database_horizonte);
	$resultF = mysqli_query($horizonte, "SELECT id_vc, fechaEdo1_e, usuarioEdo1_e from venta_conceptos where tipo_concepto_vc = 2 and estatus_vc = 1") or die (mysqli_error($horizonte)); 
	
	while ( $rowF = mysqli_fetch_row($resultF) ){
		mysqli_select_db($horizonte, $database_horizonte);
		$segundosF=strtotime($now) - strtotime($rowF[1]); 
		if($segundosF >= 86400){ 
			$resultEPf = mysqli_query($horizonte, "UPDATE venta_conceptos set estatus_vc = 5, usuarioEdo2_e = $rowF[2], fechaEdo2_e = $now1, usuarioEdo3_e = $rowF[2], fechaEdo3_e = $now1 where id_vc = $rowF[0]") or die (mysqli_error($horizonte));
 			$rowEPF = mysqli_fetch_row($resultEPf);
		}
	} 
 ////////////////
		  	
 echo $miTime;

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>