<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioNM"], "int", $horizonte);
 $idEQ = sqlValue($_GET["idUM"], "int", $horizonte);
 $modelo = sqlValue($_POST["modeloE"], "text", $horizonte);
 $marca = sqlValue($_POST["marcaE"], "text", $horizonte);
 $descripcion = sqlValue($_POST["descripcionE"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE catalogo_equipos set modelo_eq = $modelo, marca_eq = $marca, descripcion_eq = $descripcion, usuario_eq = $idUsuario, fecha_eq = $now where id_eq = $idEQ limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>