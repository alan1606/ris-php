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
<title>REPORTE POR DEPARTAMENTOS</title>

<link href="../css/plantilla.css" rel="stylesheet" type="text/css">
<link href="../jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
<link href="../jquery-ui-1.12.1/jquery-ui.structure.css" rel="stylesheet">
<link href="../jquery-ui-1.12.1/jquery-ui.theme.css" rel="stylesheet">

<script src="../jquery-ui-1.12.1/external/jquery/jquery.js"></script>
<script src="../jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="../DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script src="../TableTools-2.1.5/media/js/TableTools.js"></script>
<script src="../TableTools-2.1.5/media/js/ZeroClipboard.js"></script>
<script src="../jquery-validation-1.9.0/jquery.validate.js"></script>
<script src="../funciones/js/caracteres.js"></script>
<script src="../funciones/js/retardo.js"></script>
<script src="../funciones/js/jquery.printElement.min.js"></script>
<script type="text/javascript" src="../funciones/js/jquery.media.js"></script> 
<script type="text/javascript" src="../funciones/js/jquery.fileDownload.js"></script>

<script>
$(document).tooltip({ position: { my: "center bottom-20",	at: "center top", using: function( position, feedback ) { $( this ).css( position ); $( "<div>" ).addClass( "arrow" ).addClass( feedback.vertical ).addClass( feedback.horizontal ).appendTo( this ); } } });
$(document).ready(function(e) {
	$('#form-captura').validate({
		rules:{ diagnostico:{ required:true } },
		messages:{ diagnostico:{ required:'Debe ingresar el diagnóstico' } }
	});
		
});

</script>

<script>
$(document).ready(function(e) {
    $('#miMenu').hide(); $('#verMenu').click(function(e){window.location='../menu.php?menu=ma';});
	var i = 1;
	
	$('#dispara_menu').click(function(e) { i++;
		if(i%2==0){
			$('#header').after('<div id="div_menu" class="ver_menu" style="border:1px none red; z-index:1000000000000; position:fixed; width:240px;"><table height="100%" width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td align="left"><ul id="menu_u1" style="border-bottom-left-radius:4px;border-bottom-right-radius:4px;"><li><div id="mi_perfil"><span class="ui-icon ui-icon-person"></span> Mi perfil</div></li><li><div><span class="ui-icon ui-icon-gear"></span> Configuración</div></li><li><div><span class="ui-icon ui-icon-power"></span> <a href="<?php echo $logoutAction ?>">Cerrar sesión</a></div></li><li><div id="ayuda"><span class="ui-icon ui-icon-info"></span> Ayuda</div></li><li><div id="reportar_problema"><span class="ui-icon ui-icon-comment"></span> Reportar problema</div></li><li><div id="politicas_condiciones"><span class="ui-icon ui-icon-script"></span> Políticas y condiciones</div></li><li><div id="aviso_privacidad"><span class="ui-icon ui-icon-alert"></span> Aviso de privacidad</div></li><li><div id="acerca_de"><span class="ui-icon ui-icon-star"></span> Acerca de</div></li></ul></td></tr></table></div>');
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
</script>

<script type="text/javascript">
//para fintro individual por campo de texto
var asInitVals = new Array();
//fin para filtro individual por campo de texto

//para filtro individual por select
(function($) {
$.fn.dataTableExt.oApi.fnGetColumnData = function ( oSettings, iColumn, bUnique, bFiltered, bIgnoreEmpty ) {
    // check that we have a column id
    if ( typeof iColumn == "undefined" ) return new Array();
    // by default we only want unique data
    if ( typeof bUnique == "undefined" ) bUnique = true;
    // by default we do want to only look at filtered data
    if ( typeof bFiltered == "undefined" ) bFiltered = true;
    // by default we do not want to include empty values
    if ( typeof bIgnoreEmpty == "undefined" ) bIgnoreEmpty = true;
    // list of rows which we're going to loop through
    var aiRows;
    // use only filtered rows
    if (bFiltered == true) aiRows = oSettings.aiDisplay;
    // use all rows
    else aiRows = oSettings.aiDisplayMaster; // all row numbers
    // set up data array   
    var asResultData = new Array();
     
    for (var i=0,c=aiRows.length; i<c; i++) {
        iRow = aiRows[i];
        var aData = this.fnGetData(iRow);
        var sValue = aData[iColumn];
        // ignore empty values?
        if (bIgnoreEmpty == true && sValue.length == 0) continue;
        // ignore unique values?
        else if (bUnique == true && jQuery.inArray(sValue, asResultData) > -1) continue;
        // else push the value onto the result data array
        else asResultData.push(sValue);
    }
    return asResultData;
}}(jQuery));
 
 
function fnCreateSelect( aData )
{
    var r='<select><option value=""></option>', i, iLen=aData.length;
    for ( i=0 ; i<iLen ; i++ ) { r += '<option value="'+aData[i]+'">'+aData[i]+'</option>'; }
    return r+'</select>';
}
//fin para filtro individual por select
$(document).ready(function() {
	setInterval(function(){$.post('../remote_files/refresh_session.php'); },500000);
	  
	$('#dialog-alerta').dialog({ autoOpen: false, modal: true, width: 620, height:150, title: '¡ATENCIÓN!', closeText: '', open:function( event, ui ){ window.setTimeout(function(){$('#dialog-alerta').dialog('close');},2500); } });
	
	var tam = ($('#referencia').height())*0.32, tam1 = ($('#referencia').height())*0.35;
	
	oTable = $('#dataTable').dataTable({
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
			var allBotonesIcono = $('.botonaso'); allBotonesIcono.css('width','30px').css('height','30px');
			$('#imprimirReporte').button({ icons: { primary: "ui-icon-print"},  text: false });
			$('.botonaso').click(function(event) { event.preventDefault(); });
			
			var iTotal = 0, iComision=0, iIngreso = 0; iVisitas = 0;
            for ( var i=iStart ; i<iEnd ; i++ )
            {
				iVisitas  += aaData[ aiDisplay[i] ][1]*1;
                iTotal    += aaData[ aiDisplay[i] ][2]*1;
				iComision += aaData[ aiDisplay[i] ][3]*1;
				iIngreso  += aaData[ aiDisplay[i] ][4]*1;
            }
            var nCells = nRow.getElementsByTagName('th');
			nCells[1].innerHTML = parseInt(iVisitas  * 100)/100;
            nCells[2].innerHTML = parseInt(iTotal    * 100)/100;
			nCells[3].innerHTML = parseInt(iComision * 100)/100;
			nCells[4].innerHTML = '$'+parseInt(iIngreso  * 100)/100;
			
			window.setTimeout(function(){$('.erase1').each(function(index, element) { $(this).parent().parent().remove(); });},200);
		},
		"bJQueryUI": true, "bScrollInfinite": true, "bScrollCollapse": true, "sScrollY": tam1, "bAutoWidth": false, "bStateSave": false, "bInfo": true, "bFilter": true, "aaSorting": [[0, "asc"]],
		"aoColumns":[
			{"bSortable":false},{"bSortable":false, "sClass": "centrado"},{"bSortable": false, "sClass": "centrado"}, { "bSortable": false, "sClass": "centrado"}, { "bSortable": false, "sClass": "centrado"}
		],
		"iDisplayLength": 50, "bLengthChange": false, "bProcessing": false, "bServerSide": true, "sDom": '<"data_t"t><"info">', "sAjaxSource": "datatable-serverside/reporte.php",
		"fnServerParams": function (aoData, fnCallback) { var de = document.getElementById('fechaDe').value+' 00:00:00'; var a = $('#fechaA').val()+' 23:59:59'; aoData.push(  {"name": "min", "value": de } ); aoData.push(  {"name": "max", "value": a } ); },
		"aLengthMenu": [[9, 25, 50, 100, -1], [9, 25, 50, 100, "Todos"]],
		"oLanguage": { "sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered": " TOTAL DE ESTUDIOS: _MAX_", "sSearch": "BUSCAR" }
	});//fin data table
	
	$('#clickme').click(function(e) { oTable.fnDraw();});
	
	//para los fintros individuales por campo de texto
	$("tfoot input").keyup( function () { /* Filter on the column (the index) of this element */ oTable.fnFilter( this.value, $("tfoot input").index(this) ); });
    /* * Support functions to provide a little bit of 'user friendlyness' to the textboxes in  * the footer */
    $("tfoot input").each( function (i) { asInitVals[i] = this.value; } );
     
    $("tfoot input").focus( function () { if ( this.className == "search_init" ) { this.className = ""; this.value = ""; } } );
     
    $("tfoot input").blur( function (i) { 
		if(this.value=="") { this.className = "search_init"; this.value = asInitVals[$("tfoot input").index(this)];myFunction(); } 
	} );
	//fin filtros individuales por campo de texto
	
	//para los filtros individuales por select
	/* Add a select menu for each TH element in the table footer */
    $("tfoot td .miSelect").each( function ( i ) {
        this.innerHTML = fnCreateSelect( oTable.fnGetColumnData(i) );
        $('select', this).change( function () { oTable.fnFilter( $(this).val(), i ); });
    } );
	$('#s_urg').change( function () { oTable.fnFilter( $(this).val(), 3 ); });
	$('#s_estatus').change( function () {  oTable.fnFilter( $(this).val(), 5 ); });
	//fin para filtros individuales por select
	
	$('#radio1').click(function(e) { $('#fechaDe').val('<?php echo date("Y-m-d"); ?>'); $('#fechaA').val('<?php echo date("Y-m-d"); ?>'); oTable.fnDraw(); oTableX.fnDraw(); oTable1.fnDraw(); oTable1X.fnDraw(); });
	$('#radio2').click(function(e) { $('#fechaDe').val('2000-01-01'); $('#fechaA').val('<?php echo date("Y-m-d"); ?>'); oTable.fnDraw(); oTableX.fnDraw(); oTable1.fnDraw(); oTable1X.fnDraw(); });
	$( "#fechaDe" ).datepicker({
	  	defaultDate: "-1", maxDate: +0,
		onClose: function( selectedDate ) { $( "#fechaA" ).datepicker( "option", "minDate", selectedDate ); },
		"onSelect": function(date) { min = date+' 00:00:00'; oTable.fnDraw(); oTableX.fnDraw(); oTable1.fnDraw(); oTable1X.fnDraw(); }
	}).css('max-width','100px');
	$( "#fechaA" ).datepicker({
		defaultDate: "+0", maxDate: +0,
		onClose: function( selectedDate ) { $( "#fechaDe" ).datepicker( "option", "maxDate", selectedDate ); },
		"onSelect": function(date) { max = date+' 23:59:59'; oTable.fnDraw(); oTableX.fnDraw(); oTable1.fnDraw(); oTable1X.fnDraw(); }
	}).css('max-width','100px');
	
	oTable1 = $('#dataTable1').dataTable({
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
			var iComision=0, iIngreso = 0;
            for ( var i=iStart ; i<iEnd ; i++ )
            {
				iComision += aaData[ aiDisplay[i] ][1]*1;
				iIngreso  += aaData[ aiDisplay[i] ][2]*1;
            }
            var nCells = nRow.getElementsByTagName('th');
			nCells[1].innerHTML = parseInt(iComision * 100)/100;
			nCells[2].innerHTML = '$'+parseInt(iIngreso  * 100)/100;
		},
		"bJQueryUI": true, "bScrollInfinite": true, "bScrollCollapse": true, "sScrollY": tam, "bAutoWidth": false, "bStateSave": false, "bInfo": true, "bFilter": true, "aaSorting": [[0, "asc"]],
		"aoColumns":[{ "bSortable": false },{ "bSortable": false, "sClass": "centrado"},{ "bSortable": false, "sClass": "centrado"}],
		"iDisplayLength": 50, "bLengthChange": false, "bProcessing": false, "bServerSide": true, "sDom": '<"data_t"t><"info">', "sAjaxSource": "datatable-serverside/reporte1.php",
		"fnServerParams": function (aoData, fnCallback) { var de = document.getElementById('fechaDe').value+' 00:00:00'; var a = $('#fechaA').val()+' 23:59:59'; aoData.push(  {"name": "min", "value": de } ); aoData.push(  {"name": "max", "value": a } ); },
		"aLengthMenu": [[9, 25, 50, 100, -1], [9, 25, 50, 100, "Todos"]],
		"oLanguage": { "sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "NO HAY MOVIMIENTOS REGISTRADOS", "sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered": " TOTAL DE ESTUDIOS: _MAX_", "sSearch": "BUSCAR" }
	});//fin data table
	
	$('#clickme1').click(function(e) { oTable1.fnDraw();});
	
	oTableX = $('#dataTableX').dataTable({
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { 
			var iTotal = 0, iComision=0, iIngreso = 0;
            for ( var i=iStart ; i<iEnd ; i++ )
            {
				iVisitas  += aaData[ aiDisplay[i] ][1]*1;
                iTotal    += aaData[ aiDisplay[i] ][2]*1;
				iComision += aaData[ aiDisplay[i] ][3]*1;
				iIngreso  += aaData[ aiDisplay[i] ][4]*1;
            }
            var nCells = nRow.getElementsByTagName('th');
			nCells[1].innerHTML = parseInt(iVisitas    * 100)/100;
            nCells[2].innerHTML = parseInt(iTotal    * 100)/100;
			nCells[3].innerHTML = parseInt(iComision * 100)/100;
			nCells[4].innerHTML = '$'+parseInt(iIngreso  * 100)/100;
		},
		"bJQueryUI": true, "bScrollInfinite": true, "bScrollCollapse": true, "bAutoWidth": false, "bStateSave": false, "bInfo": true, "bFilter": true, "aaSorting": [[0, "asc"]],
		"aoColumns": [{ "bSortable": false }, { "bSortable": false, "sClass": "centrado"},{ "bSortable": false, "sClass": "centrado"}, { "bSortable": false, "sClass": "centrado"}, { "bSortable": false, "sClass": "centrado"}],
		"iDisplayLength": 50, "bLengthChange": false, "bProcessing": false, "bServerSide": true, "sDom": '<"data_t"t><"info">', "sAjaxSource": "datatable-serverside/reporte.php",
		"fnServerParams": function (aoData, fnCallback) { var de = document.getElementById('fechaDe').value+' 00:00:00'; var a = $('#fechaA').val()+' 23:59:59'; aoData.push(  {"name": "min", "value": de } ); aoData.push(  {"name": "max", "value": a } ); },
		"aLengthMenu": [[9, 25, 50, 100, -1], [9, 25, 50, 100, "Todos"]],
		"oLanguage": { "sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered": " TOTAL DE ESTUDIOS: _MAX_", "sSearch": "BUSCAR" }
	});//fin data table
	
	$('#clickmeX').click(function(e) { oTableX.fnDraw(); });
	
	oTable1X = $('#dataTable1X').dataTable({
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
			var iComision=0, iIngreso = 0;
            for ( var i=iStart ; i<iEnd ; i++ )
            {
				iComision += aaData[ aiDisplay[i] ][1]*1;
				iIngreso  += aaData[ aiDisplay[i] ][2]*1;
            }
            var nCells = nRow.getElementsByTagName('th');
			nCells[1].innerHTML = parseInt(iComision * 100)/100;
			nCells[2].innerHTML = '$'+parseInt(iIngreso  * 100)/100;
		},
		"bJQueryUI": true, "bScrollInfinite": true, "bScrollCollapse": true, "bAutoWidth": false, "bStateSave": false, "bInfo": true, "bFilter": true, "aaSorting": [[0, "asc"]],
		"aoColumns":[{ "bSortable": false },{ "bSortable": false, "sClass": "centrado"},{ "bSortable": false, "sClass": "centrado"}],
		"iDisplayLength": 50, "bLengthChange": false, "bProcessing": false, "bServerSide": true, "sDom": '<"data_t"t><"info">', "sAjaxSource": "datatable-serverside/reporte1.php",
		"fnServerParams": function (aoData, fnCallback) { var de = document.getElementById('fechaDe').value+' 00:00:00'; var a = $('#fechaA').val()+' 23:59:59'; aoData.push(  {"name": "min", "value": de } ); aoData.push(  {"name": "max", "value": a } ); },
		"aLengthMenu": [[9, 25, 50, 100, -1], [9, 25, 50, 100, "Todos"]],
		"oLanguage": { "sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered": " TOTAL DE ESTUDIOS: _MAX_", "sSearch": "BUSCAR" }
	});//fin data table
	
	$('#clickme1X').click(function(e) { oTable1X.fnDraw(); });
			
});
</script>

<script>
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
	//divRangoFechas.css('width','100%').css('float','left');
	
	$( '#rangosFechas' ).buttonset().css('font-size','0.9em');
	$('.rad').css('font-size','0.8em');
		
	$('#contenido').css('height',$('#referencia').height());
	
	$('#imprimirReporte').click(function(e){
		if($('#fechaDe').val()=='2000-01-01'){
			$('#fechaRde').html('TODAS LAS FECHAS');
			$('#fechaRa').html('');
		}else{
			$('#fechaRde').html('DE '+$('#fechaDe').val());
			$('#fechaRa').html('A '+$('#fechaA').val());
		}
		window.setTimeout(function(){$('#clickmeX').click();},200);
		$('#clickmeX').click();$('#contenidoR').show().printElement().hide(); 
	});
});
</script>

</head>

<body>

<div id="referencia" style="display:none; position:fixed; width:100%; height:100%; z-index:1000000000000000000000;"></div>

<div id="contenidoR" style="display:none; position:fixed; width:18.5cm; height:23cm; z-index:1;">
<table width="100%" height="" border="0" cellspacing="0" cellpadding="3">
  <tr> <td align="center" style="font-size:1.1em" height="10"> REPORTE DE CAJA GENERAL. FECHAS <span id="fechaRde"></span> <span id="fechaRa"></span></td> </tr>
  <tr>
    <td valign="top" height="" id="">
    	<table width="100%" height="" border="1" cellpadding="4" cellspacing="0" id="dataTableX">
            <thead id="cabecera_tBusquedaP"> <tr id="mymy"> 
            	<th id="clickmeX">DEPARTAMENTO</th> 
                <th nowrap>#VISITAS</th> 
                <th nowrap>#PACIENTES</th> 
                <th nowrap>#CONCEPTOS</th> 
                <th nowrap>TOTAL($)</th> 
            </tr> </thead>
            <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
            <tfoot>
                <tr>
                    <th><input name="sX" type="hidden" value=""></th>
                    <th><input name="sVisitas" id="sVisitas" type="text" class="search_init sCalculo" readonly style="background-color:transparent; border:none; color:white;" value="0"/></th>
                    <th><input name="sPacientes" id="sPacientes" type="text" class="search_init sCalculo" readonly style="background-color:transparent; border:none; color:white;" value="0"/></th>
                    <th><input name="sConceptos" id="sConceptos" type="text" class="search_init sCalculo" readonly style="background-color:transparent; border:none; color:white;" value="0"/></th>
                    <th><input name="sTotal" id="sTotal" type="text" class="search_init sCalculo" readonly style="background-color:transparent; border:none; color:white;" value="0.00"/></th>
                </tr>
            </tfoot>
          </table>
    </td>
  </tr>
  <tr>
    <td height="">
    	<table width="100%" height="" border="1" cellpadding="4" cellspacing="0" id="dataTable1X">
            <thead id="cabecera_tBusquedaP1"> <tr id="mymy1"> <th id="clickme1X">USUARIO</th> <th nowrap>#PAGOS</th> <th nowrap>TOTAL($)</th> </tr> </thead>
            <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
            <tfoot>
                <tr>
                    <th><input name="sX1" type="hidden" value=""></th>
                    <th><input name="sPagos" id="sPagos" type="text" class="search_init sCalculo" readonly style="background-color:transparent; border:none; color:white;" value="0"></th>
                    <th><input name="sTotal1" id="sTotal1" type="text" class="search_init sCalculo" readonly style="background-color:transparent; border:none; color:white;" value="0.00"></th>
                </tr>
            </tfoot>
          </table>
    </td>
  </tr>
  <tr>
  <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td valign="top" height="180px;">Aclaraciones:</td>
      </tr>
    </table>
  </td>
  </tr>
</table>
</div>

<input name="idUser" type="hidden" id="idUser" value="<?php echo $row_usuario['id_u']; ?>">
<input name="accesoU" type="hidden" id="accesoU" value="<?php echo $row_usuario['acceso_u']; ?>">

<input name="nombreTempPdf" id="nombreTempPdf" type="hidden" value="">

<input name="id_vc_ini" id="id_vc_ini" type="hidden" value="">
<input name="usuario_ini" id="usuario_ini" type="hidden" value="<?php echo $row_usuario['usuario_u']; ?>">
<input name="campoUrl" id="campoUrl" type="hidden" value="">

<div id="header" class="header">
    <table height="100%" width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="120" align="right" class="iconito"><img src="../imagenes/iconitos/_iconoResultados.png" height="40"></td>
        <td align="left" valign="middle"><span id="verMenu" style="cursor:pointer;">REPORTE DE CAJA POR DEPARTAMENTOS</span></td>
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

<div class="contenido" id="contenido" align="center" style="border:2px none red;">
<table width="97%" height="" border="0" cellspacing="0" cellpadding="3">
  <tr>
  	<td align="center" style="font-size:1.5em; padding-top:10px;">
    	REPORTE DE CAJA GENERAL&nbsp;<button id="imprimirReporte" name="imprimirReporte" class="botonaso">imprimir</button>
    </td>
  </tr>
  <tr>
    <td valign="top" height="100px" id="tabla1" bgcolor="#E6E7E8">
    	<table width="100%" height="100%" border="0" cellpadding="4" cellspacing="0" id="dataTable" class="tablilla">
            <thead id="cabecera_tBusquedaP">
              <tr id="mymy" bgcolor="#FF6633" style="font-size:1.1em;">
                <th id="clickme" style="color:white;">DEPARTAMENTO</th>
                <th nowrap style="color:white;">#VISITAS</th>
                <th nowrap style="color:white;">#PACIENTES</th>
                <th nowrap style="color:white;">#CONCEPTOS</th>
                <th nowrap style="color:white;">TOTAL($)</th>
              </tr>
            </thead>
            <tbody align=""> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
            <tfoot>
                <tr bgcolor="#FF6633" style="color:white;">
                    <th><input name="sX" type="hidden" value=""></th>
                    <th><input name="sVisitas" id="sVisitas" type="text" class="search_init sCalculo" readonly style="background-color:transparent; border:none; color:white;" value="0"/></th>
                    <th><input name="sPacientes" id="sPacientes" type="text" class="search_init sCalculo" readonly style="background-color:transparent; border:none; color:white;" value="0"/></th>
                    <th><input name="sConceptos" id="sConceptos" type="text" class="search_init sCalculo" readonly style="background-color:transparent; border:none; color:white;" value="0"/></th>
                    <th><input name="sTotal" id="sTotal" type="text" class="search_init sCalculo" readonly style="background-color:transparent; border:none; color:white;" value="0.00"/></th>
                </tr>
            </tfoot>
          </table>
    </td>
  </tr>
  <tr>
    <td height="" bgcolor="#E6E7E8">
    	<table width="100%" height="100%" border="0" cellpadding="4" cellspacing="0" id="dataTable1" class="tablilla">
            <thead id="cabecera_tBusquedaP1">
              <tr id="mymy1" bgcolor="#FF6633" style="font-size:1.1em;">
                <th id="clickme1" style="color:white;">USUARIO</th>
                <th nowrap style="color:white;">#PAGOS RECIBIDOS</th>
                <th nowrap style="color:white;">TOTAL($)</th>
              </tr>
            </thead>
            <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
            <tfoot>
                <tr bgcolor="#FF6633" style="color:white;">
                    <th><input name="sX1" type="hidden" value=""></th>
                    <th><input name="sPagos" id="sPagos" type="text" class="search_init sCalculo" readonly style="background-color:transparent; border:none; color:white;" value="0"></th>
                    <th><input name="sTotal1" id="sTotal1" type="text" class="search_init sCalculo" readonly style="background-color:transparent; border:none; color:white;" value="0.00"></th>
                </tr>
            </tfoot>
          </table>
    </td>
  </tr>
  <tr>
    <td height="" valign="top">
    	<div id="divRangoFechas" style="border:2px none red; display:block; width:60%; float:left;">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" style="color:black;">
  <tr>
    <td width="10px">De </td>
    <td width="1%">
    	<input style="height:80%; font-size:1.1em; border-radius:4px;" name="fechaDe" class="fechas" type="text" id="fechaDe" value="<?php echo date("Y-m-d"); ?>" readonly >
    </td>
    <td width="10px">A </td>
    <td width="1%">
    	<input style="height:80%; font-size:1.1em; border-radius:4px;" name="fechaA" type="text" class="fechas" id="fechaA" value="<?php echo date("Y-m-d"); ?>" readonly >
    </td>
    <td id="rangosFechas">
    	<input type="radio" class="rad" id="radio1" name="radio" /><label for="radio1">Hoy</label>
        <input type="radio" class="rad" id="radio2" name="radio" /><label for="radio2">Todos</label>
    </td>
  </tr>
</table>
</div>
    </td>
  </tr>
</table>
</div>

<div class="footer" id="footer" style="display:none;"> <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td align="center" valign="middle"> &copy; GLOSS <?php echo date('Y'); ?>. TODOS LOS DERECHOS RESERVADOS. </td> </tr> </table> </div>

<div id="dialog-impresion" style="display:none;"> </div>

<div id="dialog-alerta" style="display:none;"> <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td id="miAlerta">&nbsp;</td> </tr> </table> </div>
<div id="dialog-pregunta" style="display:none;"> <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td id="miPregunta">&nbsp;</td> </tr> </table> </div>
<div id="dialog-informar" style="display:none;"><table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center" valign="middle" height="100%"><span id="texto-informar"></span></td></tr></table></div>

</body>
</html>
<?php
mysqli_free_result($usuario);
mysqli_free_result($nombreSucursalUsuario);
mysqli_free_result($nombreDepartamentoUsuario);
mysqli_free_result($fechaRangoInicial);
mysqli_free_result($fechaRangoFinal);
?>