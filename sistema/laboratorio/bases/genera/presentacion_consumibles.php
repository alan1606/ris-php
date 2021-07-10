<?php
require_once('../../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT DISTINCT presentacion_cp, id_cp from catalogo_presentaciones order by presentacion_cp asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELEECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_cp'].'">'.$fila['presentacion_cp'].'</option>';
};

?>