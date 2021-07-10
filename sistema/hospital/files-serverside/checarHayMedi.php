<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idH = sqlValue($_POST["idH"], "int", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorio"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT count(id_mh) from medicamentos_hospital where id_hospitalizacion_mh = $idH and aleatorio_mh = $aleatorio") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
		
 echo $rowC[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>