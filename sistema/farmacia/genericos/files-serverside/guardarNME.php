<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $nombre = sqlValue($_POST["nombre_nmE"], "text", $horizonte);
 $apaterno = sqlValue($_POST["apaterno_nmE"], "text", $horizonte);
 $amaterno = sqlValue($_POST["amaterno_nmE"], "text", $horizonte);
 $idU = sqlValue($_POST["id_u_nm"], "int", $horizonte);
 $clave = sqlValue($_POST["clave_nmE"], "text", $horizonte);
 $telefono = sqlValue($_POST["telefono_nmE"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte); 
 $sql="INSERT INTO usuarios(nombre_u,apaterno_u,amaterno_u,clave_u,tCelular_u, idUsuarioR_u, fecha_ingreso_u, idPuesto_u, foraneo_u, especialidad_u) VALUES ($nombre, $apaterno, $amaterno, $clave, $telefono, $idU, $now, 1, 1, 1)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>