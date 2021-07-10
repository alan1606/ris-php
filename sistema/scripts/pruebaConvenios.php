<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");
/*
mysqli_select_db($horizonte, $database_horizonte);
		$consulta = "SELECT id_p from pacientes ";
		$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
		while ($fila = mysqli_fetch_array($query)) {
			mysqli_select_db($horizonte, $database_horizonte);
			 $miidP = $fila['id_p'];
			 $sql = "INSERT INTO convenios_paciente (id_paciente_cvp, id_convenio_cvp, fecha_expedicion_cvp, fecha_expiracion_cvp, usuario_cvp, fecha_cvp)";
			 $sql.= "VALUES ($miidP, 1, now(), '3000-01-01', 1, now() )";
			  
			 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		};	
	*/
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>