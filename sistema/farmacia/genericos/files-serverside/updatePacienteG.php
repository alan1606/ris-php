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
  
 $sql = "UPDATE pacientes SET curp_p = $curp, nombre_p = $nombre, apaterno_p = $apaterno, amaterno_p = $amaterno, tCelular_p = $tCelular, tParticular_p = $tParticular, rfc_p = $rfc, sexo_p = $idSexo, fNac_p = $fechaNacimiento, nacionalidad_p = $nacionalidad, entidadFederativa_p = $estado, municipio_p = $municipio, colonia_p = $colonia, cp_p = $cp, calle_p= $calle, noExt_p = $noExt, noInt_p = $noInt, tTrabajo_p = $telefonoTrabajo, extensionTt_p = $extensionTT, email_p = $email, entidad_nacimiento_p = $entidadNacimiento, razon_social_p = $razon, calle_pf = $calleF, noExt_pf = $noExtF, noInt_pf = $noIntF, entidadFederativa_pf = $estadoF, municipio_pf = $municipioF, colonia_pf = $coloniaF, cp_pf = $cpF, rfc_f_p = $rfcF, id_banco_p = $idBanco, digitos_banco_p = $digitos4, tSanguineo_p = $tSangreP where id_p = $idP limit 1";
 
 mysqli_select_db($horizonte, $database_horizonte);
 $insertar = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
 	
 if (!$insertar) { echo $sql;}else {echo 1;}
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>