<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

$id_s = sqlValue($_GET["id_s"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$resultR = mysqli_query($horizonte, "SELECT margen_e_ul, margen_p_ul, no_temp_su from sucursales where id_su = $id_s") or die (mysqli_error($horizonte));
$rowR = mysqli_fetch_row($resultR); $idSuc = sqlValue($rowR[2], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte); //Membrete encabezado estudios img
 $resultMNE = mysqli_query($horizonte, "SELECT id_do, ext_do from documentos where aleatorio_do = $idSuc and que_es_do = 'MEMBRETE RESULTADOS ULTRASONIDO' and tipo_quien_do = 2 and nombre_do = 'ENCABEZADO'") or die (mysqli_error($horizonte));
 $rowMNE = mysqli_fetch_row($resultMNE); $encaNM = '../../../sucursales/membretes/files/'.$rowMNE[0].'.'.$rowMNE[1];
 
 mysqli_select_db($horizonte, $database_horizonte); //Membrete pie estudios img
 $resultMNP = mysqli_query($horizonte, "SELECT id_do, ext_do from documentos where aleatorio_do = $idSuc and que_es_do = 'MEMBRETE RESULTADOS ULTRASONIDO' and tipo_quien_do = 2 and nombre_do = 'PIE'") or die (mysqli_error($horizonte));
 $rowMNP = mysqli_fetch_row($resultMNP); $pieNM = '../../../sucursales/membretes/files/'.$rowMNP[0].'.'.$rowMNP[1];

mysqli_select_db($horizonte, $database_horizonte);
$query_usuario = sprintf("SELECT variable_temporal_u, variable_temporal1_u, variable_temporal2_u, variable_temporal3_u, variable_temporal4_u FROM usuarios WHERE id_u = %s", $_GET["iduL"]);
$usuario = mysqli_query($horizonte, $query_usuario) or die(mysqli_error($horizonte));
$row_usuario = mysqli_fetch_assoc($usuario);
$totalRows_usuario = mysqli_num_rows($usuario);

mysqli_select_db($horizonte, $database_horizonte);
$query_usuario1 = sprintf("SELECT interpretacion_vc FROM venta_conceptos WHERE id_vc = %s", $_GET["idVC"]);
$usuario1 = mysqli_query($horizonte, $query_usuario1) or die(mysqli_error($horizonte));
$row_usuario1 = mysqli_fetch_assoc($usuario1);
$totalRows_usuario1 = mysqli_num_rows($usuario1);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT v.referencia_vc, v.interpretacion_vc, v.nota_interpretacion, date_format(v.fecha_venta_vc,'%d/%c/%Y'), v.id_paciente_vc, v.id_personal_medico_vc, v.id_concepto_es, v.usuarioEdo5_e, v.contador_vc, e.id_area_to, v.nota_radiologo_vc, v.usuarioEdo5_e, DATE_FORMAT(v.fecha_venta_vc,'%Y%m%d'), v.usuarioEdo5_e, v.observaciones_vc, v.id_anesteciologo_vc, o.sucursal_ov, DATE_FORMAT(v.fecha_venta_vc,'%Y%n%d'), o.sucursal_ov, v.birad_vc, s.nombre_su, s.id_su, concat(s.id_su,'.',s.id_su) from venta_conceptos v left join conceptos e on e.id_to = v.id_concepto_es left join orden_venta o on o.referencia_ov = v.referencia_vc left join sucursales s on s.id_su = o.sucursal_ov where v.id_vc = $_GET[idVC] ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); 
	
	$refOV = sqlValue($row[0], "text", $horizonte); $idAnes = sqlValue($row[15], "int", $horizonte);
	
	$claveE = sqlValue($row[6], "int", $horizonte); $ref = sqlValue($row[0], "text", $horizonte);
 	$idUautoriza = sqlValue($row[7], "int", $horizonte); $idUmedico = sqlValue($row[5], "int", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT p.fNac_p, p.sexo_p, concat(p.nombre_p, ' ', p.apaterno_p), p.amaterno_p, date_format(p.fNac_p,'%d/%c/%Y'), s.cat_sexo from pacientes p left join catalogo_sexos s on s.id_sexo = p.sexo_p where p.id_p = $row[4] ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
	//para la edad
	$fecha1 = new DateTime($row1[0]); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);
	//printf('%d A??OS %d MESES %d D??AS %d HORAS %d MINUTOS', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
	$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i;
	if($anos>0){$row1[0]=$anos." A??OS";}
	if($anos<1){
		if($meses<=2 and $meses>=1){$row1[0]=$meses." MES(ES) ".$dias." D??A(S)";}
		if($meses>=3){$row1[0]=$meses." MES(ES) ";}
		if($meses==0){$row1[0]=$dias." D??A(S)";}
		if($meses==0 and $dias<=1){$row1[0]=$dias." D??A(S) ".$horas." HORA(S)";}
		if($meses==0 and $dias<1){$row1[0]=$horas." HORA(S) ".$minutos." MINUTO(S)";}
	} 
	
	$result3=mysqli_query($horizonte, "SELECT concepto_to, id_area_to from conceptos where id_to = $row[6] ") or die (mysqli_error($horizonte));
 	$row3 = mysqli_fetch_row($result3);
	
	$result2 = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, titulo_u, idSucursal_u, cedulaProfesional_u, id_u, sexo_u, firma_u, temporal_u from usuarios where id_u = $row[5] ") or die (mysqli_error($horizonte));
 	$row2 = mysqli_fetch_row($result2);
	
	if($row2[0]=='A' and $row2[1] == 'QUIEN'){ $miMedico =$row2[0]." ".$row2[1]." ".$row2[2];}
	else{$miMedico = "REFIRI??: ".$row2[3]." ".$row2[0]." ".$row2[1]." ".$row2[2];}

$tabla0 = '<table id="p_contenido4" width="100%" border="0" cellspacing="3" cellpadding="0" style="width:100%;"> <tr> <td class="encaH" width="50%" style="font-size:9pt;">PACIENTE: '.$row1[2].' '.$row1[3].'</td> <td class="encaH" nowrap style="font-size:9pt;">EDAD: '.$row1[0].' SEXO: '.$row1[5].' </td>  </tr> <tr> <td class="myMedicoP" style="font-size:9pt;">'.$miMedico.'</td> <td nowrap style="font-size:9pt;">FECHA '.$row[3].'</td>  </tr> <tr> <td align="left" style="font-weight:bold; font-size:9pt;" nowrap>'.$row3[0].'</td> <td nowrap style="font-size:9pt;">REFERENCIA: '.$row[0].' </td> </tr> </table>';

$carpeta = $_GET["idVC"];
mysqli_select_db($horizonte, $database_horizonte);
$queryG1 = mysqli_query($horizonte, "SELECT count(id_ie) FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 ") or die (mysqli_error($horizonte)); $rowG1 = mysqli_fetch_row($queryG1);
switch($rowG1[0]){
	case 1:
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' order by id_ie desc limit 1; ") or die (mysqli_error($horizonte));
		$rowK = mysqli_fetch_row($queryK);
		$img1 = explode('_1.png', $rowK[1]);
		$tableX='
		<table id="table2" width="100%" height="1100" border="0" cellspacing="0" cellpadding="2"><tr> 
		<td nowrap valign="middle" align="center">
		<img id="myImg1" width="742" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img1[0].'" />
		</td> 
		</tr> </table>
		';
		$orientation = 'portrait'; //landscape
	break;
	case 2:
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' order by id_ie desc limit 1; ") or die (mysqli_error($horizonte));
		$rowK = mysqli_fetch_row($queryK);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK2 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0]) order by id_ie desc limit 2; ") or die (mysqli_error($horizonte));
		$rowK2 = mysqli_fetch_row($queryK2);
		$img1 = explode('_1.png', $rowK[1]); $img2 = explode('_1.png', $rowK2[1]);
		$tableX= '
		<table id="table2" width="100%" height="1100" border="0" cellspacing="1" cellpadding="2"> 
		<tr> 
		<td height="50%" valign="bottom" align="center">
			<img id="myImg2" width="520" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img1[0].'" />
		</td> 
		</tr>
		<tr> 
		<td height="50%" valign="top" align="center">
			<img id="myImg3" width="520" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img2[0].'" />
		</td> 
		</tr> 
		</table>
		';
	break;
	case 3:
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' order by id_ie desc limit 1; ") or die (mysqli_error($horizonte));
		$rowK = mysqli_fetch_row($queryK);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK2 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0]) order by id_ie desc limit 2; ") or die (mysqli_error($horizonte));
		$rowK2 = mysqli_fetch_row($queryK2);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK3 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0],$rowK2[0]) order by id_ie desc limit 3; ") or die (mysqli_error($horizonte));
		$rowK3 = mysqli_fetch_row($queryK3);
		$img1 = explode('_1.png', $rowK[1]); $img2 = explode('_1.png', $rowK2[1]); $img3 = explode('_1.png', $rowK3[1]);
		$tableX= '
		<table id="table2" width="100%" height="1100" border="0" cellspacing="1" cellpadding="2">
		<tr> 
		<td align="center" valign="bottom" height="33.3%"><img id="myImg4" width="350" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img1[0].'" /></td> </tr>
		<tr> 
		<td align="center" height="3%"><img id="myImg5" width="350" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img2[0].'" /></td> </tr> 
		<tr> 
		<td align="center" valign="top" height="33.3%"><img id="myImg6" width="350" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img3[0].'" /></td> </tr> 
		</table>
		';
	break;
	case 4:
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' order by id_ie desc limit 1; ") or die (mysqli_error($horizonte));
		$rowK = mysqli_fetch_row($queryK);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK2 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0]) order by id_ie desc limit 2; ") or die (mysqli_error($horizonte));
		$rowK2 = mysqli_fetch_row($queryK2);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK3 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0],$rowK2[0]) order by id_ie desc limit 3; ") or die (mysqli_error($horizonte));
		$rowK3 = mysqli_fetch_row($queryK3);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK4 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0],$rowK2[0],$rowK3[0]) order by id_ie desc limit 3; ") or die (mysqli_error($horizonte));
		$rowK4 = mysqli_fetch_row($queryK4);
		$img1 = explode('_1.png', $rowK[1]); $img2 = explode('_1.png', $rowK2[1]); $img3 = explode('_1.png', $rowK3[1]);
		$img4 = explode('_1.png', $rowK4[1]);
		$tableX= '
		<table id="table2" width="100%" height="1100" border="0" cellspacing="1" cellpadding="2">
		<tr> 
			<td width="50%" height="50%" align="center" valign="bottom"><img id="myImg7" width="370" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img1[0].'" /></td>
			<td height="" align="center" valign="bottom"><img id="myImg8" width="370" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img2[0].'" /></td> 
		</tr> 
		<tr> 
			<td height="" align="center" valign="top"><img id="myImg9" width="370" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img3[0].'" /></td>
			<td height="" align="center" valign="top"><img id="myImg10" width="370" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img4[0].'" /></td> 
		</tr> 
		</table>
		';
	break;
	case 5:
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' order by id_ie desc limit 1; ") or die (mysqli_error($horizonte));
		$rowK = mysqli_fetch_row($queryK);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK2 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0]) order by id_ie desc limit 2; ") or die (mysqli_error($horizonte));
		$rowK2 = mysqli_fetch_row($queryK2);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK3 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0],$rowK2[0]) order by id_ie desc limit 3; ") or die (mysqli_error($horizonte));
		$rowK3 = mysqli_fetch_row($queryK3);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK4 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0],$rowK2[0],$rowK3[0]) order by id_ie desc limit 3; ") or die (mysqli_error($horizonte));
		$rowK4 = mysqli_fetch_row($queryK4);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK5 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0],$rowK2[0],$rowK3[0],$rowK4[0]) order by id_ie desc limit 3; ") or die (mysqli_error($horizonte));
		$rowK5 = mysqli_fetch_row($queryK5);
		$img1 = explode('_1.png', $rowK[1]); $img2 = explode('_1.png', $rowK2[1]); $img3 = explode('_1.png', $rowK3[1]);
		$img4 = explode('_1.png', $rowK4[1]); $img5 = explode('_1.png', $rowK5[1]);
		$tableX= '
		<table id="table2" width="100%" height="1100" border="0" cellspacing="1" cellpadding="2">
		<tr> 
			<td height="33.3%" align="right" valign="bottom"><img id="myImg11" width="340" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img1[0].'" /></td>
			<td height="33.3%" align="left" valign="bottom"><img id="myImg12" width="340" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img2[0].'" /></td> 
		</tr> 
		<tr> 
			<td height="1%" align="right" valign="middle"><img id="myImg13" width="340" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img3[0].'" /></td>
			<td height="1% align="left" valign="middle">
			<img id="myImg14" width="340" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img4[0].'" /></td> 
		</tr> 
		<tr> 
			<td height="33.3%" align="left" valign="top" colspan="2"><img id="myImg15" width="340" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img5[0].'" /></td>
		</tr> 
		</table>
		';
	break;
	case 6:
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' order by id_ie desc limit 1; ") or die (mysqli_error($horizonte));
		$rowK = mysqli_fetch_row($queryK);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK2 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0]) order by id_ie desc limit 2; ") or die (mysqli_error($horizonte));
		$rowK2 = mysqli_fetch_row($queryK2);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK3 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0],$rowK2[0]) order by id_ie desc limit 3; ") or die (mysqli_error($horizonte));
		$rowK3 = mysqli_fetch_row($queryK3);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK4 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0],$rowK2[0],$rowK3[0]) order by id_ie desc limit 3; ") or die (mysqli_error($horizonte));
		$rowK4 = mysqli_fetch_row($queryK4);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK5 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0],$rowK2[0],$rowK3[0],$rowK4[0]) order by id_ie desc limit 3; ") or die (mysqli_error($horizonte));
		$rowK5 = mysqli_fetch_row($queryK5);
		mysqli_select_db($horizonte, $database_horizonte);
		$queryK6 = mysqli_query($horizonte, "SELECT id_ie, nombre_ie, imagen_ie FROM img_ultrasonido where id_estudio_vc_ie = $carpeta and a_reporte_ie = 1 and tumb_ie = 1 and imagen_ie != 'NaN_1' and id_ie not in ($rowK[0],$rowK2[0],$rowK3[0],$rowK4[0],$rowK5[0]) order by id_ie desc limit 3; ") or die (mysqli_error($horizonte));
		$rowK6 = mysqli_fetch_row($queryK6);
		$img1 = explode('_1.png', $rowK[1]); $img2 = explode('_1.png', $rowK2[1]); $img3 = explode('_1.png', $rowK3[1]);
		$img4 = explode('_1.png', $rowK4[1]); $img5 = explode('_1.png', $rowK5[1]); $img6 = explode('_1.png', $rowK6[1]);
		$tableX= '
		<table id="table2" width="100%" height="1100" border="0" cellspacing="1" cellpadding="2">
		<tr> 
			<td height="33.3%" width="50%" align="right" valign="bottom"><img id="myImg16" width="340" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img1[0].'" /></td>
			<td height="33.3%" align="left" valign="bottom"><img id="myImg17" width="340" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img2[0].'" /></td> 
		</tr> 
		<tr> 
			<td height="1%" align="right" valign="middle"><img id="myImg18" width="340" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img3[0].'" /></td>
			<td height="" align="left" valign="middle"><img id="myImg19" width="340" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img4[0].'" /></td> 
		</tr> 
		<tr> 
			<td height="33.3%" align="right" valign="top"><img id="myImg20" width="340" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img5[0].'" /></td>
			<td height="33.3%" align="left" valign="top"><img id="myImg21" width="340" style="border:1px solid black;" src="../../../imagen/img_usg/filemanager/source/'.$carpeta.'/'.$img6[0].'" /></td>
		</tr> 
		</table>
		';
	break;
	default:
		$tableX= '';
};
?>

<!-- IMPORTANTE: El contenido de la etiqueta style debe estar entre comentarios de HTML -->
<style>
<!--
#p_header {padding:0px 0; border-top: 0px none; border-bottom: 0px none; width:100%;}
#p_header .fila #col_1 {width: 100%;}

#p_footer {padding-top:5px 0; border-top: 2px none #46d; width:100%;}
#p_footer .fila td {text-align:; width:100%;}
#p_footer .fila td span {font-size: 10px; color: #000;}

#p_contenido, #p_contenido4 {margin-top:0px; width:595pt; height:1000pt; page-break-after:auto;} 
#p_contenido .mceNonEditable td, #p_contenido4 .mceNonEditable td {padding-top: 0px; text-align: justify; width:255pt;}

#p_contenido1 {margin-top:0px; width:10cm; bottom:0px;} 
#p_contenido1 tr td {padding-top: 0px; text-align: justify; width:;}
#p_contenido2 {margin-top:0px; width:100%;} #p_contenido2 tr td {padding-top: 0px; text-align: justify; width:;}

#tabla1 .fila4 #col_14 {width: 100%; border:1px solid red;}
#firmaDR img{ display:none;}
#table2 {height:1000pt; page-break-before:always; display:none;} 
-->
</style>
<!-- page define la hoja con los m??rgenes se??alados -->
<!-- <page backtop="26mm" backbottom="22mm" backleft="8mm" backright="7mm"> PARA TDI-->
<!-- <page backtop="42mm" backbottom="24mm" backleft="8mm" backright="7mm"> PARA COVADONGA-->
<page backtop="<?php echo $rowR[0]*10; ?>mm" backbottom="<?php echo $rowR[1]*10; ?>mm" backleft="3mm" backright="3mm">
    <page_header> <!-- Define el header de la hoja -->
	<table id="p_header"><tr class="fila"><td id="col_1"><?php if($_GET["mems"]==1){ ?><img src="<?php } ?>
	  <?php if($_GET["mems"]==1){echo $encaNM;} ?><?php if($_GET["mems"]==1){ ?>" width="770"><?php } ?></td></tr></table>
    </page_header>
        
    <page_footer> <!-- Define el footer de la hoja -->
	<table id="p_footer"><tr class="fila"><td id="col_2"><?php if($_GET["mems"]==1){ ?><img src="<?php } ?><?php if($_GET["mems"]==1){echo $pieNM;} ?><?php if($_GET["mems"]==1){ ?>" width="760"><?php } ?></td></tr></table>
    </page_footer>
    <!-- Define el cuerpo de la hoja -->
    <?php //echo $row_usuario['variable_temporal1_u']; ?><!--<hr style="height:1px;"> -->
    <?php echo str_replace("</p>","<br>",str_replace("<p>", "",$row_usuario1['interpretacion_vc'])); ?>
    <?php //echo $row_usuario['variable_temporal2_u']; ?>
    <!-- Fin del cuerpo de la hoja -->
</page>

<?php if ($rowG1[0]>0){ ?>
<page backtop="<?php echo $rowR[0]*10; ?>mm" backbottom="<?php echo $rowR[1]*10; ?>mm" backleft="3mm" backright="3mm" orientation="<?php echo $orientation; ?>">
    <page_header> <!-- Define el header de la hoja -->
	<table id="p_header"><tr class="fila"><td id="col_1"><?php if($_GET["mems"]==1){ ?><img src="<?php } ?>
	  <?php if($_GET["mems"]==1){echo $encaNM;} ?><?php if($_GET["mems"]==1){ ?>" width="770"><?php } ?></td></tr></table>
    </page_header>
        
    <page_footer> <!-- Define el footer de la hoja -->
	<table id="p_footer"><tr class="fila"><td id="col_2"><?php if($_GET["mems"]==1){ ?><img src="<?php } ?><?php if($_GET["mems"]==1){echo $pieNM;} ?><?php if($_GET["mems"]==1){ ?>" width="760"><?php } ?></td></tr></table>
    </page_footer>
    <?php echo $tabla0; ?><hr style="height:1px;">
    <?php echo str_replace("</p>","<br>",str_replace("<p>", "",$tableX)); ?>
</page>
<?php } ?>

<?php mysqli_free_result($usuario);?>
<?php mysqli_free_result($usuario1);?>
