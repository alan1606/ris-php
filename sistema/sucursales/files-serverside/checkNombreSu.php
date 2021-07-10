<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$nombre = '("'.$_POST["nombreC"].'")';
$idS = sqlValue($_POST["idEs"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
if($_POST["idEs"]!=NULL or $_POST["idEs"]!=''){
$result1 = mysqli_query($horizonte, "SELECT COUNT(id_su) from sucursales where nombre_su in $nombre and id_su != $idS ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1); $c=0;
}else{
	$result1 = mysqli_query($horizonte, "SELECT COUNT(id_su) from sucursales where nombre_su in $nombre ") or die (mysqli_error($horizonte));
	$row1 = mysqli_fetch_row($result1); $c=1;
}
//si alguien que no sea este productor tiene el crup
if($row1[0]>0){ echo 'false'; }//si nadie lo tiene
else{ echo 'true'; }

mysqli_close($horizonte);
?>