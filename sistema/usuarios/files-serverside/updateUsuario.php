<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 if(isset($_POST["p_latitud_s"]) and $_POST["p_latitud_s"] != ''){$latitud = $_POST["p_latitud_s"];}else{$latitud = 18.8161;}
 if(isset($_POST["p_longitud_s"]) and $_POST["p_longitud_s"] != ''){$longitud = $_POST["p_longitud_s"];}else{$longitud = -98.954;}

 $idU = sqlValue($_POST["idUsuarioN"], "int", $horizonte);
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
 $puesto = sqlValue($_POST["puestoU"], "int", $horizonte);
 $escolaridad = sqlValue($_POST["escolaridadP"], "int", $horizonte);
 $universidad = sqlValue($_POST["universidadU"], "int", $horizonte);
 $profesion = sqlValue($_POST["profesionUsuario"], "int", $horizonte);
 $titulo = sqlValue($_POST["cTituloU"], "int", $horizonte);
 $cedula = sqlValue(mb_strtoupper($_POST["cedulaU"]), "text", $horizonte);
 $especialidad = sqlValue($_POST["especialidadU"], "int", $horizonte);
 $cedula1 = sqlValue($_POST["cedulaU1"], "text", $horizonte);
 $temporal = sqlValue($_POST["temporal_s"], "text", $horizonte);
 $universidadE = sqlValue($_POST["universidadEU"], "int", $horizonte);
  
 if($_POST["t_lunes"]==1){
 	$horario_lu_e = sqlValue($_POST["lunes_de1"], "text", $horizonte); $horario_lu_s = sqlValue($_POST["lunes_a1"], "text", $horizonte);
 }else{ $horario_lu_e = sqlValue('00:00:01', "text", $horizonte); $horario_lu_s = sqlValue('00:00:02', "text", $horizonte); }
 if($_POST["t_martes"]==1){
	 $horario_ma_e = sqlValue($_POST["martes_de1"], "text", $horizonte); $horario_ma_s = sqlValue($_POST["martes_a1"], "text", $horizonte);
 }else{ $horario_ma_e = sqlValue('00:00:01', "text", $horizonte); $horario_ma_s = sqlValue('00:00:02', "text", $horizonte); }
 if($_POST["t_miercoles"]==1){
	 $horario_mi_e = sqlValue($_POST["miercoles_de1"], "text", $horizonte); $horario_mi_s = sqlValue($_POST["miercoles_a1"], "text", $horizonte);
 }else{ $horario_mi_e = sqlValue('00:00:01', "text", $horizonte); $horario_mi_s = sqlValue('00:00:02', "text", $horizonte); }
 if($_POST["t_jueves"]==1){
	 $horario_ju_e = sqlValue($_POST["jueves_de1"], "text", $horizonte); $horario_ju_s = sqlValue($_POST["jueves_a1"], "text", $horizonte);
 }else{ $horario_ju_e = sqlValue('00:00:01', "text", $horizonte); $horario_ju_s = sqlValue('00:00:02', "text", $horizonte); }
 if($_POST["t_viernes"]==1){
	 $horario_vi_e = sqlValue($_POST["viernes_de1"], "text", $horizonte); $horario_vi_s = sqlValue($_POST["viernes_a1"], "text", $horizonte);
 }else{ $horario_vi_e = sqlValue('00:00:01', "text", $horizonte); $horario_vi_s = sqlValue('00:00:02', "text", $horizonte); }
 if($_POST["t_sabado"]==1){
	 $horario_sa_e = sqlValue($_POST["sabado_de1"], "text", $horizonte); $horario_sa_s = sqlValue($_POST["sabado_a1"], "text", $horizonte);
 }else{ $horario_sa_e = sqlValue('00:00:01', "text", $horizonte); $horario_sa_s = sqlValue('00:00:02', "text", $horizonte); }
 if($_POST["t_domingo"]==1){
	 $horario_do_e = sqlValue($_POST["domingo_de1"], "text", $horizonte); $horario_do_s = sqlValue($_POST["domingo_a1"], "text", $horizonte);
 }else{ $horario_do_e = sqlValue('00:00:01', "text", $horizonte); $horario_do_s = sqlValue('00:00:02', "text", $horizonte); }
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $estatus_laboral = sqlValue($_POST["estatusU"], "int", $horizonte); $estatus_escolar = sqlValue($_POST["estatus_ge"], "int", $horizonte);
 $tipo_acceso = sqlValue($_POST["tipo_acceso"], "int", $horizonte);
 
 $permisos = sqlValue($_POST["h_pacie"].$_POST["h_corte_r"].$_POST["h_agend"].$_POST["h_consul"].$_POST["h_rep_c"].$_POST["h_estadi_c"].$_POST["h_cat_c"].$_POST["h_hospi"].$_POST["h_enfer"].$_POST["h_notas_h"].$_POST["h_cama_h"].$_POST["h_img"].$_POST["h_endo"].$_POST["h_ultra"].$_POST["h_colpo"].$_POST["h_cat_i"].$_POST["h_tab_i"].$_POST["h_rep_i"].$_POST["h_estadi_i"].$_POST["h_lab"].$_POST["h_bases"].$_POST["h_bita_l"].$_POST["h_cat_l"].$_POST["h_tab_l"].$_POST["h_rep_l"].$_POST["h_estadi_l"].$_POST["h_serv"].$_POST["h_cat_s"].$_POST["h_tab_s"].$_POST["h_rep_s"].$_POST["h_estadi_s"].$_POST["h_puntov_m"].$_POST["h_medis"].$_POST["h_produ_f"].$_POST["h_corte_f"].$_POST["h_inv_f"].$_POST["h_rep_f"].$_POST["h_estadi_f"].$_POST["h_medi_a"].$_POST["h_promo_a"].$_POST["h_usu"].$_POST["h_sucu"].$_POST["h_corte_a"].$_POST["h_bene_a"].$_POST["h_forma_a"].$_POST["h_prod_f"].$_POST["h_config"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); //foto_u, firma_u, $foto, $firmaU, idOcupacion_u, $ocupacion, 
 $sql = "UPDATE usuarios set coordenadas_u = GeomFromText('POINT($latitud $longitud)'), nombre_u = $nombre, apaterno_u = $apaterno, amaterno_u = $amaterno, sexo_u = $idSexo, nacionalidad_u = $nacionalidad, fNac_u = $fechaNacimiento, curp_u = $curp, rfc_u = $rfc, idSucursal_u = $idSucursal, acceso_u = $tipoUsuario, notas_u = $notas, tCelular_u = $tCelular, tSanguineo_u = $tsanguineoP, entidadFederativa_u = $estado, municipio_u = $municipio, colonia_u = $colonia, calle_u = $calle, cp_u = $cp, tParticular_u = $tParticular, tTrabajo_u = $telefonoTrabajo, extensionTt_u = $extensionTT, contactoEmergencia_u = $avisarA, tEmergencia_u = $telefonoE, email_u = $email, idDepartamento_u = $departamento, idPuesto_u = $puesto, idEscolaridad_u = $escolaridad, idProfesion_u = $profesion, titulo_u = $titulo, cedulaProfesional_u = $cedula, especialidad_u = $especialidad, cedulaProfesionalE_u = $cedula1, horario_e_lu = $horario_lu_e, horario_s_lu = $horario_lu_s, horario_e_ma = $horario_ma_e, horario_s_ma = $horario_ma_s, horario_e_mi = $horario_mi_e, horario_s_mi = $horario_mi_s, horario_e_ju = $horario_ju_e, horario_s_ju = $horario_ju_s, horario_e_vi = $horario_vi_e, horario_s_vi = $horario_vi_s, horario_e_sa = $horario_sa_e, horario_s_sa = $horario_sa_s, horario_e_do = $horario_do_e, horario_s_do = $horario_do_s, universidad_u = $universidad, multisucursal_u = $tipo_acceso, estatus_laboral_u = $estatus_laboral, estatus_escolar_u = $estatus_escolar, id_titulo_u = $titulo, permisos_u = $permisos, universidad_e_u = $universidadE where id_u = $idU";
  //echo $sql;
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if(!$update){echo $sql; }else{
	mysqli_select_db($horizonte, $database_horizonte);
	$sqlI = "UPDATE documentos set id_quien_do = $idU where aleatorio_do = $temporal";
	$insertI = mysqli_query($horizonte, $sqlI) or die (mysqli_error($horizonte));
	
	if (!$insertI) { echo $sqlI; }else{ 
		mysqli_select_db($horizonte, $database_horizonte);
		$sqlJ = "UPDATE sucursales_usuarios set id_usuario_su = $idU where aleatorio_su = $temporal";
		$insertJ = mysqli_query($horizonte, $sqlJ) or die (mysqli_error($horizonte));
		
		if (!$insertJ) { echo $sqlJ; }else{ echo 1; }
	}
}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>