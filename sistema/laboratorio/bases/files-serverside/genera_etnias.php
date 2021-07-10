<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT DISTINCT grupo_etnico, id_grupo_etnico from catalogo_grupo_etnico order by grupo_etnico asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELEECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_grupo_etnico'].'">'.$fila['grupo_etnico'].'</option>';
};

?>