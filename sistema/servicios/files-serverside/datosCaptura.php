<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["idVC"], "int", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT v.referencia_vc, v.interpretacion_vc, v.nota_interpretacion, date_format(v.fecha_venta_vc,'%d/%c/%Y'), v.id_concepto_es, v.nota_radiologo_vc, v.birad_vc, v.id_personal_medico_vc, v.usuarioEdo5_e, o.sucursal_ov from venta_conceptos v left join orden_venta o on o.referencia_ov = v.referencia_vc where v.id_vc = $idE ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $claveE = sqlValue($row[4], "int", $horizonte); $id_sucursal = sqlValue($row[9], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte); 
	$resultR2 = mysqli_query($horizonte, "SELECT formato from conceptos where id_to = $claveE", $horizonte);
	$rowR2 = mysqli_fetch_row($resultR2);

	if($rowR2[0]==''){
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultR = mysqli_query($horizonte, "SELECT formato_sm_su from sucursales where id_su = $id_sucursal", $horizonte);
		$rowR = mysqli_fetch_row($resultR);

		if($rowR[0]==''){
			//Entonces checamos si hay un formato desde la configuración principal
			mysqli_select_db($horizonte, $database_horizonte); 
			$resultR1 = mysqli_query($horizonte, "SELECT formato_sm_cf from configuracion order by id_cf desc limit 1", $horizonte);
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
					  <tr> <td nowrap align="center" colspan="2" style="font-size:10pt;">MÉDICO</td> </tr> 
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

	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT fNac_p, sexo_p, concat(nombre_p, ' ', apaterno_p), amaterno_p from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
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
	
	$datos = $nombre.'*}'.$row[0].'*}'.$row1[0].'*}'.$row1[1]."*}".$row[3]."*}".$row[0]."*}".$row[1]."*}".$row[5].'*}'.$tabla;
	
echo $datos;
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>