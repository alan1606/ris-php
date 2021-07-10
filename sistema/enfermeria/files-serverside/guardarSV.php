<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["idPx1"], "int", $horizonte);
 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $peso = sqlValue($_POST["peso"], "double", $horizonte);
 $talla = sqlValue($_POST["talla"], "double", $horizonte);
 $cintura = sqlValue($_POST["cintura"], "double", $horizonte);
 $imc = sqlValue($_POST["imc"], "double", $horizonte);
 $t = sqlValue($_POST["t"], "int", $horizonte);
 $a = sqlValue($_POST["a"], "int", $horizonte);
 $fr = sqlValue($_POST["fr"], "int", $horizonte);
 $fc = sqlValue($_POST["fc"], "int", $horizonte);
 $temp = sqlValue($_POST["temp"], "double", $horizonte);
 $notas = sqlValue($_POST["notas"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $oximetria = sqlValue($_POST["oximetria"], "int", $horizonte);
 $aocular = sqlValue($_POST["aocular"], "int", $horizonte);
 $rverbal = sqlValue($_POST["rverbal"], "int", $horizonte);
 $rmotriz = sqlValue($_POST["rmotriz"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO signos_vitales (id_paciente_sv, id_usuario_sv, fecha_sv, peso_sv, talla_sv, imc_sv, cintura_sv, t_sv, a_sv, fr_sv, fc_sv, temperatura_sv, notas_sv, oximetria_sv, a_ocular_sv, r_verbal, r_motriz)";
 $sql.= "VALUES ($idP, $idU, $now, $peso, $talla, $imc, $cintura, $t, $a, $fr, $fc, $temp, $notas, $oximetria, $aocular, $rverbal, $rmotriz )";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{
	mysqli_select_db($horizonte, $database_horizonte); 
	 $resultS= mysqli_query($horizonte, "SELECT id_sv from signos_vitales order by id_sv desc limit 1") or die (mysqli_error($horizonte));
	 $rowS = mysqli_fetch_row($resultS); $id_sv = sqlValue($rowS[0], "int", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
 	$sqlY = "UPDATE venta_conceptos SET id_signosv_vc = $id_sv where id_vc = $idC and id_paciente_vc = $idP limit 1";
	$updateY = mysqli_query($horizonte, $sqlY) or die (mysqli_error($horizonte));
	
	if (!$updateY) { echo $sqlY; }else {echo 1;}
}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>