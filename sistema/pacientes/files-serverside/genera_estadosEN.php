<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT id_mx, d_estado from mexico where d_estado != '' group by d_estado ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-ENTIDAD FEDERATIVA DE NACIMIENTO-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_mx'].'">'.$fila['d_estado'].'</option>';
};

?>