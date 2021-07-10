<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $id_concepto = sqlValue($_POST["id_concepto_a"], "int", $horizonte);
 $aleatorio = sqlValue($_POST["aleatorio"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 //Si el concepto a agregar no ha sido agregado, entonces lo agregamos, sino no
 mysqli_select_db($horizonte, $database_horizonte);
 $result1 = mysqli_query($horizonte, "SELECT count(id_ac) from asigna_conceptos_paquetes where id_concepto_ac = $id_concepto and aleatorio_ac = $aleatorio") or die(mysqli_error($horizonte));
 $row1 = mysqli_fetch_row($result1);
 
 if($row1[0]<1){
	 mysqli_select_db($horizonte, $database_horizonte);
	 $sql = "INSERT INTO asigna_conceptos_paquetes(id_concepto_ac, aleatorio_ac, usuario_ac, fecha_ac) VALUES ($id_concepto, $aleatorio, $idU, $now)";
	 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

	 if (!$update) { echo $sql; }else{ echo 1; }
 }else{echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>