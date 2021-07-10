<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $idDX = sqlValue($_POST["idDX"], "int", $horizonte); 
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultCa = mysqli_query($horizonte, "SELECT count(id_dxc) from dx_consultas where id_c_dxc = $idC and primario_dxc = 1") or die (mysqli_error($horizonte));
 $rowCa = mysqli_fetch_row($resultCa); if($rowCa[0]==0){ $prim = 1; }else{$prim = 0;}
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $result = mysqli_query($horizonte, "SELECT count(id_dxc) from dx_consultas where id_c_dxc = $idC and id_dx_dxc = $idDX") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);
 
 if($row[0]<1){
	mysqli_select_db($horizonte, $database_horizonte); 
	 $sql="INSERT INTO dx_consultas(id_c_dxc,id_p_dxc,id_u_dxc,id_dx_dxc,fecha_dxc, primario_dxc) VALUES ($idC, $idP, $idU, $idDX, $now, $prim)";
	 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		
	 if (!$update) { echo $sql; }else{ echo 1; } 
 }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>