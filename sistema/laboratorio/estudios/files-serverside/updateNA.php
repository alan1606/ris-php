<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idE = sqlValue($_POST["idEstu"], "int", $horizonte);
 $na = sqlValue($_POST["nAl"], "text", $horizonte);
   
 $sql = "UPDATE conceptos SET aleatorio_c = $na where id_to = $idE limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>