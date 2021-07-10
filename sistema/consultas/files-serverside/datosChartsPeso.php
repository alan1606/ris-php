<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);
	$idSV = sqlValue($_POST["idSV"], "int", $horizonte);
		
	$lista = ''; $lista1 = ''; $cont = 0; $vI = ''; $vF = '';
	
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta = "SELECT peso_sv as x, DATE_FORMAT(fecha_sv,'%d/%c/%Y') as fecha, peso_sv, DATE_FORMAT(fecha_sv,'%Y-%c-%d') as fecha1 from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV order by id_sv asc limit 50";
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
	
	while ($fila = mysqli_fetch_array($query)) { $cont++;
		if($cont==1){$lista = $fila['x'];}else{$lista = $lista.','.$fila['x'];}
		if($cont==1){$lista1 = $fila['fecha'];}else{$lista1 = $lista1.','.$fila['fecha'];}
		
		$miF = $fila['fecha1'];
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultC =mysqli_query($horizonte, "SELECT DATEDIFF('$miF',fNac_p) from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
		$rowC = mysqli_fetch_row($resultC); $dias = $rowC[0];
		$edad = $dias/365; $peso = $fila['peso_sv'];
		
		mysqli_select_db($horizonte, $database_horizonte);
		$resultA = mysqli_query($horizonte, "SELECT max(peso_sv) from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV ") or die (mysqli_error($horizonte));
		$rowA = mysqli_fetch_row($resultA);
	
		$vMin = 0; $vMax = $rowA[0];
		
		if($cont==1){$vI = $vMin;}else{$vI = $vI.','.$vMin;}
		if($cont==1){$vF = $vMax;}else{$vF = $vF.','.$vMax;}
		
	};
				
	echo $lista1.';*'.$lista.';*'.$cont.';*'.$vI.';*'.$vF;
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>