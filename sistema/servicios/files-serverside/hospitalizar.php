<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $result = mysqli_query($horizonte, "SELECT referencia_vc from venta_conceptos where id_vc = $idC") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result); $referencia = sqlValue($row[0], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $result1= mysqli_query($horizonte, "SELECT count(id_h) from hospitalizacion where id_consulta_vc_h = $idC") or die (mysqli_error($horizonte));
 $row1 = mysqli_fetch_row($result1);
 
 if($row1[0] < 1){
	mysqli_select_db($horizonte, $database_horizonte);
	 $sql = "INSERT into hospitalizacion (id_paciente_h, id_medicoh_h, fecha_inicio_h, id_consulta_vc_h, referencia_vc_h) values ($idP, $idU, $now, $idC, $referencia)";
	  
	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		
	if (!$update) {
		echo $sql;
	 }else {
		 echo 1;
	}
 }else{echo 1;}
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>