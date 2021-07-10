<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 list( $dia, $mes, $ano ) = explode( "/", $_POST['fecha_nacimiento_p'] ); $raya = "-"; $f_nac = $ano.$raya.$mes.$raya.$dia." 00:00:00";

 $idU = sqlValue($_POST["id_usr_reg"], "int", $horizonte);
 $id_sucu = sqlValue($_POST["id_sucu"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombre_p"]), "text", $horizonte);
 $apaterno = sqlValue(mb_strtoupper($_POST["apaterno_p"]), "text", $horizonte);
 $amaterno = sqlValue(mb_strtoupper($_POST["amaterno_p"]), "text", $horizonte);
 $fechaNacimiento = sqlValue($f_nac, "date", $horizonte);
 $idSexo = sqlValue($_POST["sexo_us"], "int", $horizonte);
 $id_pais = sqlValue($_POST["pais_p"], "int", $horizonte);
 $entidadNacimiento = sqlValue($_POST["edo_nacimiento"], "int", $horizonte);
 $curp = sqlValue(mb_strtoupper($_POST["curp_p"]), "text", $horizonte);
 if(isset($_POST["rfc_p"]) and $_POST["rfc_p"]!=''){$rfc = sqlValue(mb_strtoupper($_POST["rfc_p"]), "text", $horizonte);}else{$rfc = 'NULL';}
 $tCelular = sqlValue(mb_strtoupper($_POST["tel_personal_p"]), "text", $horizonte);
 if(isset($_POST["tParticular"]) and $_POST["tParticular"]!=''){
	 $tParticular = sqlValue(mb_strtoupper($_POST["tel_particular_p"]), "text", $horizonte);
 }else{$tParticular = 'NULL';}
 $telefonoTrabajo = sqlValue(mb_strtoupper($_POST["tel_trabajo_p"]), "text", $horizonte);
 $extensionTT = sqlValue(mb_strtoupper($_POST["tel_trabajo_ext_p"]), "text", $horizonte);
 $email = sqlValue(strtolower($_POST["email_p"]), "text", $horizonte);
 if(isset($_POST["sangre_p"]) and $_POST["sangre_p"]!=''){$tSangreP = sqlValue($_POST["sangre_p"], "int", $horizonte);}else{$tSangreP = 'NULL';}
 $avisara = sqlValue(mb_strtoupper($_POST["contacto_emergencia_p"]), "text", $horizonte);
 $temergencia = sqlValue(mb_strtoupper($_POST["tel_emergencia_p"]), "text", $horizonte);
 $nombre_completo = $_POST["nombre_p"].' '.$_POST["apaterno_p"].' '.$_POST["amaterno_p"];
 $nombre_completo = sqlValue(mb_strtoupper($nombre_completo), "text", $horizonte);
 $ocupacion = sqlValue($_POST["ocupacion_us"], "int", $horizonte);

 //Datos de dirección
 if(isset($_POST["estado_dir_p"])){$estado = sqlValue($_POST["estado_dir_p"], "int", $horizonte);}else{$estado = 'NULL';}
 if(isset($_POST["municipio_p"])){$municipio = sqlValue($_POST["municipio_p"], "int", $horizonte);}else{$municipio = 'NULL';}
 $ciudad = sqlValue(mb_strtoupper($_POST["ciudad_us"]), "text", $horizonte);
 $colonia = sqlValue(mb_strtoupper($_POST["colonia_us"]), "text", $horizonte);
 $calle = sqlValue(mb_strtoupper($_POST["calle_us"]), "text", $horizonte);
 $cp = sqlValue(mb_strtoupper($_POST["cp_us"]), "text", $horizonte);

 if(isset($_POST["lati_ud"]) and $_POST["lati_ud"]!=''){$latitud = $_POST["lati_ud"];}else{$latitud = 18.8161;}
 if(isset($_POST["long_ud"]) and $_POST["long_ud"]!=''){$longitud = $_POST["long_ud"];}else{$longitud = -98.954;}

 //Datos fiscales
 $razon = sqlValue(mb_strtoupper($_POST["razon_social"]), "text", $horizonte);
 $rfcF = sqlValue(mb_strtoupper($_POST["rfc_fp"]), "text", $horizonte);
 $email_pf = sqlValue(strtolower($_POST["email_pf"]), "text", $horizonte);
 if(isset($_POST["estado_df"])){$estadoF = sqlValue($_POST["estado_df"], "int", $horizonte);}else{$estadoF = 'NULL';}
 if(isset($_POST["municipio_df"])){$municipioF = sqlValue($_POST["municipio_df"], "int", $horizonte);}else{$municipioF = 'NULL';}
 $ciudadF = sqlValue(mb_strtoupper($_POST["ciudad_df"]), "text", $horizonte);
 $coloniaF = sqlValue(mb_strtoupper($_POST["colonia_df"]), "text", $horizonte);
 $calleF = sqlValue(mb_strtoupper($_POST["calle_df"]), "text", $horizonte);
 $cpF = sqlValue(mb_strtoupper($_POST["cp_df"]), "text", $horizonte);

 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 //DE LA FOTOGRAFÍA DE PERFIL DEL PACIENTE $no_temp = sqlValue($_POST["temporal_s"], "text", $horizonte);
 //$idBanco = sqlValue($_POST["bancoPF"], "int", $horizonte); $digitos4 = sqlValue($_POST["digitos4B"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO pacientes (idUsuarioR_p, nombre_p, apaterno_p, amaterno_p, sexo_p, nacionalidad_p, fNac_p, tCelular_p, tParticular_p, curp_p, rfc_p, idSucursal_p, entidadFederativa_p, municipio_p, ciudad_p, colonia_p, cp_p, calle_p, tTrabajo_p, extensionTt_p, email_p, fechaR_p, entidad_nacimiento_p, razon_social_p, calle_pf, entidadFederativa_pf, municipio_pf, ciudad_pf, colonia_pf, cp_pf, rfc_f_p, tSanguineo_p, nombre_completo_p, coordenadas_p, email_pf, contactoEmergencia_p, tEmergencia_p, idOcupacion_p )";
 $sql.= "VALUES ($idU, $nombre, $apaterno, $amaterno, $idSexo, $id_pais, $fechaNacimiento, $tCelular, $tParticular, $curp, $rfc, $id_sucu, $estado, $municipio, $ciudad, $colonia, $cp, $calle, $telefonoTrabajo, $extensionTT, $email, $now, $entidadNacimiento, $razon, $calleF, $estadoF, $municipioF, $ciudadF, $coloniaF, $cpF, $rfcF, $tSangreP, $nombre_completo, GeomFromText('POINT($latitud $longitud)'), $email_pf, $avisara, $temergencia, $ocupacion )";

 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

 if (!$update) {echo $sql;}
 else{
	mysqli_select_db($horizonte, $database_horizonte);
 	$resultF = mysqli_query($horizonte, "SELECT MAX(id_p) from pacientes limit 1 ") or die (mysqli_error($horizonte));
 	$rowF = mysqli_fetch_row($resultF); $idPac = sqlValue($rowF[0], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
 	$sqlH = "INSERT INTO historia_clinica (id_paciente_hc, id_usuario_hc, fecha_registro_hc) VALUES ($rowF[0], $idU, $now)";
 	$insertH = mysqli_query($horizonte, $sqlH) or die (mysqli_error($horizonte));

	if (!$insertH) { echo $sqlH; }else{ echo '1'.';-:'.$rowF[0].';-:'.$_POST["nombre_p"].' '.$_POST["apaterno_p"].' '.$_POST["amaterno_p"]; }
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>
