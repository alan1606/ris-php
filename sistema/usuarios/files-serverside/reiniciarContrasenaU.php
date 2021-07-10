<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUs = sqlValue($_POST["idUs"], "int", $horizonte); //usuario a reiniciar
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultF = mysqli_query($horizonte, "SELECT usuario_u from usuarios where id_u = $idUs limit 1 ") or die (mysqli_error($horizonte));
 $rowF = mysqli_fetch_row($resultF);
 
 $hashed_password = sqlValue(password_hash($rowF[0], PASSWORD_DEFAULT), "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE usuarios SET contrasena_u = $hashed_password where id_u = $idUs limit 1";  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>