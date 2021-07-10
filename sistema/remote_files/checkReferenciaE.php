<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

$referencia = sqlValue($_POST["referencia"], "text", $horizonte); 
$curp = sqlValue($_POST["curp"], "text", $horizonte); 
$numero = sqlValue($_POST["numero"], "int", $horizonte); 

mysqli_select_db($horizonte, $database_horizonte);
$resultP = mysqli_query($horizonte, "SELECT id_p from pacientes where curp_p = $curp limit 1 ") or die (mysqli_error($horizonte));
$rowP = mysqli_fetch_row($resultP); $idP = $rowP[0];

mysqli_select_db($horizonte, $database_horizonte);

$result1 = mysqli_query($horizonte, "SELECT COUNT(id_vc) from venta_conceptos where id_paciente_vc = $idP and referencia_vc = $referencia and contador_vc = $numero and tipo_concepto_vc in (3,4,5) limit 1 ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

//si alguien que no sea este productor tiene el crup
if($row1[0]>0){
	echo 'true';
}//si nadie lo tiene
else{
	echo 'false';
}

mysqli_close($horizonte);
?>