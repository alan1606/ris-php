<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");


mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT ocupacion as name, id_ocupacion as id from catalogo_ocupaciones order by ocupacion asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

echo '<option value="">'.'-OCUPACIÓN-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
};

?>