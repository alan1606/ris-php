<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id = sqlValue($_POST["id_e"], "int", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "SELECT nombre_e, nivel_e, control_e, entidad_e from catalogo_escuelas where id_e = $id limit 1") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);
 
 echo $row[0].'}[-]{'.$row[1].'}[-]{'.$row[2].'}[-]{'.$row[3];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>