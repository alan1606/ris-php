<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_f = sqlValue($_POST["id_f"], "int", $horizonte);
		
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT formato_fo from formatos where id_fo = $id_f") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 echo $rowC[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>