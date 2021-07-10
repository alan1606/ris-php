<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

 $idP=sqlValue($_POST["idP"],"int", $horizonte); $idU=sqlValue($_SESSION['id'],"int", $horizonte); $idE=sqlValue($_POST["idE"],"int", $horizonte); //en VC
 
 mysqli_select_db($horizonte, $database_horizonte);
 $result1 = mysqli_query($horizonte, "SELECT p.nombre_completo_p, p.apaterno_p, p.amaterno_p, DATE_FORMAT(p.fNac_p,'%d/%c/%Y'), s.cat_sexo, p.fNac_p from pacientes p left join catalogo_sexos s on s.id_sexo = p.sexo_p where p.id_p = $idP ") or die (mysqli_error($horizonte));
 $row1 = mysqli_fetch_row($result1);

 mysqli_select_db($horizonte, $database_horizonte);
 $result2 = mysqli_query($horizonte, "SELECT v.referencia_vc, v.id_concepto_es, v.nota_radiologo_vc, DATE_FORMAT(v.fecha_venta_vc,'%d/%c/%Y'), v.usuarioEdo4_e, v.id_personal_medico_vc, s.nombre_su, v.contador_vc, v.usuarioEdo4_e, s.id_su, concat(s.id_su,'.',s.id_su), c.id_tipo_concepto_to, s.no_temp_su, a.nombre_a, v.interpretacion_vc, s.clave_su from venta_conceptos v left join orden_venta o on o.referencia_ov = v.referencia_vc left join conceptos c on c.id_to = v.id_concepto_es left join sucursales s on s.id_su = o.sucursal_ov left join areas a on a.id_a = c.id_area_to where v.id_vc = $idE ") or die (mysqli_error($horizonte));
 $row2 = mysqli_fetch_row($result2); $id_suc = sqlValue($row2[9], "int", $horizonte); $ale_suc = sqlValue($row2[12], "text", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte);
	$resultE=mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where aleatorio_do = $ale_suc and tipo_quien_do = 2 and nombre_do = 'ENCABEZADO' and que_es_do = 'MEMBRETE RESULTADOS LABORATORIO'") or die (mysqli_error($horizonte));
	$rowE = mysqli_fetch_row($resultE);
		
	mysqli_select_db($horizonte, $database_horizonte);
	$resultP=mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where aleatorio_do = $ale_suc and tipo_quien_do = 2 and nombre_do = 'PIE' and que_es_do = 'MEMBRETE RESULTADOS LABORATORIO'") or die (mysqli_error($horizonte));
	$rowP = mysqli_fetch_row($resultP);
	
	if($rowE[0]>0 and $rowP[0]>0){$ep = 1;}else{$ep = 0;}
 
 $claveE = sqlValue($row2[1], "int", $horizonte);
 $ref = sqlValue($row2[0], "text", $horizonte);
 $idUautoriza = sqlValue($row2[4], "int", $horizonte);
 $idUmedico = sqlValue($row2[5], "int", $horizonte);

 $lista = ''; $k = 0; $lista1 = ''; $k1 = 0;
 mysqli_select_db($horizonte, $database_horizonte);
 $consultaM = "SELECT m.metodo_me from asignar_metodo am left join conceptos b on b.aleatorio_c = am.aleatorio_ame left join metodos m on m.id_me = am.id_metodo_ame where b.id_to = $claveE group by am.id_metodo_ame ";
$query = mysqli_query($horizonte, $consultaM) or die (mysqli_error($horizonte));
while ($fila = mysqli_fetch_array($query)) {
	//$lista = $fila['metodo_me'];
	$lista = $lista.','.$fila['metodo_me'];
	/*if($k==0){ $lista = $fila['metodo_me']; }
	else if($k>2){ $lista = 'DIVERSOS'; }
	else{ $lista = $lista.','.$fila['metodo_me'];}*/
	$k++;
};if($k>2){ $lista = 'DIVERSOS'; }$lista=substr($lista,1);//echo $lista;

mysqli_select_db($horizonte, $database_horizonte);
$consultaM1 ="SELECT m.muestra_mu from asignar_muestra am left join conceptos b on b.aleatorio_c = am.aleatorio_am left join muestras m on m.id_mu = am.id_muestra_am where b.id_to = $claveE group by am.id_muestra_am ";
$query1 = mysqli_query($horizonte, $consultaM1) or die (mysqli_error($horizonte));
while ($fila1 = mysqli_fetch_array($query1)) {
	//$lista1 = $fila1['muestra_mu'];
	$lista1 = $lista1.','.$fila1['muestra_mu'];
	/*if($k1==0){ $lista1 = $fila1['muestra_mu']; }
	else if($k1>2){ $lista1 = 'DIVERSAS'; }
	else{ $lista1 = $lista1.','.$fila1['muestra_mu'];}*/
	$k1++;
};if($k1>2){ $lista1 = 'DIVERSAS'; }$lista1=substr($lista1,1);//echo $lista;

mysqli_select_db($horizonte, $database_horizonte);
$result4d = mysqli_query($horizonte, "SELECT u.nombre_u, u.apaterno_u, u.amaterno_u, u.cedulaProfesional_u, u.id_u, u.sexo_u, t.abreviacion_ti, u.firma_u, u.temporal_u from usuarios u left join titulos t on t.id_ti = u.id_titulo_u where u.id_u = $idUautoriza ") or die (mysqli_error($horizonte));
$row4d = mysqli_fetch_row($result4d);
$quimicoAutoriza = $row4d[0]." ".$row4d[1]." ".$row4d[2]; $tempU = sqlValue($row4d[8], "text", $horizonte);

$resultFt = mysqli_query($horizonte, "SELECT count(id_do) from documentos where aleatorio_do = $tempU and firma_do = 1 ") or die (mysqli_error($horizonte));
$rowFt = mysqli_fetch_row($resultFt);

if($rowFt[0]>0){
	mysqli_select_db($horizonte, $database_horizonte); 
	$resultDo = mysqli_query($horizonte, "SELECT ext_do, id_do from documentos where aleatorio_do = $tempU and firma_do = 1") or die (mysqli_error($horizonte));
	$rowDo = mysqli_fetch_row($resultDo);
	$myFirma = '<img src="../../../usuarios/documentos/files/'.$rowDo[1].'.'.$rowDo[0].'" height="100" width="" style=" border-style:none;">';
 }else{$myFirma = '';$rowDo[0] = '';}
 
 mysqli_select_db($horizonte, $database_horizonte); //Membrete encabezado nota Evo
 $resultMNE = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where aleatorio_do = $ale_suc and que_es_do = 'MEMBRETE RESULTADOS LABORATORIO' and tipo_quien_do = 2 and nombre_do = 'ENCABEZADO'") or die (mysqli_error($horizonte));
 $rowMNE = mysqli_fetch_row($resultMNE);
 
 mysqli_select_db($horizonte, $database_horizonte); //Membrete pie nota Evo
 $resultMNP = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where aleatorio_do = $ale_suc and que_es_do = 'MEMBRETE RESULTADOS LABORATORIO' and tipo_quien_do = 2 and nombre_do = 'PIE'") or die (mysqli_error($horizonte));
 $rowMNP = mysqli_fetch_row($resultMNP);

mysqli_select_db($horizonte, $database_horizonte);
$result4d1 = mysqli_query($horizonte, "SELECT u.nombre_u, u.apaterno_u, u.amaterno_u, u.cedulaProfesional_u, u.id_u, u.sexo_u, t.abreviacion_ti from usuarios u left join titulos t on t.id_ti = u.id_titulo_u where u.id_u = $idUmedico ") or die (mysqli_error($horizonte));
$row4d1 = mysqli_fetch_row($result4d1);

if($row4d1[0]=='A' and $row4d1[1] == 'QUIEN'){ $miMedico =$row4d1[0]." ".$row4d1[1]." ".$row4d1[2];}
else{$miMedico = $row4d1[6]." ".$row4d1[0]." ".$row4d1[1]." ".$row4d1[2];}

mysqli_select_db($horizonte, $database_horizonte);
$result3 = mysqli_query($horizonte, "SELECT concepto_to, id_area_to from conceptos where id_to = $claveE ") or die (mysqli_error($horizonte));
$row3 = mysqli_fetch_row($result3);
$areaE = sqlValue($row3[1], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$result4 = mysqli_query($horizonte, "SELECT nombre_a from areas where id_a = $areaE ") or die (mysqli_error($horizonte));
$row4 = mysqli_fetch_row($result4);

mysqli_select_db($horizonte, $database_horizonte);
$result5 = mysqli_query($horizonte, "SELECT observaciones_l_ov from orden_venta where referencia_ov = $ref ") or die (mysqli_error($horizonte));
$row5 = mysqli_fetch_row($result5);

mysqli_select_db($horizonte, $database_horizonte);
$result6 = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.estatus_vc = 2 and v.referencia_vc = $ref and c.id_tipo_concepto_to = 3 order by v.id_vc desc") or die (mysqli_error($horizonte));
$row6 = mysqli_fetch_row($result6);

$fecha1 = new DateTime($row1[5]); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);
//printf('%d AÑOS %d MESES %d DÍAS %d HORAS %d MINUTOS', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
if($anos>0){$row1[5]=$anos." AÑOS";}
if($anos<1){
	if($meses<=2 and $meses>=1){$row1[5]=$meses." MES(ES) ".$dias." DÍA(S)";}
	if($meses>=3){$row1[5]=$meses." MES(ES) ";}
	if($meses==0){$row1[5]=$dias." DÍA(S)";}
	if($meses==0 and $dias<=1){$row1[5]=$dias." DÍA(S) ".$horas." HORA(S)";}
	if($meses==0 and $dias<1){$row1[5]=$horas." HORA(S) ".$minutos." MINUTO(S)";}
} 
if($anos>150 or $anos<0){$row1[5]="DESCONOCIDA";}else{}

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

 $tabla = '
 	<div style=" width:100%; text-align:center; border:1px none red;" align="center">
		<table id="p_contenido1" width="15cm" border="0" cellspacing="4" cellpadding="0">
			<tr> 
				<td width="360">PACIENTE: '.$row1[0].'</td>
				<td nowrap>EDAD: '.$row1[5].' SEXO: '.$row1[4].' </td>
			</tr>
			<tr>
				<td class="myMedicoP">'.$miMedico.'</td>
				<td nowrap>FECHA '.$row2[3].' SUCURSAL: '.$row2[15].'</td>
			</tr>
			<tr>
				<td align="left" style="font-weight:bold;">'.$row3[0].'</td>
				<td nowrap> REFERENCIA: '.$row2[0].' ESTUDIO: '.$nome.' DE '.$row7[0].' </td>
			</tr>
			<tr style="font-size:9px;" class="metod">
				<td>MUESTRA: '.$lista1.'</td>
				<td>MÉTODO: '.$lista.'</td>
			</tr>
		</table>
	</div>';

if($row2[2]!=''){$myOBS = '<em>OBSERVACIONES: </em> '.$row2[2].'';}else{$myOBS='&nbsp;';}
 $tabla2 = '<table id="p_contenido2" width="100%" border="0" cellspacing="3" cellpadding="0"><tr><td colspan="2" height="40" valign="top">'.$myOBS.'</td></tr> <tr> <td width="400" height="100" valign="top"></td> <td id="firmaDR" align="center" height="110"> '.$myFirma.' </td> </tr> <tr> <td>&nbsp;</td> <td nowrap align="center">'.$row4d[6].' '.$quimicoAutoriza.'</td> </tr> <tr> <td nowrap></td> <td nowrap align="center"><span class="puestoDR"></span> CEDULA PROFESIONAL '.$row4d[3].'</td> </tr> </table>';
		
 $tabla = sqlValue($tabla, "text", $horizonte); $tabla2 = sqlValue($tabla2, "text", $horizonte);
 mysqli_select_db($horizonte, $database_horizonte);
 $sqlX = "UPDATE usuarios SET variable_temporal1_u = $tabla, variable_temporal2_u = $tabla2 where id_u = $idU limit 1";
 $updateX = mysqli_query($horizonte, $sqlX) or die (mysqli_error($horizonte));
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultC8 = mysqli_query($horizonte, "SELECT id_concepto_es from venta_conceptos where id_vc = $idE ") or die (mysqli_error($horizonte));
 $rowC8 = mysqli_fetch_row($resultC8); $idE8 = sqlValue($rowC8[0], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultC = mysqli_query($horizonte, "SELECT count(id_ab) from asignar_bases where id_estudio_ab = $idE8 ") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 if(!$updateX){ echo $sqlX; }
 else{
	 echo $row1[0].'. '.$row1[5].' '.$row1[4].'*}'.$row2[0].'*}'.$row3[0].'*}'.$row4[0].'*}'.$row5[0].'*}'.$row6[0].'*}'.$row4[0].'*}'.$areaE.'*}'.$row2[2].'*}'.$row1[3].'*}'.$row1[4].'*}'.$row1[5].'*}'.$row2[3].'*}'.$miMedico.'*}'.$quimicoAutoriza.'*}'.$row4d[3].'*}'.$lista1.'*}'.$lista.'*}'.$row4d[6].'*}'.$row2[6].'*}'.$nome.' DE '.$row7[0].'*}'.$row2[8].".png".'*}'.$row2[9].'*}'.$row2[10].'*}'.$row4d[7].'*}'.$row4d[8].'*}'.$rowDo[0].'*}'.$rowMNE[0].'*}'.$rowMNE[1].'*}'.$rowMNE[2].'*}'.$rowMNP[0].'*}'.$rowMNP[1].'*}'.$rowMNP[2].'*}'.$row2[11].'*}'.$ep.'*}'.$rowE[1].'*}'.$row2[13].'*}'.$rowC[0].'*}'.$row2[14].'*}'.$row2[15];
 }

//Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>