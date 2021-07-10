<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

$curp = sqlValue($_POST["curpPaciente"], "text", $horizonte); 

mysqli_select_db($horizonte, $database_horizonte);

$result1 = mysqli_query($horizonte, "SELECT nombre_p, apaterno_p, amaterno_p from pacientes where curp_p = $curp ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

$nombreP = $row1[0].' '.$row1[1].' '.$row1[2];

echo $nombreP;

mysqli_close($horizonte);
?>