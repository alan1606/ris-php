<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idM = sqlValue($_POST["idM"], "int", $horizonte);
 $indiM = sqlValue($_POST["indiM"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE medicamentos_hospital SET indicacion_mh = $indiM where id_mh = $idM limit 1";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>