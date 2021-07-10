<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultR = mysqli_query($horizonte, "SELECT ticket_pa from pagos_ov where no_temp_pag = $noTemp limit 1") or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR);
		
echo $rowR[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>