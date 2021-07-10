<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");

mysqli_select_db($horizonte, $database_horizonte);
$query_usuario = sprintf("SELECT variable_temporal_u FROM usuarios WHERE id_u = %s", $_GET["iduL"]);
$usuario = mysqli_query($horizonte, $query_usuario) or die(mysqli_error($horizonte));
$row_usuario = mysqli_fetch_assoc($usuario);
$totalRows_usuario = mysqli_num_rows($usuario);
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
<page backtop="26mm" backbottom="22mm" backleft="8mm" backright="7mm">
    <page_header> <!-- Define el header de la hoja -->
	<table id="p_header" border="0"><tr class="fila"><td id="col_1"><?php //echo $_GET["encL"]; ?></td></tr></table>
    </page_header>
        
    <page_footer> <!-- Define el footer de la hoja -->
	<table id="p_footer"><tr class="fila"><td id="col_2" ><?php //echo $_GET["pieL"]; ?></td></tr></table>
    </page_footer>
    <!-- Define el cuerpo de la hoja -->
    <?php //echo $row_usuario['variable_temporal1_u']; ?><!--<hr style="height:1px;"> -->
	<?php echo $row_usuario['variable_temporal_u']; ?> 
    <?php //echo $row_usuario['variable_temporal2_u']; ?>
    <!-- Fin del cuerpo de la hoja -->
</page>
<?php mysqli_free_result($usuario);?>
<?php mysqli_free_result($usuario1);?>
