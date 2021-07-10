<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");


mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT concat(nombre_u,' ',apaterno_u) as name, id_u as id, amaterno_u as materno from usuarios where idPuesto_u = 1 and activo_u = 1 and validado_u = 1 order by name asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

echo '<option value="">'.'-MÉDICO TRATANTE-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].' '.$fila['materno'].'</option>';
};

?>