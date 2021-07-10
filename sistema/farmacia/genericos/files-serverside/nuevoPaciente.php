<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["misDatos"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO pacientes (usuario_pa, fecha_temporal_pa)";
 $sql.= "VALUES ($idUsuario, now())";
  
$update = mysqli_query($horizonte, $sql);
	
if (!$update) {
 	echo 'bad';
 }else{ 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT id_p from pacientes order by id_p desc limit 1 ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql1 = "INSERT INTO historia_clinica (id_paciente_hc, id_usuario_hc, fecha_temporal_hc)";
 	$sql1.= "VALUES ($row[0], $idUsuario, now())";
  
	$update1 = mysqli_query($horizonte, $sql1);
	
	if (!$update1) {
 		echo $update1;
 	}else{echo $row[0];}

 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>