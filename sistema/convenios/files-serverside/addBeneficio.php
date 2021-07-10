<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioB"], "int", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorioB"], "text", $horizonte);
 $nombre = sqlValue($_POST["nombreB"], "text", $horizonte);
 $descripcion = sqlValue($_POST["descripcionB"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO convenios (convenio_cv, descripcion_cv, usuario_cv, fecha_cv, aleatorio_cv)";
 $sql.= "VALUES ($nombre, $descripcion, $idUsuario, $now, $aleatorio)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { 
	echo $sql; 
} else{
	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT id_cv from convenios where aleatorio_cv = $aleatorio limit 1 ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $idConvenio = sqlValue($row[0], "int", $horizonte);
	
	$sql1 = "UPDATE asigna_conceptos_paquetes SET id_convenio_ac = $idConvenio where aleatorio_ac = $aleatorio ";

	mysqli_select_db($horizonte, $database_horizonte);
	$insertar = mysqli_query($horizonte, $sql1);
		
	if (!$insertar) { echo $sql1;
	 }else { echo 1; }
}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>