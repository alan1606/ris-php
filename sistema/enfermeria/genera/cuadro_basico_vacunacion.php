<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");
	
$id_p = sqlValue($_GET["id_p"], "int", $horizonte);
//Checamos si el paciente ya tiene cuadro básico de vacunas, sino tiene generamos la tabla a partir de la tabla de catálogo de vacunas, contrario de la tabla vacunas

mysqli_select_db($horizonte, $database_horizonte);
$result = mysqli_query($horizonte, "SELECT count(id_va) from vacunas_aplicadas where id_paciente_va = $id_p and esquema = 1 ") or die (mysqli_error($horizonte));
$row = mysqli_fetch_row($result);

$tabla = '<br>
		<table width="100%" class="table-condensed table-bordered" role="grid">
			<thead>
				<tr class="bg-primary">
					<th width="" style="font-size:0.8em;"> </th>
					<th width="1%"> </th>
					<th width="" nowrap>ENFERMEDAD PREVIENE</th>
					<th width="">EDAD</th>
					<th width="">DOSIS</th>
					<th width="15%" nowrap>FECHA APLICACIÓN</th>
				</tr>
			</thead>
			<tbody>';
$contador = 1;

if($row[0]>0){//Generamos la tabla html a partir de la tabla de la db VACUNAS APLICADAS
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta = "SELECT vacuna_va as name, aplicada_va as aplicada, enfermedad_va as enfermedad, edad_va as edad, dosis_va as dosis, fecha_aplicacion_va as fecha_aplicacion, id_va as id from vacunas_aplicadas where id_paciente_va = $id_p and esquema = 1 order by id_va asc"; //echo $consulta;
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

	while ($fila = mysqli_fetch_array($query)) {
		$tabla = $tabla.'
				<tr>
					<td class="bg-primary" id="name_v'.$contador.'">'.$fila['name'].'</td>
					<td align="center"> <input type="hidden" class="hide_c_v" name="hide_c_v'.$contador.'" id="hide_c_v'.$contador.'" value="'.$fila['aplicada'].'">
						<label> <input type="checkbox" class="i-checks v_check v_checka" id="check_v'.$contador.'" value="'.$fila['id'].'"></label>
					</td>
					<td align="justify">
						<span class="read_oc" id="enfermedad_v'.$contador.'">'.$fila['enfermedad'].'</span>
					</td>
					<td align="justify">
						<span class="read_oc" id="edad_v'.$contador.'">'.$fila['edad'].'</span>
					</td>
					<td align="justify">
						<span class="read_oc" id="dosis_v'.$contador.'">'.$fila['dosis'].'</span>
					</td>
					<td>
						<input type="text" class="form-control date_fv date_fva" data-provide="datepicker" data-date-format="yyyy-mm-dd" id="fecha_av'.$contador.'" name="fecha_av'.$contador.'" value="'.$fila['fecha_aplicacion'].'" lang="'.$fila['id'].'" disabled readonly>
					</td>
				</tr>
		';
		$contador++;
	};
	
	$tabla = $tabla.'</tbody>
			</table>';
}else{//Generamos la tabla html a partir de la tabla de la db CATALOGO_ANTECEDENTES
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta = "SELECT vacuna_v as name, id_v as id, enfermedad_v as enfermedad, edad_v as edad, dosis_v as dosis from catalogo_vacunas where esquema_v = 1 order by id_v asc ";
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

	while ($fila = mysqli_fetch_array($query)) {
		$tabla = $tabla.'
				<tr>
					<td class="bg-primary" id="name_v'.$contador.'">'.$fila['name'].'</td>
					<td align="center"> <input type="hidden" class="hide_c_v" name="hide_c_v'.$contador.'" id="hide_c_v'.$contador.'" value="0">
						<label> <input type="checkbox" class="i-checks v_check" id="check_v'.$contador.'" value="'.$contador.'"></label>
					</td>
					<td align="left">
						<span class="read_oc" id="enfermedad_v'.$contador.'">'.$fila['enfermedad'].'</span>
					</td>
					<td align="left">
						<span class="read_oc" id="edad_v'.$contador.'">'.$fila['edad'].'</span>
					</td>
					<td align="left">
						<span class="read_oc" id="dosis_v'.$contador.'">'.$fila['dosis'].'</span>
					</td>
					<td>
						<input type="text" class="form-control date_fv" data-provide="datepicker" data-date-format="yyyy-mm-dd" id="fecha_av'.$contador.'" name="fecha_av'.$contador.'" disabled readonly>
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
						<td></td>
						<td align="right"><button type="submit" class="btn btn-success" id="btn_save_vacunacion_b">Guardar</button></td>
					</tr>
				</tbody>
			</table>';
}
	echo $tabla;

?>