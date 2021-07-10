<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idU"], "int", $horizonte);
 if(isset($_POST["idSucursal"]) and $_POST["idSucursal"] != ''){
	 $idSucursal = sqlValue($_POST["idSucursal"], "int", $horizonte);
	 
	 mysqli_select_db($horizonte, $database_horizonte); 
 	 $resultR = mysqli_query($horizonte, "SELECT formato_im_su from sucursales where id_su = $idSucursal");
 	 $rowR = mysqli_fetch_row($resultR);
	 
	 if($rowR[0]==''){
		 //Entonces checamos si hay un formato desde la configuración principal
		 mysqli_select_db($horizonte, $database_horizonte); 
		 $resultR1 = mysqli_query($horizonte, "SELECT formato_im_cf from configuracion order by id_cf desc limit 1");
		 $rowR1 = mysqli_fetch_row($resultR1);

		 if($rowR[0]==''){echo '';}else{echo $rowR1[0];}
	 }else{ echo $rowR[0];}
	 
 }else{
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $resultR1 = mysqli_query($horizonte, "SELECT formato_im_cf from configuracion order by id_cf desc limit 1");
	 $rowR1 = mysqli_fetch_row($resultR1);

	 echo $rowR1[0];
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>