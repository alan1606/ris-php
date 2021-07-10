<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

 $idUsuario = sqlValue($_SESSION['id'], "int", $horizonte);
 $idSucursal = sqlValue($_SESSION['MM_Usersucu'], "int", $horizonte);
 $idE = sqlValue($_POST["idE"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultR2 = mysqli_query($horizonte, "SELECT formato from conceptos where id_to = $idE");
 $rowR2 = mysqli_fetch_row($resultR2);

 if($rowR2[0]==''){
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $resultR = mysqli_query($horizonte, "SELECT formato_sm_su from sucursales where id_su = $idSucursal");
	 $rowR = mysqli_fetch_row($resultR);

	 if($rowR[0]==''){
		 //Entonces checamos si hay un formato desde la configuración principal
		 mysqli_select_db($horizonte, $database_horizonte); 
		 $resultR1 = mysqli_query($horizonte, "SELECT formato_sm_cf from configuracion order by id_cf desc limit 1");
		 $rowR1 = mysqli_fetch_row($resultR1);

		 if($rowR[0]==''){echo '';}else{echo $rowR1[0];}
	 }else{ echo $rowR[0];} 
 }else{
	 echo $rowR2[0];
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>