<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $id_pr = sqlValue($_POST["id_pr"], "int", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "SELECT concepto_to, precio_to, precio_m, costo_to, codigo_barras_to, id_grupo_to, id_categoria_to, id_umedida_to, id_marca_to, id_modelo_to, id_presentacion_to, descripcion_to from conceptos where id_to = $id_pr ") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);

 echo $row[0].'{]*}'.$row[1].'{]*}'.$row[2].'{]*}'.$row[3].'{]*}'.$row[4].'{]*}'.$row[5].'{]*}'.$row[6].'{]*}'.$row[7].'{]*}'.$row[8].'{]*}'.$row[9].'{]*}'.$row[10].'{]*}'.$row[11];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>