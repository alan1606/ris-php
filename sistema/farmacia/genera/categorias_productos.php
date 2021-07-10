<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

$id_g = sqlValue($_GET["id_g"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT nombre_cgp as name, id_cgp as id from categorias_grupos_productos where id_grupo_cgp = $id_g order by name asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'Selecciona una categoría'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
};

?>