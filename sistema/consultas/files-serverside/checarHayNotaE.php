<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT nota_interpretacion from venta_conceptos where no_temp_vc = $noTemp") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 if($rowC[0]!=''){echo 1;}else{echo 0;}
 
 //echo $rowC[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>