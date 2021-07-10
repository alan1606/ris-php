<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT DISTINCT tipo_sangre, id_tipo_sangre from catalogo_tipo_sangre order by id_tipo_sangre asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-TIPO SANGRE-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_tipo_sangre'].'">'.$fila['tipo_sangre'].'</option>';
};
?>