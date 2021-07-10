<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $noTemp = sqlValue($_POST["noAleatorio"], "text", $horizonte); $fecha = date('d/m/Y'); $hora = date('H:i:s');
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultR = mysqli_query($horizonte, "SELECT o.referencia_ov, o.id_paciente_ov, o.adicionales_ei_ov, o.adicionales_el_ov, o.adicionales_s_ov, o.gran_total_ov, sum(p.pago_pag), p.pago_pag-o.gran_total_ov, o.usuario_ov, o.adicionales_c_ov, p.forma_pago_pag, p.no_cheque_pag, o.id_ov, o.adicionales_ei_ov, o.adicionales_el_ov, o.adicionales_s_ov, o.sucursal_ov, o.t_desc_cta + o.t_desc_img + o.t_desc_lab + o.t_desc_serv + o.t_desc_pro, su.no_temp_su, o.iva_ov, o.subtotal_ov, sum(p.pago_pag), o.gran_total_ov-sum(p.pago_pag), o.adicionales_p_ov from orden_venta o left join pagos_ov p on p.referencia_pag = o.referencia_ov left join sucursales su on su.id_su = o.sucursal_ov where o.referencia_ov = $noTemp order by p.id_pag desc") or die (mysqli_error($horizonte));
 $rowR = mysqli_fetch_row($resultR); $idFormaPago = sqlValue($rowR[10], "int", $horizonte); $idSucursal = sqlValue($rowR[16], "int", $horizonte);
 $tempSucursal = sqlValue($rowR[18], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultSu = mysqli_query($horizonte, "SELECT estado_su, municipio_su, ciudad_su, colonia_su, calle_su, cp_su, telefono_su, email_su, id_su, id_su from sucursales where id_su = $idSucursal") or die (mysqli_error($horizonte));
 $rowSu = mysqli_fetch_row($resultSu); $id_sucu_l = sqlValue($rowSu[9], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultCof = mysqli_query($horizonte, "SELECT sitio_web from configuracion order by id_cf desc limit 1") or die (mysqli_error($horizonte));
 $rowCof = mysqli_fetch_row($resultCof);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultLo = mysqli_query($horizonte, "SELECT count(id_do), id_do, ext_do from documentos where aleatorio_do = $tempSucursal and perfil_do = 1 and tipo_quien_do = 2 ") or die (mysqli_error($horizonte));
 $rowLo = mysqli_fetch_row($resultLo);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultFP = mysqli_query($horizonte, "SELECT forma_pago_fp from catalogo_forma_pago where id_fp = $idFormaPago limit 1") or die (mysqli_error($horizonte));
 $rowFP = mysqli_fetch_row($resultFP);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultP = mysqli_query($horizonte, "SELECT nombre_p, apaterno_p, amaterno_p, rfc_p, calle_p, id_p, entidadFederativa_p, municipio_p, colonia_p, cp_p from pacientes where id_p = $rowR[1] limit 1") or die (mysqli_error($horizonte));
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
 
 $paciente = $rowP[0]." ".$rowP[1]." ".$rowP[2]; $adicionales = $rowR[9]+$rowR[13]+$rowR[14]+$rowR[15]+$rowR[23];
		
echo $fecha.";}".$rowR[0].";}".$paciente.";}".$adicionales.";}".$rowR[5].";}".$rowR[6].";}".$rowR[7].";}".$rowU[0]." ".$rowU[1]." ".$rowU[2].";}".$fecha.";}".$hora.";}".$adicionales.";}".$rowFP[0].";}".$rowR[11].";}".$rowP[3].";}".$direccionP.";}".$rowSu[0].";}".$rowSu[1].";}".$rowSu[2].";}".$rowSu[3].";}".$rowSu[4].";}".$rowSu[5].";}".$rowSu[6].";}".$rowSu[7].";}".$rowCof[0].";}".$rowR[17].";}".$rowLo[0].";}".$rowLo[1].";}".$rowLo[2].";}".$rowR[19].";}".$rowR[20].";}".$rowR[21].";}".$rowR[22];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>