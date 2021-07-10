<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");
//Generales
 $noRef = sqlValue($_POST["id"], "int", $horizonte);
 $user = sqlValue($_POST["user"], "int", $horizonte);
 $muestra = sqlValue($_POST["val"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 $sqlF = "UPDATE orden_venta set muestras_ov = $muestra where id_ov = $noRef limit 1;";
 
 mysqli_select_db($horizonte, $database_horizonte);
 $insertarF = mysqli_query($horizonte, $sqlF) or die (mysqli_error($horizonte));
 if (!$insertarF){ echo $sqlF;} else {echo 1;}
	
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>