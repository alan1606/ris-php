<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 $peso = sqlValue($_POST["peso"], "double", $horizonte);
 $talla = sqlValue($_POST["talla"], "double", $horizonte);
 $imc = sqlValue($_POST["imc"], "double", $horizonte);
 $t = sqlValue($_POST["t"], "int", $horizonte);
 $a = sqlValue($_POST["a"], "int", $horizonte);
 $fr = sqlValue($_POST["fr"], "int", $horizonte);
 $fc = sqlValue($_POST["fc"], "int", $horizonte);
 $temp = sqlValue($_POST["temp"], "double", $horizonte);
 $motivo = sqlValue($_POST["motivo"], "text", $horizonte);
 $nota = sqlValue($_POST["nota"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "UPDATE consultas SET peso_con = $peso, talla_con = $talla, imc_con = $imc, t_con = $t, a_con = $a, fr_con = $fr, fc_con = $fc, temp_con = $temp, motivo_consulta_con = $motivo, nota_general_con = $nota where id_con = $idC ";
  
$update = mysqli_query($horizonte, $sql);
	
if (!$update) {
 	echo $sql;
 }else{ 
	echo "ok";
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>