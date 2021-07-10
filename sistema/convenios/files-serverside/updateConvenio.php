<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id = sqlValue($_POST["idBeneficio"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioB"], "int", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorioB"], "text", $horizonte);
 $nombre = sqlValue($_POST["nombreB"], "text", $horizonte);
 $descripcion = sqlValue($_POST["descripcionB"], "text", $horizonte);
  
 $sql = "UPDATE convenios SET convenio_cv = $nombre, descripcion_cv = $descripcion where id_cv = $id limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) {
	echo $sql;
 }else {
	 $sql1 = "UPDATE asigna_conceptos_paquetes SET id_convenio_ac = $id where aleatorio_ac = $aleatorio ";

	mysqli_select_db($horizonte, $database_horizonte);
	$insertar1 = mysqli_query($horizonte, $sql1);
		
	if (!$insertar1) { echo $sql1;
	 }else { echo 1; }
  }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>