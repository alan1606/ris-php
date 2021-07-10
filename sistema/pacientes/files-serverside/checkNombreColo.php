<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$cp_n = sqlValue($_POST["cp_n"], "text", $horizonte);
$nombre_nc = sqlValue($_POST["colonia"], "text", $horizonte);
$municipio = sqlValue($_POST["municipio"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);

$result2 = mysqli_query($horizonte, "SELECT d_estado, d_municipio from mexico where id_mx = $municipio limit 1") or die (mysqli_error($horizonte));
$row2 = mysqli_fetch_row($result2); $estado1 = sqlValue($row2[0], "text", $horizonte); $municipio1 = sqlValue($row2[1], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);

$result1 = mysqli_query($horizonte, "SELECT COUNT(id_mx) from mexico where d_codigo = $cp_n and d_estado = $estado1 and d_municipio = $municipio1 and d_asenta = $nombre_nc ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

//si alguien que no sea este usuario tiene la clave
if($row1[0]>0){
	echo 'false';
}//si nadie lo tiene
else{
	echo 'true';
}

mysqli_close($horizonte);
?>