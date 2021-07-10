<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioNI"], "int", $horizonte);
 $id = sqlValue($_GET["idPr"], "int", $horizonte);
 $presentacion = sqlValue($_POST["presentacionC"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE catalogo_presentaciones set presentacion_cp = $presentacion, usuario_cp = $idUsuario, fecha_cp = $now where id_cp = $id limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo 1;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>