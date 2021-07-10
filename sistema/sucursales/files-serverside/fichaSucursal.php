<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

 $idS = sqlValue($_POST["id_s"], "int", $horizonte); $tempN = sqlValue($_POST["tempo"], "text", $horizonte);
 $id_us = $_SESSION['id']; $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 	mysqli_select_db($horizonte, $database_horizonte);
 	$result = mysqli_query($horizonte, "SELECT id_su, clave_su, nombre_su, id_su, id_su, id_su, estado_su, municipio_su, ciudad_su, colonia_su, calle_su, cp_su, X(GeomFromText(AsText(coordenadas_su))), Y(GeomFromText(AsText(coordenadas_su))), telefono_su, email_su, id_su, id_su, horario_e_lu, horario_s_lu, horario_e_ma, horario_s_ma, horario_e_mi, horario_s_mi, horario_e_ju, horario_s_ju, horario_e_vi, horario_s_vi, horario_e_sa, horario_s_sa, horario_e_do, horario_s_do, id_su, id_su, p_boni_monedero_c, clues_su, p_boni_monedero_i, p_boni_monedero_l, p_boni_monedero_s, p_boni_monedero_f, no_temp_su, margen_e_cm, tamano_h_cm, margen_p_cm, margen_e_rm, tamano_h_rm, margen_p_rm, margen_e_la, tamano_h_la, margen_p_la, margen_e_im, tamano_h_im, margen_p_im, margen_e_en, tamano_h_en, margen_p_en, margen_e_ul, tamano_h_ul, margen_p_ul, margen_e_co, tamano_h_co, margen_p_co, margen_e_sm, tamano_h_sm, margen_p_sm, formato_co_su, formato_nm_su, formato_la_su, formato_im_su, formato_en_su, formato_ul_su, formato_cp_su, formato_sm_su from sucursales where id_su = $idS ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	if($row[40]==NULL or $row[40]=='NULL'){
		$row[40] = $_POST["tempo"]; $temp_u = sqlValue($_POST["tempo"], "text", $horizonte);
		
		$sqlUU = "UPDATE sucursales SET no_temp_su = $temp_u where id_su = $idS limit 1";
  	    mysqli_select_db($horizonte, $database_horizonte); $insertarUU = mysqli_query($horizonte, $sqlUU) or die (mysqli_error($horizonte));	
	}else{ }
				 
 	$datos = $row[0].";-}{".$row[1].";-}{".$row[2].";-}{".$row[3].";-}{".$row[4].";-}{".$row[5].";-}{".$row[6].";-}{".$row[7].";-}{".$row[8].";-}{".$row[9].";-}{".$row[10].";-}{".$row[11].";-}{".$row[12].";-}{".$row[13].";-}{".$row[14].";-}{".$row[15].";-}{".$row[16].";-}{".$row[17].";-}{".$row[18].";-}{".$row[19].";-}{".$row[20].";-}{".$row[21].";-}{".$row[22].";-}{".$row[23].";-}{".$row[24].";-}{".$row[25].";-}{".$row[26].";-}{".$row[27].";-}{".$row[28].";-}{".$row[29].";-}{".$row[30].";-}{".$row[31].";-}{".$row[32].";-}{".$row[33].";-}{".$row[34].";-}{".$row[35].";-}{".$row[36].";-}{".$row[37].";-}{".$row[38].";-}{".$row[39].";-}{".$row[40].";-}{".$row[41].";-}{".$row[42].";-}{".$row[43].";-}{".$row[44].";-}{".$row[45].";-}{".$row[46].";-}{".$row[47].";-}{".$row[48].";-}{".$row[49].";-}{".$row[50].";-}{".$row[51].";-}{".$row[52].";-}{".$row[53].";-}{".$row[54].";-}{".$row[55].";-}{".$row[56].";-}{".$row[57].";-}{".$row[58].";-}{".$row[59].";-}{".$row[60].";-}{".$row[61].";-}{".$row[62].";-}{".$row[63].";-}{".$row[64].";-}{".$row[65].";-}{".$row[66].";-}{".$row[67].";-}{".$row[68].";-}{".$row[69].";-}{".$row[70].";-}{".$row[71].";-}{".$row[72];

echo $datos;
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>