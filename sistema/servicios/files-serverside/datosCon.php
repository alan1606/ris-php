<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);
	$idC = sqlValue($_POST["idC"], "int", $horizonte);
	
	if(isset($_POST["x"]) and $_POST["x"]==0){		
		mysqli_select_db($horizonte, $database_horizonte);
		$result1 = mysqli_query($horizonte, "SELECT nota_interpretacion, id_vc from venta_conceptos where id_vc = $idC limit 1 ") or die (mysqli_error($horizonte));
		$row1 = mysqli_fetch_row($result1);
	}else{
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT id_vc from venta_conceptos where id_paciente_vc = $idP and tipo_concepto_vc = 1 and estatus_vc = 6 and id_vc != $idC and temporal_vc = 0 order by fecha_venta_vc desc limit 1 ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $ultimo = sqlValue($row[0], "int", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT nota_interpretacion, id_vc from venta_conceptos where id_vc = $ultimo limit 1 ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	}
			
	echo $row1[1];
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>