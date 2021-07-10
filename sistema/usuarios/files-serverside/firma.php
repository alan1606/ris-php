<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$id = sqlValue($_POST["id"], "int", $horizonte);
	$tempo = sqlValue($_POST["tempo"], "text", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$sql1 = "UPDATE documentos set firma_do = 0 where aleatorio_do = $tempo;";
	$update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
	
	if(!$update1){echo $sql1; }else{
		mysqli_select_db($horizonte, $database_horizonte);
		$sql = "UPDATE documentos set firma_do = 1 where id_do = $id limit 1;";
		$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		
		if(!$update){echo $sql; }else{ echo 1; }
	}
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>