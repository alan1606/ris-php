<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $metodo = sqlValue($_POST["metodo"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT id_me, metodo_me from metodos where id_me = $metodo ") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC1 = mysqli_query($horizonte, "SELECT count(id_ame) from asignar_metodo where id_metodo_ame = $metodo and aleatorio_ame = $noTemp") or die (mysqli_error($horizonte));
 $rowC1 = mysqli_fetch_row($resultC1);
	 
 $idM = sqlValue($rowC[0], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 if($rowC1[0]<1){
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $sql="INSERT INTO asignar_metodo(aleatorio_ame,id_metodo_ame,usuario_ame,fecha_ame)";
	 $sql.= "VALUES ($noTemp, $idM, $idU, $now)";
	 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	 if (!$update) { echo $sql; }else{ echo 1; }
 }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>