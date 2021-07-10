<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_c = sqlValue($_POST["id_c"], "int", $horizonte);
 mysqli_select_db($horizonte, $database_horizonte); 
 $sql = "DELETE from venta_conceptos where id_concepto_es = $id_c limit 1";
 //$sql_1 = "DELETE from venta_conceptos_1 where id_concepto_es = $id_c limit 1";
  
  $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
  if (!$update) { echo $sql; }else{ 
  	echo 1;
    //$update_1 = mysqli_query($horizonte, $sql_1) or die (mysqli_error($horizonte));
  }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>