<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $resultC = mysqli_query($horizonte, "SELECT count(id_ame) from asignar_metodo where aleatorio_ame = $noTemp and temporal_ame = 1 ") or die (mysqli_error($horizonte));
	 $rowC = mysqli_fetch_row($resultC);
		
echo $rowC[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>