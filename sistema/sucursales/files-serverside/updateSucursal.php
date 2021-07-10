<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idUsuario = sqlValue($_POST["idUsuarioP"], "int", $horizonte);
 $idSu = sqlValue($_POST["idSucursal"], "int", $horizonte);
 
 $temporal = sqlValue($_POST["temporal_s"], "text", $horizonte);
 if(isset($_POST["p_latitud_s"]) and $_POST["p_latitud_s"] != ''){$latitud = $_POST["p_latitud_s"];}else{$latitud = 18.8161;}
 if(isset($_POST["p_longitud_s"]) and $_POST["p_longitud_s"] != ''){$longitud = $_POST["p_longitud_s"];}else{$longitud = -98.954;}
 
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
  
 $sql = "UPDATE sucursales SET clave_su = $clave, nombre_su = $nombre, estado_su = $estado, municipio_su = $municipio, ciudad_su = $ciudad, colonia_su = $colonia, calle_su = $calle, cp_su = $cp, telefono_su = $telefono, email_su = $email, coordenadas_su = GeomFromText('POINT($latitud $longitud)'), horario_e_lu = $horario_lu_e, horario_s_lu = $horario_lu_s, horario_e_ma = $horario_ma_e, horario_s_ma = $horario_ma_s, horario_e_mi = $horario_mi_e, horario_s_mi = $horario_mi_s, horario_e_ju = $horario_ju_e, horario_s_ju = $horario_ju_s, horario_e_vi = $horario_vi_e, horario_s_vi = $horario_vi_s, horario_e_sa = $horario_sa_e, horario_s_sa = $horario_sa_s, horario_e_do = $horario_do_e, horario_s_do = $horario_do_s, clues_su = $clues, margen_e_cm = $margen_e_cm, tamano_h_cm = $tamano_h_cm, margen_p_cm = $margen_p_cm, margen_e_rm = $margen_e_rm, tamano_h_rm = $tamano_h_rm, margen_p_rm = $margen_p_rm, margen_e_la = $margen_e_la, tamano_h_la = $tamano_h_la, margen_p_la = $margen_p_la, margen_e_im = $margen_e_im, tamano_h_im = $tamano_h_im, margen_p_im = $margen_p_im, margen_e_en = $margen_e_en, tamano_h_en = $tamano_h_en, margen_p_en = $margen_p_en, margen_e_ul = $margen_e_ul, tamano_h_ul = $tamano_h_ul, margen_p_ul = $margen_p_ul, margen_e_co = $margen_e_co, tamano_h_co = $tamano_h_co, margen_p_co = $margen_p_co, margen_e_sm = $margen_e_sm, tamano_h_sm = $tamano_h_sm, margen_p_sm = $margen_p_sm, formato_co_su = $formato, formato_nm_su = $formato1, formato_la_su = $formato2, formato_im_su = $formato3, formato_en_su = $formato4, formato_ul_su = $formato5, formato_cp_su = $formato6, formato_sm_su = $formato7 where id_su = $idSu limit 1";
  
mysqli_select_db($horizonte, $database_horizonte);
$insertar = mysqli_query($horizonte, $sql);
 	
if(!$insertar){ echo $sql; }else{
	mysqli_select_db($horizonte, $database_horizonte);
	$sqlI = "UPDATE documentos set id_quien_do = $idSu where aleatorio_do = $temporal";
	$insertI = mysqli_query($horizonte, $sqlI) or die (mysqli_error($horizonte));
	if (!$insertI) { echo $sqlI; }else{ echo 1; }
}
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>