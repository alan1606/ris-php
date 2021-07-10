<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $idMED = sqlValue($_POST["claveMED"], "int", $horizonte);
	 //mysqli_select_db($horizonte, $database_horizonte); $resultC = mysqli_query($horizonte, "SELECT id_di from diagnosticos where clave_di = $claveDX ") or die (mysqli_error($horizonte)); $rowC = mysqli_fetch_row($resultC); $idDX = sqlValue($rowC[0], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 	mysqli_select_db($horizonte, $database_horizonte); 
	$resultIDC = mysqli_query($horizonte, "SELECT id_vc from venta_conceptos where no_temp_vc = $noTemp and tipo_concepto_vc = 1 limit 1 ") or die (mysqli_error($horizonte));
	$rowIDC = mysqli_fetch_row($resultIDC);
	
	mysqli_select_db($horizonte, $database_horizonte); 
	$resultI = mysqli_query($horizonte, "SELECT via_administracion_dosis_med from medicamentos where id_med = $idMED limit 1 ") or die (mysqli_error($horizonte));
	$rowI = mysqli_fetch_row($resultI);
$indi = sqlValue($rowI[0], "text", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte); 
$sql="INSERT INTO medicamentos_receta(no_temp_mr,id_p_mr,id_u_mr,id_med_mr,fecha_mr, id_co_mr, indicacion_mr) VALUES ($noTemp, $idP, $idU, $idMED, $now, $rowIDC[0], $indi)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>