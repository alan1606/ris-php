<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");


mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT escolaridad as name, id_escolaridad as id from catalogo_escolaridad order by id_escolaridad asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

echo '<option value="">'.'-ESCOLARIDAD-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
};

?>