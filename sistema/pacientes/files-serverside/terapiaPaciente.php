<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["id_paciente_tera"], "int", $horizonte);
 $idU = sqlValue($_POST["id_usuario_tera"], "int", $horizonte);
 $motivo = sqlValue($_POST["motivo_tera"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT count(id_t) from rehabilitacion where id_paciente_t = $idP and estatus_t < 3") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 if($rowC[0]==0){
	 mysqli_select_db($horizonte, $database_horizonte);
	 $sql = "INSERT INTO rehabilitacion (id_paciente_t, motivo_t, usuario_ingreso_t, fecha_ingreso_t)";
	 $sql.= "VALUES ($idP, $motivo, $idU, $now )";
	  
	 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		
	 if (!$update){ echo $sql; }else{ echo 1; }
 }else{echo 'El paciente cuenta con una terapia en curso, favor de verificar.';}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>