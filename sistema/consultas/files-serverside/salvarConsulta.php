<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $notaDictamen = sqlValue($_POST["notaDictamen"], "text", $horizonte);
 $notaReceta = sqlValue($_POST["indiF"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);

 if(isset($_POST["recetaR"])){$recetaR = sqlValue($_POST["recetaR"], "text", $horizonte);}else{$recetaR = sqlValue("", "text", $horizonte);}
 
 $indiF = sqlValue($_POST["indiF"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultS=mysqli_query($horizonte, "SELECT MAX(id_sv) from signos_vitales where id_paciente_sv = $idP limit 1 ") or die (mysqli_error($horizonte));
 $rowS = mysqli_fetch_row($resultS); $idSV = sqlValue($rowS[0], "int", $horizonte);
 
 //checamos si la consulta está finalizada, si es así, entonces no guardamos el id de los Signos Vitales
 mysqli_select_db($horizonte, $database_horizonte);
 $res1=mysqli_query($horizonte, "SELECT estatus_vc from venta_conceptos where id_vc = $idC limit 1 ") or die (mysqli_error($horizonte));
 $rowSV1a = mysqli_fetch_row($res1);
 if($rowSV1a!=6){//Si no esta finalizada
 	mysqli_select_db($horizonte, $database_horizonte);
 	$sql = "UPDATE venta_conceptos SET estatus_vc = 2, usuarioEdo2_e = $idU, fechaEdo2_e = $now, temporal_vc = 0, id_signosv_vc = $idSV where id_vc = $idC limit 1";
 	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
 }else{
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql = "UPDATE venta_conceptos SET estatus_vc = 2 where id_vc = $idC limit 1";
 	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
 }
  	
if (!$update) { echo $sql; }else{
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql1 = "UPDATE dx_consultas SET temp_dxc = 1 where id_c_dxc = $idC ";
 	$update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
 	
	if (!$update1) { echo $sql1; }else{
		mysqli_select_db($horizonte, $database_horizonte);
 		$sql2 = "UPDATE medicamentos_receta SET temp_mr = 1 where id_co_mr = $idC ";
 		$update2 = mysqli_query($horizonte, $sql2) or die (mysqli_error($horizonte));
		
		if (!$update2) { echo $sql2; }
		else{
			mysqli_select_db($horizonte, $database_horizonte);
 			$sql3 = "UPDATE venta_conceptos SET nota_interpretacion = $notaDictamen, nota_receta = $notaReceta, otras_indicaciones = $recetaR, nota_radiologo_vc = $indiF, salvado_vc = 1 where id_vc = $idC limit 1 ";
 			$update3 = mysqli_query($horizonte, $sql3) or die (mysqli_error($horizonte));
			
			if (!$update3) { echo $sql3; } else{ echo 1; }
		}
	}
}
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>