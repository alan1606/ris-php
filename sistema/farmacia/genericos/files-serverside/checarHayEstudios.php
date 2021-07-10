<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 $tipoItem = sqlValue($_POST["tipoItem"], "int", $horizonte);
 $departamento = sqlValue($_POST["departamento"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 if($_POST["departamento"]==0){
	 $resultC = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where no_temp_vc = $noTemp and tipo_concepto_vc =  $tipoItem") or die (mysqli_error($horizonte));
 }else{
	 $resultC = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where no_temp_vc = $noTemp and tipo_concepto_vc =  $tipoItem and departamento_vc = $departamento") or die (mysqli_error($horizonte));
 }
 $rowC = mysqli_fetch_row($resultC);
		
echo $rowC[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>