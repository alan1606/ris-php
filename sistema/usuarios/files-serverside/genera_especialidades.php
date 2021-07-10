<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT * from especialidades order by nombre_especialidad asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
//if ($_GET['id']!='-SELECCIONAR-'){
echo '<option value="">'.'-SELECCIONAR-'.'</option>';
//}
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_es'].'">'.$fila['nombre_especialidad'].'</option>';
};

?>