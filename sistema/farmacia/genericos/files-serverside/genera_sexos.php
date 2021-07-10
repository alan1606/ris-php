<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT DISTINCT cat_sexo, id_sexo from catalogo_sexos where id_sexo in (1,2) order by id_sexo asc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SEXO-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_sexo'].'">'.$fila['cat_sexo'].'</option>';
};

?>