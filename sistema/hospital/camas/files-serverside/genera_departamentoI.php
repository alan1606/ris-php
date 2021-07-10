<?php
require_once('../../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT nombre_d, id_d from departamentos where clave_d in ('IMG') order by id_d asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
//echo '<option value="">'.'-SELEECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_d'].'">'.$fila['nombre_d'].'</option>';
};

?>