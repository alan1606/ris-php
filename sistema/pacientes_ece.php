<?php
	include_once 'recursos/session.php';
	include_once 'Connections/database.php';
	include_once 'recursos/utilities.php';
	include_once 'recursos/datauser.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SISTEMA DE EXPEDIENTE CLÍNICO ELECTRÓNICO">
    <meta name="author" content="ING EMMANUEL ANZURES BAUTISTA">
    
    <title>SISTEMA - EXPEDIENTE CLÍNICO - PACIENTES</title>
    
    <link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon">
	<link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    
    <!-- Mainly scripts -->
	<script src="js/jquery-3.2.1.js"></script>
    <script src="jquery-ui-1.12.0/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
	<script src="js/plugins/iCheck/icheck.min.js"></script>
	<link href="css/plugins/iCheck/custom.css" rel="stylesheet">
	<link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
	
    <script src="DataTables-1.10.13/media/js/jquery.dataTables.min.js"></script>
    <script src="DataTables-1.10.13/media/js/dataTables.bootstrap.min.js"></script>
    <script src="DataTables-1.10.13/extensions/Select/js/dataTables.select.min.js"></script>
	<script src="TableTools-2.1.5/media/js/TableTools.js"></script>
    <script src="TableTools-2.1.5/media/js/ZeroClipboard.js"></script>
    <script src="bootstrap-validator/js/validator.js"></script>
    <script src="sweetalert/dist/sweetalert.min.js"></script>
    <script src="chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="funciones/js/jquery.media.js" type="text/javascript"></script>
    <script src="funciones/js/jquery.printElement.min.js" type="text/javascript"></script>
    <!-- Input Mask-->
    <script src="jasny-bootstrap/js/jasny-bootstrap.min.js"></script> 
    <!-- Mis funciones -->
    <script src="funciones/js/inicio.js"></script>
    <script src="funciones/js/caracteres.js"></script>
    <script src="funciones/js/calcula_edad.js"></script>
    <script src="funciones/js/cantidad_a_letra.js"></script>
    <script src="funciones/js/redondea.js"></script>
    <script src="funciones/js/stdlib.js"></script>
    <script src="funciones/js/bs-modal-fullscreen.js"></script>
    <script src="funciones/js/generador_rfc.js"></script>
	<script src='tinymce/tinymce.min.js'></script>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="DataTables-1.10.13/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="DataTables-1.10.13/extensions/Scroller/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="DataTables-1.10.13/extensions/Select/css/select.bootstrap.min.css" rel="stylesheet">
	<link href="TableTools-2.1.5/media/css/TableTools.css" rel="stylesheet">
    <link href="bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="sweetalert/dist/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="chosen/chosen.css">
    <link rel="stylesheet" href="chosen/chosen-bootstrap.css">
    <link href="jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
	
    <style>
    	td.details-control { background: url('DataTables-1.10.5/examples/resources/details_open.png') no-repeat center center; cursor: pointer; }
		tr.details td.details-control { background: url('DataTables-1.10.5/examples/resources/details_close.png') no-repeat center center; }
    </style>
	
</head>
<?php include_once 'partes/header.php'; ?>
<!-- Contenido -->
	<div class="hidden" id="dpa_imprimir"></div><div class="hidden" id="dpa_imprimir1"></div>
<input name="aleatorio_ov_a" type="hidden" value="" id="aleatorio_ov_a" required>
<input name="tempi" type="hidden" value="" id="tempi"> <input name="mi_histo" type="hidden" value="" id="mi_histo"> <input type="hidden" id="hpq_no_temp">
	
<input type="hidden" id="hpq_id_pa"> <input type="hidden" id="hpq_nombreP"> <input type="hidden" id="hpq_opc"> <input type="hidden" id="hpq_num_pq">
<input type="hidden" id="hpq_num_pago"> <input type="hidden" id="hpq_no_refe"> <input type="hidden" id="hpq_mi_abu">
	
<div id="div_tabla_pacientes" class="table-responsive" style="border:1px none red; vertical-align:top; margin-top:-9px;">
<table width="100%" height="100%" id="dataTablePrincipal" class="table-condensed table-hover table-bordered table-striped" role="grid" style="font-size: 1.1em;"> 
<thead id="cabecera_tBusquedaPrincipal">
  <tr role="row" class="bg-primary">
    <th id="clickme" style="vertical-align:middle;" width="1%">#</th>
    <th style="vertical-align:middle;">PACIENTE</th>
    <th style="vertical-align:middle;" nowrap>EDAD</th>
    <th style="vertical-align:middle;" width="1%">SEXO</th>
    <th style="vertical-align:middle;">SUCURSAL</th>
    <th style="vertical-align:middle;" nowrap width="1%">EXPEDIENTE CLÍNICO</th>
  </tr>
</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
	<tfoot>
        <tr class="bg-primary">
            <th></th>
            <th><input type="text" class="form-control input-sm" placeholder="-PACIENTE-" style="width:98%;"/></th>
            <th></th>
            <th></th>
            <th><input type="text" class="form-control input-sm" placeholder="-SUCURSAL-"style="width:98%"/></th>
			<th></th>
        </tr>
    </tfoot>
</table>
</div>
<!-- FIN Contenido -->  
<?php include_once 'partes/footer.php'; ?>

<script>
$(document).ready(function(e) {
	//breadcrumb
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li>EXPEDIENTE CLÍNICO</li><li class="active"><strong>PACIENTES</strong></li>');
	
	$('body').popover({selector: '[data-toggle="popover"]', 'trigger': 'hover', 'placement': 'left'});
	
	$(document).on('focus', ':not(.popover)', function(){ $('.popover').popover('hide'); }); //$('[data-toggle="popover"]').popover({ });
	
	$('#my_search').removeClass('hidden'); 
	
	var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-$('#breadc').height()-145;
	var oTableP = $('#dataTablePrincipal').DataTable({
		serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true,
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: false, responsive: true,
		"aoColumns": [
			{"bVisible":true}, {"bVisible":true },{ "bVisible": true }, { "bVisible": true }, { "bVisible": true }, {"bVisible":true}
		],
		"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"iS><"proc"p>',
		deferRender: true, select: false, "processing": false, "sAjaxSource": "datatable-serverside/pacientes_ece.php",
		"fnServerParams": function (aoData, fnCallback) { 
			var de = $('#top-search').val(), cv = $('#convenioP1').val(); 
			aoData.push( {"name": "nombre", "value": de } );
			aoData.push( {"name": "convenio", "value": cv } ); 
		},
		"oLanguage": {
			"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", 
			"sInfo": "PACIENTES FILTRADOS: _END_", "sInfoEmpty": "NINGÚN PACIENTE FILTRADO.", "sInfoFiltered": " TOTAL DE PACIENTES: _MAX_", "sSearch": "",
			"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
		},"iDisplayLength": 100, paging: true,
	});
	
	$('#clickme').click(function(e) { oTableP.draw(); }); window.setTimeout(function(){$('#clickme').click();},500);
	
	//para los fintros individuales por campo de texto
	oTableP.columns().every( function () {
		var that = this; $( 'input', this.footer() ).on( 'keyup change', function () { if ( that.search() !== this.value ) { that .search( this.value ) .draw(); } } );
	} );
	//fin filtros individuales por campo de texto
	
	$('#top-search').keyup(function(e) { $('#dataTablePrincipal_filter input').val($(this).val()); $('#dataTablePrincipal_filter input').keyup(); }).focus();
	$('.filtro1Principal').addClass('hidden');
});
	
function ece(id_p, nombre_p){
	//Checamos si tiene historia clínica nueva, sino, entonces le creamos una
	var datos = {id_p:id_p}
	$.post('pacientes/files-serverside/historia_clinica.php',datos).done(function(data){
		if (data==1){
			swal({
				title: "EXPEDIENTE ELECTRÓNICO", type: "info", text: "¿DESEA IR AL EXPEDIENTE DEL PACIENTE "+nombre_p+"?", showCancelButton: true, confirmButtonText: "Ir", cancelButtonText: "Cancelar", closeOnConfirm: false, showLoaderOnConfirm: true
			},
			function(isConfirm){
				if(isConfirm){ window.location="expediente_clinico.php?idpa="+id_p; }else{}
			});
		}else if(data==2){
			swal({ title: "SIN ANTECEDENTES", type: "warning", text: "EL PACIENTE "+nombre_p+" NO CUENTA CON ANTECEDENTES, DEBE LLENARLOS PRIMERO DESDE LA FICHA DE ENFERMERÍA.", showConfirmButton: true });
		}else{alert(data);}
	});
}
</script>