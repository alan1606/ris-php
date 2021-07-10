<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

$usuario = sqlValue($_POST["id_u_cf"], "int", $horizonte);
$nombreS = sqlValue($_POST["nombreS"], "text", $horizonte);
$nombreDB = sqlValue($_POST["nombreDB"], "text", $horizonte);
$periodoM = sqlValue($_POST["periodoM"], "text", $horizonte);
$diasMV = sqlValue($_POST["diasMV"], "int", $horizonte);
$now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
$tecla = sqlValue($_POST["teclaP"], "text", $horizonte);
$formato = sqlValue($_POST["input_a"], "text", $horizonte); $formato1 = sqlValue($_POST["input_b"], "text", $horizonte); $formato2 = sqlValue($_POST["input_c"], "text", $horizonte);
$formato3 = sqlValue($_POST["input_d"], "text", $horizonte); $formato4 = sqlValue($_POST["input_e"], "text", $horizonte); $formato5 = sqlValue($_POST["input_f"], "text", $horizonte);
$formato6 = sqlValue($_POST["input_g"], "text", $horizonte); $formato7 = sqlValue($_POST["input_h"], "text", $horizonte);
$link_local_s = sqlValue($_POST["link_local_s"], "text", $horizonte);
$link_local_p = sqlValue($_POST["link_local_p"], "text", $horizonte);
$link_externo_s = sqlValue($_POST["link_externo_s"], "text", $horizonte);
$link_externo_p = sqlValue($_POST["link_externo_p"], "text", $horizonte);
$sitio_web = sqlValue($_POST["sitio_web"], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO configuracion(nombre_sistema_cf, nombre_db_cf, periodo_membresia_cf, dias_avisar_membresia_cf, usuario_cf, fecha_cf, tecla_cf, formato_co_cf, formato_nm_cf, formato_la_cf, formato_im_cf, formato_en_cf, formato_ul_cf, formato_cp_cf, formato_sm_cf, link_sistema_local, link_pacs_local, link_sistema_externo, link_pacs_externo, sitio_web) VALUES ($nombreS, $nombreDB, $periodoM, $diasMV, $usuario, $now, $tecla, $formato, $formato1, $formato2, $formato3, $formato4, $formato5, $formato6, $formato7, $link_local_s, $link_local_p, $link_externo_s, $link_externo_p, $sitio_web)";
   
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if(!$update){echo $sql;}else{ echo 1;}

mysqli_close($horizonte);
?>