<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT concat(nombre_u, ' ', apaterno_u, ' (', usuario_u, ')') as name, id_u as id from usuarios WHERE validado_u = 1 and activo_u = 1 order by name asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

echo '<option value="">'.'Selecciona a la persona que recibirá el dinero'.'</option>';

while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
};

?>