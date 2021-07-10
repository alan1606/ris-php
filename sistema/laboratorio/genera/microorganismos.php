<?php
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

$idE=sqlValue($_POST["idE"],"int");

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT id_b as id, base_b as name from bases where base_b like '%_MIORG' order by name asc";

$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELEECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)){ $name = explode("_MIORG", $fila['name']);
	echo '<option value="'.$fila['id'].'">'.$name[0].'</option>';
};
?>