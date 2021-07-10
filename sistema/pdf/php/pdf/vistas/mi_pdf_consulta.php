<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
$query_usuario1 = sprintf("SELECT v.nota_interpretacion, v.nota_receta, o.sucursal_ov, v.id_vc FROM venta_conceptos v left join orden_venta o on o.referencia_ov = v.referencia_vc WHERE v.id_vc = %s", $_GET["idVC"]);
$usuario1 = mysqli_query($horizonte, $query_usuario1) or die(mysqli_error($horizonte));
$row_usuario1 = mysqli_fetch_assoc($usuario1); $totalRows_usuario1 = mysqli_num_rows($usuario1);

$id_s = sqlValue($_GET["id_s"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$resultR = mysqli_query($horizonte, "SELECT margen_e_cm, margen_p_cm, no_temp_su, margen_e_rm, margen_p_rm from sucursales where id_su = $id_s") or die (mysqli_error($horizonte));
$rowR = mysqli_fetch_row($resultR);

$idSuc = sqlValue($rowR[2], "text", $horizonte); $idVisi = sqlValue($_GET["idVC"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte); //Membrete encabezado Receta
 $resultMRE = mysqli_query($horizonte, "SELECT id_do, ext_do from documentos where aleatorio_do = $idSuc and que_es_do = 'MEMBRETE RECETA MEDICA' and tipo_quien_do = 2 and nombre_do = 'ENCABEZADO'") or die (mysqli_error($horizonte));
 $rowMRE = mysqli_fetch_row($resultMRE); $encaRM = '../../../sucursales/membretes/files/'.$rowMRE[0].'.'.$rowMRE[1];
 
 mysqli_select_db($horizonte, $database_horizonte); //Membrete pie Receta
 $resultMRP = mysqli_query($horizonte, "SELECT id_do, ext_do from documentos where aleatorio_do = $idSuc and que_es_do = 'MEMBRETE RECETA MEDICA' and tipo_quien_do = 2 and nombre_do = 'PIE'") or die (mysqli_error($horizonte));
 $rowMRP = mysqli_fetch_row($resultMRP); $pieRM = '../../../sucursales/membretes/files/'.$rowMRP[0].'.'.$rowMRP[1];
 
 mysqli_select_db($horizonte, $database_horizonte); //Membrete encabezado nota medica
 $resultMNE = mysqli_query($horizonte, "SELECT id_do, ext_do from documentos where aleatorio_do = $idSuc and que_es_do = 'MEMBRETE NOTA MEDICA' and tipo_quien_do = 2 and nombre_do = 'ENCABEZADO'") or die (mysqli_error($horizonte));
 $rowMNE = mysqli_fetch_row($resultMNE); $encaNM = '../../../sucursales/membretes/files/'.$rowMNE[0].'.'.$rowMNE[1];
 
 mysqli_select_db($horizonte, $database_horizonte); //Membrete pie nota medica
 $resultMNP = mysqli_query($horizonte, "SELECT id_do, ext_do from documentos where aleatorio_do = $idSuc and que_es_do = 'MEMBRETE NOTA MEDICA' and tipo_quien_do = 2 and nombre_do = 'PIE'") or die (mysqli_error($horizonte));
 $rowMNP = mysqli_fetch_row($resultMNP); $pieNM = '../../../sucursales/membretes/files/'.$rowMNP[0].'.'.$rowMNP[1];
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT un.nombre_e, un.id_e from venta_conceptos v left join usuarios m on m.id_u = v.usuarioEdo3_e left join catalogo_escuelas un on un.id_e = m.universidad_u where v.id_vc = $idVisi") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC); $idPac = sqlValue($rowC[1], "int", $horizonte);
 
 $idschool = sqlValue($rowC[1], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultL = mysqli_query($horizonte, "SELECT id_do,ext_do from documentos where nombre_do = 'LOGOTIPO' and tipo_quien_do = 5 and id_quien_do = $idschool") or die (mysqli_error($horizonte));
 $rowL = mysqli_fetch_row($resultL);
 
 //$fileL = '../../../escuelas/logotipos/files/'.$rowL[0].'.'.$rowL[1];
 //if(file_exists($fileL)){ $fondo='../../../escuelas/logotipos/files/'.$rowL[0].'.'.$rowL[1]; }
 //else{ $fondo=''; }
 $fondo='';
		
$orientation = 'landscape';
?>

<!-- IMPORTANTE: El contenido de la etiqueta style debe estar entre comentarios de HTML -->
<style>
<!--
#p_header {padding:0px 0; border-top: 0px none; border-bottom: 0px none; width:100%;}
#p_header .fila #col_1 {width: 100%;}

#p_footer {padding-top:5px 0; border-top: 2px none #46d; width:100%;}
#p_footer .fila td {text-align:; width:100%;}
#p_footer .fila td span {font-size: 10px; color: #000;}

#p_contenido, #p_contenido4 {margin-top:0px; width:595pt; height:1000pt; page-break-after:auto;} 
#p_contenido .mceNonEditable td, #p_contenido4 .mceNonEditable td {padding-top: 0px; text-align: justify; width:255pt;}

#p_contenido1 {margin-top:0px; width:10cm; bottom:0px;} 
#p_contenido1 tr td {padding-top: 0px; text-align: justify; width:;}
#p_contenido2 {margin-top:0px; width:100%;} #p_contenido2 tr td {padding-top: 0px; text-align: justify; width:;}

#tabla1 .fila4 #col_14 {width: 100%; border:1px solid red;}
#firmaDR img{ display:none;}
#table2 {height:1000pt; page-break-before:always; display:none;} 
-->
</style>
<!-- page define la hoja con los márgenes señalados -->
<!-- <page backtop="26mm" backbottom="22mm" backleft="8mm" backright="7mm"> PARA TDI-->
<!-- <page backtop="42mm" backbottom="24mm" backleft="8mm" backright="7mm"> PARA COVADONGA-->
<?php if($_GET["pNM"]==1){ ?>
<page backtop="<?php echo $rowR[0]*10; ?>mm" backbottom="<?php echo $rowR[1]*10; ?>mm" backleft="3mm" backright="3mm">
    <page_header> <!-- Define el header de la hoja NOTA MÉDICA-->
	<table id="p_header"><tr class="fila"><td id="col_1"><?php if($_GET["pmNM"]==1){ ?><img src="<?php } ?>
	  <?php if($_GET["pmNM"]==1){echo $encaNM;} ?><?php if($_GET["pmNM"]==1){ ?>" width="770"><?php } ?></td></tr></table>
    </page_header>
        
    <page_footer> <!-- Define el footer de la hoja -->[[page_cu]]
	<table id="p_footer"><tr class="fila"><td id="col_2"><?php if($_GET["pmNM"]==1){ ?><img src="<?php } ?><?php if($_GET["pmNM"]==1){echo $pieNM;} ?><?php if($_GET["pmNM"]==1){ ?>" width="760"><?php } ?></td></tr></table>
    </page_footer>
    <!-- Define el cuerpo de la hoja -->
    <?php echo str_replace("</p>","<br>",str_replace("<p>", "",str_replace("<br /><br />", "<br>",str_replace("<br /><br /><br />", "<br>",$row_usuario1['nota_interpretacion'])))); ?>
    <!-- Fin del cuerpo de la hoja -->
</page>
<?php } ?>

<?php if($_GET["pRM"]==1){ ?> 
<page backtop="<?php echo $rowR[3]*10; ?>mm" backimg="<?php echo $fondo; ?>" backimgx="center" backimgy="20%" backimgw="50%" backbottom="<?php echo $rowR[4]*10; ?>mm" backleft="3mm" backright="3mm">
    <page_header> <!-- Define el header de la hoja RECETA MÉDICA-->
	<table id="p_header"><tr class="fila"><td id="col_1"><?php if($_GET["pmRM"]==1){ ?><img src="<?php } ?>
	  <?php if($_GET["pmRM"]==1){echo $encaRM;} ?><?php if($_GET["pmRM"]==1){ ?>" width="770"><?php } ?></td></tr></table>
    </page_header>
        
    <page_footer> <!-- Define el footer de la hoja -->[[page_cu]]
	<table id="p_footer"><tr class="fila"><td id="col_2"><?php if($_GET["pmRM"]==1){ ?><img src="<?php } ?><?php if($_GET["pmRM"]==1){echo $pieRM;} ?><?php if($_GET["pmRM"]==1){ ?>" width="760"><?php } ?></td></tr></table>
    </page_footer>
    <?php echo str_replace("</p>","<br>",str_replace("<p>", "",str_replace("<br /><br />", "<br>",str_replace("<br /><br /><br />", "<br>",$row_usuario1['nota_receta'])))); ?>
</page>
<?php } ?>

<?php mysqli_free_result($usuario);?>
<?php mysqli_free_result($usuario1);?>
