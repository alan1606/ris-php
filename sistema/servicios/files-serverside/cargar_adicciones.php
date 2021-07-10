<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT DISTINCT adiccion_ca, id_ca from catalogo_adicciones order by adiccion_ca asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-ADICCIÓN-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_ca'].'">'.$fila['adiccion_ca'].'</option>';
};

?>