<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT DISTINCT tipo_discapacidad, id_discapacidad from catalogo_discapacidades order by tipo_discapacidad asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELEECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_discapacidad'].'">'.$fila['tipo_discapacidad'].'</option>';
};

?>