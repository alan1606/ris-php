<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $nombre = sqlValue($_POST["nombreNM"], "text", $horizonte);
 $apaterno = sqlValue($_POST["apaternoNM"], "text", $horizonte);
 $amaterno = sqlValue($_POST["amaternoNM"], "text", $horizonte);
 $identificador = sqlValue($_POST["idNM"], "text", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioNM"], "int", $horizonte);
 

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO usuarios (idUsuarioR_u, nombre_u, apaterno_u, amaterno_u, foraneo_u, fecha_ingreso_u, clave_u, idPuesto_u)";
 $sql.= "VALUES ($idUsuario, $nombre, $apaterno, $amaterno, 1, now(), $identificador, 1 )";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else{ 
 	echo 'ok';
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>