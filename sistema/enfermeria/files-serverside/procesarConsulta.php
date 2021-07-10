<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $st = sqlValue($_POST["st"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE venta_conceptos SET estatus_vc = $st, usuarioEdo2_e = $idU, fechaEdo2_e = $now where id_vc = $idC limit 1";
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT DATE_FORMAT(fecha_venta_vc,'%d/%c/%Y'), motivo_visita_vc, no_temp_vc from venta_conceptos where id_vc = $idC and tipo_concepto_vc = 1") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultS = mysqli_query($horizonte, "SELECT DATE_FORMAT(fecha_sv,'%d/%c/%Y') from signos_vitales where id_paciente_sv = $idP order by id_sv desc limit 1") or die (mysqli_error($horizonte));
 $rowS = mysqli_fetch_row($resultS);
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else { echo "1".";*-".$rowC[0].";*-".$rowS[0].";*-".$rowC[1].";*-".$rowC[2]; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>