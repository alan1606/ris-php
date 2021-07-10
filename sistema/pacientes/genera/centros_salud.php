<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT DISTINCT nombre_cs, id_cs from catalogo_centro_salud order by nombre_cs asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-CENTRO DE SALUD-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_cs'].'">'.$fila['nombre_cs'].'</option>';
};
?>