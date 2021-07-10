<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idMED = sqlValue($_POST["idMED"], "int", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultI = mysqli_query($horizonte, "SELECT descripcion_to from conceptos where id_to = $idMED limit 1 ") or die (mysqli_error($horizonte));
 $rowI = mysqli_fetch_row($resultI); $indi = sqlValue($rowI[0], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $result = mysqli_query($horizonte, "SELECT count(id_mr) from medicamentos_receta where id_co_mr = $idC and id_med_mr = $idMED") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);
 
 if($row[0]<1){
	 mysqli_select_db($horizonte, $database_horizonte); 
	 $sql="INSERT INTO medicamentos_receta(id_p_mr,id_u_mr,id_med_mr,fecha_mr, id_co_mr) VALUES ($idP, $idU, $idMED, $now, $idC)";
	  
	 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		
	 if (!$update) { echo $sql; }else{  echo 1; }
 }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>