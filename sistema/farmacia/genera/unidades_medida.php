<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT unidad_un as name, id_un as id from unidades order by name asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'Selecciona una unidad de medida'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
};

?>