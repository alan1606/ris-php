<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idS = sqlValue($_POST["idServicio"], "int", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioS"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreS"], "text", $horizonte);
 $precio = sqlValue($_POST["precioS"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioUrgenciaS"], "double", $horizonte);
 $idDepartamento = sqlValue($_POST["departamentoS"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
   
 $sql = "UPDATE conceptos SET concepto_to = $nombre, id_departamento_to = $idDepartamento, precio_to = $precio, precio_urgencia_to = $precioU where id_to = $idS limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>