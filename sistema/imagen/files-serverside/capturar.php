<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idE = sqlValue($_POST["myIDestudio"], "int", $horizonte);
 $idU = sqlValue($_POST["myIDusuario"], "int", $horizonte);
 $interpretacion = sqlValue($_POST["input"], "text", $horizonte);
 
 if(isset($_POST["birad_e"])){$birad=sqlValue($_POST["birad_e"],"int", $horizonte);}else{$birad=10;}
 
mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE venta_conceptos SET interpretacion_vc = $interpretacion, estatus_vc = 4, usuarioEdo4_e = $idU, fechaEdo4_e = now(), birad_vc = $birad where id_vc = $idE limit 1";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else { echo 1; }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>