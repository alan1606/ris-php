<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["id_u"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombre"]), "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO catalogo_tipo_inventario(tipo_cti, usuario_cti, fecha_cti)";
 $sql.= "VALUES ($nombre, $idUsuario, $now)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update){ echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>