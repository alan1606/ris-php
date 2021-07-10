<?php
require_once('../../../Connections/horizonte.php');
require("../../../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT id_fp, forma_pago_fp from catalogo_forma_pago order by forma_pago_fp asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_fp'].'">'.$fila['forma_pago_fp'].'</option>';
};

?>