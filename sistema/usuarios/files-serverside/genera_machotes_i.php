<?php
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

$id_u = sqlValue($_GET["id_u"], "int", $horizonte);
$id_es = sqlValue($_GET["id_es"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$result = mysqli_query($horizonte, "SELECT temporal_u from usuarios where id_u = $id_u ") or die (mysqli_error($horizonte));
$row = mysqli_fetch_row($result); $tempor = sqlValue($row[0], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
// $consulta = "SELECT nombre_fc as name, id_fc as id from formatos_conceptos where id_concepto_fc = $id_es and temporal_fc = $tempor order by name asc";
$consulta = "SELECT nombre_fc as name, id_fc as id from formatos_conceptos where temporal_fc = $tempor order by name asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-PUEDES SELEECCIONAR UN MACHOTE PARA ESTE ESTUDIO-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
};

?>
