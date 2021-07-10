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
 
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $noTemp = sqlValue(date('Y-m-d-H-i-s'), "date", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO conceptos (usuario_to, concepto_to, precio_to, precio_urgencia_to, id_area_to, id_medicamento_g, fecha_to, id_departamento_to, id_tipo_concepto_to, aleatorio_c, costo_to, codigo_barras_to, descripcion_to, precio_m, precio_mu) VALUES ($idU, $nombre_c, $precio_p, $precio_p, 61, $id_mg, $now, 3, 5, $noTemp, $costo, $codigo_b, $dosis, $precio_m, $precio_m)";
	  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) {echo $sql;} else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>