<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $ref = sqlValue($_POST["refPro1"], "text", $horizonte);
 $idEvc = sqlValue($_POST["idEstudioPro"], "int", $horizonte);
 $idP = sqlValue($_POST["idPacientePro"], "int", $horizonte);
 $idU = sqlValue($_POST["idUserPro"], "int", $horizonte);
 $nota = sqlValue($_POST["notaPro"], "text", $horizonte);
 $checaPro = sqlValue($_POST["checaPro"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 if(isset($_POST["observacionPro"])){$notaTomaMuestra = sqlValue($_POST["observacionPro"], "text", $horizonte);}else{$notaTomaMuestra = "";}
 
mysqli_select_db($horizonte, $database_horizonte);
if($checaPro == 1){//Cuando procesamos individualmente
	//Si el estudio es de bactereología, debemos cargarle todas las bases del antibiograma y antibióticos
	 mysqli_select_db($horizonte, $database_horizonte);
	 $resultBa = mysqli_query($horizonte, "SELECT a.nombre_a from areas a left join conceptos c on c.id_area_to = a.id_a left join venta_conceptos v on v.id_concepto_es = c.id_to where id_vc = $idEvc ") or die (mysqli_error($horizonte));
	 $rowBa = mysqli_fetch_row($resultBa); $area_e = sqlValue($rowBa[0], "text", $horizonte);
	 if($rowBa[0]=='BACTERIOLOGIA'){
		mysqli_select_db($horizonte, $database_horizonte);
		$result_ax = mysqli_query($horizonte, "SELECT id_concepto_es from venta_conceptos where id_vc = $idEvc ") or die (mysqli_error($horizonte));
		$row_ax = mysqli_fetch_row($result_ax);
		
		mysqli_select_db($horizonte, $database_horizonte);
		$consulta_a = "SELECT v.id_avr, v.id_valor_referencia_avr, v.valor_texto, v.para_sexo, v.para_edades, v.rango_edad1, v.rango_edad2, b1.id_b, v.tipo_edad from asignar_valor_referencia v left join bases b1 on b1.aleatorio_b = v.aleatorio_avr left join areas a on a.id_a = b1.id_area_b where v.para_sexo is not null and v.para_edades is not null and a.nombre_a = 'BACTERIOLOGIA' order by b1.id_b, v.tipo_edad asc ";
		$query_a = mysqli_query($horizonte, $consulta_a) or die (mysqli_error($horizonte));
		while ($fila_a = mysqli_fetch_array($query_a)) {
			$idBase = $fila_a['id_b']; $id_valor_referencia = $fila_a['id_valor_referencia_avr'];
			$valor_texto = sqlValue($fila_a['valor_texto'], "text", $horizonte); $para_sexo = sqlValue($fila_a['para_sexo'], "text", $horizonte);
			$para_edades = sqlValue($fila_a['para_edades'], "text", $horizonte); $rango_edad1 = sqlValue($fila_a['rango_edad1'], "int", $horizonte);
			$rango_edad2 = sqlValue($fila_a['rango_edad2'], "int", $horizonte); $tipo_vr = sqlValue($fila_a['id_valor_referencia_avr'], "int", $horizonte);
			$tipo_edad = sqlValue($fila_a['tipo_edad'], "text", $horizonte);
	
			//Hombres y mujeres //Todas las edades
			if($fila_a['para_sexo'] == 'HOMBRES Y MUJERES' and $fila_a['para_edades'] == 'TODAS LAS EDADES'){
				mysqli_select_db($horizonte, $database_horizonte);
				 $sqlT_a = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, valor_texto_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl)";
				 $sqlT_a.= "VALUES ($idEvc, $idBase, $id_valor_referencia, $valor_texto, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, 'a')";
				$updateT_a = mysqli_query($horizonte, $sqlT_a) or die (mysqli_error($horizonte)); if(!$updateT_a){ echo $sqlT_a; }else{ }
			}
		};//Fin del WHILE
	 }//Fin Bacteriología
 
	$sql = "UPDATE venta_conceptos SET estatus_vc = 2, usuarioEdo2_e = $idU, fechaEdo2_e = $now, nota_radiologo_vc = $nota where id_vc = $idEvc ";
	$update = mysqli_query($horizonte, $sql);
	
	if (!$update) { echo $sql; }
	else {
		mysqli_select_db($horizonte, $database_horizonte);
		$sqlNotaToma = "UPDATE orden_venta SET observaciones_l_ov = $notaTomaMuestra where referencia_ov = $ref ";
		$updateNotaToma = mysqli_query($horizonte, $sqlNotaToma);
		
		mysqli_select_db($horizonte, $database_horizonte);
		$result = mysqli_query($horizonte, "SELECT id_concepto_es, id_paciente_vc from venta_conceptos where id_vc = $idEvc ") or die (mysqli_error($horizonte));
		$row = mysqli_fetch_row($result);
		
		mysqli_select_db($horizonte, $database_horizonte);
		$resultP = mysqli_query($horizonte, "SELECT fNac_p, sexo_p from pacientes where id_p = $row[1] ") or die (mysqli_error($horizonte));
		$rowP = mysqli_fetch_row($resultP);
		
		$edadPanios = $rowP[0];
		$sexoP = $rowP[1];
		$fecha1 = new DateTime($edadPanios); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);
	
		$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
		if($anos>=0){$edadPanios=$anos;}
		if($anos<1){
			$edadPmeses=$meses;
			if($edadPmeses<1){$edadPdias=$dias;}else{$edadPdias=0;}
		}else{$edadPmeses=0; $edadPdias=0;}
		
		mysqli_select_db($horizonte, $database_horizonte);
		$consulta = "SELECT v.id_avr, v.id_valor_referencia_avr, v.numero1_rango_avr, v.numero2_rango_avr, v.valor_maximo, v.valor_minimo, v.valor_estable_rmn, v.valor_variable_rmn, v.valor_texto, v.booleano, v.para_sexo, v.para_edades, v.rango_edad1, v.rango_edad2, b.id_base_ab, v.tipo_edad, v.valor_normal_nma, v.valor_r1_moderado, v.valor_r2_moderado, v.valor_alto_nma, v.valor_normal_nma_i, v.valor_r1_moderado_i, v.valor_r2_moderado_i, v.valor_alto_nma_i from asignar_valor_referencia v left join bases b1 on b1.aleatorio_b = v.aleatorio_avr left join asignar_bases b on b.id_base_ab = b1.id_b where v.para_sexo is not null and v.para_edades is not null and b.id_estudio_ab = $row[0] order by b.id_ab, v.tipo_edad asc ";
		$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
		while ($fila = mysqli_fetch_array($query)) {
			
			$idBase = $fila['id_base_ab']; 
			$id_valor_referencia = $fila['id_valor_referencia_avr'];
			$numero1_rango = sqlValue($fila['numero1_rango_avr'], "double", $horizonte);
			$numero2_rango = sqlValue($fila['numero2_rango_avr'], "double", $horizonte);
			$valor_maximo = sqlValue($fila['valor_maximo'], "double", $horizonte);
			$valor_minimo = sqlValue($fila['valor_minimo'], "double", $horizonte);
			$valor_estable = sqlValue($fila['valor_estable_rmn'], "double", $horizonte);
			$valor_variable = sqlValue($fila['valor_variable_rmn'], "double", $horizonte);
			$valor_texto = sqlValue($fila['valor_texto'], "text", $horizonte);
			$booleano = sqlValue($fila['booleano'], "int", $horizonte);
			$para_sexo = sqlValue($fila['para_sexo'], "text", $horizonte);
			$para_edades = sqlValue($fila['para_edades'], "text", $horizonte);
			$rango_edad1 = sqlValue($fila['rango_edad1'], "int", $horizonte);
			$rango_edad2 = sqlValue($fila['rango_edad2'], "int", $horizonte);
			$tipo_vr = sqlValue($fila['id_valor_referencia_avr'], "int", $horizonte);
			$tipo_edad = sqlValue($fila['tipo_edad'], "text", $horizonte);
			$valor_normal = sqlValue($fila['valor_normal_nma'], "double", $horizonte);
			$valor_r1_moderado = sqlValue($fila['valor_r1_moderado'], "double", $horizonte);
			$valor_r2_moderado = sqlValue($fila['valor_r2_moderado'], "double", $horizonte);
			$valor_alto = sqlValue($fila['valor_alto_nma'], "double", $horizonte);
			$valor_normal_i = sqlValue($fila['valor_normal_nma_i'], "double", $horizonte);
			$valor_r1_moderado_i = sqlValue($fila['valor_r1_moderado_i'], "double", $horizonte);
			$valor_r2_moderado_i = sqlValue($fila['valor_r2_moderado_i'], "double", $horizonte);
			$valor_alto_i = sqlValue($fila['valor_alto_nma_i'], "double", $horizonte);
			//Ahora tenemos que guardar un registro de resultados por cada VR adecuado para el paciente
	
			//Hombres y mujeres
				//Todas las edades
				if($fila['para_sexo'] == 'HOMBRES Y MUJERES' and $fila['para_edades'] == 'TODAS LAS EDADES'){
					mysqli_select_db($horizonte, $database_horizonte);
					 $sqlT = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, numero1_rango_rl, numero2_rango_rl, valor_maximo_rl, valor_minimo_rl, valor_estable_rl, valor_variable_rl, valor_texto_rl, boleano_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl, r_valor_normal, r_valor_r1_moderado, r_valor_r2_moderado, r_valor_alto, r_valor_normal_i, r_valor_r1_moderado_i, r_valor_r2_moderado_i, r_valor_alto_i)";
					 $sqlT.= "VALUES ($idEvc, $idBase, $id_valor_referencia, $numero1_rango, $numero2_rango, $valor_maximo, $valor_minimo, $valor_estable, $valor_variable, $valor_texto, $booleano, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, 'a', $valor_normal, $valor_r1_moderado, $valor_r2_moderado, $valor_alto, $valor_normal_i, $valor_r1_moderado_i, $valor_r2_moderado_i, $valor_alto_i)";
					  
					$updateT = mysqli_query($horizonte, $sqlT) or die (mysqli_error($horizonte));
					if (!$updateT) {  echo $sqlT; } else{ }
				}
				//Fin todas las Edades
				
				//Rango de edad
					if($fila['para_sexo'] == 'HOMBRES Y MUJERES' and $fila['para_edades'] == 'RANGO DE EDAD'){
						mysqli_select_db($horizonte, $database_horizonte);
						 $sqlT1 = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, numero1_rango_rl, numero2_rango_rl, valor_maximo_rl, valor_minimo_rl, valor_estable_rl, valor_variable_rl, valor_texto_rl, boleano_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl, r_valor_normal, r_valor_r1_moderado, r_valor_r2_moderado, r_valor_alto, r_valor_normal_i, r_valor_r1_moderado_i, r_valor_r2_moderado_i, r_valor_alto_i)";
						 $sqlT1.= "VALUES ($idEvc, $idBase, $id_valor_referencia, $numero1_rango, $numero2_rango, $valor_maximo, $valor_minimo, $valor_estable, $valor_variable, $valor_texto, $booleano, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, $tipo_edad, $valor_normal, $valor_r1_moderado, $valor_r2_moderado, $valor_alto, $valor_normal_i, $valor_r1_moderado_i, $valor_r2_moderado_i, $valor_alto_i)";
						 
						 //para años
						 if($fila['tipo_edad'] == 'a'){
							 if($edadPanios >= $fila['rango_edad1'] and $edadPanios <= $fila['rango_edad2']){
								$updateT1 = mysqli_query($horizonte, $sqlT1) or die (mysqli_error($horizonte));
								if (!$updateT1) {  echo $sqlT1; } else{ }
							 }
						 }
						 //fin para años
						 
						 //para meses
						 if($fila['tipo_edad'] == 'm' and $edadPanios <1 and $edadPmeses >0){
							 if($edadPmeses >= $fila['rango_edad1'] and $edadPmeses <= $fila['rango_edad2']){
								$updateT1 = mysqli_query($horizonte, $sqlT1) or die (mysqli_error($horizonte));
								if (!$updateT1) {  echo $sqlT1; } else{ }
							 }
						 }
						 //Fin para meses
						 
						 //para días
						 if($fila['tipo_edad'] == 'd' and $edadPanios <1 and $edadPmeses <1){
							 if($edadPdias >= $fila['rango_edad1'] and $edadPdias <= $fila['rango_edad2']){
								$updateT1 = mysqli_query($horizonte, $sqlT1) or die (mysqli_error($horizonte));
								if (!$updateT1) {  echo $sqlT1; } else{ }
							 }
						 }
						 //Fin para días
					}
				//Fin rango de Edad
			//Fin hombres y mujeres
			
			//Hombres
		if($sexoP==2){
			//Todas las edades
			if($fila['para_sexo'] == 'HOMBRES' and $fila['para_edades'] == 'TODAS LAS EDADES'){
				mysqli_select_db($horizonte, $database_horizonte);
				 $sqlT2 = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, numero1_rango_rl, numero2_rango_rl, valor_maximo_rl, valor_minimo_rl, valor_estable_rl, valor_variable_rl, valor_texto_rl, boleano_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl, r_valor_normal, r_valor_r1_moderado, r_valor_r2_moderado, r_valor_alto, r_valor_normal_i, r_valor_r1_moderado_i, r_valor_r2_moderado_i, r_valor_alto_i)";
				 $sqlT2.= "VALUES ($idEvc, $idBase, $id_valor_referencia, $numero1_rango, $numero2_rango, $valor_maximo, $valor_minimo, $valor_estable, $valor_variable, $valor_texto, $booleano, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, 'a', $valor_normal, $valor_r1_moderado, $valor_r2_moderado, $valor_alto, $valor_normal_i, $valor_r1_moderado_i, $valor_r2_moderado_i, $valor_alto_i)";
				  
				$updateT2 = mysqli_query($horizonte, $sqlT2) or die (mysqli_error($horizonte));
				if (!$updateT2) {  echo $sqlT2; } else{ }
			}
			//Fin todas las Edades
			
			//Rango de edad
			if($fila['para_sexo'] == 'HOMBRES' and $fila['para_edades'] == 'RANGO DE EDAD'){
				mysqli_select_db($horizonte, $database_horizonte);
				 $sqlT3 = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, numero1_rango_rl, numero2_rango_rl, valor_maximo_rl, valor_minimo_rl, valor_estable_rl, valor_variable_rl, valor_texto_rl, boleano_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl, r_valor_normal, r_valor_r1_moderado, r_valor_r2_moderado, r_valor_alto, r_valor_normal_i, r_valor_r1_moderado_i, r_valor_r2_moderado_i, r_valor_alto_i)";
				 $sqlT3.= "VALUES ($idEvc, $idBase, $id_valor_referencia, $numero1_rango, $numero2_rango, $valor_maximo, $valor_minimo, $valor_estable, $valor_variable, $valor_texto, $booleano, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, $tipo_edad, $valor_normal, $valor_r1_moderado, $valor_r2_moderado, $valor_alto, $valor_normal_i, $valor_r1_moderado_i, $valor_r2_moderado_i, $valor_alto_i)";
				 
				 //para años
				 if($fila['tipo_edad'] == 'a'){
					 if($edadPanios >= $fila['rango_edad1'] and $edadPanios <= $fila['rango_edad2']){
						$updateT3 = mysqli_query($horizonte, $sqlT3) or die (mysqli_error($horizonte));
						if (!$updateT3) {  echo $sqlT3; } else{ }
					 }
				 }
				 //fin para años
				 
				 //para meses
				 if($fila['tipo_edad'] == 'm' and $edadPanios <1 and $edadPmeses >0){
					 if($edadPmeses >= $fila['rango_edad1'] and $edadPmeses <= $fila['rango_edad2']){
						$updateT3 = mysqli_query($horizonte, $sqlT3) or die (mysqli_error($horizonte));
						if (!$updateT3) {  echo $sqlT3; } else{ }
					 }
				 }
				 //Fin para meses
				 
				 //para días
				 if($fila['tipo_edad'] == 'd' and $edadPanios <1 and $edadPmeses <1){
					 if($edadPdias >= $fila['rango_edad1'] and $edadPdias <= $fila['rango_edad2']){
						$updateT3 = mysqli_query($horizonte, $sqlT3) or die (mysqli_error($horizonte));
						if (!$updateT3) {  echo $sqlT3; } else{ }
					 }
				 }
				 //Fin para días
			}
			//Fin rango de Edad
		}
		//Fin hombres
		
		//Mujeres
		if($sexoP==1){
			//Todas las edades
			if($fila['para_sexo'] == 'MUJERES' and $fila['para_edades'] == 'TODAS LAS EDADES'){
				mysqli_select_db($horizonte, $database_horizonte);
				 $sqlT4 = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, numero1_rango_rl, numero2_rango_rl, valor_maximo_rl, valor_minimo_rl, valor_estable_rl, valor_variable_rl, valor_texto_rl, boleano_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl, r_valor_normal, r_valor_r1_moderado, r_valor_r2_moderado, r_valor_alto, r_valor_normal_i, r_valor_r1_moderado_i, r_valor_r2_moderado_i, r_valor_alto_i)";
				 $sqlT4.= "VALUES ($idEvc, $idBase, $id_valor_referencia, $numero1_rango, $numero2_rango, $valor_maximo, $valor_minimo, $valor_estable, $valor_variable, $valor_texto, $booleano, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, 'a', $valor_normal, $valor_r1_moderado, $valor_r2_moderado, $valor_alto, $valor_normal_i, $valor_r1_moderado_i, $valor_r2_moderado_i, $valor_alto_i)";
				  
				$updateT4 = mysqli_query($horizonte, $sqlT4) or die (mysqli_error($horizonte));
				if (!$updateT4) {  echo $sqlT4; } else{ }
			}
			//Fin todas las Edades
			
			//Rango de edad
			if($fila['para_sexo'] == 'MUJERES' and $fila['para_edades'] == 'RANGO DE EDAD'){
				mysqli_select_db($horizonte, $database_horizonte);
				 $sqlT5 = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, numero1_rango_rl, numero2_rango_rl, valor_maximo_rl, valor_minimo_rl, valor_estable_rl, valor_variable_rl, valor_texto_rl, boleano_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl, r_valor_normal, r_valor_r1_moderado, r_valor_r2_moderado, r_valor_alto, r_valor_normal_i, r_valor_r1_moderado_i, r_valor_r2_moderado_i, r_valor_alto_i)";
				 $sqlT5.= "VALUES ($idEvc, $idBase, $id_valor_referencia, $numero1_rango, $numero2_rango, $valor_maximo, $valor_minimo, $valor_estable, $valor_variable, $valor_texto, $booleano, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, $tipo_edad, $valor_normal, $valor_r1_moderado, $valor_r2_moderado, $valor_alto, $valor_normal_i, $valor_r1_moderado_i, $valor_r2_moderado_i, $valor_alto_i)";
				 
				 //para años
				 if($fila['tipo_edad'] == 'a'){
					 if($edadPanios >= $fila['rango_edad1'] and $edadPanios <= $fila['rango_edad2']){
						$updateT5 = mysqli_query($horizonte, $sqlT5) or die (mysqli_error($horizonte));
						if (!$updateT5) {  echo $sqlT5; } else{ }
					 }
				 }
				 //fin para años
				 
				 //para meses
				 if($fila['tipo_edad'] == 'm' and $edadPanios <1 and $edadPmeses >0){
					 if($edadPmeses >= $fila['rango_edad1'] and $edadPmeses <= $fila['rango_edad2']){
						$updateT5 = mysqli_query($horizonte, $sqlT5) or die (mysqli_error($horizonte));
						if (!$updateT5) {  echo $sqlT5; } else{ }
					 }
				 }
				 //Fin para meses
				 
				 //para días
				 if($fila['tipo_edad'] == 'd' and $edadPanios <1 and $edadPmeses <1){
					 if($edadPdias >= $fila['rango_edad1'] and $edadPdias <= $fila['rango_edad2']){
						$updateT5 = mysqli_query($horizonte, $sqlT5) or die (mysqli_error($horizonte));
						if (!$updateT5) {  echo $sqlT5; } else{ }
					 }
				 }
				 //Fin para días
			}
			//Fin rango de Edad
		}
		//Fin mujeres
			
		};//Fin del WHILE
		
		echo 1;
	}
}elseif($checaPro == 2){ //procesando en masa
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaM = "SELECT v.id_vc from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.referencia_vc = $ref and v.estatus_vc = 1 and c.id_tipo_concepto_to = 3 ";
	$queryM = mysqli_query($horizonte, $consultaM) or die (mysqli_error($horizonte));
		
	$sql = "UPDATE venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es SET v.estatus_vc = 2, v.usuarioEdo2_e = $idU, v.fechaEdo2_e = $now, v.nota_radiologo_vc = $nota where v.referencia_vc = $ref and v.estatus_vc = 1 and c.id_tipo_concepto_to = 3 ";
	
	$update = mysqli_query($horizonte, $sql);
	
	if (!$update) { echo $sql; }
	else { //echo 'procesados';
		mysqli_select_db($horizonte, $database_horizonte);
		$sqlNotaToma = "UPDATE orden_venta SET observaciones_l_ov = $notaTomaMuestra where referencia_ov = $ref ";
		$updateNotaToma = mysqli_query($horizonte, $sqlNotaToma);
		
		while ($filaM = mysqli_fetch_array($queryM)) {//$fila['id_vc'];
			$idM = $filaM['id_vc']; //echo "/".$idM;
			
			//Si el estudio es de bactereología, debemos cargarle todas las bases del antibiograma y antibióticos
			 mysqli_select_db($horizonte, $database_horizonte);
			 $resultBa = mysqli_query($horizonte, "SELECT a.nombre_a from areas a left join conceptos c on c.id_area_to = a.id_a left join venta_conceptos v on v.id_concepto_es = c.id_to where id_vc = $idM ") or die (mysqli_error($horizonte));
			 $rowBa = mysqli_fetch_row($resultBa); $area_e = sqlValue($rowBa[0], "text", $horizonte);
			 if($rowBa[0]=='BACTERIOLOGIA'){
				mysqli_select_db($horizonte, $database_horizonte);
				$result_ax = mysqli_query($horizonte, "SELECT v.id_concepto_es, v.id_paciente_vc, v.id_vc from venta_conceptos v where v.id_vc = $idM ") or die (mysqli_error($horizonte));
				$row_ax = mysqli_fetch_row($result_ax);
			
				mysqli_select_db($horizonte, $database_horizonte);
				$consulta_a = "SELECT v.id_avr, v.id_valor_referencia_avr, v.valor_texto, v.para_sexo, v.para_edades, v.rango_edad1, v.rango_edad2, b1.id_b, v.tipo_edad from asignar_valor_referencia v left join bases b1 on b1.aleatorio_b = v.aleatorio_avr left join areas a on a.id_a = b1.id_area_b where v.para_sexo is not null and v.para_edades is not null and a.nombre_a = 'BACTERIOLOGIA' order by b1.id_b, v.tipo_edad asc ";
				$query_a = mysqli_query($horizonte, $consulta_a) or die (mysqli_error($horizonte));
				while ($fila_a = mysqli_fetch_array($query_a)) {
					$idBase = $fila_a['id_b']; $id_valor_referencia = $fila_a['id_valor_referencia_avr'];
					$valor_texto = sqlValue($fila_a['valor_texto'], "text", $horizonte); $para_sexo = sqlValue($fila_a['para_sexo'], "text", $horizonte);
					$para_edades = sqlValue($fila_a['para_edades'], "text", $horizonte); $rango_edad1 = sqlValue($fila_a['rango_edad1'], "int", $horizonte);
					$rango_edad2 = sqlValue($fila_a['rango_edad2'], "int", $horizonte); $tipo_vr = sqlValue($fila_a['id_valor_referencia_avr'], "int", $horizonte);
					$tipo_edad = sqlValue($fila_a['tipo_edad'], "text", $horizonte);
			
					//Hombres y mujeres //Todas las edades
					if($fila_a['para_sexo'] == 'HOMBRES Y MUJERES' and $fila_a['para_edades'] == 'TODAS LAS EDADES'){
						mysqli_select_db($horizonte, $database_horizonte);
						 $sqlT_a = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, valor_texto_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl)";
						 $sqlT_a.= "VALUES ($idEvc, $idBase, $id_valor_referencia, $valor_texto, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, 'a')";
						$updateT_a = mysqli_query($horizonte, $sqlT_a) or die (mysqli_error($horizonte)); if(!$updateT_a){ echo $sqlT_a; }else{ }
					}
				};//Fin del WHILE
			 }//Fin Bacteriología
	 
			mysqli_select_db($horizonte, $database_horizonte);
			$result = mysqli_query($horizonte, "SELECT v.id_concepto_es, v.id_paciente_vc, v.id_vc from venta_conceptos v where v.id_vc = $idM ") or die (mysqli_error($horizonte));
			$row = mysqli_fetch_row($result);
			
			mysqli_select_db($horizonte, $database_horizonte);
			$resultP = mysqli_query($horizonte, "SELECT fNac_p, sexo_p from pacientes where id_p = $row[1] ") or die (mysqli_error($horizonte));
			$rowP = mysqli_fetch_row($resultP);
			
			$edadPanios = $rowP[0];
			$sexoP = $rowP[1];
			$fecha1 = new DateTime($edadPanios); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);
		
			$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
			if($anos>=0){$edadPanios=$anos;}
			if($anos<1){
				$edadPmeses=$meses;
				if($edadPmeses<1){$edadPdias=$dias;}else{$edadPdias=0;}
			}else{$edadPmeses=0; $edadPdias=0;}
					
			mysqli_select_db($horizonte, $database_horizonte);
			$consulta = "SELECT v.id_avr, v.id_valor_referencia_avr, v.numero1_rango_avr, v.numero2_rango_avr, v.valor_maximo, v.valor_minimo, v.valor_estable_rmn, v.valor_variable_rmn, v.valor_texto, v.booleano, v.para_sexo, v.para_edades, v.rango_edad1, v.rango_edad2, b.id_base_ab, v.tipo_edad, v.valor_normal_nma, v.valor_r1_moderado, v.valor_r2_moderado, v.valor_alto_nma, v.valor_normal_nma_i, v.valor_r1_moderado_i, v.valor_r2_moderado_i, v.valor_alto_nma_i from asignar_valor_referencia v left join bases b1 on b1.aleatorio_b = v.aleatorio_avr left join asignar_bases b on b.id_base_ab = b1.id_b where v.para_sexo is not null and v.para_edades is not null and b.id_estudio_ab = $row[0] order by b.id_ab, v.tipo_edad asc ";
			$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
			while ($fila = mysqli_fetch_array($query)) {
				
				$idBase = $fila['id_base_ab']; 
				$id_valor_referencia = $fila['id_valor_referencia_avr'];
				$numero1_rango = sqlValue($fila['numero1_rango_avr'], "double", $horizonte);
				$numero2_rango = sqlValue($fila['numero2_rango_avr'], "double", $horizonte);
				$valor_maximo = sqlValue($fila['valor_maximo'], "double", $horizonte);
				$valor_minimo = sqlValue($fila['valor_minimo'], "double", $horizonte);
				$valor_estable = sqlValue($fila['valor_estable_rmn'], "double", $horizonte);
				$valor_variable = sqlValue($fila['valor_variable_rmn'], "double", $horizonte);
				$valor_texto = sqlValue($fila['valor_texto'], "text", $horizonte);
				$booleano = sqlValue($fila['booleano'], "int", $horizonte);
				$para_sexo = sqlValue($fila['para_sexo'], "text", $horizonte);
				$para_edades = sqlValue($fila['para_edades'], "text", $horizonte);
				$rango_edad1 = sqlValue($fila['rango_edad1'], "int", $horizonte);
				$rango_edad2 = sqlValue($fila['rango_edad2'], "int", $horizonte);
				$tipo_vr = sqlValue($fila['id_valor_referencia_avr'], "int", $horizonte);
				$tipo_edad = sqlValue($fila['tipo_edad'], "text", $horizonte);
				$valor_normal = sqlValue($fila['valor_normal_nma'], "double", $horizonte);
				$valor_r1_moderado = sqlValue($fila['valor_r1_moderado'], "double", $horizonte);
				$valor_r2_moderado = sqlValue($fila['valor_r2_moderado'], "double", $horizonte);
				$valor_alto = sqlValue($fila['valor_alto_nma'], "double", $horizonte);
				$valor_normal_i = sqlValue($fila['valor_normal_nma_i'], "double", $horizonte);
				$valor_r1_moderado_i = sqlValue($fila['valor_r1_moderado_i'], "double", $horizonte);
				$valor_r2_moderado_i = sqlValue($fila['valor_r2_moderado_i'], "double", $horizonte);
				$valor_alto_i = sqlValue($fila['valor_alto_nma_i'], "double", $horizonte);
				//Ahora tenemos que guardar un registro de resultados por cada VR adecuado para el paciente
		
				//Hombres y mujeres
					//Todas las edades
					if($fila['para_sexo'] == 'HOMBRES Y MUJERES' and $fila['para_edades'] == 'TODAS LAS EDADES'){
						mysqli_select_db($horizonte, $database_horizonte);
						 $sqlT = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, numero1_rango_rl, numero2_rango_rl, valor_maximo_rl, valor_minimo_rl, valor_estable_rl, valor_variable_rl, valor_texto_rl, boleano_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl, r_valor_normal, r_valor_r1_moderado, r_valor_r2_moderado, r_valor_alto, r_valor_normal_i, r_valor_r1_moderado_i, r_valor_r2_moderado_i, r_valor_alto_i)";
						 $sqlT.= "VALUES ($row[2], $idBase, $id_valor_referencia, $numero1_rango, $numero2_rango, $valor_maximo, $valor_minimo, $valor_estable, $valor_variable, $valor_texto, $booleano, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, 'a', $valor_normal, $valor_r1_moderado, $valor_r2_moderado, $valor_alto, $valor_normal_i, $valor_r1_moderado_i, $valor_r2_moderado_i, $valor_alto_i)";
						  
						$updateT = mysqli_query($horizonte, $sqlT) or die (mysqli_error($horizonte));
						if (!$updateT) {  echo $sqlT; } else{ }
					}
					//Fin todas las Edades
					
					//Rango de edad
						if($fila['para_sexo'] == 'HOMBRES Y MUJERES' and $fila['para_edades'] == 'RANGO DE EDAD'){
							mysqli_select_db($horizonte, $database_horizonte);
							 $sqlT1 = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, numero1_rango_rl, numero2_rango_rl, valor_maximo_rl, valor_minimo_rl, valor_estable_rl, valor_variable_rl, valor_texto_rl, boleano_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl, r_valor_normal, r_valor_r1_moderado, r_valor_r2_moderado, r_valor_alto, r_valor_normal_i, r_valor_r1_moderado_i, r_valor_r2_moderado_i, r_valor_alto_i)";
							 $sqlT1.= "VALUES ($row[2], $idBase, $id_valor_referencia, $numero1_rango, $numero2_rango, $valor_maximo, $valor_minimo, $valor_estable, $valor_variable, $valor_texto, $booleano, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, $tipo_edad, $valor_normal, $valor_r1_moderado, $valor_r2_moderado, $valor_alto, $valor_normal_i, $valor_r1_moderado_i, $valor_r2_moderado_i, $valor_alto_i)";
							 
							 //para años
							 if($fila['tipo_edad'] == 'a'){
								 if($edadPanios >= $fila['rango_edad1'] and $edadPanios <= $fila['rango_edad2']){
									$updateT1 = mysqli_query($horizonte, $sqlT1) or die (mysqli_error($horizonte));
									if (!$updateT1) {  echo $sqlT1; } else{ }
								 }
							 }
							 //fin para años
							 
							 //para meses
							 if($fila['tipo_edad'] == 'm' and $edadPanios <1 and $edadPmeses >0){
								 if($edadPmeses >= $fila['rango_edad1'] and $edadPmeses <= $fila['rango_edad2']){
									$updateT1 = mysqli_query($horizonte, $sqlT1) or die (mysqli_error($horizonte));
									if (!$updateT1) {  echo $sqlT1; } else{ }
								 }
							 }
							 //Fin para meses
							 
							 //para días
							 if($fila['tipo_edad'] == 'd' and $edadPanios <1 and $edadPmeses <1){
								 if($edadPdias >= $fila['rango_edad1'] and $edadPdias <= $fila['rango_edad2']){
									$updateT1 = mysqli_query($horizonte, $sqlT1) or die (mysqli_error($horizonte));
									if (!$updateT1) {  echo $sqlT1; } else{ }
								 }
							 }
							 //Fin para días
						}
					//Fin rango de Edad
				//Fin hombres y mujeres
				
				//Hombres
			if($sexoP==2){
				//Todas las edades
				if($fila['para_sexo'] == 'HOMBRES' and $fila['para_edades'] == 'TODAS LAS EDADES'){
					mysqli_select_db($horizonte, $database_horizonte);
					 $sqlT2 = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, numero1_rango_rl, numero2_rango_rl, valor_maximo_rl, valor_minimo_rl, valor_estable_rl, valor_variable_rl, valor_texto_rl, boleano_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl, r_valor_normal, r_valor_r1_moderado, r_valor_r2_moderado, r_valor_alto, r_valor_normal_i, r_valor_r1_moderado_i, r_valor_r2_moderado_i, r_valor_alto_i)";
					 $sqlT2.= "VALUES ($row[2], $idBase, $id_valor_referencia, $numero1_rango, $numero2_rango, $valor_maximo, $valor_minimo, $valor_estable, $valor_variable, $valor_texto, $booleano, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, 'a', $valor_normal, $valor_r1_moderado, $valor_r2_moderado, $valor_alto, $valor_normal_i, $valor_r1_moderado_i, $valor_r2_moderado_i, $valor_alto_i)";
					  
					$updateT2 = mysqli_query($horizonte, $sqlT2) or die (mysqli_error($horizonte));
					if (!$updateT2) {  echo $sqlT2; } else{ }
				}
				//Fin todas las Edades
				
				//Rango de edad
				if($fila['para_sexo'] == 'HOMBRES' and $fila['para_edades'] == 'RANGO DE EDAD'){
					mysqli_select_db($horizonte, $database_horizonte);
					 $sqlT3 = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, numero1_rango_rl, numero2_rango_rl, valor_maximo_rl, valor_minimo_rl, valor_estable_rl, valor_variable_rl, valor_texto_rl, boleano_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl, r_valor_normal, r_valor_r1_moderado, r_valor_r2_moderado, r_valor_alto, r_valor_normal_i, r_valor_r1_moderado_i, r_valor_r2_moderado_i, r_valor_alto_i)";
					 $sqlT3.= "VALUES ($row[2], $idBase, $id_valor_referencia, $numero1_rango, $numero2_rango, $valor_maximo, $valor_minimo, $valor_estable, $valor_variable, $valor_texto, $booleano, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, $tipo_edad, $valor_normal, $valor_r1_moderado, $valor_r2_moderado, $valor_alto, $valor_normal_i, $valor_r1_moderado_i, $valor_r2_moderado_i, $valor_alto_i)";
					 
					 //para años
					 if($fila['tipo_edad'] == 'a'){
						 if($edadPanios >= $fila['rango_edad1'] and $edadPanios <= $fila['rango_edad2']){
							$updateT3 = mysqli_query($horizonte, $sqlT3) or die (mysqli_error($horizonte));
							if (!$updateT3) {  echo $sqlT3; } else{ }
						 }
					 }
					 //fin para años
					 
					 //para meses
					 if($fila['tipo_edad'] == 'm' and $edadPanios <1 and $edadPmeses >0){
						 if($edadPmeses >= $fila['rango_edad1'] and $edadPmeses <= $fila['rango_edad2']){
							$updateT3 = mysqli_query($horizonte, $sqlT3) or die (mysqli_error($horizonte));
							if (!$updateT3) {  echo $sqlT3; } else{ }
						 }
					 }
					 //Fin para meses
					 
					 //para días
					 if($fila['tipo_edad'] == 'd' and $edadPanios <1 and $edadPmeses <1){
						 if($edadPdias >= $fila['rango_edad1'] and $edadPdias <= $fila['rango_edad2']){
							$updateT3 = mysqli_query($horizonte, $sqlT3) or die (mysqli_error($horizonte));
							if (!$updateT3) {  echo $sqlT3; } else{ }
						 }
					 }
					 //Fin para días
				}
				//Fin rango de Edad
			}
			//Fin hombres
			
			//Mujeres
			if($sexoP==1){
				//Todas las edades
				if($fila['para_sexo'] == 'MUJERES' and $fila['para_edades'] == 'TODAS LAS EDADES'){
					mysqli_select_db($horizonte, $database_horizonte);
					 $sqlT4 = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, numero1_rango_rl, numero2_rango_rl, valor_maximo_rl, valor_minimo_rl, valor_estable_rl, valor_variable_rl, valor_texto_rl, boleano_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl, r_valor_normal, r_valor_r1_moderado, r_valor_r2_moderado, r_valor_alto, r_valor_normal_i, r_valor_r1_moderado_i, r_valor_r2_moderado_i, r_valor_alto_i)";
					 $sqlT4.= "VALUES ($row[2], $idBase, $id_valor_referencia, $numero1_rango, $numero2_rango, $valor_maximo, $valor_minimo, $valor_estable, $valor_variable, $valor_texto, $booleano, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, 'a', $valor_normal, $valor_r1_moderado, $valor_r2_moderado, $valor_alto, $valor_normal_i, $valor_r1_moderado_i, $valor_r2_moderado_i, $valor_alto_i)";
					  
					$updateT4 = mysqli_query($horizonte, $sqlT4) or die (mysqli_error($horizonte));
					if (!$updateT4) {  echo $sqlT4; } else{ }
				}
				//Fin todas las Edades
				
				//Rango de edad
				if($fila['para_sexo'] == 'MUJERES' and $fila['para_edades'] == 'RANGO DE EDAD'){
					mysqli_select_db($horizonte, $database_horizonte);
					 $sqlT5 = "INSERT INTO resultados_laboratorio (id_estudio_vc_rl, id_base_rl, id_valor_referencia_rl, numero1_rango_rl, numero2_rango_rl, valor_maximo_rl, valor_minimo_rl, valor_estable_rl, valor_variable_rl, valor_texto_rl, boleano_rl, para_sexo_rl, para_edades_rl, rango_edad1_rl, rango_edad2_rl, tipo_valor_ref_rl, tipo_edad_rl, r_valor_normal, r_valor_r1_moderado, r_valor_r2_moderado, r_valor_alto, r_valor_normal_i, r_valor_r1_moderado_i, r_valor_r2_moderado_i, r_valor_alto_i)";
					 $sqlT5.= "VALUES ($row[2], $idBase, $id_valor_referencia, $numero1_rango, $numero2_rango, $valor_maximo, $valor_minimo, $valor_estable, $valor_variable, $valor_texto, $booleano, $para_sexo, $para_edades, $rango_edad1, $rango_edad2, $tipo_vr, $tipo_edad, $valor_normal, $valor_r1_moderado, $valor_r2_moderado, $valor_alto, $valor_normal_i, $valor_r1_moderado_i, $valor_r2_moderado_i, $valor_alto_i)";
					 
					 //para años
					 if($fila['tipo_edad'] == 'a'){
						 if($edadPanios >= $fila['rango_edad1'] and $edadPanios <= $fila['rango_edad2']){
							$updateT5 = mysqli_query($horizonte, $sqlT5) or die (mysqli_error($horizonte));
							if (!$updateT5) {  echo $sqlT5; } else{ }
						 }
					 }
					 //fin para años
					 
					 //para meses
					 if($fila['tipo_edad'] == 'm' and $edadPanios <1 and $edadPmeses >0){
						 if($edadPmeses >= $fila['rango_edad1'] and $edadPmeses <= $fila['rango_edad2']){
							$updateT5 = mysqli_query($horizonte, $sqlT5) or die (mysqli_error($horizonte));
							if (!$updateT5) {  echo $sqlT5; } else{ }
						 }
					 }
					 //Fin para meses
					 
					 //para días
					 if($fila['tipo_edad'] == 'd' and $edadPanios <1 and $edadPmeses <1){
						 if($edadPdias >= $fila['rango_edad1'] and $edadPdias <= $fila['rango_edad2']){
							$updateT5 = mysqli_query($horizonte, $sqlT5) or die (mysqli_error($horizonte));
							if (!$updateT5) {  echo $sqlT5; } else{ }
						 }
					 }
					 //Fin para días
				}
				//Fin rango de Edad
			}
			//Fin mujeres
				
			};//Fin del WHILE
			
		}//Fin del otro while
		echo 1;
	}//Fin del primer else

}//Fin del else principal

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>