<?php
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

$id_depto = sqlValue($_GET["idd"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT id_a as id, nombre_a as nombre from areas where departamento_a = $id_depto order by nombre asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="" selected>'.'-ÁREA-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
};

?>