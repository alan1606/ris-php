<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$idEvc = sqlValue($_GET["idE"], "int", $horizonte); $i = 0; $htc = 0; $mch = 0; $mchc = 0;

mysqli_select_db($horizonte, $database_horizonte);

$result1 = mysqli_query($horizonte, "SELECT r.r_rango_rl from resultados_laboratorio r left join bases b on b.id_b = r.id_base_rl where r.id_estudio_vc_rl = $idEvc and b.base_b = 'ERITROCITOS' ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

$result2 = mysqli_query($horizonte, "SELECT r.r_rango_rl from resultados_laboratorio r left join bases b on b.id_b = r.id_base_rl where id_estudio_vc_rl = $idEvc and b.base_b = 'VOL. GOL. MEDIO' ") or die (mysqli_error($horizonte));
$row2 = mysqli_fetch_row($result2);

$result3 = mysqli_query($horizonte, "SELECT r.r_rango_rl from resultados_laboratorio r left join bases b on b.id_b = r.id_base_rl where id_estudio_vc_rl = $idEvc and b.base_b = 'HEMOGLOBINA' ") or die (mysqli_error($horizonte));
$row3 = mysqli_fetch_row($result3);

$result4 = mysqli_query($horizonte, "SELECT r.r_rango_rl from resultados_laboratorio r left join bases b on b.id_b = r.id_base_rl where id_estudio_vc_rl = $idEvc and b.base_b = 'ERITROCITOS' ") or die (mysqli_error($horizonte));
$row4 = mysqli_fetch_row($result4);

$result5 = mysqli_query($horizonte, "SELECT r.r_rango_rl from resultados_laboratorio r left join bases b on b.id_b = r.id_base_rl where id_estudio_vc_rl = $idEvc and b.base_b = 'HEMATOCRITO' ") or die (mysqli_error($horizonte));
$row5 = mysqli_fetch_row($result5);

$htc  = round(($row1[0]*$row2[0])/10,2);
$mch  = round(($row3[0]/$row4[0])*10,2);
$mchc = round(($row3[0]/$htc)*100,2);
  
$tabla = '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered"> <tr align="center" class="bg-primary">
		<td>FÓRMULA ROJA</td> <td width="" align="right">RESULTADO</td> <td align="center" nowrap>VALORES DE REFERENCIA</td> <td align="right">UNIDADES</td> </tr>';
$var = 0;
mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT r.id_rl, t.id_cvr, t.tipo_cvr, r.numero1_rango_rl, r.numero2_rango_rl, r.valor_maximo_rl, r.valor_minimo_rl, r.valor_estable_rl, r.valor_variable_rl, r.valor_texto_rl, r.boleano_rl, u.abreviacion_un, u.unidad_un, r.r_rango_rl, r.r_vmaximo_rl, r.r_vminimo_rl, r.r_valor_estable_rl, r.r_valor_texto, r.r_boleano_rl, b.base_b, r.r_valor_normal, r.r_valor_r1_moderado, r.r_valor_r2_moderado, r.r_valor_alto, r.r_valor_nma_rl, round(r.r_rango_rl,0) as resu, r_rango_rl from resultados_laboratorio r left join catalogo_valores_referencia t on t.id_cvr = r.id_valor_referencia_rl left join bases b on b.id_b = r.id_base_rl left join unidades u on u.id_un = b.unidad_medida_r_b where r.id_estudio_vc_rl = $idEvc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
while ($fila = mysqli_fetch_array($query)) { $i++;
	
	if($i==13){$var = $fila['r_rango_rl'];}
	if($i==14){$var = $var+$fila['r_rango_rl'];}
	
	//Para el tipo RANGO
	if($fila['id_cvr']==3){
		if($fila['r_rango_rl'] < $fila['numero1_rango_rl'] or $fila['r_rango_rl'] > $fila['numero2_rango_rl']){$asterix = '<strong>*</strong>';}else{$asterix = '';}
		if($fila['base_b']=='PLAQUETAS'){
		$tabla = $tabla.'
		<tr> <td nowrap style="font-weight:bold;">'.$fila['base_b'].'</td>
		<td align="right" nowrap>
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="form-control input-sm" required style="text-align:center;" value="'.$fila['r_rango_rl'].'">
		</td>
		<td align="center">
			<table width="" border="0" cellspacing="1" cellpadding="2">
			  <tr>
				<td width="1px"></td>
				<td> '.$fila['numero1_rango_rl'].' </td>
				<td width="1px"> - </td>
				<td> '.$fila['numero2_rango_rl'].' </td>
			  </tr>
			</table>
		</td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
		}else{
		$tabla = $tabla.'
		<tr> <td nowrap>'.$fila['base_b'].'</td>
		<td align="right">';
		if($i == 2){
			$tabla = $tabla.'
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="form-control input-sm" required style="text-align:center;" value="'.$htc.'">';
		}
		else if($i == 5){
			$tabla = $tabla.'
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="form-control input-sm" required style="text-align:center;" value="'.$mch.'">';
		}
		else if($i == 6){
			$tabla = $tabla.'
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="form-control input-sm" required style="text-align:center;" value="'.$mchc.'">';
		}
		else if($i == 15){
			$tabla = $tabla.'
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="form-control input-sm" required style="text-align:center;" value="'.$var.'">';
		}
		else if($i < 9){
			$tabla = $tabla.'
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="form-control input-sm" required style="text-align:center;" value="'.$fila['r_rango_rl'].'">';
		}
		else{
			$tabla = $tabla.'
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="form-control input-sm" required style="text-align:center;" value="'.$fila['resu'].'">';
		}
		$tabla = $tabla.'
		</td>
		<td align="center">
		';
		if($i>8 and $i <15){
			$tabla = $tabla.'
			% DE LEUCOCITOS
			</td>
			<td align="right"> '.'%'.' </td> </tr>
			';
		}else if($i == 15){ 
			$tabla = $tabla.' 
				SEGMENTADOS + BANDA
				</td>
				<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>'; 
		}
		else{
			$tabla = $tabla.'
			<table width="" border="0" cellspacing="1" cellpadding="2">
			  <tr>
				<td width="1px"></td>
				<td> '.$fila['numero1_rango_rl'].' </td>
				<td width="1px"> - </td>
				<td> '.$fila['numero2_rango_rl'].' </td>
			  </tr>
			</table>
			</td>
			<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>';
		}
	}
		
		if($i==7){
			$tabla = $tabla.'<tr align="center" class="bg-primary">
		<td>FÓRMULA BLANCA</td> <td width="" align="right">RESULTADO</td> <td align="center" nowrap>VALORES DE REFERENCIA</td> <td align="right">UNIDADES</td> </tr>';
		}
	}
	//Fin para el tipo RANGO
	
};

$tabla = $tabla.'</table>';

echo $tabla;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>