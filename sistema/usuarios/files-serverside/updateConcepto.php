<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idC = sqlValue($_POST["id"], "int", $horizonte);
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
 $sql = "UPDATE conceptos set concepto_to = $concepto, id_area_to = $area, precio_to = $precio, precio_urgencia_to = $precioU, precio_m = $precioM, precio_mu = $precioMU where id_to = $idC limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if(!$update){ echo $sql; }else{ echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>