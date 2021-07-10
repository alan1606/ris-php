<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $ref = sqlValue($_POST["ref"],"text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultIC = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.referencia_vc = $ref and c.id_tipo_concepto_to = 1 and v.temporal_vc = 0") or die (mysqli_error($horizonte));
 $rowIC = mysqli_fetch_row($resultIC);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultII = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.referencia_vc = $ref and c.id_tipo_concepto_to = 4 and v.temporal_vc = 0") or die (mysqli_error($horizonte));
 $rowII = mysqli_fetch_row($resultII);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultIL = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.referencia_vc = $ref and c.id_tipo_concepto_to = 3 and v.temporal_vc = 0") or die (mysqli_error($horizonte));
 $rowIL = mysqli_fetch_row($resultIL);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultIS = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.referencia_vc = $ref and c.id_tipo_concepto_to = 2 and v.temporal_vc = 0") or die (mysqli_error($horizonte));
 $rowIS = mysqli_fetch_row($resultIS);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultIF = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.referencia_vc = $ref and c.id_tipo_concepto_to = 5 and v.temporal_vc = 0") or die (mysqli_error($horizonte));
 $rowIF = mysqli_fetch_row($resultIF);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultR = mysqli_query($horizonte, "SELECT o.id_paciente_ov, DATE_FORMAT(o.fecha_venta_ov,'%d/%c/%Y %H:%i:%s'), u.usuario_u, o.subtotal_ov, adicionales_c_ov + adicionales_ei_ov + adicionales_el_ov + adicionales_s_ov + adicionales_p_ov, o.iva_ov, o.t_desc_cta + o.t_desc_img + o.t_desc_lab + o.t_desc_serv + o.t_desc_pro, o.gran_total_ov from orden_venta o left join usuarios u on u.id_u = o.usuario_ov where o.referencia_ov = $ref") or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultA = mysqli_query($horizonte, "SELECT sum(pago_pag) from pagos_ov where referencia_pag = $ref group by referencia_pag") or die (mysqli_error($horizonte));
 $rowA = mysqli_fetch_row($resultA);
 
 $saldo = $rowR[7] - $rowA[0];
 
 if($saldo > 0){$estatus = 'CON SALDO';}else{ $saldo = 0; $estatus = 'PAGADA';}
 
 $idP = sqlValue($rowR[0],"int", $horizonte); $idU = sqlValue($_POST["idU"],"int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $result1 = mysqli_query($horizonte, "SELECT p.nombre_completo_p, DATE_FORMAT(p.fNac_p,'%d/%c/%Y'), s.cat_sexo, p.fNac_p from pacientes p left join catalogo_sexos s on s.id_sexo = p.sexo_p where p.id_p = $idP ") or die (mysqli_error($horizonte));
 $row1 = mysqli_fetch_row($result1);
 
 $fecha1 = new DateTime($row1[3]); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);
 //printf('%d AÑOS %d MESES %d DÍAS %d HORAS %d MINUTOS', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
 $anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
 if($anos>0){$row1[3]=$anos." AÑOS";}
 if($anos<1){
 	if($meses<=2 and $meses>=1){$row1[3]=$meses." MES(ES) ".$dias." DÍA(S)";}
 	if($meses>=3){$row1[3]=$meses." MES(ES) ";}
 	if($meses==0){$row1[3]=$dias." DÍA(S)";}
 	if($meses==0 and $dias<=1){$row1[3]=$dias." DÍA(S) ".$horas." HORA(S)";}
 	if($meses==0 and $dias<1){$row1[3]=$horas." HORA(S) ".$minutos." MINUTO(S)";}
 } 
 if($anos>150 or $anos<0){$row1[3]="DESCONOCIDA";}else{}
 
 mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "
	SELECT vc.contador_vc, tc.tipo_concepto_tc, c.concepto_to, tc.tipo_concepto_tc, concat(vc.referencia_vc,'/',contador_vc), 
		vc.estatus_vc, vc.precio_vc,id_personal_medico_vc, e.estatus_est, vc.id_vc, c.id_departamento_to, vc.id_vc, vc.referencia_vc from venta_conceptos vc
		left join estatus e on e.id_est = vc.estatus_vc 
		left join conceptos c on c.id_to = vc.id_concepto_es 
		left join catalogo_tipo_conceptos tc on tc.id_tc = c.id_tipo_concepto_to 
		where vc.referencia_vc = $ref 
	") or die (mysqli_error($horizonte)); 
 $tableC = "<table class='table-condensed table-bordered' width='100%' height='100%'> \n"; 
 $tableC = $tableC."<tr class='bg-info'> <td>#</td> <td>CONCEPTO</td> <td>DESCRIPCI&Oacute;N</td> <td>ESTATUS</td> <td>PRECIO</td> </tr> \n";
 $cont = 0;
 while ( $row = mysqli_fetch_row($result) ){ $cont++;
	$tableC = $tableC."<tr style='color:black;' class='$row[11]'>
			<td>$cont</td> <td>$row[1]</td> <td>$row[2]</td> <td>$row[8]</td> <td style='text-align:right'>$$row[6]</td>
		</tr> \n"; 
 } 
 $tableC = $tableC."</table> \n"; 
 
	 echo $row1[0].'*}'.$row1[3].' '.$row1[2].'*}'.$rowR[1].'*}'.$rowR[2].'*}'.$rowR[3].'*}'.$rowR[4].'*}'.$rowR[5].'*}'.$rowR[6].'*}'.$rowR[7].'*}'.$rowA[0].'*}'.$saldo.'*}'.$estatus.'*}'.$rowIC[0].'*}'.$rowII[0].'*}'.$rowIL[0].'*}'.$rowIS[0].'*}'.$rowIF[0].'*}'.$tableC;

//Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>