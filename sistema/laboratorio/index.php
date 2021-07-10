<?php require_once('../Connections/horizonte.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) { session_start(); }

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){ $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']); }

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) { header("Location: $logoutGoTo"); exit;}
}
?>
<?php
if (!isset($_SESSION)) { session_start(); }
$MM_authorizedUsers = "1,2,3,4,5,6,7,8,9,10,11,12,13";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { $isValid = true; } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { $isValid = true; } 
    if (($strUsers == "") && false) { $isValid = true; }
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) { $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (isset($_SESSION['MM_Username'])) { $colname_usuario = $_SESSION['MM_Username']; }
mysqli_select_db($horizonte, $database_horizonte);
$query_usuario = sprintf("SELECT id_u, nombre_u, apaterno_u, amaterno_u, idSucursal_u, usuario_u, idDepartamento_u, idPuesto_u, acceso_u, sexo_u, foto_u, nombreFoto_u FROM usuarios WHERE usuario_u = %s", GetSQLValueString($colname_usuario, "text"));
$usuario = mysqli_query($horizonte, $query_usuario) or die(mysqli_error($horizonte));
$row_usuario = mysqli_fetch_assoc($usuario);
$totalRows_usuario = mysqli_num_rows($usuario);

mysqli_select_db($horizonte, $database_horizonte);
$query_nombreSucursalUsuario = sprintf("SELECT nombre_su FROM sucursales WHERE clave_su = %s", GetSQLValueString($row_usuario['idSucursal_u'], "text"));
$nombreSucursalUsuario = mysqli_query($horizonte, $query_nombreSucursalUsuario) or die(mysqli_error($horizonte));
$row_nombreSucursalUsuario = mysqli_fetch_assoc($nombreSucursalUsuario);
$totalRows_nombreSucursalUsuario = mysqli_num_rows($nombreSucursalUsuario);

mysqli_select_db($horizonte, $database_horizonte);
$query_nombreDepartamentoUsuario = sprintf("SELECT nombre_d FROM departamentos WHERE id_d = %s", GetSQLValueString($row_usuario['idDepartamento_u'], "int"));
$nombreDepartamentoUsuario = mysqli_query($horizonte, $query_nombreDepartamentoUsuario) or die(mysqli_error($horizonte));
$row_nombreDepartamentoUsuario = mysqli_fetch_assoc($nombreDepartamentoUsuario);
$totalRows_nombreDepartamentoUsuario = mysqli_num_rows($nombreDepartamentoUsuario);

mysqli_select_db($horizonte, $database_horizonte);
$query_fechaRangoInicial = "SELECT fecha_venta_vc FROM venta_conceptos where tipo_concepto_vc = 3 ORDER BY fecha_venta_vc ASC limit 1";
$fechaRangoInicial = mysqli_query($horizonte, $query_fechaRangoInicial) or die(mysqli_error($horizonte));
$row_fechaRangoInicial = mysqli_fetch_assoc($fechaRangoInicial);
$totalRows_fechaRangoInicial = mysqli_num_rows($fechaRangoInicial);

mysqli_select_db($horizonte, $database_horizonte);
$query_fechaRangoFinal = "SELECT fecha_venta_vc FROM venta_conceptos where tipo_concepto_vc = 3 ORDER BY fecha_venta_vc DESC limit 1";
$fechaRangoFinal = mysqli_query($horizonte, $query_fechaRangoFinal) or die(mysqli_error($horizonte));
$row_fechaRangoFinal = mysqli_fetch_assoc($fechaRangoFinal);
$totalRows_fechaRangoFinal = mysqli_num_rows($fechaRangoFinal);
?>
<!doctype html>
<html>
<head>
<link rel="shortcut icon" href="../imagenes/favicon.ico">
<meta charset="utf-8">
<title>RESULTADOS LABORATORIO</title>

<link href="../css/plantilla.css" rel="stylesheet" type="text/css">
<link href="../jquery-ui-1.12.0/jquery-ui.min.css" rel="stylesheet">
<link href="../jQuery-TE_v.1.4.0/jquery-te-1.4.0.css" rel="stylesheet">
<link href="../DataTables-1.10.5/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css">

<script src="../jquery-ui-1.12.0/external/jquery/jquery.js"></script>
<script src="../jquery-ui-1.12.0/external/jquery/globalize.js"></script>
<script src="../jquery-ui-1.12.0/external/jquery/globalize.culture.de-DE.js"></script>
<script src="../jquery-ui-1.12.0/jquery-ui.js"></script>
<script src="../DataTables-1.10.5/media/js/jquery.dataTables.js"></script>
<script src="../DataTables-1.10.5/extensions/Scroller/js/dataTables.scroller.js"></script>
<script src="../jquery-validation-1.9.0/jquery.validate.js"></script>
<script src="../funciones/js/caracteres.js"></script>
<script src="../funciones/js/retardo.js"></script>
<script src="../funciones/js/jquery.printElement.min.js"></script>
<script src="../jQuery-TE_v.1.4.0/uncompressed/jquery-te-1.4.0.js" type="text/javascript" charset="utf-8"></script>
<script src="takeArchivos/ajaxupload.js" type="text/javascript"></script>
<script src="../funciones/js/jquery.media.js" type="text/javascript"></script>

<script>
$(document).tooltip({ position: { my: "center bottom-20",	at: "center top", using: function( position, feedback ) { $( this ).css( position ); $( "<div>" ).addClass( "arrow" ).addClass( feedback.vertical ).addClass( feedback.horizontal ).appendTo( this ); } } });

$(document).ready(function(e) {
	$('#form-captura').validate({
		rules:{ diagnostico:{ required:true } }, messages:{ diagnostico:{ required:'Debe ingresar el diagnóstico' } }
	});
	
    //Refrescamos la sesión para que no caduque
	setInterval(function(){$.post('../remote_files/refresh_session.php');},500000);
	
	$('#miMenu').hide(); $('#verMenu').click(function(e){window.location='../menu.php?menu=ml';}); 
	
	var i = 1;
	
	$('#dispara_menu').click(function(e) { i++;
		if(i%2==0){
			$('#header').after('<div id="div_menu" class="ver_menu" style="border:1px none red; z-index:1000000000000; position:fixed; width:240px;"><table height="100%" width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td align="left"><ul id="menu_u1" style="border-bottom-left-radius:4px;border-bottom-right-radius:4px;"><li><div id="mi_perfil"><span class="ui-icon ui-icon-person"></span> Mi perfil</div></li><li><div><span class="ui-icon ui-icon-gear"></span> Configuración</div></li><li><div><span class="ui-icon ui-icon-power"></span> <a href="<?php echo $logoutAction ?>">Cerrar sesión</a></div></li><li><div id="ayuda"><span class="ui-icon ui-icon-info"></span> Ayuda</div></li><li><div id="reportar_problema"><span class="ui-icon ui-icon-wrench"></span> Reportar problema</div></li><li><div id="politicas_condiciones"><span class="ui-icon ui-icon-script"></span> Políticas y condiciones</div></li><li><div id="aviso_privacidad"><span class="ui-icon ui-icon-alert"></span> Aviso de privacidad</div></li><li><div id="acerca_de"><span class="ui-icon ui-icon-star"></span> Acerca de</div></li><li><div id="mi_chat"><span class="ui-icon ui-icon-comment"></span> Chat</div></li></ul></td></tr></table></div>');
			$('#div_menu').css('top',$('#header').height()+0); $('#menu_u1').menu(); 
			$('#mi_perfil').click(function(e){ window.location="usuarios/perfil.php"; });
			$('#div_menu').css('right',104);
			$('#dispara_menu span').removeClass('ui-icon-triangle-1-s'); $('#dispara_menu span').addClass('ui-icon-triangle-1-n');
			$('#contenido').click(function(e){ 
				$('#div_menu').remove(); i = 1;
				$('#dispara_menu span').removeClass('ui-icon-triangle-1-n');
				$('#dispara_menu span').addClass('ui-icon-triangle-1-s');
			});
		}else{ 
			$('#dispara_menu span').removeClass('ui-icon-triangle-1-n'); $('#dispara_menu span').addClass('ui-icon-triangle-1-s');
			$('#div_menu').remove(); 
		}
    });
	
});

$(document).ready(function(e) {
    $('#dialog-alertar').dialog({
		autoOpen: false, modal: true, width: 600, height: 150, resizable: false, closeOnEscape: true, 
		closeText:'', title: "ACCESO DENEGADO", dialogClass: '',
		open: function( event, ui ) { window.setTimeout(function(){$('#dialog-alertar').dialog('close');},2000); }
	});
});
//para fintro individual por campo de texto
var asInitVals = new Array();
//fin para filtro individual por campo de texto

$(document).ready(function() {
	$( "#progressbar" ).progressbar({ value: false });
	  
	$('#dialog-subiendo').dialog({ autoOpen: false, modal: true, closeOnEscape: false, width: 620, height:150, title: 'CARGANDO ARCHIVO', closeText: '', dialogClass: 'no-close', open:function( event, ui ){ } });
	$('#dialog-alerta').dialog({ autoOpen: false, modal: true, width: 620, height:150, title: '¡ATENCIÓN!', closeText: '', open:function( event, ui ){ window.setTimeout(function(){$('#dialog-alerta').dialog('close');},2500); } });
	
	var tam = $('#referencia').height() - 145;
	
	oTable = $('#dataTable').dataTable({
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { myFunction(); },
		"bJQueryUI": true, "bScrollInfinite": true, "bScrollCollapse": true, "sScrollY": tam, "bAutoWidth": false, 
		"bStateSave": false, "bInfo": false, "bFilter": true, "aaSorting": [[0, "asc"]], ordering: false,
		"aoColumns": [
			{ "bSortable": false }, { "bSortable": false },{ "bSortable": false }, { "bSortable": false }, 
			{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }
		],
		"iDisplayLength": 100000, "bLengthChange": false, "bProcessing": false, "bServerSide": true, "sDom": '<"data_t"t><"info"i>', "sAjaxSource": "datatable-serverside/estudios.php",
		"fnServerParams": function (aoData, fnCallback) { 
			var de = document.getElementById('fechaDe').value+' 00:00:00'; 
			var a = $('#fechaA').val()+' 23:59:59';
			var sucu = $('#idSuU').val();
			var acceso = $('#accesoU').val(); 
			var idU = $('#idUser').val(); 
			aoData.push(  {"name": "min", "value": de } ); 
			aoData.push(  {"name": "max", "value": a } );
			aoData.push(  {"name": "sucu", "value": sucu } ); 
			aoData.push(  {"name": "acceso", "value": acceso } );
			aoData.push(  {"name": "idU", "value": idU } );
		},
		"aLengthMenu": [[9, 25, 50, 100, -1], [9, 25, 50, 100, "Todos"]],
		"oLanguage": { "sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered": "&nbsp;TOTAL DE ESTUDIOS: _MAX_", "sSearch": "BUSCAR" }
	});//fin data table
	
	$('#clickme').click(function(e) { oTable.fnDraw(); myFunction(); });
	
	//para los fintros individuales por campo de texto
	$("tfoot input").keyup( function () { /* Filter on the column (the index) of this element */ oTable.fnFilter( this.value, $("tfoot input").index(this) ); });
    /* * Support functions to provide a little bit of 'user friendlyness' to the textboxes in  * the footer */
    $("tfoot input").each( function (i) { asInitVals[i] = this.value; } );
     
    $("tfoot input").focus( function () { if ( this.className == "search_init" ) { this.className = ""; this.value = "";myFunction(); } } );
     
    $("tfoot input").blur( function (i) { if ( this.value == "" ) { this.className = "search_init"; this.value = asInitVals[$("tfoot input").index(this)];myFunction(); } } );
	//fin filtros individuales por campo de texto
		
	$('#radio1').click(function(e) { $('#fechaDe').val('<?php echo date("Y-m-d"); ?>'); $('#fechaA').val('<?php echo date("Y-m-d"); ?>'); oTable.fnDraw(); });
	$('#radio2').click(function(e) { $('#fechaDe').val('2000-01-01'); $('#fechaA').val('<?php echo date("Y-m-d"); ?>'); oTable.fnDraw(); });
	$( "#fechaDe" ).datepicker({
	  	defaultDate: "-1", maxDate: +0,
		onClose: function( selectedDate ) { $( "#fechaA" ).datepicker( "option", "minDate", selectedDate ); },
		"onSelect": function(date) { min = date+' 00:00:00'; oTable.fnDraw(); }
	}).css('max-width','100px');
	$( "#fechaA" ).datepicker({
		defaultDate: "+0", maxDate: +0,
		onClose: function( selectedDate ) { $( "#fechaDe" ).datepicker( "option", "maxDate", selectedDate ); },
		"onSelect": function(date) { max = date+' 23:59:59'; oTable.fnDraw(); }
	}).css('max-width','100px');
			
});

jQuery(function($){
    $.datepicker.regional['es'] = {//dateFormat: 'mm/dd/yy',
        closeText: 'Cerrar', changeMonth: true, changeYear: true, numberOfMonths: 3, dateFormat: "yy-mm-dd", prevText: '&#x3c;Ant', nextText: 'Sig&#x3e;', currentText: 'Hoy',
        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun', 'Jul','Ago','Sep','Oct','Nov','Dic'], 
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
        dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'], dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'], weekHeader: 'Sm',
        firstDay: 1, isRTL: false, showMonthAfterYear: false,
    yearSuffix: ''};
    $.datepicker.setDefaults($.datepicker.regional['es']);
});
$(document).ready(function(e) {
	var divRangoFechas = $('#divRangoFechas');
	divRangoFechas.css('width','80%').css('float','left').css('border-width','1px').css('border-style','none').css('color','white');
	
	$( '#rangosFechas' ).buttonset().css('font-size','0.9em');
	$('.rad').css('font-size','0.8em');
	
	$('#input').jqte();
});
</script>

</head>

<body>

<div id="referencia" style="display:none; position:fixed; width:100%; height:100%; z-index:1000000000000000000000;"></div>

<input name="idUser" type="hidden" id="idUser" value="<?php echo $row_usuario['id_u']; ?>">
<input name="idSuU" type="hidden" id="idSuU" value="<?php echo $row_usuario['idSucursal_u']; ?>">
<input name="accesoU" type="hidden" id="accesoU" value="<?php echo $row_usuario['acceso_u']; ?>">
<input name="nombreTempPdf" id="nombreTempPdf" type="hidden" value="">
<input name="id_vc_ini" id="id_vc_ini" type="hidden" value="">
<input name="usuario_ini" id="usuario_ini" type="hidden" value="<?php echo $row_usuario['usuario_u']; ?>">
<input name="campoUrl" id="campoUrl" type="hidden" value="">

<div id="header" class="header ver_menu">
    <table height="100%" width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="120" align="right" class="iconito"><img src="../imagenes/iconitos/_iconoEstudiosLab.png" height="40"></td>
        <td align="left" valign="middle" nowrap><span id="verMenu" style="cursor:pointer;">RESULTADOS DE LABORATORIO</span></td>
        <td width="1%" nowrap valign="middle">
            <td width="1%" nowrap valign="middle">
        	<span id="dispara_menu">
            	<?php if($row_usuario['foto_u'] == 1){?>
                	<img class="fotoUsuario" id="miFotoUsuarioMini" src="../usuarios/imagenes/perfil/<?php echo $row_usuario['nombreFoto_u']; ?>" width="21">
                <?php }else{?>
                	<img class="fotoUsuario" id="miFotoUsuarioMini" src="../usuarios/takePicture/fotografiasPerfil/<?php if($row_usuario['sexo_u'] == 1){echo 'm';}else{echo 'h';} ?>.jpg" width="21">
                <?php }?>
            	<?php echo $row_usuario['usuario_u']; ?> <span class="ui-icon ui-icon-triangle-1-s"></span>
            </span>
        </td>
        <td width="100" nowrap align="left"> </td>
      </tr>
    </table>
</div>
  
<div class="contenido" id="contenido" align="center" style="padding-top:3px;">

  <table width="100%" height="100%" border="0" cellpadding="4" cellspacing="1" id="dataTable" class="tablilla">
    <thead id="cabecera_tBusquedaP">
      <tr class="titulos_dataceldas">
        <th id="clickme">#</th>
        <th>PACIENTE</th>
        <th width="120px;">REFERENCIA</th>
        <th>ESTUDIO</th>
     	<th width="80px;">ESTATUS</th>
        <th width="80px;">ÁREA</th>
        <th width="80px;">SUCURSAL</th>
      </tr>
    </thead>
    <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
    <tfoot>
    	<tr bgcolor="#FF6633">
        	<td><input name="sPaciente0" id="sPaciente0" type="hidden" class="search_init" style="width:90%;" /></td>
        	<td>
            <input name="sPaciente" id="sPaciente" type="text" placeholder="Paciente" class="search_init" style="width:90%;" />
            </td>
        	<td>
            <input name="sPaciente1" id="sPaciente1" type="text" placeholder="Referencia" class="search_init" style="width:90%;" />
            </td>
        	<td>
            <input name="sPaciente2" id="sPaciente2" type="text" placeholder="Estudio" class="search_init" style="width:90%;" />
            </td>
        	<td>
            <input name="sPaciente3" id="sPaciente3" type="text" placeholder="Estatus" class="search_init" style="width:90%;" />
            </td>
     		<td>
            <input name="sPaciente4" id="sPaciente4" type="text" placeholder="Área" class="search_init" style="width:90%;" />
            </td>
			<td>
            <input name="sPaciente5" id="sPaciente5" type="text" placeholder="Sucursal" class="search_init" style="width:90%;" />
            </td>
        </tr>
    </tfoot>
  </table>
  
  <div id="divRangoFechas">
  <table width="" height="" border="0" cellpadding="3" cellspacing="0" width="" style="float:left; color:black">
  <tr>
    <td>De </td> <td><input name="fechaDe" class="fechas" type="text" id="fechaDe" value="<?php echo date("Y-m-d"); ?>" readonly ></td>
    <td>A </td> <td><input name="fechaA" type="text" class="fechas" id="fechaA" value="<?php echo date("Y-m-d"); ?>" readonly ></td>
    <td id="rangosFechas">
    	<input type="radio" class="rad" id="radio1" name="radio" /><label for="radio1">Hoy</label> 
        <input type="radio" class="rad" id="radio2" name="radio" /><label for="radio2">Todos</label>
    </td>
  </tr>
</table>
</div>
  
</div>

<div id="dialog-captura" style="display:none; background-image:; text-align:left; background-size:cover; background-repeat:no-repeat; background-position:center;">
<form style="height:100%; width:100%;" action="" method="get" name="form-captura" id="form-captura" target="_self">
<input name="myIDestudio" id="myIDestudio" class="myIDestudio" type="hidden">
<input name="myIDusuario" type="hidden" class="myIDusuario" id="myIDusuario" value="<?php echo $row_usuario['id_u']; ?>">
<table id="tCaptura" width="100%" height="100%" border="0" cellspacing="5" cellpadding="0" style="color:white;" align="left">
  <tr>
    <td width="100px" height="1%" nowrap>Paciente</td>
    <td><span class="myPaciente"></span></td>
    <td><span class="myEdad"></span></td>
    <td><span class="mySexo"></span></td>
  </tr>
  <tr>
    <td nowrap height="1%">Referencia</td>
    <td colspan=""><span class="myReferencia"></span></td>
    <td nowrap>Fecha</td>
    <td colspan=""><span class="myFecha"></span></td>
  </tr>
  
  <tr><td colspan="" height="1%">Nota del radiólogo</td><td colspan="3"> <span class="myNotaTR"></span> </td></tr>
    
    <tr><td colspan="4" height="1%">Diagnóstico:</td></tr>
    <tr id="contieneET"><td colspan="4">
        <input style="height:90px; resize:none;" name="input" id="input" type="text" value="ESCRIBA AQUÍ EL DIAGNÓSTICO DEL ESTUDIO" class="jqte-test">
        <input name="miDiagnostico" id="miDiagnostico" type="hidden">
    </td></tr>
  
</table>

<table id="tablaUsuariosEstados" width="100%" border="0" cellspacing="0" cellpadding="2" style="color:black; font-size:0.8em;">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td nowrap width="1%">USUARIO ASIGNÓ ESTUDIO</td>
        <td>
        <input class="campoCaptura" name="usuarioAsignaE" id="usuarioAsignaE" type="text" readonly>
        </td>
        <td nowrap width="1%">FECHA ASIGNÓ ESTUDIO</td>
        <td>
        <input class="campoCaptura" name="fechaAsignaE" id="fechaAsignaE" type="text" readonly>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="1" cellpadding="3">
      <tr>
        <td nowrap width="12.5%">USUARIO PROCESÓ</td>
        <td width="12.5%">
        <input class="campoCaptura" name="usuarioProcesoE" id="usuarioProcesoE" type="text" readonly>
        </td>
        <td nowrap width="1%">FECHA</td>
        <td width="12.5%">
        <input class="campoCaptura" name="horaProcesoE" id="horaProcesoE" type="text" readonly>
        </td>
        <td nowrap width="12.5%">USUARIO REALIZA</td>
        <td width="12.5%">
        <input class="campoCaptura" name="usuarioRealizaE" id="usuarioRealizaE" type="text" readonly>
        </td>
        <td nowrap width="1%">FECHA</td>
        <td width="12.5%">
        <input class="campoCaptura" name="horaRealizaE" id="horaRealizaE" type="text" readonly>
        </td>
      </tr>
      <tr>
        <td nowrap width="12.5%">USUARIO CAPTURA</td>
        <td width="12.5%">
        <input class="campoCaptura" name="usuarioCapturaE" id="usuarioCapturaE" type="text" readonly>
        </td>
        <td nowrap width="1%">FECHA</td>
        <td width="12.5%">
        <input class="campoCaptura" name="horaCapturaE" id="horaCapturaE" type="text" readonly>
        </td>
        <td nowrap width="12.5%">USUARIO INTERPRETA</td>
        <td width="12.5%">
        <input class="campoCaptura" name="usuarioInterpretaE" id="usuarioInterpretaE" type="text" readonly>
        </td>
        <td nowrap width="1%">FECHA</td>
        <td width="12.5%">
        <input class="campoCaptura" name="horaInterpretaE" id="horaInterpretaE" type="text" readonly>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>
</form>
</div>

<div id="dialog-confirmCaptura" style="display:none;">
<input name="preImprimir" id="preImprimir" type="hidden">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="3">
  <tr> <td>¡El resultado del estudio se ha guardado satisfactoriamente!</td> </tr>
  <tr> <td style="color:red;">Recomendamos que autorice de inmediato el resultado... Se abrirá la ventana de autorización.</td> </tr>
</table>
</div>

<div id="dialog-confirmInterpretacion" style="display:none;">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> <td align="center">¡El estudio se ha autorizado satisfactoriamente!</td> </tr>
  <tr> <td align="center">¿Desea imprimir el resultado del estudio?</td> </tr>
</table>
</div>

<div id="dialog-impresion" style="display:none;">
<div id="impresionEndo"> <div class="miEnca" id="para_encabezado" style="height:2.5cm;"></div>
<table id="tablaImpresion" width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:0.9em;">
  <tr height="1px" style="max-height:100px;">
    <td height="3%" id="miEncabezado" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="miEncabezadoT">
              <tr> 
                <td width="50%" align="left">
                <table width="100%" border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td width="1%" nowrap>PACIENTE: </td>
                    <td class="myPacienteP" nowrap style="font-weight:bold;"> </td>
                  </tr>
                </table>
                </td>
                <td width="50%" align="left">
                <table width="100%" border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td class="myEdadP" align="left" width="1%" nowrap></td> 
                    <td class="mySexoP" align="left" width=""></td> 
                  </tr>
                </table>
                </td>
              </tr>
            </table>
        </td>
      </tr>
      <tr>
        <td>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
              	<td width="50%" align="left">
                <table width="100%" border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td width="1%" nowrap>Dr(a). </td>
                    <td class="myMedicoP" nowrap> </td>
                  </tr>
                </table>
                </td>
                <td width="50%" align="left">
                <table width="100%" border="0" cellspacing="0" cellpadding="1">
                  <tr>
                  	<td nowrap width="1%" align="left">FECHA</td> 
                	<td class="myUnidadMedicaP0" align="left" width="" nowrap>
                    	<span class="myFechaP"></span>
                    </td>
                  </tr>
                </table>
                </td>
              </tr>
            </table>
        </td>
      </tr>
      <tr>
        <td width="100%">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="miEncabezadoF">
              <tr> 
              	<td width="50%" nowrap align="left">
                <table width="100%" border="0" cellspacing="0" cellpadding="1">
                  <tr> 
                    <td class="myEstudioP" align="left" style="font-weight:bold;" nowrap></td> 
                  </tr>
                </table>
                </td>
                <td align="left" width="">
                	<td width="50%" align="right">
                        <table width="100%" border="0" cellspacing="0" cellpadding="1">
                          <tr>
                          	<td width="1%" nowrap align="left">REFERENCIA:</td>
                            <td align="left" width="1%" nowrap><span class="myReferenciaP" style="font-weight:bold;"></span></td> 
                            <td width="1%" nowrap align="left">ESTUDIO:</td>
                            <td align="left"> <span class="myNoEstudio"></span> </td> 
                          </tr>
                        </table>
                    </td>
                </td> 
              </tr>
            </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr height="1%">
    <td class="punteado_fondo" style="padding-bottom:10px;" valign="top">
    <table width="100%" height="" border="0" cellspacing="0" cellpadding="0">
    	<tr height="1px">
        <td>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
              	<td width="1%" align="left" nowrap>
                <table width="100%" border="0" cellspacing="0" cellpadding="1">
                  <tr style="font-size:9px;" class="metod">
                    <td width="1%" nowrap valign="top">MUESTRA: </td>
                    <td class="myMuestraP" nowrap> </td>
                  </tr>
                </table>
                </td>
                <td width="" align="left" height="1px">
                <table width="100%" border="0" cellspacing="0" cellpadding="1">
                  <tr style="font-size:9px;" class="metod">
                    <td width="1%" nowrap align="left" valign="top">MÉTODO: </td>
                    <td class="myMetodoP" align="left" width=""></td> 
                  </tr>
                </table>
                </td>
              </tr>
            </table>
        </td>
      </tr>
      <tr height="1%"> <td class="myDiagnosticoP" align="left" valign="top">a</td> </tr>
      <tr height=""> <td class="myNotaToma" align="left" valign="top"> </td> </tr>
    </table>
    </td>
  </tr>
  <tr height="1%">
    <td class="myFirmaP" valign="bottom">
    <table height="1%" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr> 
      	<td width="50%" height="50">&nbsp;</td> 
        <td id="firmaDR" align="center" height="110"> </td> 
      </tr>
      <tr>
      	<td>&nbsp;</td> 
        <td nowrap align="center"><span class="dr"></span>&nbsp;<span class="nombreDR"></span></td> 
      </tr>
      <tr> 
      	<td>&nbsp;</td> 
        <td nowrap align="center"><span class="puestoDR"></span>&nbsp;CEDULA PROFESIONAL&nbsp;<span class="cedula"></span></td> 
      </tr>
    </table>
    </td>
  </tr>
</table>
<div class="miEnca" id="para_pie" style="height:2.5cm;"></div> </div>
</div>

<div id="dialog-est" style="display:none;">
<table width="100%" height="100%" border="0" cellspacing="3" cellpadding="3" style="border-radius:4px;">
  <tr> <td width="1px" nowrap class="titulosTabla">PACIENTE</td> <td align="left"> <input class="campoDatosTabla" name="paciente_est" id="paciente_est" type="text" readonly style="text-align:left; width:90%;"> </td> </tr>
  <tr> <td class="titulosTabla">ESTUDIO</td> <td align="left"> <input class="campoDatosTabla" name="folio_est" id="folio_est" type="text" readonly style="text-align:left; width:90%;"> </td> </tr>
  <tr> <td class="titulosTabla">REFERENCIA</td> <td align="left"> <input class="campoDatosTabla" name="referencia_est" id="referencia_est"type="text" style="text-align:left; width:90%;" readonly> </td> </tr>
  
  <tr> <td class="titulosTabla">Osirix Local</td> <td align="left"> 
  <a href="osirix://?methodName=DownloadURL&Display=YES&URL='http://192.168.1.59:3333/wado?requestType=WADO&studyUID=1.3.51.0.7.14163771183.54367.43849.37406.22234.65265.49021'"><img src="../imagenes/osirix.png"></a> </td> <td class="titulosTabla">Osirix Internet</td> <td align="left"> 
  <a href="osirix://?methodName=DownloadURL&Display=YES&URL='http://sigma-csa.ddns.net:3333/wado?requestType=WADO&studyUID=1.3.51.0.7.14163771183.54367.43849.37406.22234.65265.49021'"><img src="../imagenes/osirix.png"></a> </td> </tr>
</table>
</div>
<input name="titleEst" id="titleEst" value="" type="hidden">

<div id="dialog-procesar" style="display:none;"> </div>

<div id="dialog-reiniciar" style="display:none;"> <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td id="">¿Realmente desea reiniciar el estudio?</td> </tr> </table> </div>

<div id="dialog-alerta" style="display:none;"> <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td id="miAlerta">&nbsp;</td> </tr> </table> </div>
<div id="dialog-subiendo" style="display:none;"> <div id="progressbar"></div> </div>
<div id="dialog-visualizador" style="display:none;"> </div>
<div id="dialog-pregunta" style="display:none;"> <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td id="miPregunta">&nbsp;</td> </tr> </table> </div>
<div id="dialog-entregar" style="display:none;"> <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center" valign="middle" height="100%">Para entregar el estudio con referencia <span id="referenciaEntregar" style="font-weight:bold;"></span>, dé click en aceptar.</td></tr></table> </div>
<div id="dialog-informar" style="display:none;"><table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center" valign="middle" height="100%"><span id="texto-informar"></span></td></tr></table></div>

<div id="dialog-editar" style="display:none;">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="2">
  <tr> <td align="justify">Esta seguro de querer editar los resultados del estudio <span class="estudioEdit"></span> de la referencia <span class="referenciaEdit"></span> del paciente <span class="pacienteEdit"></span>?</td> </tr>
  <tr> <td align="left">
  	<form action="" method="post" name="formEdita" id="formEdita" target="_self">
    	Confirmar <input name="editarInterpretacionC" type="checkbox" value="" id="editarInterpretacionC">
    </form>
  </td> </tr>
  <tr> <td align="center" style="font-size:0.7em; color:red;">
  	<span style="display:none;" id="errorEditar">Debe confirmar la instrucción.</span>
  </td> </tr>
</table>
</div>

<div id="dialog-confirmacion" style="display:none;">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="3">
  <tr> <td id="textoConfirma">¡El estudio se ha transferido satisfactoriamente!</td> </tr>
</table>
</div>

<div id="dialog-alertar" class="dialogos">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="3">
  <tr> <td id="textoAlertar">¡Lo sentimos, usted no puede realizar esta acción!</td> </tr>
</table>
</div>

<div id="dialog-nivel1" class="dialogos"> </div>

<input name="myIDestudioT" id="myIDestudioT" class="" type="hidden">
<input name="myIDpacienteT" id="myIDpacienteT" class="" type="hidden">
<input name="myNameEstudioT" id="myNameEstudioT" class="" type="hidden">

</body>
</html>
<?php
mysqli_free_result($usuario);
mysqli_free_result($nombreSucursalUsuario);
mysqli_free_result($nombreDepartamentoUsuario);
mysqli_free_result($fechaRangoInicial);
mysqli_free_result($fechaRangoFinal);
?>
<script>
function entregaE(idVC){ $(document).ready(function(e) {var idVC1 = {idVC:idVC}
	$.post('files-serverside/datosEntregar.php',idVC1).done(function(data){ var datosEN = data.split(';*-'); 
		var title = 'ENTREGAR ESTUDIO. PACIENTE '+datosEN[0]; $('#referenciaEntregar').text(datosEN[1]);
		$('#dialog-entregar').dialog({ 
			autoOpen: true, modal: true, width: 700, height: 200, closeOnEscape: false, title: title, closeText: '',
			buttons: {
				'Aceptar': function() { var idVC2 = {idVC:idVC, idU:$('#idUser').val()}
					$.post('files-serverside/entregar.php',idVC2).done(function(data){ 
						if(data==1){ $('#clickme').click();
							$('#texto-informar').text('Se confirma que el estudio ha sido entregado.');
							$('#dialog-informar').dialog({ autoOpen: true, modal: true, width: 600, height:200, title: 'ESTUDIO ENTREGADO', closeText: '', 
							open:function( event, ui ){ $('#dialog-entregar').dialog('close'); $('#clickme').click(); window.setTimeout(function(){$('#dialog-informar').dialog('close');},2000);}
							});
						}else{alert(data);}
					});
				}, 'Cerrar': function() {  $( this ).dialog( "close" ); }
			}
		});
	});
}); }

$(document).ready(function(e) {
	var tamHX = $('#referencia').height() - 100, tamWX = $('#referencia').width() * 0.95;
	
	$('#dialog-pregunta').dialog({autoOpen:false,modal:true,width:600,height:220,title:'¡ATENCIÓN!',closeText:'',open:function( event, ui ){ } });
	
	$('#dialog-procesar').dialog({ autoOpen: false, modal: true, width: tamWX, height: tamHX, resizable: false, closeOnEscape: false, closeText:'', title: "PROCESAR ESTUDIO(S)", dialogClass: 'no-close' });//fin del dialog procesar
	
	$('#dialog-impresion').dialog({
		autoOpen: false, modal: true, width: tamWX, height: tamHX, resizable: false, closeOnEscape: true, closeText:'', title: "IMPRESIÓN HOJA DE RESULTADO",
		buttons: { Imprimir: function(){ $('#tablaImpresion').printElement(); }, Cerrar: function() { $(this).dialog("close"); } }
	});//fin del dialog impresion
	
    $('#dialog-captura').dialog({
		autoOpen: false, modal: true, width: tamWX, height: tamHX, resizable: false, closeOnEscape: true, closeText:'',
		close: function( event, ui ) { document.getElementById('form-captura').reset(); }
	});//fin del dialog rMasto
	
});
function myFunction(){
 setTimeout(function(){
	$(document).ready(function(e) {
		var allBotonesIcono = $('.botonaso'); allBotonesIcono.css('width','25px').css('height','25px');
		
		$('.icono_proceso').button({      icons: { primary: "ui-icon-gear"},     text: false });
        $('.icono_realizado').button({    icons: { primary: "ui-icon-comment"},     text: false });
	    $('.icono_capturado').button({    icons: { primary: "ui-icon-check"},     text: false });
	    $('.icono_interpretado').button({ icons: { primary: "ui-icon-search"},   text: false });
		$('.icono_imprimir').button({     icons: { primary: "ui-icon-print"},    text: false });
		$('.icono_entregar').button({     icons: { primary: "ui-icon-person"},    text: false });
		$('.icono_cargado').button({     icons: { primary: "ui-icon-document"},    text: false });
		$('.miPDF').button({              icons: { primary: "ui-icon-document"}, text: false });
		$('.updatePDF').button({          icons: { primary: "ui-icon-refresh"},  text: false });
		
		$('.botonaso').click(function(event) { event.preventDefault(); });
	});
 },9);
}//fin myFunction
function visualizar(x){ $(document).ready(function(e) { var x1=x; x='takeArchivos/pdf/'+x+'.pdf'; 
	$("#dialog-visualizador").load('htmls/miPDF.php #tablaMiPDF', function( response, status, xhr ) { if ( status == "success" ) {
		$('#dialog-visualizador').dialog({
			title: 'ARCHIVO PDF DEL RESULTADO', modal: true, autoOpen: true,
			closeText: '', width: 800, height: 600, closeOnEscape: true, dialogClass: '',
			buttons: { 
				"Eliminar": function() {
					$('#miPregunta').text('¿Desea eliminar este archivo PDF?'); 
					$('#dialog-pregunta').dialog({
						title:'ELIMINAR PDF', closeOnEscape: false, dialogClass: "no-close",
						buttons: {
							"Eliminar": function() {
								var idX = {idPDF: x1+'.pdf', idU:$('#idUser').val(), idE:x1}
								$.post('takeArchivos/eliminarArchivo.php',idX).done(function( data ) {
									if(data==1){ $('#clickme').click();
										$('#miAlerta').text('EL ARCHIVO SE ELIMINÓ CORRECTAMENTE');
										$('#dialog-alerta').dialog({title:'CONFIRMACIÓN'});$('#dialog-alerta').dialog('open');
										$('#dialog-pregunta').dialog('close'); $('#dialog-visualizador').dialog('close');
									}
								});
							},
							Cancelar: function() { $('#dialog-pregunta').dialog( "close" ); }
						}
					});
					$('#dialog-pregunta').dialog('open');
				}, 
				"Cerrar": function() { $(this).dialog('close'); }
		  }, 
		  open:function( event, ui ){$('a.media').media({width:750, height:450, src:x});}, 
		  close:function( event, ui ){ $("#dialog-visualizador").empty();}
		}); 
	} });
}); }
</script>
<script>
$(function() {
	$('#dialog-confirmCaptura').dialog({
		autoOpen:false,modal:true,title:'CONFIRMACIÓN CAPTURA DE RESULTADOS',width:600, height:200, resizable:false, closeText:'',
		closeOnEscape: true,
		open: function( event, ui ) { setTimeout(function(){$('#dialog-confirmCaptura').dialog('close');},3500); }, 
		close: function(event, ui) {  }
	});
	$('#upload_button1').button({ icons: { primary: "ui-icon-folder-open" } });
});//fin ready

function preImprimir(a,b,n){$(document).ready(function(e) { //a =id paciente, b id estudio en vc
	var datoP = {idE:b}
	$.post('archivos_save_ajax/datosPrintMem.php', datoP).done(function(data){ //alert(data);
		if(data!=1){ imprimir(a,b,n,0); }
		else{
			$('#dialog-nivel1').dialog({
				autoOpen: true, modal: true, width: 600, height: 200, resizable: false, closeOnEscape: false, closeText:'', 
				title: 'TIPO DE IMPRESIÓN', dialogClass: 'no-close', draggable:false,
				close: function( event, ui ){ $('#dialog-nivel1').html(''); },
				open: function(event,ui){
					$('#dialog-nivel1').html('<table border="0"width="100%"height="100%"><tr><td align="center" valign="middle">Escoja si desea imprimir con o sin membretes.</td></tr></table>');
				},
				buttons: {
					'CON MEMBRETES': function(){imprimir(a,b,n,1); $('#dialog-nivel1').dialog('close');}, 
					'SIN MEMBRETES': function(){imprimir(a,b,n,0); $('#dialog-nivel1').dialog('close');},
					'CANCELAR': function(){ $('#dialog-nivel1').dialog('close'); }
				}
			});
		}
	});
});}

function est(a,b){ //a es el id del estudio, b es el id del estudio ambos en venta de conceptos
	$(document).ready(function(e) {
		var idE = {idE:a}
		$.post('files-serverside/datosInterpretar.php',idE,respEST);
		function respEST(dato){//alert(dato);
			var dataE = dato.split(';*-');
			if(dataE[0]!=''){$('#referencia_est').val(dataE[12]); $('#paciente_est').val(dataE[0]); $('#folio_est').val(dataE[8]); }
		}
		$('#dialog-est').dialog('open');
	});
}
</script>