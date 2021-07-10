<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["id_u"], "int", $horizonte);
 $modelo = sqlValue(mb_strtoupper($_POST["nombre"]), "text", $horizonte);
 $marca = sqlValue(mb_strtoupper($_POST["marca"]), "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO catalogo_equipos (usuario_eq, modelo_eq, marca_eq, fecha_eq)";
 $sql.= "VALUES ($idUsuario, $modelo, $marca, $now)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if(!$update){ echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>