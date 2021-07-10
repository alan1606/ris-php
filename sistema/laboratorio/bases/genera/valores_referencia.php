<?php
require_once('../../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT v.tipo_cvr as name, v.id_cvr as id from catalogo_valores_referencia v order by v.tipo_cvr asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELEECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
};

?>