<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idH = sqlValue($_POST["id_hospitalizacion"], "int", $horizonte);
 $idP = sqlValue($_POST["idPaciente_nnm"], "int", $horizonte);
 $idU = sqlValue($_POST["idUsuario_nnm"], "int", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorio_nnm"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $tipoNota = 1;
 $notaMedica = sqlValue($_POST["notaMedicaC"], "text", $horizonte);
 $indicaciones = sqlValue($_POST["indiF"], "text", $horizonte);
 $recomendaciones = sqlValue($_POST["notaMedicamentosC"], "text", $horizonte);
 $idSV = sqlValue($_POST["idSV"], "int", $horizonte);
 $idNotaM = sqlValue($_POST["tipoNotaMed"], "int", $horizonte);
	
 mysqli_select_db($horizonte, $database_horizonte); 
 $sql="INSERT INTO notas_de_hospital(id_hospitalizacion_nh,nota_nh,usuario_nh,fecha_nh,aleatorio_nh,indicaciones_nh,recomendaciones_nh,tipo_nota_nh,id_sv_nh,id_nota_nh) VALUES($idH,$notaMedica,$idU,$now,$aleatorio,$indicaciones,$recomendaciones,$tipoNota,$idSV,$idNotaM)";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) { echo $sql; }else{  echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>