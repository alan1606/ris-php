<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 mysqli_select_db($horizonte, $database_horizonte);
 $resultSu1 = mysqli_query($horizonte, "SELECT formato_co_cf, formato_nm_cf, formato_la_cf, formato_im_cf, formato_en_cf, formato_ul_cf, formato_cp_cf, formato_sm_cf from configuracion order by id_cf desc limit 1 ") or die (mysqli_error($horizonte));
 $rowSu1 = mysqli_fetch_row($resultSu1);

 echo $rowSu1[0].'{*]-[}'.$rowSu1[1].'{*]-[}'.$rowSu1[2].'{*]-[}'.$rowSu1[3]."{*]-[}".$rowSu1[4]."{*]-[}".$rowSu1[5]."{*]-[}".$rowSu1[6]."{*]-[}".$rowSu1[7];
	
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>