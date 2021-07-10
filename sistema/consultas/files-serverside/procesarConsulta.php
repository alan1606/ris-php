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
 $resultC=mysqli_query($horizonte, "SELECT DATE_FORMAT(v.fecha_venta_vc,'%d/%c/%Y'), v.motivo_visita_vc, v.no_temp_vc from venta_conceptos v where v.id_vc = $idC") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultS = mysqli_query($horizonte, "SELECT DATE_FORMAT(fecha_sv,'%d/%c/%Y %H:%i:%s'), id_usuario_sv, oximetria_sv, a_ocular_sv, r_verbal, r_motriz from signos_vitales where id_paciente_sv = $idP order by id_sv desc limit 1") or die (mysqli_error($horizonte));
 $rowS = mysqli_fetch_row($resultS); $us_sv = sqlValue($rowS[1], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultUs = mysqli_query($horizonte, "SELECT usuario_u from usuarios where id_u = $us_sv") or die (mysqli_error($horizonte));
 $rowUs = mysqli_fetch_row($resultUs);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultPa = mysqli_query($horizonte, "SELECT nombre_p, apaterno_p, amaterno_p from pacientes where id_p = $idP") or die (mysqli_error($horizonte));
 $rowPa = mysqli_fetch_row($resultPa);
 $nombreP = $rowPa[0].' '.$rowPa[1].' '.$rowPa[2];
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else { echo "1".";*-".$rowC[0].";*-".$rowS[0].";*-".$rowC[1].";*-".$rowC[2].";*-".$nombreP.";*-".$rowUs[0].";*-".$rowS[2].";*-".$rowS[3].";*-".$rowS[4].";*-".$rowS[5]; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>