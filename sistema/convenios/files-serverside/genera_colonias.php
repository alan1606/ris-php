<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT * from mexico where d_asenta != '' and d_estado = '".$_GET['idE']."' and d_municipio = '".$_GET['idM']."' group by d_asenta ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
if ($_GET['idE']!='-SELECCIONAR-' and $_GET['idM']!='-SELECCIONAR-'){
echo '<option value="">'.'-SELECCIONAR-'.'</option>';
}
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_mx'].'">'.$fila['d_asenta'].'</option>';
};

?>