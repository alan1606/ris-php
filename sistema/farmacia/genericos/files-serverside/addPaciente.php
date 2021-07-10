<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

//datos generales
 list( $dia, $mes, $ano ) = explode( "/", $_POST['fnacP'] ); $raya = "-"; $f_nac = $ano.$raya.$mes.$raya.$dia." 00:00:00";

 $idU = sqlValue($_POST["idUsuarioP"], "int", $horizonte);
 $nombre = sqlValue($_POST["nombreP"], "text", $horizonte);
 $apaterno = sqlValue($_POST["apaternoP"], "text", $horizonte);
 $amaterno = sqlValue($_POST["amaternoP"], "text", $horizonte);
 $idSexo = sqlValue($_POST["sexoP"], "int", $horizonte);
 $nacionalidad = sqlValue($_POST["nacionalidadP"], "text", $horizonte);
 $fechaNacimiento = sqlValue($f_nac, "date", $horizonte);
 $tCelular = sqlValue($_POST["telmovilP"], "text", $horizonte);
 $tParticular = sqlValue($_POST["telparticularP"], "text", $horizonte);
 $curp = sqlValue($_POST["curpP"], "text", $horizonte);
 $rfc = sqlValue($_POST["rfcP"], "text", $horizonte);
 $idSucursal = sqlValue($_POST["sucursalP"], "int", $horizonte);

 $idP = sqlValue($_POST["idPacienteN"], "int", $horizonte);
 $razon = sqlValue($_POST["razonPF"], "text", $horizonte);
 $tSangreP = sqlValue($_POST["tSangreP"], "int", $horizonte);
 
 //Datos de dirección
 if(isset($_POST["estadoP"])){$estado = sqlValue($_POST["estadoP"], "int", $horizonte);}else{$estado = 'NULL';}
 if(isset($_POST["municipioP"])){$municipio = sqlValue($_POST["municipioP"], "int", $horizonte);}else{$municipio = 'NULL';}
 if(isset($_POST["coloniaP"])){$colonia = sqlValue($_POST["coloniaP"], "int", $horizonte);}else{$colonia = 'NULL';}
 if(isset($_POST["cpP"])){$cp = sqlValue($_POST["cpP"], "text", $horizonte);}else{$cp = 'NULL';}
 $calle = sqlValue($_POST["calleP"], "text", $horizonte);
 $noExt = sqlValue($_POST["noExtP"], "text", $horizonte);
 $noInt = sqlValue($_POST["noIntP"], "text", $horizonte);
 
 //Datos fiscales
 if(isset($_POST["estadoPF"])){$estadoF = sqlValue($_POST["estadoPF"], "int", $horizonte);}else{$estadoF = 'NULL';}
 if(isset($_POST["municipioPF"])){$municipioF = sqlValue($_POST["municipioPF"], "int", $horizonte);}else{$municipioF = 'NULL';}
 if(isset($_POST["coloniaPF"])){$coloniaF = sqlValue($_POST["coloniaPF"], "int", $horizonte);}else{$coloniaF = 'NULL';}
 if(isset($_POST["cpPF"])){$cpF = sqlValue($_POST["cpPF"], "text", $horizonte);}else{$cpF = 'NULL';}
 $calleF = sqlValue($_POST["callePF"], "text", $horizonte);
 $noExtF = sqlValue($_POST["noExtPF"], "text", $horizonte);
 $noIntF = sqlValue($_POST["noIntPF"], "text", $horizonte);
 
 //Datos de Contacto
 $telefonoTrabajo = sqlValue($_POST["telefonoTrabajoP"], "text", $horizonte);
 $extensionTT = sqlValue($_POST["extensionTelTraP"], "text", $horizonte);
 $email = sqlValue($_POST["emailPF"], "text", $horizonte);
  
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
  
 //DE LA FOTOGRAFÍA DE PERFIL DEL PACIENTE
 $foto = sqlValue($_POST["hayFoto"], "int", $horizonte);
 $nombreFoto = $_POST["nombreFotoT"].'.jpg';
 
 $entidadNacimiento = sqlValue($_POST["entidadNacimientoP"], "int", $horizonte);
 
 if($foto==1){$nombreFoto=$nombreFoto;}else{$nombreFoto='';$nombreFoto = sqlValue($nombreFoto, "text", $horizonte);}
 
 $rfcF = sqlValue($_POST["rfcPF"], "text", $horizonte);
 $idBanco = sqlValue($_POST["bancoPF"], "int", $horizonte);
 $digitos4 = sqlValue($_POST["digitos4B"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO pacientes (idUsuarioR_p, nombre_p, apaterno_p, amaterno_p, sexo_p, nacionalidad_p, fNac_p, tCelular_p, tParticular_p, curp_p, rfc_p, idSucursal_p, entidadFederativa_p, municipio_p, colonia_p, cp_p, calle_p, noExt_p, noInt_p, tTrabajo_p, extensionTt_p, email_p,fechaR_p, foto_p, nombreFoto_p, entidad_nacimiento_p, razon_social_p, calle_pf, noExt_pf, noInt_pf, entidadFederativa_pf, municipio_pf, colonia_pf, cp_pf, rfc_f_p, id_banco_p, digitos_banco_p, tSanguineo_p)";
 $sql.= "VALUES ($idU, $nombre, $apaterno, $amaterno, $idSexo, $nacionalidad, $fechaNacimiento, $tCelular, $tParticular, $curp, $rfc, $idSucursal, $estado, $municipio, $colonia, $cp, $calle, $noExt, $noInt, $telefonoTrabajo, $extensionTT, $email, $now, $foto, '$nombreFoto', $entidadNacimiento, $razon, $calleF, $noExtF, $noIntF, $estadoF, $municipioF, $coloniaF, $cpF, $rfcF, $idBanco, $digitos4, $tSangreP)";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) {echo $sql;}
 else{ 
	mysqli_select_db($horizonte, $database_horizonte);
 	$resultF = mysqli_query($horizonte, "SELECT MAX(id_p) from pacientes limit 1 ") or die (mysqli_error($horizonte));
 	$rowF = mysqli_fetch_row($resultF); $idPac = sqlValue($rowF[0], "int", $horizonte);
	
	/*mysqli_select_db($horizonte, $database_horizonte);
	 $sqlCP = "INSERT INTO convenios_paciente (id_paciente_cvp, id_convenio_cvp, fecha_expedicion_cvp, fecha_expiracion_cvp, usuario_cvp, fecha_cvp)";
	 $sqlCP.= "VALUES ($idPac, 1, now(), '3000-01-01', 1, now())";
	 $updateCP = mysqli_query($horizonte, $sqlCP) or die (mysqli_error($horizonte));*/
	
	mysqli_select_db($horizonte, $database_horizonte);
 	$sqlH = "INSERT INTO historia_clinica (id_paciente_hc, id_usuario_hc, fecha_registro_hc) VALUES ($rowF[0], $idU, $now)";
 	$insertH = mysqli_query($horizonte, $sqlH) or die (mysqli_error($horizonte));
	
	if (!$insertH) { echo $sqlH; }else{ echo 1; }
		
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>