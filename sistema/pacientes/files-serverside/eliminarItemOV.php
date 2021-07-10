<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id = sqlValue($_POST["id"], "int", $horizonte);
 
mysqli_select_db($horizonte, $database_horizonte); 
$sql = "delete from venta_conceptos where id_vc = $id limit 1";
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  
	echo 1; 
	/*mysqli_select_db($horizonte, $database_horizonte); 
	$sql1 = "delete from pagos_ov where id_vc_pag = $id";
	$update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
		
	if (!$update1) { echo $sql1; }else{  
		echo 1; 
	}*/
}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>