<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["idE"], "int", $horizonte);
 $id_radiologo = sqlValue($_POST["radiologo"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE venta_conceptos SET id_radiologo_externo = $id_radiologo, usuario_transfiere_vc = $idU, fecha_transfiere_vc = $now where id_vc = $idE limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else {
	 echo 1;
}
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>