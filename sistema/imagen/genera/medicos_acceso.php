<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");


mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT concat(t.abreviacion_ti, ' ', u.nombre_u, ' ', u.apaterno_u) as name, u.amaterno_u as materno, u.id_u as id from usuarios u left join titulos t on t.id_ti = u.id_titulo_u WHERE u.multisucursal_u = 0 group by u.id_u order by u.apaterno_u asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'SELECCIONA UN MÉDICO'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].' '.$fila['materno'].'</option>';
};

?>