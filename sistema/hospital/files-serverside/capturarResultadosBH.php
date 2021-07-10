<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$idEvc = sqlValue($_GET["idE"], "int", $horizonte); $i = 0;
  
$tabla = '<table width="100%" border="0" cellspacing="1" cellpadding="2"> <tr style="font-weight:bold;">
		<td>FÓRMULA ROJA</td> <td width="" align="right">RESULTADO</td> <td align="center" nowrap>VALORES DE REFERENCIA</td> <td align="right">UNIDADES</td> </tr>';

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT r.id_rl, t.id_cvr, t.tipo_cvr, r.numero1_rango_rl, r.numero2_rango_rl, r.valor_maximo_rl, r.valor_minimo_rl, r.valor_estable_rl, r.valor_variable_rl, r.valor_texto_rl, r.boleano_rl, u.abreviacion_un, u.unidad_un, r.r_rango_rl, r.r_vmaximo_rl, r.r_vminimo_rl, r.r_valor_estable_rl, r.r_valor_texto, r.r_boleano_rl, b.base_b, r.r_valor_normal, r.r_valor_r1_moderado, r.r_valor_r2_moderado, r.r_valor_alto, r.r_valor_nma_rl from resultados_laboratorio r left join catalogo_valores_referencia t on t.id_cvr = r.id_valor_referencia_rl left join bases b on b.id_b = r.id_base_rl left join unidades u on u.id_un = b.unidad_medida_r_b where r.id_estudio_vc_rl = $idEvc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
while ($fila = mysqli_fetch_array($query)) { $i++;

	//Para el tipo RANGO
	if($fila['id_cvr']==3){
		if($fila['r_rango_rl'] < $fila['numero1_rango_rl'] or $fila['r_rango_rl'] > $fila['numero2_rango_rl']){$asterix = '<strong>*</strong>';}else{$asterix = '';}
		if($fila['base_b']=='PLAQUETAS'){
		$tabla = $tabla.'
		<tr> <td nowrap style="font-weight:bold;">'.$fila['base_b'].'</td>
		<td align="right" nowrap>
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="campoITtab required" style="text-align:center;">
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
		if($i == 2 or $i == 5 or $i == 6 or $i == 15){
			$tabla = $tabla.'
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="campoITtab required" style="text-align:center;" readonly value="CALCULO AUTOMATICO">';
		}
		else{
			$tabla = $tabla.'
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="campoITtab required" style="text-align:center;">';
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
			$tabla = $tabla.'<tr style="font-weight:bold;">
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