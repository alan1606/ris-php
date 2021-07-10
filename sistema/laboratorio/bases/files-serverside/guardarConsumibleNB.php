<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $consumible = sqlValue($_POST["consumible"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT id_i, item_i from inventario where id_i = $consumible ") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
	 
 $idI = sqlValue($rowC[0], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC1 = mysqli_query($horizonte, "SELECT count(id_ac) from asignar_consumibles where id_item_ac = $consumible and aleatorio_ac = $noTemp") or die (mysqli_error($horizonte));
 $rowC1 = mysqli_fetch_row($resultC1);
 
 if($rowC1[0]<1){
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $sql="INSERT INTO asignar_consumibles(aleatorio_ac,id_item_ac,usuario_ac,fecha_ac)";
	 $sql.= "VALUES ($noTemp, $idI, $idU, $now)";
	 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));	
	 if (!$update) { echo $sql; }else{ echo 1; }
 }else{echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>