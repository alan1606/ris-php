<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $cantidad = sqlValue($_POST["cantidadC"], "double", $horizonte);
 $id = sqlValue($_POST["idAC"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
  
 $sql = "UPDATE asignar_consumibles SET cantidad_ac = $cantidad where id_ac = $id limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>