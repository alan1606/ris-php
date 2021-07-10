<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");
//Generales
 $noRef = sqlValue($_POST["id"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultHl = mysqli_query($horizonte, "SELECT muestras_ov from orden_venta where id_ov = $noRef limit 1;") or die (mysqli_error($horizonte));
 $rowHl = mysqli_fetch_row($resultHl);
 
 echo $rowHl[0];
	
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>