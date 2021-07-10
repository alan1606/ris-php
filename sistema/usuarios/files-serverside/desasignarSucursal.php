<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id = sqlValue($_POST["id"], "int", $horizonte);
 mysqli_select_db($horizonte, $database_horizonte);
 $resultS=mysqli_query($horizonte, "SELECT primaria_su, aleatorio_su from sucursales_usuarios where id_su = $id") or die (mysqli_error($horizonte));
 $rowS = mysqli_fetch_row($resultS); $aleat = sqlValue($rowS[1], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $sql = "delete from sucursales_usuarios where id_su = $id limit 1";
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) { echo $sql; }else{
	if($rowS[0]==1){
		mysqli_select_db($horizonte, $database_horizonte); 
 		$sql1 = "update sucursales_usuarios set primaria_su = 1 where aleatorio_su = $aleat order by id_su asc limit 1";
 		$update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
		
		if (!$update1) { echo $sql1; }else{ echo 1;}
	}else{echo 1;}
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>