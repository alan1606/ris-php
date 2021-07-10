<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 $estatusC = sqlValue($_POST["estatusC"], "text", $horizonte);
 $referenciaC = sqlValue($_POST["referenciaC"], "text", $horizonte);
 if($_POST["estatusC"] == "PENDIENTE"){
	 $estatusC = sqlValue("PROCESO", "text", $horizonte);
 }

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE consultas SET estatus_con = $estatusC where id_con = $idC ";
  
$update = mysqli_query($horizonte, $sql);
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo "ok";
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>