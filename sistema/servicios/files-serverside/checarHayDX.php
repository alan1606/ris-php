<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idC = sqlValue($_POST["noAleatorio"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT count(id_dxc) from dx_consultas where id_c_dxc = $idC") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
		
 echo $rowC[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>