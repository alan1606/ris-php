<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idC = sqlValue($_POST["noAleatorio"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT count(id_mr) from medicamentos_receta where id_co_mr = $idC") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
		
 echo $rowC[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>