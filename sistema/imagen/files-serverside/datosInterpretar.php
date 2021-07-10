<?php
require("../../Connections/horizonte.php");
require("../../Connections/ipacs_postgres.php");
require("../../funciones/php/values.php");

 if(isset($_POST["idU"])){$idU=sqlValue($_POST["idU"],"int", $horizonte);}else{$idU=0;}
 if(isset($_POST["idP"])){$idP=sqlValue($_POST["idP"],"int", $horizonte);}else{$idP=0;}

 $idE = sqlValue($_POST["idE"], "int", $horizonte);
 $host = $_POST["h"];
 $id_pacss = sqlValue($_POST["id_pacs"], "text", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT v.referencia_vc, v.interpretacion_vc, v.nota_interpretacion, date_format(v.fecha_venta_vc,'%d/%m/%Y'), v.id_paciente_vc, v.id_personal_medico_vc, v.id_concepto_es, v.usuarioEdo5_e, v.contador_vc, c.id_area_to, v.nota_radiologo_vc, v.usuarioEdo5_e, DATE_FORMAT(v.fecha_venta_vc,'%Y%m%d'), v.usuarioEdo5_e, DATE_FORMAT(v.fecha_venta_vc,'%Y%m%d'), o.sucursal_ov, v.birad_vc, s.nombre_su, s.id_su, concat(s.id_su,'.',s.id_su), v.id_pacs, DATE_FORMAT(v.fecha_venta_vc,'%Y-%m-%d') from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es left join orden_venta o on o.referencia_ov = v.referencia_vc left join sucursales s on s.id_su = o.sucursal_ov where v.id_vc = $idE ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

 $claveE = sqlValue($row[6], "int", $horizonte);
 $ref = sqlValue($row[0], "text", $horizonte);
 $idUautoriza = sqlValue($row[7], "int", $horizonte);
 $idUmedico = sqlValue($row[5], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte); //Membrete encabezado
 	$resultMNE = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where id_quien_do = $row[15] and que_es_do = 'MEMBRETE RESULTADOS IMAGENOLOGIA' and tipo_quien_do = 2 and nombre_do = 'ENCABEZADO'") or die (mysqli_error($horizonte));
 	$rowMNE = mysqli_fetch_row($resultMNE);

 	mysqli_select_db($horizonte, $database_horizonte); //Membrete pie
 	$resultMNP = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where id_quien_do = $row[15] and que_es_do = 'MEMBRETE RESULTADOS IMAGENOLOGIA' and tipo_quien_do = 2 and nombre_do = 'PIE'") or die (mysqli_error($horizonte));
 	$rowMNP = mysqli_fetch_row($resultMNP);

	//checamos si el estudio es una masto
	mysqli_select_db($horizonte, $database_horizonte);
	$resultMa = mysqli_query($horizonte, "SELECT count(id_to) from conceptos where concepto_to like '%MASTOGRAFIA%' and id_to = '$row[6]' ") or die (mysqli_error($horizonte));
	$rowMa = mysqli_fetch_row($resultMa);

	if($rowMa[0]==0){$row[16]='0';} //echo $row[16];

	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT p.fNac_p, p.sexo_p, concat(p.nombre_p, ' ', p.apaterno_p), p.amaterno_p, date_format(p.fNac_p,'%d/%c/%Y'), s.cat_sexo, p.email_p from pacientes p left join catalogo_sexos s on s.id_sexo = p.sexo_p where p.id_p = $row[4] ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);

	mysqli_select_db($horizonte, $database_horizonte);
	$result1x = mysqli_query($horizonte, "SELECT concepto_to, formato from conceptos where id_to = $row[6] ") or die (mysqli_error($horizonte));
 	$row1x = mysqli_fetch_row($result1x);

	mysqli_select_db($horizonte, $database_horizonte);
	$result2 = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, titulo_u, idSucursal_u, cedulaProfesional_u, id_u, sexo_u, firma_u, temporal_u, email_u from usuarios where id_u = $row[5] ") or die (mysqli_error($horizonte));
 	$row2 = mysqli_fetch_row($result2);

	if($row2[0]=='A' and $row2[1] == 'QUIEN'){ $miMedico =$row2[0]." ".$row2[1]." ".$row2[2];}
	else{$miMedico = "REFIRIÓ: ".$row2[3]." ".$row2[0]." ".$row2[1]." ".$row2[2];}

	mysqli_select_db($horizonte, $database_horizonte);
	$resultSu1 = mysqli_query($horizonte, "SELECT link_pacs_externo from configuracion order by id_cf desc limit 1 ") or die (mysqli_error($horizonte));
 	$rowSu1 = mysqli_fetch_row($resultSu1);

	$linkP = $rowSu1[0];

	mysqli_select_db($horizonte, $database_horizonte);
	$result3=mysqli_query($horizonte, "SELECT concepto_to, id_area_to from conceptos where id_to = $claveE") or die (mysqli_error($horizonte));
 	$row3 = mysqli_fetch_row($result3);
	$areaE = sqlValue($row3[1], "int", $horizonte);

	$idUi = sqlValue($row[11], "int", $horizonte);
	$result4 = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, cedulaProfesional_u, id_u, sexo_u, titulo_u, firma_u, temporal_u from usuarios where id_u = $idUi ") or die (mysqli_error($horizonte));
 	$row4 = mysqli_fetch_row($result4); $tempU = sqlValue($row4[8], "text", $horizonte); //echo $row4[7];
	$medicoAutoriza = $row4[6]." ".$row4[0]." ".$row4[1]." ".$row4[2]; $tempU = sqlValue($row4[8], "text", $horizonte);

	if($row4[7]==1){
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDo = mysqli_query($horizonte, "SELECT ext_do, id_do from documentos where nombre_do = $tempU and que_es_do = 'FIRMA' and tipo_quien_do = 3") or die (mysqli_error($horizonte));
		$rowDo = mysqli_fetch_row($resultDo);
		$myFirma = '<img src="../../../usuarios/firmas/files/'.$rowDo[1].'.'.$rowDo[0].'" height="100" width="" style=" border-style:none;">'; $ext_firma = $rowDo[0];
	 }else{$myFirma = ''; $ext_firma = "";}

	if($row4[7]==1){
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultDo = mysqli_query($horizonte, "SELECT ext_do from documentos where nombre_do = $tempU and que_es_do = 'FIRMA' and tipo_quien_do = 3") or die (mysqli_error($horizonte));
 		$rowDo = mysqli_fetch_row($resultDo); $ext_firma = $rowDo[0];
 	}else{$ext_firma = "";}

	//para la edad
	$fecha1 = new DateTime($row1[0]); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);
	//printf('%d AÑOS %d MESES %d DÍAS %d HORAS %d MINUTOS', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
	$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i;
	if($anos>0){$row1[0]=$anos." AÑOS";}
	if($anos<1){
		if($meses<=2 and $meses>=1){$row1[0]=$meses." MES(ES) ".$dias." DÍA(S)";}
		if($meses>=3){$row1[0]=$meses." MES(ES) ";}
		if($meses==0){$row1[0]=$dias." DÍA(S)";}
		if($meses==0 and $dias<=1){$row1[0]=$dias." DÍA(S) ".$horas." HORA(S)";}
		if($meses==0 and $dias<1){$row1[0]=$horas." HORA(S) ".$minutos." MINUTO(S)";}
	}
	if($anos>150 or $anos<0){$row1[0]="DESCONOCIDA";}
//para el sexo
	switch($row1[1]){
		case 1: $row1[1] = "FEMENINO"; break;
		case 2: $row1[1] = "MASCULINO"; break;
		case 3: $row1[1] = "AMBIGUO"; break;
		case 4: $row1[1] = "NO APLICA"; break;
		case 99: $row1[1] = "SIN ASIGNACIÓN"; break;
	}

	mysqli_select_db($horizonte, $database_horizonte);
	$result7 = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.referencia_vc = $ref and c.id_tipo_concepto_to = 3") or die (mysqli_error($horizonte));
	$row7 = mysqli_fetch_row($result7);

	mysqli_select_db($horizonte, $database_horizonte);
	$result8 = mysqli_query($horizonte, "SELECT min(v.contador_vc), max(v.contador_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.referencia_vc = $ref and c.id_tipo_concepto_to = 3") or die (mysqli_error($horizonte));
	$row8 = mysqli_fetch_row($result8);

	if($row8[0]>1){
		$razon = $row8[1] - $row8[0];
		$nome = $row2[7] - $razon;
	}else{$nome = $row2[7];}

	$nombre = $row1[2].' '.$row1[3];
	$medicoEstudio = $row2[3]." ".$row2[0]." ".$row2[1]." ".$row2[2];
	$medicoInterpreta = $row4[6]." ".$row4[0]." ".$row4[1]." ".$row4[2];

	$referenciaPacs = $row[20];

	$idPP = sqlValue($referenciaPacs, "text", $horizonte);
	//Seleccionamos el id del paciente en la tabla patient de la DB del ipacs
  $queryPc1 = "SELECT pk from study where id_pacs = $idPP ";//.$idPP;
  $resultPc1 = pg_query($ipacsp, $queryPc1) or die('La consulta fallo1: ' . pg_last_error());
  $rowP1 = pg_fetch_array($resultPc1, 0, PGSQL_NUM);

  $idPP1 = sqlValue($rowP1[0], "int", $horizonte);//Is id de patient $idPP

  $resultNI = "SELECT pk from study where id_pacs = $idPP";
  $resultNI = pg_query($ipacsp, $resultNI) or die('La consulta fallo2: ' . pg_last_error());
  $rowNI = pg_fetch_array($resultNI, 0, PGSQL_NUM);

  $ni = sqlValue($rowNI[0], "int", $horizonte);

	$i = 0; $j=0;
	$lista = '';

  $consulta = "SELECT i.sop_iuid as mi, s.series_iuid as ms, e.study_iuid as me, e.id_pacs from instance i left join series s on s.pk = i.series_fk left join study e on e.pk = s.study_fk where e.pk = $rowNI[0]";
  $consulta = pg_query($ipacsp, $consulta) or die('La consulta fallo3: ' . pg_last_error());
  $row_osi = pg_fetch_array($consulta, 0, PGSQL_NUM);

  $consultaIUID = "SELECT study_iuid from study where pk = $idPP1";
  $consultaIUID = pg_query($ipacsp, $consultaIUID) or die('La consulta fallo3: ' . pg_last_error());
  $rowIUID = pg_fetch_array($consultaIUID, 0, PGSQL_NUM);

		$link = 'weasis://%24dicom%3Aget%20-w%20%22http%3A%2F%2Fns1.diagnocons.com:8080%2Fweasis-pacs-connector%2Fmanifest%3FstudyUID%3D'.$rowIUID[0].'%22';
    $lista = '<a class="btn btn-primary btn-icon" href="'.$link.'"><i class="demo-psi-computer-secure icon-lg"></i></a>';

    // Para servidor en nube
    // $linki = '<a href="http://cuautlaenvivo.ddns.net:8080/weasis-pacs-connector/weasis?patientID='.$row_osi[3].'&studyUID='.$rowIUID[0].'" class="btn btn-info btn-sm">Visualizador avanzado</a>';
    // Para servidor en local
    $linki = '<a href="http://'.$_POST["link"].':8080/weasis-pacs-connector/weasis?patientID='.$row_osi[3].'&studyUID='.$rowIUID[0].'" class="btn btn-info btn-sm">Visualizador avanzado</a>';
	//};

	$tabla = '<div style=" width:100%; text-align:center; border:1px none red;" align="center"> <table id="p_contenido1" width="15cm" border="0" cellspacing="4" cellpadding="0"> <tr> <td width="360">PACIENTE: '.$row1[2].' '.$row1[3].'</td> <td nowrap>EDAD: '.$row1[0].' SEXO: '.$row1[1].' </td> </tr> <tr> <td class="myMedicoP">'.$miMedico.'</td> <td nowrap>FECHA '.$row[3].'</td> </tr> <tr> <td align="left" style="font-weight:bold;" nowrap>'.$row3[0].'</td> <td nowrap> REFERENCIA: '.$row[0].' </td> </tr> </table></div>';

	$tabla2 = '<table id="p_contenido2" width="100%" border="0" cellspacing="3" cellpadding="0"><tr><td colspan="2" height="40" valign="top">&nbsp;</td></tr> <tr> <td width="400" height="100" valign="top"></td> <td id="firmaDR" align="center" height="110"> '.$myFirma.' </td> </tr> <tr> <td>&nbsp;</td> <td nowrap align="center">'.$medicoAutoriza.'</td> </tr> <tr> <td nowrap></td> <td nowrap align="center"><span class="puestoDR"></span> CEDULA PROFESIONAL '.$row4[3].'</td> </tr> </table>';

	if($rowMNE[0] > 0 and $rowMNP[0] > 0){
		$xME='../../../sucursales/membretes/files/'.$rowMNE[1].'.'.$rowMNE[2];
		$xMP='../../../sucursales/membretes/files/'.$rowMNP[1].'.'.$rowMNP[2];
	} else{ $xME=''; $xMP=''; }

	$tabla = sqlValue($tabla, "text", $horizonte); $tabla2 = sqlValue($tabla2, "text", $horizonte);
	$encaR = sqlValue($xME, "text", $horizonte); $pieR = sqlValue($xMP, "text", $horizonte);
	mysqli_select_db($horizonte, $database_horizonte);
	$sqlX = "UPDATE usuarios SET variable_temporal1_u = $tabla, variable_temporal2_u = $tabla2, variable_temporal3_u = $encaR, variable_temporal4_u = $pieR where id_u = $idU limit 1";
	$updateX = mysqli_query($horizonte, $sqlX) or die (mysqli_error($horizonte));

	if(!$updateX){ echo $sqlX; }
 	else{
		echo $nombre.';*}-{'.$row[0].';*}-{'.$row1[0].';*}-{'.$row1[1].";*}-{".$row[3].";*}-{".$row[1].";*}-{".$row[2].";*}-{".$medicoEstudio.";*}-{".$row3[0].";*}-{".$medicoInterpreta.";*}-{".$row4[3].";*}-{".$row[7].".png".";*}-{".$referenciaPacs.";*}-{".$row[10].";*}-{".$row1[4].";*}-{".$row4[5].";*}-{".$ni.";*}-{".$lista.";*}-{".$row4[6].";*}-{".$linkP.";*}-{".$row1x[0].';*}-{'.$row[16].';*}-{'.$rowMa[0].';*}-{'.$row4[7].';*}-{'.$row4[8].';*}-{'.$ext_firma.';*}-{'.$rowMNE[0].';*}-{'.$rowMNE[1].';*}-{'.$rowMNE[2].';*}-{'.$rowMNP[0].';*}-{'.$rowMNP[1].';*}-{'.$rowMNP[2].';*}-{'.$row[15].';*}-{'.$row[21].';*}-{'.$rowIUID[0].';*}-{'.$linki.';*}-{'.$row1[6].';*}-{'.$row2[10];
	}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
 mysqli_close($ipacs);
?>
