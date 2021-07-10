<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUser_esc"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombre_esc"]), "text", $horizonte);
 $nivel = sqlValue($_POST["nivel_esc"], "int", $horizonte);
 $sector = sqlValue($_POST["sector_esc"], "text", $horizonte);
 $estado = sqlValue($_POST["estado_esc"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); //foto_u, firma_u, $foto, $firmaU, idOcupacion_u, $ocupacion, 
 $sql = "INSERT INTO catalogo_escuelas(nombre_e, nivel_e, control_e, entidad_e, usuario_e, fecha_e)";
 $sql.= "VALUES ($nombre, $nivel, $sector, $estado, $idUsuario, $now)";
  //echo $sql;
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if(!$update){echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>