<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idEvc = sqlValue($_POST["idE"], "int", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $nota = sqlValue($_POST["notaPro"], "text", $horizonte);
 $nota_libre = sqlValue($_POST["notaLibre"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 if(isset($_POST["refPro"])){$ref = sqlValue($_POST["refPro"], "text", $horizonte);}else{$ref = '';}
 if(isset($_POST["checaPro"])){$checaPro = sqlValue($_POST["checaPro"], "int", $horizonte);}else{$checaPro = '';}
 
mysqli_select_db($horizonte, $database_horizonte);
	$sql = "UPDATE venta_conceptos SET estatus_vc = 7, usuarioEdo4_e = $idU, fechaEdo4_e = $now, nota_radiologo_vc = $nota, interpretacion_vc = $nota_libre where id_vc = $idEvc ";
  
$update = mysqli_query($horizonte, $sql);
	
if (!$update) { echo $sql; }else { echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>