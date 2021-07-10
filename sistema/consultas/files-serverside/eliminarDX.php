<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idDX = sqlValue($_POST["idDX"], "int", $horizonte); $idC = sqlValue($_POST["idC"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $sql = "delete from dx_consultas where id_dxc = $idDX and id_c_dxc = $idC limit 1";
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
 
if(!$update){ echo $sql; }else{
	mysqli_select_db($horizonte, $database_horizonte); 
 	$resultC=mysqli_query($horizonte, "SELECT count(id_dxc) from dx_consultas where id_c_dxc = $idC and primario_dxc") or die (mysqli_error($horizonte));
 	$rowC = mysqli_fetch_row($resultC);
	
	if($rowC[0]<1){
		mysqli_select_db($horizonte, $database_horizonte);
		$sql4 = "UPDATE dx_consultas SET primario_dxc = 1 where id_c_dxc = $idC limit 1";
		$update4 = mysqli_query($horizonte, $sql4) or die (mysqli_error($horizonte));
		if (!$update4) { echo $sql4; }else { echo 1; }
	} else{echo 1;}
}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>