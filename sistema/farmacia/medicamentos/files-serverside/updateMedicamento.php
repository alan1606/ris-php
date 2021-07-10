<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idU = sqlValue($_POST["id_user_reg_m"], "int", $horizonte);
 $id_mg = sqlValue($_POST["id_mg"], "int", $horizonte);
 $dosis = sqlValue(mb_strtoupper($_POST["tex_dosis"]), "text", $horizonte);
 $nombre_c = sqlValue(mb_strtoupper($_POST["nombre_c_m"]), "text", $horizonte);
 $costo = sqlValue($_POST["costo_m"], "double", $horizonte);
 $precio_p = sqlValue($_POST["precio_p_m"], "double", $horizonte);
 $precio_m = sqlValue($_POST["precio_m_m"], "double", $horizonte);
 $codigo_b = sqlValue($_POST["codigo_b_m"], "text", $horizonte);
 $id_medi = sqlValue($_POST["id_med_up"], "int", $horizonte);
 
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE conceptos set concepto_to = $nombre_c, precio_to = $precio_p, precio_urgencia_to = $precio_p, id_medicamento_g = $id_mg, costo_to = $costo, codigo_barras_to = $codigo_b, descripcion_to = $dosis, precio_m = $precio_m, precio_mu = $precio_m where id_to = $id_medi limit 1";
	  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) {echo $sql;} else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>