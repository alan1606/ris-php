<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $valorBooleano = sqlValue($_POST["valorBooleano"], "int", $horizonte);
 $id = sqlValue($_POST["idAVR"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $sexo = sqlValue($_POST["sexo"], "text", $horizonte);
 $tipoEdad = sqlValue($_POST["tipoEdad"], "text", $horizonte);
 $tipo_edadR = sqlValue($_POST["tipo_edadR"], "text", $horizonte);
 $edadI = sqlValue($_POST["edadI"], "int", $horizonte);
 $edadF = sqlValue($_POST["edadF"], "int", $horizonte);
  
 $sql = "UPDATE asignar_valor_referencia SET booleano = $valorBooleano, para_sexo = $sexo, para_edades = $tipoEdad, rango_edad1 = $edadI, rango_edad2 = $edadF, tipo_edad = $tipo_edadR where id_avr = $id limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>