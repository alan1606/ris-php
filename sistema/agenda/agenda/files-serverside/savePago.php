<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");
//Generales
 $noRef = sqlValue($_POST["ref"], "text", $horizonte);
 $user = sqlValue($_POST["user"], "int", $horizonte);
 $pago = sqlValue($_POST["pago"], "double", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 	//Vamos a guardar los pagos de cada uno de los conceptos de la tabla de venta de conceptos, un pago por cada concepto ok.
	//Empezamos por FARMACIA
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaF="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where referencia_vc like '".$_POST['ref']."' and departamento_vc = 3";
	$queryF = mysqli_query($horizonte, $consultaF) or die (mysqli_error($horizonte));
	$miPago = $_POST["pago"]; //echo 'mi pago inicial es '.$miPago.'.';
	
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
		$noTemp = sqlValue($filaF['no_temp_vc'], "text", $horizonte);
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
		
		$sqlF = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $user, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
	
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarF = mysqli_query($horizonte, $sqlF) or die (mysqli_error($horizonte));
		if (!$insertarF){ echo $sqlF;} else {} 
		
	};//fin de Farmacia
	
	//Hospital
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaH="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where referencia_vc like '".$_POST['ref']."' and departamento_vc = 5";
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
		$noTemp = sqlValue($filaH['no_temp_vc'], "text", $horizonte);
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
		
		$sqlH = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $user, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
	
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarH = mysqli_query($horizonte, $sqlH) or die (mysqli_error($horizonte));
		if (!$insertarH){ echo $sqlH;} else {} 
	
	};//Fin de Hospital
	
	//Seguimos con el departamento de Laboratorio
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaL="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where referencia_vc like '".$_POST['ref']."' and departamento_vc = 1";
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
		$noTemp = sqlValue($filaL['no_temp_vc'], "text", $horizonte);
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
		
		$sqlL = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $user, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
	
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarL = mysqli_query($horizonte, $sqlL) or die (mysqli_error($horizonte));
		if (!$insertarL){ echo $sqlL;} else {} 
	
	};//Fin de Laboratorio
	
	//Seguimos con el departamento de Imagen
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaI="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where referencia_vc like '".$_POST['ref']."' and departamento_vc = 2";
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
		$noTemp = sqlValue($filaI['no_temp_vc'], "text", $horizonte);
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
		
		$sqlI = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $user, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
	
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarI = mysqli_query($horizonte, $sqlI) or die (mysqli_error($horizonte));
		if (!$insertarI){ echo $sqlI;} else {} 
	
	};//Fin de Imagen
	
	//Seguimos con el departamento de Endoscopía
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaE="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where referencia_vc like '".$_POST['ref']."' and departamento_vc = 15";
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
		$noTemp = sqlValue($filaE['no_temp_vc'], "text", $horizonte);
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
		
		$sqlE = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $user, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
	
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarE = mysqli_query($horizonte, $sqlE) or die (mysqli_error($horizonte));
		if (!$insertarE){ echo $sqlE;} else {} 
	
	};//Fin de Endoscopía
	
	//Seguimos con el departamento de Translados
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaT="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where referencia_vc like '".$_POST['ref']."' and departamento_vc = 6";
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
		$noTemp = sqlValue($filaT['no_temp_vc'], "text", $horizonte);
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
		
		$sqlT = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $user, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
	
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarT = mysqli_query($horizonte, $sqlT) or die (mysqli_error($horizonte));
		if (!$insertarT){ echo $sqlT;} else {} 
	
	};//Fin de Translados
	
	//Seguimos con el departamento de Honorarios Médicos
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaM="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where referencia_vc like '".$_POST['ref']."' and departamento_vc = 4";
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
		$noTemp = sqlValue($filaM['no_temp_vc'], "text", $horizonte);
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
		
		$sqlM = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $user, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
	
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarM = mysqli_query($horizonte, $sqlM) or die (mysqli_error($horizonte));
		if (!$insertarM){ echo $sqlM;} else {} 
	
	};//Fin de Honorarios Médicos
	
	//Seguimos con los demás departamentos
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaO="SELECT id_vc, id_convenio_vc, precio_normal_vc,  departamento_vc, area_vc, id_sucursal_vc, tipo_concepto_vc, id_personal_medico_vc, id_paciente_vc, no_temp_vc, referencia_vc from venta_conceptos where referencia_vc like '".$_POST['ref']."' and departamento_vc NOT IN (3,4,5,1,2,15,6,4)";
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
		$noTemp = sqlValue($filaO['no_temp_vc'], "text", $horizonte);
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
		
		$sqlO = "INSERT INTO pagos_ov(id_vc_pag,id_convenio_pag,total_vc_pag,saldo_vc_pag,pago_pag,id_departamento_pag,id_area_pag,usuario_pag,fecha_pag,referencia_pag,sucursal_pag,tipo_concepto_pag,id_personal_medico_pag,id_paciente_pag,no_temp_pag) VALUES ($idF, $idConvenio, $precioConcepto, $miSaldoC, $totalPago, $idDepartamentoC, $idAreaC, $user, $now, ".$noRef.", $idSucursalC, $idTipoC, $idPersonalMedicoC, $idPacienteC, $noTemp) ";
	
		mysqli_select_db($horizonte, $database_horizonte);
		$insertarO = mysqli_query($horizonte, $sqlO) or die (mysqli_error($horizonte));
		if (!$insertarO){ echo $sqlO;} else {} 
		if($cuantosO<=0){//Terminamos
			//echo 'aqui';
		}
	};//Fin de los demás departamentos
	
	$pa = $_POST["pago"]; 
	mysqli_select_db($horizonte, $database_horizonte);
	$sqlPK = "update orden_venta set abonado_ov = abonado_ov + $pa, saldo_ov = saldo_ov - $pa where referencia_ov = $noRef ";
	$insertarPK = mysqli_query($horizonte, $sqlPK) or die(mysqli_error($horizonte));
	
	echo 1;

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>