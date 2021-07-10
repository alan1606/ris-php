<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);
	$idSV = sqlValue($_POST["idSV"], "int", $horizonte);
		
	$lista = ''; $lista1 = ''; $cont = 0;
	
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta = "SELECT imc_sv, DATE_FORMAT(fecha_sv,'%d/%c/%Y') as fecha from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV group by DATE_FORMAT(fecha_sv,'%d/%c/%Y') order by id_sv asc limit 50";
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
	while ($fila = mysqli_fetch_array($query)) { $cont++;
		if($cont==1){$lista = $fila['imc_sv'];}else{$lista = $lista.','.$fila['imc_sv'];}
		if($cont==1){$lista1 = $fila['fecha'];}else{$lista1 = $lista1.','.$fila['fecha'];}
	};//echo $lista;
	
	mysqli_select_db($horizonte, $database_horizonte);
	$resultA = mysqli_query($horizonte, "SELECT nombre_p, apaterno_p, amaterno_p from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
 	$rowA = mysqli_fetch_row($resultA); $nombreP = $rowA[0].' '.$rowA[1].' '.$rowA[2];
			
	echo $lista1.';*'.$lista.';*'.$cont.';*'.$nombreP;
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>