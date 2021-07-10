<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

$usuario = $_POST["usuario"];

mysqli_select_db($horizonte, $database_horizonte);
$result1 = mysqli_query($horizonte, "SELECT COUNT(id_u) from usuarios where usuario_u = '$usuario' ") or die (mysqli_error($horizonte));
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