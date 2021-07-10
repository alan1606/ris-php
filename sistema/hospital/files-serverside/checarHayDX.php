<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idH = sqlValue($_POST["idH"], "int", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorio"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT count(id_dxh) from dx_hospital where id_hospitalizacion_dxh = $idH and aleatorio_dxh = $aleatorio") or die (mysqli_error($horizonte)); $rowC = mysqli_fetch_row($resultC);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC2 = mysqli_query($horizonte, "SELECT count(id_dxh) from dx_hospital where id_hospitalizacion_dxh = $idH and primario_dxh = 1") or die (mysqli_error($horizonte)); $rowC2 = mysqli_fetch_row($resultC2);
 //Si no hay dx primario:
 if($rowC2[0]==0){
	 mysqli_select_db($horizonte, $database_horizonte);
	 $sql1 = "UPDATE dx_hospital SET primario_dxh = 0 where id_hospitalizacion_dxh = $idH";
	 $update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
	 if (!$update1) { echo $sql1; }else{ 
		 mysqli_select_db($horizonte, $database_horizonte);
		 $sql = "UPDATE dx_hospital SET primario_dxh = 1 where id_hospitalizacion_dxh = $idH limit 1";
		 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));	
		 if (!$update) { echo $sql; }else { echo $rowC[0]; }
	 }
 }else{echo $rowC[0];}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>