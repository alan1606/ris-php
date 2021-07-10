<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");
//Generales
 $ref = sqlValue($_POST["ref"], "text", $horizonte);
 //$ref = "'"."20130319-2"."'";
 
 mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "SELECT sum(precio_vc) from venta_conceptos where referencia_vc = $ref and tipo_concepto_vc = 2 ") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);
  
 $total = $row[0];
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultR = mysqli_query($horizonte, "SELECT precio_vc from venta_conceptos where referencia_vc = $ref and tipo_concepto_vc = 2 ") or die (mysqli_error($horizonte));
 //$rowR = mysqli_fetch_row($resultR);
 $row_R = mysqli_fetch_assoc($resultR);
 $totalRows_R = mysqli_num_rows($resultR);
  
 //$subtotales = $rowR[0];
 
 //echo $total;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>

 <?php
 $j=0;
 $p = array();
 $por="";
do {  
      $puteria[$j] = $row_R['precio_vc'];
	  $p[$j]=$puteria[$j]*100/$total;
	  //echo $p[$j];
	  //echo "</br>";
	  $j++;
} while ($row_R = mysqli_fetch_assoc($resultR));
$i=0;
for($i=0;$i<$j;$i++){
	$por=$por.$p[$i].";";
}
echo $por;

?>