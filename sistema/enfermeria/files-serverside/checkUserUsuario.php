<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$user = sqlValue($_POST["user"], "text", $horizonte);
//$idU = sqlValue($_GET["idU"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);

$result1 = mysqli_query($horizonte, "SELECT COUNT(id_u) from usuarios where usuario_u = $user ") or die (mysqli_error($horizonte));
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