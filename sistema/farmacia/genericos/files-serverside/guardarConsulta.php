<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noTemp"], "text", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 $idMedico = sqlValue($_POST["idMedico"], "int", $horizonte);
 $precioCo = sqlValue($_POST["precioCo"], "double", $horizonte);
 $idConvenio = sqlValue($_POST["idConvenio"], "int", $horizonte);
 if($_POST["idConvenio"]==''){$idConvenio=0;}
 $total = sqlValue($_POST["total"], "double", $horizonte);
 $idDepartamento = 4;
  	mysqli_select_db($horizonte, $database_horizonte); 
	 $resultC1 = mysqli_query($horizonte, "SELECT id_to, id_departamento_to, id_area_to, precio_to from conceptos where id_to = $idC ") or die (mysqli_error($horizonte));
	 $rowC1 = mysqli_fetch_row($resultC1);
	 
 $idArea = sqlValue($rowC1[2], "int", $horizonte);
 $idSucursal = sqlValue($_POST["idSucursal"], "int", $horizonte);
 $motivo = sqlValue($_POST["motivo"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $id_con_bene = sqlValue($_POST["id_con_bene"], "int", $horizonte);
 
 //Checamos si la consulta de convenio no esta usada:
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultU = mysqli_query($horizonte, "SELECT usado_cb from conceptos_beneficios where id_cb = $id_con_bene") or die (mysqli_error($horizonte));
 $rowU = mysqli_fetch_row($resultU);
  
//Checamos si existe otra consulta con este número aleatorio:
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where no_temp_vc = $noTemp and tipo_concepto_vc = 1") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 	
 mysqli_select_db($horizonte, $database_horizonte); 
 if($rowC[0]>0){
 	$sql = "UPDATE venta_conceptos set id_personal_medico_vc = $idMedico, precio_normal_vc = $precioCo, id_convenio_vc = $idConvenio, total_vc = $total, area_vc = $idArea, id_sucursal_vc = $idSucursal, motivo_visita_vc = $motivo, fecha_venta_vc = $now, id_concepto_es = $idC, id_conceptos_beneficios = $id_con_bene where tipo_concepto_vc = 1 and no_temp_vc = $noTemp limit 1";
		
 }else{
 	$sql="INSERT INTO venta_conceptos (no_temp_vc,id_paciente_vc,id_usuario_vc,id_personal_medico_vc,precio_normal_vc,id_convenio_vc,total_vc,departamento_vc,area_vc,id_concepto_es,id_sucursal_vc,motivo_visita_vc,fecha_venta_vc,tipo_concepto_vc,usuarioEdo1_e,fechaEdo1_e, id_conceptos_beneficios)";
 	$sql.= "VALUES ($noTemp, $idP, $idU, $idMedico, $precioCo, $idConvenio, $total, 4, $idArea, $idC, $idSucursal, $motivo, $now, 1, $idU, $now, $id_con_bene)";
 }
  
  /*if($_POST["idConvenio"]==1){
  	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	if (!$update) { echo $sql; }else{  echo 1; }
  }else{
  	if($rowU[0]!=1){
		$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		if (!$update) { echo $sql; }else{  echo 1; }
	  }  
  }*/
  $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
  if (!$update) { echo $sql; }else{  echo 1; }
  
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>