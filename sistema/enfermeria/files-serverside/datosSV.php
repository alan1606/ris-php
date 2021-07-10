<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte); $idC = sqlValue($_POST["idC"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT CONCAT(UCASE(LEFT(nombre_p, 1)),LCASE(SUBSTRING(nombre_p, 2))), CONCAT(UCASE(LEFT(apaterno_p, 1)),LCASE(SUBSTRING(apaterno_p, 2))), CONCAT(UCASE(LEFT(amaterno_p, 1)),LCASE(SUBSTRING(amaterno_p, 2))), fNac_p, sexo_p, nombre_p, apaterno_p, amaterno_p from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $fx = $row[3];

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
	switch($row[4]){
		case 1: $row[4] = "FEMENINO"; break;
		case 2: $row[4] = "MASCULINO"; break;
		case 3: $row[4] = "AMBIGUO"; break;
		case 4: $row[4] = "NO APLICA"; break;
		case 99: $row[4] = "SIN ASIGNACIÓN"; break;
	}

	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT s.peso_sv, s.talla_sv, s.imc_sv, s.cintura_sv, s.t_sv, s.a_sv, s.fr_sv, s.fc_sv, s.temperatura_sv, s.notas_sv, DATE_FORMAT(s.fecha_sv,'%d/%c/%Y %H:%i:%s'), s.oximetria_sv, s.a_ocular_sv, s.r_verbal, s.r_motriz, u.usuario_u from signos_vitales s left join usuarios u on u.id_u = s.id_usuario_sv where s.id_paciente_sv = $idP order by s.id_sv desc limit 1") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);

	mysqli_select_db($horizonte, $database_horizonte);
	$resultC1 = mysqli_query($horizonte, "SELECT v.observaciones_vc, v.nota_interpretacion, v.nota_receta, v.nota_radiologo_vc, DATE_FORMAT(v.fecha_venta_vc,'%d/%c/%Y'), v.no_temp_vc, o.medico_c_ov from venta_conceptos v left join conceptos c on c.aleatorio_c = v.no_temp_vc left join orden_venta o on o.no_temp_ov = v.no_temp_vc where v.id_vc = $idC limit 1") or die (mysqli_error($horizonte));
 	$rowC1 = mysqli_fetch_row($resultC1);

	$nombre = $row[0].' '.$row[1].' '.$row[2]; $nombreM = $row[5].' '.$row[6].' '.$row[7];

	if($row1[4]==''){$ttt = '-';}else{$ttt = $row1[4];}
	if($row1[5]==''){$aaa = '-';}else{$aaa = $row1[5];}

	$datos = $nombre.';*-'.$fx.';*-'.$row[4].';*-'.$row1[0].';*-'.$row1[1].';*-'.$row1[2].';*-'.$row1[3].';*-'.$ttt.';*-'.$aaa.';*-'.$row1[6].';*-'.$row1[7].';*-'.$row1[8].';*-'.$row1[9].';*-'.$row1[10].';*-'.$rowC1[0].';*-'.$rowC1[1].';*-'.$rowC1[2].';*-'.$row1[11].';*-'.$row1[12].';*-'.$row1[13].';*-'.$row1[14].';*-'.$rowC1[3].';*-'.$nombreM.';*-'.$row1[15].';*-'.$rowC1[4].';*-'.$rowC1[5].';*-'.$rowC1[6];

	echo $datos;
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>
