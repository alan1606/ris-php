<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id = sqlValue($_POST["id"], "int", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "SELECT id, title, description, estatus, a_quien, id_quien, color from events where id = $id limit 1") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);
 
 echo $row[0].'}[-]{'.$row[1].'}[-]{'.$row[2].'}[-]{'.$row[3].'}[-]{'.$row[4].'}[-]{'.$row[5].'}[-]{'.$row[6];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>