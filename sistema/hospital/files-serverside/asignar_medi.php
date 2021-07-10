<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$id_h = sqlValue($_POST["id_h"], "int", $horizonte);
	$id_m = sqlValue($_POST["id_m"], "int", $horizonte);
	$indicacion = sqlValue($_POST["indicacion"], "text", $horizonte);
	$id_u = sqlValue($_POST["id_u"], "int", $horizonte);
	$now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

	//Revisamos si el medicamento no está asignado en la hospiralización
	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT count(id_mh) from medicamentos_hospital where id_medicamento_mh = $id_m and id_hospitalizacion_mh = $id_h") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

	if($row[0]<1){
		mysqli_select_db($horizonte, $database_horizonte);
		$sql = "INSERT INTO medicamentos_hospital(id_hospitalizacion_mh, id_medicamento_mh, id_u_mh, fecha_mh, indicacion_mh) values($id_h, $id_m, $id_u, $now, $indicacion)";
		$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

		if(!$update){echo $sql;} else{ echo 1; }
	}else{echo 1;}

 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>