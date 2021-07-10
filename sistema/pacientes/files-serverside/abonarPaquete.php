<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

include_once '../../funciones/php/cantidad_a_letras.php';

 $idU = sqlValue($_POST["id_u"], "int", $horizonte);
 $pago = sqlValue($_POST["pago"], "double", $horizonte); $pago1 = $_POST["pago"];
 $idPQ = sqlValue($_POST["id_pq"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $aleatorio = sqlValue(date('Y-m-d-H-i-s'), "text", $horizonte);
 $fecha = date('Y-m-d'); $hora = date('H:i:s'); $now1 = date('Y-m-d H:i:s');

 mysqli_select_db($horizonte, $database_horizonte);
 $resultA = mysqli_query($horizonte, "SELECT o.referencia_ov, c.concepto_to, p.folio_pq, pa.nombre_completo_p, p.activo_pq, c.precio_to from paquetes p left join orden_venta o on o.no_temp_ov = p.no_temp_pq left join conceptos c on c.id_to = p.id_paquete_pq left join pacientes pa on pa.id_p = p.id_paciente_pq where p.id_pq = $idPQ limit 1;") or die(mysqli_error($horizonte));
 $rowA = mysqli_fetch_row($resultA); $referencia = sqlValue($rowA[0], "text", $horizonte);

 //Generamos el ticket y lo guardamos en pagos
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultR = mysqli_query($horizonte, "SELECT o.referencia_ov, o.id_paciente_ov, o.gran_total_ov, o.usuario_ov, o.sucursal_ov, su.no_temp_su from orden_venta o left join pagos_ov p on p.no_temp_pag = o.no_temp_ov left join sucursales su on su.id_su = o.sucursal_ov where o.referencia_ov = $referencia limit 1") or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR); $referencia_ti = $rowR[0]; $referencia_pag = sqlValue($rowR[0], "text", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte);
 $consulta6 = "SELECT sum(pago_pag) from pagos_ov where referencia_pag = $referencia_pag";
 $query6 = mysqli_query($horizonte, $consulta6) or die (mysqli_error($horizonte)); 
 $row6 = mysqli_fetch_row($query6);

 $idSucursal = sqlValue($rowR[4], "int", $horizonte); $tempSucursal = sqlValue($rowR[5], "text", $horizonte);
 $total_ti = $rowA[5]; $abonados_anteriores = $row6[0]; $saldo_ti = $rowA[5] - $row6[0] - $pago1; $letras = valorEnLetras($total_ti);
 $total_abonado = $abonados_anteriores + $pago1;

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

 $paciente = $rowA[3];

 mysqli_select_db($horizonte, $database_horizonte);
 $resultU = mysqli_query($horizonte, "SELECT concat(nombre_u, ' ', apaterno_u) from usuarios where id_u = $idU limit 1") or die (mysqli_error($horizonte));
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
$result = mysqli_query($horizonte, "SELECT vc.id_vc, c.concepto_to, vc.precio_vc from venta_conceptos vc left join conceptos c on c.id_to = vc.id_concepto_es WHERE vc.no_temp_vc = $aleatorio and vc.precio_vc IS NOT NULL and vc.id_concepto_es not in(19,20,21,22,23)") or die (mysqli_error($horizonte));

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
		<tr> <td colspan='2' align='center'><strong>- ".$rowA[1]." -</strong></td> </tr>
		<tr> <td colspan='2'>&nbsp;</td> </tr>
		<tr> <td colspan='2' align='center'><strong>TOTAL DEL PAQUETE: $ ".$total_ti."</strong></td> </tr>
		<tr> <td colspan='2' align='center'>**<span id='cantidadLetraT'>".strtoupper($letras)."</span>**</td> </tr>
		<tr> <td colspan='2' align='center'><strong>SU PAGO: $ ".$pago1."</strong></td></tr>
		<tr> <td colspan='2' align='center'>ABONOS ANTERIORES: $ ".$abonados_anteriores."</td></tr>
		<tr> <td colspan='2' align='center'>TOTAL ABONADO: $ ".$total_abonado."</td></tr>
		<tr> <td colspan='2' align='center'><strong>SALDO: $ ".$saldo_ti."</td></td> </tr>
		<tr> <td colspan='2'> <div style='text-align:center;'><strong>¡GRACIAS POR SU PREFERENCIA!</strong></div> </td> </tr>
		<tr> <td colspan='2' align='center'>".$fecha." ".$hora."</td> </tr>
		<tr> <td colspan='2' align='center'>".$sitio_web."</td> </tr>
		<tr> <td colspan='2' align='center'>".$email_su."</td> </tr>
	</table>";
$tabla = sqlValue($tabla, "text", $horizonte);

 $sql4 = "INSERT INTO pagos_ov(pago_pag, usuario_pag, fecha_pag, referencia_pag, no_temp_pag, forma_pago_pag, departamento_pa, ticket_pa) VALUES ($pago, $idU, $now, $referencia, $aleatorio, '1','4', $tabla) ";
 mysqli_select_db($horizonte, $database_horizonte);
 $insertar4 = mysqli_query($horizonte, $sql4) or die (mysqli_error($horizonte));

 if (!$insertar4) {echo $sql4;} else{
	 echo '1'.'{]*}'.$idPQ.'{]*}'.$rowA[1].'{]*}'.$rowA[2].'{]*}'.$rowA[3].'{]*}'.$rowA[4].'{]*}'.str_replace("'", "", $aleatorio);
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>