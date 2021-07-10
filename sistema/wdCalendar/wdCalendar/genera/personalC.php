<?php
require_once('../../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT concat(nombre_u,' ',apaterno_u) as nombre, amaterno_u, id_u from usuarios order by apaterno_u asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELECCIONAR-'.'</option>';

while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_u'].'">'.$fila['nombre'].' '.$fila['amaterno_u'].'</option>';
};

?>