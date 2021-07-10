<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

if (isset($_POST['fechaEntrega'])){
list( $dia, $mes, $ano ) = explode( "/", $_POST['fechaEntrega'] );
$raya = "-";
$f_ent = $ano.$raya.$mes.$raya.$dia." ".$_POST['horaEntrega'].":00";
$_POST['fechaEntrega']= $f_ent;
}

$now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

$contador = sqlValue($_POST["contador"], "int", $horizonte);
 $indice_p = sqlValue($_POST["indice_p"], "text", $horizonte);
 $claveE = sqlValue($_POST["claveE"], "text", $horizonte);
 $cSucursal = sqlValue($_POST["cSucursal"], "text", $horizonte);
 $precioE = sqlValue($_POST["precioE"], "double", $horizonte);
 $numAleatorio = sqlValue($_POST["numAleatorio"], "int", $horizonte);
 $descuentoEstudios = sqlValue($_POST["descuentoEstudios"], "int", $horizonte);
 $idPaciente = sqlValue($_POST["idPaciente"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuario"], "text", $horizonte);
 $claveMedicoE = sqlValue($_POST["claveMedicoE"], "text", $horizonte);
 $observacionesEstudios = sqlValue($_POST["observacionesEstudios"], "text", $horizonte);
 $fechaEntrega = sqlValue($_POST["fechaEntrega"], "date", $horizonte);
 $tUrgente = sqlValue($_POST["tUrgente"], "double", $horizonte);
 $tTomaDom = sqlValue($_POST["tTomaDom"], "double", $horizonte);
 $tEntregaDom = sqlValue($_POST["tEntregaDom"], "double", $horizonte);
 $urgencia = sqlValue($_POST["urgencia"], "int", $horizonte);
 $descuentoGral = sqlValue($_POST["descuentoGral"], "int", $horizonte);
 $NoEstudios = sqlValue($_POST["NoEstudios"], "int", $horizonte);
 $notaDescuentoE = sqlValue($_POST["notaDescuentoE"], "text", $horizonte);
 $notaDescuentoGralE = sqlValue($_POST["notaDescuentoGralE"], "text", $horizonte);
 $pago_pagX = sqlValue($_POST["pago_pag"], "double", $horizonte);//para el historial de pagos
 $miPago = $_POST["pago_pag"];
 $tipoConcepto = sqlValue($_POST["tipoConcepto"], "int", $horizonte);
 
 $a=$_POST["precioE"];
 $b=$_POST["descuentoEstudios"];
 $c=($a*$b)/100;
 $NoEstudios=$_POST["NoEstudios"];
 $d=($_POST["tUrgente"]+$_POST["tTomaDom"]+$_POST["tEntregaDom"])/$NoEstudios;
 $e=$a-$c+$d;
 $f=$_POST["descuentoGral"];
 $g=($e*$f)/100;
 $t=$e-$g;
 $tUrgente=$_POST["tUrgente"]/$NoEstudios;
 $tTomaDom = $_POST["tTomaDom"]/$NoEstudios;
 $tEntregaDom = $_POST["tEntregaDom"]/$NoEstudios;
 $tExtras=$tUrgente+$tTomaDom+$tEntregaDom;
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultx = mysqli_query($horizonte, "SELECT area_est, depto_est FROM estudios where clave_est = $claveE ") or die (mysqli_error($horizonte));
 $rowx = mysqli_fetch_row($resultx);
 $area = sqlValue($rowx[0], "int", $horizonte);
 $departamento = sqlValue($rowx[1], "int", $horizonte);
  
 $convenio = sqlValue($_POST["convenio"], "int", $horizonte);
 
 //script para dar obtener el Número de Referencia
 $fecha1="'".date('Y-m-d')." 00:00:00"."'";
 $fecha2="'".date('Y-m-d')." 23:59:59"."'";
 mysqli_select_db($horizonte, $database_horizonte);
 $resultR = mysqli_query($horizonte, "SELECT count(id_ov) from orden_venta where fecha_venta_ov between ".$fecha1." and ".$fecha2." ") or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR);
 $noRef=0;
 $da=date('Ymd');
 if ($rowR[0]==0){
	 	$noRef=$da."-"."1";
		$noRef="'".$noRef."'";
	 }else{
	 	$daa=$rowR[0];
	 	$noRef=$da."-".$daa;
		$noRef="'".$noRef."'";
	}
 
 $comisionP = 0;
 $ingreso = $t;
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO venta_conceptos (indice_paciente_vc, clave_concepto_es, descuento_vc, precio_vc, id_paciente_vc, usuario_vc, clave_personal_medico_vc, fecha_venta_vc, departamento_vc, fecha_entrega_e, t_urgente_vc, t_toma_domicilio_e, t_entrega_domicilio_e, area_vc, urgente_vc, descuento_general_vc, descuento_descuento_vc, descuento_descuento_general_vc, total_vc, tExtras_es, no_conceptos_es, referencia_vc, clave_sucursal_vc, comision_personal_vc, ingreso_clinica_vc, nota_descuento_vc, nota_descuento_general_vc, tipo_concepto_vc, contador_vc, convenio_vc) ";

 $sql.= "VALUES ($indice_p, ".$claveE.", ".$descuentoEstudios.", ".$precioE.", ".$idPaciente.", ".$idUsuario.", ".$claveMedicoE.", $now, $departamento, ".$fechaEntrega.", ".$tUrgente.", ".$tTomaDom.", ".$tEntregaDom.", $area, ".$urgencia.", ".$descuentoGral.", ".$c.", ".$g.", ".$t.", ".$tExtras.", ".$NoEstudios.", ".$noRef.", ".$cSucursal.", ".$comisionP.", ".$t.", ".$notaDescuentoE.", ".$notaDescuentoGralE.", ".$tipoConcepto.", $contador, $convenio)";

$insertar = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

//se tiene que hacer una consulta a la tabla de pagos para ver el último registro con el número de orden tal, para sacar algunos datos como el total que es constante, y el saldo viejo que se le resta el nuevo pago para hacer un nuevo saldo:
mysqli_select_db($horizonte, $database_horizonte);
$resultP = mysqli_query($horizonte, "SELECT total_pag, saldo_pag FROM pagos_ov where referencia_pag = ".$noRef." order by fecha_pag desc limit 1") or die (mysqli_error($horizonte));
 $rowP = mysqli_fetch_row($resultP);
 $oldTotal = "'".$rowP[0]."'";
 $oldSaldo = $rowP[1];
 $newSaldo=0;
 $newSaldo=$oldSaldo-$miPago;

mysqli_select_db($horizonte, $database_horizonte);
$sql1 = "INSERT INTO pagos_ov (indice_paciente_pag, total_pag, saldo_pag, pago_pag, usuario_pag, fecha_pag, referencia_pag, clave_sucursal_pag, departamento_pag, area_pag, tipo_concepto_pag) ";
$sql1.= "VALUES (".$indice_p.", ".$oldTotal.", ".$newSaldo.", ".$miPago.", ".$idUsuario.", $now, ".$noRef.", ".$cSucursal.", $departamento, $area, ".$tipoConcepto.")";
	
if (!$insertar) {
 	echo $sql;
	//echo "false"; 
 }else {
	 mysqli_select_db($horizonte, $database_horizonte);
	 $insertar1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
	 if (!$insertar1) {echo $sql1;}
			else{echo "ok";}
 }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>