<?php
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT id_d as id, nombre_d as nombre from departamentos where id_d in (4,11,2,1,13,12,10,6,18) order by nombre asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="" selected>'.'-DEPARTAMENTO-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
};

?>