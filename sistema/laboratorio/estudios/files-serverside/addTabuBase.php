<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioE"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreE"], "text", $horizonte);
 $precio = sqlValue($_POST["precioE"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioUrgenciaE"], "double", $horizonte);
 $precio1 = sqlValue($_POST["precioE1"], "double", $horizonte);
 $precioU1 = sqlValue($_POST["precioUrgenciaE1"], "double", $horizonte);
 $idArea = sqlValue($_POST["areaE"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $noTemp = sqlValue(date('Y-m-d-H-i-s'), "date", $horizonte);
 $dEntrega = sqlValue($_POST["dEntregaE"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO conceptos (usuario_to, concepto_to, precio_to, precio_urgencia_to, id_area_to, fecha_to, id_departamento_to, id_tipo_concepto_to, aleatorio_c, dias_entrega_to, precio1_to, precio_urgencia1_to)";
 $sql.= "VALUES ($idUsuario, $nombre, $precio, $precioU, $idArea, $now, 1, 3, $noTemp, $dEntrega, $precio1, $precioU1)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>