<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_u = sqlValue($_POST["id_u"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE usuarios set validado_u = 1, usuarioNuevo_u = 0 where id_u = $id_u limit 1;";
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if(!$update){ echo $sql; }else{ echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>