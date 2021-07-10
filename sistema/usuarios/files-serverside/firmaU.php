<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$temporalU = sqlValue($_POST["temporalU"], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$result1 = mysqli_query($horizonte, "SELECT firma_u from usuarios where temporal_u = $temporalU ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

mysqli_select_db($horizonte, $database_horizonte);
$result2 = mysqli_query($horizonte, "SELECT count(id_do) from documentos where nombre_do = $temporalU ") or die (mysqli_error($horizonte));
$row2 = mysqli_fetch_row($result2);

	echo $row2[0].'*';

mysqli_close($horizonte);
?>