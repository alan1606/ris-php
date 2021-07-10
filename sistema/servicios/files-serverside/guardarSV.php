<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["idPx1"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $peso = sqlValue($_POST["peso"], "double", $horizonte);
 $talla = sqlValue($_POST["talla"], "double", $horizonte);
 $cintura = sqlValue($_POST["cintura"], "double", $horizonte);
 $imc = sqlValue($_POST["imc"], "double", $horizonte);
 $t = sqlValue($_POST["t"], "int", $horizonte);
 $a = sqlValue($_POST["a"], "int", $horizonte);
 $fr = sqlValue($_POST["fr"], "int", $horizonte);
 $fc = sqlValue($_POST["fc"], "int", $horizonte);
 $temp = sqlValue($_POST["temp"], "double", $horizonte);
 $notas = sqlValue($_POST["notas"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO signos_vitales (id_paciente_sv, id_usuario_sv, fecha_sv, peso_sv, talla_sv, imc_sv, cintura_sv, t_sv, a_sv, fr_sv, fc_sv, temperatura_sv, notas_sv)";
 $sql.= "VALUES ($idP, $idU, $now, $peso, $talla, $imc, $cintura, $t, $a, $fr, $fc, $temp, $notas )";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>