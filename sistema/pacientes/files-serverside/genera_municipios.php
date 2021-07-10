<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT id_mx, d_municipio from mexico where d_municipio != '' and d_estado = '".$_GET['id']."' group by d_municipio ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
if ($_GET['id']!='-ENTIDAD FEDERATIVA-'){
echo '<option value="">'.'-MUNICIPIO-'.'</option>';
}
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_mx'].'">'.$fila['d_municipio'].'</option>';
};

?>