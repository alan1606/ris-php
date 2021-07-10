<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");
//Generales
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 
 $fecha = date('Y-m-d');
 $hora = date('H:i:s');
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultHl = mysqli_query($horizonte, "SELECT u.usuario_u, s.nombre_su from usuarios u left join sucursales s on s.id_su = u.idSucursal_u where id_u = $idU") or die (mysqli_error($horizonte));
 $rowHl = mysqli_fetch_row($resultHl);
 
 echo $rowHl[0].'_;}{'.$rowHl[1].'_;}{'.$fecha.'_;}{'.$hora;
	
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>