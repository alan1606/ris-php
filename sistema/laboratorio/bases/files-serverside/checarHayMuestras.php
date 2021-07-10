<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $resultC = mysqli_query($horizonte, "SELECT count(id_am) from asignar_muestra where aleatorio_am = $noTemp and temporal_am = 1 ") or die (mysqli_error($horizonte));
	 $rowC = mysqli_fetch_row($resultC);
		
echo $rowC[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>