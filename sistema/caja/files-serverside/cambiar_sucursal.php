<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_ns = sqlValue($_POST["id_ns"], "int", $horizonte);
 $id_u = sqlValue($_POST["id_u"], "int", $horizonte);
 $tempo = sqlValue($_POST["tempo"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
    
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE orden_venta set sucursal_ov = $id_ns where no_temp_ov = $tempo limit 1";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) {echo $sql;} else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>