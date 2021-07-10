<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id = sqlValue($_POST["id"], "int", $horizonte); $valor = sqlValue($_POST["valor"], "int", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte); 
 $sql1 = "update sucursales_usuarios set acceso_su = $valor where id_su = $id limit 1";
 $update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));

 if (!$update1) { echo $sql1; }else{ echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>