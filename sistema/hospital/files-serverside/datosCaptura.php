<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["idVC"], "int", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
  
	$result = mysqli_query($horizonte, "SELECT referencia_vc, interpretacion_vc, nota_interpretacion, date_format(fecha_venta_vc,'%d/%c/%Y'), id_concepto_es, nota_radiologo_vc from venta_conceptos where id_vc = $idE ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	mysqli_select_db($horizonte, $database_horizonte);
  
	$result1 = mysqli_query($horizonte, "SELECT fNac_p, sexo_p, concat(nombre_p, ' ', apaterno_p), amaterno_p from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result1x = mysqli_query($horizonte, "SELECT nombre_est, formato from estudios where id_est = $row[4] ") or die (mysqli_error($horizonte));
 	$row1x = mysqli_fetch_row($result1x);
	
	//para la edad
			$fecha1 = new DateTime($row1[0]);
			$fecha2 = new DateTime(date("Y-m-d H:i:s"));
			$fecha = $fecha1->diff($fecha2);
			//printf('%d AÑOS %d MESES %d DÍAS %d HORAS %d MINUTOS', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
			$anos=$fecha->y;
			$meses=$fecha->m;
			$dias=$fecha->d;
			$horas=$fecha->h;
			$minutos=$fecha->i;
			if($anos>0){$row1[0]=$anos." AÑOS";}
			if($anos<1){
				if($meses<=2 and $meses>=1){$row1[0]=$meses." MES(ES) ".$dias." DÍA(S)";}
				if($meses>=3){$row1[0]=$meses." MES(ES) ";}
				if($meses==0){$row1[0]=$dias." DÍA(S)";}
				if($meses==0 and $dias<=1){$row1[0]=$dias." DÍA(S) ".$horas." HORA(S)";}
				if($meses==0 and $dias<1){$row1[0]=$horas." HORA(S) ".$minutos." MINUTO(S)";}
			} 
			if($anos>150 or $anos<0){$row1[0]="DESCONOCIDA";}
		//para el sexo
				switch($row1[1]){
				case 1:
					$row1[1] = "FEMENINO";
					break;
				case 2:
					$row1[1] = "MASCULINO";
					break;
				case 3:
					$row1[1] = "AMBIGUO";
					break;
				case 4:
					$row1[1] = "NO APLICA";
					break;
				case 99:
					$row1[1] = "SIN ASIGNACIÓN";
					break;
				}
	$nombre = $row1[2].' '.$row1[3];
	
	$datos = $nombre.'*}'.$row[0].'*}'.$row1[0].'*}'.$row1[1]."*}".$row[3]."*}".$row1x[0]."*}".$row1x[1]."*}".$row[5];
	
echo $datos;
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>