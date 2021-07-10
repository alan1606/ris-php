<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["id_paciente_sv"], "int", $horizonte);
 $idC = sqlValue($_POST["id_consulta_sv"], "int", $horizonte);
 $idU = sqlValue($_POST["id_usuario_sv"], "int", $horizonte);
 $peso = sqlValue($_POST["peso_p"], "double", $horizonte);
 $talla = sqlValue($_POST["talla_p"], "double", $horizonte);
 $cintura = sqlValue($_POST["pa_p"], "double", $horizonte);
 $imc = sqlValue($_POST["imc_p"], "double", $horizonte);
 $t = sqlValue($_POST["t_p"], "int", $horizonte);
 $a = sqlValue($_POST["a_p"], "int", $horizonte);
 $fr = sqlValue($_POST["fr_p"], "int", $horizonte);
 $fc = sqlValue($_POST["fc_p"], "int", $horizonte);
 $temp = sqlValue($_POST["temp_p"], "double", $horizonte);
 $notas = sqlValue($_POST["notas_sv"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $oximetria = sqlValue($_POST["oxi_p"], "int", $horizonte);
 $glucosa = sqlValue($_POST["gluc_p"], "int", $horizonte);
 $perimetro_cefalico = sqlValue($_POST["pc_p"], "double", $horizonte);
 $perimetro_toracico = sqlValue($_POST["pt_p"], "double", $horizonte);
 $medida_pie = sqlValue($_POST["pie_p"], "double", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO signos_vitales (id_paciente_sv, id_usuario_sv, fecha_sv, peso_sv, talla_sv, imc_sv, cintura_sv, t_sv, a_sv, fr_sv, fc_sv, temperatura_sv, notas_sv, oximetria_sv, glucosa_sv, perimetro_cefalico_sv, perimetro_toracico_sv, medida_pie_sv)";
 $sql.= "VALUES ($idP, $idU, $now, $peso, $talla, $imc, $cintura, $t, $a, $fr, $fc, $temp, $notas, $oximetria, $glucosa, $perimetro_cefalico, $perimetro_toracico, $medida_pie)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{
	mysqli_select_db($horizonte, $database_horizonte); 
	 $resultS= mysqli_query($horizonte, "SELECT id_sv from signos_vitales order by id_sv desc limit 1") or die (mysqli_error($horizonte));
	 $rowS = mysqli_fetch_row($resultS); $id_sv = sqlValue($rowS[0], "int", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
 	$sqlY = "UPDATE venta_conceptos SET id_signosv_vc = $id_sv where id_vc = $idC limit 1";
	$updateY = mysqli_query($horizonte, $sqlY) or die (mysqli_error($horizonte));
	
	if (!$updateY) { echo $sqlY; }else {echo 1;}
}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>