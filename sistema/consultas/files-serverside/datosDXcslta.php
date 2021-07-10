<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

    $idE = sqlValue($_POST["idE"], "int", $horizonte);
 
    mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT observaciones_vc, id_paciente_vc from venta_conceptos where id_vc = $idE limit 1") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	$result1 = mysqli_query($horizonte, "SELECT nombre_p, apaterno_p, amaterno_p from pacientes where id_p = $row[1] limit 1") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
	
	$paciente = $row1[0].' '.$row1[1].' '.$row1[2];
	
	$resultK = mysqli_query($horizonte, "SELECT imagen_ie from img_consulta where id_estudio_vc_ie = $idE order by id_ie desc limit 1") or die (mysqli_error($horizonte));
 	$rowK = mysqli_fetch_row($resultK); if ($rowK[0]==''){$rowK[0]=0;}
	
	$resultP = mysqli_query($horizonte, "SELECT count(id_h) from hospitalizacion where id_consulta_vc_h = $idE and fecha_fin_h IS NULL") or die (mysqli_error($horizonte));
 	$rowP = mysqli_fetch_row($resultP);
  
echo 'PACIENTE: '.$paciente.'*[+'.$rowK[0].'*[+'.$rowP[0];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>