<?php
require("../../Connections/horizonte.php");
require("../../Connections/ipacs.php");
require("../../funciones/php/values.php");

 $idVC = sqlValue($_POST["idVC"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $result1 = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where (interpretacion_vc is not NULL or interpretacion_vc != '') and id_vc = $idVC") or die (mysqli_error($horizonte)); $row1 = mysqli_fetch_row($result1);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $result1a = mysqli_query($horizonte, "SELECT id_pacs from venta_conceptos where id_vc = $idVC") or die (mysqli_error($horizonte)); $row1a = mysqli_fetch_row($result1a);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $result2 = mysqli_query($horizonte, "SELECT count(id_do) from documentos where id_quien_do = $idVC and tipo_quien_do = 4 and que_es_do = 'FOTOGRAFIA'") or die (mysqli_error($horizonte)); $row2 = mysqli_fetch_row($result2);
 
 mysqli_select_db($ipacs, $database_ipacs); 
 $result3 = mysqli_query($ipacs, "SELECT count(pk) from patient where pat_id = $row1a[0]") or die (mysqli_error($ipacs)); $row3 = mysqli_fetch_row($result3);
		
 echo $row1[0].';'.$row2[0].';'.$row3[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
 mysqli_close($ipacs);
?>