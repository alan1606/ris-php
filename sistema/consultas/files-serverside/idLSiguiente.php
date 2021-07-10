<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);
	$idC = sqlValue($_POST["idC"], "int", $horizonte);
		
	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT v.id_vc, c.concepto_to from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.id_vc > $idC and v.id_paciente_vc = $idP and v.temporal_vc = 0 and v.tipo_concepto_vc = 3 and v.estatus_vc > 6 and c.concepto_to!='' order by v.id_vc asc limit 1 ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
	if($row1[0]==''){
		mysqli_select_db($horizonte, $database_horizonte);
		$result1 = mysqli_query($horizonte, "SELECT v.id_vc, c.concepto_to from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.id_paciente_vc = $idP and v.temporal_vc = 0 and v.tipo_concepto_vc = 3 and v.estatus_vc > 6 and c.concepto_to!='' order by v.id_vc asc limit 1 ") or die (mysqli_error($horizonte));
		$row1 = mysqli_fetch_row($result1);
	}
			
	echo $row1[0].'*}['.$row1[1];
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>