<?php
require("../../../Connections/sigma.php");
require("../../../funciones/php/values.php");
//Generales
 $ref = sqlValue($_POST["ref"], "text", $horizonte);
 
 mysql_select_db($database_sigma, $sigma);
 $resultR = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where referencia_vc = $ref and tipo_concepto_vc = 2 ", $sigma) or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR);
  
 $subtotales = $rowR[0];
 echo $subtotales;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($sigma);
?>