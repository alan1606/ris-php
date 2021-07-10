<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $base = sqlValue($_POST["base"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $idE = sqlValue($_POST["idE"], "int", $horizonte);

	 mysqli_select_db($horizonte, $database_horizonte); 
	 $resultC = mysqli_query($horizonte, "SELECT id_b, base_b from bases where id_b = $base ") or die (mysqli_error($horizonte));
	 $rowC = mysqli_fetch_row($resultC);
	 
 $idB = sqlValue($rowC[0], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte); 
$sql="INSERT INTO asignar_bases(aleatorio_ab,id_base_ab,usuario_reg_ab,fecha_reg_ab,id_estudio_ab)";
$sql.= "VALUES ($noTemp, $idB, $idU, $now, $idE)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>