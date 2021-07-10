<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idU = sqlValue($_POST["idUsuarioC"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombre_g"]), "text", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorio_cto"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $precio = sqlValue('0', "double", $horizonte);
 $descripcion = sqlValue($_POST["descripcion_g"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO conceptos (usuario_to, concepto_to, precio_to, precio_urgencia_to, fecha_to, id_departamento_to, id_tipo_concepto_to, aleatorio_c, id_area_to, precio_m, precio_mu, descripcion_to)";
 $sql.= "VALUES ($idU, $nombre, $precio, $precio, $now, 0, 8, $aleatorio, 0, $precio, $precio, $descripcion)";

 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

 if(!$update){ echo $sql; }else{ echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>