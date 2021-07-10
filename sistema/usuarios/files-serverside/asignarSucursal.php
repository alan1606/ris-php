<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_sucu = sqlValue($_POST["id_sucu"], "int", $horizonte);
 $id_u = sqlValue($_POST["id_u"], "int", $horizonte);
 $tempo = sqlValue($_POST["tempo"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultS=mysqli_query($horizonte, "SELECT count(id_su) from sucursales_usuarios where aleatorio_su = $tempo and id_sucursal_su = $id_sucu") or die (mysqli_error($horizonte));
 $rowS = mysqli_fetch_row($resultS);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultP=mysqli_query($horizonte, "SELECT count(id_su) from sucursales_usuarios where aleatorio_su = $tempo and primaria_su = 1") or die (mysqli_error($horizonte));
 $rowP = mysqli_fetch_row($resultP); if($rowP[0]>0){$primario = 0;}else{$primario=1;}
 
 if($rowS[0]<1){
	 mysqli_select_db($horizonte, $database_horizonte);
	 $sql = "INSERT INTO sucursales_usuarios(id_sucursal_su, usuario_su, fecha_su, primaria_su, aleatorio_su) VALUES($id_sucu, $id_u, $now, $primario, $tempo)";
	 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		
	if(!$update){echo $sql; }else{ echo 1; }
 }else{echo 2;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>