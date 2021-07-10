<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

include_once '../../funciones/php/cantidad_a_letras.php'; //id_consulta_to

 $id_user = sqlValue($_SESSION['id'], "int", $horizonte);
 
 $id_paciente = sqlValue($_POST["id_paciente_ov"], "int", $horizonte);
 $idU = sqlValue($_POST["id_usr_reg"], "int", $horizonte);
 $id_sucu = sqlValue($_POST["sucursal_fi_p"], "int", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorio_ov"], "text", $horizonte); $id_medico_consulta = 1;
 $id_consulta = '';
 if(isset($_POST["beneficio_c1"])){$id_convenio_consulta = sqlValue($_POST["beneficio_c1"], "int", $horizonte);}else{$id_convenio_consulta = '';} 
 if(isset($_POST["medico_i"])){$id_medico_imagen = sqlValue($_POST["medico_i"], "int", $horizonte);}else{$id_medico_imagen = '';}
 if(isset($_POST["medico_l"])){$id_medico_laboratorio = sqlValue($_POST["medico_l"], "int", $horizonte);}else{$id_medico_laboratorio = '';}
 if(isset($_POST["medico_s"])){$id_medico_servicios = sqlValue($_POST["medico_s"], "int", $horizonte);}else{$id_medico_servicios = $id_user;}
 $motivo_consulta = sqlValue(mb_strtoupper($_POST["motivo_c1"]), "text", $horizonte);
 $motivo_imagen = sqlValue(mb_strtoupper($_POST["motivo_i"]), "text", $horizonte);
 $motivo_laboratorio = sqlValue(mb_strtoupper($_POST["motivo_l"]), "text", $horizonte);
 $motivo_servicios = sqlValue(mb_strtoupper($_POST["motivo_s"]), "text", $horizonte);
 
 if($_POST["po_descuento_c1"]==''){$porcentaje_descuento_consulta = 0;}else{$porcentaje_descuento_consulta = sqlValue($_POST["po_descuento_c1"], "int", $horizonte);}
 if($_POST["da_descuento_c1"]==''){$descuento_directo_consulta = 0;}else{$descuento_directo_consulta = sqlValue($_POST["da_descuento_c1"], "double", $horizonte);}
 if($_POST["to_descuento_c1"]==''){$total_descuento_consulta = 0;}else{$total_descuento_consulta = sqlValue($_POST["to_descuento_c1"], "double", $horizonte);}
 if($_POST["cargo_extra_c1"]==''){$cargo_extra_consulta = 0;}else{$cargo_extra_consulta = sqlValue($_POST["cargo_extra_c1"], "double", $horizonte);}
 
 if($_POST["po_descuento_i"]==''){$porcentaje_descuento_imagen = 0;}else{$porcentaje_descuento_imagen = sqlValue($_POST["po_descuento_i"], "int", $horizonte);}
 if($_POST["da_descuento_i"]==''){$descuento_directo_imagen = 0;}else{$descuento_directo_imagen = sqlValue($_POST["da_descuento_i"], "double", $horizonte);}
 if($_POST["to_descuento_i"]==''){$total_descuento_imagen = 0;}else{$total_descuento_imagen = sqlValue($_POST["to_descuento_i"], "double", $horizonte);}
 if($_POST["cargo_extra_i"]==''){$cargo_extra_imagen = 0;}else{$cargo_extra_imagen = sqlValue($_POST["cargo_extra_i"], "double", $horizonte);}
 
 if($_POST["po_descuento_l"]==''){$porcentaje_descuento_laboratorio=0;}else{$porcentaje_descuento_laboratorio=sqlValue($_POST["po_descuento_l"], "int", $horizonte);}
 if($_POST["da_descuento_l"]==''){$descuento_directo_laboratorio=0;}else{$descuento_directo_laboratorio=sqlValue($_POST["da_descuento_l"], "double", $horizonte);}
 if($_POST["to_descuento_l"]==''){$total_descuento_laboratorio = 0;}else{$total_descuento_laboratorio = sqlValue($_POST["to_descuento_l"], "double", $horizonte);}
 if($_POST["cargo_extra_l"]==''){$cargo_extra_laboratorio = 0;}else{$cargo_extra_laboratorio = sqlValue($_POST["cargo_extra_l"], "double", $horizonte);}
 
 if($_POST["po_descuento_s"]==''){$porcentaje_descuento_servicios=0;}else{$porcentaje_descuento_servicios = sqlValue($_POST["po_descuento_s"], "int", $horizonte);}
 if($_POST["da_descuento_s"]==''){$descuento_directo_servicios = 0;}else{$descuento_directo_servicios = sqlValue($_POST["da_descuento_s"], "double", $horizonte);}
 if($_POST["to_descuento_s"]==''){$total_descuento_servicios = 0;}else{$total_descuento_servicios = sqlValue($_POST["to_descuento_s"], "double", $horizonte);}
 if($_POST["cargo_extra_s"]==''){$cargo_extra_servicios = 0;}else{$cargo_extra_servicios = sqlValue($_POST["cargo_extra_s"], "double", $horizonte);}
 
 if($_POST["po_descuento_p"]==''){$porcentaje_descuento_productos=0;}else{$porcentaje_descuento_productos = sqlValue($_POST["po_descuento_p"], "int", $horizonte);}
 if($_POST["da_descuento_p"]==''){$descuento_directo_productos = 0;}else{$descuento_directo_productos = sqlValue($_POST["da_descuento_p"], "double", $horizonte);}
 if($_POST["to_descuento_p"]==''){$total_descuento_productos = 0;}else{$total_descuento_productos = sqlValue($_POST["to_descuento_p"], "double", $horizonte);}
 if($_POST["cargo_extra_p"]==''){$cargo_extra_productos = 0;}else{$cargo_extra_productos = sqlValue($_POST["cargo_extra_p"], "double", $horizonte);}
 
 $motivo_extras_consulta = sqlValue(mb_strtoupper($_POST["motivo_descuento_c1"]), "text", $horizonte); //No se guarda en ningún lado
 $precio_consulta = sqlValue($_POST["precio_c1"], "double", $horizonte);
 $precio_imagen = sqlValue($_POST["precio_i"], "double", $horizonte);
 $precio_laboratorio = sqlValue($_POST["precio_l"], "double", $horizonte);
 $precio_servicios = sqlValue($_POST["precio_s"], "double", $horizonte);
 $precio_productos = sqlValue($_POST["precio_p"], "double", $horizonte);
 
 $total_consulta = sqlValue($_POST["total_c1"], "double", $horizonte);
 $total_imagen = sqlValue($_POST["total_i"], "double", $horizonte);
 $total_laboratorio = sqlValue($_POST["total_l"], "double", $horizonte);
 $total_servicios = sqlValue($_POST["total_s"], "double", $horizonte);
 $total_productos = sqlValue($_POST["total_p"], "double", $horizonte);
 $subtotal = sqlValue($_POST["precio_c1"]+$_POST["precio_i"]+$_POST["precio_l"]+$_POST["precio_s"]+$_POST["precio_p"], "double", $horizonte);
 $iva_ov = sqlValue($_POST["iva_ov_h"], "double", $horizonte);
 $total_ov = sqlValue($_POST["total_ov_h"], "double", $horizonte);
 $forma_pago_ov = sqlValue($_POST["forma_pago_ov"], "int", $horizonte);
 $facturada_ov = sqlValue($_POST["hay_iva_ov"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte); $fecha = date('Y-m-d'); $hora = date('H:i:s'); $now1 = date('Y-m-d H:i:s');
 
 $pago_ov_a = sqlValue($_POST["pago_ov_c"], "double", $horizonte);
 $pago_ov_i = sqlValue($_POST["pago_ov_i"], "double", $horizonte);
 $pago_ov_l = sqlValue($_POST["pago_ov_l"], "double", $horizonte);
 $pago_ov_f = sqlValue($_POST["pago_ov_f"], "double", $horizonte);
 
 $pago1 = $_POST["pago_ov_c"] + $_POST["pago_ov_i"] + $_POST["pago_ov_l"] + $_POST["pago_ov_f"];
 
 $contador = 0; $noRef=0;
 
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte); $fecha1="'".date('Y-m-d')." 00:00:00"."'"; $fecha2="'".date('Y-m-d')." 23:59:59"."'"; $da=date('Ymd');
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultR = mysqli_query($horizonte, "SELECT count(id_ov) from orden_venta where fecha_venta_ov between ".$fecha1." and ".$fecha2." ") or die(mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR);

 if($rowR[0]==0){ $noRef=$da."-"."1"; $noRef="'".$noRef."'"; $contador = 1;} else{ $daa=$rowR[0]+1; $noRef=$da."-".$daa; $noRef="'".$noRef."'"; $contador = $daa;}
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultRsq = mysqli_query($horizonte, "SELECT count(id_ov) from orden_venta where referencia_ov = ".$noRef." ") or die(mysqli_error($horizonte));
 $rowRsq = mysqli_fetch_row($resultRsq);
 
 if($rowRsq[0]>0){
	mysqli_select_db($horizonte, $database_horizonte);
 	$resultRG = mysqli_query($horizonte, "SELECT max(contador_ov), referencia_ov from orden_venta where fecha_venta_ov between ".$fecha1." and ".$fecha2." limit 1 ") or die(mysqli_error($horizonte));
 	$rowRG = mysqli_fetch_row($resultRG);//echo sqlValue($rowRG[0], "int", $horizonte);
	 
	$porciones = explode("-", sqlValue($rowRG[1], "text", $horizonte)); $a = $rowRG[0]+1; $contador = $a; $noRef = $porciones[0]."-".$a; $noRef=$noRef."'";
 }
 //echo $noRef;
  
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO orden_venta(total_c, subtotal_ov, gran_total_ov, sub_total_c, usuario_ov, id_paciente_ov, fecha_venta_ov, adicionales_c_ov, p_desc_cta, desc_d_cta, t_desc_cta, motivo_c_ov, medico_c_ov, referencia_ov, contador_ov, sucursal_ov, no_temp_ov, total_ei, total_el, total_s, sub_total_i, sub_total_l, sub_total_s, adicionales_ei_ov, adicionales_el_ov, adicionales_s_ov, medico_ei_ov, medico_el_ov, personal_s_ov, observaciones_i_ov, observaciones_l_ov, observaciones_s_ov, p_desc_img, desc_d_img, t_desc_img, p_desc_lab, desc_d_lab, t_desc_lab, p_desc_serv, desc_d_serv, t_desc_serv, iva_ov, total_p, sub_total_p, adicionales_p_ov, p_desc_pro, desc_d_pro, t_desc_pro, motivo_desc_c_ov) VALUES ($total_consulta, $subtotal, $total_ov, $precio_consulta, $idU, $id_paciente, $now, $cargo_extra_consulta, $porcentaje_descuento_consulta, $descuento_directo_consulta, $total_descuento_consulta, $motivo_consulta, $id_medico_consulta, ".$noRef.", $contador, $id_sucu, $aleatorio, $total_imagen, $total_laboratorio, $total_servicios, $precio_imagen, $precio_laboratorio, $precio_servicios, $cargo_extra_imagen, $cargo_extra_laboratorio, $cargo_extra_servicios, $id_medico_imagen, $id_medico_laboratorio, $id_medico_servicios, $motivo_imagen, $motivo_laboratorio, $motivo_servicios, $porcentaje_descuento_imagen, $descuento_directo_imagen, $total_descuento_imagen, $porcentaje_descuento_laboratorio, $descuento_directo_laboratorio, $total_descuento_laboratorio, $porcentaje_descuento_servicios, $descuento_directo_servicios, $total_descuento_servicios, $iva_ov, $total_productos, $precio_productos, $cargo_extra_productos, $porcentaje_descuento_productos, $descuento_directo_productos, $total_descuento_productos, $motivo_extras_consulta)";
   
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) {echo $sql;}
 else{ 
	mysqli_select_db($horizonte, $database_horizonte);
 	$resultR4 =mysqli_query($horizonte, "SELECT referencia_ov from orden_venta order by id_ov desc limit 1 ") or die(mysqli_error($horizonte));
 	$rowR4 = mysqli_fetch_row($resultR4); $la_refe = sqlValue($rowR4[0], "text", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta = "SELECT id_vc, id_conceptos_beneficios from venta_conceptos where no_temp_vc = $aleatorio";
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
	
	$c = 0;
	while ($fila = mysqli_fetch_array($query)) { $c++;
		$id = $fila['id_vc'];  $idCB = $fila['id_conceptos_beneficios'];
		$refi = "-".$c; 
		$referencia = sqlValue($rowR4[0], "text", $horizonte).sqlValue($refi, "text", $horizonte);
		$referencia = sqlValue(str_replace("'","",$referencia), "text", $horizonte);$referenciaOV = sqlValue($rowR4[0], "text", $horizonte);
		$sql1 = "UPDATE venta_conceptos SET temporal_vc = 0, referencia_vc = $referenciaOV, contador_vc = $c where id_vc = $id";
		//Ahora actualizamos la fecha de usado del concepto del beneficio dle paciente
		$sqlCB = "UPDATE conceptos_paquetes SET usado_cb = 1, fecha_usado_cb = $now where id_cb = $idCB limit 1";
 
 		mysqli_select_db($horizonte, $database_horizonte);
 		$insertar = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
		
		mysqli_select_db($horizonte, $database_horizonte);
 		$insertarCB = mysqli_query($horizonte, $sqlCB) or die (mysqli_error($horizonte));
	}; $conti = 0;
	 
	//Generamos el ticket y lo guardamos en el pago
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $resultR = mysqli_query($horizonte, "SELECT o.referencia_ov, o.id_paciente_ov, o.gran_total_ov, o.usuario_ov, p.forma_pago_pag, p.no_cheque_pag, o.id_ov, o.sucursal_ov, su.no_temp_su, o.adicionales_c_ov, o.adicionales_ei_ov, o.adicionales_el_ov, o.adicionales_s_ov, o.adicionales_p_ov, o.t_desc_cta + o.t_desc_img + o.t_desc_lab + o.t_desc_serv + o.t_desc_pro, o.subtotal_ov from orden_venta o left join pagos_ov p on p.no_temp_pag = o.no_temp_ov left join sucursales su on su.id_su = o.sucursal_ov where o.no_temp_ov = $aleatorio limit 1") or die (mysqli_error($horizonte));
	 $rowR = mysqli_fetch_row($resultR); $idSucursal = sqlValue($rowR[7], "int", $horizonte); $tempSucursal = sqlValue($rowR[8], "text", $horizonte);
	 $referencia_ti = $rowR[0]; $total_ti = $rowR[2]; $saldo_ti = $total_ti - $pago1; $letras = valorEnLetras($total_ti);
	 $adicionales_ti = $rowR[9]+$rowR[10]+$rowR[11]+$rowR[12]+$rowR[13]; $descuentos_ti = $rowR[14]; $subTotal_ti = $rowR[15];

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
			<tr> <td nowrap align='center' style='font-size:1.1em; font-weight:bold;' colspan='2'>COMPROBANTE DE PAGO</td> </tr>
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
	$result = mysqli_query($horizonte, "SELECT vc.id_vc, c.concepto_to, vc.precio_vc from venta_conceptos vc left join conceptos c on c.id_to = vc.id_concepto_es WHERE vc.no_temp_vc = $aleatorio and vc.precio_vc IS NOT NULL and vc.id_concepto_es not in(19,20,21,22,23)") or die (mysqli_error($horizonte));

	$cont = 0;
	while ( $row = mysqli_fetch_row($result) ){ $cont++;
		$concepto_tabla = $concepto_tabla."<tr>
				<td align='center' valign='top'><strong>".$cont."</strong></td>
				<td align='left' valign='top'>".$row[1]."</td>
				<td align='right' valign='top' nowrap>$ ".$row[2]."</td>
			</tr>";
	}

					$tabla=$tabla.$concepto_tabla."</table>
				</td>
			</tr>
			<tr> <td colspan='2'>&nbsp;</td> </tr>
			<tr> <td colspan='2' align='center'>SUBTOTAL: $ ".$subTotal_ti."</td> </tr>
			<tr> <td colspan='2' align='center'>CARGOS ADICIONALES: $ ".$adicionales_ti."</td> </tr>
			<tr> <td colspan='2' align='center'>DESCUENTOS: $ ".$descuentos_ti."</td> </tr>
			<tr> <td colspan='2' align='center'><strong>TOTAL: $ ".$total_ti."</strong></td> </tr>
			<tr> <td colspan='2' align='center'>**<span id='cantidadLetraT'>".strtoupper($letras)."</span>**</td> </tr>
			<tr> <td colspan='2' align='center'><strong>SU PAGO: $ ".$pago1."</strong></td></tr>
			<tr> <td colspan='2' align='center'>SALDO: $ ".$saldo_ti."</td> </tr>
			<tr> <td colspan='2'> <div style='text-align:center;'><strong>¡GRACIAS POR SU PREFERENCIA!</strong></div> </td> </tr>
			<tr> <td colspan='2' align='center'>".$fecha." ".$hora."</td> </tr>
			<tr> <td colspan='2' align='center'>".$sitio_web."</td> </tr>
			<tr> <td colspan='2' align='center'>".$email_su."</td> </tr>
		</table>";
	$tabla = sqlValue($tabla, "text", $horizonte);
	
	if($_POST["pago_ov_c"]>0 and $_POST["pago_ov_c"]!=''){
		$sqlF = "INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa, ticket_pa) VALUES ($pago_ov_a, $idU, $now, $la_refe, $aleatorio, $forma_pago_ov,'4', $tabla) ";
		mysqli_select_db($horizonte, $database_horizonte); $insertarF = mysqli_query($horizonte, $sqlF) or die (mysqli_error($horizonte)); $conti++;
	}
	if($_POST["pago_ov_i"]>0 and $_POST["pago_ov_i"]!=''){
		$sqlF1 = "INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa, ticket_pa) VALUES ($pago_ov_i, $idU, $now, $la_refe, $aleatorio, $forma_pago_ov,'2', $tabla) ";
		mysqli_select_db($horizonte, $database_horizonte); $insertarF1 = mysqli_query($horizonte, $sqlF1) or die (mysqli_error($horizonte)); $conti++;
	}
	if($_POST["pago_ov_l"]>0 and $_POST["pago_ov_l"]!=''){
		$sqlF2 = "INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa, ticket_pa) VALUES ($pago_ov_l, $idU, $now, $la_refe, $aleatorio, $forma_pago_ov,'1', $tabla) ";
		mysqli_select_db($horizonte, $database_horizonte); $insertarF2 = mysqli_query($horizonte, $sqlF2) or die (mysqli_error($horizonte)); $conti++;
	}
	if($_POST["pago_ov_f"]>0 and $_POST["pago_ov_f"]!=''){
		$sqlF3 = "INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa, ticket_pa) VALUES ($pago_ov_f, $idU, $now, $la_refe, $aleatorio, $forma_pago_ov,'3', $tabla) ";
		mysqli_select_db($horizonte, $database_horizonte); $insertarF3 = mysqli_query($horizonte, $sqlF3) or die (mysqli_error($horizonte)); $conti++;
	}
	 
	if($conti == 0){
		$sqlF4 = "INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa, ticket_pa) VALUES ('0', $idU, $now, $la_refe, $aleatorio, $forma_pago_ov,'1', $tabla) ";
		mysqli_select_db($horizonte, $database_horizonte); $insertarF4 = mysqli_query($horizonte, $sqlF4) or die (mysqli_error($horizonte));
	}
	 
	//Si todos los pagos son igual a cero, debemos poner por lo menos un pago igual a cero para que la orden se vea en corte de caja.
	echo '1'.';]'.$rowR4[0];
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>