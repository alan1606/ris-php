<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");
	
$id_p = sqlValue($_GET["id_p"], "int", $horizonte);
//Checamos si el paciente ya tiene antecedentes, sino tiene generamos la tabla a partir de la tabla de catálogo de antecedentes, contrario de la tabla antecedentes

mysqli_select_db($horizonte, $database_horizonte);
$result = mysqli_query($horizonte, "SELECT count(id_an) from antecedentes where id_paciente_an = $id_p ") or die (mysqli_error($horizonte));
$row = mysqli_fetch_row($result);

mysqli_select_db($horizonte, $database_horizonte);
$result1 = mysqli_query($horizonte, "SELECT u.usuario_u, DATE_FORMAT(a.fecha_an,'%H:%i:%s'), a.aleatorio_an from antecedentes a left join usuarios u on u.id_u = a.id_usuario_an where a.id_paciente_an = $id_p order by a.id_an desc limit 1 ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1); $aleat = sqlValue($row1[2], "text", $horizonte);

$tabla = '<br>
		<table width="100%" class="table-condensed table-bordered" role="grid">
			<thead>
				<tr class="bg-primary">
					<th width="1%" style="font-size:0.8em;">'.$row1[0].' '.$row1[1].'</th>
					<th width="1%">PERSONAL</th>
					<th width="48%">NOTA</th>
					<th width="1%">FAMILIAR</th>
					<th width="48%">NOTA</th>
				</tr>
			</thead>
			<tbody>';
$contador = 1;

if($row[0]>0){//Generamos la tabla html a partir de la tabla de la db ANTECEDENTES hide_p_a_a
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta = "SELECT antecedente_an as name, personal_an as personal, actual_an as actual, nota_personal_an as nota_p, familiar_an as familiar, nota_familiar_an as nota_f from antecedentes where id_paciente_an = $id_p and aleatorio_an = $aleat"; //echo $consulta;
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

	while ($fila = mysqli_fetch_array($query)) {
		$tabla = $tabla.'
				<tr>
					<td class="bg-primary" id="name_a'.$contador.'">'.$fila['name'].'</td>
					<td align="center"> <input type="hidden" class="hide_p_a" name="hide_p_a'.$contador.'" id="hide_p_a'.$contador.'" value="'.$fila['personal'].'">
						<label> <input type="checkbox" class="i-checks a_personal read_oc" id="check_p_a'.$contador.'" value="'.$contador.'"></label>
					</td>
					<td>
						<textarea class="form-control read_ot" style="resize: none;" disabled onKeyUp="" id="ta_n_p_a'.$contador.'" name="ta_n_p_a'.$contador.'">'.$fila['nota_p'].'</textarea>
					</td>
					<td align="center"> <input type="hidden" class="hide_f_a" name="hide_f_a'.$contador.'" id="hide_f_a'.$contador.'" value="'.$fila['familiar'].'">
						<label> <input type="checkbox" class="i-checks a_familiar read_oc" id="check_f_a'.$contador.'" value="'.$contador.'"></label>
					</td>
					<td>
						<textarea class="form-control read_ot" style="resize: none;" disabled onKeyUp="" id="ta_n_f_a'.$contador.'" name="ta_n_f_a'.$contador.'">'.$fila['nota_f'].'</textarea>
					</td>
				</tr>
		';
		$contador++;
	};
	
	$tabla = $tabla.'</tbody>
			</table>';
}else{//Generamos la tabla html a partir de la tabla de la db CATALOGO_ANTECEDENTES
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta = "SELECT antecedente_ca as name, id_ca as id from catalogo_antecedentes where activo_ca = 1 order by id_ca asc ";
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

	while ($fila = mysqli_fetch_array($query)) {
		$tabla = $tabla.'
				<tr>
					<td class="bg-primary" id="name_a'.$contador.'">'.$fila['name'].'</td>
					<td align="center"> <input type="hidden" class="hide_p_a" name="hide_p_a'.$contador.'" id="hide_p_a'.$contador.'" value="0">
						<label> <input type="checkbox" class="i-checks a_personal" id="check_p_a'.$contador.'" value="'.$contador.'"></label>
					</td>
					<td>
						<textarea class="form-control" style="resize: none;" disabled onKeyUp="" id="ta_n_p_a'.$contador.'" name="ta_n_p_a'.$contador.'"></textarea>
					</td>
					<td align="center"> <input type="hidden" class="hide_f_a" name="hide_f_a'.$contador.'" id="hide_f_a'.$contador.'" value="0">
						<label> <input type="checkbox" class="i-checks a_familiar" id="check_f_a'.$contador.'" value="'.$contador.'"></label>
					</td>
					<td>
						<textarea class="form-control" style="resize: none;" disabled onKeyUp="" id="ta_n_f_a'.$contador.'" name="ta_n_f_a'.$contador.'"></textarea>
					</td>
				</tr>
		';
		$contador++;
	};
	
	$tabla = $tabla.'<tr id="tr_btn_save_ante">
						<td align="center"></td>
						<td></td>
						<td></td>
						<td></td>
						<td align="right"><button type="submit" class="btn btn-success" id="btn_save_antecedentes">Guardar</button></td>
					</tr>
				</tbody>
			</table>';
}
	echo $tabla;

?>