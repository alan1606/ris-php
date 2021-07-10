<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $input = sqlValue($_POST["input"], "text", $horizonte);
  
 $sql = "UPDATE usuarios SET variable_temporal_u = $input where id_u = $idU limit 1";
 
 mysqli_select_db($horizonte, $database_horizonte);
 $insertar = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
 	
 if (!$insertar) { echo $sql;}else {echo 1;}
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>