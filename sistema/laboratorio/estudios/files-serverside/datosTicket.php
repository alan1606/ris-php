<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

//Generales
 $idPaciente = sqlValue($_POST["idPaciente"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultR = mysqli_query($horizonte, "SELECT referencia_ov, DATE_FORMAT(fecha_venta_ov, '%e'), DATE_FORMAT(fecha_venta_ov, '%c'), DATE_FORMAT(fecha_venta_ov, '%Y'), usuario_ov, DATE_FORMAT(fecha_venta_ov, '%H'), DATE_FORMAT(fecha_venta_ov, '%i'), DATE_FORMAT(fecha_venta_ov, '%s') from orden_venta where id_paciente_ov = $idPaciente ORDER BY fecha_venta_ov desc limit 1 ") or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultRu = mysqli_query($horizonte, "SELECT usuario_u from usuarios where id_u = $rowR[4] ") or die (mysqli_error($horizonte));
 $rowRu = mysqli_fetch_row($resultRu);
 
 switch($rowR[2]){
	 case 1:
	 	$rowR[2]='ENERO';
	 break;
	 case 2:
	 	$rowR[2]='FEBRERO';
	 break;
	 case 3:
	 	$rowR[2]='MARZO';
	 break;
	 case 4:
	 	$rowR[2]='ABRIL';
	 break;
	 case 5:
	 	$rowR[2]='MAYO';
	 break;
	 case 6:
	 	$rowR[2]='JUNIO';
	 break;
	 case 7:
	 	$rowR[2]='JULIO';
	 break;
	 case 8:
	 	$rowR[2]='AGOSTO';
	 break;
	 case 9:
	 	$rowR[2]='SEPTIEMBRE';
	 break;
	 case 10:
	 	$rowR[2]='OCTUBRE';
	 break;
	 case 11:
	 	$rowR[2]='NOVIEMBRE';
	 break;
	 case 12:
	 	$rowR[2]='DICIEMBRE';
	 break;
 }
 $miFecha = $rowR[1]." DE ".$rowR[2]." DEL ".$rowR[3]." A LAS ".$rowR[5].":".$rowR[6].":".$rowR[7];

 mysqli_select_db($horizonte, $database_horizonte); //Si hay Consulta
 $resultC = mysqli_query($horizonte, "SELECT COUNT(id_vc), clave_personal_medico_vc from venta_conceptos where referencia_vc = '$rowR[0]' and tipo_concepto_vc = 1 ") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 mysqli_select_db($horizonte, $database_horizonte); //Datos de la consulta, especialidad 
 $resultCA = mysqli_query($horizonte, "SELECT idEspecialidad_u from usuarios where clave_u = '$rowC[1]' ") or die (mysqli_error($horizonte));
 $rowCA = mysqli_fetch_row($resultCA);
 
 mysqli_select_db($horizonte, $database_horizonte); //Si hay Estudios
 $resultE = mysqli_query($horizonte, "SELECT COUNT(id_vc) from venta_conceptos where referencia_vc = '$rowR[0]' and tipo_concepto_vc = 3 ") or die (mysqli_error($horizonte));
 $rowE = mysqli_fetch_row($resultE);
 
 mysqli_select_db($horizonte, $database_horizonte); //Si hay Servicios
 $resultS = mysqli_query($horizonte, "SELECT COUNT(id_vc) from venta_conceptos where referencia_vc = '$rowR[0]' and tipo_concepto_vc = 2 ") or die (mysqli_error($horizonte));
 $rowS = mysqli_fetch_row($resultS);
 
 mysqli_select_db($horizonte, $database_horizonte); //Adicionales Costos EyS y Totales Generales
 $resultA = mysqli_query($horizonte, "SELECT t_urgente_e_ov, t_entrega_domicilio_e_ov, t_toma_domicilio_e_ov, t_urgente_s_ov, t_aDomicilio_s_ov, gran_total_ov, total_real, ahorro, saldo_ov, abonado_ov, total_c from orden_venta where referencia_ov = '$rowR[0]' ") or die (mysqli_error($horizonte));
 $rowA = mysqli_fetch_row($resultA);
 $adicionales = $rowA[0].";".$rowA[1].";".$rowA[2].";".$rowA[3].";".$rowA[4].";".$rowA[6].";".$rowA[7].";".$rowA[5].";".$rowA[9].";".$rowA[8];
 
 if($rowCA[0]=='URGENCIAS'){$rowCA[0]='GENERAL';}
 $adicionalesC = $rowCA[0].";".$rowA[10];
 
  mysqli_select_db($horizonte, $database_horizonte); 
 $resultP = mysqli_query($horizonte, "SELECT nombre_p, apaterno_p, amaterno_p from pacientes where id_p = $idPaciente limit 1 ") or die (mysqli_error($horizonte));
 $rowP = mysqli_fetch_row($resultP);
 $nombrePaciente = $rowP[0]." ".$rowP[1]." ".$rowP[2];
 
 $cadena = $rowR[0].";".$miFecha.";".$rowRu[0].";".$nombrePaciente.";".$rowC[0].";".$rowE[0].";".$rowS[0].";".$adicionales.";".$adicionalesC;
 echo $cadena;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>