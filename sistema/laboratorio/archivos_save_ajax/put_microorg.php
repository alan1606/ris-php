<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["idE"], "int", $horizonte); $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $idB = sqlValue($_POST["id_b"], "int", $horizonte); $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $result = mysqli_query($horizonte, "SELECT count(id_rl) from resultados_laboratorio where id_estudio_vc_rl = $idE and boleano_rl = 1 and id_base_rl = $idB") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);
 
 if($row[0]==0){
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql = "UPDATE resultados_laboratorio SET boleano_rl = 1, valor_texto_rl = '' where id_estudio_vc_rl = $idE and id_base_rl = $idB ";
 	$update = mysqli_query($horizonte, $sql);
	
	if (!$update) { echo $sql; }else { echo 1; }
 }else{echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>