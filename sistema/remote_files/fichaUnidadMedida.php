<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

 $id_um = sqlValue($_POST["id_um"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "SELECT unidad_un, abreviacion_un from unidades where id_un = $id_um ") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);

 $datos = $row[0]."*}".$row[1];

 echo $datos;
 
 //Cerrar conexión a la Base de Datos
mysqli_close($horizonte);
?>