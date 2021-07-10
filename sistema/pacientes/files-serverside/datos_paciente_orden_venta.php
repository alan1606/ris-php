<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$id_p = sqlValue($_POST["id_p"], "text", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT concat(p.nombre_p, ' ', p.apaterno_p), p.fNac_p, p.sexo_p from pacientes p where p.id_p = $id_p limit 1") or die (mysqli_error($horizonte));
	$row = mysqli_fetch_row($result);
	
	if($row[2]==1){$sexo = 'MUJER';}else{$sexo = 'HOMBRE';}
	
	$fecha1 = new DateTime($row[1]); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);
	$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
	if($anos>0){$row[1]=$anos." AÑOS";}
	if($anos<1){
		if($meses<=2 and $meses>=1){$row[1]=$meses." MES(ES) ".$dias." DÍA(S)";}
		if($meses>=3){$row[1]=$meses." MES(ES) ";}
		if($meses==0){$row[1]=$dias." DÍA(S)";}
		if($meses==0 and $dias<=1){$row[1]=$dias." DÍA(S) ".$horas." HORA(S)";}
		if($meses==0 and $dias<1){$row[1]=$horas." HORA(S) ".$minutos." MINUTO(S)";}
	} if($anos>150 or $anos<0){$row[1]="DESCONOCIDA";}
	
	echo $row[0].';-{'.$row[1].';-{'.$sexo;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>