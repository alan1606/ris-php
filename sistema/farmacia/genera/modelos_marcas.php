<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

$id_m = sqlValue($_GET["id_m"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT nombre_mmp as name, id_mmp as id from modelos_marcas_productos where id_marca_mmp = $id_m order by name asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'Selecciona una categoría'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
};

?>