<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioE"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombreE"]), "text", $horizonte);
 $precio = sqlValue($_POST["precioE"], "double", $horizonte);
 $no_beneficiarios = sqlValue($_POST["no_beneficiarios"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $noTemp = sqlValue(date('Y-m-d-H-i-s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO conceptos (usuario_to, concepto_to, precio_to, precio_urgencia_to, fecha_to, id_departamento_to, id_tipo_concepto_to, aleatorio_c, id_area_to, precio_m, precio_mu, descripcion_to, dias_entrega_to)";
 $sql.= "VALUES ($idUsuario, $nombre, $precio, $precio, $now, 4, 2, $noTemp, 21, $precio, $precio, 'membresia_h', $no_beneficiarios)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>