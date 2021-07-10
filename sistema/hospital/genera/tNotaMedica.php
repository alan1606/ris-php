<?php
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT id_nm, nombre_nm from notas_medicas where tipo_nm = 1 order by nombre_nm asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-Nota Médica-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_nm'].'">'.$fila['nombre_nm'].'</option>';
};

?>