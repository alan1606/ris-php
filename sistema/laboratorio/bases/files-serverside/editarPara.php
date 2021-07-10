<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioUP"], "int", $horizonte);
 $para = sqlValue($_POST["sexoEP"], "text", $horizonte);
 $id = sqlValue($_POST["idAVR"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
  
 $sql = "UPDATE asignar_valor_referencia SET para_sexo = $para where id_avr = $id limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>