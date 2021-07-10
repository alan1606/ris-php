<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
$resultP = mysqli_query($horizonte, "SELECT nombre_sistema_cf, nombre_db_cf, id_cf, id_cf, periodo_membresia_cf, dias_avisar_membresia_cf, tecla_cf, formato_co_cf, formato_nm_cf, formato_la_cf, formato_im_cf, formato_en_cf, formato_ul_cf, formato_cp_cf, formato_sm_cf, link_sistema_local, link_pacs_local, link_sistema_externo, link_pacs_externo, sitio_web from configuracion order by id_cf desc limit 1 ") or die (mysqli_error($horizonte));
$rowP = mysqli_fetch_row($resultP);

$datos = $rowP[0].'};['.$rowP[1].'};['.$rowP[2].'};['.$rowP[3].'};['.$rowP[4].'};['.$rowP[5].'};['.$rowP[6].'};['.$rowP[7].'};['.$rowP[8].'};['.$rowP[9].'};['.$rowP[10].'};['.$rowP[11].'};['.$rowP[12].'};['.$rowP[13].'};['.$rowP[14].'};['.$rowP[15].'};['.$rowP[16].'};['.$rowP[17].'};['.$rowP[18].'};['.$rowP[19];

echo $datos;

mysqli_close($horizonte);
?>