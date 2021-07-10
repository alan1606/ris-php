<?php
require("../../Connections/horizonte.php");
require("../../Connections/ipacs.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["idE"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
  
	$result = mysqli_query($horizonte, "SELECT referencia_vc, interpretacion_vc, nota_interpretacion, date_format(fecha_venta_vc,'%d/%c/%Y'), id_paciente_vc, id_personal_medico_vc, id_concepto_es, usuarioEdo5_e, contador_vc, area_vc, nota_radiologo_vc, usuarioEdo5_e, DATE_FORMAT(fecha_venta_vc,'%Y%c%d'), usuarioEdo5_e, observaciones_vc, id_sucursal_vc from venta_conceptos where id_vc = $idE ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $refOV = sqlValue($row[0], "text", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
  
	$resultO = mysqli_query($horizonte, "SELECT observaciones_i_ov from orden_venta where referencia_ov = $refOV ") or die (mysqli_error($horizonte));
 	$rowO = mysqli_fetch_row($resultO);
	
	mysqli_select_db($horizonte, $database_horizonte);
  
	$result1 = mysqli_query($horizonte, "SELECT fNac_p, sexo_p, concat(nombre_p, ' ', apaterno_p), amaterno_p, date_format(fNac_p,'%d/%c/%Y') from pacientes where id_p = $row[4] ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
	$result2 = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, titulo_u from usuarios where id_u = $row[5] ") or die (mysqli_error($horizonte));
 	$row2 = mysqli_fetch_row($result2);
	
	$result3 = mysqli_query($horizonte, "SELECT concepto_to from conceptos where id_to = $row[6] ") or die (mysqli_error($horizonte));
 	$row3 = mysqli_fetch_row($result3);
	
	$idUi = sqlValue($row[7], "int", $horizonte);
	$result4 = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, cedulaProfesional_u, id_u, sexo_u, titulo_u, firma_u, temporal_u from usuarios where id_u = $idUi ") or die (mysqli_error($horizonte));
 	$row4 = mysqli_fetch_row($result4); $tempU = sqlValue($row4[8], "text", $horizonte);
	
	if($row4[7]==1){//echo $row4[7];
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultDo = mysqli_query($horizonte, "SELECT ext_do from documentos where nombre_do = $tempU and que_es_do = 'FIRMA' and tipo_quien_do = 3") or die (mysqli_error($horizonte));
		$rowDo = mysqli_fetch_row($resultDo);
	 }
	 
	 mysqli_select_db($horizonte, $database_horizonte); //Membrete encabezado nota Evo
	 $resultMNE = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where id_quien_do = $row[15] and que_es_do = 'MEMBRETE RESULTADOS ULTRASONIDO' and tipo_quien_do = 2 and nombre_do = 'ENCABEZADO'") or die (mysqli_error($horizonte));
	 $rowMNE = mysqli_fetch_row($resultMNE);
	 
	 mysqli_select_db($horizonte, $database_horizonte); //Membrete pie nota Evo
	 $resultMNP = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where id_quien_do = $row[15] and que_es_do = 'MEMBRETE RESULTADOS ULTRASONIDO' and tipo_quien_do = 2 and nombre_do = 'PIE'") or die (mysqli_error($horizonte));
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
	$medicoEstudio = 'DR. '.$row2[0]." ".$row2[1]." ".$row2[2];
	$medicoInterpreta = $row4[0]." ".$row4[1]." ".$row4[2];
	
	$now1 = $row[12];
	if($now1<20151008){ if($row[9] != 55){ $referenciaPacs = $row[0]; }else{ $referenciaPacs = $row[0]."-".$row[8]; }
	}else{ if($row[9] == 55){ $referenciaPacs = $row[0]; }else{ $referenciaPacs = $row[0]."-".$row[8]; } }
	
	$referenciaPacs = substr($referenciaPacs, 2);
	$referenciaPacs = str_replace("-","",$referenciaPacs);
	
	$idPP = sqlValue($referenciaPacs, "text", $horizonte);
	
	//Seleccionamos el id del paciente en la tabla patient de la DB del ipacs
	mysqli_select_db($ipacs, $database_ipacs);
  
	$resultP1 = mysqli_query($horizonte, "SELECT pk from patient where pat_id = $idPP ", $ipacs) or die (mysqli_error($horizonte));
 	$rowP1 = mysqli_fetch_row($resultP1); $idPP1 = sqlValue($rowP1[0], "int", $horizonte);//Is id de patient $idPP
	
	//Seleccionamos el número de imágenes en el estudio completo de la DB del ipacs
	mysqli_select_db($ipacs, $database_ipacs);
  
	$resultNI = mysqli_query($horizonte, "SELECT num_instances from study where patient_fk = $idPP1 ", $ipacs) or die (mysqli_error($horizonte));
 	$rowNI = mysqli_fetch_row($resultNI); $ni = sqlValue($rowNI[0], "int", $horizonte);
	
	$i = 0; $j=0;
	$lista = '';
	
	//Seleccionamos el study_iuid de la tabla de study del ipacs para pasarlo al osirix
	mysqli_select_db($ipacs, $database_ipacs);
  
	$consulta = "SELECT i.sop_iuid as mi, s.series_iuid as ms, e.study_iuid as me from instance i left join series s on s.pk = i.series_fk left join study e on e.pk = s.study_fk left join patient p on p.pk = e.patient_fk where p.pk = $idPP1";
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
	
	$c = 0;
	while ($fila = mysqli_fetch_array($query)) { $c++;
	};
	
	mysqli_select_db($horizonte, $database_horizonte);
  
	$resultW = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, titulo_u from usuarios where acceso_u = 9 limit 1 ") or die (mysqli_error($horizonte));
 	$rowW = mysqli_fetch_row($resultW);
	
	$anestesiologo = $rowW[3].' '.$rowW[0].' '.$rowW[1].' '.$rowW[2];
		
	$datos = $nombre.';*-'.$row[0].';*-'.$row1[0].';*-'.$row1[1].";*-".$row[3].";*-".$row[1].";*-".$row[2].";*-".$medicoEstudio.";*-".$row3[0].";*-".$medicoInterpreta.";*-".$row4[3].";*-".$row[7].".png".";*-".$referenciaPacs.";*-".$row[10].";*-".$row1[4].";*-".$row4[5].";*-".$ni.";*-".$lista.';*-'.$rowO[0].';*-'.$anestesiologo.';*-'.$row4[6].';*-'.$row4[7].';*-'.$row4[8].';*-'.$rowDo[0].';*-'.$rowMNE[0].';*-'.$rowMNE[1].';*-'.$rowMNE[2].';*-'.$rowMNP[0].';*-'.$rowMNP[1].';*-'.$rowMNP[2].';*-'.$row[15];
	
echo $datos;
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
 mysqli_close($ipacs);
?>