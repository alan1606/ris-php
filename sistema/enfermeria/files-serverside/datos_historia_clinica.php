<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT p.nombre_p, p.apaterno_p, p.amaterno_p, p.fNac_p, sx.cat_sexo, p.alergias_p, p.tSanguineo_p from pacientes p left join catalogo_sexos sx on sx.id_sexo = p.sexo_p where p.id_p = $idP ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

	$fecha1 = new DateTime($row[3]); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);
	//printf('%d AÑOS %d MESES %d DÍAS %d HORAS %d MINUTOS', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
	$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
	if($anos>0){$row[3]=$anos." AÑOS";}
	if($anos<1){
		if($meses<=2 and $meses>=1){$row[3]=$meses." MES(ES) ".$dias." DÍA(S)";}
		if($meses>=3){$row[3]=$meses." MES(ES) ";}
		if($meses==0){$row[3]=$dias." DÍA(S)";}
		if($meses==0 and $dias<=1){$row[3]=$dias." DÍA(S) ".$horas." HORA(S)";}
		if($meses==0 and $dias<1){$row[3]=$horas." HORA(S) ".$minutos." MINUTO(S)";}
	} 
	if($anos>150 or $anos<0){$row[3]="DESCONOCIDA";}else{}

	//Checamos si el paciente tiene ya historia clínica, llenamos de tabla historia_clinica_n, sino llenamos de antecedentes
	mysqli_select_db($horizonte, $database_horizonte);
	$result0 = mysqli_query($horizonte, "SELECT count(id_hc) from historia_clinica_n where id_paciente_hc = $idP and id_medico_t_hc is not null ") or die (mysqli_error($horizonte));
 	$row0 = mysqli_fetch_row($result0);

	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT h.dx_hc, h.id_medico_t_hc, h.servicio_hc, h.fecha_hc, h.ingreso_hc, h.no_cama_hc, h.reg_hc from historia_clinica_n h where h.id_paciente_hc = $idP ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
	if($row0[0]>0){ //Ya tiene HC, cargamos desde table historia_clinica_n
		//DIABETES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDi = mysqli_query($horizonte, "SELECT diabetes_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowDi = mysqli_fetch_row($resultDi); $diabetes = $rowDi[0];

		//CÁNCER
		mysqli_select_db($horizonte, $database_horizonte);
		$resultHi = mysqli_query($horizonte, "SELECT cancer_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowHi = mysqli_fetch_row($resultHi); $cancer = $rowHi[0];

		//OBESIDAD
		mysqli_select_db($horizonte, $database_horizonte);
		$resultOb = mysqli_query($horizonte, "SELECT obesidad_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowOb = mysqli_fetch_row($resultOb); $obesidad = $rowOb[0];

		//CARDIOPATIAS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultCa = mysqli_query($horizonte, "SELECT cardiopatias_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowCa = mysqli_fetch_row($resultCa); $cardiopatias = $rowCa[0];

		//TUBERCULOSIS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultTu = mysqli_query($horizonte, "SELECT tuberculosis_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowTu = mysqli_fetch_row($resultTu); $tuberculosis = $rowTu[0];
		
		//OSTEOPOROSIS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultOt = mysqli_query($horizonte, "SELECT osteoporosis_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowOt = mysqli_fetch_row($resultOt); $osteoporosis = $rowOt[0];

		//PROBLEMAS DE VISTA
		mysqli_select_db($horizonte, $database_horizonte);
		$resultPv = mysqli_query($horizonte, "SELECT problemas_vista_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowPv = mysqli_fetch_row($resultPv); $p_vista = $rowPv[0];

		//DEPORTES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDe = mysqli_query($horizonte, "SELECT deportes_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowDe = mysqli_fetch_row($resultDe); $deportes = $rowDe[0];

		//TABAQUISMO
		mysqli_select_db($horizonte, $database_horizonte);
		$resultTa = mysqli_query($horizonte, "SELECT tabaquismo_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowTa = mysqli_fetch_row($resultTa); $tabaquismo = $rowTa[0];

		//ALCOHOL
		mysqli_select_db($horizonte, $database_horizonte);
		$resultAl = mysqli_query($horizonte, "SELECT alcoholismo_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowAl = mysqli_fetch_row($resultAl); $alcoholismo = $rowAl[0];

		//DROGAS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDr = mysqli_query($horizonte, "SELECT drogadiccion_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowDr = mysqli_fetch_row($resultDr); $drogadiccion = $rowDr[0];

		//HOSPITALIZACIONES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultHp = mysqli_query($horizonte, "SELECT hospitalizaciones_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowHp = mysqli_fetch_row($resultHp); $hospitalizaciones = $rowHp[0];

		//TRANSFUSIONES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultTf = mysqli_query($horizonte, "SELECT transfusiones_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowTf = mysqli_fetch_row($resultTf); $transfusiones = $rowTf[0];

		//FRACTURAS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultFt = mysqli_query($horizonte, "SELECT fracturas_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowFt = mysqli_fetch_row($resultFt); $fracuras = $rowFt[0];

		//ENFERMEDADES DE LA PIEL
		mysqli_select_db($horizonte, $database_horizonte);
		$resultEp = mysqli_query($horizonte, "SELECT enfermedades_piel_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowEp = mysqli_fetch_row($resultEp); $enfermedades_piel = $rowEp[0];

		//DESNUTRICION
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDs = mysqli_query($horizonte, "SELECT desnutricion_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowDs = mysqli_fetch_row($resultDs); $desnuticion = $rowDs[0];

		//DEFECTOS POSTURALES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDp = mysqli_query($horizonte, "SELECT posturales_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowDp = mysqli_fetch_row($resultDp); $defectos_postu = $rowDp[0];

		//DEFECTOS POSTQUIRURGICO
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDq = mysqli_query($horizonte, "SELECT postquirurgicos_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowDq = mysqli_fetch_row($resultDq); $defectos_posqui = $rowDq[0];

		//VIH
		mysqli_select_db($horizonte, $database_horizonte);
		$resultSi = mysqli_query($horizonte, "SELECT vih_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowSi = mysqli_fetch_row($resultSi); $vih = $rowSi[0];

		//SARAMPION
		mysqli_select_db($horizonte, $database_horizonte);
		$resultSa = mysqli_query($horizonte, "SELECT sarampion_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowSa = mysqli_fetch_row($resultSa); $sarampion = $rowSa[0];

		//PAROTIVITIS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultPr = mysqli_query($horizonte, "SELECT parotivitis_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowPr = mysqli_fetch_row($resultPr); $parotivi = $rowPr[0];

		//HEPATITIS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultHt = mysqli_query($horizonte, "SELECT hepatitis_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowHt = mysqli_fetch_row($resultHt); $hepatitis = $rowHt[0];

		//RUBEOLA
		mysqli_select_db($horizonte, $database_horizonte);
		$resultRu = mysqli_query($horizonte, "SELECT rubeola_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowRu = mysqli_fetch_row($resultRu); $rubeola = $rowRu[0];

		//ENFERMEDADES DE LOS ORGANOS DE LOS SENTIDOS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultEo = mysqli_query($horizonte, "SELECT enfermedades_organos_sentidos_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowEo = mysqli_fetch_row($resultEo); $enfermedades_os = $rowEo[0];

		//EXPOSICION LABORAL
		mysqli_select_db($horizonte, $database_horizonte);
		$resultEl = mysqli_query($horizonte, "SELECT exposicion_lab_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowEl = mysqli_fetch_row($resultEl); $expo_laboral = $rowEl[0];

		//MEDICACIONES ACTUALES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultMa = mysqli_query($horizonte, "SELECT medicaciones_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowMa = mysqli_fetch_row($resultMa); $medicaciones_ac = $rowMa[0];

		//OTRAS ENFERMEDADES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultOe = mysqli_query($horizonte, "SELECT otras_enfermedades_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowOe = mysqli_fetch_row($resultOe); $otras_enfer = $rowOe[0];
		
		//GPAC
		mysqli_select_db($horizonte, $database_horizonte);
		$resultGP = mysqli_query($horizonte, "SELECT gpac_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
		$rowGP = mysqli_fetch_row($resultGP); $gpac = $rowGP[0];

	}else{ //No tiene HC, cargamos desde tabla ANTECEDENTES
		//DIABETES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDi = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'DIABETES' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowDi = mysqli_fetch_row($resultDi);

		if($rowDi[0]==0 and $rowDi[2]==0){$diabetes = '';}else if($rowDi[0]==0 and $rowDi[2]==1){$diabetes = 'FAMILIAR: '.$rowDi[3];}
		else if($rowDi[0]==1 and $rowDi[2]==0){$diabetes = 'PERSONAL: '.$rowDi[1];}else{$diabetes = 'PERSONAL: '.$rowDi[1].' | FAMILIAR: '.$rowDi[3];}

		//CÁNCER
		mysqli_select_db($horizonte, $database_horizonte);
		$resultHi = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'CANCER/LEUCEMIA' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowHi = mysqli_fetch_row($resultHi);

		if($rowHi[0]==0 and $rowHi[2]==0){$cancer = '';}else if($rowHi[0]==0 and $rowHi[2]==1){$cancer = 'FAMILIAR: '.$rowHi[3];}
		else if($rowHi[0]==1 and $rowHi[2]==0){$cancer = 'PERSONAL: '.$rowHi[1];}else{$cancer = 'PERSONAL: '.$rowHi[1].' | FAMILIAR: '.$rowHi[3];}

		//OBESIDAD
		mysqli_select_db($horizonte, $database_horizonte);
		$resultOb = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'OBESIDAD' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowOb = mysqli_fetch_row($resultOb);

		if($rowOb[0]==0 and $rowOb[2]==0){$obesidad = '';}else if($rowOb[0]==0 and $rowOb[2]==1){$obesidad = 'FAMILIAR: '.$rowOb[3];}
		else if($rowOb[0]==1 and $rowOb[2]==0){$obesidad = 'PERSONAL: '.$rowOb[1];}else{$obesidad = 'PERSONAL: '.$rowOb[1].' | FAMILIAR: '.$rowOb[3];}

		//CARDIOPATIAS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultCa = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'CARDIOPATIAS' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowCa = mysqli_fetch_row($resultCa);

		if($rowCa[0]==0 and $rowCa[2]==0){$cardiopatias = '';}else if($rowCa[0]==0 and $rowCa[2]==1){$cardiopatias = 'FAMILIAR: '.$rowCa[3];}
		else if($rowCa[0]==1 and $rowCa[2]==0){$cardiopatias = 'PERSONAL: '.$rowCa[1];}else{$cardiopatias = 'PERSONAL: '.$rowCa[1].' | FAMILIAR: '.$rowCa[3];}

		//TUBERCULOSIS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultTu = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'TUBERCULOSIS' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowTu = mysqli_fetch_row($resultTu);

		if($rowTu[0]==0 and $rowTu[2]==0){$tuberculosis = '';}else if($rowTu[0]==0 and $rowTu[2]==1){$tuberculosis = 'FAMILIAR: '.$rowTu[3];}
		else if($rowTu[0]==1 and $rowTu[2]==0){$tuberculosis = 'PERSONAL: '.$rowTu[1];}else{$tuberculosis = 'PERSONAL: '.$rowTu[1].' | FAMILIAR: '.$rowTu[3];}
		
		//OSTEOPOROSIS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultOt = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'OSTEOPOROSIS' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowOt = mysqli_fetch_row($resultOt);

		if($rowOt[0]==0 and $rowOt[2]==0){$osteoporosis = '';}else if($rowOt[0]==0 and $rowOt[2]==1){$osteoporosis = 'FAMILIAR: '.$rowOt[3];}
		else if($rowOt[0]==1 and $rowOt[2]==0){$osteoporosis = 'PERSONAL: '.$rowOt[1];}else{$osteoporosis = 'PERSONAL: '.$rowOt[1].' | FAMILIAR: '.$rowOt[3];}

		//PROBLEMAS DE VISTA
		mysqli_select_db($horizonte, $database_horizonte);
		$resultPv = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'PROBLEMAS DE VISTA' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowPv = mysqli_fetch_row($resultPv);

		if($rowPv[0]==0 and $rowPv[2]==0){$p_vista = '';}else if($rowPv[0]==0 and $rowPv[2]==1){$p_vista = 'FAMILIAR: '.$rowPv[3];}
		else if($rowPv[0]==1 and $rowPv[2]==0){$p_vista = 'PERSONAL: '.$rowPv[1];}else{$p_vista = 'PERSONAL: '.$rowPv[1].' | FAMILIAR: '.$rowPv[3];}

		//DEPORTES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDe = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'DEPORTES' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowDe = mysqli_fetch_row($resultDe);

		if($rowDe[0]==0 and $rowDe[2]==0){$deportes = '';}else if($rowDe[0]==0 and $rowDe[2]==1){$deportes = 'FAMILIAR: '.$rowDe[3];}
		else if($rowDe[0]==1 and $rowDe[2]==0){$deportes = 'PERSONAL: '.$rowDe[1];}else{$deportes = 'PERSONAL: '.$rowDe[1].' | FAMILIAR: '.$rowDe[3];}

		//TABAQUISMO
		mysqli_select_db($horizonte, $database_horizonte);
		$resultTa = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'TABAQUISMO' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowTa = mysqli_fetch_row($resultTa);

		if($rowTa[0]==0 and $rowTa[2]==0){$tabaquismo = '';}else if($rowTa[0]==0 and $rowTa[2]==1){$tabaquismo = 'FAMILIAR: '.$rowTa[3];}
		else if($rowTa[0]==1 and $rowTa[2]==0){$tabaquismo = 'PERSONAL: '.$rowTa[1];}else{$tabaquismo = 'PERSONAL: '.$rowTa[1].' | FAMILIAR: '.$rowTa[3];}

		//ALCOHOL
		mysqli_select_db($horizonte, $database_horizonte);
		$resultAl = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'ALCOHOL' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowAl = mysqli_fetch_row($resultAl);

		if($rowAl[0]==0 and $rowAl[2]==0){$alcoholismo = '';}else if($rowAl[0]==0 and $rowAl[2]==1){$alcoholismo = 'FAMILIAR: '.$rowAl[3];}
		else if($rowAl[0]==1 and $rowAl[2]==0){$alcoholismo = 'PERSONAL: '.$rowAl[1];}else{$alcoholismo = 'PERSONAL: '.$rowAl[1].' | FAMILIAR: '.$rowAl[3];}

		//DROGAS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDr = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'DROGAS' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowDr = mysqli_fetch_row($resultDr);

		if($rowDr[0]==0 and $rowDr[2]==0){$drogadiccion = '';}else if($rowDr[0]==0 and $rowDr[2]==1){$drogadiccion = 'FAMILIAR: '.$rowDr[3];}
		else if($rowDr[0]==1 and $rowDr[2]==0){$drogadiccion = 'PERSONAL: '.$rowDr[1];}else{$drogadiccion = 'PERSONAL: '.$rowDr[1].' | FAMILIAR: '.$rowDr[3];}

		//HOSPITALIZACIONES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultHp = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'HOSPITALIZACIONES' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowHp = mysqli_fetch_row($resultHp);

		if($rowHp[0]==0 and $rowHp[2]==0){$hospitalizaciones = '';}else if($rowHp[0]==0 and $rowHp[2]==1){$hospitalizaciones = 'FAMILIAR: '.$rowHp[3];}
		else if($rowHp[0]==1 and $rowHp[2]==0){$hospitalizaciones = 'PERSONAL: '.$rowHp[1];}else{$hospitalizaciones = 'PERSONAL: '.$rowHp[1].' | FAMILIAR: '.$rowHp[3];}

		//TRANSFUSIONES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultTf = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'TRANSFUSIONES' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowTf = mysqli_fetch_row($resultTf);

		if($rowTf[0]==0 and $rowTf[2]==0){$transfusiones = '';}else if($rowTf[0]==0 and $rowTf[2]==1){$transfusiones = 'FAMILIAR: '.$rowTf[3];}
		else if($rowTf[0]==1 and $rowTf[2]==0){$transfusiones = 'PERSONAL: '.$rowTf[1];}else{$transfusiones = 'PERSONAL: '.$rowTf[1].' | FAMILIAR: '.$rowTf[3];}

		//FRACTURAS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultFt = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'FRACTURAS' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowFt = mysqli_fetch_row($resultFt);

		if($rowFt[0]==0 and $rowFt[2]==0){$fracuras = '';}else if($rowFt[0]==0 and $rowFt[2]==1){$fracuras = 'FAMILIAR: '.$rowFt[3];}
		else if($rowFt[0]==1 and $rowFt[2]==0){$fracuras = 'PERSONAL: '.$rowFt[1];}else{$fracuras = 'PERSONAL: '.$rowFt[1].' | FAMILIAR: '.$rowFt[3];}

		//ENFERMEDADES DE LA PIEL
		mysqli_select_db($horizonte, $database_horizonte);
		$resultEp = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'ENFERMEDADES DE LA PIEL' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowEp = mysqli_fetch_row($resultEp);

		if($rowEp[0]==0 and $rowEp[2]==0){$enfermedades_piel = '';}else if($rowEp[0]==0 and $rowEp[2]==1){$enfermedades_piel = 'FAMILIAR: '.$rowEp[3];}
		else if($rowEp[0]==1 and $rowEp[2]==0){$enfermedades_piel = 'PERSONAL: '.$rowEp[1];}else{$enfermedades_piel = 'PERSONAL: '.$rowEp[1].' | FAMILIAR: '.$rowEp[3];}

		//DESNUTRICION
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDs = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'DESNUTRICION' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowDs = mysqli_fetch_row($resultDs);

		if($rowDs[0]==0 and $rowDs[2]==0){$desnuticion = '';}else if($rowDs[0]==0 and $rowDs[2]==1){$desnuticion = 'FAMILIAR: '.$rowDs[3];}
		else if($rowDs[0]==1 and $rowDs[2]==0){$desnuticion = 'PERSONAL: '.$rowDs[1];}else{$desnuticion = 'PERSONAL: '.$rowDs[1].' | FAMILIAR: '.$rowDs[3];}

		//DEFECTOS POSTURALES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDp = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'DEFECTOS POSTURALES' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowDp = mysqli_fetch_row($resultDp);

		if($rowDp[0]==0 and $rowDp[2]==0){$defectos_postu = '';}else if($rowDp[0]==0 and $rowDp[2]==1){$defectos_postu = 'FAMILIAR: '.$rowDp[3];}
		else if($rowDp[0]==1 and $rowDp[2]==0){$defectos_postu = 'PERSONAL: '.$rowDp[1];}else{$defectos_postu = 'PERSONAL: '.$rowDp[1].' | FAMILIAR: '.$rowDp[3];}

		//DEFECTOS POSTQUIRURGICO
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDq = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'DEFECTOS POSTQUIRURGICO' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowDq = mysqli_fetch_row($resultDq);

		if($rowDq[0]==0 and $rowDq[2]==0){$defectos_posqui = '';}else if($rowDq[0]==0 and $rowDq[2]==1){$defectos_posqui = 'FAMILIAR: '.$rowDq[3];}
		else if($rowDq[0]==1 and $rowDq[2]==0){$defectos_posqui = 'PERSONAL: '.$rowDq[1];}else{$defectos_posqui = 'PERSONAL: '.$rowDq[1].' | FAMILIAR: '.$rowDq[3];}

		//VIH
		mysqli_select_db($horizonte, $database_horizonte);
		$resultSi = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'VIH' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowSi = mysqli_fetch_row($resultSi);

		if($rowSi[0]==0 and $rowSi[2]==0){$vih = '';}else if($rowSi[0]==0 and $rowSi[2]==1){$vih = 'FAMILIAR: '.$rowSi[3];}
		else if($rowSi[0]==1 and $rowSi[2]==0){$vih = 'PERSONAL: '.$rowSi[1];}else{$vih = 'PERSONAL: '.$rowSi[1].' | FAMILIAR: '.$rowSi[3];}

		//SARAMPION
		mysqli_select_db($horizonte, $database_horizonte);
		$resultSa = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'SARAMPION' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowSa = mysqli_fetch_row($resultSa);

		if($rowSa[0]==0 and $rowSa[2]==0){$sarampion = '';}else if($rowSa[0]==0 and $rowSa[2]==1){$sarampion = 'FAMILIAR: '.$rowSa[3];}
		else if($rowSa[0]==1 and $rowSa[2]==0){$sarampion = 'PERSONAL: '.$rowSa[1];}else{$sarampion = 'PERSONAL: '.$rowSa[1].' | FAMILIAR: '.$rowSa[3];}

		//PAROTIVITIS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultPr = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'PAROTIVITIS' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowPr = mysqli_fetch_row($resultPr);

		if($rowPr[0]==0 and $rowPr[2]==0){$parotivi = '';}else if($rowPr[0]==0 and $rowPr[2]==1){$parotivi = 'FAMILIAR: '.$rowPr[3];}
		else if($rowPr[0]==1 and $rowPr[2]==0){$parotivi = 'PERSONAL: '.$rowPr[1];}else{$parotivi = 'PERSONAL: '.$rowPr[1].' | FAMILIAR: '.$rowPr[3];}

		//HEPATITIS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultHt = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'HEPATITIS' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowHt = mysqli_fetch_row($resultHt);

		if($rowHt[0]==0 and $rowHt[2]==0){$hepatitis = '';}else if($rowHt[0]==0 and $rowHt[2]==1){$hepatitis = 'FAMILIAR: '.$rowHt[3];}
		else if($rowHt[0]==1 and $rowHt[2]==0){$hepatitis = 'PERSONAL: '.$rowHt[1];}else{$hepatitis = 'PERSONAL: '.$rowHt[1].' | FAMILIAR: '.$rowHt[3];}

		//RUBEOLA
		mysqli_select_db($horizonte, $database_horizonte);
		$resultRu = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'RUBEOLA' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowRu = mysqli_fetch_row($resultRu);

		if($rowRu[0]==0 and $rowRu[2]==0){$rubeola = '';}else if($rowRu[0]==0 and $rowRu[2]==1){$rubeola = 'FAMILIAR: '.$rowRu[3];}
		else if($rowRu[0]==1 and $rowRu[2]==0){$rubeola = 'PERSONAL: '.$rowRu[1];}else{$rubeola = 'PERSONAL: '.$rowRu[1].' | FAMILIAR: '.$rowRu[3];}

		//ENFERMEDADES DE LOS ORGANOS DE LOS SENTIDOS
		mysqli_select_db($horizonte, $database_horizonte);
		$resultEo = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'ENFERMEDADES DE LOS ORGANOS DE LOS SENTIDOS' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowEo = mysqli_fetch_row($resultEo);

		if($rowEo[0]==0 and $rowEo[2]==0){$enfermedades_os = '';}else if($rowEo[0]==0 and $rowEo[2]==1){$enfermedades_os = 'FAMILIAR: '.$rowEo[3];}
		else if($rowEo[0]==1 and $rowEo[2]==0){$enfermedades_os = 'PERSONAL: '.$rowEo[1];}else{$enfermedades_os = 'PERSONAL: '.$rowEo[1].' | FAMILIAR: '.$rowEo[3];}

		//EXPOSICION LABORAL
		mysqli_select_db($horizonte, $database_horizonte);
		$resultEl = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'EXPOSICION LABORAL' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowEl = mysqli_fetch_row($resultEl);

		if($rowEl[0]==0 and $rowEl[2]==0){$expo_laboral = '';}else if($rowEl[0]==0 and $rowEl[2]==1){$expo_laboral = 'FAMILIAR: '.$rowEl[3];}
		else if($rowEl[0]==1 and $rowEl[2]==0){$expo_laboral = 'PERSONAL: '.$rowEl[1];}else{$expo_laboral = 'PERSONAL: '.$rowEl[1].' | FAMILIAR: '.$rowEl[3];}

		//MEDICACIONES ACTUALES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultMa = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'MEDICACIONES ACTUALES' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowMa = mysqli_fetch_row($resultMa);

		if($rowMa[0]==0 and $rowMa[2]==0){$medicaciones_ac = '';}else if($rowMa[0]==0 and $rowMa[2]==1){$medicaciones_ac = 'FAMILIAR: '.$rowMa[3];}
		else if($rowMa[0]==1 and $rowMa[2]==0){$medicaciones_ac = 'PERSONAL: '.$rowMa[1];}else{$medicaciones_ac = 'PERSONAL: '.$rowMa[1].' | FAMILIAR: '.$rowMa[3];}

		//OTRAS ENFERMEDADES
		mysqli_select_db($horizonte, $database_horizonte);
		$resultOe = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $idP and antecedente_an = 'OTRAS ENFERMEDADES' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		$rowOe = mysqli_fetch_row($resultOe);

		if($rowOe[0]==0 and $rowOe[2]==0){$otras_enfer = '';}else if($rowOe[0]==0 and $rowOe[2]==1){$otras_enfer = 'FAMILIAR: '.$rowOe[3];}
		else if($rowOe[0]==1 and $rowOe[2]==0){$otras_enfer = 'PERSONAL: '.$rowOe[1];}else{$otras_enfer = 'PERSONAL: '.$rowOe[1].' | FAMILIAR: '.$rowOe[3];}

		if($row[4]==1){$gpac = 'G0 P0 A0 C0';}else{$gpac = '';}
	}

	//hipertension_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultHs = mysqli_query($horizonte, "SELECT hipertension_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowHs = mysqli_fetch_row($resultHs); $hipertension = $rowHs[0];

	//nefropatas_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultNf = mysqli_query($horizonte, "SELECT nefropatas_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowNf = mysqli_fetch_row($resultNf); $nefropatas = $rowNf[0];

	//malformaciones_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultMf = mysqli_query($horizonte, "SELECT malformaciones_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowMf = mysqli_fetch_row($resultMf); $malformaciones = $rowMf[0];

	//otros_ahf_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultOa = mysqli_query($horizonte, "SELECT otros_ahf_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowOa = mysqli_fetch_row($resultOa); $otros_ahf = $rowOa[0];

	//alimentacion_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultAm = mysqli_query($horizonte, "SELECT alimentacion_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowAm = mysqli_fetch_row($resultAm); $alimentacion = $rowAm[0];

	//vivienda_sb_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultVi = mysqli_query($horizonte, "SELECT vivienda_sb_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowVi = mysqli_fetch_row($resultVi); $vivienda = $rowVi[0];

	//otros_apnp_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultOn = mysqli_query($horizonte, "SELECT otros_apnp_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowOn = mysqli_fetch_row($resultOn); $otros_apnp = $rowOn[0];

	//enfermedades_infancia_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultEi = mysqli_query($horizonte, "SELECT enfermedades_infancia_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowEi = mysqli_fetch_row($resultEi); $enfermedades_infancia = $rowEi[0];

	//cirugias_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultCi = mysqli_query($horizonte, "SELECT cirugias_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowCi = mysqli_fetch_row($resultCi); $cirugias = $rowCi[0];

	//accidentes_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultAc = mysqli_query($horizonte, "SELECT accidentes_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowAc = mysqli_fetch_row($resultAc); $accidentes = $rowAc[0];

	//menarca_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultMn = mysqli_query($horizonte, "SELECT menarca_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowMn = mysqli_fetch_row($resultMn); $menarca = $rowMn[0];

	//ciclos_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultCc = mysqli_query($horizonte, "SELECT ciclos_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowCc = mysqli_fetch_row($resultCc); $ciclos = $rowCc[0];

	//ritmo_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultRi = mysqli_query($horizonte, "SELECT ritmo_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowRi = mysqli_fetch_row($resultRi); $ritmo = $rowRi[0];

	//fecha_um_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultFu = mysqli_query($horizonte, "SELECT fecha_um_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowFu = mysqli_fetch_row($resultFu); $fecha_um = $rowFu[0];

	//metrorragia_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultMr = mysqli_query($horizonte, "SELECT metrorragia_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowMr = mysqli_fetch_row($resultMr); $metrorragia = $rowMr[0];

	//dismenorrea_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultDn = mysqli_query($horizonte, "SELECT dismenorrea_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowDn = mysqli_fetch_row($resultDn); $dismenorrea = $rowDn[0];

	//ivsa_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultIv = mysqli_query($horizonte, "SELECT ivsa_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowIv = mysqli_fetch_row($resultIv); $ivsa = $rowIv[0];

	//no_parejas_s_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultPs = mysqli_query($horizonte, "SELECT no_parejas_s_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowPs = mysqli_fetch_row($resultPs); $no_parejas_s = $rowPs[0];

	//ultima_citologia_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultUc = mysqli_query($horizonte, "SELECT ultima_citologia_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowUc = mysqli_fetch_row($resultUc); $ultima_citologia = $rowUc[0];

	//metodo_pf_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultPf = mysqli_query($horizonte, "SELECT metodo_pf_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowPf = mysqli_fetch_row($resultPf); $metodo_pf = $rowPf[0];

	//motivo_consulta_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultMc = mysqli_query($horizonte, "SELECT motivo_consulta_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowMc = mysqli_fetch_row($resultMc); $motivo_consulta = $rowMc[0];

	//evolucion_padecimiento_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultEv = mysqli_query($horizonte, "SELECT evolucion_padecimiento_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowEv = mysqli_fetch_row($resultEv); $evolucion_padecimiento = $rowEv[0];

	//interrogacion_pas_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultIp = mysqli_query($horizonte, "SELECT interrogacion_pas_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowIp = mysqli_fetch_row($resultIp); $interrogacion_pas = $rowIp[0];

	//exploracion_fisica_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultEf = mysqli_query($horizonte, "SELECT exploracion_fisica_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowEf = mysqli_fetch_row($resultEf); $exploracion_fisica = $rowEf[0];

	//examenes_lp_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultEx = mysqli_query($horizonte, "SELECT examenes_lp_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowEx = mysqli_fetch_row($resultEx); $examenes_lp = $rowEx[0];

	//comentarios_f_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultCf = mysqli_query($horizonte, "SELECT comentarios_f_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowCf = mysqli_fetch_row($resultCf); $comentarios_f = $rowCf[0];

	//interrogacion_dx_hc
	mysqli_select_db($horizonte, $database_horizonte);
	$resultId = mysqli_query($horizonte, "SELECT interrogacion_dx_hc from historia_clinica_n where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
	$rowId = mysqli_fetch_row($resultId); $interrogacion_dx = $rowId[0];
	
	$datos = $row[0].';*-'.$row[1].';*-'.$row[2].';*-'.$row[4].' DE '.$row[3].';*-'.$row1[0].';*-'.$row1[1].';*-'.$row1[2].';*-'.$row1[3].';*-'.$row1[4].';*-'.$row1[5].';*-'.$row1[6].';*-'.$diabetes.';*-'.$cancer.';*-'.$obesidad.';*-'.$cardiopatias.';*-'.$tuberculosis.';*-'.$p_vista.';*-'.$deportes.';*-'.$tabaquismo.';*-'.$alcoholismo.';*-'.$drogadiccion.';*-'.$row[5].';*-'.$row[6].';*-'.$hospitalizaciones.';*-'.$transfusiones.';*-'.$fracuras.';*-'.$enfermedades_piel.';*-'.$desnuticion.';*-'.$defectos_postu.';*-'.$defectos_posqui.';*-'.$vih.';*-'.$sarampion.';*-'.$parotivi.';*-'.$hepatitis.';*-'.$rubeola.';*-'.$enfermedades_os.';*-'.$expo_laboral.';*-'.$medicaciones_ac.';*-'.$otras_enfer.';*-'.$gpac.';*-'.$hipertension.';*-'.$nefropatas.';*-'.$malformaciones.';*-'.$otros_ahf.';*-'.$alimentacion.';*-'.$vivienda.';*-'.$otros_apnp.';*-'.$enfermedades_infancia.';*-'.$cirugias.';*-'.$accidentes.';*-'.$menarca.';*-'.$ciclos.';*-'.$ritmo.';*-'.$fecha_um.';*-'.$metrorragia.';*-'.$dismenorrea.';*-'.$ivsa.';*-'.$no_parejas_s.';*-'.$ultima_citologia.';*-'.$metodo_pf.';*-'.$motivo_consulta.';*-'.$evolucion_padecimiento.';*-'.$interrogacion_pas.';*-'.$exploracion_fisica.';*-'.$examenes_lp.';*-'.$comentarios_f.';*-'.$interrogacion_dx.';*-'.$osteoporosis;
	
	echo $datos;
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>