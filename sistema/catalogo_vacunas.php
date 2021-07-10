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
    
    <title>SISTEMA - CATÁLOGO DE VACUNAS</title>
    
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
<div id="div_tabla_pacientes" class="table-responsive" style="border:1px none red; vertical-align:top; margin-top:-9px;">
<table width="100%" height="100%" id="dataTablePrincipal" class="table-hover table-bordered table-condensed" role="grid"> 
<thead id="cabecera_tBusquedaPrincipal">
  <tr role="row" class="bg-primary">
    <th id="clickme" style="vertical-align:middle;" width="1%">#</th>
    <th style="vertical-align:middle; white-space:nowrap;"><button type='button' class='btn btn-success btn-xs' id='btn_add_vacuna' onClick='nueva_vacuna()' title='Agregar una nueva vacuna'><i class='fa fa-plus' aria-hidden='true'></i> VACUNA</button></th>
    <th style="vertical-align:middle;">ENFERMEDAD QUE PREVIENE</th>
	<th style="vertical-align:middle;">EDAD</th>
	<th style="vertical-align:middle;">APLICACIÓN</th>
	<th style="vertical-align:middle;">DOSIS</th>
	<th style="vertical-align:middle;">ESQUEMA</th>
  </tr>
</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
	<tfoot>
        <tr class="bg-primary">
            <th></th>
            <th><input type="text" class="form-control input-sm" placeholder="Vacuna" style="width: 98%;"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Enfermedad previene" style="width: 98%;"/></th>
			<th><input type="text" class="form-control input-sm" placeholder="Edad" style="width: 98%;"/></th>
			<th><input type="text" class="form-control input-sm" placeholder="Aplicación" style="width: 98%;"/></th>
			<th><input type="text" class="form-control input-sm" placeholder="Dosis" style="width: 98%;"/></th>
			<th></th>
        </tr>
    </tfoot>
</table>

</div>
<div id="auxiliar" class="hidden"></div> <div id="auxiliar1" class="hidden"></div>
<div class="hidden" id="dpa_imprimir"></div><div class="hidden" id="dpa_imprimir1"></div>
<!-- FIN Contenido -->  
<?php include_once 'partes/footer.php'; ?>

<script>
$(document).ready(function(e) {
	//breadcrumb
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li>ENFERMERÍA</li><li class="active"><strong>CATÁLOGO DE VACUNAS</strong></li>');
	
	$('#my_search').removeClass('hidden'); $.fn.datepicker.defaults.autoclose = true; 
	
	var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-147-$('#breadc').height();
	var oTableP = $('#dataTablePrincipal').DataTable({
		serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true,
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: false, responsive: true,
		"aoColumns": [ {"bVisible":true}, {"bVisible":true },{ "bVisible": true }, {"bVisible":true },{ "bVisible": true }, {"bVisible":true },{ "bVisible": true } ],
		"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"S><"proc"p>', 
		deferRender: true, select: false, "processing": false, 
		"sAjaxSource": "enfermeria/datatable-serverside/cat_vacunas.php",
		"fnServerParams": function (aoData, fnCallback) { 
			var nombre = $('#top-search').val(); var acceso = $('#acc_user').val(); var idU = $('#id_user').val();
			
			aoData.push( {"name": "nombre", "value": nombre } ); aoData.push(  {"name": "accesoU", "value": acceso } ); aoData.push(  {"name": "idU", "value": idU } );
		},
		"oLanguage": {
			"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", 
			"sInfo": "VACUNAS FILTRADOS: _END_",
			"sInfoEmpty": "NINGUNA VACUNA FILTRADA.", "sInfoFiltered": " TOTAL DE VACUNAS: _MAX_", "sSearch": "",
			"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
		},"iDisplayLength": 75, paging: true,
	});
	
	$('#clickme').click(function(e) { oTableP.draw(); }); window.setTimeout(function(){$('#clickme').click();},500);
	
	//para los fintros individuales por campo de texto
	oTableP.columns().every( function () {
		var that = this;
		$( 'input', this.footer() ).on( 'keyup change', function () { if ( that.search() !== this.value ) { that .search( this.value ) .draw(); } } );
	} );
	//fin filtros individuales por campo de texto
	$('#top-search').keyup(function(e) { $('#dataTablePrincipal_filter input').val($(this).val()); $('#dataTablePrincipal_filter input').keyup();  }).focus();
	$('.filtro1Principal').addClass('hidden');	
});

function nueva_vacuna(){
	$("#myModal").load("enfermeria/htmls/ficha_vacuna.php",function(response,status,xhr){ if(status=="success"){
		$('#formEstudio').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()) { // handle the invalid form...
		  } else { // everything looks good!
			e.preventDefault(); 
			var $btn = $('#btn_save1').button('loading'); $('#btn_cancel1').hide();
			var datosP = $('#formEstudio').serialize();
			$.post('enfermeria/files-serverside/add_vacuna.php',datosP).done(function( data ) {
				if (data==1){
					$('#clickme').click(); $btn.button('reset'); $('#btn_cancel1').show(); $('#myModal').modal('hide');
					swal({ title: "", type: "success", text: "La nueva vacuna ha sido creada.", timer: 1800, showConfirmButton: false }); return;
				} else{alert(data);}
			});
		  }
		});
		
		$('#myModal').modal('show');
		$('#myModal').on('shown.bs.modal', function (e) { $('#formEstudio').validator(); });
		$('#myModal').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal").empty(); });
	} });
}
function ficha_vacuna(idV, nameV){
	$("#myModal1").load("enfermeria/htmls/ficha_vacuna.php",function(response,status,xhr){ if(status=="success"){
		$('#titulo_modal').text('FICHA DE LA VACUNA: '+nameV);

		var datos ={idV:idV}
		$.post('enfermeria/files-serverside/ficha_vacuna.php',datos).done(function( data1 ) { var datos = data1.split('-}*{');
			$('#idUsuarioE').val($('#id_user').val()); $('#idEstudioE').val(idV); $('#nombre_v').val(datos[0]);
			$('#enfermedad_v').val(datos[1]); $('#edad_v').val(datos[2]); $('#aplicacion_v').val(datos[3]);  $('#dosis_v').val(datos[4]);
		});

		$('#formEstudio').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()) { // handle the invalid form...
		  } else { // everything looks good!
			e.preventDefault(); 
			var $btn = $('#btn_save1').button('loading'); $('#btn_cancel1').hide();
			var datosP = $('#formEstudio').serialize();
			$.post('enfermeria/files-serverside/update_vacuna.php',datosP).done(function( data ) {
				if (data==1){//si el paciente se Actualizó 
					$('#clickme').click(); $btn.button('reset'); $('#btn_cancel1').show(); $('#myModal1').modal('hide');
					swal({ title: "", type: "success", text: "La vacuna se ha actualizado.", timer: 1800, showConfirmButton: false }); return;
				} else{alert(data);}
			});
		  }
		});
		
		$('#myModal1').modal('show');
		$('#myModal1').on('shown.bs.modal', function (e) { $('#formEstudio').validator(); });
		$('#myModal1').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal1").empty(); });
	} });
}

</script>