<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);
	$idH = sqlValue($_POST["idH"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT nombre_p, apaterno_p, amaterno_p, fNac_p, sexo_p, foto_p, temporal_p from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $fx = $row[3]; $extF = sqlValue($row[6], "text", $horizonte);
	
	if($row[5]==1){
		mysqli_select_db($horizonte, $database_horizonte);
		$resultEF = mysqli_query($horizonte, "SELECT ext_do from documentos where nombre_do = $extF and tipo_quien_do = 1 and que_Es_do = 'FOTO' ") or die (mysqli_error($horizonte));
		$rowEF = mysqli_fetch_row($resultEF);
	}
	
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
	$result1 = mysqli_query($horizonte, "SELECT peso_sv,talla_sv, imc_sv, cintura_sv, t_sv, a_sv, fr_sv, fc_sv, temperatura_sv, notas_sv, DATE_FORMAT(fecha_sv,'%d/%c/%Y %H:%i:%s'), id_sv from signos_vitales where id_paciente_sv = $idP order by id_sv desc limit 1") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
		
	mysqli_select_db($horizonte, $database_horizonte);
	$resultC1 = mysqli_query($horizonte, "SELECT motivo_h, DATE_FORMAT(fecha_inicio_h,'%d/%c/%Y %H:%i:%s') from hospitalizacion where id_h = $idH limit 1") or die (mysqli_error($horizonte));
 	$rowC1 = mysqli_fetch_row($resultC1);
	
	$nombre = $row[0].' '.$row[1].' '.$row[2];
	
	$datos = $nombre.';*-'.$fx.';*-'.$row[4].';*-'.$row1[0].';*-'.$row1[1].';*-'.$row1[2].';*-'.$row1[3].';*-'.$row1[4].';*-'.$row1[5].';*-'.$row1[6].';*-'.$row1[7].';*-'.$row1[8].';*-'.$row1[9].';*-'.$row1[10].';*-'.$rowC1[0].';*-'.$rowC1[1].';*-'.$rowC1[2].';*-'.$row1[11].';*-'.$rowC1[1].';*-'.$row[5].';*-'.$row[6].';*-'.$rowEF[0];
	
	echo $datos;
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>