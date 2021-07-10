<?php
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

//$idP = sqlValue($_GET["idP"], "int", $horizonte);

$lista = '0';
mysqli_select_db($horizonte, $database_horizonte);
$consulta1 = "SELECT id_convenio_cvp from convenios_paciente where id_paciente_cvp = $_GET[idP] ";
$query1 = mysqli_query($horizonte, $consulta1) or die (mysqli_error($horizonte));
while ($fila = mysqli_fetch_array($query1)) {
	$lista = $lista.','.$fila['id_convenio_cvp'];
};//echo $lista;

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT id_cv, convenio_cv from convenios where id_cv in ($lista) order by convenio_cv asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_cv'].'">'.$fila['convenio_cv'].'</option>';
};

?>