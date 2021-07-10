<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idDX = sqlValue($_POST["idDX"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $idC = sqlValue($_POST["idC"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO dx_consultas (id_p_dxC, id_dx_dxC, id_u_dxC, id_c_dxC, fecha_dxC)";
 $sql.= "VALUES ($idP, $idDX, $idU, $idC, now())";
  
$update = mysqli_query($horizonte, $sql);
	
if (!$update) {
 	echo $sql;
 }else{ 
 	echo "ok";
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>