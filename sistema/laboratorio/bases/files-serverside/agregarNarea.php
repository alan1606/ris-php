<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["id_u"], "int", $horizonte);
 $area = sqlValue(mb_strtoupper($_POST["nombre"]), "text", $horizonte);
 $clave = sqlValue(mb_strtoupper($_POST["clave"]), "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO areas (departamento_a, nombre_a, usuario_a, fecha_a, clave_a)";
 $sql.= "VALUES (1, $area, $idUsuario, $now, $clave)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>