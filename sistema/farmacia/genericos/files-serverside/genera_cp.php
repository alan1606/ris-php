<?php
require_once('../../Connections/horizonte.php');

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT * from mexico where d_codigo != '' and d_estado = '".$_GET['idE']."' and d_municipio = '".$_GET['idM']."' and d_asenta = '".$_GET['idC']."' group by d_codigo ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'C.P.'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_mx'].'" selected>'.$fila['d_codigo'].'</option>';
};

?>