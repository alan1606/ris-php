<?php
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

$myidu = sqlValue($_GET["myidu"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
// $consulta = "SELECT u.id_u as id, concat(t.abreviacion_ti,' ',u.nombre_u,' ',u.apaterno_u) as nombre, u.amaterno_u as materno from usuarios u left join titulos t on t.id_ti = u.id_titulo_u where t.abreviacion_ti != 'C.' or id_u = $myidu order by concat(u.nombre_u,' ',u.apaterno_u) asc ";

$consulta = "SELECT u.id_u as id, concat(t.abreviacion_ti,' ',u.nombre_u,' ',u.apaterno_u) as nombre, u.amaterno_u as materno from usuarios u left join titulos t on t.id_ti = u.id_titulo_u where t.abreviacion_ti != 'C.' order by concat(u.nombre_u,' ',u.apaterno_u) asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="" selected>'.'-SELECCIONA A LA PERSONA-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['nombre'].' '.$fila['materno'].'</option>';
};

?>