<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$idP = sqlValue($_POST["idP"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);// para lab
$resultLab = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.id_paciente_vc = $idP and v.temporal_vc = 0 and c.id_tipo_concepto_to = 3 and v.estatus_vc > 6 and c.concepto_to!='' ") or die (mysqli_error($horizonte));
$rowLab = mysqli_fetch_row($resultLab);

mysqli_select_db($horizonte, $database_horizonte); //Para USG
$resultUSG = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.id_paciente_vc = $idP and v.temporal_vc = 0 and c.id_tipo_concepto_to = 4 and v.estatus_vc = 5 and c.concepto_to != '' and c.id_area_to = 58 ") or die (mysqli_error($horizonte));
$rowUSG = mysqli_fetch_row($resultUSG);

mysqli_select_db($horizonte, $database_horizonte); //Para IMG
$resultIMG = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.id_paciente_vc = $idP and c.id_tipo_concepto_to = 4 and v.estatus_vc >= 5 and c.id_area_to not in (29,58,85)") or die (mysqli_error($horizonte));
$rowIMG = mysqli_fetch_row($resultIMG);

mysqli_select_db($horizonte, $database_horizonte); //Para ENDO
$resultENDO = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.id_paciente_vc = $idP and c.id_tipo_concepto_to = 4 and v.estatus_vc = 5 and c.id_area_to = 29 ") or die (mysqli_error($horizonte));
$rowENDO = mysqli_fetch_row($resultENDO);

mysqli_select_db($horizonte, $database_horizonte); //Para COLPO
$resultCOLPO = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.id_paciente_vc = $idP and c.id_tipo_concepto_to = 4 and v.estatus_vc = 5 and c.id_area_to = 85") or die (mysqli_error($horizonte));
$rowCOLPO = mysqli_fetch_row($resultCOLPO);

mysqli_select_db($horizonte, $database_horizonte); //Para SERVICIOS
$resultSERV = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.id_paciente_vc = $idP and c.id_tipo_concepto_to = 2 and v.estatus_vc = 3 ") or die (mysqli_error($horizonte));
$rowSERV = mysqli_fetch_row($resultSERV);

mysqli_select_db($horizonte, $database_horizonte); //Para la primer consulta
$resultCON = mysqli_query($horizonte, "SELECT count(v.id_vc) from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.id_paciente_vc = $idP and c.id_tipo_concepto_to = 1 and v.estatus_vc = 6") or die (mysqli_error($horizonte));
$rowCON = mysqli_fetch_row($resultCON);

echo $rowLab[0].';*-'.$rowUSG[0].';*-'.$rowIMG[0].';*-'.$rowENDO[0].';*-'.$rowCOLPO[0].';*-'.$rowSERV[0].';*-'.$rowCON[0];

//Cerrar conexión a la Base de Datos
mysqli_close($horizonte);

?>