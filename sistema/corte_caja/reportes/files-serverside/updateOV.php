<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $ref = sqlValue($_POST["ref"], "text", $horizonte);
 //$ref = sqlValue('20130321-5', "text", $horizonte);
  
mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "SELECT sum(pago_pag), total_pag from pagos_ov where referencia_pag = $ref ") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);
 
 $old_abonado = $row[0];
 $old_saldo = $row[1]-$old_abonado;
 $new_abonado = $old_abonado;
 $new_saldo = $old_saldo;
  //echo $new_abonado;

$sql="UPDATE orden_venta SET abonado_ov = $new_abonado, saldo_ov = $new_saldo where referencia_ov = ".$ref.";";
	
$insertar2 = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
if (!$insertar2) {echo $sql;}
else{echo "ok";}
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>