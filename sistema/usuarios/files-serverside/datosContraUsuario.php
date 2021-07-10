<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idU = sqlValue($_POST["id"], "int", $horizonte);
 	$cActual = $_POST["cA"];
 	$cNueva = sqlValue($_POST["cNueva"], "text", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT contrasena_u from usuarios where id_u = $idU ") or die (mysqli_error($horizonte));
	$row = mysqli_fetch_row($result);
	
	if($cActual == $row[0]){
		if($cActual != $_POST["cNueva"]){
			mysqli_select_db($horizonte, $database_horizonte);
			$sql = "UPDATE usuarios set contrasena_u = $cNueva where id_u = $idU limit 1";
			  
			$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
				
			if (!$update) { $x1 = $sql; }
			else{ $x1 = 1; }
		}else{$x1 = 'x';}
	
	}else{ $x1 = 0; }

echo $x1;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>