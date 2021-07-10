<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 $idMED = sqlValue($_POST["claveMED"], "int", $horizonte);

 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
	
mysqli_select_db($horizonte, $database_horizonte); 
$resultI = mysqli_query($horizonte, "SELECT via_administracion_dosis_med from medicamentos where id_med = $idMED limit 1 ") or die (mysqli_error($horizonte));
$rowI = mysqli_fetch_row($resultI);

$indi = sqlValue($rowI[0], "text", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte); 

$sql="INSERT INTO medicamentos_receta(no_temp_mr,id_p_mr,id_u_mr,id_med_mr,fecha_mr, id_co_mr) VALUES ($noTemp, $idP, $idU, $idMED, $now, $idC)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>