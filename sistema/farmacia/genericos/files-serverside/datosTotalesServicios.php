<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noAleatorio = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte); 
 	$resultC = mysqli_query($horizonte, "SELECT sum(precio_normal_vc) from venta_conceptos where no_temp_vc = $noAleatorio and tipo_concepto_vc = 2") or die (mysqli_error($horizonte));
	$rowC = mysqli_fetch_row($resultC);
		
	echo $rowC[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>