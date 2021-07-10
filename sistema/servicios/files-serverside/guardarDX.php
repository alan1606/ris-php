<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 $claveDX = sqlValue($_POST["claveDX"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT id_di from diagnosticos where clave_di = $claveDX ") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 $idDX = sqlValue($rowC[0], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte); 
$sql="INSERT INTO dx_consultas(no_temp_dxc,id_p_dxc,id_u_dxc,id_dx_dxc,fecha_dxc, id_c_dxc) VALUES ($noTemp, $idP, $idU, $idDX, $now, $idC)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>