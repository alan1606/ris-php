<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 if(isset($_POST["p_latitud_s"]) and $_POST["p_latitud_s"] != ''){$latitud = $_POST["p_latitud_s"];}else{$latitud = 18.8161;}
 if(isset($_POST["p_longitud_s"]) and $_POST["p_longitud_s"] != ''){$longitud = $_POST["p_longitud_s"];}else{$longitud = -98.954;}

 $temporal = sqlValue($_POST["temporal_s"], "text", $horizonte);
 $idUsuario = sqlValue($_POST["idUsuarioP"], "int", $horizonte);
 
 $clave = sqlValue(mb_strtoupper($_POST["claveS"]), "text", $horizonte);
 $nombre = sqlValue(mb_strtoupper($_POST["nombreS"]), "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $clues = sqlValue(mb_strtoupper($_POST["cluesS"]), "text", $horizonte);
  
 $estado = sqlValue(mb_strtoupper($_POST["estadoP"]), "text", $horizonte);
 $municipio = sqlValue(mb_strtoupper($_POST["municipioP"]), "text", $horizonte);
 $ciudad = sqlValue(mb_strtoupper($_POST["ciudadP"]), "text", $horizonte);
 $colonia = sqlValue(mb_strtoupper($_POST["coloniaP"]), "text", $horizonte);
 $calle = sqlValue(mb_strtoupper($_POST["calleS"]), "text", $horizonte);
 $cp = sqlValue(mb_strtoupper($_POST["cpP"]), "text", $horizonte);
 
 $telefono = sqlValue(mb_strtoupper($_POST["telefonos_s"]), "text", $horizonte);
 $email = sqlValue(strtolower($_POST["email_s"]), "text", $horizonte);
  
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
 
 $margen_e_cm = sqlValue($_POST["margen_en1"], "double", $horizonte);
 $tamano_h_cm = sqlValue($_POST["tam_mem1"], "int", $horizonte);
 $margen_p_cm = sqlValue($_POST["margen_pi1"], "double", $horizonte);
 
 $margen_e_rm = sqlValue($_POST["margen_en2"], "double", $horizonte);
 $tamano_h_rm = sqlValue($_POST["tam_mem2"], "int", $horizonte);
 $margen_p_rm = sqlValue($_POST["margen_pi2"], "double", $horizonte);
 
 $margen_e_la = sqlValue($_POST["margen_en3"], "double", $horizonte);
 $tamano_h_la = sqlValue($_POST["tam_mem3"], "int", $horizonte);
 $margen_p_la = sqlValue($_POST["margen_pi3"], "double", $horizonte);
 
 $margen_e_im = sqlValue($_POST["margen_en4"], "double", $horizonte);
 $tamano_h_im = sqlValue($_POST["tam_mem4"], "int", $horizonte);
 $margen_p_im = sqlValue($_POST["margen_pi4"], "double", $horizonte);
 
 $margen_e_en = sqlValue($_POST["margen_en5"], "double", $horizonte);
 $tamano_h_en = sqlValue($_POST["tam_mem5"], "int", $horizonte);
 $margen_p_en = sqlValue($_POST["margen_pi5"], "double", $horizonte);
 
 $margen_e_ul = sqlValue($_POST["margen_en6"], "double", $horizonte);
 $tamano_h_ul = sqlValue($_POST["tam_mem6"], "int", $horizonte);
 $margen_p_ul = sqlValue($_POST["margen_pi6"], "double", $horizonte);
 
 $margen_e_co = sqlValue($_POST["margen_en7"], "double", $horizonte);
 $tamano_h_co = sqlValue($_POST["tam_mem7"], "int", $horizonte);
 $margen_p_co = sqlValue($_POST["margen_pi7"], "double", $horizonte);
 
 $margen_e_sm = sqlValue($_POST["margen_en8"], "double", $horizonte);
 $tamano_h_sm = sqlValue($_POST["tam_mem8"], "int", $horizonte);
 $margen_p_sm = sqlValue($_POST["margen_pi8"], "double", $horizonte);
 
 $formato = sqlValue($_POST["input_a"], "text", $horizonte); $formato1 = sqlValue($_POST["input_b"], "text", $horizonte); 
 $formato2 = sqlValue($_POST["input_c"], "text", $horizonte); $formato3 = sqlValue($_POST["input_d"], "text", $horizonte);
 $formato4 = sqlValue($_POST["input_e"], "text", $horizonte); $formato5 = sqlValue($_POST["input_f"], "text", $horizonte);
 $formato6 = sqlValue($_POST["input_g"], "text", $horizonte); $formato7 = sqlValue($_POST["input_h"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO sucursales (usuario_su, clave_su, nombre_su, no_temp_su, fecha_su, estado_su, municipio_su, ciudad_su, colonia_su, calle_su, cp_su, telefono_su, email_su, coordenadas_su, horario_e_lu, horario_s_lu, horario_e_ma, horario_s_ma, horario_e_mi, horario_s_mi, horario_e_ju, horario_s_ju, horario_e_vi, horario_s_vi, horario_e_sa, horario_s_sa, horario_e_do, horario_s_do, clues_su, margen_e_cm, tamano_h_cm, margen_p_cm, margen_e_rm, tamano_h_rm, margen_p_rm, margen_e_la, tamano_h_la, margen_p_la, margen_e_im, tamano_h_im, margen_p_im, margen_e_en, tamano_h_en, margen_p_en, margen_e_ul, tamano_h_ul, margen_p_ul, margen_e_co, tamano_h_co, margen_p_co, margen_e_sm, tamano_h_sm, margen_p_sm, formato_co_su, formato_nm_su, formato_la_su, formato_im_su, formato_en_su, formato_ul_su, formato_cp_su, formato_sm_su)";
 $sql.= "VALUES ($idUsuario, $clave, $nombre, $temporal, $now, $estado, $municipio, $ciudad, $colonia, $calle, $cp, $telefono, $email, GeomFromText('POINT($latitud $longitud)'), $horario_lu_e, $horario_lu_s, $horario_ma_e, $horario_ma_s, $horario_mi_e, $horario_mi_s, $horario_ju_e, $horario_ju_s, $horario_vi_e, $horario_vi_s, $horario_sa_e, $horario_sa_s, $horario_do_e, $horario_do_s, $clues, $margen_e_cm, $tamano_h_cm, $margen_p_cm, $margen_e_rm, $tamano_h_rm, $margen_p_rm, $margen_e_la, $tamano_h_la, $margen_p_la, $margen_e_im, $tamano_h_im, $margen_p_im, $margen_e_en, $tamano_h_en, $margen_p_en, $margen_e_ul, $tamano_h_ul, $margen_p_ul, $margen_e_co, $tamano_h_co, $margen_p_co, $margen_e_sm, $tamano_h_sm, $margen_p_sm, $formato, $formato1, $formato2, $formato3, $formato4, $formato5, $formato6, $formato7)";
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT max(id_su) FROM sucursales") or die(mysqli_error($horizonte));
	$row = mysqli_fetch_row($result); $idSucu = sqlValue($row[0], "int", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$sqlI = "UPDATE documentos set id_quien_do = $idSucu where aleatorio_do = $temporal";
	$insertI = mysqli_query($horizonte, $sqlI) or die (mysqli_error($horizonte));
	if (!$insertI) { echo $sqlI; }else{ echo 1; }

}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>