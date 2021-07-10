<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioP"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreP"], "text", $horizonte);
 //$idDepartamento = sqlValue($_POST["sexoP"], "int", $horizonte);
 $clave = sqlValue($_POST["telmovilP"], "text", $horizonte);
 $precioM = sqlValue($_POST["telparticularP"], "double", $horizonte);
 $idArea = sqlValue($_POST["areasE"], "int", $horizonte);
 $precioF = sqlValue($_POST["edadP"], "double", $horizonte);
 $idP = sqlValue($_POST["idPacienteN"], "int", $horizonte);
 $formato = sqlValue($_POST["miDiagnostico"], "text", $horizonte);
  
 $sql = "UPDATE estudios SET clave_est = $clave, nombre_est = $nombre, precio_est = $precioF, precio_maquila_est = $precioM, depto_est = 1, area_est = $idArea, formato = $formato where id_est = $idP limit 1";

mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if (!$insertar) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>