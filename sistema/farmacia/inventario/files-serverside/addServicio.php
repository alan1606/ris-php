<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioS"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreS"], "text", $horizonte);
 $precio = sqlValue($_POST["precioS"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioUrgenciaS"], "double", $horizonte);
 $idDepartamento = sqlValue($_POST["departamentoS"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO conceptos (usuario_to, concepto_to, precio_to, precio_urgencia_to, fecha_to, id_departamento_to, id_tipo_concepto_to)";
 $sql.= "VALUES ($idUsuario, $nombre, $precio, $precioU, $now, $idDepartamento, 2)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 	
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>