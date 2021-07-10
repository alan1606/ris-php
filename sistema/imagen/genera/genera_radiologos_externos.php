<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT nombre_u, apaterno_u, amaterno_u, id_u from usuarios where acceso_u = 10 order by nombre_u asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELEECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_u'].'">'.$fila['nombre_u'].' '.$fila['apaterno_u'].' '.$fila['amaterno_u'].'</option>';
};

?>