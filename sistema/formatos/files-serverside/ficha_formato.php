<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_f = sqlValue($_POST["id_f"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $resultR2 = mysqli_query($horizonte, "SELECT formato_fo from formatos where id_fo = $id_f");
 $rowR2 = mysqli_fetch_row($resultR2);

 echo $rowR2[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>