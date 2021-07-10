<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

include_once '../../../recursos/session.php';
include_once '../../../Connections/database.php';
include_once '../../../recursos/utilities.php';

include_once '../../../funciones/php/cantidad_a_letras.php';

$id_user = sqlValue($_SESSION['id'], "int", $horizonte);

//Generales
 $la_refe = sqlValue($_POST["ref"], "text", $horizonte);
 $aleatorio = sqlValue(date('Y-m-d-H-i-s'), "text", $horizonte);
 $idU = sqlValue($_POST["user"], "int", $horizonte);
 $pago_c = sqlValue($_POST["pago_ov_c"], "double", $horizonte);
 $pago_i = sqlValue($_POST["pago_ov_i"], "double", $horizonte);
 $pago_l = sqlValue($_POST["pago_ov_l"], "double", $horizonte);
 $pago_f = sqlValue($_POST["pago_ov_f"], "double", $horizonte);
 $pago1 = $_POST["pago_ov_c"] + $_POST["pago_ov_i"] + $_POST["pago_ov_l"] + $_POST["pago_ov_f"];
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte); $fecha = date('Y-m-d'); $hora = date('H:i:s'); $now1 = date('Y-m-d H:i:s');
 $forma_pago_ov = sqlValue($_POST["formaPagoP"], "int", $horizonte);
 $opcion_pa = sqlValue($_POST["opcion_pa"], "int", $horizonte);

 //Si $opcion = 2, se deben borrar los pagos anteriores y poner un nuevo pago
 if($opcion_pa==2){
	 $sqlCB = "DELETE from pagos_ov where referencia_pag = $la_refe and departamento_pa is NULL ";
	 mysqli_select_db($horizonte, $database_horizonte); $insertarCB = mysqli_query($horizonte, $sqlCB) or die (mysqli_error($horizonte));
 }

 $conti = 0;

 //Generamos el ticket y lo guardamos en el pago
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultR = mysqli_query($horizonte, "SELECT o.referencia_ov, o.id_paciente_ov, o.gran_total_ov, o.usuario_ov, p.forma_pago_pag, p.no_cheque_pag, o.id_ov, o.sucursal_ov, su.no_temp_su, o.adicionales_c_ov, o.adicionales_ei_ov, o.adicionales_el_ov, o.adicionales_s_ov, o.adicionales_p_ov, o.t_desc_cta + o.t_desc_img + o.t_desc_lab + o.t_desc_serv + o.t_desc_pro, o.subtotal_ov, o.no_temp_ov from orden_venta o left join pagos_ov p on p.no_temp_pag = o.no_temp_ov left join sucursales su on su.id_su = o.sucursal_ov where o.referencia_ov = $la_refe limit 1") or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR); 
 
 $referencia_pag = sqlValue($rowR[0], "text", $horizonte); $temp_ov = sqlValue($rowR[16], "text", $horizonte); 

 mysqli_select_db($horizonte, $database_horizonte);
 $consulta6 = "SELECT sum(pago_pag) from pagos_ov where referencia_pag = $referencia_pag";
 $query6 = mysqli_query($horizonte, $consulta6) or die (mysqli_error($horizonte)); 
 $row6 = mysqli_fetch_row($query6);

 $idSucursal = sqlValue($rowR[7], "int", $horizonte); $tempSucursal = sqlValue($rowR[8], "text", $horizonte);
 $referencia_ti = $rowR[0]; $total_ti = $rowR[2]; $saldo_ti = $total_ti - $row6[0] - $pago1; $letras = valorEnLetras($total_ti);
 $adicionales_ti = $rowR[9]+$rowR[10]+$rowR[11]+$rowR[12]+$rowR[13]; $descuentos_ti = $rowR[14]; $subTotal_ti = $rowR[15];
 $abonados_anteriores = $row6[0]; $total_abonado = $abonados_anteriores + $pago1;

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
				<table width='100%' cellpadding='2' border='0'>";

mysqli_select_db($horizonte, $database_horizonte);
$result = mysqli_query($horizonte, "SELECT vc.id_vc, c.concepto_to, vc.precio_vc from venta_conceptos vc left join conceptos c on c.id_to = vc.id_concepto_es WHERE vc.no_temp_vc = $temp_ov and vc.precio_vc IS NOT NULL and vc.id_concepto_es not in(19,20,21,22,23)") or die (mysqli_error($horizonte));

$cont = 0;
while ( $row = mysqli_fetch_row($result) ){ $cont++;
	if($cont==1){
		$tabla = $tabla."<tr>
						<td align='center'><strong>#</strong></td>
						<td align='center' width='200'><strong>CONCEPTO</strong></td>
						<td align='center' nowrap style='white-space:nowrap;'><strong>PRECIO</strong></td>
					</tr>";
	}
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
		<tr> <td colspan='2' align='center'>ABONOS ANTERIORES: $ ".$abonados_anteriores."</td></tr>
		<tr> <td colspan='2' align='center'>TOTAL ABONADO: $ ".$total_abonado."</td></tr>
		<tr> <td colspan='2' align='center'>SALDO: $ ".$saldo_ti."</td> </tr>
		<tr> <td colspan='2'> <div style='text-align:center;'><strong>¡GRACIAS POR SU PREFERENCIA!</strong></div> </td> </tr>
		<tr> <td colspan='2' align='center'>".$fecha." ".$hora."</td> </tr>
		<tr> <td colspan='2' align='center'>".$sitio_web."</td> </tr>
		<tr> <td colspan='2' align='center'>".$email_su."</td> </tr>
	</table>";
$tabla = sqlValue($tabla, "text", $horizonte);

 if($_POST["pago_ov_c"]>0 and $_POST["pago_ov_c"]!=''){
	$sqlF = "INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa, ticket_pa) VALUES ($pago_c, $idU, $now, $la_refe, $aleatorio, $forma_pago_ov,'4', $tabla) ";
	mysqli_select_db($horizonte, $database_horizonte); $insertarF = mysqli_query($horizonte, $sqlF) or die (mysqli_error($horizonte)); $conti++;
 }
 if($_POST["pago_ov_i"]>0 and $_POST["pago_ov_i"]!=''){
	$sqlF1 = "INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa, ticket_pa) VALUES ($pago_i, $idU, $now, $la_refe, $aleatorio, $forma_pago_ov,'2', $tabla) ";
	mysqli_select_db($horizonte, $database_horizonte); $insertarF1 = mysqli_query($horizonte, $sqlF1) or die (mysqli_error($horizonte)); $conti++;
 }
 if($_POST["pago_ov_l"]>0 and $_POST["pago_ov_l"]!=''){
	$sqlF2 = "INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa, ticket_pa) VALUES ($pago_l, $idU, $now, $la_refe, $aleatorio, $forma_pago_ov,'1', $tabla) ";
	mysqli_select_db($horizonte, $database_horizonte); $insertarF2 = mysqli_query($horizonte, $sqlF2) or die (mysqli_error($horizonte)); $conti++;
 }
 if($_POST["pago_ov_f"]>0 and $_POST["pago_ov_f"]!=''){
	$sqlF3 = "INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa, ticket_pa) VALUES ($pago_f, $idU, $now, $la_refe, $aleatorio, $forma_pago_ov,'3', $tabla) ";
	mysqli_select_db($horizonte, $database_horizonte); $insertarF3 = mysqli_query($horizonte, $sqlF3) or die (mysqli_error($horizonte)); $conti++;
 }

 if($conti == 0){
	$sqlF4 = "INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa, ticket_pa) VALUES ('0', $idU, $now, $la_refe, $aleatorio, $forma_pago_ov,'1', $tabla) ";
	mysqli_select_db($horizonte, $database_horizonte); $insertarF4 = mysqli_query($horizonte, $sqlF4) or die (mysqli_error($horizonte));
 }

 echo '1'.'{]*}'.str_replace("'", "", $aleatorio);
	
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>