<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["idP"], "int", $horizonte);
  
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultS = mysqli_query($horizonte, "SELECT DATE_FORMAT(fecha_sv,'%d/%c/%Y %H:%i:%s'), id_usuario_sv, peso_sv, talla_sv, imc_sv, cintura_sv, t_sv, a_sv, fr_sv, fc_sv, temperatura_sv, id_sv from signos_vitales where id_paciente_sv = $idP order by id_sv desc limit 1") or die (mysqli_error($horizonte));
 $rowS = mysqli_fetch_row($resultS); $us_sv = sqlValue($rowS[1], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultUs = mysqli_query($horizonte, "SELECT usuario_u from usuarios where id_u = $us_sv") or die (mysqli_error($horizonte));
 $rowUs = mysqli_fetch_row($resultUs);
 
 echo $rowS[0].";*-".$rowUs[0].';*-'.$rowS[2].';*-'.$rowS[3].';*-'.$rowS[4].';*-'.$rowS[5].';*-'.$rowS[6].';*-'.$rowS[7].';*-'.$rowS[8].';*-'.$rowS[9].';*-'.$rowS[10].';*-'.$rowS[11];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>