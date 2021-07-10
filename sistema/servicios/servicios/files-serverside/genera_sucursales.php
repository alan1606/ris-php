<?php require_once('../../Connections/horizonte.php'); ?>
<?php

$idSucursal = $_GET['idS'];

mysqli_select_db($horizonte, $database_horizonte);
$consulta1 = "SELECT DISTINCT id_su, nombre_su from sucursales where id_su in ($idSucursal) limit 1";
$query1 = mysqli_query($horizonte, $consulta1) or die (mysqli_error($horizonte));

while ($fila1 = mysqli_fetch_array($query1)) {
	
		echo '<option value="'.$fila1['id_su'].'">'.$fila1['nombre_su'].'</option>';
	
};

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT DISTINCT id_su, nombre_su from sucursales where id_su not in ($idSucursal) order by id_su asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

while ($fila = mysqli_fetch_array($query)) {
	
		echo '<option value="'.$fila['id_su'].'">'.$fila['nombre_su'].'</option>';
	
};

?>