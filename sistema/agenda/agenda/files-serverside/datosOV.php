<?php
require("../../../Connections/sigma.php");
require("../../../funciones/php/values.php");
//Generales
 $ref = sqlValue($_POST["ref"], "text", $horizonte);
 //$ref = "'"."20130318-2"."'";
 
 mysql_select_db($database_sigma, $sigma);
 $resultR = mysqli_query($horizonte, "SELECT subtotal_consulta_ov, subtotal_servicios_ov, subtotal_estudios_ov from orden_venta where referencia_ov = $ref ", $sigma) or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR);
 
 mysql_select_db($database_sigma, $sigma);
 $resultAbonadoC = mysqli_query($horizonte, "SELECT sum(pago_pag) from pagos_ov where referencia_pag = $ref and tipo_concepto_pag = 1 " , $sigma) or die (mysqli_error($horizonte));
 $rowAbonadoC = mysqli_fetch_row($resultAbonadoC);
 
 $abonadoC=$rowAbonadoC[0];
 
 mysql_select_db($database_sigma, $sigma);
 $resultAbonadoS = mysqli_query($horizonte, "SELECT sum(pago_pag) from pagos_ov where referencia_pag = $ref and tipo_concepto_pag = 2 " , $sigma) or die (mysqli_error($horizonte));
 $rowAbonadoS = mysqli_fetch_row($resultAbonadoS);
 
 $abonadoS=$rowAbonadoS[0];
 
 mysql_select_db($database_sigma, $sigma);
 $resultAbonadoE = mysqli_query($horizonte, "SELECT sum(pago_pag) from pagos_ov where referencia_pag = $ref and tipo_concepto_pag = 3 " , $sigma) or die (mysqli_error($horizonte));
 $rowAbonadoE = mysqli_fetch_row($resultAbonadoE);
 
 $abonadoE=$rowAbonadoE[0];
 
 $subtotales = $rowR[0].";".$rowR[1].";".$rowR[2].";".$abonadoC.";".$abonadoS.";".$abonadoE;
 echo $subtotales;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($sigma);
?>