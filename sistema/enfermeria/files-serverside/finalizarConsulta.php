<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $observacionesC = sqlValue($_POST["observacionesC"], "text", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $notaDictamen = sqlValue($_POST["notaDictamen"], "text", $horizonte);
 $notaReceta = sqlValue($_POST["notaReceta"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultS = mysqli_query($horizonte, "SELECT MAX(id_sv) from signos_vitales where id_paciente_sv = $idP limit 1 ") or die (mysqli_error($horizonte));
 $rowS = mysqli_fetch_row($resultS); $idSV = sqlValue($rowS[0], "int", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE venta_conceptos SET estatus_vc = 6, usuarioEdo3_e = $idU, fechaEdo3_e = $now, temporal_vc = 0, id_signosv_vc = $idSV  where no_temp_vc = $noTemp and tipo_concepto_vc = 1 limit 1";
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
  	
if (!$update) { echo $sql; }else{
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql1 = "UPDATE dx_consultas SET temp_dxc = 0 where no_temp_dxc = $noTemp ";
 	$update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
 	
	if (!$update1) { echo $sql1; }else{
		mysqli_select_db($horizonte, $database_horizonte);
 		$sql2 = "UPDATE medicamentos_receta SET temp_mr = 0 where no_temp_mr = $noTemp ";
 		$update2 = mysqli_query($horizonte, $sql2) or die (mysqli_error($horizonte));
		
		if (!$update2) { echo $sql2; }
		else{
			mysqli_select_db($horizonte, $database_horizonte);
 			$sql3 = "UPDATE venta_conceptos SET observaciones_vc = $observacionesC, nota_interpretacion = $notaDictamen, nota_receta = $notaReceta where no_temp_vc = $noTemp and tipo_concepto_vc = 1 limit 1 ";
 			$update3 = mysqli_query($horizonte, $sql3) or die (mysqli_error($horizonte));
			
			if (!$update3) { echo $sql3; } else{ echo 1; }
		}
	}
}
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>