<?php
	include_once 'recursos/session.php';
	include_once 'Connections/database.php';
	include_once 'recursos/utilities.php';
	include_once 'recursos/datauser.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SISTEMA DE EXPEDIENTE CLÍNICO ELECTRÓNICO">
    <meta name="author" content="ING EMMANUEL ANZURES BAUTISTA">
    
    <title>SISTEMA - CATÁLOGO DE GASTOS VARIOS</title>
    
    <link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon">
	<link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    
    <!-- Mainly scripts -->
	<script src="js/jquery-3.2.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="DataTables-1.10.13/media/js/jquery.dataTables.min.js"></script>
    <script src="DataTables-1.10.13/media/js/dataTables.bootstrap.min.js"></script>
    <script src="DataTables-1.10.13/extensions/Select/js/dataTables.select.min.js"></script>
    <script src="bootstrap-validator/js/validator.js"></script>
    <script src="sweetalert/dist/sweetalert.min.js"></script>
    <script src="chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="funciones/js/jquery.media.js" type="text/javascript"></script>
    <script src="funciones/js/jquery.printElement.min.js" type="text/javascript"></script>
    <script src="funciones/js/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="jQuery-TE_v.1.4.0/uncompressed/jquery-te-1.4.0.js" charset="utf-8"></script>
    <script src='tinymce/tinymce.min.js'></script>
    <script src='c3/c3.min.js'></script>
    <script src='c3/d3/d3.min.js'></script>
    <!-- Input Mask-->
    <script src="jasny-bootstrap/js/jasny-bootstrap.min.js"></script> 
    <!-- Mis funciones -->
    <script src="funciones/js/inicio.js"></script>
    <script src="funciones/js/caracteres.js"></script>
    <script src="funciones/js/calcula_edad.js"></script>
    <script src="funciones/js/stdlib.js"></script>
    <script src="funciones/js/bs-modal-fullscreen.js"></script>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="DataTables-1.10.13/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="DataTables-1.10.13/extensions/Scroller/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="DataTables-1.10.13/extensions/Select/css/select.bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="sweetalert/dist/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="chosen/chosen.css">
    <link rel="stylesheet" href="chosen/chosen-bootstrap.css">
    <link href="jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="jQuery-TE_v.1.4.0/jquery-te-1.4.0.css" rel="stylesheet">
    <link href="c3/c3.css" rel="stylesheet">
</head>
<?php include_once 'partes/header.php'; ?>
<!-- Contenido -->
<div id="div_tabla_pacientes" class="" style="vertical-align:top; margin-top:-9px;">
<table width="100%" height="100%" id="dataTablePrincipal" class="table-hover table-bordered table-condensed" role="grid"> 
<thead id="cabecera_tBusquedaPrincipal">
  <tr role="row" class="bg-primary">
    <th id="clickme" style="vertical-align:middle;">#</th>
    <th style="vertical-align:middle; white-space:nowrap;">
		<button type='button' class='btn btn-success btn-xs' id='btn_add_gasto' onClick='nuevo_gasto()' title='Agregar un nuevo gasto'><i class='fa fa-plus' aria-hidden='true'></i> GASTO</button>
	</th>
    <th style="vertical-align:middle;">USUARIO QUE CREÓ</th>
    <th style="vertical-align:middle;">FECHA DE CREACIÓN</th>
  </tr>
</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
	<tfoot>
        <tr class="bg-primary">
            <th></th>
            <th><input type="text" class="form-control input-sm" placeholder="Concepto" style="width:98%;"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Usuario" style="width:98%;"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Fecha" style="width:98%;"/></th>
        </tr>
    </tfoot>
</table>

</div>
<div id="auxiliar" class="hidden"></div> <div id="auxiliar1" class="hidden"></div>
<!-- FIN Contenido -->  
<?php include_once 'partes/footer.php'; ?>

<script>
$(document).ready(function(e) {
	//breadcrumb
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li>GASTOS VARIOS</li><li class="active"><strong>CATÁLOGO DE GASTOS VARIOS</strong></li>');
	
	$('#my_search').removeClass('hidden'); $.fn.datepicker.defaults.autoclose = true; 
	
	var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-143-$('#breadc').height();
	var oTableP = $('#dataTablePrincipal').DataTable({
		serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true,
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: false, responsive: true,
		"aoColumns": [ {"bVisible":true}, {"bVisible":true },{ "bVisible": true }, {"bVisible":true} ],
		"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"S><"proc"p>', deferRender: true, select: false, "processing": false, 
		"sAjaxSource": "gastos/datatable-serverside/gastos.php",
		"fnServerParams": function (aoData, fnCallback) { 
			var nombre = $('#top-search').val(); var acceso = $('#acc_user').val(); var idU = $('#id_user').val();
			aoData.push( {"name": "nombre", "value": nombre } ); aoData.push(  {"name": "accesoU", "value": acceso } ); aoData.push(  {"name": "idU", "value": idU } );
		},
		"oLanguage": {
			"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "GASTOS FILTRADOS: _END_",
			"sInfoEmpty": "NINGÚN GASTO FILTRADO.", "sInfoFiltered": " TOTAL DE GASTOS VARIOS: _MAX_", "sSearch": "",
			"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
		},"iDisplayLength": 500, paging: true,
	});
	
	$('#clickme').click(function(e) { oTableP.draw(); }); window.setTimeout(function(){$('#clickme').click();},500);
	
	//para los fintros individuales por campo de texto
	oTableP.columns().every( function () {
		var that = this;
		$( 'input', this.footer() ).on( 'keyup change', function () { if ( that.search() !== this.value ) { that .search( this.value ) .draw(); } } );
	} );
	//fin filtros individuales por campo de texto
	$('#top-search').keyup(function(e){ $('#dataTablePrincipal_filter input').val($(this).val()); $('#dataTablePrincipal_filter input').keyup(); }).focus();
	$('.filtro1Principal').addClass('hidden');	
});

function nuevo_gasto(){
	$("#myModal").load("gastos/htmls/ficha_gastos.php",function(response,status,xhr){ if(status=="success"){
		$('#idUsuarioC').val($('#id_user').val()); var nv = new Date(); var aleatory = nv.format('Y-m-d-H-i-s-u').substring(0,22); $('#aleatorio_cto').val(aleatory);
		
		$('#form-concepto').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()) { // handle the invalid form...
			//$("#alerta1").fadeTo(2000,500).slideUp(500,function(){ $("#alerta1").slideUp(600); });
		  } else { // everything looks good!
			e.preventDefault(); 
			var $btn = $('#btn_guardar').button('loading'); $('#btn_cancelar').hide();
			var datosG = $('#myModal #form-concepto').serialize();
			$.post('gastos/files-serverside/add_gasto.php',datosG).done(function( data ) {
				if (data==1){
					$('#clickme').click(); $btn.button('reset'); $('#btn_cancelar').show(); $('#myModal').modal('hide');
					swal({ title: "", type: "success", text: "El concepto de gasto se ha creado.", timer: 1800, showConfirmButton: false }); return;
				} else{alert(data);}
			});
		  }
		});
		
		$('#myModal').modal('show');
		$('#myModal').on('shown.bs.modal', function (e) { $('#form-concepto').validator(); });
		$('#myModal').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal").empty(); });
	} });
}
function ficha_gasto(idG){
	$("#myModal1").load("gastos/htmls/ficha_gastos.php",function(response,status,xhr){ if(status=="success"){
		var datos ={idG:idG}
		$.post('gastos/files-serverside/ficha_gasto.php',datos).done(function( data1 ) {
			var datosI = data1.split('*}'); $('#titulo_modal').text('FICHA DEL GASTO '+datosI[0]);
			
			$('#nombre_g').val(datosI[0]); $('#idUsuarioC').val($('#id_user').val()); $('#id_cto').val(idG); $('#descripcion_g').val(datosI[1]);
		});
					
		$('#form-concepto').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()) { // handle the invalid form...
		  } else { // everything looks good!
			e.preventDefault(); 
			var $btn = $('#btn_guardar').button('loading'); $('#btn_cancelar').hide();
			var datosP = $('#form-concepto').serialize();
			$.post('gastos/files-serverside/update_gasto.php',datosP).done(function( data ) {
				if (data==1){
					$('#clickme').click(); $btn.button('reset'); $('#btn_cancelar').show(); $('#myModal1').modal('hide');
					swal({ title: "", type: "success", text: "Los datos de la consulta han sido actualizados.", timer: 1800, showConfirmButton: false }); return;
				} else{alert(data);}
			});
		  }
		});
		
		$('#myModal1').modal('show');
		$('#myModal1').on('shown.bs.modal', function (e) { $('#form-concepto').validator(); });
		$('#myModal1').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal1").empty(); });
	} });
}
</script>