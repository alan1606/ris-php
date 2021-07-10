<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte);
 
 $fecha = date('d/m/Y');
 $hora = date('H:i:s');
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultR = mysqli_query($horizonte, "SELECT referencia_ov, id_paciente_ov, adicionales_ei_ov, adicionales_el_ov, adicionales_s_ov, gran_total_ov, abonado_ov, saldo_ov, usuario_ov, adicionales_c_ov, forma_pago_ov, no_cheque_ov, adicionales_ee_ov, adicionales_ei_ov, adicionales_el_ov, adicionales_s_ov from orden_venta where no_temp_ov = $noTemp limit 1") or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR); $idFormaPago = sqlValue($rowR[10], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultFP = mysqli_query($horizonte, "SELECT forma_pago_fp from catalogo_forma_pago where id_fp = $idFormaPago limit 1") or die (mysqli_error($horizonte));
 $rowFP = mysqli_fetch_row($resultFP);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultP = mysqli_query($horizonte, "SELECT nombre_p, apaterno_p, amaterno_p, rfc_p, calle_p, noExt_p, entidadFederativa_p, municipio_p, colonia_p, cp_p from pacientes where id_p = $rowR[1] limit 1") or die (mysqli_error($horizonte));
 $rowP = mysqli_fetch_row($resultP);
 $idEstadoP = sqlValue($rowP[6], "int", $horizonte); $idMunicipioP = sqlValue($rowP[7], "int", $horizonte); $idColoniaP = sqlValue($rowP[8], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultEP = mysqli_query($horizonte, "SELECT d_estado from mexico where id_mx = $idEstadoP limit 1") or die (mysqli_error($horizonte));
 $rowEP = mysqli_fetch_row($resultEP);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultMP = mysqli_query($horizonte, "SELECT d_municipio from mexico where id_mx = $idMunicipioP limit 1") or die (mysqli_error($horizonte));
 $rowMP = mysqli_fetch_row($resultMP);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultCP = mysqli_query($horizonte, "SELECT d_asenta from mexico where id_mx = $idColoniaP limit 1") or die (mysqli_error($horizonte));
 $rowCP = mysqli_fetch_row($resultCP);
 
 $direccionP = 'CALLE '.$rowP[4].' #'.$rowP[5].' COLONIA '.$rowCP[0].', '.$rowMP[0].', '.$rowEP[0];
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultU = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u from usuarios where id_u = $rowR[8] limit 1") or die (mysqli_error($horizonte));
 $rowU = mysqli_fetch_row($resultU);
 
 $paciente = $rowP[0]." ".$rowP[1]." ".$rowP[2];
 $adicionales = $rowR[9]+$rowR[12]+$rowR[13]+$rowR[14]+$rowR[15];
		
echo $fecha.";}".$rowR[0].";}".$paciente.";}".$adicionales.";}".$rowR[5].";}".$rowR[6].";}".$rowR[7].";}".$rowU[0]." ".$rowU[1]." ".$rowU[2].";}".$fecha.";}".$hora.";}".$adicionales.";}".$rowFP[0].";}".$rowR[11].";}".$rowP[3].";}".$direccionP;

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>