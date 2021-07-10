<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioUE"], "int", $horizonte);
 $para = sqlValue($_POST["tipoEdad"], "text", $horizonte);
 $id = sqlValue($_POST["idAVR"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $edadI = sqlValue($_POST["edadI"], "int", $horizonte);
 $edadF = sqlValue($_POST["edadF"], "int", $horizonte);
 $tipo_edad = sqlValue($_POST["tipo_edadR"], "text", $horizonte);
  
 $sql = "UPDATE asignar_valor_referencia SET para_edades = $para, rango_edad1 = $edadI, rango_edad2 = $edadF, tipo_edad = $tipo_edad where id_avr = $id limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>