<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idU = sqlValue($_POST["id_u"], "int", $horizonte);
 $sexo = sqlValue($_POST["sexo"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombre"]), "text", $horizonte);
 $apaterno = sqlValue(mb_strtoupper($_POST["apaterno"]), "text", $horizonte);
 $amaterno = sqlValue(mb_strtoupper($_POST["amaterno"]), "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "SELECT idSucursal_u from usuarios where id_u = $idU limit 1") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);
 
 $id_sucu = sqlValue($row[0], "int", $horizonte);
 if($_POST["sexo"]==1){$id_titulo_u = 3;}else{$id_titulo_u = 2;}
 
 mysqli_select_db($horizonte, $database_horizonte);
 $result1 = mysqli_query($horizonte, "SELECT max(id_u) from usuarios") or die (mysqli_error($horizonte));
 $row1 = mysqli_fetch_row($result1); $sum = $row1[0]+1; $usuario = sqlValue('USUARIO'.$sum, "text", $horizonte);
 
 $hashed_password = sqlValue(password_hash('USUARIO'.$sum, PASSWORD_DEFAULT), "text", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO usuarios(nombre_u, apaterno_u, amaterno_u, idSucursal_u, sexo_u, idEscolaridad_u, idDepartamento_u, idArea_u, fecha_ingreso_u, idUsuarioR_u, idPuesto_u, id_titulo_u, acceso_u, multisucursal_u, usuario_u, contrasena_u) values($nombre, $apaterno, $amaterno, $id_sucu, $sexo, 6, 4, 4, $now, $idU, 1, $id_titulo_u, 7, 0, $usuario, $hashed_password)";
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if(!$update){echo $sql;} else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>