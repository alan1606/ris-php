<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

	mysqli_select_db($horizonte, $database_horizonte);
	$consulta1 = "SELECT DISTINCT id_pr, procedencia_pr from procedencia where id_pr = 1 order by procedencia_pr asc"; 
	//$consulta1 = "SELECT DISTINCT id_pr, procedencia_pr from procedencia order by procedencia_pr asc"; covadonga
	$query1 = mysqli_query($horizonte, $consulta1) or die (mysqli_error($horizonte));
	while ($fila1 = mysqli_fetch_array($query1)) { echo '<option value="'.$fila1['id_pr'].'">'.$fila1['procedencia_pr'].'</option>'; };

?>