<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["myIDestudio"], "int", $horizonte);
 $idU = sqlValue($_POST["myIDusuario"], "int", $horizonte);
 $diagnostico = sqlValue($_POST["miDiagnostico"], "text", $horizonte);
 
mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE venta_conceptos SET interpretacion_vc = $diagnostico, estatus_vc = 4, usuarioEdo3_e = $idU, fechaEdo3_e = now() where id_vc = $idE limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) {
 	echo $sql;
 }else {
	 echo "ok";
}
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>