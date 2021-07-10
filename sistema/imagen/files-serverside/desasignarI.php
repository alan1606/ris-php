<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["idVC"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE venta_conceptos SET id_radiologo_externo = 0, usuario_transfiere_vc = NULL, fecha_transfiere_vc = NULL where id_vc = $idE limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>