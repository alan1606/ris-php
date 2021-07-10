<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$idEvc = sqlValue($_GET["idE"], "int", $horizonte); $f = 0;
  
$tabla = '<table width="100%" border="0" style="text-align:left;" class="table table-condensed table-bordered"> <thead><tr class="bg-primary" align="center">
		<th>DETERMINACION</th> <th>RESULTADO</th> <th>VALORES DE REFERENCIA</th> <th>UNIDADES</th> </tr></thead>';

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT r.id_rl, t.id_cvr, t.tipo_cvr, r.numero1_rango_rl, r.numero2_rango_rl, r.valor_maximo_rl, r.valor_minimo_rl, r.valor_estable_rl, r.valor_variable_rl, r.valor_texto_rl, r.boleano_rl, u.abreviacion_un, u.unidad_un, r.r_rango_rl, r.r_vmaximo_rl, r.r_vminimo_rl, r.r_valor_estable_rl, r.r_valor_texto, r.r_boleano_rl, b.base_b, r.r_valor_normal, r.r_valor_r1_moderado, r.r_valor_r2_moderado, r.r_valor_alto, r.r_valor_nma_rl, r.r_valor_normal_i, r.r_valor_r1_moderado_i, r.r_valor_r2_moderado_i, r.r_valor_alto_i, r.r_valor_nma_i_rl from resultados_laboratorio r left join catalogo_valores_referencia t on t.id_cvr = r.id_valor_referencia_rl left join bases b on b.id_b = r.id_base_rl left join unidades u on u.id_un = b.unidad_medida_r_b where r.id_estudio_vc_rl = $idEvc order by r.id_rl asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
while ($fila = mysqli_fetch_array($query)) {//$fila['convenio_cv'];
	//Para el tipo TEXTO
	if($fila['id_cvr']==1){
		if($fila['base_b']=='GRUPO SANGUINEO' or $fila['base_b']=='FACTOR RH'){
			if($fila['r_valor_texto']!=$fila['valor_texto_rl']){$asterix = ''; $f++;}else{$asterix = '';}
		}else{
			if($fila['r_valor_texto']!=$fila['valor_texto_rl']){$f++; $clase = 'bg-danger';} else{$clase = '';}
		}
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center" class="'.$clase.'">'.$fila['r_valor_texto'].'</td>
		<td align="center">'.$fila['valor_texto_rl'].'</td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo TEXTO
	
	//Para el tipo POSITIVO-NEGATIVO
	if($fila['id_cvr']==2){
		if($fila['boleano_rl']==1){ $bol = 'POSITIVO'; }
		else{ $bol = 'NEGATIVO'; }
		if($fila['r_boleano_rl']==1){ $filita = 'POSITIVO'; }
		else{ $filita = 'NEGATIVO'; }
		
		if($fila['base_b']=='GRUPO SANGUINEO' or $fila['base_b']=='FACTOR RH'){ if($filita!=$bol){}else{} }
		else{ if($filita!=$bol){$f++; $clase = 'bg-danger';}else{$clase = '';} }
		
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center" class="'.$clase.'">'.$filita.'</td>
		<td align="center">'.$bol.'</td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo TEPOSITIVO-NEGATIVO
	
	//Para el tipo RANGO
	if($fila['id_cvr']==3){
		if($fila['r_rango_rl']<$fila['numero1_rango_rl'] or $fila['r_rango_rl']>$fila['numero2_rango_rl']){$f++; $clase = 'bg-danger';}
		else{$clase = '';}
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center" class="'.$clase.'">'.$fila['r_rango_rl'].'</td>
		<td align="center"> DE '.$fila['numero1_rango_rl'].' A '.$fila['numero2_rango_rl'].' </td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo RANGO
	
	//Para el tipo VALOR MAXIMO
	if($fila['id_cvr']==5){
		if($fila['r_vmaximo_rl'] > $fila['valor_maximo_rl']){$clase = 'bg-danger'; $f++;}else{$clase = '';}
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center" class="'.$clase.'">'.$fila['r_vmaximo_rl'].'</td>
		<td align="center"> < '.$fila['valor_maximo_rl'].' </td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo VALOR MAXIMO
	
	//Para el tipo VALOR MINIMO
	if($fila['id_cvr']==6){
		if($fila['r_vminimo_rl'] < $fila['valor_minimo_rl']){$f++; $clase = 'bg-danger';}else{$clase = '';}
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center" class="'.$clase.'">'.$fila['r_vminimo_rl'].'</td>
		<td align="center"> > '.$fila['valor_minimo_rl'].' </td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo VALOR MINIMO
	
	//Para el tipo RANGO +-
	if($fila['id_cvr']==7){
		if( $fila['r_valor_estable_rl'] < ($fila['valor_estable_rl']-$fila['valor_variable_rl']) or $fila['r_valor_estable_rl'] > ($fila['valor_estable_rl']+$fila['valor_variable_rl']) ){$f++; $clase = 'bg-danger';}else{$clase = '';}
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center" class="'.$clase.'">'.$fila['r_valor_estable_rl'].'</td>
		<td align="center"> '.$fila['valor_estable_rl'].' +- '.$fila['valor_variable_rl'].'</td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo RANGO +-
	
	//Para el tipo NORMAL,MODERADO,ALTO
	if($fila['id_cvr']==8){
		if( $fila['r_valor_nma_rl'] > ($fila['r_valor_r1_moderado']) or $fila['r_valor_nma_rl'] > ($fila['r_valor_alto']) ){$f++; $clase = 'bg-danger';}else{$clase = '';}
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center" class="'.$clase.'">'.$fila['r_valor_nma_rl'].'</td>
		<td align="center">NORMAL < '.$fila['r_valor_normal'].' MODERADO '.$fila['r_valor_r1_moderado'].' - '.$fila['r_valor_r2_moderado'].' ALTO > '.$fila['r_valor_alto'].'</td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo NORMAL,MODERADO,ALTO
	//Para el tipo NORMAL,MODERADO,ALTO inverso
	if($fila['id_cvr']==9){
		if( $fila['r_valor_nma_i_rl'] < ($fila['r_valor_normal_i']) ){$f++; $clase = 'bg-danger';}else{$clase = '';}
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center" class="'.$clase.'">'.$fila['r_valor_nma_i_rl'].'</td>
		<td align="center">NORMAL > '.$fila['r_valor_normal_i'].' MODERADO '.$fila['r_valor_r1_moderado_i'].' - '.$fila['r_valor_r2_moderado_i'].' ALTO < '.$fila['r_valor_alto_i'].'</td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo NORMAL,MODERADO,ALTO inverso
};

if($f>0){
	$tabla = $tabla.'<tr> <td nowrap colspan="4" id="notaF" align="left">NOTA: Un campo de color rojo significa que esta fuera de rango normal. </td> </tr>';
}

$tabla = $tabla.'</table>';

echo $tabla;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>