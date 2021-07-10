<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $idMedicoTratante = sqlValue($_POST["idU"], "int", $horizonte);
 //$idCama = sqlValue($_POST["id_cama"], "int", $horizonte);
 //$motivo = sqlValue($_POST["motivo_h"], "text", $horizonte);
 $id_consulta = sqlValue($_POST["id_vc"], "int", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte); 
 $result1= mysqli_query($horizonte, "SELECT count(id_h) from hospitalizacion where id_consulta_vc_h = $id_consulta") or die (mysqli_error($horizonte));
 $row1 = mysqli_fetch_row($result1);
 
 if($row1[0] < 1){
	mysqli_select_db($horizonte, $database_horizonte);
	$sql = "INSERT into hospitalizacion(id_paciente_h, id_medicoh_h, fecha_inicio_h, id_consulta_vc_h, id_usuario_h) values ($idP, $idMedicoTratante, $now, $id_consulta, $idU)";
	  
	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		
	if(!$update){ echo $sql; }else{ echo 1; }
 }else{echo 1;}
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>