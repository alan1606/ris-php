<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $quien = sqlValue($_POST["quien"], "int", $horizonte);
 $control = sqlValue($_POST["control"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "SELECT id, title from events where a_quien = $control and id_quien = $quien order by id desc limit 1") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);
 
 echo $row[0].'}[-]{'.$row[1];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>