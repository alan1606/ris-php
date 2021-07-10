<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

//Checamos el nivel de acceso del usuario, para ver si es multisucursal
mysqli_select_db($horizonte, $database_horizonte);
$resultNu = mysqli_query($horizonte, "SELECT multisucursal_u, idSucursal_u from usuarios where id_u = '$_GET[idU]' ") or die (mysqli_error($horizonte)); $rowNu = mysqli_fetch_row($resultNu); //echo $rowNu[0];

mysqli_select_db($horizonte, $database_horizonte);
if($rowNu[0]==1){ 
	$consulta1 = "SELECT DISTINCT id_su, nombre_su from sucursales order by nombre_su asc"; 
	$query1 = mysqli_query($horizonte, $consulta1) or die (mysqli_error($horizonte));
	while ($fila1 = mysqli_fetch_array($query1)) { echo '<option value="'.$fila1['id_su'].'">'.$fila1['nombre_su'].'</option>'; };
}
else{
	$consulta1 = "SELECT DISTINCT id_su, nombre_su from sucursales where id_su = $rowNu[1] order by nombre_su asc";
	$query1 = mysqli_query($horizonte, $consulta1) or die (mysqli_error($horizonte));
	while ($fila1 = mysqli_fetch_array($query1)) { echo '<option selected value="'.$fila1['id_su'].'">'.$fila1['nombre_su'].'</option>'; };
}

?>