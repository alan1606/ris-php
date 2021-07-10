<?php
require("../../Connections/horizonte.php");
require("../../Connections/ipacs.php");
require("../../funciones/php/values.php");

 	$idE = sqlValue($_POST["idE"], "int", $horizonte); $idU = sqlValue($_POST["idU"], "int", $horizonte);
	if(isset($_GET["idP"])){$idP = sqlValue($_GET["idP"], "int", $horizonte);}else{$idP = 0;}

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT v.referencia_vc, v.interpretacion_vc, v.nota_interpretacion, date_format(v.fecha_venta_vc,'%d/%c/%Y'), v.id_paciente_vc, v.id_personal_medico_vc, v.id_concepto_es, v.usuarioEdo5_e, v.contador_vc, c.id_area_to, v.nota_radiologo_vc, v.usuarioEdo5_e, DATE_FORMAT(v.fecha_venta_vc,'%Y%m%d'), v.usuarioEdo5_e, v.observaciones_vc, v.id_anesteciologo_vc, o.sucursal_ov, DATE_FORMAT(v.fecha_venta_vc,'%Y%n%d'), o.sucursal_ov, v.birad_vc, s.nombre_su, s.id_su, concat(s.id_su,'.',s.id_su) from venta_conceptos v left join orden_venta o on o.referencia_ov = v.referencia_vc left join conceptos c on c.id_to = v.id_concepto_es left join sucursales s on s.id_su = o.sucursal_ov where v.id_vc = $idE ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);  $id_sucursal = sqlValue($row[16], "int", $horizonte);
	
	$refOV = sqlValue($row[0], "text", $horizonte); 
	$idAnes = sqlValue($row[15], "int", $horizonte);
	
	$claveE = sqlValue($row[6], "int", $horizonte);
 	$ref = sqlValue($row[0], "text", $horizonte);
 	$idUautoriza = sqlValue($row[7], "int", $horizonte);
 	$idUmedico = sqlValue($row[5], "int", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$resultO = mysqli_query($horizonte, "SELECT observaciones_i_ov from orden_venta where referencia_ov = $refOV ") or die (mysqli_error($horizonte));
 	$rowO = mysqli_fetch_row($resultO);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT p.fNac_p, p.sexo_p, concat(p.nombre_p, ' ', p.apaterno_p), p.amaterno_p, date_format(p.fNac_p,'%d/%c/%Y'), s.cat_sexo from pacientes p left join catalogo_sexos s on s.id_sexo = p.sexo_p where p.id_p = $row[4] ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
	$result2 = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, titulo_u, idSucursal_u, cedulaProfesional_u, id_u, sexo_u, firma_u, temporal_u from usuarios where id_u = $row[5] ") or die (mysqli_error($horizonte));
 	$row2 = mysqli_fetch_row($result2);
	
	if($row2[0]=='A' and $row2[1] == 'QUIEN'){ $miMedico =$row2[0]." ".$row2[1]." ".$row2[2];}
	else{$miMedico = $row2[3]." ".$row2[0]." ".$row2[1]." ".$row2[2];}
	
	$result3 = mysqli_query($horizonte, "SELECT concepto_to, id_area_to from conceptos where id_to = $row[6] ") or die (mysqli_error($horizonte));
 	$row3 = mysqli_fetch_row($result3);
	$areaE = sqlValue($row3[1], "int", $horizonte);
	
	$idUi = sqlValue($row[7], "int", $horizonte);
	$result4 = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, cedulaProfesional_u, id_u, sexo_u, titulo_u, firma_u, temporal_u from usuarios where id_u = $idUi ") or die (mysqli_error($horizonte));
 	$row4 = mysqli_fetch_row($result4); $tempU = sqlValue($row4[8], "text", $horizonte);
	$medicoAutoriza = $row4[6]." ".$row4[0]." ".$row4[1]." ".$row4[2]; $tempU = sqlValue($row4[8], "text", $horizonte);
	
	$resultFt = mysqli_query($horizonte, "SELECT count(id_do) from documentos where aleatorio_do = $tempU and firma_do = 1 ") or die (mysqli_error($horizonte));
 	$rowFt = mysqli_fetch_row($resultFt);
	
	if($rowFt[0]>0){
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultDo = mysqli_query($horizonte, "SELECT ext_do, id_do from documentos where aleatorio_do = $tempU and firma_do = 1 limit 1") or die (mysqli_error($horizonte));
		$rowDo = mysqli_fetch_row($resultDo);
		$myFirma = '<img src="usuarios/documentos/files/'.$rowDo[1].'.'.$rowDo[0].'" height="100" width="" style=" border-style:none;">';
	 }else{$myFirma = '';}
	
	if($rowFt[0]>1){
		mysqli_select_db($horizonte, $database_horizonte); 
 		$resultDo = mysqli_query($horizonte, "SELECT ext_do from documentos where aleatorio_do = $tempU and firma_do = 1") or die (mysqli_error($horizonte));
 		$rowDo = mysqli_fetch_row($resultDo);
 	}
	 
	 mysqli_select_db($horizonte, $database_horizonte); //Membrete encabezado
	 $resultMNE = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where id_quien_do = $row[16] and que_es_do = 'MEMBRETE RESULTADOS ENDOSCOPIA' and tipo_quien_do = 2 and nombre_do = 'ENCABEZADO'") or die (mysqli_error($horizonte));
	 $rowMNE = mysqli_fetch_row($resultMNE);
	 
	 mysqli_select_db($horizonte, $database_horizonte); //Membrete pie
	 $resultMNP = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where id_quien_do = $row[16] and que_es_do = 'MEMBRETE RESULTADOS ENDOSCOPIA' and tipo_quien_do = 2 and nombre_do = 'PIE'") or die (mysqli_error($horizonte));
	 $rowMNP = mysqli_fetch_row($resultMNP);
	 
	//para la edad
	$fecha1 = new DateTime($row1[0]);
	$fecha2 = new DateTime(date("Y-m-d H:i:s"));
	$fecha = $fecha1->diff($fecha2);
	//printf('%d AÑOS %d MESES %d DÍAS %d HORAS %d MINUTOS', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
	$anos=$fecha->y;
	$meses=$fecha->m;
	$dias=$fecha->d;
	$horas=$fecha->h;
	$minutos=$fecha->i;
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
	case 1:
		$row1[1] = "FEMENINO";
		break;
	case 2:
		$row1[1] = "MASCULINO";
		break;
	case 3:
		$row1[1] = "AMBIGUO";
		break;
	case 4:
		$row1[1] = "NO APLICA";
		break;
	case 99:
		$row1[1] = "SIN ASIGNACIÓN";
		break;
	}
	
	$nombre = $row1[2].' '.$row1[3];
	$medicoEstudio = "DR. ".$row2[0]." ".$row2[1]." ".$row2[2];
	$medicoInterpreta = $row4[0]." ".$row4[1]." ".$row4[2];
	
	$now1 = $row[12];
	if($now1<20151008){ if($row[9] != 55){ $referenciaPacs = $row[0]; } else{ $referenciaPacs = $row[0]."-".$row[8]; } }
	else{ if($row[9] == 55){ $referenciaPacs = $row[0]; } else{ $referenciaPacs = $row[0]."-".$row[8]; } }
	
	$referenciaPacs = substr($referenciaPacs, 2);
	$referenciaPacs = str_replace("-","",$referenciaPacs);
	
	$idPP = sqlValue($referenciaPacs, "text", $horizonte);
	
	//Seleccionamos el id del paciente en la tabla patient de la DB del ipacs
	mysqli_select_db($ipacs, $database_ipacs);
	$resultP1 = mysqli_query($ipacs, "SELECT pk from patient where pat_id = $idPP ") or die (mysqli_error($ipacs));
 	$rowP1 = mysqli_fetch_row($resultP1); $idPP1 = sqlValue($rowP1[0], "int", $horizonte);//Is id de patient $idPP
	
	//Seleccionamos el número de imágenes en el estudio completo de la DB del ipacs
	mysqli_select_db($ipacs, $database_ipacs);
	$resultNI = mysqli_query($ipacs, "SELECT num_instances from study where patient_fk = $idPP1 ") or die (mysqli_error($ipacs));
 	$rowNI = mysqli_fetch_row($resultNI); $ni = sqlValue($rowNI[0], "int", $horizonte);
	
	$i = 0; $j=0;
	$lista = '';
	
	//Seleccionamos el study_iuid de la tabla de study del ipacs para pasarlo al osirix
	mysqli_select_db($ipacs, $database_ipacs);
	$consulta = "SELECT i.sop_iuid as mi, s.series_iuid as ms, e.study_iuid as me from instance i left join series s on s.pk = i.series_fk left join study e on e.pk = s.study_fk left join patient p on p.pk = e.patient_fk where p.pk = $idPP1";
	$query = mysqli_query($ipacs, $consulta) or die (mysqli_error($ipacs));
	
	mysqli_select_db($horizonte, $database_horizonte);  
	$resultW = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, titulo_u from usuarios where id_u = $idAnes limit 1 ") or die (mysqli_error($horizonte));
 	$rowW = mysqli_fetch_row($resultW);
	
	$anestesiologo = $rowW[3].' '.$rowW[0].' '.$rowW[1].' '.$rowW[2];
	
	//ahoritititita
	$tabla = '<table id="p_contenido4" width="100%" border="0" cellspacing="3" cellpadding="0" style="width:100%;"> <tr> <td class="encaH" width="50%" style="font-size:9pt;">PACIENTE: '.$row1[2].' '.$row1[3].'</td> <td class="encaH" nowrap style="font-size:9pt;">EDAD: '.$row1[0].' SEXO: '.$row1[5].' </td>  </tr> <tr> <td class="myMedicoP" style="font-size:9pt;">'.$miMedico.'</td> <td nowrap style="font-size:9pt;">FECHA '.$row[3].'</td>  </tr> <tr> <td align="left" style="font-weight:bold; font-size:9pt;" nowrap>'.$row3[0].'</td> <td nowrap style="font-size:9pt;">REFERENCIA: '.$row[0].' </td> </tr> </table>';
	
	$tabla2 = '<table id="p_contenido2" width="100%" border="0" cellspacing="3" cellpadding="0"><tr><td colspan="2" height="40" valign="top">&nbsp;</td></tr> <tr> <td width="400" height="100" valign="top"></td> <td id="firmaDR" align="center" height="110"> '.$myFirma.' </td> </tr> <tr> <td>&nbsp;</td> <td nowrap align="center">'.$medicoAutoriza.'</td> </tr> <tr> <td nowrap></td> <td nowrap align="center"><span class="puestoDR"></span> CEDULA PROFESIONAL '.$row4[3].'</td> </tr> </table>';
	
	if($rowMNE[0] > 0 and $rowMNP[0] > 0){
		$xME='../../../sucursales/membretes/files/'.$rowMNE[1].'.'.$rowMNE[2];
		$xMP='../../../sucursales/membretes/files/'.$rowMNP[1].'.'.$rowMNP[2];
	} else{ $xME=''; $xMP=''; }
			
	$tabla = sqlValue($tabla, "text", $horizonte); $tabla2 = sqlValue($tabla2, "text", $horizonte);
	$encaR = sqlValue($xME, "text", $horizonte); $pieR = sqlValue($xMP, "text", $horizonte);
	mysqli_select_db($horizonte, $database_horizonte);
	$sqlX = "UPDATE usuarios SET variable_temporal1_u = $tabla, variable_temporal2_u = $tabla2, variable_temporal3_u = $encaR, variable_temporal4_u = $pieR where id_u = $idU limit 1";
	$updateX = mysqli_query($horizonte, $sqlX) or die (mysqli_error($horizonte)); //echo $sqlX;
	//ahoritititita
	
	$result4a = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, cedulaProfesional_u, id_u, sexo_u, titulo_u, firma_u, temporal_u from usuarios where id_u = $idU ") or die (mysqli_error($horizonte));
 	$row4a = mysqli_fetch_row($result4a); $tempUa = sqlValue($row4a[8], "text", $horizonte); //echo $row4[7];
	$medicoAutorizaa = $row4a[6]." ".$row4a[0]." ".$row4a[1]." ".$row4a[2]; $tempUa = sqlValue($row4a[8], "text", $horizonte);
	
	$resultFt = mysqli_query($horizonte, "SELECT count(id_do) from documentos where aleatorio_do = $tempUa and firma_do = 1 ") or die (mysqli_error($horizonte));
 	$rowFt = mysqli_fetch_row($resultFt);
	
	if($rowFt[0]>0){
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultDoa = mysqli_query($horizonte, "SELECT ext_do, id_do from documentos where aleatorio_do = $tempUa and firma_do = 1 limit 1") or die (mysqli_error($horizonte));
		$rowDoa = mysqli_fetch_row($resultDoa);
		$myFirmaa = '<img src="usuarios/documentos/files/'.$rowDoa[1].'.'.$rowDoa[0].'" height="90" width="" style=" border-style:none;">';
	 }else{$myFirmaa = '';}
	
	$tabla = '
	<table id="p_contenido" width="100%" border="0" cellspacing="3" cellpadding="0" style="width:100%;"> 
   	  <tr class="mceNonEditable"> 
        <td class="encaH" width="50%" style="font-size:9pt;">PACIENTE: '.$row1[2].' '.$row1[3].'</td> 
        <td class="encaH" nowrap style="font-size:9pt;">EDAD: '.$row1[0].' SEXO: '.$row1[5].' </td> 
      </tr> 
      <tr class="mceNonEditable"> 
        <td class="myMedicoP" style="font-size:9pt;">'.$miMedico.'</td> 
        <td nowrap style="font-size:9pt;">FECHA '.$row[3].'</td> 
      </tr> 
      <tr class="mceNonEditable"> 
        <td align="left" style="font-weight:bold; font-size:9pt;" nowrap>'.$row3[0].'</td> 
        <td nowrap style="font-size:9pt;">REFERENCIA: '.$row[0].' </td> 
      </tr>';
	  if(!isset($_POST['nova'])){
		  $tabla = $tabla.'<tr class="tNova">
			<td nowrap style="font-size:9pt;">DX DE ENVÍO: <span style="font-weight:bold;">'.$rowO[0].'</span> </td>
			<td nowrap class="mceNonEditable" style="font-size:9pt;">ANESTESIÓLOGO: '.$anestesiologo.' </td>
		  </tr>';
	  }
	  //<strong>Técnica:</strong><br><br><br><strong>Hallazgos:</strong>
	  //<tr> <td class="" valign="top" colspan="2" style="padding-top:3pt; border-bottom:1px solid black; padding-bottom:5pt;" id="misDXEI" align="justify"><strong>Diagnósticos:</strong><br><br></td> </tr>
	  $tabla = $tabla.'
      <tr> <td id="misDXEI" valign="top" colspan="2" style="border-top:1px solid black; padding-top:3pt; border-bottom:1px solid black; padding-bottom:5pt;" align="justify"><br>Escriba la interpretación aquí... <br> <br> <br></td> </tr>
      
      <tr> 
            <td id="firmaDR" align="center" height="90" colspan="2" style="padding-left:150pt;"><br><br> '.$myFirmaa.' </td> 
        </tr> 
        <tr> 
            <td nowrap align="center" colspan="2" style="padding-left:150pt; font-size:9pt;">'.$medicoAutorizaa.'</td> 
        </tr> 
        <tr> 
            <td nowrap align="center" colspan="2" style="padding-left:150pt; font-size:9pt;"><span class="puestoDR"></span> CEDULA PROFESIONAL '.$row4a[3].'</td> 
        </tr> 
    </table>
	';

	mysqli_select_db($horizonte, $database_horizonte); 
	$resultR2 = mysqli_query($horizonte, "SELECT formato from conceptos where id_to = $claveE", $horizonte);
	$rowR2 = mysqli_fetch_row($resultR2);

	if($rowR2[0]==''){
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultR = mysqli_query($horizonte, "SELECT formato_im_su from sucursales where id_su = $id_sucursal", $horizonte);
		$rowR = mysqli_fetch_row($resultR);

		if($rowR[0]==''){
			//Entonces checamos si hay un formato desde la configuración principal
			mysqli_select_db($horizonte, $database_horizonte); 
			$resultR1 = mysqli_query($horizonte, "SELECT formato_im_cf from configuracion order by id_cf desc limit 1", $horizonte);
			$rowR1 = mysqli_fetch_row($resultR1);

			if($rowR[0]==''){
				$tabla = '
					<table id="p_contenido" width="100%" border="0" cellspacing="3" cellpadding="0" style="width:100%;"> 
					  <tr class="mceNonEditable1" style="font-size:10pt;">
						<td width="20%" nowrap height="" valign="bottom"> <span style="text-decoration:underline;">PACIENTE:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
						<td class="encaH" width="" align="left" valign="bottom">'.$row1[2].' '.$row1[3].'</td> 
					  </tr> 
					  <tr class="mceNonEditable1" style="font-size:10pt;"> 
						<td style="text-decoration:underline;">MED/TRAT.:</td> <td class="myMedicoP" align="left">'.$miMedico.'</td> 
					  </tr> 
					  <tr class="mceNonEditable1" style="font-size:10pt;">
						<td style="text-decoration:underline;" nowrap>DX. ENVÍO:</td> <td align="left" nowrap>EN ESTUDIO</td> 
					  </tr>
					  <tr class="mceNonEditable1" style="font-size:10pt;">
						<td style="text-decoration:underline;" nowrap>F E C H A:</td> <td class="" colspan="2" align="left">'.$row[3].'</td> 
					  </tr> 
					  <tr> <td id="misDXEI" valign="top" height="670" colspan="2" style="padding-top:3pt; padding-bottom:5pt; font-size:10pt;" align="justyfi"></td> </tr>
					  <tr> <td id="firmaDR" align="center" height="80" colspan="2" style=""><br><br> '.$myFirma.' </td> </tr> 
					  <tr> <td nowrap align="center" colspan="2" style="font-size:10pt;">'.$medicoAutoriza.'</td> </tr> 
					  <tr> <td nowrap align="center" colspan="2" style="font-size:10pt;">MEDICO RADIÓLOGO</td> </tr> 
					</table>
				';
			}else{//Hay formato de configuración
				$tabla = $rowR1[0];
			}
		}else{//Hay formato de la sucursal
			$tabla = $rowR[0];
		} 
	}else{//Hay formato individual del estudio
		$tabla = $rowR2[0];
	}
	
	if(!$updateX){ echo $sqlX; }
 	else{
		$datos = $nombre.';*-'.$row[0].';*-'.$row1[0].';*-'.$row1[1].";*-".$row[3].";*-".$row[1].";*-".$row[2].";*-".$medicoEstudio.";*-".$row3[0].";*-".$medicoInterpreta.";*-".$row4[3].";*-".$row[7].".png".";*-".$referenciaPacs.";*-".$row[10].";*-".$row1[4].";*-".$row4[5].";*-".$ni.";*-".$lista.';*-'.$rowO[0].';*-'.$anestesiologo.';*-'.$row4[6].';*-'.$row4[7].';*-'.$row4[8].';*-'.$rowDo[0].';*-'.$rowMNE[0].';*-'.$rowMNE[1].';*-'.$rowMNE[2].';*-'.$rowMNP[0].';*-'.$rowMNP[1].';*-'.$rowMNP[2].';*-'.$row[16].';*-'.$tabla;
	}
	
echo $datos;
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
 mysqli_close($ipacs);
?>