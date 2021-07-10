<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_consulta = sqlValue($_POST["id_vc"], "int", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte); 
 $result1= mysqli_query($horizonte, "SELECT count(id_h) from hospitalizacion where id_consulta_vc_h = $id_consulta") or die (mysqli_error($horizonte));
 $row1 = mysqli_fetch_row($result1);
 
 echo $row1[0];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>