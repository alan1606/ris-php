<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

$referencia = sqlValue($_POST["referenciaEstudio"], "text", $horizonte);
$curp = sqlValue($_POST["curp"], "text", $horizonte); 
$numero = sqlValue($_POST["numeroE"], "int", $horizonte); 

mysqli_select_db($horizonte, $database_horizonte);
$resultP = mysqli_query($horizonte, "SELECT id_p from pacientes where curp_p = $curp limit 1 ") or die (mysqli_error($horizonte));
$rowP = mysqli_fetch_row($resultP); $idP = $rowP[0];

mysqli_select_db($horizonte, $database_horizonte);

$result1 = mysqli_query($horizonte, "SELECT id_vc, tipo_concepto_vc, estatus_vc, id_concepto_es, departamento_vc from venta_conceptos where referencia_vc = $referencia and contador_vc = $numero and id_paciente_vc = $idP ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1); $idD=sqlValue($row1[4],"int"); $idTE=sqlValue($row1[3], "int", $horizonte); $idST = sqlValue($row1[2], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$resultST = mysqli_query($horizonte, "SELECT estatus_est from estatus where id_est = $idST limit 1 ") or die (mysqli_error($horizonte));
$rowST = mysqli_fetch_row($resultST);

mysqli_select_db($horizonte, $database_horizonte);
$resultE = mysqli_query($horizonte, "SELECT concepto_to from conceptos where id_to = $idTE limit 1 ") or die (mysqli_error($horizonte));
$rowE = mysqli_fetch_row($resultE);

mysqli_select_db($horizonte, $database_horizonte);
$resultD = mysqli_query($horizonte, "SELECT nombre_d from departamentos where id_d = $idD limit 1 ") or die (mysqli_error($horizonte));
$rowD = mysqli_fetch_row($resultD);

$nombreP = $rowD[0].'};['.$rowE[0].'};['.$row1[0].'};['.$row1[1].'};['.$rowST[0].'};['.$row1[2];

echo $nombreP;

mysqli_close($horizonte);
?>