<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);
	$idC = sqlValue($_POST["idC"], "int", $horizonte);
		
	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT id_vc from venta_conceptos left join conceptos on id_to = id_concepto_es where id_vc < $idC and id_paciente_vc = $idP and temporal_vc = 0 and tipo_concepto_vc = 2 and estatus_vc >= 0 and concepto_to != '' and nota_interpretacion != '' order by id_vc desc limit 1 ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
	if($row1[0]==''){
		mysqli_select_db($horizonte, $database_horizonte);
		$result1 = mysqli_query($horizonte, "SELECT id_vc from venta_conceptos left join conceptos on id_to = id_concepto_es where id_paciente_vc = $idP and temporal_vc = 0 and tipo_concepto_vc = 2 and estatus_vc >= 0 and concepto_to!='' and nota_interpretacion != '' order by id_vc desc limit 1 ") or die (mysqli_error($horizonte));
		$row1 = mysqli_fetch_row($result1);
	}
			
	echo $row1[0];
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>