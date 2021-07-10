<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

 $idE = sqlValue($_POST["idE"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultR1 = mysqli_query($horizonte, "SELECT formato_fc from formatos_conceptos where id_fc = $idE");
 $rowR1 = mysqli_fetch_row($resultR1);

 echo $rowR1[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>