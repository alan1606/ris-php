<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

$idE=sqlValue($_POST["idE"],"int"); //en VC

mysqli_select_db($horizonte, $database_horizonte);
$result0 = mysqli_query($horizonte, "SELECT referencia_vc from venta_conceptos where id_vc = $idE limit 1") or die (mysqli_error($horizonte));
$row0 = mysqli_fetch_row($result0); $referencia_ov = sqlValue($row0[0], "text", $horizonte);
 
mysqli_select_db($horizonte, $database_horizonte);
$result2 = mysqli_query($horizonte, "SELECT s.id_su, s.no_temp_su from orden_venta o left join sucursales s on s.id_su = o.sucursal_ov where o.referencia_ov = $referencia_ov") or die (mysqli_error($horizonte));
$row2 = mysqli_fetch_row($result2); $id_suc = sqlValue($row2[0], "int", $horizonte); $ale_suc = sqlValue($row2[1], "text", $horizonte);
 
mysqli_select_db($horizonte, $database_horizonte);
$resultE=mysqli_query($horizonte, "SELECT count(id_do) from documentos where aleatorio_do = $ale_suc and tipo_quien_do = 2 and nombre_do = 'ENCABEZADO' and que_es_do = 'MEMBRETE RESULTADOS IMAGENOLOGIA'") or die (mysqli_error($horizonte));
$rowE = mysqli_fetch_row($resultE);

mysqli_select_db($horizonte, $database_horizonte);
$resultP=mysqli_query($horizonte, "SELECT count(id_do) from documentos where aleatorio_do = $ale_suc and tipo_quien_do = 2 and nombre_do = 'PIE' and que_es_do = 'MEMBRETE RESULTADOS IMAGENOLOGIA'") or die (mysqli_error($horizonte));
$rowP = mysqli_fetch_row($resultP);

if($rowE[0]>0 and $rowP[0]>0){$ep = 1;}else{$ep = 0;}

echo $ep;

//Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>