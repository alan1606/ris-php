<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

include_once '../../funciones/php/cantidad_a_letras.php';

 $id_user = $_SESSION['id']; $acceso_user = $_SESSION['MM_UserGroup']; $id_user_sucursal = $_SESSION['MM_Usersucu'];
 $id_p = sqlValue($_POST["id_p"], "int", $horizonte);
 $ids_ctos = sqlValue($_POST["ids_ctos"], "text", $horizonte); //Son los id_cb de conceptos_paquetes
 $aleatorio = sqlValue($_POST["no_aleatorio"], "text", $horizonte);
 $abono = sqlValue($_POST["abono"], "double", $horizonte);
 $numero_conceptos = sqlValue($_POST["no_ctos"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte); $fecha = date('Y-m-d'); $hora = date('H:i:s'); $now1 = date('Y-m-d H:i:s');
 $id_de_conceptos = explode(";", $_POST["ids_ctos"]); $primer_id_cto = $id_de_conceptos[0]; 

 mysqli_select_db($horizonte, $database_horizonte); //Sacamos el id del paquete de los conceptos
 $consulta1 = "SELECT id_convenio_paciente_cb from conceptos_paquetes where id_cb = $primer_id_cto";
 $query1 = mysqli_query($horizonte, $consulta1) or die (mysqli_error($horizonte)); $row1 = mysqli_fetch_row($query1); //echo $consulta1;

 $idConvenio = sqlValue($row1[0], "int", $horizonte); //El id del paquete
 $precio = sqlValue(0, "double", $horizonte);
 $id_con_bene = sqlValue(1, "int", $horizonte);
 $ceros = sqlValue(0, "int", $horizonte);
 $motivos = sqlValue('', "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $resultNP = mysqli_query($horizonte, "SELECT c.concepto_to, c.precio_to, p.no_temp_pq, p.folio_pq, pa.nombre_completo_p, p.activo_pq from paquetes p left join conceptos c on c.id_to = p.id_paquete_pq left join pacientes pa on pa.id_p = p.id_paciente_pq where p.id_pq = $idConvenio") or die(mysqli_error($horizonte));
 $rowNP = mysqli_fetch_row($resultNP); $aleatorio_pq = sqlValue($rowNP[2], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $consulta5 = "SELECT referencia_ov from orden_venta where no_temp_ov = $aleatorio_pq limit 1";
 $query5 = mysqli_query($horizonte, $consulta5) or die (mysqli_error($horizonte)); 
 $row5 = mysqli_fetch_row($query5); $referenciaPOV = sqlValue($row5[0], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $consulta6 = "SELECT sum(pago_pag) from pagos_ov where referencia_pag = $referenciaPOV";
 $query6 = mysqli_query($horizonte, $consulta6) or die (mysqli_error($horizonte)); 
 $row6 = mysqli_fetch_row($query6); $saldo = $rowNP[1] - $row6[0];

 //creamos el registro en orden_venta
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

 $id_sucu = sqlValue($id_user_sucursal, "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql4 = "INSERT INTO orden_venta(total_c, subtotal_ov, gran_total_ov, sub_total_c, usuario_ov, id_paciente_ov, fecha_venta_ov, adicionales_c_ov, p_desc_cta, desc_d_cta, t_desc_cta, motivo_c_ov, medico_c_ov, referencia_ov, contador_ov, sucursal_ov, no_temp_ov, total_ei, total_el, total_s, sub_total_i, sub_total_l, sub_total_s, adicionales_ei_ov, adicionales_el_ov, adicionales_s_ov, medico_ei_ov, medico_el_ov, personal_s_ov, observaciones_i_ov, observaciones_l_ov, observaciones_s_ov, p_desc_img, desc_d_img, t_desc_img, p_desc_lab, desc_d_lab, t_desc_lab, p_desc_serv, desc_d_serv, t_desc_serv, iva_ov, total_p, sub_total_p, adicionales_p_ov, p_desc_pro, desc_d_pro, t_desc_pro, motivo_desc_c_ov) VALUES ($ceros, $precio, $precio, $ceros, $id_user, $id_p, $now, $ceros, $ceros, $ceros, $ceros, $motivos, $id_user, ".$noRef.", $contador, $id_sucu, $aleatorio, $ceros, $ceros, $precio, $ceros, $ceros, $precio, $ceros, $ceros, $ceros, $id_user, $id_user, $id_user, $motivos, $motivos, $motivos, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $ceros, $motivos)";

 $update4 = mysqli_query($horizonte, $sql4) or die (mysqli_error($horizonte));

 if (!$update4) {echo $sql4;}
 else{//Creamos un registro en pagos con valor de 0
	 $sql5 = "
	 		INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa) 
			VALUES ($precio, $id_user, $now, ".$noRef.", $aleatorio, '1','4') 
	 ";
	 
	 mysqli_select_db($horizonte, $database_horizonte);
	 $insertar5 = mysqli_query($horizonte, $sql5) or die (mysqli_error($horizonte));
	 if (!$insertar5) {echo $sql5;}
 	 else{
		 $contador = 0;
		 //Creamos los registros en venta_conceptos Y Usamos los conceptos en la tabla de conceptos_paquetes
			//Las consultas se asignarán a su médico, imagen y lab a quien corresponda, servicios y farmacia al usuario que atiende
		 for($i=0;$i<$numero_conceptos;$i++){//Ciclo de numero de vueltas = número de conceptos
			 //Debemos obtener id_concepto
			 $id_cb = $id_de_conceptos[$i]; //echo 'concepto '.$i.' es:'.$id_cb.'.';

			 mysqli_select_db($horizonte, $database_horizonte); //Sacamos el id del paquete de los conceptos
			 $consulta2 = "SELECT c.id_concepto_ac from conceptos_paquetes cp left join asigna_conceptos_paquetes c on c.id_ac = cp.id_concepto_convenio_cb where cp.id_cb = $id_cb";
			 $query2 = mysqli_query($horizonte, $consulta2) or die (mysqli_error($horizonte)); $row2 = mysqli_fetch_row($query2);
			 $id_concepto = sqlValue($row2[0], "int", $horizonte); $contador = $i+1;

			 mysqli_select_db($horizonte, $database_horizonte); 
			 $sql1="INSERT INTO venta_conceptos(no_temp_vc,id_paciente_vc,id_usuario_vc,id_personal_medico_vc,id_concepto_es,id_convenio_vc,fecha_venta_vc,precio_vc,usuarioEdo1_e,fechaEdo1_e,id_conceptos_beneficios, temporal_vc, contador_vc, referencia_vc)";
			 $sql1.="VALUES ($aleatorio, $id_p, $id_user, $id_user, $id_concepto, $idConvenio, $now, $precio, $id_user, $now, $id_con_bene, $ceros, $contador,".$noRef.")"; //echo $sql1;

			 $update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
			 if(!$update1){ echo $sql1; }else{//Actualizamos la tabla conceptos_paquetes, marcando usados
				 mysqli_select_db($horizonte, $database_horizonte); 
				 $sql2 = "UPDATE conceptos_paquetes SET usado_cb = 1, fecha_usado_cb = $now where id_cb = $id_cb";

				 $update2 = mysqli_query($horizonte, $sql2) or die (mysqli_error($horizonte));
				 if(!$update2){ echo $sql2; }else{//checamos la tabla conceptos_paquetes y si todos los conceptos han sido usados, finalizamos el paquete
					mysqli_select_db($horizonte, $database_horizonte);
					$consulta3 = "SELECT count(id_cb) from conceptos_paquetes where id_convenio_paciente_cb = $idConvenio and usado_cb = 0";
					$query3 = mysqli_query($horizonte, $consulta3) or die (mysqli_error($horizonte)); 
					$row3 = mysqli_fetch_row($query3);
					if($row3[0]<1){//Ya no hay conceptos disponibles para este paquete y debe ser finalizado
						 mysqli_select_db($horizonte, $database_horizonte); 
						 $sql3 = "UPDATE paquetes SET activo_pq = 0, fecha_fin_pq = $now where id_pq = $idConvenio limit 1";
						 $update3 = mysqli_query($horizonte, $sql3) or die (mysqli_error($horizonte));
						 if(!$update3){ echo $sql3; }else{}
					}
				 }
			 }
		 }
		 //Generamos el ticket y lo guardamos en el pago
		 mysqli_select_db($horizonte, $database_horizonte); 
		 $resultR = mysqli_query($horizonte, "SELECT o.referencia_ov, o.id_paciente_ov, o.adicionales_ei_ov, o.adicionales_el_ov, o.adicionales_s_ov, o.gran_total_ov, sum(p.pago_pag), p.pago_pag-o.gran_total_ov, o.usuario_ov, o.adicionales_c_ov, p.forma_pago_pag, p.no_cheque_pag, o.id_ov, o.adicionales_ei_ov, o.adicionales_el_ov, o.adicionales_s_ov, o.sucursal_ov, o.t_desc_cta + o.t_desc_img + o.t_desc_lab + o.t_desc_serv + o.t_desc_pro, su.no_temp_su, o.iva_ov, o.subtotal_ov, sum(p.pago_pag), o.gran_total_ov-sum(p.pago_pag), o.adicionales_p_ov from orden_venta o left join pagos_ov p on p.referencia_pag = o.referencia_ov left join sucursales su on su.id_su = o.sucursal_ov where o.referencia_ov = $noRef order by p.id_pag desc") or die (mysqli_error($horizonte));
		 $rowR = mysqli_fetch_row($resultR); 
		 
		 $idSucursal = sqlValue($rowR[16], "int", $horizonte); $tempSucursal = sqlValue($rowR[18], "text", $horizonte);
		 $referencia_ti = $rowR[0]; $letras = valorEnLetras($rowNP[1]);

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
		 $resultP = mysqli_query($horizonte, "SELECT nombre_completo_p from pacientes where id_p = $rowR[1] limit 1") or die (mysqli_error($horizonte));
		 $rowP = mysqli_fetch_row($resultP); $paciente = $rowP[0];

		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultU = mysqli_query($horizonte, "SELECT concat(nombre_u, ' ', apaterno_u) from usuarios where id_u = $id_user limit 1") or die (mysqli_error($horizonte));
		 $rowU = mysqli_fetch_row($resultU); $atendio = $rowU[0]; $concepto_tabla = "";

		$tabla = "<table width='280px' class='table' style='margin-left:-25px;' id='tablaTicket' cellpadding='2'>
				<tr> <td colspan='2' align='center'>".$logo."</td> </tr>
				<tr> <td colspan='2' align='center' style='font-weight:bold;'>".$municipio_su."</td> </tr>
				<tr> <td colspan='2' align='center'><span>".$calle_su."</span></td> </tr>
				<tr> <td colspan='2' align='center'>COLONIA ".$colonia_su." ".$cp_su."</td> </tr>
				<tr> <td colspan='2' align='center'>TEL: ".$telefono_su."</td> </tr>
				<tr> <td colspan='2' align='center' style='border-bottom:1px dotted black;'>".$municipio_su.", ".$estado_su." </td> </tr>
				<tr> <td colspan='2'>&nbsp;</td> </tr>
				<tr> <td nowrap align='center' style='font-size:1.1em; font-weight:bold;' colspan='2'>COMPROBANTE DE ORDEN</td> </tr>
				<tr> <td nowrap align='left' valign='top'> CLIENTE: </td> <td align='left'>".$paciente."</td> </tr>
				<tr> <td nowrap align='left' valign='top'>ATENDIÓ:</td> <td align='left'>".$atendio."</td> </tr>
				<tr> <td width='1%' nowrap align='left' valign='top'>REF: </td> <td align='left'>".$referencia_ti."</td> </tr>
				<tr> <td colspan='2'>&nbsp;</td> </tr>
				<tr>
					<td colspan='2'>
						<table width='100%' cellpadding='2' border='0'>
							<tr>
								<td align='center'><strong>#</strong></td>
								<td align='center' width='200'><strong>CONCEPTO</strong></td>
								<td align='center' nowrap style='white-space:nowrap;'><strong>PRECIO</strong></td>
							</tr>";
		 
		mysqli_select_db($horizonte, $database_horizonte);
		$resultTC = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where no_temp_vc = $aleatorio and precio_vc IS NOT NULL and id_concepto_es not in(19,20,21,22,23)") or die (mysqli_error($horizonte));
		$rowTC = mysqli_fetch_row($resultTC); $num_conceptos = $rowTC[0];

		mysqli_select_db($horizonte, $database_horizonte);
		$result = mysqli_query($horizonte, "SELECT vc.id_vc, c.concepto_to, vc.precio_vc from venta_conceptos vc left join conceptos c on c.id_to = vc.id_concepto_es WHERE vc.no_temp_vc = $aleatorio and vc.precio_vc IS NOT NULL and vc.id_concepto_es not in(19,20,21,22,23)") or die (mysqli_error($horizonte));

		$cont = 0;
		while ( $row = mysqli_fetch_row($result) ){ $cont++;
			$concepto_tabla = $concepto_tabla."<tr>
					<td align='center' valign='top'><strong>".$cont."</strong></td>
					<td align='left' valign='top'>".$row[1]."</td>
					<td align='right' valign='top'>$ 0.00</td>
				</tr>";
			if($cont == $num_conceptos){//Acaba el ciclo de los conceptos d ela orden generada
				$tabla=$tabla.$concepto_tabla."</table>
							</td>
						</tr>
						<tr> <td colspan='2' align='center'><strong>- ".$rowNP[0]." -</strong></td> </tr>
						<tr> <td colspan='2'>&nbsp;</td> </tr>
						<tr> <td colspan='2' align='center'><strong>TOTAL DEL PAQUETE: $ ".$rowNP[1]."</strong></td> </tr>
						<tr> <td colspan='2' align='center'>**<span id='cantidadLetraT'>".strtoupper($letras)."</span>**</td> </tr>
						<tr> <td colspan='2' align='center'><strong>SU PAGO: $ 0.00</strong></td></tr>
						<tr> <td colspan='2' align='center'>SALDO ACTUAL: $ ".$saldo."</td> </tr>
						<tr> <td colspan='2' align='center'>ABONADO: $ ".$row6[0]."</td> </tr>
						<tr> <td colspan='2'> <div style='text-align:center;'><strong>¡GRACIAS POR SU PREFERENCIA!</strong></div> </td> </tr>
						<tr> <td colspan='2' align='center'>".$fecha." ".$hora."</td> </tr>
						<tr> <td colspan='2' align='center'>".$sitio_web."</td> </tr>
						<tr> <td colspan='2' align='center'>".$email_su."</td> </tr>
					</table>";
				$tabla = sqlValue($tabla, "text", $horizonte);

				$sqlT = "UPDATE pagos_ov SET ticket_pa = $tabla where no_temp_pag = $aleatorio limit 1";
				mysqli_select_db($horizonte, $database_horizonte);
				$insertarT = mysqli_query($horizonte, $sqlT) or die (mysqli_error($horizonte));

				if(!$insertarT){echo $sqlT;}else{
					echo '1'.'];'.str_replace("'", "", $aleatorio).'];'.$rowNP[0].'];'.$rowNP[1].'];'.$row6[0].'];'.$saldo.'];'.$idConvenio.'];'.$rowNP[3].'];'.$rowNP[4].'];'.$rowNP[5];
				}
			}
		}				
	 }
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>