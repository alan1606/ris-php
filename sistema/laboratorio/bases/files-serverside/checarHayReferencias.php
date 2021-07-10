<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $resultC = mysqli_query($horizonte, "SELECT count(id_avr) from asignar_valor_referencia where aleatorio_avr = $noTemp and temporal_avr = 1 ") or die (mysqli_error($horizonte));
	 $rowC = mysqli_fetch_row($resultC);
		
echo $rowC[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>