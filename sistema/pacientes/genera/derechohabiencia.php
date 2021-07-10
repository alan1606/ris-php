<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT nombre_dh, id_dh from catalogo_derechohabiencias order by id_dh asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-DERECHOHABIENCIA-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_dh'].'">'.$fila['nombre_dh'].'</option>';
};
?>