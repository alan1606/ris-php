<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUs = sqlValue($_POST["idUs"], "int", $horizonte); //usuario a reiniciar
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $user = sqlValue($_POST["user"], "text", $horizonte);
 $opc = sqlValue($_POST["opc"], "int", $horizonte);
 
 if($opc==1){
 	mysqli_select_db($horizonte, $database_horizonte);
 	$sql = "UPDATE usuarios SET activo_u = 0 where id_u = $idUs limit 1";
 }
 else{
	mysqli_select_db($horizonte, $database_horizonte);
 	$sql = "UPDATE usuarios SET activo_u = 1 where id_u = $idUs limit 1";
 }
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>