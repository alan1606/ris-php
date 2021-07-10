<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idU = sqlValue($_POST["id_u"], "int", $horizonte);
 $idP = sqlValue($_POST["id_p"], "int", $horizonte);
 $idM = sqlValue($_POST["id_m"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $consulta1 = "SELECT fecha_i_me, fecha_f_me, id_membresia_me, folio_me from membresias where id_me = $idM";
 $query1 = mysqli_query($horizonte, $consulta1) or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($query1);

 $fecha_i = sqlValue($rowR[0], "date", $horizonte);
 $fecha_f = sqlValue($rowR[1], "date", $horizonte);
 $idM1 = sqlValue($rowR[2], "int", $horizonte);
 $folio = sqlValue($rowR[3], "int", $horizonte);

 //Checamos si hay disponibilidad, si hay, integramos al paciente, sino, no lo hacemos
 mysqli_select_db($horizonte, $database_horizonte);
 $consulta2 = "SELECT dias_entrega_to from conceptos where id_to = $idM1";
 $query2 = mysqli_query($horizonte, $consulta2) or die (mysqli_error($horizonte));
 $rowR2 = mysqli_fetch_row($query2);

 mysqli_select_db($horizonte, $database_horizonte);
 $consulta3 = "SELECT count(id_me) from membresias where folio_me = $folio";
 $query3 = mysqli_query($horizonte, $consulta3) or die (mysqli_error($horizonte));
 $rowR3 = mysqli_fetch_row($query3);

 $membresias_hay = sqlValue($rowR3[0], "int", $horizonte);
 $membresias_total = sqlValue($rowR2[0], "int", $horizonte);

 $disponibilidad = $membresias_total - $membresias_hay;

 if($disponibilidad>0){
	 mysqli_select_db($horizonte, $database_horizonte);
	 $sql = "INSERT INTO membresias (id_paciente_me, fecha_i_me, fecha_f_me, id_usuario_me, fecha_me, id_membresia_me, folio_me ) VALUES ($idP, $fecha_i, $fecha_f, $idU, $now, $idM1, $folio)";

	 $inserta = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

	 if (!$inserta) {echo $sql;} else{ echo 1; } 
 }else{
	 echo 2;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>