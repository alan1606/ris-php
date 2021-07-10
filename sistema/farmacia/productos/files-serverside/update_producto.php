<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idU = sqlValue($_POST["id_user_reg_cf"], "int", $horizonte);
 $idPro = sqlValue($_POST["id_pdt"], "int", $horizonte);
 $producto = sqlValue(mb_strtoupper($_POST["nombre_p"]), "text", $horizonte);
 $id_grupo = sqlValue($_POST["grupo_p"], "int", $horizonte);
 $id_categoria = sqlValue($_POST["categoria_p"], "int", $horizonte);
 $id_umedida = sqlValue($_POST["umedida_p"], "int", $horizonte);
 $id_marca = sqlValue($_POST["marca_p"], "int", $horizonte);
 $id_modelo = sqlValue($_POST["modelo_p"], "int", $horizonte);
 $id_presentacion = sqlValue($_POST["presentacion_p"], "int", $horizonte);
 $costo = sqlValue($_POST["costo_p"], "double", $horizonte);
 $precio_m = sqlValue($_POST["precio_m_p"], "double", $horizonte);
 $precio_p = sqlValue($_POST["precio_p_p"], "double", $horizonte);
 $codigo_b = sqlValue($_POST["cb_p"], "text", $horizonte);
 $descripcion = sqlValue(mb_strtoupper($_POST["descripcion_p"]), "text", $horizonte);
 
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $noTemp = sqlValue(date('Y-m-d-H-i-s'), "date", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE conceptos SET usuario_to = $idU, concepto_to = $producto, precio_to = $precio_p, precio_urgencia_to = $precio_p, costo_to = $costo, codigo_barras_to = $codigo_b, descripcion_to = $descripcion, precio_m = $precio_m, precio_mu = $precio_m, id_grupo_to = $id_grupo, id_categoria_to = $id_categoria, id_umedida_to = $id_umedida, id_marca_to = $id_marca, id_modelo_to = $id_modelo, id_presentacion_to = $id_presentacion where id_to = $idPro limit 1";
	  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) {echo $sql;} else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>