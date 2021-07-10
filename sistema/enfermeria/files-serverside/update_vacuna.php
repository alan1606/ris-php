<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_v = sqlValue($_POST["idEstudioE"], "int", $horizonte);
 $id_u = sqlValue($_POST["idUsuarioE"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombre_v"]), "text", $horizonte);
 $enfermedad = sqlValue(mb_strtoupper($_POST["enfermedad_v"]), "text", $horizonte);
 $edad = sqlValue(mb_strtoupper($_POST["edad_v"]), "text", $horizonte);
 $aplicacion = sqlValue(mb_strtoupper($_POST["aplicacion_v"]), "text", $horizonte);
 $dosis = sqlValue(mb_strtoupper($_POST["dosis_v"]), "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $noTemp = sqlValue(date('Y-m-d-H-i-s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE catalogo_vacunas set vacuna_v = $nombre, enfermedad_v = $enfermedad, edad_v = $edad, aplicacion_v = $aplicacion, dosis_v = $dosis where id_v = $id_v limit 1";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>