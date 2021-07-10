<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

//Generales
 $idPaciente = sqlValue($_POST["idPaciente"], "int", $horizonte);
 $claveE = sqlValue($_POST["claveE"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultR = mysqli_query($horizonte, "SELECT referencia_ov from orden_venta where id_paciente_ov = $idPaciente ORDER BY fecha_venta_ov desc limit 1 ", $horizonte);
 $rowR = mysqli_fetch_row($resultR);

 mysqli_select_db($horizonte, $database_horizonte); //sacamos el precio del Estudio
 $resultC = mysqli_query($horizonte, "SELECT precio_vc from venta_conceptos where referencia_vc = '$rowR[0]' and tipo_concepto_vc = 3 and clave_concepto_es = $claveE ", $horizonte);
 $rowC = mysqli_fetch_row($resultC);
 
 mysqli_select_db($horizonte, $database_horizonte); //nombre del Estudio
 $resultCA = mysqli_query($horizonte, "SELECT nombre_est from estudios where clave_est = $claveE ", $horizonte);
 $rowCA = mysqli_fetch_row($resultCA);
 
 $adicionales = $rowC[0].";*".$rowCA[0];
 
 echo $adicionales;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>