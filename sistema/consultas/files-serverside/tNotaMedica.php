<?php
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

$id_u = sqlValue($_GET["x"], "int", $horizonte);
mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT id_nm, nombre_nm from notas_medicas where tipo_nm = 3 and usuario_nm = $id_u order by nombre_nm asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="0">'.'-Nota Médica-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_nm'].'">'.$fila['nombre_nm'].'</option>';
};

?>