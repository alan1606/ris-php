<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$idEvc = sqlValue($_GET["idE"], "int", $horizonte);
  
$tabla = '<table width="100%" border="0" cellspacing="1" cellpadding="4" style="text-align:left;"> <tr style="background-color:#FF6633; color:white;" align="center">
		<td>DETERMINACION</td> <td>TIPO DE VR</td> <td width="200px">RESULTADO</td> <td>VALORES DE REFERENCIA</td> <td>UNIDADES</td> </tr>';

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT r.id_rl, t.id_cvr, t.tipo_cvr, r.numero1_rango_rl, r.numero2_rango_rl, r.valor_maximo_rl, r.valor_minimo_rl, r.valor_estable_rl, r.valor_variable_rl, r.valor_texto_rl, r.boleano_rl, u.abreviacion_un, u.unidad_un, b.base_b, r.r_valor_normal, r.r_valor_r1_moderado, r.r_valor_r2_moderado, r.r_valor_alto, r.r_valor_normal_i, r.r_valor_r1_moderado_i, r.r_valor_r2_moderado_i, r.r_valor_alto_i from resultados_laboratorio r left join catalogo_valores_referencia t on t.id_cvr = r.id_valor_referencia_rl left join bases b on b.id_b = r.id_base_rl left join unidades u on u.id_un = b.unidad_medida_r_b where r.id_estudio_vc_rl = $idEvc order by r.id_rl asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
while ($fila = mysqli_fetch_array($query)) {//$fila['convenio_cv'];
	//Para el tipo TEXTO
	if($fila['id_cvr']==1){
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center">'.$fila['tipo_cvr'].'</td>
		<td align="center">
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="campoITtab required" style="text-align:center;"onKeyUp="conMayusculas(this);">
		</td>
		<td align="center">'.$fila['valor_texto_rl'].'</td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo TEXTO
	
	//Para el tipo POSITIVO-NEGATIVO
	if($fila['id_cvr']==2){
		if($fila['boleano_rl']==1){$bol = 'POSITIVO';}else{$bol='NEGATIVO';}
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center">'.$fila['tipo_cvr'].'</td>
		<td align="center">
			<select name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" class="required">
			  <option value="">-SELECCIONAR</option>
			  <option value="1">POSITIVO</option>
			  <option value="0">NEGATIVO</option>
			</select>
		</td>
		<td align="center">'.$bol.'</td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo TEPOSITIVO-NEGATIVO
	
	//Para el tipo RANGO
	if($fila['id_cvr']==3){
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center">'.$fila['tipo_cvr'].'</td>
		<td align="center">
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="campoITtab required" style="text-align:center;">
		</td>
		<td align="center">
			<table width="" border="0" cellspacing="1" cellpadding="2" style="float:">
			  <tr>
				<td width="1px">DE</td>
				<td>
					'.$fila['numero1_rango_rl'].'
				</td>
				<td width="1px">A</td>
				<td>
					'.$fila['numero2_rango_rl'].'
				</td>
			  </tr>
			</table>
		</td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo RANGO
	
	//Para el tipo VALOR MAXIMO
	if($fila['id_cvr']==5){
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center">'.$fila['tipo_cvr'].'</td>
		<td align="center">
		<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="campoITtab required" style="text-align:center;">
		</td>
		<td align="center"> '.$fila['valor_maximo_rl'].' </td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo VALOR MAXIMO
	
	//Para el tipo VALOR MINIMO
	if($fila['id_cvr']==6){
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center">'.$fila['tipo_cvr'].'</td>
		<td align="center">
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="campoITtab required" style="text-align:center;">
		</td>
		<td align="center"> '.$fila['valor_minimo_rl'].' </td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo VALOR MINIMO
	
	//Para el tipo RANGO +-
	if($fila['id_cvr']==7){
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center">'.$fila['tipo_cvr'].'</td>
		<td align="center">
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="campoITtab required"  style="text-align:center;">
		</td>
		<td align="center">
			<table width="" border="0" cellspacing="1" cellpadding="2" style="float:;">
			  <tr>
				<td>
					'.$fila['valor_estable_rl'].'
				</td>
				<td width="5px">+-</td>
				<td>
					'.$fila['valor_variable_rl'].'
				</td>
			  </tr>
			</table>
		</td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo RANGO +-
	
	//Para el tipo NORMAL,MODERADO,ALTO
	if($fila['id_cvr']==8){
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center">'.$fila['tipo_cvr'].'</td>
		<td align="center">
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="campoITtab required"  style="text-align:center;">
		</td>
		<td align="center">
			<table width="" border="0" cellspacing="0" cellpadding="2" style="text-align:; float:;">
			  <tr>
				<td width="5px">NORMAL < </td>
				<td align="center">
					'.$fila['r_valor_normal'].'
				</td>
			  </tr>
			  <tr>
				<td width="5px">MODERADO</td>
				<td align="center">
					'.$fila['r_valor_r1_moderado'].' - '.$fila['r_valor_r2_moderado'].'
				</td>
			  </tr>
			  <tr>
				<td width="5px">ALTO > </td>
				<td align="center">
					'.$fila['r_valor_alto'].'
				</td>
			  </tr>
			</table>
		</td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo NORMAL,MODERADO,ALTO
	
	//Para el tipo NORMAL,MODERADO,ALTO inverso
	if($fila['id_cvr']==9){
		$tabla = $tabla.'
		<tr> 
		<td>'.$fila['base_b'].'</td>
		<td align="center">'.$fila['tipo_cvr'].'</td>
		<td align="center">
			<input name="'.$fila['id_rl'].'" id="'.$fila['id_rl'].'" lang ="'.$fila['id_cvr'].'" type="text" class="campoITtab required"  style="text-align:center;">
		</td>
		<td align="center">
			<table width="" border="0" cellspacing="0" cellpadding="2" style="text-align:; float:;">
			  <tr>
				<td width="5px">NORMAL > </td>
				<td align="center">
					'.$fila['r_valor_normal_i'].'
				</td>
			  </tr>
			  <tr>
				<td width="5px">MODERADO</td>
				<td align="center">
					'.$fila['r_valor_r1_moderado_i'].' - '.$fila['r_valor_r2_moderado_i'].'
				</td>
			  </tr>
			  <tr>
				<td width="5px">ALTO < </td>
				<td align="center">
					'.$fila['r_valor_alto_i'].'
				</td>
			  </tr>
			</table>
		</td>
		<td align="right"> '.$fila['abreviacion_un'].' </td> </tr>
		';
	}
	//Fin para el tipo NORMAL,MODERADO,ALTO inverso
};

$tabla = $tabla.'</table>';

echo $tabla;
 
 //Cerrar conexi??n a la Base de Datos
 mysqli_close($horizonte);
?>