<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT concat(vacuna_v,' | ',enfermedad_v,' | ',dosis_v) as name, id_v as id from catalogo_vacunas where esquema_v = 2 order by id_v asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

echo '<option value="">'.'-SELECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
};

?>