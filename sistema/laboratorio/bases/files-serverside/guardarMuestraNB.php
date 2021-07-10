<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $muestra = sqlValue($_POST["muestra"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT id_mu, id_condicion_mu from muestras where id_mu = $muestra ") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC1 = mysqli_query($horizonte, "SELECT count(id_am) from asignar_muestra where id_muestra_am = $muestra and aleatorio_am = $noTemp") or die (mysqli_error($horizonte));
 $rowC1 = mysqli_fetch_row($resultC1);
	 
 $idM = sqlValue($rowC[0], "int", $horizonte);
 $idCondicion = sqlValue($rowC[1], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 if($rowC1[0]<1){
 	mysqli_select_db($horizonte, $database_horizonte); 
 	$sql="INSERT INTO asignar_muestra(aleatorio_am,id_muestra_am,usuario_am,fecha_am)";
 	$sql.= "VALUES ($noTemp, $idM, $idU, $now)";
	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
    if (!$update) { echo $sql; }else{ echo 1; }
 }else{echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>