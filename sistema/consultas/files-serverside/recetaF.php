<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idPac"], "int", $horizonte);
	$idC = sqlValue($_POST["idConsul"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT nombre_p, apaterno_p, amaterno_p, fNac_p, sexo_p, calle_p, entidadFederativa_p, municipio_p, colonia_p, cp_p, curp_p from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $fx = $row[3];
	$idEstadoP = sqlValue($row[7], "int", $horizonte); $idMunicipioP = sqlValue($row[8], "int", $horizonte); $idColoniaP = sqlValue($row[9], "int", $horizonte);
	
	//para el sexo
	switch($row[4]){
		case 1: $row[4] = "FEMENINO"; break;
		case 2: $row[4] = "MASCULINO"; break;
		case 3: $row[4] = "AMBIGUO"; break;
		case 4: $row[4] = "NO APLICA"; break;
		case 99: $row[4] = "SIN ASIGNACIÓN"; break;
	} $sexo = $row[4];
	
	mysqli_select_db($horizonte, $database_horizonte); 
 $resultEP = mysqli_query($horizonte, "SELECT d_estado from mexico where id_mx = $idEstadoP limit 1") or die (mysqli_error($horizonte));
 $rowEP = mysqli_fetch_row($resultEP);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultMP = mysqli_query($horizonte, "SELECT d_municipio from mexico where id_mx = $idMunicipioP limit 1") or die (mysqli_error($horizonte));
 $rowMP = mysqli_fetch_row($resultMP);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultCP = mysqli_query($horizonte, "SELECT d_asenta from mexico where id_mx = $idColoniaP limit 1") or die (mysqli_error($horizonte));
 $rowCP = mysqli_fetch_row($resultCP);
 
 if($rowP[4]!='' and $rowCP[0]!='' and $rowMP[0]!='' and $rowEP[0]!=''){
	 $direccionP = 'CALLE '.$rowP[4].' #'.$rowP[5].' COLONIA '.$rowCP[0].', '.$rowMP[0].', '.$rowEP[0];
 }else{$direccionP = '';}
	
	//para la edad
	$fecha1 = new DateTime($fx); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);

	$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
	if($anos>0){$fx=$anos." AÑOS";}
	if($anos<1){
		if($meses<=2 and $meses>=1){$fx=$meses." MES(ES) ".$dias." DÍA(S)";}
		if($meses>=3){$fx=$meses." MES(ES) ";}
		if($meses==0){$fx=$dias." DÍA(S)";}
		if($meses==0 and $dias<=1){$fx=$dias." DÍA(S) ".$horas." HORA(S)";}
		if($meses==0 and $dias<1){$fx=$horas." HORA(S) ".$minutos." MINUTO(S)";}
	} 
	if($anos>150 or $anos<0){$fx="DESCONOCIDA";}else{}
	
	mysqli_select_db($horizonte, $database_horizonte);
	$resultC = mysqli_query($horizonte, "SELECT no_temp_vc, DATE_FORMAT(fechaEdo3_e, '%e'), DATE_FORMAT(fechaEdo3_e, '%c'), DATE_FORMAT(fechaEdo3_e, '%Y'), usuarioEdo3_e, DATE_FORMAT(fechaEdo3_e, '%H'), DATE_FORMAT(fechaEdo3_e, '%i'), DATE_FORMAT(fechaEdo3_e, '%s'), id_signosv_vc, id_sucursal_vc from venta_conceptos where id_vc = $idC limit 1") or die (mysqli_error($horizonte));
 	$rowC = mysqli_fetch_row($resultC); $idSVC1 = sqlValue($rowC[8], "int", $horizonte); $idDR = sqlValue($rowC[4], "int", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT fc_sv, fr_sv, concat(t_sv, '/', a_sv), temperatura_sv, peso_sv, talla_sv, imc_sv, cintura_sv, notas_sv, DATE_FORMAT(fecha_sv,'%d/%c/%Y %H:%i:%s') from signos_vitales where id_sv = $idSVC1 ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
	$noTC = sqlValue($rowC[0], "text", $horizonte);
	
	switch($rowC[2]){
	 case 1:
	 	$rowC[2]='ENERO';
	 break;
	 case 2:
	 	$rowC[2]='FEBRERO';
	 break;
	 case 3:
	 	$rowC[2]='MARZO';
	 break;
	 case 4:
	 	$rowC[2]='ABRIL';
	 break;
	 case 5:
	 	$rowC[2]='MAYO';
	 break;
	 case 6:
	 	$rowC[2]='JUNIO';
	 break;
	 case 7:
	 	$rowC[2]='JULIO';
	 break;
	 case 8:
	 	$rowC[2]='AGOSTO';
	 break;
	 case 9:
	 	$rowC[2]='SEPTIEMBRE';
	 break;
	 case 10:
	 	$rowC[2]='OCTUBRE';
	 break;
	 case 11:
	 	$rowC[2]='NOVIEMBRE';
	 break;
	 case 12:
	 	$rowC[2]='DICIEMBRE';
	 break;
 }
 $miFecha = $rowC[1]." DE ".$rowC[2]." DEL ".$rowC[3]." A LAS ".$rowC[5].":".$rowC[6].' HORAS';//.":".$rowC[7];
	
	mysqli_select_db($horizonte, $database_horizonte);
	$resultC1 = mysqli_query($horizonte, "SELECT nota_interpretacion, referencia_vc, nota_radiologo_vc from venta_conceptos where id_vc = $idC limit 1") or die (mysqli_error($horizonte));
 	$rowC1 = mysqli_fetch_row($resultC1);
	
	$nombre = $row[0].' '.$row[1].' '.$row[2];
	
	mysqli_select_db($horizonte, $database_horizonte);
	$resultAl = mysqli_query($horizonte, "SELECT alergia1_hc, alergia2_hc, alergia3_hc, alergia4_hc, alergia5_hc, alergia6_hc from historia_clinica where id_paciente_hc = $idP ") or die (mysqli_error($horizonte));
 	$rowAl = mysqli_fetch_row($resultAl);
	
	if($rowAl[0]!=''){$aler = $rowAl[0];}
	if($rowAl[1]!=''){$aler = $aler.','.$rowAl[1];}
	if($rowAl[2]!=''){$aler = $aler.','.$rowAl[2];}
	if($rowAl[3]!=''){$aler = $aler.','.$rowAl[3];}
	if($rowAl[4]!=''){$aler = $aler.','.$rowAl[4];}
	if($rowAl[5]!=''){$aler = $aler.','.$rowAl[5];}
	if($rowAl[0]=='' and $rowAl[1]=='' and $rowAl[2]=='' and $rowAl[3]=='' and $rowAl[4]=='' and $rowAl[5]==''){$alergias='NINGUNA';}
	else{
		if($aler[0]==','){$alergias = substr($aler, 1);}else{$alergias = $aler;}
	}
	
	mysqli_select_db($horizonte, $database_horizonte); 
 $resultU = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, sexo_u, cedulaProfesional_u, especialidad_u, cedulaProfesionalE_u, titulo_u, firma_u, temporal_u from usuarios where id_u = $idDR limit 1") or die (mysqli_error($horizonte));
 $rowU = mysqli_fetch_row($resultU); $idEspecialidad = sqlValue($rowU[5], "int", $horizonte); $tempU = sqlValue($rowU[9], "text", $horizonte);
 
 if($rowU[8]==1){
	 mysqli_select_db($horizonte, $database_horizonte); 
 	$resultDo = mysqli_query($horizonte, "SELECT ext_do from documentos where nombre_do = $tempU and que_es_do = 'FIRMA' and tipo_quien_do = 3") or die (mysqli_error($horizonte));
 	$rowDo = mysqli_fetch_row($resultDo);
 }
 
 mysqli_select_db($horizonte, $database_horizonte); //Membrete encabezado nota Evo
 $resultMNE = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where id_quien_do = $rowC[9] and que_es_do = 'MEMBRETE RECETA MEDICA' and tipo_quien_do = 2 and nombre_do = 'ENCABEZADO'") or die (mysqli_error($horizonte));
 $rowMNE = mysqli_fetch_row($resultMNE);
 
 mysqli_select_db($horizonte, $database_horizonte); //Membrete pie nota Evo
 $resultMNP = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where id_quien_do = $rowC[9] and que_es_do = 'MEMBRETE RECETA MEDICA' and tipo_quien_do = 2 and nombre_do = 'PIE'") or die (mysqli_error($horizonte));
 $rowMNP = mysqli_fetch_row($resultMNP);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultEsp = mysqli_query($horizonte, "SELECT nombre_especialidad from especialidades where id_es = $idEspecialidad limit 1") or die (mysqli_error($horizonte));
 $rowEsp = mysqli_fetch_row($resultEsp);
 
 if($rowEsp[0]!='' and $rowEsp[0]!='GENERAL'){ 
 	$doctorcito = $rowU[7].' '.$rowU[0]." ".$rowU[1]." ".$rowU[2]." <br>";
 	$especialidadDR = $rowEsp[0].' CÉDULA DE ESPECIALIDAD '.$rowU[6]; 
 }else{
	 $doctorcito = $rowU[7].' '.$rowU[0]." ".$rowU[1]." ".$rowU[2]." <span class='ocultoX1'><br>CÉDULA PROFESIONAL ".$rowU[4]."</span>";
	 $especialidadDR = '';
 }
 
 //
 $aleatorio = $noTC;
	$lista = "<table width='100%' height='' align='left' border='0' cellspacing='0' cellpadding='3'>"; $k = 0;
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT id_med_mr, indicacion_mr, id_mr from medicamentos_receta where no_temp_mr = $aleatorio") or die (mysqli_error($horizonte)); 
	
	while ( $row = mysqli_fetch_row($result) ){
		$k++;
		mysqli_select_db($horizonte, $database_horizonte); 
 		$resultEP = mysqli_query($horizonte, "SELECT nombre_generico_med, cantidad_med, presentaciones_med, via_administracion_dosis_med from medicamentos where id_med = $row[0]") or die (mysqli_error($horizonte));
 		$rowEP = mysqli_fetch_row($resultEP);
		
		$lista = $lista."<tr><td align='left'>$k.- <span style='text-decoration:underline;'>$rowEP[0]</span> $rowEP[1] $rowEP[2]</td></tr><tr><td>$row[1]</td></tr>";

	} 
	
	$lista = $lista."</table>";
 //
	
	$datos = $nombre.';*}-{'.$fx.';*}-{'.$sexo.';*}-{'.$direccionP.';*}-{'.$rowC1[1].';*}-{'.$miFecha.';*}-{'.$row1[0].';*}-{'.$row1[1].';*}-{'.$row1[2].';*}-{'.$row1[3].';*}-{'.$row1[4].';*}-{'.$row1[5].';*}-{'.$row1[6].';*}-{'.$lista/*$rowC1[0]*/.';*}-{'.$alergias.';*}-{'.$doctorcito.';*}-{'.$especialidadDR.';*}-{'.$rowC1[2].';*}-{'.$rowU[8].';*}-{'.$rowU[9].';*}-{'.$rowDo[0].';*}-{'.$rowMNE[0].';*}-{'.$rowMNE[1].';*}-{'.$rowMNE[2].';*}-{'.$rowMNP[0].';*}-{'.$rowMNP[1].';*}-{'.$rowMNP[2].';*}-{'.$rowC[9];
	
	echo $datos;
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>