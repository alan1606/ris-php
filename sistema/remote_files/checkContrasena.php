<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

$usuario = sqlValue($_POST["user"], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$result1 = mysqli_query($horizonte, "SELECT usuarioNuevo_u from usuarios where usuario_u = $usuario") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

if($row1[0]==1){ $contrasena = strtoupper($_POST["contrasena"]);}
else{ $contrasena = $_POST["contrasena"];}

mysqli_select_db($horizonte, $database_horizonte);
$result2 = mysqli_query($horizonte, "SELECT contrasena_u from usuarios where usuario_u = $usuario") or die (mysqli_error($horizonte));
$row2 = mysqli_fetch_row($result2);

$contrasena_hashed = $row2[0];

if(password_verify($contrasena, $contrasena_hashed)){ $entra = 1; }else{ $entra = 0;}

if($entra>0){ echo 'true'; }
else{ echo 'false'; }

mysqli_close($horizonte);
?>