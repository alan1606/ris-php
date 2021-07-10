<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $id = sqlValue($_POST["idConsimi"], "int", $horizonte); 
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT i.item_i, i.descripcion_i, i.id_tipo_i, i.id_unidad_i, i.id_presentacion_i, t.tipo_cti, u.unidad_un, p.presentacion_cp from inventario i left join catalogo_tipo_inventario t on t.id_cti = i.id_tipo_i left join unidades u on u.id_un = i.id_unidad_i left join catalogo_presentaciones p on p.id_cp = i.id_presentacion_i where i.id_i = $id ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

	echo $row[0]."{;]".$row[1]."{;]".$row[2]."{;]".$row[5]."{;]".$row[3]."{;]".$row[6]."{;]".$row[4]."{;]".$row[7];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>