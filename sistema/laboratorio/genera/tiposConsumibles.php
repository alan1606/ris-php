<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT DISTINCT tipo_cti as name, id_cti as id from catalogo_tipo_inventario order by name asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELEECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)){
	echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
};
?>