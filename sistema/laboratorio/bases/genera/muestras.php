<?php
require_once('../../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT concat(m.muestra_mu,' (',c.condicion_co,')') as name, m.id_mu as id from muestras m left join condiciones c on c.id_co = m.id_condicion_mu order by m.muestra_mu asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELEECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
};

?>