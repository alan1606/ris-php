<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT DISTINCT frecuencia_cf, if_cf from catalogo_frecuencias order by frecuencia_cf asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['if_cf'].'">'.$fila['frecuencia_cf'].'</option>';
};

?>