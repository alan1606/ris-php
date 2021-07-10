<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

$usuario = sqlValue($_POST["usuarioRC"], "text", $horizonte);
$email = sqlValue($_POST["emailRC"], "text", $horizonte);
$opc = 0;

mysqli_select_db($horizonte, $database_horizonte);

$result1 = mysqli_query($horizonte, "SELECT COUNT(id_u) from usuarios where usuario_u = $usuario and email_u = $email ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

if($row1[0]>0){ //por lo menos existe la cuenta
	$opc = 1;
	
	$result2 = mysqli_query($horizonte, "SELECT validado_u from usuarios where usuario_u = $usuario and email_u = $email ") or die (mysqli_error($horizonte));
	$row2 = mysqli_fetch_row($result2);
	if($row2[0]==0){ $opc = 2; }
	
	$result3 = mysqli_query($horizonte, "SELECT activo_u from usuarios where usuario_u = $usuario and email_u = $email ") or die (mysqli_error($horizonte));
	$row3 = mysqli_fetch_row($result3);
	if($row3[0]==0){ $opc = 3; }
	
}else{ //no existe la cuenta
	$opc = 5;
}

echo $opc;

mysqli_close($horizonte);
?>