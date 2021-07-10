<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id = sqlValue($_POST["id"], "int", $horizonte);

$result1 = mysqli_query($horizonte, "SELECT concat(nombre_u,' ',apaterno_u), temporal_u from usuarios where id_u = $id limit 1; ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

echo $row1[0].';_-}'.$row1[1];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>