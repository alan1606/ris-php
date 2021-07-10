<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idConcepto = sqlValue($_POST["idConcepto"], "int", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte); 
 	$sql = "delete from venta_conceptos where id_vc = $idConcepto limit 1";
	//$sql_1 = "delete from venta_conceptos_1 where id_vc = $idConcepto limit 1";
	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ 
	echo 1; 
	//$update_1 = mysqli_query($horizonte, $sql_1) or die (mysqli_error($horizonte));
}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>