<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");
//Generales
 $ref = sqlValue($_POST["ref"], "text", $horizonte);
 //$ref = "'"."20130320-3"."'";
  
 mysqli_select_db($horizonte, $database_horizonte);
 $resultR = mysqli_query($horizonte, "SELECT departamento_vc from venta_conceptos where referencia_vc = $ref and tipo_concepto_vc = 3 ") or die (mysqli_error($horizonte));
 $row_R = mysqli_fetch_assoc($resultR);
 $totalRows_R = mysqli_num_rows($resultR);
   
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>

 <?php
 $j=0;
 $p = array();
 $por='';
do {  
      $puteria[$j] = $row_R['departamento_vc'];

	  $j++;
} while ($row_R = mysqli_fetch_assoc($resultR));
$i=0;
for($i=0;$i<$j;$i++){
	$por=$por.$puteria[$i].";";
}
echo $por;

?>