<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT DISTINCT unidad_un as name, abreviacion_un as abre, id_un as id from unidades where unidad_un != '' order by name asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELEECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)){
	echo '<option value="'.$fila['id'].'('.$fila['abre'].')">'.$fila['name'].'</option>';
};
?>