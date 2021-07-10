<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT DISTINCT aseo_ap, id_ap from catalogo_aseo_personal order by aseo_ap asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_ap'].'">'.$fila['aseo_ap'].'</option>';
};

?>