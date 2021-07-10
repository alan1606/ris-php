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
    
    <title>SISTEMA - CATÁLOGO DE MEMBRESÍAS</title>
    
    <link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon">
	<link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    
    <!-- Mainly scripts -->
	<script src="js/jquery-3.2.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
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
    <!-- Input Mask-->
    <script src="jasny-bootstrap/js/jasny-bootstrap.min.js"></script> 
    <!-- Mis funciones -->
    <script src="funciones/js/inicio.js"></script>
    <script src="funciones/js/caracteres.js"></script>
    <script src="funciones/js/stdlib.js"></script>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="DataTables-1.10.13/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="DataTables-1.10.13/extensions/Scroller/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="DataTables-1.10.13/extensions/Select/css/select.bootstrap.min.css" rel="stylesheet">
    <link href="sweetalert/dist/sweetalert.css" rel="stylesheet">
    <link href="jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
</head>
<?php include_once 'partes/header.php'; ?>
<!-- Contenido -->
<div id="div_tabla_pacientes" class="table-responsive" style="border:1px none red; vertical-align:top; margin-top:-9px;">
<table width="100%" height="100%" id="dataTablePrincipal" class="table-hover table-bordered table-condensed" role="grid"> 
<thead id="cabecera_tBusquedaPrincipal">
  <tr role="row" class="bg-primary">
    <th id="clickme" style="vertical-align:middle;">#</th>
    <th style="vertical-align:middle; white-space:nowrap;"><button type='button' class='btn btn-success btn-xs' id='btnAddEstudio' onClick='nuevoEstudio()' title='Agregar una nueva membresía'><i class='fa fa-plus' aria-hidden='true'></i> MEMBRESÍA</button></th>
    <th style="vertical-align:middle;" width="1%">PRECIO</th>
    <th style="vertical-align:middle;" nowrap width="1%">NÚMERO DE BENEFICIARIOS</th>
  </tr>
</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
	<tfoot>
        <tr class="bg-primary">
            <th></th>
            <th><input type="text" class="form-control input-sm" placeholder="Nombre de la membresía" style="width: 98%;"/></th>
            <th></th>
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
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li>ADMINISTRACIÓN</li><li>MEMBRESÍAS</li><li class="active"><strong>CATÁLOGO DE MEMBRESÍAS</strong></li>');
	
	$('#my_search').removeClass('hidden');
	
	var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-147-$('#breadc').height();
	var oTableP = $('#dataTablePrincipal').DataTable({
		serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true,
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: false, responsive: true,
		"aoColumns": [ {"bVisible":true}, {"bVisible":true },{ "bVisible": true }, {"bVisible":true} ],
		"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"S><"proc"p>', 
		deferRender: true, select: false, "processing": false, 
		"sAjaxSource": "membresias/datatable-serverside/membresias.php",
		"fnServerParams": function (aoData, fnCallback) { 
			var nombre = $('#top-search').val();
			var acceso = $('#acc_user').val(); var idU = $('#id_user').val();
			
			aoData.push( {"name": "nombre", "value": nombre } );
			aoData.push(  {"name": "accesoU", "value": acceso } );
			aoData.push(  {"name": "idU", "value": idU } );
		},
		"oLanguage": {
			"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", 
			"sInfo": "SERVICIOS FILTRADOS: _END_",
			"sInfoEmpty": "NINGÚN SERVICIO FILTRADO.", "sInfoFiltered": " TOTAL DE SERVICIOS: _MAX_", "sSearch": "",
			"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
		},"iDisplayLength": 500, paging: true,
	});
	
	$('#clickme').click(function(e) { oTableP.draw(); }); window.setTimeout(function(){$('#clickme').click();},500);
	
	//para los fintros individuales por campo de texto
	oTableP.columns().every( function () {
		var that = this;
 
		$( 'input', this.footer() ).on( 'keyup change', function () {
			if ( that.search() !== this.value ) { that .search( this.value ) .draw(); }
		} );
	} );
	//fin filtros individuales por campo de texto
	$('#top-search').keyup(function(e) {
        $('#dataTablePrincipal_filter input').val($(this).val()); $('#dataTablePrincipal_filter input').keyup();
    }).focus();
	
	$('.filtro1Principal').addClass('hidden');
	
});

function nuevoEstudio(){
	$("#myModal").load("membresias/htmls/membresia.php",function(response,status,xhr){ if(status=="success"){
		$('#idUsuarioE').val(<?PHP echo $id_u; ?>);
		$('#formEstudio').validator().on('submit', function (e) {
			if (e.isDefaultPrevented()) { // handle the invalid form...
		  	} else { // everything looks good!
			e.preventDefault();
			var $btn = $('#btn_save1').button('loading'); $('#btn_cancel1').hide();
			var datosP = $('#myModal #formEstudio').serialize();
			$.post('membresias/files-serverside/add_membresia.php',datosP).done(function( data ) {
				if (data==1){//si el paciente se Actualizó 
					$('#clickme').click(); $btn.button('reset'); $('#btn_cancel1').show(); $('#myModal').modal('hide');
					swal({ title: "", type: "success", text: "La membresía ha sido creada.", timer: 1800, showConfirmButton: false }); return;
				} else{alert(data);}
			});
		  }
		});
		
		$('#myModal').modal('show');
		$('#myModal').on('shown.bs.modal', function (e) { $('#formEstudio').validator(); });
		$('#myModal').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal").empty(); });
	} });
}
function fichaEstudio(idE, nameS){
	$("#myModal1").load("membresias/htmls/membresia.php",function(response,status,xhr){ if(status=="success"){
		$('#btn_save1').text('Actualizar'); $('#titulo_modal').text('FICHA DE LA MEMBRESÍA: '+nameS);
		
		var datos ={idE:idE}
		$.post('membresias/files-serverside/ficha_membresia.php',datos).done(function( data1 ) {
			var datosI = data1.split('*}');

			$('#idUsuarioE').val(<?PHP echo $id_u; ?>); $('#idEstudioE').val(idE);

			$('#nombreE').val(datosI[0]); $('#precioE').val(datosI[2]); $('#no_beneficiarios').val(datosI[3]);
		});
		
		$('#formEstudio').validator().on('submit', function (e) {
			if (e.isDefaultPrevented()) { // handle the invalid form...
		  	} else { // everything looks good!
			e.preventDefault(); 
			var $btn = $('#btn_save1').button('loading'); $('#btn_cancel1').hide();
			var datosP = $('#myModal1 #formEstudio').serialize();
			$.post('membresias/files-serverside/update_membresia.php',datosP).done(function( data ) {
				if (data==1){//si el paciente se Actualizó 
					$('#clickme').click(); $btn.button('reset'); $('#btn_cancel1').show(); $('#myModal1').modal('hide');
					swal({ title: "", type: "success", text: "La membresía se ha actualizado.", timer: 1800, showConfirmButton: false }); return;
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