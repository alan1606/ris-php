<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);
	$idH = sqlValue($_POST["idH"], "int", $horizonte);
	
		mysqli_select_db($horizonte, $database_horizonte);
		$result1 = mysqli_query($horizonte, "SELECT nota_nh, id_nh from notas_de_hospital where id_hospitalizacion_nh = $idH limit 1 ") or die (mysqli_error($horizonte));
		$row1 = mysqli_fetch_row($result1);
			
	echo $row1[1];
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>