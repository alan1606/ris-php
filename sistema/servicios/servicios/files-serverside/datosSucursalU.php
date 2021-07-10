<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

//Generales
 $idU = sqlValue($_POST["idU"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultR = mysqli_query($horizonte, "SELECT idSucursal_u from usuarios where id_u = $idU ") or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR);
 
 echo $rowR[0];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>