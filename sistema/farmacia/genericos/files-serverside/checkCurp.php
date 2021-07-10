<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$curpP = sqlValue($_POST["curpP"], "text", $horizonte);
$idP = sqlValue($_POST["idP"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
if($_POST["idP"]!=NULL or $_POST["idP"]!=''){
$result1 = mysqli_query($horizonte, "SELECT COUNT(id_p) from pacientes where curp_p = $curpP and id_p != $idP ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1); $c=0;
}else{
	$result1 = mysqli_query($horizonte, "SELECT COUNT(id_p) from pacientes where curp_p = $curpP ") or die (mysqli_error($horizonte));
	$row1 = mysqli_fetch_row($result1); $c=1;
}
//si alguien que no sea este productor tiene el crup
if($row1[0]>0){ echo 'false'; }//si nadie lo tiene
else{ echo 'true'; }

mysqli_close($horizonte);
?>