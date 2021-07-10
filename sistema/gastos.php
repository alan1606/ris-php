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
    
    <title>SISTEMA - GASTOS VARIOS</title>
    
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
    <script src="jq-file-upload-9.12.5/js/jquery.iframe-transport.js"></script>
	<script src="jq-file-upload-9.12.5/js/jquery.fileupload.js"></script>
    
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
<div id="div_tabla_principal" style="vertical-align:top; margin-top:-9px;">
<table width="100%" height="100%" id="dataTablePrincipal" class="table-hover table-bordered table-condensed" role="grid"> 
<thead id="cabecera_tBusquedaPrincipal">
  <tr role="row" class="bg-primary">
    <th id="clickme" style="vertical-align:middle;">#</th>
	<th style="vertical-align:middle;" nowrap width="1%">REFERENCIA</th>
    <th style="vertical-align:middle;" nowrap>
        <button class="btn btn-success btn-xs" onClick="nuevo_gasto();">CONCEPTO DE GASTO <i class="fa fa-plus"></i></button>
    </th>
	<th style="vertical-align:middle;">DE</th>
	<th style="vertical-align:middle;">PARA</th>
    <th style="vertical-align:middle;" nowrap width="1%">MONTO</th>
    <th style="vertical-align:middle;" nowrap width="1%">ENTREGADO</th>
	<th style="vertical-align:middle;" nowrap>CAMBIO</th>
	<th style="vertical-align:middle;" nowrap width="1%">COMPROBANTE</th>
  </tr>
</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
	<tfoot>
        <tr class="bg-primary">
            <th></th>
			<th><input type="text" class="form-control input-sm" style="width: 98%;" placeholder="Referencia"/></th>
            <th><input type="text" class="form-control input-sm" style="width: 98%;" placeholder="Concepto"/></th>
            <th><input type="text" class="form-control input-sm" style="width: 98%;" placeholder="Quien entrega"/></th>
            <th><input type="text" class="form-control input-sm" style="width: 98%;" placeholder="Quien recibe"/></th>
            <th></th>
            <th></th>
			<th></th>
			<th></th>
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
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li>GASTOS VARIOS</li><li class="active"><strong>GASTOS</strong></li>');
	
	$('#my_search').removeClass('hidden'); $.fn.datepicker.defaults.autoclose = true; 
	
	var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-147-$('#breadc').height();
	var oTableP = $('#dataTablePrincipal').DataTable({
		serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true, scroller: false, responsive: true,
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ){
			/* Calculate the market share for browsers on this page */
            var iAbonado = 0;
            for ( var i=iStart ; i<iEnd ; i++ ) { iAbonado += aaData[ aiDisplay[i] ][10]*1; }
             
            /* Modify the footer row to match what we want */
            var nCells = nRow.getElementsByTagName('th');
			nCells[5].innerHTML = '<div align="center">$ '+redondear(parseFloat(iAbonado * 100)/100,2)+'</div>';
		},
		"aoColumns":[
			{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},
			{"bVisible":true}
		],
		"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"S><"proc"p>', deferRender: true, select: false, "processing": false, 
		"sAjaxSource": "gastos/datatable-serverside/gastos_generados.php",
		"fnServerParams": function (aoData, fnCallback) { 
			var de1 = $('#top-search').val();
			var de = $('#fechaDe').val()+' 00:00:00'; 
			var a = $('#fechaA').val()+' 23:59:59';
			var accesoU = $('#acc_user').val();
			var idU = $('#id_user').val();
			
			aoData.push( {"name": "nombre", "value": de1 } );
			aoData.push(  {"name": "min", "value": de } ); 
			aoData.push(  {"name": "max", "value": a } );
			aoData.push(  {"name": "accesoU", "value": accesoU } );
			aoData.push(  {"name": "idU", "value": idU } );
		},
		"oLanguage": {
			"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", 
			"sInfo": "SERVICIOS FILTRADOS: _END_",
			"sInfoEmpty": "NINGÚN SERVICIO FILTRADO.", "sInfoFiltered": " TOTAL DE SERVICIOS: _MAX_", "sSearch": "",
			"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
		},"iDisplayLength": 90000000, paging: true,
	});
	
	$('#clickme').click(function(e) { oTableP.draw(); }); window.setTimeout(function(){$('#clickme').click();},500);
	
	//para los fintros individuales por campo de texto
	oTableP.columns().every( function () {
		var that = this;
 
		$( 'input', this.footer() ).on( 'keyup change', function () { if ( that.search() !== this.value ) { that .search( this.value ) .draw(); } } );
	} );
	//fin filtros individuales por campo de texto
	$('#top-search').keyup(function(e) { $('#dataTablePrincipal_filter input').val($(this).val()); $('#dataTablePrincipal_filter input').keyup(); }).focus();
	$('.filtro1Principal').addClass('hidden');
	
	$('.infoPrincipal').append('<div id="divRangoFechas" style="text-align:left;"> <table width="100%" border="0" cellpadding="4" cellspacing="2" style="color:black; float:left;"> <tr> <td width="10px">De &nbsp;</td> <td width="1%"> <input name="fechaDe" class="fechas form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="width:100px;" type="text" id="fechaDe" value="<?php echo date("Y-m-d"); ?>" readonly > </td> <td width="10px">&nbsp; A &nbsp;</td> <td width="1%"> <input style="width:100px;" name="fechaA" type="text" class="fechas form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" id="fechaA" value="<?php echo date("Y-m-d"); ?>" readonly> </td> <td id="rangosFechas">&nbsp; <input type="radio" class="rad" id="radio1" name="radio" /><label for="radio1">&nbsp; Hoy &nbsp;</label> <input type="radio" class="rad" id="radio2" name="radio" /><label for="radio2">&nbsp; Todos &nbsp;</label> </td> </tr> </table> </div>');
	
	$('#radio1').click(function(e){ $('#fechaDe').val('<?php echo date("Y-m-d"); ?>');$('#fechaA').val('<?php echo date("Y-m-d"); ?>'); oTableP.draw(); });
	
	$('#radio2').click(function(e){ $('#fechaDe').val('2000-01-01'); $('#fechaA').val('<?php echo date("Y-m-d"); ?>'); oTableP.draw(); });
	
	$('#fechaDe').on('changeDate', function(e) { oTableP.draw(); }); $("#fechaA").on('changeDate', function(e) { oTableP.draw(); });
});
	
function monto(id_campo, valor_campo){
	$('#entregado_g, #cambio_g').val('');
	if(!parseFloat(valor_campo)){ $('#'+id_campo).val(''); }
}
function entregado(id_campo, valor_campo){
	if(!parseFloat(valor_campo)){ $('#'+id_campo).val(''); }
	else{
		if(parseFloat($('#monto_g').val())){
			if( parseFloat($('#'+id_campo).val()) <= parseFloat($('#monto_g').val()) ){ $('#cambio_g').val(0); }
			else{ $('#cambio_g').val( parseFloat($('#entregado_g').val()) - parseFloat($('#monto_g').val())); }
		}else{ $('#entregado_g').val(0); swal({ title: "", type: "error", text: "Primero debe ingresar el MONTO", timer: 1800, showConfirmButton: false }); return; }	
	}
}
	
function nuevo_gasto(){
	$("#myModal").load('gastos/htmls/ficha_generar_gasto.php', function(response, status, xhr){ if(status=="success"){
		$('#idUsuarioC').val($('#id_user').val());
		var nv = new Date(); $('#aleatorio_cto').val(nv.format('Y-m-d-H-i-s-u').substring(0,22)); var aleatory = $('#aleatorio_cto').val();
		
		$('#para_g').load('gastos/genera/usuario_recibe_gasto.php',function(response,status,xhr){if(status=="success"){
			window.setTimeout(function(){$("#para_g").chosen();},500);
		}});
		
		$('#concepto_g').load('gastos/genera/concepto_gasto.php',function(response,status,xhr){if(status=="success"){
			window.setTimeout(function(){$("#concepto_g").chosen();},500);
		}});
		
		$('#departamento_g').load('gastos/genera/departamento_gasto.php',function(response,status,xhr){if(status=="success"){
			window.setTimeout(function(){$("#departamento_g").chosen();},500);
		}});
		
		$('#form-concepto').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()) { // handle the invalid form...
		  } else { // everything looks good!
			e.preventDefault();
			if( parseFloat($('#entregado_g').val()) < parseFloat($('#monto_g').val()) ){ $('#entregado_g').focus();
				swal({ title: "", type: "error", text: "La cantidad ENTREGADA debe ser mayor o igual al MONTO", timer: 1800, showConfirmButton: false }); return;
			}else{
				var $btn = $('#btn_guardar').button('loading'); $('#btn_cancelar').hide();
				var datosP = $('#form-concepto').serialize();
				$.post('gastos/files-serverside/generar_gasto.php',datosP).done(function( data ) {
					if (data==1){//si el paciente se Actualizó 
						$('#clickme').click(); $('#myModal').modal('hide');
						swal({
							title: "", type: "success", text: "El gasto ha sido generado. ¿Deseas imprimir el ticket comprobante?", showCancelButton: true, confirmButtonText: "Imprimir", cancelButtonText: "Salir", closeOnConfirm: false
						},
						function(){
							swal.close();
							$("#myModal1").load('pacientes/htmls/ticket_nuevo.php', function( response, status, xhr ){ if(status=="success"){
								var datosTi = {noAleatorio:aleatory}
								$.post('pacientes/files-serverside/cargar_ticket.php',datosTi).done(function(data){
									$('#cuerpo_modal').html(data); $('#imprimirTic').click(function(e){ $('#tablaTicket').printElement();});
								});

								$('#myModal1').modal('show');
								$('#myModal1').on('shown.bs.modal',function(e){ });
								$('#myModal1').on('hidden.bs.modal',function(e){ $(".modal-content").remove(); $("#myModal1").empty(); });
							}});					
						});
						return;
					} else{alert(data);}
				});  
			}
		  }
		});
				
		$('#myModal').modal('show');
		$('#myModal').on('shown.bs.modal', function(e){ $('#form-concepto').validator(); });
		$('#myModal').on('hidden.bs.modal', function(e){ $(".modal-content").remove(); $("#myModal").empty(); });
	}});
}
function ver_gasto(id_g, nombre_g){
	$("#myModal1").load('gastos/htmls/ficha_generar_gasto.php', function(response, status, xhr){ if(status=="success"){
		$('#titulo_modal').text('FICHA DEL GASTO '+nombre_g); $('#idEscuela').val(id_g);
		
		var dato = { id_g:id_g, idU:$('#id_user').val() }
		$.post('escuelas/files-serverside/datosEscuela.php', dato).done(function(data){
			var datos = data.split('}[-]{');
			$('#nombre_esc').val(datos[0]); $('#nivel_esc').val(datos[1]); $('#sector_esc').val(datos[2]); $('#estado_esc').val(datos[3]);
		});
				
		$('#form-escuela').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()) { // handle the invalid form...
		  } else { // everything looks good!
			e.preventDefault(); 
			var datosP = $('#myModal1 #form-escuela').serialize();
			$.post('escuelas/files-serverside/updateSchool.php',datosP).done(function( data ) {
				if (data==1){//si el paciente se Actualizó 
					$('#clickme').click(); $('#myModal1').modal('hide'); //$('#btn_cancel_registro').show(); //$btn.button('reset');
					swal({ title: "", type: "success", text: "Los datos se han actualizado.", timer: 1800, showConfirmButton: false }); return;
				} else{alert(data);}
			});
		  }
		});
				
		$('#myModal1').modal('show');
		$('#myModal1').on('shown.bs.modal', function(e){ $('#form-escuela').validator(); });
		$('#myModal1').on('hidden.bs.modal', function(e){ $(".modal-content").remove(); $("#myModal1").empty(); });
	}});
}
function cambio(id,cambio,de,para){
	swal({
		title: "", type: "warning", text: "El usuario "+para+" devuelve $"+cambio+" por concepto de cambio", showCancelButton: true, confirmButtonText: "Aceptar cambio", cancelButtonText: "Cancelar", closeOnConfirm: false, showLoaderOnConfirm: true
	},
	function(isConfirm){
		if (isConfirm) {
			var datos = {id:id}
			$.post('gastos/files-serverside/devuelve_cambio.php',datos).done(function( data ) {
				if (data==1){ $('#clickme').click();
					swal({ title:"", type: "success", text: "La devolución del dinero del cambio ha sido registrado.", timer: 1800, showConfirmButton: false }); return;
				} else{alert(data);}
			});
		}
	});
}

function comprobante(id_g, referencia_g){
	$("#myModal2").load('gastos/htmls/subir_comprobante.php', function(response, status, xhr){ if(status=="success"){
		$('#titulo_modal').text('CARGAR EL COMPRBANTE DEL GASTO '+referencia_g); $('#titulo_d').val(id_g);
		
		//Para el upload
		'use strict'; var userL = $('#id_user').val();
		var url = window.location.hostname === 'blueimp.github.io' ?
			'//jquery-file-upload.appspot.com/' : 'gastos/documentos/index.php?idU='+userL+'&idP='+id_g+'&nombreD='+escape(referencia_g);
		$('#fileupload_logo').fileupload({
			url: url, dataType: 'json',
			submit:function (e, data) {
				$.each(data.files, function (index, file) {
					var input = $('#titulo_d'); data.formData = {titulo_d: input.val(), ext_d:file.name.split('.')[1] };
				});
			},
			progress: function (e, data) {
				var progress=parseInt(data.loaded / data.total * 100,10);$('#progress .bar').css('width', progress + '%');
			},
			done: function(e, data){
				$('#clickme').click(); $('#myModal2').modal('hide');
				swal({ title: "", type: "success", text: "El comprobante se ha guardado.", timer: 1800, showConfirmButton: false }); return;
			},
		});
		//Para el upload
		
		$('#myModal2').modal('show');
		$('#myModal2').on('shown.bs.modal', function(e){  });
		$('#myModal2').on('hidden.bs.modal', function(e){ $(".modal-content").remove(); $("#myModal2").empty(); });
	}});
}

function ver_comprobante(referencia, exte, time,titulo,carpeta,id_doc,que_es){
	$("#myModalx").load('pacientes/htmls/miPDFdocs.php', function(response, status, xhr){ if(status=="success"){
		$('#titulo_modal').text('COMPROBANTE DEL GASTO '+ referencia);
		x=carpeta+'/files/'+id_doc+'.'+exte+'?'+time;
		$('#mi_documento').html('<img src='+x+' style="max-width:750px; border:5px solid white; border-radius:4px; background-color:rgba(255, 255, 255, 1);">');
		
		$('#btn_eliminar_img').click(function(e){ delete_documento(id_doc,titulo,exte,que_es,carpeta); });
		
		$('#myModalx').modal('show');
		$('#myModalx').on('shown.bs.modal', function(e){  });
		$('#myModalx').on('hidden.bs.modal', function(e){ $(".modal-content").remove(); $("#myModalx").empty(); });
	}});	
}

function delete_documento(id_doc, nombre_doc, tipo_doc, titulo,carpeta){//alert(tipo_doc);
	swal({
	  title: "ELIMINAR EL COMPROBANTE", text: "¿Estás seguro de eliminar el archivo?", type: "warning", showCancelButton: true,
	  confirmButtonColor: "#DD6B55", confirmButtonText: "Eliminar", cancelButtonText: "Cancelar", closeOnConfirm: false, showLoaderOnConfirm: true
	},
	function(isConfirm){
		if (isConfirm) {
			var datos = {id:id_doc, tipo:tipo_doc, que_es:titulo,carpeta:carpeta}
			$.post('gastos/files-serverside/eliminar_comprobante.php',datos).done(function( data ) { if (data==1){
				$('#myModalx').modal('hide'); $('#clickme').click();
				swal({ title: "", type: "success", text: "El comprobante se ha eliminado.", timer: 1800, showConfirmButton: false }); return;
			} else{alert(data);} });
		}
	});
}
</script>