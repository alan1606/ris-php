<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");
	
//Generales
 $noTemp = sqlValue($_POST["noTemp"], "text", $horizonte);
 $sucursal = sqlValue($_POST["sucursal"], "int", $horizonte);
 $idPaciente = sqlValue($_POST["idPaciente"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuario"], "int", $horizonte);
//Consulta
 $subtotalC = sqlValue($_POST["subtotalC"], "double", $horizonte);
 $totalC = sqlValue($_POST["totalC"], "double", $horizonte);
 $motivoC = sqlValue($_POST["motivoC"], "text", $horizonte);
 $adicionalesC = sqlValue($_POST["cargoAC"], "double", $horizonte);
 $medicoC = sqlValue($_POST["medicoC"], "int", $horizonte);
//Estudios Imagen
 $subtotalI = sqlValue($_POST["subtotalI"], "double", $horizonte);
 $totalI = sqlValue($_POST["totalI"], "double", $horizonte);
 $observacionesI = sqlValue($_POST["observacionesI"], "text", $horizonte);
 $adicionalesI = sqlValue($_POST["cargoAI"], "double", $horizonte);
 $medicoI = sqlValue($_POST["medicoI"], "int", $horizonte);
//Estudios Laboratorio
 $subtotalL = sqlValue($_POST["subtotalL"], "double", $horizonte);
 $totalL = sqlValue($_POST["totalL"], "double", $horizonte);
 $observacionesL = sqlValue($_POST["observacionesL"], "text", $horizonte);
 $adicionalesL = sqlValue($_POST["cargoAL"], "double", $horizonte);
 $medicoL = sqlValue($_POST["medicoL"], "int", $horizonte);
//Estudios Endoscopía
 $subtotalE = sqlValue($_POST["subtotalE"], "double", $horizonte);
 $totalE = sqlValue($_POST["totalE"], "double", $horizonte);
 $observacionesE = sqlValue($_POST["observacionesE"], "text", $horizonte);
 $adicionalesE = sqlValue($_POST["cargoAE"], "double", $horizonte);
 $medicoE = sqlValue($_POST["medicoE"], "int", $horizonte);
//Servicios
 $subtotalS = sqlValue($_POST["subtotalS"], "double", $horizonte);
 $totalS = sqlValue($_POST["totalS"], "double", $horizonte);
 $observacionesS = sqlValue($_POST["observacionesS"], "text", $horizonte);
 $adicionalesS = sqlValue($_POST["cargoAS"], "double", $horizonte);
 $medicoS = sqlValue($_POST["medicoS"], "int", $horizonte);
//TOTALES
 $subtotal = sqlValue($_POST["subtotal"], "double", $horizonte);
 $iva = sqlValue($_POST["iva"], "double", $horizonte);
 $totalPagar = sqlValue($_POST["totalPagar"], "double", $horizonte);
 $suPago = sqlValue($_POST["suPago"], "double", $horizonte); if($suPago == NULL){$suPago = 0;}
 $formaPago = sqlValue($_POST["formaPago"], "int", $horizonte);
//otros
 $facturada = sqlValue($_POST["facturada"], "int", $horizonte);
 $noCheque = sqlValue($_POST["noCheque"], "text", $horizonte);
 
 if($_POST["suPago"]<$_POST["totalPagar"]){ $estatus_pago = 0; $saldo=$_POST["totalPagar"]-$_POST["suPago"];}else{$estatus_pago = 1; $saldo=0;}
 
 $ingresoT=$totalPagar;
 
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 //script para dar obtener el Número de Referencia
 $fecha1="'".date('Y-m-d')." 00:00:00"."'";
 $fecha2="'".date('Y-m-d')." 23:59:59"."'";
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultR = mysqli_query($horizonte, "SELECT count(id_ov) from orden_venta where fecha_venta_ov between ".$fecha1." and ".$fecha2." ") or die(mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR);
 
 $noRef=0;
 $da=date('Ymd');
 if ($rowR[0]==0){ $noRef=$da."-"."1"; $noRef="'".$noRef."'"; }else{ $daa=$rowR[0]+1; $noRef=$da."-".$daa; $noRef="'".$noRef."'"; }

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO orden_venta (no_temp_ov, sucursal_ov, id_paciente_ov, usuario_ov, total_c, motivo_c_ov, total_ei, observaciones_i_ov, total_el, observaciones_l_ov, total_s, observaciones_s_ov, adicionales_ei_ov, adicionales_el_ov, adicionales_s_ov, gran_total_ov, abonado_ov, saldo_ov, fecha_venta_ov, referencia_ov, total_ee, adicionales_c_ov, adicionales_ee_ov, observaciones_e_ov, sub_total_c, sub_total_i, sub_total_l, sub_total_e, sub_total_s, medico_c_ov, medico_ei_ov, medico_el_ov, medico_ee_ov, personal_s_ov, estado_pago_ov, facturada_ov, forma_pago_ov, no_cheque_ov, subtotal_ov,iva_ov) ";
$sql.= "VALUES ($noTemp, $sucursal, $idPaciente, $idUsuario, $totalC, $motivoC, $totalI, $observacionesI, $totalL, $observacionesL, $totalS, $observacionesS, $adicionalesI, $adicionalesL, $adicionalesS, $totalPagar, $suPago, $saldo, $now, ".$noRef.", $totalE, $adicionalesC, $adicionalesE, $observacionesE, $subtotalC, $subtotalI, $subtotalL, $subtotalE, $subtotalS, $medicoC, $medicoI, $medicoL, $medicoE, $medicoS, $estatus_pago, $facturada, $formaPago, $noCheque,$subtotal,$iva)";
$insertar = mysqli_query($horizonte, $sql) or die(mysqli_error($horizonte));

mysqli_select_db($horizonte, $database_horizonte);
$resultRH=mysqli_query($horizonte, "SELECT count(id_hc) from historia_clinica where id_paciente_hc=$idPaciente",$horizonte) or die(mysqli_error($horizonte));
$rowRH = mysqli_fetch_row($resultRH);
if($rowRH[0]==0){ 
	mysqli_select_db($horizonte, $database_horizonte); 
	$sqlH="INSERT INTO historia_clinica(id_paciente_hc,id_usuario_hc,fecha_registro_hc) VALUES ($idPaciente, $idUsuario, $now)"; 
	$insertH = mysqli_query($horizonte, $sqlH) or die (mysqli_error($horizonte)); 
}
	
if (!$insertar){ echo $sql;}
else {
	//GUARDAMOS UN CONCEPTO EN VENTA_CONCEPTOS PARA CADA CARGO ADICIONAL, CON SU RESPECTIVO DEPARTAMENTO. y uno para el IVA en CONTA
	mysqli_select_db($horizonte, $database_horizonte);
 	$sqlV = "INSERT INTO venta_conceptos (id_personal_medico_vc, precio_normal_vc,id_convenio_vc,total_vc,id_paciente_vc,id_usuario_vc,fecha_venta_vc,departamento_vc,area_vc,id_concepto_es,id_sucursal_vc,tipo_concepto_vc,no_temp_vc,id_conceptos_beneficios) ";
	$sqlV.= "VALUES 
	(0,$adicionalesC,1,$adicionalesC,$idPaciente,$idUsuario,$now,4,83,19,$sucursal,6,$noTemp,0), 
	(0,$adicionalesI,1,$adicionalesI,$idPaciente,$idUsuario,$now,2,80,20,$sucursal,6,$noTemp,0), 
	(0,$adicionalesL,1,$adicionalesL,$idPaciente,$idUsuario,$now,1,81,21,$sucursal,6,$noTemp,0), 
	(0,$adicionalesS,1,$adicionalesS,$idPaciente,$idUsuario,$now,4,83,19,$sucursal,6,$noTemp,0), 
	(0,$iva,1,$iva,$idPaciente,$idUsuario,$now,8,8,24,$sucursal,7,$noTemp,0)";
	$insertarV = mysqli_query($horizonte, $sqlV) or die(mysqli_error($horizonte));
	//(0,$adicionalesE,1,$adicionalesE,$idPaciente,$idUsuario,$now,15,82,22,$sucursal,6,$noTemp,0), 
	//FIN GUARDAMOS UN CONCEPTO EN VENTA_CONCEPTOS Y UN PAGO EN PAGOS PARA CADA CARGO ADICIONAL, CON SU RESPECTIVO DEPARTAMENTO
	
	mysqli_select_db($horizonte, $database_horizonte);
 	$resultR4 = mysqli_query($horizonte, "SELECT referencia_ov from orden_venta order by id_ov desc limit 1 ") or die(mysqli_error($horizonte));
 	$rowR4 = mysqli_fetch_row($resultR4);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$sqlCx = "update venta_conceptos set motivo_visita_vc = $motivoC where tipo_concepto_vc = 1 and no_temp_vc = $noTemp";
	$insertarCx = mysqli_query($horizonte, $sqlCx) or die(mysqli_error($horizonte));
 
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta = "SELECT id_vc, id_conceptos_beneficios from venta_conceptos where no_temp_vc = $noTemp";
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
	
	$c = 0;
	while ($fila = mysqli_fetch_array($query)) { $c++;
		$id = $fila['id_vc'];  $idCB = $fila['id_conceptos_beneficios'];
		$refi = "-".$c; 
		$referencia = sqlValue($rowR4[0], "text").sqlValue($refi, "text", $horizonte);
		$referencia = sqlValue(str_replace("'","",$referencia), "text", $horizonte);$referenciaOV = sqlValue($rowR4[0], "text", $horizonte);
		$sql = "UPDATE venta_conceptos SET temporal_vc = 0, referencia_vc = $referenciaOV, contador_vc = $c where id_vc = $id ";
		//Ahora actualizamos la fecha de usado del concepto del beneficio dle paciente
		$sqlCB = "UPDATE conceptos_beneficios SET usado_cb = 1, fecha_usado_cb = $now where id_cb = $idCB limit 1";
 
 		mysqli_select_db($horizonte, $database_horizonte);
 		$insertar = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		
		mysqli_select_db($horizonte, $database_horizonte);
 		$insertarCB = mysqli_query($horizonte, $sqlCB) or die (mysqli_error($horizonte));
	};
	
	//Vamos a guardar los pagos de cada uno de los conceptos de la tabla de venta de conceptos, un pago por cada concepto ok.
	//Empezamos por FARMACIA
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaF="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where no_temp_vc like '".$_POST['noTemp']."' and departamento_vc = 3";
	$queryF = mysqli_query($horizonte, $consultaF) or die (mysqli_error($horizonte));
	$miPago = $_POST["suPago"]; //echo 'mi pago inicial es '.$miPago.'.';
	
	while ($filaF = mysqli_fetch_array($queryF)){ 
		$idF = $filaF['id_vc'];
		$idConvenio = $filaF['id_convenio_vc'];
		$precioConcepto = $filaF['precio_normal_vc'];
		$idDepartamentoC = $filaF['departamento_vc'];
		$idAreaC = $filaF['area_vc'];
		$idSucursalC = $filaF['id_sucursal_vc'];
		$idTipoC = $filaF['tipo_concepto_vc'];
		$idPersonalMedicoC = $filaF['id_personal_medico_vc'];
		$idPacienteC = $filaF['id_paciente_vc'];
		$noTemporalC = $filaF['no_temp_vc'];
		$referenciaC = $filaF['referencia_vc'];
		if($miPago<=$precioConcepto){
			$totalPago = $miPago;
			$miPago = 0;
			$miSaldoC = $precioConcepto - $totalPago;
		}else{
			$totalPago = $precioConcepto;
			$miPago = $miPago - $precioConcepto;
			$miSaldoC = $precioConcepto - $totalPago;
		}
		
		$sqlF = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $idUsuario, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
 
 		mysqli_select_db($horizonte, $database_horizonte);
 		$insertarF = mysqli_query($horizonte, $sqlF) or die (mysqli_error($horizonte));
		if (!$insertarF){ echo $sqlF;} else {} 
		
	};//fin de Farmacia
	
	//Hospital
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaH="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where no_temp_vc like '".$_POST['noTemp']."' and departamento_vc = 5";
	$queryH = mysqli_query($horizonte, $consultaH) or die (mysqli_error($horizonte)); //$miPago = $_POST["suPago"];
	
	while ($filaH = mysqli_fetch_array($queryH)){
		$idF = $filaH['id_vc'];
		$idConvenio = $filaH['id_convenio_vc'];
		$precioConcepto = $filaH['precio_normal_vc'];
		$idDepartamentoC = $filaH['departamento_vc'];
		$idAreaC = $filaH['area_vc'];
		$idSucursalC = $filaH['id_sucursal_vc'];
		$idTipoC = $filaF['tipo_concepto_vc'];
		$idPersonalMedicoC = $filaH['id_personal_medico_vc'];
		$idPacienteC = $filaH['id_paciente_vc'];
		$noTemporalC = $filaH['no_temp_vc'];
		$referenciaC = $filaH['referencia_vc'];
		if($miPago<=$precioConcepto){
			$totalPago = $miPago;
			$miPago = 0;
			$miSaldoC = $precioConcepto - $totalPago;
		}else{
			$totalPago = $precioConcepto;
			$miPago = $miPago - $precioConcepto;
			$miSaldoC = $precioConcepto - $totalPago;
		}
		
		$sqlH = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $idUsuario, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
 
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarH = mysqli_query($horizonte, $sqlH) or die (mysqli_error($horizonte));
		if (!$insertarH){ echo $sqlH;} else {} 

	};//Fin de Hospital
	
	//Seguimos con el departamento de Laboratorio
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaL="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where no_temp_vc like '".$_POST['noTemp']."' and departamento_vc = 1";
	$queryL = mysqli_query($horizonte, $consultaL) or die (mysqli_error($horizonte)); //$miPago = $_POST["suPago"];
	
	while ($filaL = mysqli_fetch_array($queryL)){
		$idF = $filaL['id_vc'];
		$idConvenio = $filaL['id_convenio_vc'];
		$precioConcepto = $filaL['precio_normal_vc'];
		$idDepartamentoC = $filaL['departamento_vc'];
		$idAreaC = $filaL['area_vc'];
		$idSucursalC = $filaL['id_sucursal_vc'];
		$idTipoC = $filaL['tipo_concepto_vc'];
		$idPersonalMedicoC = $filaL['id_personal_medico_vc'];
		$idPacienteC = $filaL['id_paciente_vc'];
		$noTemporalC = $filaL['no_temp_vc'];
		$referenciaC = $filaL['referencia_vc'];
		if($miPago<=$precioConcepto){
			$totalPago = $miPago;
			$miPago = 0;
			$miSaldoC = $precioConcepto - $totalPago;
		}else{
			$totalPago = $precioConcepto;
			$miPago = $miPago - $precioConcepto;
			$miSaldoC = $precioConcepto - $totalPago;
		}
		
		$sqlL = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $idUsuario, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
 
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarL = mysqli_query($horizonte, $sqlL) or die (mysqli_error($horizonte));
		if (!$insertarL){ echo $sqlL;} else {} 

	};//Fin de Laboratorio
	
	//Seguimos con el departamento de Imagen
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaI="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where no_temp_vc like '".$_POST['noTemp']."' and departamento_vc = 2";
	$queryI = mysqli_query($horizonte, $consultaI) or die (mysqli_error($horizonte)); //$miPago = $_POST["suPago"];
	
	while ($filaI = mysqli_fetch_array($queryI)){
		$idF = $filaI['id_vc'];
		$idConvenio = $filaI['id_convenio_vc'];
		$precioConcepto = $filaI['precio_normal_vc'];
		$idDepartamentoC = $filaI['departamento_vc'];
		$idAreaC = $filaI['area_vc'];
		$idSucursalC = $filaI['id_sucursal_vc'];
		$idTipoC = $filaI['tipo_concepto_vc'];
		$idPersonalMedicoC = $filaI['id_personal_medico_vc'];
		$idPacienteC = $filaI['id_paciente_vc'];
		$noTemporalC = $filaI['no_temp_vc'];
		$referenciaC = $filaI['referencia_vc'];
		
		if($miPago<=$precioConcepto){
			$totalPago = $miPago;
			$miPago = 0;
			$miSaldoC = $precioConcepto - $totalPago; //echo 'mi pago '.$miPago.' es menor igual a '.$precioConcepto;
		}else{//echo 'mi pago '.$miPago.' es mayor a '.$precioConcepto;
			$totalPago = $precioConcepto;
			$miPago = $miPago - $precioConcepto;
			$miSaldoC = $precioConcepto - $totalPago;
		}
		
		$sqlI = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $idUsuario, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
 
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarI = mysqli_query($horizonte, $sqlI) or die (mysqli_error($horizonte));
		if (!$insertarI){ echo $sqlI;} else {} 

	};//Fin de Imagen
	
	/*Seguimos con el departamento de Endoscopía
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaE="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where no_temp_vc like '".$_POST['noTemp']."' and departamento_vc = 15";
	$queryE = mysqli_query($horizonte, $consultaE) or die (mysqli_error($horizonte)); //$miPago = $_POST["suPago"];
	
	while ($filaE = mysqli_fetch_array($queryE)){
		$idF = $filaE['id_vc'];
		$idConvenio = $filaE['id_convenio_vc'];
		$precioConcepto = $filaE['precio_normal_vc'];
		$idDepartamentoC = $filaE['departamento_vc'];
		$idAreaC = $filaE['area_vc'];
		$idSucursalC = $filaE['id_sucursal_vc'];
		$idTipoC = $filaE['tipo_concepto_vc'];
		$idPersonalMedicoC = $filaE['id_personal_medico_vc'];
		$idPacienteC = $filaE['id_paciente_vc'];
		$noTemporalC = $filaE['no_temp_vc'];
		$referenciaC = $filaE['referencia_vc'];
		if($miPago<=$precioConcepto){
			$totalPago = $miPago;
			$miPago = 0;
			$miSaldoC = $precioConcepto - $totalPago;
		}else{
			$totalPago = $precioConcepto;
			$miPago = $miPago - $precioConcepto;
			$miSaldoC = $precioConcepto - $totalPago;
		}
		
		$sqlE = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $idUsuario, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
 
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarE = mysqli_query($horizonte, $sqlE) or die (mysqli_error($horizonte));
		if (!$insertarE){ echo $sqlE;} else {} 

	};//Fin de Endoscopía */
	
	//Seguimos con el departamento de Translados
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaT="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where no_temp_vc like '".$_POST['noTemp']."' and departamento_vc = 6";
	$queryT = mysqli_query($horizonte, $consultaT) or die (mysqli_error($horizonte)); //$miPago = $_POST["suPago"];
	
	while ($filaT = mysqli_fetch_array($queryT)){
		$idF = $filaT['id_vc'];
		$idConvenio = $filaT['id_convenio_vc'];
		$precioConcepto = $filaT['precio_normal_vc'];
		$idDepartamentoC = $filaT['departamento_vc'];
		$idAreaC = $filaT['area_vc'];
		$idSucursalC = $filaT['id_sucursal_vc'];
		$idTipoC = $filaT['tipo_concepto_vc'];
		$idPersonalMedicoC = $filaT['id_personal_medico_vc'];
		$idPacienteC = $filaT['id_paciente_vc'];
		$noTemporalC = $filaT['no_temp_vc'];
		$referenciaC = $filaT['referencia_vc'];
		if($miPago<=$precioConcepto){
			$totalPago = $miPago;
			$miPago = 0;
			$miSaldoC = $precioConcepto - $totalPago;
		}else{
			$totalPago = $precioConcepto;
			$miPago = $miPago - $precioConcepto;
			$miSaldoC = $precioConcepto - $totalPago;
		}
		
		$sqlT = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $idUsuario, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
 
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarT = mysqli_query($horizonte, $sqlT) or die (mysqli_error($horizonte));
		if (!$insertarT){ echo $sqlT;} else {} 

	};//Fin de Translados
	
	//Seguimos con el departamento de Honorarios Médicos
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaM="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where no_temp_vc like '".$_POST['noTemp']."' and departamento_vc = 4";
	$queryM = mysqli_query($horizonte, $consultaM) or die (mysqli_error($horizonte));
	//$miPago = $_POST["suPago"];
	
	while ($filaM = mysqli_fetch_array($queryM)){
		$idF = $filaM['id_vc'];
		$idConvenio = $filaM['id_convenio_vc'];
		$precioConcepto = $filaM['precio_normal_vc'];
		$idDepartamentoC = $filaM['departamento_vc'];
		$idAreaC = $filaM['area_vc'];
		$idSucursalC = $filaM['id_sucursal_vc'];
		$idTipoC = $filaM['tipo_concepto_vc'];
		$idPersonalMedicoC = $filaM['id_personal_medico_vc'];
		$idPacienteC = $filaM['id_paciente_vc'];
		$noTemporalC = $filaM['no_temp_vc'];
		$referenciaC = $filaM['referencia_vc'];
		if($miPago<=$precioConcepto){
			$totalPago = $miPago;
			$miPago = 0;
			$miSaldoC = $precioConcepto - $totalPago;
		}else{
			$totalPago = $precioConcepto;
			$miPago = $miPago - $precioConcepto;
			$miSaldoC = $precioConcepto - $totalPago;
		}
		
		$sqlM = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $idUsuario, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
 
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarM = mysqli_query($horizonte, $sqlM) or die (mysqli_error($horizonte));
		if (!$insertarM){ echo $sqlM;} else {} 

	};//Fin de Honorarios Médicos
	
	//Seguimos con los demás departamentos
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaO="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where no_temp_vc like '".$_POST['noTemp']."' and departamento_vc NOT IN (3,4,5,1,2,6,4)";//,15
	$queryO = mysqli_query($horizonte, $consultaO) or die (mysqli_error($horizonte));
	//$miPago = $_POST["suPago"];
	
	while ($filaO = mysqli_fetch_array($queryO)){
		$idF = $filaO['id_vc'];
		$idConvenio = $filaO['id_convenio_vc'];
		$precioConcepto = $filaO['precio_normal_vc'];
		$idDepartamentoC = $filaO['departamento_vc'];
		$idAreaC = $filaO['area_vc'];
		$idSucursalC = $filaO['id_sucursal_vc'];
		$idTipoC = $filaO['tipo_concepto_vc'];
		$idPersonalMedicoC = $filaO['id_personal_medico_vc'];
		$idPacienteC = $filaO['id_paciente_vc'];
		$noTemporalC = $filaO['no_temp_vc'];
		$referenciaC = $filaO['referencia_vc'];
		if($miPago<=$precioConcepto){
			$totalPago = $miPago;
			$miPago = 0;
			$miSaldoC = $precioConcepto - $totalPago;
		}else{
			$totalPago = $precioConcepto;
			$miPago = $miPago - $precioConcepto;
			$miSaldoC = $precioConcepto - $totalPago;
		}
		
		$sqlO = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $idUsuario, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
 
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarO = mysqli_query($horizonte, $sqlO) or die (mysqli_error($horizonte));
		if (!$insertarO){ echo $sqlO;} else {} 
		if($cuantosO<=0){//Terminamos
			//echo 'aqui';
		}
	};//Fin de los demás departamentos
	
	//para el correo de facturación
	mysqli_select_db($horizonte, $database_horizonte); 
 	$resultDF = mysqli_query($horizonte, "
	
		SELECT p.nombre_p, p.apaterno_p, p.amaterno_p, p.rfc_f_p, p.razon_social_p, p.calle_pf, p.noExt_pf, p.noInt_pf, p.digitos_banco_p, p.email_p, mEs.d_estado, mMun.d_municipio, mCol.d_asenta, mCol.d_codigo, b.nombrecito_b, fp.forma_pago_fp from orden_venta ov left join pacientes p on p.id_p = ov.id_paciente_ov left join mexico mEs on mEs.id_mx = p.entidadFederativa_pf left join mexico mMun on mMun.id_mx = p.municipio_pf left join mexico mCol on mCol.id_mx = p.colonia_pf left join catalogo_bancos b on b.id_b = p.id_banco_p left join catalogo_forma_pago fp on fp.id_fp = ov.forma_pago_ov where ov.referencia_ov = ".$noRef." 
		
		") or die (mysqli_error($horizonte));
 	$rowDF = mysqli_fetch_row($resultDF);
	
	echo 1;
}
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>