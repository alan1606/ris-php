<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

$id_s = sqlValue($_GET["id_s"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$resultR = mysqli_query($horizonte, "SELECT margen_e_en, margen_p_en, no_temp_su from sucursales where id_su = $id_s") or die (mysqli_error($horizonte));
$rowR = mysqli_fetch_row($resultR); $idSuc = sqlValue($rowR[2], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte); //Membrete encabezado estudios img
 $resultMNE = mysqli_query($horizonte, "SELECT id_do, ext_do from documentos where aleatorio_do = $idSuc and que_es_do = 'MEMBRETE RESULTADOS ENDOSCOPIA' and tipo_quien_do = 2 and nombre_do = 'ENCABEZADO'") or die (mysqli_error($horizonte));
 $rowMNE = mysqli_fetch_row($resultMNE); $encaNM = '../../../sucursales/membretes/files/'.$rowMNE[0].'.'.$rowMNE[1];
 
 mysqli_select_db($horizonte, $database_horizonte); //Membrete pie estudios img
 $resultMNP = mysqli_query($horizonte, "SELECT id_do, ext_do from documentos where aleatorio_do = $idSuc and que_es_do = 'MEMBRETE RESULTADOS ENDOSCOPIA' and tipo_quien_do = 2 and nombre_do = 'PIE'") or die (mysqli_error($horizonte));
 $rowMNP = mysqli_fetch_row($resultMNP); $pieNM = '../../../sucursales/membretes/files/'.$rowMNP[0].'.'.$rowMNP[1];

mysqli_select_db($horizonte, $database_horizonte);
$query_usuario = sprintf("SELECT variable_temporal_u, variable_temporal1_u, variable_temporal2_u, variable_temporal3_u, variable_temporal4_u FROM usuarios WHERE id_u = %s", $_GET["iduL"]);
$usuario = mysqli_query($horizonte, $query_usuario) or die(mysqli_error($horizonte));
$row_usuario = mysqli_fetch_assoc($usuario);
$totalRows_usuario = mysqli_num_rows($usuario);

mysqli_select_db($horizonte, $database_horizonte);
$query_usuario1 = sprintf("SELECT interpretacion_vc FROM venta_conceptos WHERE id_vc = %s", $_GET["idVC"]);
//SELECT REPLACE('www.mysql.com', 'w', 'Ww');
$usuario1 = mysqli_query($horizonte, $query_usuario1) or die(mysqli_error($horizonte));
$row_usuario1 = mysqli_fetch_assoc($usuario1);
$totalRows_usuario1 = mysqli_num_rows($usuario1);
?>

<!-- IMPORTANTE: El contenido de la etiqueta style debe estar entre comentarios de HTML -->
<style>
<!--
#p_header {padding:0px 0; border-top: 0px none; border-bottom: 0px none; width:100%;}
#p_header .fila #col_1 {width: 100%;}

#p_footer {padding-top:5px 0; border-top: 2px none #46d; width:100%;}
#p_footer .fila td {text-align:center; width:100%;}
#p_footer .fila td span {font-size: 10px; color: #000;}

#p_contenido {margin-top:0px; width:595pt; height:1000pt;} 
#p_contenido .mceNonEditable td {padding-top: 0px; text-align: justify; width:255pt;}

#p_contenido1 {margin-top:0px; width:10cm; bottom:0px;} 
#p_contenido1 tr td {padding-top: 0px; text-align: justify; width:;}
#p_contenido2 {margin-top:0px; width:100%;} #p_contenido2 tr td {padding-top: 0px; text-align: justify; width:;}

#tabla1 .fila4 #col_14 {width: 100%; border:1px solid red;}
#firmaDR img{ display:none;}
-->
</style>
<!-- page define la hoja con los márgenes señalados -->
<!-- <page backtop="26mm" backbottom="22mm" backleft="8mm" backright="7mm"> PARA TDI-->
<!-- <page backtop="42mm" backbottom="24mm" backleft="8mm" backright="7mm"> PARA COVADONGA-->
<page backtop="<?php echo $rowR[0]*10; ?>mm" backbottom="<?php echo $rowR[1]*10; ?>mm" backleft="3mm" backright="3mm">

    <page_header> <!-- Define el header de la hoja -->
	<table id="p_header"><tr class="fila"><td id="col_1"><?php if($_GET["mems"]==1){ ?><img src="<?php } ?>
	  <?php if($_GET["mems"]==1){echo $encaNM;} ?><?php if($_GET["mems"]==1){ ?>" width="770"><?php } ?></td></tr></table>
    </page_header>
        
    <page_footer> <!-- Define el footer de la hoja -->
	<table id="p_footer"><tr class="fila"><td id="col_2"><?php if($_GET["mems"]==1){ ?><img src="<?php } ?><?php if($_GET["mems"]==1){echo $pieNM;} ?><?php if($_GET["mems"]==1){ ?>" width="760"><?php } ?></td></tr></table>
    </page_footer>
    <!-- Define el cuerpo de la hoja -->
    <?php //echo $row_usuario['variable_temporal1_u']; ?><!--<hr style="height:1px;"> -->
	<?php //echo $row_usuario1['interpretacion_vc']; ?>
    <?php echo str_replace("</p>","<br>",str_replace("<p>", "",$row_usuario1['interpretacion_vc'])); ?>
    <?php //echo $row_usuario['variable_temporal2_u']; ?>
    <!-- Fin del cuerpo de la hoja -->
</page>
<?php mysqli_free_result($usuario);?>
<?php mysqli_free_result($usuario1);?>
