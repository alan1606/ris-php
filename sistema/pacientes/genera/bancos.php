<?php
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT id_b, nombrecito_b from catalogo_bancos order by nombrecito_b asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-Banco-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_b'].'">'.$fila['nombrecito_b'].'</option>';
};

?>