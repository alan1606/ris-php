<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $username = sqlValue($_GET['username'], "text", $horizonte);
 $id_user_update = sqlValue($_GET["id_user_update"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 
 if(isset($_GET["id_user_update"])){
 	$result = mysqli_query($horizonte, "SELECT count(id_u) FROM usuarios where usuario_u = $username and id_u != $id_user_update") or die(mysqli_error($horizonte));
 }else{
 	$result = mysqli_query($horizonte, "SELECT count(id_u) FROM usuarios where usuario_u = $username") or die(mysqli_error($horizonte));
 }
 
 $row = mysqli_fetch_row($result);
 	
if($row[0]>0){ http_response_code(418); }//si nadie lo tiene
else{ http_response_code(200); } //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>