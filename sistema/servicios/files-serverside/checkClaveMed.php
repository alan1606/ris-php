<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$clave = sqlValue($_POST["clave"], "text", $horizonte);
//$id_dx = sqlValue($_GET["id_dx"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);

$result1 = mysqli_query($horizonte, "SELECT COUNT(id_med) from medicamentos where clave_med = $clave ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

//si alguien que no sea este usuario tiene el username
if($row1[0]>0){
	echo 'false';
}//si nadie lo tiene
else{
	echo 'true';
}

mysqli_close($horizonte);
?>