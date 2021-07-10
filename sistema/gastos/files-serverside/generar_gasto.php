<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

include_once '../../funciones/php/cantidad_a_letras.php';

 $idU_recibe = sqlValue($_POST["para_g"], "int", $horizonte);
 $idU_entrega = sqlValue($_POST["idUsuarioC"], "int", $horizonte);
 $monto = sqlValue($_POST["monto_g"], "double", $horizonte);
 $entregado = sqlValue($_POST["entregado_g"], "double", $horizonte);
 $cambio = $_POST["cambio_g"];
 $concepto = sqlValue($_POST["concepto_g"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $now_i = sqlValue(date('Y-m-d'), "date", $horizonte); $fecha = date('Y-m-d'); $hora = date('H:i:s'); $now1 = date('Y-m-d H:i:s');
 $noTemp = sqlValue($_POST["aleatorio_cto"], "text", $horizonte);
 $departamento = sqlValue($_POST["departamento_g"], "int", $horizonte);
 $nota = sqlValue($_POST["nota_g"], "text", $horizonte);
     
 //debemos crear un registro en venta de conceptos y en pagos
 $idConvenio = sqlValue(0, "int", $horizonte);
 $precio = sqlValue($_POST["monto_g"], "double", $horizonte); $pago1 = $_POST["monto_g"]; $precio_x = (-1)*($pago1);
 $id_con_bene = sqlValue(0, "int", $horizonte);
 $ceros = sqlValue(0, "int", $horizonte);
 $motivos = sqlValue('', "text", $horizonte);

 //Si el cambio es mayor a cero, el estatus de vc es 1, si el cambio es 0 el estatus es 2
 if($cambio>0){$estatus=1;}else{$estatus=2;}

 mysqli_select_db($horizonte, $database_horizonte); 
 $sql1="INSERT INTO venta_conceptos(no_temp_vc,id_paciente_vc,id_usuario_vc,id_personal_medico_vc,id_concepto_es,id_convenio_vc,fecha_venta_vc,precio_vc,usuarioEdo1_e,fechaEdo1_e,id_conceptos_beneficios, observaciones_vc, estatus_vc)";
 $sql1.="VALUES ($noTemp, $ceros, $idU_entrega, $idU_recibe, $concepto, $idConvenio, $now, $precio_x, $idU_entrega, $now, $id_con_bene, $nota, $estatus)";

 $update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
 if(!$update1){ echo $sql1; }else{

	 $contador = 0; $noRef=0; $fecha1="'".date('Y-m-d')." 00:00:00"."'"; $fecha2="'".date('Y-m-d')." 23:59:59"."'"; $da=date('Ymd');

	 mysqli_select_db($horizonte, $database_horizonte);
	 $resultR = mysqli_query($horizonte, "SELECT count(id_ov) from orden_venta where fecha_venta_ov between ".$fecha1." and ".$fecha2." ") or die(mysqli_error($horizonte));
	 $rowR = mysqli_fetch_row($resultR);

	 if($rowR[0]==0){ $noRef=$da."-"."1"; $noRef="'".$noRef."'"; $contador = 1;}
	 else{ $daa=$rowR[0]+1; $noRef=$da."-".$daa; $noRef="'".$noRef."'"; $contador = $daa;}

	 mysqli_select_db($horizonte, $database_horizonte);
	 $resultRsq = mysqli_query($horizonte, "SELECT count(id_ov) from orden_venta where referencia_ov = ".$noRef." ") or die(mysqli_error($horizonte));
	 $rowRsq = mysqli_fetch_row($resultRsq);

	 if($rowRsq[0]>0){
		mysqli_select_db($horizonte, $database_horizonte);
		$resultRG = mysqli_query($horizonte, "SELECT max(contador_ov), referencia_ov from orden_venta where fecha_venta_ov between ".$fecha1." and ".$fecha2." limit 1 ") or die(mysqli_error($horizonte));
		$rowRG = mysqli_fetch_row($resultRG); //echo sqlValue($rowRG[0], "int", $horizonte);
		$porciones = explode("-", sqlValue($rowRG[1], "text", $horizonte)); $a = $rowRG[0]+1; $contador = $a; $noRef = $porciones[0]."-".$a; $noRef=$noRef."'";
	 }

	 mysqli_select_db($horizonte, $database_horizonte);
	 $resultSU = mysqli_query($horizonte, "SELECT idSucursal_u from usuarios where id_u = $idU_entrega limit 1") or die(mysqli_error($horizonte));
	 $rowSU = mysqli_fetch_row($resultSU); $id_sucu = sqlValue($rowSU[0], "int", $horizonte);

	 mysqli_select_db($horizonte, $database_horizonte);
	 $sql2 = "INSERT INTO orden_venta(total_c, subtotal_ov, gran_total_ov, sub_total_c, usuario_ov, id_paciente_ov, fecha_venta_ov, adicionales_c_ov, p_desc_cta, desc_d_cta, t_desc_cta, motivo_c_ov, medico_c_ov, referencia_ov, contador_ov, sucursal_ov, no_temp_ov, total_ei, total_el, total_s, sub_total_i, sub_total_l, sub_total_s, adicionales_ei_ov, adicionales_el_ov, adicionales_s_ov, medico_ei_ov, medico_el_ov, personal_s_ov, observaciones_i_ov, observaciones_l_ov, observaciones_s_ov, p_desc_img, desc_d_img, t_desc_img, p_desc_lab, desc_d_lab, t_desc_lab, p_desc_serv, desc_d_serv, t_desc_serv, total_p, sub_total_p, adicionales_p_ov, p_desc_pro, desc_d_pro, t_desc_pro, motivo_desc_c_ov, iva_ov) VALUES ($ceros, $precio_x, $precio_x, $ceros, $idU_entrega, $ceros, $now, $ceros, $ceros, $ceros, $ceros, $motivos, $idU_entrega, ".$noRef.", $contador, $id_sucu, $noTemp, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $idU_entrega, $idU_entrega, $idU_recibe, $motivos, $motivos, $motivos, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $motivos, $entregado)";

	 $update2 = mysqli_query($horizonte, $sql2) or die (mysqli_error($horizonte));

	 if (!$update2) {echo $sql2;}
	 else{
		mysqli_select_db($horizonte, $database_horizonte);
		$resultA = mysqli_query($horizonte, "SELECT id_vc from venta_conceptos where no_temp_vc = $noTemp") or die(mysqli_error($horizonte));
		$rowA = mysqli_fetch_row($resultA); $idVC = sqlValue($rowA[0], "int", $horizonte);

		$sql3 = "UPDATE venta_conceptos SET temporal_vc = 0, referencia_vc = ".$noRef.", contador_vc = 1 where id_vc = $idVC";
		mysqli_select_db($horizonte, $database_horizonte);
		$insertar3 = mysqli_query($horizonte, $sql3) or die (mysqli_error($horizonte));

		if (!$insertar3) {echo $sql3;}
		else{
			//Generamos el ticket y lo guardamos en el pago
			 mysqli_select_db($horizonte, $database_horizonte); 
			 $resultR = mysqli_query($horizonte, "SELECT o.referencia_ov, o.id_paciente_ov, o.gran_total_ov, o.usuario_ov, p.forma_pago_pag, p.no_cheque_pag, o.id_ov, o.sucursal_ov, su.no_temp_su from orden_venta o left join pagos_ov p on p.no_temp_pag = o.no_temp_ov left join sucursales su on su.id_su = o.sucursal_ov where o.no_temp_ov = $noTemp limit 1") or die (mysqli_error($horizonte));
			 $rowR = mysqli_fetch_row($resultR); $idSucursal = sqlValue($rowR[7], "int", $horizonte); $tempSucursal = sqlValue($rowR[8], "text", $horizonte);
			 $referencia_ti = $rowR[0]; $total_ti = $pago1; $saldo_ti = $total_ti - $pago1; $letras = valorEnLetras($total_ti);
			 $entregado_ti = $_POST["entregado_g"];

			 mysqli_select_db($horizonte, $database_horizonte);
			 $resultSu = mysqli_query($horizonte, "SELECT estado_su, municipio_su, ciudad_su, colonia_su, calle_su, cp_su, telefono_su, email_su, id_su from sucursales where id_su = $idSucursal") or die (mysqli_error($horizonte));
			 $rowSu = mysqli_fetch_row($resultSu); $id_sucu_l = sqlValue($rowSu[8], "int", $horizonte); $email_su = $rowSu[7];
			 $estado_su = $rowSu[0]; $municipio_su = $rowSu[1]; $ciudad_su = $rowSu[2]; $colonia_su = $rowSu[3]; $calle_su = $rowSu[4];
			 $cp_su = $rowSu[5]; $telefono_su = $rowSu[6];

			 mysqli_select_db($horizonte, $database_horizonte);
			 $resultCof = mysqli_query($horizonte, "SELECT sitio_web from configuracion order by id_cf desc limit 1") or die (mysqli_error($horizonte));
			 $rowCof = mysqli_fetch_row($resultCof); $sitio_web = $rowCof[0];

			 mysqli_select_db($horizonte, $database_horizonte);
			 $resultLo = mysqli_query($horizonte, "SELECT id_do, ext_do from documentos where aleatorio_do = $tempSucursal and perfil_do = 1 and tipo_quien_do = 2 ") or die (mysqli_error($horizonte));
			 $rowLo = mysqli_fetch_row($resultLo);
			 if($rowLo){
			  $logo="<img src='sucursales/documentos/files/".$rowLo[0].".".$rowLo[1]."?".$now1."' width='150' style='background-color:rgba(255, 255, 255, 1);'>";
			 }else{$logo = "";}

			 mysqli_select_db($horizonte, $database_horizonte);
			 $resultP = mysqli_query($horizonte, "SELECT concat(nombre_u, ' ', apaterno_u) from usuarios where id_u = $idU_recibe limit 1") or die (mysqli_error($horizonte));
			 $rowP = mysqli_fetch_row($resultP); $paciente = $rowP[0];

			 mysqli_select_db($horizonte, $database_horizonte);
			 $resultU = mysqli_query($horizonte, "SELECT concat(nombre_u, ' ', apaterno_u) from usuarios where id_u = $idU_entrega limit 1") or die (mysqli_error($horizonte));
			 $rowU = mysqli_fetch_row($resultU); $atendio = $rowU[0]; $concepto_tabla = "";

			$tabla = "<table width='280px' class='table' style='margin-left:-25px;' id='tablaTicket' cellpadding='2'>
					<tr> <td colspan='2' align='center'>".$logo."</td> </tr>
					<tr> <td colspan='2' align='center' style='font-weight:bold;'>".$municipio_su."</td> </tr>
					<tr> <td colspan='2' align='center'><span>".$calle_su."</span></td> </tr>
					<tr> <td colspan='2' align='center'>COLONIA ".$colonia_su." ".$cp_su."</td> </tr>
					<tr> <td colspan='2' align='center'>TEL: ".$telefono_su."</td> </tr>
					<tr> <td colspan='2' align='center' style='border-bottom:1px dotted black;'>".$municipio_su.", ".$estado_su." </td> </tr>
					<tr> <td colspan='2'>&nbsp;</td> </tr>
					<tr> <td nowrap align='center' style='font-size:1.1em; font-weight:bold;' colspan='2'>COMPROBANTE DE GASTO</td> </tr>
					<tr> <td nowrap align='left' valign='top'> BENEFICIARIO: </td> <td align='left'>".$paciente."</td> </tr>
					<tr> <td nowrap align='left' valign='top'>ATENDIÓ:</td> <td align='left'>".$atendio."</td> </tr>
					<tr> <td width='1%' nowrap align='left' valign='top'>REF: </td> <td align='left'>".$referencia_ti."</td> </tr>
					<tr> <td colspan='2'>&nbsp;</td> </tr>
					<tr>
						<td colspan='2'>
							<table width='100%' cellpadding='2' border='0'>
								<tr>
									<td align='center'><strong>#</strong></td>
									<td align='center' width='200'><strong>CONCEPTO</strong></td>
									<td align='center' nowrap style='white-space:nowrap;'><strong>MONTO</strong></td>
								</tr>";

			mysqli_select_db($horizonte, $database_horizonte);
			$result = mysqli_query($horizonte, "SELECT vc.id_vc, c.concepto_to, vc.precio_vc from venta_conceptos vc left join conceptos c on c.id_to = vc.id_concepto_es WHERE vc.no_temp_vc = $noTemp and vc.precio_vc IS NOT NULL and vc.id_concepto_es not in(19,20,21,22,23)") or die (mysqli_error($horizonte));

			$cont = 0;
			while ( $row = mysqli_fetch_row($result) ){ $cont++; $montillo = (-1)*$row[2];
				$concepto_tabla = $concepto_tabla."<tr>
						<td align='center' valign='top'><strong>".$cont."</strong></td>
						<td align='left' valign='top'>".$row[1]."</td>
						<td align='right' valign='top' nowrap>$ ".$montillo."</td>
					</tr>";
			}

							$tabla=$tabla.$concepto_tabla."</table>
						</td>
					</tr>
					<tr> <td colspan='2'>&nbsp;</td> </tr>
					<tr> <td colspan='2' align='center'><strong>MONTO: $ ".$total_ti."</strong></td> </tr>
					<tr> <td colspan='2' align='center'>**<span id='cantidadLetraT'>".strtoupper($letras)."</span>**</td> </tr>
					<tr> <td colspan='2' align='center'><strong>ENTREGADO: $ ".$pago1."</strong></td></tr>
					<tr> <td colspan='2' align='center'>CAMBIO: $ ".$cambio."</td> </tr>
					<tr> <td colspan='2' align='center'>".$fecha." ".$hora."</td> </tr>
				</table>";
			$tabla = sqlValue($tabla, "text", $horizonte);

			$sql4 = "INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa, ticket_pa) VALUES ($precio_x, $idU_entrega, $now, ".$noRef.", $noTemp, '1', $departamento, $tabla) ";
			mysqli_select_db($horizonte, $database_horizonte);
			$insertar4 = mysqli_query($horizonte, $sql4) or die (mysqli_error($horizonte));

			if (!$insertar4) {echo $sql4;}
			else{ echo 1; }
		}
	 }
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>