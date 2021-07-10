<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUser_esc"], "int", $horizonte);
 $idEscuela = sqlValue($_POST["idEscuela"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombre_esc"]), "text", $horizonte);
 $nivel = sqlValue($_POST["nivel_esc"], "int", $horizonte);
 $sector = sqlValue($_POST["sector_esc"], "text", $horizonte);
 $estado = sqlValue($_POST["estado_esc"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); //foto_u, firma_u, $foto, $firmaU, idOcupacion_u, $ocupacion, 
 $sql = "UPDATE catalogo_escuelas set nombre_e = $nombre, nivel_e = $nivel, control_e = $sector, entidad_e = $estado where id_e = $idEscuela limit 1";
  //echo $sql;
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if(!$update){echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>