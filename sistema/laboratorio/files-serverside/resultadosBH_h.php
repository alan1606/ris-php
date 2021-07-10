<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$idEvc = sqlValue($_GET["idE"], "int", $horizonte); $i = 0; $leuco = 0; $f = 0;
  
$tabla = '<table width="100%" height="" border="0" cellspacing="1" cellpadding="4" style="text-align:left;" class="table table-condensed table-bordered"> <thead><tr align="center" class="bg-primary">
		<th>FÓRMULA ROJA</th> <th>RESULTADO</th> <th nowrap>VALORES DE REFERENCIA</th> <th>UNIDADES</th> </tr></thead>';

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT r.id_rl, t.id_cvr, t.tipo_cvr, r.numero1_rango_rl, r.numero2_rango_rl, r.valor_maximo_rl, r.valor_minimo_rl, r.valor_estable_rl, r.valor_variable_rl, r.valor_texto_rl, r.boleano_rl, u.abreviacion_un, u.unidad_un, r.r_rango_rl, r.r_vmaximo_rl, r.r_vminimo_rl, r.r_valor_estable_rl, r.r_valor_texto, r.r_boleano_rl, b.base_b, r.r_valor_normal, r.r_valor_r1_moderado, r.r_valor_r2_moderado, r.r_valor_alto, r.r_valor_nma_rl, round(r.r_rango_rl,0) as roro from resultados_laboratorio r left join catalogo_valores_referencia t on t.id_cvr = r.id_valor_referencia_rl left join bases b on b.id_b = r.id_base_rl left join unidades u on u.id_un = b.unidad_medida_r_b where r.id_estudio_vc_rl = $idEvc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
while ($fila = mysqli_fetch_array($query)) { $i++;
	
	if($i==8){$leuco = $fila['r_rango_rl'];}
	//Para el tipo RANGO
	if($fila['id_cvr']==3){
		if($fila['r_rango_rl'] < $fila['numero1_rango_rl'] or $fila['r_rango_rl'] > $fila['numero2_rango_rl']){
			$asterix = '<strong></strong>'; $f++; $clase = 'bg-danger';
		}else{$asterix = ''; $clase = '';}
		
		if($i>8 and $i<16){
			if( (($fila['r_rango_rl']*$leuco)/100) < $fila['numero1_rango_rl'] or (($fila['r_rango_rl']*$leuco)/100) > $fila['numero2_rango_rl']){
				$asterix = '<strong></strong>'; $f++; $clase = 'bg-danger';
			}else{$asterix = ''; $clase = '';}	
		}
		
		if($fila['base_b']=='PLAQUETAS'){
			$tabla = $tabla.'
			<tr> <td nowrap style="font-weight:bold;">'.$fila['base_b'].'</td>
			<td align="right" nowrap class="'.$clase.'">'.$fila['r_rango_rl'].'</td>
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
		}
		else{
			if($i>8 and $i < 16){
				$hb = '
					<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td>'.$fila['roro'].'%</td>
					<td align="right" nowrap>'.$asterix.' '.
					'<span>'.(($fila['r_rango_rl']*$leuco)/100).'</span>'
					.'</td></tr></table>
				';
			}else{
				$hb = $asterix.' '.
					'<span>'.$fila['r_rango_rl'].'</span>';
			}
			$tabla = $tabla.'
				<tr> <td nowrap>'.$fila['base_b'].'</td>
				<td align="right" nowrap class="'.$clase.'">'.$hb.'</td>
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
		}
	
		if($i==7){
			$tabla = $tabla.'<tr align="center" class="bg-primary">
		<td>FÓRMULA BLANCA</td> <td>RESULTADO</td> <td nowrap>VALORES DE REFERENCIA</td> <td>UNIDADES</td> </tr>';
		}
	}
		//Fin para el tipo RANGO
};

if($f>0){
	$tabla = $tabla.'<tr> <td nowrap colspan="4" id="notaF" align="left">NOTA: Un campo de color rojo significa que esta fuera de rango normal. </td> </tr>';
}

$tabla = $tabla.'</table>';

echo $tabla;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>