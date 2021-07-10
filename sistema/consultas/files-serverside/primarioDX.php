<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idDX = sqlValue($_POST["idDX"], "int", $horizonte);
 $id_c = sqlValue($_POST["idC"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql1 = "UPDATE dx_consultas SET primario_dxc = 0 where id_c_dxc = $id_c";
 $update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
 if (!$update1) { echo $sql1; }else{ 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$sql4 = "UPDATE dx_consultas SET primario_dxc = 1 where id_dxc = $idDX limit 1";
 	$update4 = mysqli_query($horizonte, $sql4) or die (mysqli_error($horizonte));
 	if(!$update4) { echo $sql4; }else { echo 1; }
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>