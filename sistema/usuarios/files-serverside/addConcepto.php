<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idU"], "int", $horizonte);
 $temporal = sqlValue($_POST["temporal"], "text", $horizonte);
 $concepto = sqlValue(mb_strtoupper($_POST["nombre"]), "text", $horizonte);
 $area = sqlValue($_POST["area"], "int", $horizonte);
 $precio = sqlValue($_POST["precio"], "double", $horizonte);
 $precioU = sqlValue($_POST["precioU"], "double", $horizonte);
 $precioM = sqlValue($_POST["precioM"], "double", $horizonte);
 $precioMU = sqlValue($_POST["precioMU"], "double", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO conceptos(usuario_to, aleatorio_c, concepto_to, id_departamento_to, id_area_to, precio_to, precio_urgencia_to, precio_m, precio_mu, fecha_to, id_tipo_concepto_to)";
 $sql.= "VALUES ($idUsuario, $temporal, $concepto, 4, $area, $precio, $precioU, $precioM, $precioMU, $now, 1)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if(!$update){ echo $sql; }else{ echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>