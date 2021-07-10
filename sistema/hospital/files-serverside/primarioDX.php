<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idDX = sqlValue($_POST["idDX"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT id_hospitalizacion_dxh from dx_hospital where id_dxh = $idDX") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC); $tempo_dx = sqlValue($rowC[0], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql1 = "UPDATE dx_hospital SET primario_dxh = 0 where id_hospitalizacion_dxh = $tempo_dx";
 $update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
 if (!$update1) { echo $sql1; }else{ 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$sql4 = "UPDATE dx_hospital SET primario_dxh = 1 where id_dxh = $idDX limit 1";
 	$update4 = mysqli_query($horizonte, $sql4) or die (mysqli_error($horizonte));
 	if(!$update4) { echo $sql4; }else { echo 1; }
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>