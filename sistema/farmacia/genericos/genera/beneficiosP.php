<?php
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT id_convenio_cvp, id_convenio_cvp from convenios_paciente where id_paciente_cvp = '".$_GET['idP']."' order by id_convenio_cvp asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="0">'.'-PARTICULAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	$idC = sqlValue($fila['id_convenio_cvp'], "int", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte); 
	$resultR = mysqli_query($horizonte, "SELECT convenio_cv from convenios where id_cv = $idC limit 1 ") or die (mysqli_error($horizonte));
	$rowR = mysqli_fetch_row($resultR);
	
	echo '<option value="'.$fila['id_convenio_cvp'].'">'.$rowR[0].'</option>';
};

?>