<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $temporal = sqlValue($_POST["temporal_s"], "text", $horizonte);
 if($_POST["p_latitud_s"]==''){$latitud = 0.0;}else{$latitud = $_POST["p_latitud_s"];}
 if($_POST["p_longitud_s"]==''){$longitud = 0.0;}else{$longitud = $_POST["p_longitud_s"];}
 $idUsuario = sqlValue($_POST["idUsuarioP"], "int", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombreP"]), "text", $horizonte);
 $apaterno = sqlValue(mb_strtoupper($_POST["apaternoP"]), "text", $horizonte);
 $amaterno = sqlValue(mb_strtoupper($_POST["amaternoP"]), "text", $horizonte);
 $idSexo = sqlValue($_POST["sexoP"], "int", $horizonte);
 $nacionalidad = sqlValue(mb_strtoupper($_POST["nacionalidadP"]), "text", $horizonte);
 list( $dia, $mes, $ano ) = explode( "/", $_POST['fnacP'] ); $raya = "-"; $f_nac = $ano.$raya.$mes.$raya.$dia;
 $fechaNacimiento = sqlValue($f_nac, "date", $horizonte);
 $curp = sqlValue(mb_strtoupper($_POST["curpP"]), "text", $horizonte); $rfc = sqlValue(mb_strtoupper($_POST["rfcP"]), "text", $horizonte);
 $idSucursal = sqlValue($_POST["sucursalP"], "int", $horizonte);
 $tipoUsuario = sqlValue($_POST["tipoUsuario"], "int", $horizonte);
 $username = sqlValue($_POST["username"], "text", $horizonte);
 $notas = sqlValue(mb_strtoupper($_POST["notasP"]), "text", $horizonte);
 $tCelular = sqlValue($_POST["telmovilP"], "text", $horizonte);
 $tsanguineoP = sqlValue($_POST["tsanguineoP"], "int", $horizonte);
 $estado = sqlValue($_POST["estadoP"], "int", $horizonte);
 if(isset($_POST["municipioP"])){$municipio = sqlValue($_POST["municipioP"], "int", $horizonte);}else{$municipio = 'NULL';}
 if(isset($_POST["coloniaP"])){$colonia = sqlValue($_POST["coloniaP"], "int", $horizonte);}else{$colonia = 'NULL';}
 $calle = sqlValue(mb_strtoupper($_POST["calleP"]), "text", $horizonte);
 if(isset($_POST["cpP"])){$cp = sqlValue($_POST["cpP"], "text", $horizonte);}else{$cp = 'NULL';}
 $tParticular = sqlValue($_POST["telparticularP"], "text", $horizonte);
 $telefonoTrabajo = sqlValue($_POST["telefonoTrabajoP"], "text", $horizonte);
 $extensionTT = sqlValue($_POST["extensionTelTraP"], "text", $horizonte);
 $avisarA = sqlValue(mb_strtoupper($_POST["avisarP"]), "text", $horizonte);
 $telefonoE = sqlValue($_POST["telefonoEmergenciaP"], "text", $horizonte);
 $email = sqlValue(strtolower($_POST["emailP"]), "text", $horizonte);
 $departamento = sqlValue($_POST["departamentoU"], "int", $horizonte);
 if(isset($_POST["areaU"])){$area = sqlValue($_POST["areaU"], "int", $horizonte);}else{$area = 'NULL';}
 $puesto = sqlValue($_POST["puestoU"], "int", $horizonte);
 $escolaridad = sqlValue($_POST["escolaridadP"], "int", $horizonte);
 $universidad = sqlValue($_POST["universidadU"], "int", $horizonte);
 $universidadE = sqlValue($_POST["universidadEU"], "int", $horizonte);
 
 $profesion = sqlValue($_POST["profesionUsuario"], "int", $horizonte);
 
 $titulo = sqlValue($_POST["cTituloU"], "int", $horizonte);
 $cedula = sqlValue(mb_strtoupper($_POST["cedulaU"]), "text", $horizonte);
 $especialidad = sqlValue($_POST["especialidadU"], "int", $horizonte);
 $cedula1 = sqlValue($_POST["cedulaU1"], "text", $horizonte);
  
 if($_POST["t_lunes"]==1){
 	$horario_lu_e = sqlValue($_POST["lunes_de1"], "text", $horizonte); $horario_lu_s = sqlValue($_POST["lunes_a1"], "text", $horizonte);
 }else{
	$horario_lu_e = sqlValue('00:00:01', "text", $horizonte); $horario_lu_s = sqlValue('00:00:02', "text", $horizonte);
 }
 if($_POST["t_martes"]==1){
	 $horario_ma_e = sqlValue($_POST["martes_de1"], "text", $horizonte); $horario_ma_s = sqlValue($_POST["martes_a1"], "text", $horizonte);
 }else{
	 $horario_ma_e = sqlValue('00:00:01', "text", $horizonte); $horario_ma_s = sqlValue('00:00:02', "text", $horizonte);
 }
 if($_POST["t_miercoles"]==1){
	 $horario_mi_e = sqlValue($_POST["miercoles_de1"], "text", $horizonte); $horario_mi_s = sqlValue($_POST["miercoles_a1"], "text", $horizonte);
 }else{
	 $horario_mi_e = sqlValue('00:00:01', "text", $horizonte); $horario_mi_s = sqlValue('00:00:02', "text", $horizonte);
 }
 if($_POST["t_jueves"]==1){
	 $horario_ju_e = sqlValue($_POST["jueves_de1"], "text", $horizonte); $horario_ju_s = sqlValue($_POST["jueves_a1"], "text", $horizonte);
 }else{
	 $horario_ju_e = sqlValue('00:00:01', "text", $horizonte); $horario_ju_s = sqlValue('00:00:02', "text", $horizonte);
 }
 if($_POST["t_viernes"]==1){
	 $horario_vi_e = sqlValue($_POST["viernes_de1"], "text", $horizonte); $horario_vi_s = sqlValue($_POST["viernes_a1"], "text", $horizonte);
 }else{
	 $horario_vi_e = sqlValue('00:00:01', "text", $horizonte); $horario_vi_s = sqlValue('00:00:02', "text", $horizonte);
 }
 if($_POST["t_sabado"]==1){
	 $horario_sa_e = sqlValue($_POST["sabado_de1"], "text", $horizonte); $horario_sa_s = sqlValue($_POST["sabado_a1"], "text", $horizonte);
 }else{
	 $horario_sa_e = sqlValue('00:00:01', "text", $horizonte); $horario_sa_s = sqlValue('00:00:02', "text", $horizonte);
 }
 if($_POST["t_domingo"]==1){
	 $horario_do_e = sqlValue($_POST["domingo_de1"], "text", $horizonte); $horario_do_s = sqlValue($_POST["domingo_a1"], "text", $horizonte);
 }else{
	 $horario_do_e = sqlValue('00:00:01', "text", $horizonte); $horario_do_s = sqlValue('00:00:02', "text", $horizonte);
 }
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $estatus_laboral = sqlValue($_POST["estatusU"], "int", $horizonte); $estatus_escolar = sqlValue($_POST["estatus_ge"], "int", $horizonte);
 $tipo_acceso = sqlValue($_POST["tipo_acceso"], "int", $horizonte);
 
 $hashed_password = sqlValue(password_hash($_POST["username"], PASSWORD_DEFAULT), "text", $horizonte);
 
 $permisos = sqlValue($_POST["h_pacie"].$_POST["h_corte_r"].$_POST["h_agend"].$_POST["h_consul"].$_POST["h_rep_c"].$_POST["h_estadi_c"].$_POST["h_cat_c"].$_POST["h_hospi"].$_POST["h_enfer"].$_POST["h_notas_h"].$_POST["h_cama_h"].$_POST["h_img"].$_POST["h_endo"].$_POST["h_ultra"].$_POST["h_colpo"].$_POST["h_cat_i"].$_POST["h_tab_i"].$_POST["h_rep_i"].$_POST["h_estadi_i"].$_POST["h_lab"].$_POST["h_bases"].$_POST["h_bita_l"].$_POST["h_cat_l"].$_POST["h_tab_l"].$_POST["h_rep_l"].$_POST["h_estadi_l"].$_POST["h_serv"].$_POST["h_cat_s"].$_POST["h_tab_s"].$_POST["h_rep_s"].$_POST["h_estadi_s"].$_POST["h_puntov_m"].$_POST["h_medis"].$_POST["h_produ_f"].$_POST["h_corte_f"].$_POST["h_inv_f"].$_POST["h_rep_f"].$_POST["h_estadi_f"].$_POST["h_medi_a"].$_POST["h_promo_a"].$_POST["h_usu"].$_POST["h_sucu"].$_POST["h_corte_a"].$_POST["h_bene_a"].$_POST["h_forma_a"].$_POST["h_prod_f"].$_POST["h_config"], "text", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); //foto_u, firma_u, $foto, $firmaU, idOcupacion_u, $ocupacion, 
 $sql = "INSERT INTO usuarios(temporal_u, coordenadas_u, idUsuarioR_u, nombre_u, apaterno_u, amaterno_u, sexo_u, nacionalidad_u, fNac_u, curp_u, rfc_u, idSucursal_u, acceso_u, usuario_u, contrasena_u, notas_u, tCelular_u, tSanguineo_u, entidadFederativa_u, municipio_u, colonia_u, calle_u, cp_u, tParticular_u, tTrabajo_u, extensionTt_u, contactoEmergencia_u, tEmergencia_u, email_u, idDepartamento_u, idArea_u, idPuesto_u, idEscolaridad_u, idProfesion_u, titulo_u, cedulaProfesional_u, especialidad_u, cedulaProfesionalE_u, horario_e_lu, horario_s_lu, horario_e_ma, horario_s_ma, horario_e_mi, horario_s_mi, horario_e_ju, horario_s_ju, horario_e_vi, horario_s_vi, horario_e_sa, horario_s_sa, horario_e_do, horario_s_do, fecha_ingreso_u, universidad_u, multisucursal_u, estatus_laboral_u, estatus_escolar_u, id_titulo_u, permisos_u, universidad_e_u)";
 $sql.= "VALUES ($temporal, GeomFromText('POINT($latitud $longitud)'), $idUsuario, $nombre, $apaterno, $amaterno, $idSexo, $nacionalidad, $fechaNacimiento, $curp, $rfc, $idSucursal, $tipoUsuario, $username, $hashed_password, $notas, $tCelular, $tsanguineoP, $estado, $municipio, $colonia, $calle, $cp, $tParticular, $telefonoTrabajo, $extensionTT, $avisarA, $telefonoE, $email, $departamento, $area, $puesto, $escolaridad, $profesion, $titulo, $cedula, $especialidad, $cedula1, $horario_lu_e, $horario_lu_s, $horario_ma_e, $horario_ma_s, $horario_mi_e, $horario_mi_s, $horario_ju_e, $horario_ju_s, $horario_vi_e, $horario_vi_s, $horario_sa_e, $horario_sa_s, $horario_do_e, $horario_do_s, $now, $universidad, $tipo_acceso, $estatus_laboral, $estatus_escolar, $titulo, $permisos, $universidadE)";
  //echo $sql;
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if(!$update){echo $sql; }else{
	mysqli_select_db($horizonte, $database_horizonte);
 	$resultF = mysqli_query($horizonte, "SELECT MAX(id_u) from usuarios limit 1 ") or die (mysqli_error($horizonte));
 	$rowF = mysqli_fetch_row($resultF); $idUser = sqlValue($rowF[0], "int", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$sqlI = "UPDATE documentos set id_quien_do = $idUser where aleatorio_do = $temporal";
	$insertI = mysqli_query($horizonte, $sqlI) or die (mysqli_error($horizonte));
	
	if (!$insertI) { echo $sqlI; }else{
		mysqli_select_db($horizonte, $database_horizonte);
		$sqlJ = "UPDATE sucursales_usuarios set id_usuario_su = $idUser where aleatorio_su = $temporal";
		$insertJ = mysqli_query($horizonte, $sqlJ) or die (mysqli_error($horizonte));
		
		if (!$insertJ) { echo $sqlJ; }else{
			mysqli_select_db($horizonte, $database_horizonte);
			$sqlS = "INSERT INTO sucursales_usuarios(id_sucursal_su, id_usuario_su, usuario_su, fecha_su, primaria_su, aleatorio_su) VALUES($idSucursal, $idUser, $idUsuario, $now, 1, $temporal)";
			$insertS = mysqli_query($horizonte, $sqlS) or die (mysqli_error($horizonte));
			
			if (!$insertS) { echo $sqlS; }else{ 
				
				mysqli_select_db($horizonte, $database_horizonte);
				$sqlN = "UPDATE notas_medicas set usuario_nm = $idUser where temporal_nm = $temporal";
				$insertN = mysqli_query($horizonte, $sqlN) or die (mysqli_error($horizonte));
				
				if (!$insertN) { echo $sqlN; }else{ echo 1; }
			}
		}		
	}
}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>