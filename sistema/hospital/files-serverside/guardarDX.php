<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idH = sqlValue($_POST["idH"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $claveDX = sqlValue($_POST["claveDX"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorio"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT id_di from diagnosticos where clave_di = $claveDX ") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC); $idDX = sqlValue($rowC[0], "int", $horizonte);
 	
 mysqli_select_db($horizonte, $database_horizonte); 
 $sql="INSERT INTO dx_hospital(id_hospitalizacion_dxh,id_u_dxh,id_dx_dxh,fecha_dxh,aleatorio_dxh) VALUES($idH, $idU, $idDX, $now,$aleatorio)";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>