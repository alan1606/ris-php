<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $indicacion = sqlValue($_POST["indicacion"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT id_in, indicacion_in from indicaciones where id_in = $indicacion ") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC1 = mysqli_query($horizonte, "SELECT count(id_ai) from asignar_indicacion where id_indicacion_ai = $indicacion and aleatorio_ai = $noTemp") or die (mysqli_error($horizonte));
 $rowC1 = mysqli_fetch_row($resultC1);
	 
 $idI = sqlValue($rowC[0], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
	
 if($rowC1[0]<1){
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $sql="INSERT INTO asignar_indicacion(aleatorio_ai,id_indicacion_ai,usuario_reg_ai,fecha_reg_ai)";
	 $sql.= "VALUES ($noTemp, $idI, $idU, $now)"; 
	 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	 if (!$update) { echo $sql; }else{  echo 1; }
 }else{echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>