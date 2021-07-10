<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
//$result1 = mysqli_query($horizonte, "SELECT MAX(Id) from jqcalendar limit 1 ") or die (mysqli_error($horizonte));
$result1 = mysqli_query($horizonte, "SELECT AUTO_INCREMENT from information_schema.TABLES WHERE TABLE_SCHEMA = '$database_horizonte' AND TABLE_NAME = 'jqcalendar'") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

echo $row1[0];

mysqli_close($horizonte);
?>