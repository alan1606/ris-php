<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);

 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT COUNT(id_hc) from historia_clinica where id_paciente_hc = $idP") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	if($row[0]==0){
		mysqli_select_db($horizonte, $database_horizonte);
 		$sql1 = "INSERT INTO historia_clinica (id_paciente_hc, id_usuario_hc, fecha_temporal_hc)";
 		$sql1.= "VALUES ($idP, $idU, now())";
  
		$update1 = mysqli_query($horizonte, $sql1);
	
		if (!$update1) {
 			echo $update1;
 		}else{echo "ok";}
	}else{echo "ok";}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>