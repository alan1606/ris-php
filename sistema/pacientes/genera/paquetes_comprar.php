<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT concepto_to as name, precio_to as precio, id_to as id, dias_entrega_to as no_personas from conceptos WHERE id_tipo_concepto_to = 2 and descripcion_to = 'paquete_h'";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

echo '<option value="">'.'-Selecciona el paquete a comprar-'.'</option>';

while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].' | ($'.$fila['precio'].') | PARA '.$fila['no_personas'].' PERSONAS</option>';
};

?>