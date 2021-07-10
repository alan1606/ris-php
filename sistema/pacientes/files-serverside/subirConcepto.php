<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $tipo_c = sqlValue($_POST["tipo_c"], "int", $horizonte);
 $id_c = sqlValue($_POST["id_c"], "int", $horizonte);
 $id_beneficio = sqlValue($_POST["id_beneficio"], "int", $horizonte);
 $id_p = sqlValue($_POST["id_p"], "int", $horizonte);
 $noTemp = sqlValue($_POST["aleatorio"], "text", $horizonte);
 $idU = sqlValue($_POST["id_u"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $id_medico = sqlValue($_POST["id_medico"], "int", $horizonte);
 $precio = sqlValue($_POST["precio"], "double", $horizonte);
 
 if($_POST["id_beneficio"]>0){
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $resultC1 = mysqli_query($horizonte, "SELECT id_cb from conceptos_beneficios where id_convenio_paciente_cb = $id_beneficio and id_concepto_convenio_cb = $id_c ") or die (mysqli_error($horizonte));
	 $rowC1 = mysqli_fetch_row($resultC1); $id_concepto_beneficio = $rowC1[0];
 }else{$id_concepto_beneficio = 0;}
   
//Checamos si existe otro concepto con este número aleatorio:
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where no_temp_vc = $noTemp and id_concepto_es = $id_c") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 	
 $sql = "DELETE from venta_conceptos where id_concepto_es = $id_c and no_temp_vc = $noTemp";
 //$sql_1 = "DELETE from venta_conceptos_1 where id_concepto_es = $id_c and no_temp_vc = $noTemp";//Para actualizar
 //$update_1 = mysqli_query($horizonte, $sql_1) or die (mysqli_error($horizonte));
  
  $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
  if (!$update) { echo $sql; }else{
  	$sql1="INSERT INTO venta_conceptos(no_temp_vc, id_paciente_vc, id_usuario_vc, id_convenio_vc, id_concepto_es, fecha_venta_vc, usuarioEdo1_e, fechaEdo1_e, id_conceptos_beneficios, id_personal_medico_vc, precio_vc) VALUES ($noTemp, $id_p, $idU, $id_beneficio, $id_c, $now, $idU, $now, $id_concepto_beneficio, $id_medico, $precio)";
	$update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
	if (!$update1) { echo $sql1; }else{
		echo 1;
		
		//$sql1_1="INSERT INTO venta_conceptos_1(no_temp_vc, id_paciente_vc, id_usuario_vc, id_convenio_vc, id_concepto_es, fecha_venta_vc, usuarioEdo1_e, fechaEdo1_e, id_conceptos_beneficios, id_personal_medico_vc, precio_vc) VALUES ($noTemp, $id_p, $idU, $id_beneficio, $id_c, $now, $idU, $now, $id_concepto_beneficio, $id_medico, $precio)";
		//$update1_1 = mysqli_query($horizonte, $sql1_1) or die (mysqli_error($horizonte));
	}
  }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>