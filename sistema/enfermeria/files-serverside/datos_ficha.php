<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte); $idC = sqlValue($_POST["idC"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT p.fNac_p, p.sexo_p, p.nombre_p, p.apaterno_p, p.amaterno_p, p.nombre_completo_p, DATE_FORMAT(p.fechaR_p,'%d/%c/%Y'), DATE_FORMAT(p.fNac_p,'%d/%c/%Y'), p.entidad_nacimiento_p, p.tCelular_p, p.calle_p, p.colonia_p, p.ciudad_p, p.municipio_p, p.entidadFederativa_p, p.tSanguineo_p, p.contactoEmergencia_p, p.parentesco_contacto_p, p.tEmergencia_p, p.idReligion_p, p.escolaridad_p, o.ocupacion, p.email_p, p.apgar_p, p.tamiz_p, p.alergias_p, p.idOcupacion_p, p.edo_civil_p from pacientes p left join catalogo_ocupaciones o on o.id_ocupacion = p.idOcupacion_p where p.id_p = $idP ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $fx = $row[0];
	
	//para la edad
	$fecha1 = new DateTime($fx); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);

	$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
	if($anos>0){$fx=$anos." AÑOS";}
	if($anos<1){
		if($meses<=2 and $meses>=1){$fx=$meses." MES(ES) ".$dias." DÍA(S)";}
		if($meses>=3){$fx=$meses." MES(ES) ";}
		if($meses==0){$fx=$dias." DÍA(S)";}
		if($meses==0 and $dias<=1){$fx=$dias." DÍA(S) ".$horas." HORA(S)";}
		if($meses==0 and $dias<1){$fx=$horas." HORA(S) ".$minutos." MINUTO(S)";}
	} 
	if($anos>150 or $anos<0){$fx="DESCONOCIDA";}else{}
	
	//para el sexo
	switch($row[1]){
		case 1: $row[1] = "FEMENINO"; break; case 2: $row[1] = "MASCULINO"; break; case 3: $row[1] = "AMBIGUO"; break;
		case 4: $row[1] = "NO APLICA"; break; case 99: $row[1] = "SIN ASIGNACIÓN"; break;
	}
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT s.peso_sv, s.talla_sv, s.imc_sv, s.cintura_sv, s.t_sv, s.a_sv, s.fc_sv, s.fr_sv, s.temperatura_sv, s.notas_sv, DATE_FORMAT(s.fecha_sv,'%d/%c/%Y %H:%i:%s'), s.oximetria_sv, s.a_ocular_sv, s.r_verbal, s.r_motriz, u.usuario_u, s.glucosa_sv, s.notas_sv, s.cintura_sv, s.perimetro_cefalico_sv, s.perimetro_toracico_sv, s.medida_pie_sv from signos_vitales s left join usuarios u on u.id_u = s.id_usuario_sv where s.id_paciente_sv = $idP order by s.id_sv desc limit 1") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$resultC1 = mysqli_query($horizonte, "SELECT v.observaciones_vc, v.nota_interpretacion, v.nota_receta, v.nota_radiologo_vc, DATE_FORMAT(v.fecha_venta_vc,'%d/%c/%Y') from venta_conceptos v left join conceptos c on c.aleatorio_c = v.no_temp_vc where v.id_vc = $idC limit 1") or die (mysqli_error($horizonte));
 	$rowC1 = mysqli_fetch_row($resultC1);

	mysqli_select_db($horizonte, $database_horizonte); $entidad_nac = sqlValue($row[8], "int", $horizonte);
	$resultM = mysqli_query($horizonte, "SELECT d_estado from mexico where id_mx = $entidad_nac limit 1") or die (mysqli_error($horizonte));
 	$rowM = mysqli_fetch_row($resultM); $estado = $rowM[0];

	mysqli_select_db($horizonte, $database_horizonte); $municipio_p = sqlValue($row[13], "int", $horizonte);
	$resultMu = mysqli_query($horizonte, "SELECT d_municipio from mexico where id_mx = $municipio_p limit 1") or die (mysqli_error($horizonte));
 	$rowMu = mysqli_fetch_row($resultMu); $municipio = $rowMu[0];

	mysqli_select_db($horizonte, $database_horizonte); $entidad_p = sqlValue($row[14], "int", $horizonte);
	$resultEs = mysqli_query($horizonte, "SELECT d_estado from mexico where id_mx = $entidad_p limit 1") or die (mysqli_error($horizonte));
 	$rowEs = mysqli_fetch_row($resultEs); $estado1 = $rowEs[0];
		
	if($row1[4]==''){$ttt = '';}else{$ttt = $row1[4];} if($row1[5]==''){$aaa = '';}else{$aaa = $row1[5];}

	if($row1[2]!=null){$imc = $row1[2].' kg/m^2';}else{$imc='';}
	
	$datos = $row[5].';*-'.$fx.';*-'.$row[1].';*-'.$row1[1].';*-'.$row1[0].';*-'.$imc.';*-'.$row1[3].';*-'.$ttt.';*-'.$aaa.';*-'.$row1[6].';*-'.$row1[7].';*-'.$row1[8].';*-'.$row1[9].';*-'.$row1[10].';*-'.$rowC1[0].';*-'.$rowC1[1].';*-'.$rowC1[2].';*-'.$row1[11].';*-'.$row1[12].';*-'.$row1[13].';*-'.$row1[14].';*-'.$rowC1[3].';*-'.$row[7].';*-'.$row1[15].';*-'.$rowC1[4].';*-'.$row[6].';*-'.$row[3].';*-'.$row[4].';*-'.$row[2].';*-'.$estado.';*-'.$row[9].';*-'.$row[10].';*-'.$row[11].';*-'.$row[12].';*-'.$municipio.';*-'.$estado1.';*-'.$row[15].';*-'.$row[16].';*-'.$row[17].';*-'.$row[18].';*-'.$row[19].';*-'.$row[20].';*-'.$row[21].';*-'.$row[22].';*-'.$row[23].';*-'.$row[24].';*-'.$row[25].';*-'.$row1[16].';*-'.$row1[17].';*-'.$row1[18].';*-'.$row1[19].';*-'.$row1[20].';*-'.$row1[21].';*-'.$row[26].';*-'.$row[27];
	
	echo $datos;
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>