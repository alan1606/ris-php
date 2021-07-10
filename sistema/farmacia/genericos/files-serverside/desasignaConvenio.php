<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

//datos generales
 $idDC = sqlValue($_POST["dc"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "delete from convenios_paciente where id_cvp = $idDC limit 1";
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) {echo $sql;}
 else{ 
	
 	 mysqli_select_db($horizonte, $database_horizonte);
	 $sql1 = "delete from conceptos_beneficios where id_convenio_paciente_cb = $idDC";
	 $update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
		
	 if (!$update1) {echo $sql1;}
	 else{ 
		echo 1;
	 }
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>