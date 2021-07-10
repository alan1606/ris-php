<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");
include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

	if(isset($_SESSION['id'])){
		$id_u = $_SESSION['id'];
		
		mysqli_select_db($horizonte, $database_horizonte);
		$consulta = "SELECT c.concepto_to as name, c.id_to as id from conceptos c WHERE c.id_tipo_concepto_to = 4 order by name asc ";

		$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
		echo '<option value="" selected>'.'-Buscar el estudio de imagen para el formato-'.'</option>';
		while ($fila = mysqli_fetch_array($query)) {
			echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
		};
		
	}else{ header("Location: " . '../../logout.php' ); }
?>