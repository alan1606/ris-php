<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$idEvc = sqlValue($_GET["idE"], "int", $horizonte); $i = 0; $f = 0; $idU = sqlValue($_GET["idU"], "int", $horizonte);
  
$tabla = '<table id="p_contenido" width="100" border="0" cellspacing="4" cellpadding="4" style="text-align:left;"> <tr style="font-weight:bold;">
		<td width="200">EXAMEN FISICO</td> <td width="120" align="right" nowrap>1RA MUESTRA</td> <td width="120" align="right" nowrap>2DA MUESTRA</td> <td width="200" align="center">VALORES DE REFERENCIA</td> <td align="right" style=" display:none;">UNIDADES</td> </tr>';

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT r.id_rl, t.id_cvr, t.tipo_cvr, r.numero1_rango_rl, r.numero2_rango_rl, r.valor_maximo_rl, r.valor_minimo_rl, r.valor_estable_rl, r.valor_variable_rl, r.valor_texto_rl, r.boleano_rl, u.abreviacion_un, u.unidad_un, r.r_rango_rl, r.r_vmaximo_rl, r.r_vminimo_rl, r.r_valor_estable_rl, r.r_valor_texto, r.r_boleano_rl, b.base_b, r.r_valor_normal, r.r_valor_r1_moderado, r.r_valor_r2_moderado, r.r_valor_alto, r.r_valor_nma_rl from resultados_laboratorio r left join catalogo_valores_referencia t on t.id_cvr = r.id_valor_referencia_rl left join bases b on b.id_b = r.id_base_rl left join unidades u on u.id_un = b.unidad_medida_r_b where r.id_estudio_vc_rl = $idEvc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
while ($fila = mysqli_fetch_array($query)) { $i++;
	$name1 = explode("_COPRO", $fila['base_b']);
	
	//Para el tipo TEXTO
	if($fila['id_cvr']==1){
		if($fila['r_valor_texto']!=$fila['valor_texto_rl']){$asterix = '<strong>*</strong>'; $f++;}else{$asterix = '';}
		
		if(($i%2)==1){
			$tabla = $tabla.'
			<tr> <td nowrap>'.$name1[0].'</td>
			<td align="right" nowrap> 
				'.$asterix.' '.$fila['r_valor_texto'].' 
			</td>';
		}else{
			$tabla = $tabla.'<td align="right" nowrap> 
				'.$asterix.' '.$fila['r_valor_texto'].' 
			</td>
			<td align="center">'.$fila['valor_texto_rl'].'</td>
			<td align="right" style=" display:none;"> '.$fila['abreviacion_un'].' </td> </tr>
			';	
		}
		
		if($i==8){
			$tabla = $tabla.'<tr style="font-weight:bold;">
		<td>EXAMEN QUÍMICO</td> <td width="1%" align="right" nowrap>1RA MUESTRA</td> <td width="1%" align="right" nowrap>2DA MUESTRA</td> <td align="center" nowrap>VALORES REFERENCIA</td> <td align="center"style="display:none;">UNIDADES</td> </tr>';
		}
		
	}
	//Fin para el tipo TEXTO
	
	//Para el tipo POSITIVO-NEGATIVO
	if($fila['id_cvr']==2){
		if($fila['boleano_rl']==1){ $bol = 'POSITIVO';
		}else{ $bol = 'NEGATIVO'; }
		if($fila['r_boleano_rl']==1){ $filita = 'POSITIVO';
		}else{ $filita = 'NEGATIVO'; }
		
		if($filita!=$bol){$asterix = '<strong>*</strong>'; $f++;}else{$asterix = '';}
		
		if(($i%2)==1){
			$tabla = $tabla.'
			<tr> <td nowrap>'.$name1[0].'</td>
			<td align="right" nowrap> 
				'.$asterix.' '.$filita.'
			</td>';
		}else{
			$tabla=$tabla.'<td align="right" nowrap> 
				'.$asterix.' '.$filita.'
			</td>
			<td align="center">'.$bol.'</td>
			<td align="right" style=" display:none;"> '.$fila['abreviacion_un'].' </td> </tr>
			';
		}
		
		if($i==18){
			$tabla = $tabla.'<tr style="font-weight:bold;">
		<td>EXAMEN MICROSCÓPICO</td> <td width="1%" align="right" nowrap>1RA MUESTRA</td> <td width="1%" align="right" nowrap>2DA MUESTRA</td> <td align="center" nowrap>VALORES REFERENCIA</td> <td align="center" style="display:none;">UNIDADES</td> </tr>';
		}
	}
	//Fin para el tipo TEPOSITIVO-NEGATIVO
	
	//Para el tipo RANGO
	if($fila['id_cvr']==3){
		if($fila['r_rango_rl'] < $fila['numero1_rango_rl'] or $fila['r_rango_rl'] > $fila['numero2_rango_rl']){$asterix = '<strong>*</strong>'; $f++;}else{$asterix = '';}
		
		if(($i%2)==1){
			$tabla = $tabla.'
			<tr> <td nowrap>'.$name1[0].'</td>
			<td align="right" nowrap>
				'.$asterix.' '.$fila['r_rango_rl'].'
			</td>';
		}else{
			$tabla = $tabla.'<td align="right" nowrap>
				'.$asterix.' '.$fila['r_rango_rl'].'
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
			<td align="right" style=" display:none;"> '.$fila['abreviacion_un'].' </td> </tr>
			';
		}
	}
	//Fin para el tipo RANGO
	
	//Para el tipo VALOR MAXIMO
	if($fila['id_cvr']==5){
		if($fila['r_vmaximo_rl'] > $fila['valor_maximo_rl']){$asterix = '<strong>*</strong>'; $f++;}else{$asterix = '';}
		
		if(($i%2)==1){
			$tabla = $tabla.'
			<tr> <td nowrap>'.$name1[0].'</td>
			<td align="right" nowrap>
				'.$asterix.' '.$fila['r_vmaximo_rl'].'
			</td>';
		}else{
			$tabla=$tabla.'<td align="right" nowrap>
				'.$asterix.' '.$fila['r_vmaximo_rl'].'
			</td>
			<td align="center"> <= '.$fila['valor_maximo_rl'].' </td>
			<td align="right" style=" display:none;"> '.$fila['abreviacion_un'].' </td> </tr>
			';
		}
	}
	//Fin para el tipo VALOR MAXIMO
	
	//Para el tipo VALOR MINIMO
	if($fila['id_cvr']==6){
		if($fila['r_vminimo_rl'] < $fila['valor_minimo_rl']){$asterix = '<strong>*</strong>'; $f++;}else{$asterix = '';}
		
		if(($i%2)==1){
			$tabla = $tabla.'
			<tr> <td nowrap>'.$name1[0].'</td>
			<td align="right" nowrap>
				'.$asterix.' '.$fila['r_vminimo_rl'].'
			</td>';
		}else{
			$tabla=$tabla.'<td align="right" nowrap>
				'.$asterix.' '.$fila['r_vminimo_rl'].'
			</td>
			<td align="center"> >= '.$fila['valor_minimo_rl'].' </td>
			<td align="right" style=" display:none;"> '.$fila['abreviacion_un'].' </td> </tr>
			';
		}
	}
	//Fin para el tipo VALOR MINIMO
	
	//Para el tipo RANGO +-
	if($fila['id_cvr']==7){
		if( $fila['r_valor_estable_rl'] < ($fila['valor_estable_rl']-$fila['valor_variable_rl']) or $fila['r_valor_estable_rl'] > ($fila['valor_estable_rl']+$fila['valor_variable_rl']) ){$asterix = '<strong>*</strong>'; $f++;}else{$asterix = '';}
		
		if(($i%2)==1){
			$tabla = $tabla.'
			<tr> <td nowrap>'.$name1[0].'</td>
			<td align="right" nowrap>
				'.$asterix.' '.$fila['r_valor_estable_rl'].'
			</td>';
		}else{
			$tabla=$tabla.'<td align="right" nowrap>
				'.$asterix.' '.$fila['r_valor_estable_rl'].'
			</td>
			<td align="center">
				<table width="" border="0" cellspacing="1" cellpadding="2">
				  <tr>
					<td> '.$fila['valor_estable_rl'].' </td>
					<td width="5px">+-</td>
					<td> '.$fila['valor_variable_rl'].' </td>
				  </tr>
				</table>
			</td>
			<td align="right" style=" display:none;"> '.$fila['abreviacion_un'].' </td> </tr>
			';
		}
	}
	//Fin para el tipo RANGO +-
	
	//Para el tipo NORMAL,MODERADO,ALTO
	if($fila['id_cvr']==8){
		if( $fila['r_valor_nma_rl'] > ($fila['r_valor_r1_moderado']) or $fila['r_valor_nma_rl'] > ($fila['r_valor_alto']) ){$asterix = '<strong>*</strong>'; $f++;}else{$asterix = '';}
		
		if(($i%2)==1){
			$tabla = $tabla.'
			<tr> <td nowrap>'.$name1[0].'</td>
			<td align="right" nowrap>
				'.$asterix.' '.$fila['r_valor_nma_rl'].'
			</td>';
		}else{
			$tabla=$tabla.'<td align="right" nowrap>
				'.$asterix.' '.$fila['r_valor_nma_rl'].'
			</td>
			<td align="center">
				<table width="" border="0" cellspacing="1" cellpadding="3" style="text-align:right;">
				  <tr>
					<td width="80px">NORMAL < </td>
					<td align="center">
						'.$fila['r_valor_normal'].'
					</td>
				  </tr>
				  <tr>
					<td width="80px">MODERADO</td>
					<td align="center">
						'.$fila['r_valor_r1_moderado'].' - '.$fila['r_valor_r2_moderado'].'
					</td>
				  </tr>
				  <tr>
					<td width="80px">ALTO > </td>
					<td align="center">
						'.$fila['r_valor_alto'].'
					</td>
				  </tr>
				</table>
			</td>
			<td align="right" style=" display:none;"> '.$fila['abreviacion_un'].' </td> </tr>
			';	
		}
	}
	//Fin para el tipo NORMAL,MODERADO,ALTO
};

if($f>0){// height="320"
	$tabla = $tabla.'<tr> <td height="250" valign="top" nowrap colspan="5" style="font-size:0.2em; font-style:italic;" id="notaF"><hr style=" height:1px;"><em>NOTA: <strong>*</strong> SIGNIFICA VALOR FUERA DE RANGO</em> <br> </td> </tr>';
}else{$tabla = $tabla.'<tr> <td nowrap colspan="4" style="font-size:0.2em; font-style:italic;" id="notaF"><hr style=" height:1px;">
</td> </tr>';}

$tabla = $tabla.'</table>';
$tabla1 = sqlValue($tabla, "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sqlX = "UPDATE usuarios SET variable_temporal_u = $tabla1 where id_u = $idU limit 1";
 $updateX = mysqli_query($horizonte, $sqlX) or die (mysqli_error($horizonte));
	
 if(!$updateX){ echo $sqlX; }else{ echo $tabla; }
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>