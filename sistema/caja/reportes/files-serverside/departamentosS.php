<?php
require("../../../Connections/sigma.php");
require("../../../funciones/php/values.php");
//Generales
 $ref = sqlValue($_POST["ref"], "text", $horizonte);
 $ref = "'"."20130319-2"."'";
  
 mysql_select_db($database_sigma, $sigma);
 $resultR = mysqli_query($horizonte, "SELECT departamento_vc from venta_conceptos where referencia_vc = $ref and tipo_concepto_vc = 2 ", $sigma) or die (mysqli_error($horizonte));
 $row_R = mysqli_fetch_assoc($resultR);
 $totalRows_R = mysqli_num_rows($resultR);
  
 //$subtotales = $rowR[0];
 
 //echo $total;

 $j=0;
 $p = array();
 $por="";
do {  
      $puteria[$j] = $row_R['departamento_vc'];
	  //$p[$j]=$puteria[$j]*100/$total;
	  //echo $p[$j];
	  //echo "</br>";
	  $j++;
} while ($row_R = mysqli_fetch_assoc($resultR));
$i=0;
for($i=0;$i<$j;$i++){
	$por=$por.$puteria[$i].";";
}
echo $por;

//Cerrar conexión a la Base de Datos
 mysqli_close($sigma);
?>