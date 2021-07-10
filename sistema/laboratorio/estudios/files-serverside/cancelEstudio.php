<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $id = sqlValue($_POST["idPaciente"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "DELETE from pacientes where id_p = $id limit 1";
  
$update = mysqli_query($horizonte, $sql);
	
if (!$update) {
 	echo $sql;
 }else{ 
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql1 = "DELETE from historia_clinica where id_paciente_hc = $id limit 1";
  
	$update1 = mysqli_query($horizonte, $sql1);
	if (!$update1) {
 		echo $sql1;
 	}else{ echo "ok"; }
 
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>