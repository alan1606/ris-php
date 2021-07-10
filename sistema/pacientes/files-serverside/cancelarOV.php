<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $refe = sqlValue($_POST["refe"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $sql = "delete from venta_conceptos where referencia_vc = $refe";
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update){ echo $sql; }
 else{
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $sql1 = "delete from pagos_ov where referencia_pag = $refe";
	 $update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
	 
	 if (!$update1){ echo $sql1; }
 	 else{
		 mysqli_select_db($horizonte, $database_horizonte); 
		 $sql2 = "delete from orden_venta where referencia_ov = $refe limit 1";
		 $update2 = mysqli_query($horizonte, $sql2) or die (mysqli_error($horizonte));
		 
		 if (!$update2){ echo $sql2; }
 	 	else{
	 		echo 1;
		}
	 }
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>