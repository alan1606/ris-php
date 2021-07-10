<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idU = sqlValue($_POST["idU"], "int", $horizonte);
 	$titulo = sqlValue($_POST["titulo"], "text", $horizonte);
 	$cedula = sqlValue($_POST["cedula"], "text", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
	$sql = "UPDATE usuarios set cedulaProfesional_u = $cedula, titulo_u = $titulo where id_u = $idU limit 1";
	  
	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		
	if (!$update) { echo $sql; }else{ echo 1;}
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>