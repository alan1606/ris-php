<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");
//Generales
 $ref = sqlValue($_POST["ref"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultR = mysqli_query($horizonte, "SELECT subtotal_consulta_ov, subtotal_servicios_ov, subtotal_estudios_ov from orden_venta where referencia_ov = $ref ") or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR);
 
 $subtotales = $rowR[0].";".$rowR[1].";".$rowR[2];
 
 echo $subtotales;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>