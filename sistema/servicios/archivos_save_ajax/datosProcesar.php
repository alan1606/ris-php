<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idE = sqlValue($_POST["idE"], "int", $horizonte); //en venta de conceptos
 
mysqli_select_db($horizonte, $database_horizonte);
$result1 = mysqli_query($horizonte, "SELECT nombre_p, apaterno_p, amaterno_p from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

mysqli_select_db($horizonte, $database_horizonte);
$result2 = mysqli_query($horizonte, "SELECT referencia_vc, id_concepto_es from venta_conceptos where id_vc = $idE ") or die (mysqli_error($horizonte));
$row2 = mysqli_fetch_row($result2);
$claveE = sqlValue($row2[1], "text", $horizonte);
$ref = sqlValue($row2[0], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$result3 = mysqli_query($horizonte, "SELECT nombre_est, area_est from estudios where id_est = $claveE ") or die (mysqli_error($horizonte));
$row3 = mysqli_fetch_row($result3);
$areaE = sqlValue($row3[1], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$result4 = mysqli_query($horizonte, "SELECT nombre_a from areas where id_a = $areaE ") or die (mysqli_error($horizonte));
$row4 = mysqli_fetch_row($result4);

mysqli_select_db($horizonte, $database_horizonte);
$result5 = mysqli_query($horizonte, "SELECT observaciones_l_ov from orden_venta where referencia_ov = $ref ") or die (mysqli_error($horizonte));
$row5 = mysqli_fetch_row($result5);

mysqli_select_db($horizonte, $database_horizonte);
$result6 = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where estatus_vc = 1 and referencia_vc = $ref and area_vc = 55") or die (mysqli_error($horizonte));
$row6 = mysqli_fetch_row($result6);
  
echo $row1[0].' '.$row1[1].' '.$row1[2].'*}'.$row2[0].'*}'.$row3[0].'*}'.$row4[0].'*}'.$row5[0].'*}'.$row6[0].'*}'.$row4[0].'*}'.$areaE;
//Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>