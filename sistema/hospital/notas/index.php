<?php require_once('../../Connections/horizonte.php'); ?>
<?php
//initialize the session
ini_set("session.cookie_lifetime","7200");
ini_set("session.gc_maxlifetime","7200");
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
	
  $logoutGoTo = "../../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
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

$MM_restrictGoTo = "../../index.php";
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

if (isset($_SESSION['MM_Username'])) {
  $colname_usuario = $_SESSION['MM_Username'];
}
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

?>
<!doctype html>
<html>
<head>
<link rel="shortcut icon" href="../../imagenes/general/favicon.ico">
<meta charset="utf-8">
<title>CAT??LOGO DE NOTAS M??DICAS</title>

<link href="../../css/plantilla.css" rel="stylesheet" type="text/css">
<link href="../../jquery-ui-1.12.0/jquery-ui.min.css" rel="stylesheet">
<link href="../../DataTables-1.10.5/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css">

<script src="../../jquery-ui-1.12.0/external/jquery/jquery.js"></script>
<script src="../../jquery-ui-1.12.0/jquery-ui.js"></script>
<script src="../../jquery-ui-1.12.0/external/jquery/jquery-ui-timepicker-addon.js"></script>
<script src="../../jquery-ui-1.12.0/external/jquery/globalize.js"></script>
<script src="../../jquery-ui-1.12.0/external/jquery/globalize.culture.de-DE.js"></script>
<script src="../../DataTables-1.10.5/media/js/jquery.dataTables.js"></script>
<script src="../../DataTables-1.10.5/extensions/Scroller/js/dataTables.scroller.js"></script>
<script src="../../funciones/js/caracteres.js"></script>
<script src="../../funciones/js/calcula_edad.js"></script>
<script src="../../jquery-validation-1.9.0/jquery.validate.js"></script>
<script src="../../funciones/js/jquery.printElement.min.js"></script>
<script src='../../tinymce/tinymce.min.js'></script>

<script language="javascript">
//para las tooltips
$( document ).tooltip({
	position: {
		my: "center bottom-20",	at: "center top",
		using: function( position, feedback ) {
			$( this ).css( position );
			$( "<div>" ).addClass( "arrow" ).addClass( feedback.vertical ).addClass( feedback.horizontal ).appendTo( this );
		}
	}
});

$(document).ready(function(e) {
	var he = $('#referencia').height() - $('#header').height() - 160;
	var wi = $('#referencia').width() * 0.96;
	$("#dialog-confirmarNuevoPaciente").tabs({active: 0});
	$("#dialog-confirmarNuevoPaciente").css('width',wi).css('height',he);
	
	$('.miTab').css('height', $('#dialog-confirmarNuevoPaciente').height() - 75).css('width',$('#dialog-confirmarNuevoPaciente').width()-90);
				
	$( window ).resize(function(e) {
		var he = $('#referencia').height() - $('#header').height() - 160;
		var wi = $('#referencia').width() * 0.96;
		$("#dialog-confirmarNuevoPaciente").tabs({active: 0});
		$("#dialog-confirmarNuevoPaciente").css('width',wi).css('height',he);
		
		$('.miTab').css('height', $('#dialog-confirmarNuevoPaciente').height() - 75).css('width',$('#dialog-confirmarNuevoPaciente').width()-90);
    });
	
	var cuadrado = 35;
	$('button').css('width',cuadrado).css('height',cuadrado);
	$('#addConvenio').button({ icons: { primary: "ui-icon-plusthick" }, text: false });
	
	$('form').submit(function(event) { event.preventDefault(); });
	
	$("#departamentoE").load('files-serverside/genera_departamentoI.php');
	$("#areasE").load('files-serverside/genera_areas.php');
	
});

  $.widget( "ui.timespinner", $.ui.spinner, {
	options: {
	  // seconds
	  step: 60 * 1000,
	  // hours
	  page: 60
	},
	_parse: function( value ) {
      if ( typeof value === "string" ) { // already a timestamp
        if ( Number( value ) == value ) { return Number( value ); }
        return +Globalize.parseDate( value );
      }
      return value;
    },
	_format: function( value ) { return Globalize.format( new Date(value), "t" ); }
  });
</script>

<script>
function nuevoPaciente(){ $(document).ready(function(e) { 
$("#dialog-confirmarNuevoPaciente").load("htmls/ficha_estudio.php",function(response, status, xhr) { if(status=="success"){
	tinymce.remove("#input");
		
	var he=$('#referencia').height()-100, wi = $('#referencia').width() * 0.97;
	
	$('#formEstudio').css('height',$("#dialog-confirmarNuevoPaciente").height()-100);

	$('#dialog-confirmarNuevoPaciente').dialog({
		title:'NUEVA NOTA M??DICA',modal:true,autoOpen:true,closeText:'',width:wi,height:he,closeOnEscape:false,
		dialogClass:'no-close',
		buttons: {
		"GUARDAR": function() {
			if($('#formEstudio').valid()){ 
				$('#miDiagnostico').val($('.jqte_editor').html());
				var datosP = {
					input:tinyMCE.get('input').getContent(),nombreNM:$('#nombreNM').val(),idusuarioNM:$('#idUser').val(), 
					area_nota:$('#area_nota').val()
				}
				$.post('files-serverside/addNota.php',datosP).done(function(data){
					if (data==1){
						$('#clickme').click();
						$('#dialog-confirmarNuevoPaciente').dialog('close');
						$('#dialog-confirmaAltaPaciente').dialog('open');
					}
					else{alert(data);}
				});
			}
		},
		"CANCELAR": function() { $(this).dialog('close'); }
	  },
	  open:function( event, ui ){
		tinymce.init({ 
			selector:'#ficha_estudio #input',resize:false,height:$('#dialog-confirmarNuevoPaciente').height()*0.64,theme: "modern",
			plugins: 
				"table, charmap, emoticons, textcolor colorpicker, hr, image imagetools, image, insertdatetime, lists, noneditable, pagebreak, paste, preview, print, visualblocks, wordcount, responsivefilemanager, code, importcss",
			relative_urls: true,
			filemanager_title:"Administrador de archivos",
			filemanager_crossdomain: true,
			external_filemanager_path:"../tinymce/plugins/responsivefilemanager/filemanager/",
			external_plugins: { "filemanager" : "../tinymce/plugins/responsivefilemanager/filemanager/plugin.min.js"},
			image_advtab: true,
			menubar: false, plugin_preview_width: $('#dialog-confirmarNuevoPaciente').width()*0.8,
			toolbar: 
				"undo redo | insert | styleselect | bold italic fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink anchor | forecolor backcolor  | print_ preview code_ | emoticons_ | table | responsivefilemanager_",
			insert_button_items: 'charmap | cut copy | hr | insertdatetime | pagebreak1',
			paste_data_images: true, paste_as_text: true, browser_spellcheck: true, image_advtab: true,
		});
		$("#area_nota").load("genera/areas_nota.php", function( response, status, xhr ){if(status=="success"){ }});
		
		$('#formEstudio').validate({ignore: 'hidden'}); $('#idusuarioNM').val($('#idUser').val());
		
		$('#dialog-confirmarNuevoPaciente input, #dialog-confirmarNuevoPaciente select, #dialog-confirmarNuevoPaciente textarea').addClass('campoITtab');
		$('#dialog-confirmarNuevoPaciente textarea').css('height','99%'); 
		$("#ficha_estudio").tabs({active: 0}); $('#pestanas').removeClass('ui-widget-header');
		$('#ficha_estudio').removeClass('ui-widget-content');
		
		},
	  close:function( event, ui ){ $('#dialog-confirmarNuevoPaciente').empty(); }
	});
} });
	
}); }

function verPaciente(x){ $(document).ready(function(e) { //asignamos el id del estudio
$("#dialog-confirmarNuevoPaciente").load("htmls/ficha_estudio.php",function(response, status, xhr) { if(status=="success"){
	tinymce.remove("#input");
	
	$('#formEstudio').css('height',$("#dialog-confirmarNuevoPaciente").height()-100);
	
	var datos ={idN:x}
	$.post('files-serverside/fichaNotaM.php',datos).done(function( data1 ) {
		var datosI = data1.split('*}'); //alert(datosI)

		var he = $('#referencia').height() - 100, wi = $('#referencia').width() * 0.96;
		var title = 'FICHA DE LA NOTA. '+datosI[0];
		$('#dialog-confirmarNuevoPaciente').dialog({
			title:title,modal:true,autoOpen:true,closeText:'', width: wi, height: he, closeOnEscape: true, dialogClass: '',
			buttons: {
			"ACTUALIZAR": function() {
				if($('#formEstudio').valid()){
					$('#miDiagnostico').val($('.jqte_editor').html());
					var datosE = {
						input:tinyMCE.get('input').getContent(),nombreNM:$('#nombreNM').val(),idusuarioNM:$('#idUser').val(), 
						area_nota:$('#area_nota').val(), idEstudioE:$('#idEstudioE').val()
					}
					$.post('files-serverside/updateNota.php',datosE).done(function( data ) {
						if (data==1){//si el paciente se Actualiz?? 
							$('#dialog-confirmarNuevoPaciente').dialog('close');$('#clickme').click();
							$('#dialog-confirmaAltaPaciente').dialog('open');
						}
						else{alert(data);}
					});
				}
			},
			"CERRAR": function() { $(this).dialog('close'); }
		  },
		  open:function( event, ui ){ $('#idEstudioE').val(x); $('#formEstudio').validate({ignore: 'hidden'});
		  		$('#input').val(datosI[1]);
				tinymce.init({ 
					selector:'#contieneET #input',resize:false,height:$('#dialog-confirmarNuevoPaciente').height()*0.64,theme: "modern",
					plugins: 
						"table, charmap, emoticons, textcolor colorpicker, hr, image imagetools, image, insertdatetime, lists, noneditable, pagebreak, paste, preview, print, visualblocks, wordcount, responsivefilemanager, code, importcss",
					relative_urls: true,
					filemanager_title:"Administrador de archivos",
					filemanager_crossdomain: true,
					external_filemanager_path:"../tinymce/plugins/responsivefilemanager/filemanager/",
					external_plugins: { "filemanager" : "../tinymce/plugins/responsivefilemanager/filemanager/plugin.min.js"},
					image_advtab: true,
					menubar: false, plugin_preview_width: $('#dialog-confirmarNuevoPaciente').width()*0.8,
					toolbar: 
						"undo redo | insert | styleselect | bold italic fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink anchor | forecolor backcolor  | print_ preview code_ | emoticons_ | table | responsivefilemanager_",
					insert_button_items: 'charmap | cut copy | hr | insertdatetime | pagebreak1',
					paste_data_images: true, paste_as_text: true, browser_spellcheck: true, image_advtab: true,
				});
				$('#dialog-confirmarNuevoPaciente input, #dialog-confirmarNuevoPaciente select, #dialog-confirmarNuevoPaciente textarea').addClass('campoITtab');
				$('#dialog-confirmarNuevoPaciente textarea').css('height','99%');
				
				$('#nombreNM').val(datosI[0]);
				$("#area_nota").load("genera/areas_nota.php", function( response, status, xhr ){if(status=="success"){ 
					$("#area_nota").val(datosI[2]);
				}});
			},
			close:function( event, ui ){ $("#dialog-confirmarNuevoPaciente").empty(); }
		});
	});
} });
	
}); }//fin verFicha
</script>

<script>
$(document).ready(function(e){
	setInterval(function(){$.post('../../remote_files/refresh_session.php'); },500000);
	$('#verMenu').click(function(e){window.location='../../menu.php?menu=mh';}); 
	$("#upload").button({ icons: { primary: "ui-icon-image" }, text: true });
	var i = 1;
	
	$('#dispara_menu').click(function(e) { i++;
		if(i%2==0){
			$('#header').after('<div id="div_menu" class="ver_menu" style="border:1px none red; z-index:1000000000000; position:fixed; width:240px;"><table height="100%" width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td align="left"><ul id="menu_u1" style="border-bottom-left-radius:4px;border-bottom-right-radius:4px;"><li><div id="mi_perfil"><span class="ui-icon ui-icon-person"></span> Mi perfil</div></li><li><div><span class="ui-icon ui-icon-gear"></span> Configuraci??n</div></li><li><div><span class="ui-icon ui-icon-power"></span> <a href="<?php echo $logoutAction ?>">Cerrar sesi??n</a></div></li><li><div id="ayuda"><span class="ui-icon ui-icon-info"></span> Ayuda</div></li><li><div id="reportar_problema"><span class="ui-icon ui-icon-comment"></span> Reportar problema</div></li><li><div id="politicas_condiciones"><span class="ui-icon ui-icon-script"></span> Pol??ticas y condiciones</div></li><li><div id="aviso_privacidad"><span class="ui-icon ui-icon-alert"></span> Aviso de privacidad</div></li><li><div id="acerca_de"><span class="ui-icon ui-icon-star"></span> Acerca de</div></li></ul></td></tr></table></div>');
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

</head>

<body>

<div id="referencia" style="display:none; position:fixed; width:100%; height:100%; z-index:1000000000000000000000;"></div>

<input name="idUser" type="hidden" id="idUser" value="<?php echo $row_usuario['id_u']; ?>">
<input name="accesoU" type="hidden" id="accesoU" value="<?php echo $row_usuario['acceso_u']; ?>">
<input name="sucursalU" type="hidden" id="sucursalU" value="<?php echo $row_usuario['idSucursal_u']; ?>">
<input name="indicePaciente" type="hidden" id="indicePaciente">
<input name="sucursalOV" type="hidden" id="sucursalOV" value="<?php echo $row_usuario['idSucursal_u']; ?>">
<input name="today" id="today" type="hidden" value="<?php echo date("d/m/Y"); ?>">

<div id="header" class="header">
    <table height="100%" width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="120" align="right" class="iconito"><img src="../../imagenes/iconitos/_notasMedicasI.png" height="40"></td>
        <td align="left" valign="middle"><span id="verMenu" style="cursor:pointer;">CAT??LOGO DE NOTAS M??DICAS</span></td>
        <td width="1%" nowrap valign="middle">
        	<span id="dispara_menu">
            	<?php if($row_usuario['foto_u'] == 1){?>
                	<img class="fotoUsuario" id="miFotoUsuarioMini" src="../../usuarios/imagenes/perfil/<?php echo $row_usuario['nombreFoto_u']; ?>" width="21">
                <?php }else{?>
                	<img class="fotoUsuario" id="miFotoUsuarioMini" src="../../usuarios/takePicture/fotografiasPerfil/<?php if($row_usuario['sexo_u'] == 1){echo 'm';}else{echo 'h';} ?>.jpg" width="21">
                <?php }?>
            	<?php echo $row_usuario['usuario_u']; ?> <span class="ui-icon ui-icon-triangle-1-s"></span>
            </span>
        </td>
        <td width="100" nowrap align="left"> </td>
      </tr>
    </table>
</div>

<div class="contenido" id="contenido" align="center" style="margin-top:43px;">
  <table width="100%" height="100%" border="0" cellpadding="5" cellspacing="0" id="dataTablePrincipal" class="tablilla">
    <thead id="cabecera_tBusquedaPrincipal">
      <tr class="titulos_dataceldas">
      	<th id="clickme" align="center" width="1px" nowrap>#</th>
        <th align="center">
        NOTA
        <button id='addPacientePrincipal' onClick='nuevoPaciente()' class='ui-button ui-widget ui-corner-all ui-button-icon-only' title='Agregar una nueva nota m??dica'><span class='ui-icon ui-icon-plus'>s</span></button>
        </th>
        <th align="center" nowrap>??REA</th>
      </tr>
    </thead>
    <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
    <tfoot> <tr>
        <td><input name="sPaciente1" id="sPaciente1" type="hidden" class="search_init" style="width:90%;" /></td>
        <td>
        <input name="sNota" id="sNota" type="text" placeholder="-Nombre de la nota-" class="search_init" style="width:90%;" />
        </td>
        <td>
        <input name="sArea" id="sArea" type="text" placeholder="-??rea-" class="search_init" style="width:90%;" />
        </td>
  </tr> </tfoot>
  </table>
</div>

<div id="dialog-confirmarNuevoPaciente" style="display:none;"> </div>

<div id="dialog-confirmaAltaPaciente" style="display:none;">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> <td align="center" valign="middle" height="100%">LOS DATOS DE LA NOTA SE HAN GUARDADO SATISFACTORIAMENTE</td> </tr>
</table>
</div>

<div id="dialog-verPaciente" align="right" style="display:none;"> </div>

<div class="footer" id="footer" style="display:none;"> </div>

<input name="filtro" id="filtro" type="hidden" value="YO SOLO SE QUE NO SE NADA">

</body>
</html>

<?php
mysqli_free_result($usuario);
mysqli_free_result($nombreSucursalUsuario);
mysqli_free_result($nombreDepartamentoUsuario);
?>

<script type="text/javascript">

$(document).ready(function() {
	var asInitVals = new Array();
	
	var oTableP;
	var tamP = $('#referencia').height() - 129;
	
	oTableP = $('#dataTablePrincipal').dataTable({
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { },
		"bJQueryUI": true, "bScrollCollapse": true, "sScrollY": tamP, "bAutoWidth": false, "bStateSave": false, "bInfo": true,
			"bFilter": true, ordering: false, "iDisplayLength": 5000, "aaSorting": [[0, "desc"]], 
		"aoColumns": [ { "bSortable": false }, { "bSortable": false }, { "bSortable": false } ],
		"bLengthChange": false, "bProcessing": false, "bServerSide": true,
		"sDom": '<"toolbar"><"filtro1Principal">lr<"data_tPrincipal"t><"infoPrincipal">S',
		"sAjaxSource": "datatable-serverside/notas.php",
		"fnServerParams":function(aoData, fnCallback){ 
			var access = $('#accesoU').val();
			aoData.push({"name": "access", "value": access });
		},
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
		"oLanguage": {
			"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
			"sInfo": "ENCONTRADAS: _END_", "sInfoEmpty": "MOSTRADAS: 0", "sInfoFiltered": "<span style='display:none;'><br/>NOTAS: _MAX_</span>", "sSearch": "",
			"oPaginate": {
				"sNext": "<span class='paginacionPrincipal'>Siguiente</span>",
				"sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;"
			}
		}
		
	});
	
	$('.infoPrincipal').append( "<div style='border:1px solid none; text-align:right;'><table id='ocultarFP' style='float:right;' width='' border='0' cellspacing='0' cellpadding='6'> <tr><td></td> </tr> </table></div>" );
	
	//para los fintros individuales por campo de texto
	$("tfoot input").keyup( function () { oTableP.fnFilter( this.value, $("tfoot input").index(this) ); } );
    /* * Support functions to provide a little bit of 'user friendlyness' to the textboxes in * the footer */
    $("tfoot input").each( function (i) { asInitVals[i] = this.value; } );
     
    $("tfoot input").focus( function () { if ( this.className == "search_init" ) { this.className = ""; this.value = "";} } );
     
    $("tfoot input").blur( function (i) { if ( this.value == "" ) { this.className = "search_init"; this.value = asInitVals[$("tfoot input").index(this)]; } } );
	//fin filtros individuales por campo de texto
		
	$('.paginacionPrincipal').hide();
	
	$('#clickme').click(function(e) { oTableP.fnDraw(); });
	
});
</script>

<script>
$(document).ready(function(e) {
	var he1 = $('#referencia').height() - $('#header').height() - 100, wi1 = $('#referencia').width() * 0.97;
	
	$('#dialog-confirmaAltaPaciente').dialog({
		autoOpen: false, modal: true, width: 620, height:150, title: 'DATOS GUARDADOS', closeText: '',
		open:function( event, ui ){
			$('#dialog-confirmarNuevoPaciente').dialog('close');
			window.setTimeout(function(){$('#dialog-confirmaAltaPaciente').dialog('close');},2500);
		}
	});
    $('#dialog-verPaciente').dialog({autoOpen:false,modal:true,width:wi1,height:he1, title: 'FICHA DE LA NOTA', closeText:'' });
});

function insertAtCaret(text) { tinymce.get("input").execCommand('mceInsertContent', false, text); $('#inserta_algo').val(''); }
</script>