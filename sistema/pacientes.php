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

    <title>SISTEMA - PACIENTES</title>

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
<table width="100%" height="100%" id="dataTablePrincipal" class="table-hover table-bordered table-condensed" role="grid" style="font-size: 1em;">
<thead id="cabecera_tBusquedaPrincipal">
  <tr role="row" class="bg-primary">
    <th id="clickme" style="vertical-align:middle;" width="1%">VISITAS</th>
    <th style="vertical-align:middle;">FÓLIO</th>
    <th style="vertical-align:middle;"><button class="btn btn-info btn-sm" type="button" onClick="nuevo_paciente();">PACIENTE <i class="fa fa-user-plus" aria-hidden="true"></i></button></th>
    <th style="vertical-align:middle;">EDAD</th>
    <th style="vertical-align:middle;">SEXO</th>
    <th style="vertical-align:middle;">TELÉFONO</th>
    <th style="vertical-align:middle;">SUCURSAL</th>
    <th style="vertical-align:middle; white-space:nowrap;">FECHA ATENCIÓN</th>
    <th style="vertical-align:middle;">ORDEN</th>
    <th style="vertical-align:middle;">FORMATOS</th>
    <th style="vertical-align:middle;">DOCS</th>
    <th style="vertical-align:middle;">EVTS</th>
    <th style="vertical-align:middle;">UBI</th>
    <th style="vertical-align:middle;"><span title="EXPEDIENTE CLÍNICO ELECTRÓNICO">ECE</span></th>
    <th style="vertical-align:middle;">MEMBRESÍA</th>
	<th style="vertical-align:middle;">PAQUETES</th>
  </tr>
</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
	<tfoot>
        <tr class="bg-primary">
            <th></th>
            <th><input type="text" class="form-control input-sm" placeholder="-FOLIO-" style="width:98%;"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="-PACIENTE-" style="width:98%;"/></th>
            <th></th>
            <th><!--<input style="width:65px" type="text" class="form-control input-sm" placeholder="-SEXO-"/>--></th>
            <th></th>
            <th><input type="text" class="form-control input-sm" placeholder="-SUCURSAL-"style="width:98%"/></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
			<th></th>
        </tr>
    </tfoot>
</table>
</div>
<!-- FIN Contenido -->
<?php include_once 'partes/footer.php'; ?>

<script>
function regresar(){
	$('.si_impre').addClass('hidden'); $('.no_impre').removeClass('hidden'); $('#mi_formato').html('');
}
function crear_formato(nombre_f, id_f, id_p){
	$('.si_impre').removeClass('hidden'); $('.no_impre').addClass('hidden');
	var idForma = {id_f:id_f} //Generamos la nota de evolución si nunca ha sido guardada la consulta
	$.post('pacientes/files-serverside/formato.php',idForma).done(function(datax){
		var datosT = {idP:id_p, idU:$('#id_user').val(), id_vc:1}
		$.post('consultas/files-serverside/cat_texts.php',datosT).done(function(dataT){var datosTe = dataT.split('-{]');
			var alergiasx = datosTe[0], edadx = datosTe[1], sexox = datosTe[2], nombre_pacientex = datosTe[3];
			var nombre_medicox = datosTe[4], svx = datosTe[5], abitusx = datosTe[6], adiccionesx = datosTe[7];
			var puntuacion_glax = datosTe[8], peso_tallax = datosTe[9], fecha_horax = datosTe[10]; //alert(et_firma_medico_atiende_x);
			var nombre_medico_a = datosTe[11], edadx1 = datosTe[12], cedula_p_ma = datosTe[13], nombre_conceptox = datosTe[28];
			var cedula_espe_x = datosTe[14], edad1_x = datosTe[15], especialidadm_x = datosTe[16], fecha_dia_x = datosTe[17];
			var fecha_mes_n_x = datosTe[18], fecha_anio_x = datosTe[19], fecha_hora_x = datosTe[20], nombre_establecimiento_x = datosTe[21];
			var nombre_universidad_x = datosTe[22], peso_x = datosTe[23], et_talla_g = datosTe[24], sex_x = datosTe[25];
			var tiposan_x = datosTe[26], titulom_x = datosTe[27], medico_refiere_x = datosTe[28], fecha_mes_l_x = datosTe[30];
			var firma_medico_atiende_x = datosTe[31], et_t_x = datosTe[34], et_a_x = datosTe[35], et_fc_x = datosTe[36];
			var et_fr_x = datosTe[37], et_temp_x = datosTe[38], et_dx_envio_x = datosTe[39], et_referencia_x = datosTe[40];
			var et_nombre_anestesiologo_x = datosTe[41], et_firma_medico_atiende_x = datosTe[42], et_logo_suc_x = datosTe[43];
			var et_logoe_x = datosTe[44], et_logoee_x = datosTe[45], et_logogm_x = datosTe[46];
			var data = datax;

			data = data.replace(/{ET_ALERGIAS}/gi, alergiasx);
			data = data.replace(/{ET_EDAD}/gi, edadx1);
			data = data.replace(/{ET_NOMBRE_MEDICO_ATIENDE}/gi, nombre_medicox);
			data = data.replace(/{et_nombre_personal_atiende}/gi, nombre_medico_a);
			data = data.replace(/{ET_NOMBRE_PACIENTE}/gi, nombre_pacientex);
			data = data.replace(/{ET_SEX}/gi, sexox);
			data = data.replace(/{ET_SV}/gi, svx);
			data = data.replace(/{ET_ABITUS}/gi, abitusx);
			data = data.replace(/{et_adicciones}/gi, adiccionesx);
			data = data.replace(/{et_puntuacion_g}/gi, puntuacion_glax);
			data = data.replace(/{et_pesotalla_g}/gi, peso_tallax);
			data = data.replace(/{et_fechahora}/gi, fecha_horax);
			data = data.replace(/{et_cedulap}/gi, cedula_p_ma);
			data = data.replace(/{et_nombre_procedimiento}/gi, nombre_conceptox);
			data = data.replace(/{et_cedulaesp}/gi, cedula_espe_x);
			data = data.replace(/{et_edad}/gi, edad1_x);
			data = data.replace(/{et_especialidadm}/gi, especialidadm_x);
			data = data.replace(/{et_fecha_dia}/gi, fecha_dia_x);
			data = data.replace(/{et_fecha_mes_numero}/gi, fecha_mes_n_x);
			data = data.replace(/{et_fecha_mes_letra}/gi, fecha_mes_l_x);
			data = data.replace(/{et_fecha_anio}/gi, fecha_anio_x);
			data = data.replace(/{et_fecha_hora}/gi, fecha_hora_x);
			data = data.replace(/{et_nombre_establecimiento}/gi, nombre_establecimiento_x);
			data = data.replace(/{et_nombre_medico_atiende}/gi, nombre_medico_a);
			data = data.replace(/{et_nombre_universidad}/gi, nombre_universidad_x);
			data = data.replace(/{et_nombre_paciente}/gi, nombre_pacientex);
			data = data.replace(/{et_peso_g}/gi, peso_x);
			data = data.replace(/{et_talla_g}/gi, et_talla_g);
			data = data.replace(/{et_sex}/gi, sex_x);
			data = data.replace(/{et_sv}/gi, svx);
			data = data.replace(/{et_tiposan}/gi, tiposan_x);
			data = data.replace(/{et_titulom}/gi, titulom_x);
			data = data.replace(/{et_nombre_medico_refiere}/gi, medico_refiere_x);
			data = data.replace(/{et_t}/gi, et_t_x);
			data = data.replace(/{et_a}/gi, et_a_x);
			data = data.replace(/{et_fc}/gi, et_fc_x);
			data = data.replace(/{et_fr}/gi, et_fr_x);
			data = data.replace(/{et_temp}/gi, et_temp_x);
			data = data.replace(/{et_dx_envio}/gi, et_dx_envio_x);
			data = data.replace(/{et_referencia}/gi, et_referencia_x);
			data = data.replace(/{et_nombre_anestesiologo}/gi, et_nombre_anestesiologo_x);
			data = data.replace(/{et_firma_medico_atiende}/gi, et_firma_medico_atiende_x);
			data = data.replace(/{et_logo_suc}/gi, et_logo_suc_x);
			data = data.replace(/{et_logoe}/gi, et_logoe_x);
			data = data.replace(/{et_logoee}/gi, et_logoee_x);
			data = data.replace(/{et_logogm}/gi, et_logogm_x);

			tinymce.get('mi_formato').setContent(data);
		});
	});
}
function formatos(id_p, nombre_p){
	$("#myModal1").load('pacientes/htmls/formatos.php', function( response, status, xhr ){ if(status=="success"){
		$('#titulo_modal').text('CREAR UN FORMATO PARA EL PACIENTE '+nombre_p); tinymce.remove("#mi_formato");

		setTimeout(function(){
			var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height() - $('#breadc').height() - 245;
			var oTableP = $('#dataTableFormatos').DataTable({
				serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true,
				"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: false, responsive: true,
				"aoColumns": [ {"bVisible":true}, {"bVisible":true },{ "bVisible": true } ],
				"sDom": '<"filtro1Principal"><"data_tPrincipal"t><"infoPrincipal"S><"proc">',
				deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/datatable-serverside/dt_formatos.php?id_p="+id_p,
				"fnServerParams": function(aoData, fnCallback){ },
				"oLanguage": {
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
					"sInfo": "FORMATOS FILTRADOS: _END_", "sInfoEmpty": "NINGÚN FORMATO FILTRADO.", "sInfoFiltered": " TOTAL DE FORMATOS: _MAX_", "sSearch": "",
					"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
				},"iDisplayLength": 500, paging: true,
			});

			$('#clickmeFmts').click(function(e) { oTableP.draw(); }); window.setTimeout(function(){$('#clickmeFmts').click();},500);

			//para los fintros individuales por campo de texto
			oTableP.columns().every( function () {
				var that = this;
				$( 'input', this.footer() ).on( 'keyup change', function () { if ( that.search() !== this.value ) { that .search( this.value ) .draw(); } } );
			}); //fin filtros individuales por campo de texto

			tinymce.init({
				selector:'#mi_formato',resize:false,height:$('#myModal1').height()*0.63,theme: "modern",
				plugins:
					"table, charmap, emoticons, textcolor colorpicker, hr, image imagetools, image, insertdatetime, lists, noneditable, pagebreak, paste, preview, print, visualblocks, wordcount, code, importcss",
				table_default_styles: { width: '100%' },
				relative_urls: true, image_advtab: true, menubar: false, plugin_preview_width: $('#referencia').width()*0.8,
				toolbar:
					"undo redo | insert | bold italic fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent1 indent1 | link unlink anchor | forecolor backcolor | print_ preview_ code_ | emoticons_ | table | responsivefilemanager_ | mybuttonVP |",
				insert_button_items: 'charmap | cut copy | hr | insertdatetime | pagebreak1',
				paste_data_images: true, paste_as_text: true, browser_spellcheck: true,
				setup: function (editor) {
					editor.addButton( 'mybuttonVP', {
						text: 'IMPRIMIR', icon: false, tooltip: 'Vista de impresión',
						onclick:function(){
							var res = tinyMCE.get("mi_formato").getContent().replace(/<p/g, "<div"); res = res.replace(/<\/p>/g, "</div>"); //alert(res);
							$('#dpa_imprimir1').html(res); $('#dpa_imprimir1').printElement();
						}
					});
				}
			});
		},200);

		$('#myModal1').modal('show'); $('#myModal1').on('shown.bs.modal', function (e) { });
		$('#myModal1').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal1").empty(); });
	} });
}
function select_mem(opc){
	if(opc == 1){
		$('#opcion_m').val(1); window.setTimeout(function(){$('#membresia_comprar1').chosen();},500);
		$('#fila_membresia_comprar').removeClass('hidden'); $('#fila_membresia_existente').addClass('hidden');

	}else if(opc == 2){
		$('#opcion_m').val(2); window.setTimeout(function(){$('#membresia_integrar').chosen();},500);
		$('#fila_membresia_existente').removeClass('hidden'); $('#fila_membresia_comprar').addClass('hidden');

	}else{
		$('#opcion_m').val(0);
		$('#fila_membresia_existente').add('hidden'); $('#fila_membresia_comprar').addClass('hidden'); $('#btn_afiliar_p').addClass('disabled');
	}
}

function abono(cantidad){ if(!parseFloat(cantidad)){cantidad = 0;}else{$('#mi_abono').removeClass('error');}
	if(parseFloat(cantidad)>parseFloat($('#mi_total').text())){ $('#mi_abono').val(parseFloat($('#mi_total').text())); $('#mi_saldo').text(0); }
	else{ $('#mi_saldo').text(parseFloat($('#mi_total').text())-parseFloat(cantidad)); }
}
function pa_abonar(cantidad){ if(!parseFloat(cantidad)){cantidad = 0;}else{$('#mi_pago_abono').removeClass('error');}
	if(parseFloat(cantidad)>parseFloat($('#saldo_a').val())){ $('#mi_pago_abono').val(parseFloat($('#saldo_a').val()));}
	else{ $('#mi_saldo').text(parseFloat($('#saldo_a').val())-parseFloat(cantidad)); }
}
function pa_abonar1(cantidad){ if(!parseFloat(cantidad)){cantidad = 0;}else{$('#mi_pago_abono').removeClass('error');}
	if(parseFloat(cantidad)>parseFloat($('#mi_saldo_pq').text())){ $('#mi_pago_abono').val(parseFloat($('#mi_saldo_pq').text()));}
	else{ $('#mi_saldo').text(parseFloat($('#mi_saldo_pq').text())-parseFloat(cantidad)); }
}

function infoPaq(id_p, nombre_p, opc, nombre_pq){
	$('#titulo_modal').text('COMPARANDO '+nombre_pq); $('#clickmeCPQ').click(); $('.no_comparar').hide(); $('.comparar').show();
	$('#btn_regresar').click(function(){ $('#titulo_modal').text('ADQUIRIR UN PAQUETE PARA EL PACIENTE '+nombre_p); $('.comparar').hide(); $('.no_comparar').show(); });
}

function paquetes(id_p, nombre_p, opc, num_pq){
	$('#hpq_id_pa').val(id_p); $('#hpq_nombreP').val(nombre_p); $('#hpq_opc').val(opc); $('#hpq_num_pq').val(num_pq);
	if(opc==0){
		$("#myModal2").load('pacientes/htmls/comprar_paquete.php', function( response, status, xhr ){ if(status=="success"){ $('.comparar').hide();
			$('#titulo_modal').text('ADQUIRIR UN PAQUETE PARA EL PACIENTE '+nombre_p);

			$('#paquete_comprar').load('pacientes/genera/paquetes_comprar.php',function(response,status,xhr){if(status=="success"){
				$('#paquete_comprar').change(function(e){ $('#mi_abono').val('');
					if(this.value==''){
						$('#btn_paquetar_p, #btn_info_paq').addClass('disabled'); $('#tabla_detalle').addClass('hidden');
						$('#btn_info_paq').replaceWith('<button type="button" class="btn btn-info btn-sm disabled" id="btn_info_paq"><i class="fa fa-info" aria-hidden="true"></i></button>');
					}else{
						$('#btn_paquetar_p, #btn_info_paq').removeClass('disabled'); $('#tabla_detalle').removeClass('hidden');
						var xxx = $('#paquete_comprar').find(':selected').text().split('| ($'); var xxx1 = xxx[1].split(') |');
						$('#mi_total, #mi_saldo').text(xxx1[0]); var nombresillo = '"'+nombre_p+'"', paquetillo = '"'+xxx[0]+'"';
						$('#btn_info_paq').replaceWith("<button type='button' class='btn btn-info btn-sm' id='btn_info_paq' onClick='infoPaq("+id_p+", "+nombresillo+", "+opc+", "+paquetillo+")'><i class='fa fa-info' aria-hidden='true'></i></button>");
					}
				});
			}}); window.setTimeout(function(){$('#paquete_comprar').chosen();},500);

			var nv = new Date(); $('#aleatorio_me').val(nv.format('Y-m-d-H-i-s-u').substring(0,22)); var aleatory = $('#aleatorio_me').val();

			$('#btn_paquetar_p').click(function(){
				if($('#paquete_comprar').val()!=''){
					if(!parseFloat($('#mi_abono').val())){ $('#mi_abono').addClass('error').focus();
					   swal({title:"", type:"error", text:"Debe ingresar la cantidad a abonar.", timer: 1800, showConfirmButton: false });
					}else{
					   var datos={id_p:id_p,id_pq:$('#paquete_comprar').val(),id_u:$('#id_user').val(),no_aleatorio:$('#aleatorio_me').val(),abono:$('#mi_abono').val()}
						$.post('pacientes/files-serverside/adquirirPaquete.php',datos).done(function(data){
							if(data==1){ $('#clickme').click(); $('#myModal2').modal('hide');
								swal({
									title: "PAQUETE ADQUIRIDO", type: "success", text: "El paciente ha comprado el paquete. ¿Desea imprimir el ticket comprobante?", showCancelButton:true, confirmButtonText:"Imprimir", cancelButtonText:"Salir", closeOnConfirm:false,confirmButtonClass:"btn-danger", showLoaderOnConfirm: true
								},
								function(isConfirm){
									if (isConfirm) {
										swal.close();
										$("#myModal1").load('pacientes/htmls/ticket_nuevo.php', function( response, status, xhr ){ if(status=="success"){
											var datosTi = {noAleatorio:aleatory}
											$.post('pacientes/files-serverside/cargar_ticket.php',datosTi).done(function(data){
												$('#cuerpo_modal').html(data); $('#imprimirTic').click(function(e){ $('#tablaTicket').printElement();});
											});

											$('#myModal1').modal('show');
											$('#myModal1').on('shown.bs.modal',function(e){ });
											$('#myModal1').on('hidden.bs.modal',function(e){
												$(".modal-content").remove(); $("#myModal1").empty();
												window.setTimeout(function(){ paquetes(id_p, nombre_p, 1, num_pq); },400);
											});
										}});
									}else{ window.setTimeout(function(){ paquetes(id_p, nombre_p, 1, num_pq); },400);}
								});
								return;
							}else if(data==2){
								swal({title:"", type:"error", text:"El paciente ya cuenta con este paquete y está activo.", timer: 1800, showConfirmButton: false });
							} else{alert(data);}
						});
					}
				}
			});

			$('#myModal2').modal('show'); $('#myModal2').on('shown.bs.modal', function (e) {
				var oTableCpq = $('#dataTableComparar').DataTable({
					serverSide: true,"sScrollY": 300, ordering: false, searching: true, scrollCollapse: true, "scrollX": true, scroller: false, responsive: true,
					"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
						var nCells = nRow.getElementsByTagName('th');

						var datos = { id_pq:$('#paquete_comprar').val() }
						$.post('pacientes/files-serverside/totales_comparar_pq.php',datos).done(function(data){
							var datosQ = data.split('}*'); $('#suma_sin_pq').text(datosQ[0]); $('#suma_con_pq').text(datosQ[1]); $('#suma_ahorro').text(datosQ[2]);
							nCells[3].innerHTML = '<div align="center" style="font-size:1.2em;">$'+redondear(parseFloat(datosQ[0] * 100)/100,2)+"</div>";
							nCells[4].innerHTML = '<div align="center" style="font-size:1.4em;">$'+redondear(parseFloat(datosQ[1] * 100)/100,2)+"</div>";
							nCells[5].innerHTML = '<div align="center" style="font-size:1.6em;">$'+redondear(parseFloat(datosQ[2] * 100)/100,2)+"</div>";
						});
					},
					"aoColumns": [ {"bVisible":true}, {"bVisible":true },{ "bVisible": true }, {"bVisible":true },{ "bVisible": true },{ "bVisible": true } ],
					"sDom": '<"filtro1Principal"><"data_tPrincipal"t><"infoPrincipal"S><"proc">', destroy: true,
					deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/datatable-serverside/comparar_paquete.php",
					"fnServerParams": function(aoData, fnCallback){ var id_pq = $('#paquete_comprar').val(); aoData.push( {"name": "id_pq", "value": id_pq } ); },
					"oLanguage": {
						"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
						"sInfo": "CONCEPTOS FILTRADOS: _END_", "sInfoEmpty": "NINGÚN CONCEPTO FILTRADO.", "sInfoFiltered": " TOTAL DE CONCEPTOS: _MAX_", "sSearch": "",
						"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
					},"iDisplayLength": 500, paging: true,
				});

				$('#clickmeCPQ').click(function(e) { oTableCpq.draw(); }); window.setTimeout(function(){$('#clickmeCPQ').click();},1000);
			});
			$('#myModal2').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal2").empty(); });
		} });
	}else if(opc==1){
		$("#myModalx").load('pacientes/htmls/historial_paquetes.php', function( response, status, xhr ){ if(status=="success"){
			$('#titulo_modal').text('PAQUETES DEL PACIENTE '+nombre_p); $('.pago_abono').hide();
			$('#btn_un_comprar_pq').click(function(){ $('#myModalx').modal('hide'); window.setTimeout(function(){ paquetes(id_p, nombre_p, 0, num_pq); },300); });
			$('#btn_cancelar_abono').click(function(){ cancelar_abono(); }); $('#id_u_abono').val();

			$('#myModalx').modal('show'); $('#myModalx').on('shown.bs.modal', function(e){
				var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height() - $('#breadc').height() - 250;
				var oTableHpq = $('#dataTableHistorial').DataTable({
					serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true, scroller: false, responsive: true,
					"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, "bAutoWidth" : false, "bStateSave": false, "bLengthChange": false,
					"aoColumns": [
						{ "bVisible":false },{"bVisible":true},{"bVisible":true},{"bVisible": true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}
					],
					"sDom": '<"filtro1Principal"><"data_tPrincipal"t><"infoPrincipal"S><"proc">', destroy: true,
					deferRender: true, select: false, "bProcessing": false, "sAjaxSource": "pacientes/datatable-serverside/historial_paquetes.php",
					"fnServerParams": function(aoData, fnCallback){
						var mi_id_p = id_p; aoData.push( {"name": "id_p", "value": mi_id_p } );
						var mi_estatus = $('#status_pqs').val(); aoData.push( {"name": "estatus_pqs", "value": mi_estatus } );
					},
					"oLanguage": {
						"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "EL PACIENTE NO CUENTA CON PAQUETES",
						"sInfo": "PAQUETES FILTRADOS: _END_", "sInfoEmpty": "NINGÚN PAQUETE FILTRADO.", "sInfoFiltered": " TOTAL DE PAQUETES: _MAX_", "sSearch": "",
						"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>",
						"sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
					},"iDisplayLength": 500, paging: true,
				});

				oTableHpq.columns().every( function () {
					var that = this;
					$( 'input', this.footer() ).on( 'keyup change', function () { if ( that.search() !== this.value ) { that .search( this.value ) .draw(); } } );
				} );

				$('#clickmeHPQ').click(function(e) { oTableHpq.draw(); cancelar_abono(); }); window.setTimeout(function(){$('#clickmeHPQ').click();},1000);
				$('#status_pqs').change(function(){ $('#clickmeHPQ').click(); });
			});
			$('#myModalx').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModalx").empty(); });
		} });
	}
}

function detalles_pq(id_pq, nombre_pq, folio_pq, nombre_pa, activo_pa){ $('#myModalx').modal('hide');
	window.setTimeout(function(){
		$("#myModalx1").load('pacientes/htmls/detalle_paquete.php', function( response, status, xhr ){ if(status=="success"){
			$('#titulo_modal').text(nombre_pq+' | '+folio_pq+' | '+nombre_pa); $('#id_pq').val(id_pq);
			$('#btn_back_hpq').click(function(){ $('#myModalx1').modal('hide');
				window.setTimeout(function(){ paquetes($('#hpq_id_pa').val(), $('#hpq_nombreP').val(), 1, $('#hpq_num_pq').val()) },500);
			});
			//Si el paquete está finalizado: botón de generar orden no aparece
			if(activo_pa!=1){$('#btn_genera_ov, #div_pago_abono').remove();}

			var tamCPQ = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height() - $('#breadc').height() - 235;
			var oTableCPQ = $('#dataTableCPQ').DataTable({
				serverSide: true,"sScrollY": tamCPQ, ordering: false, searching: false, scrollCollapse: false, "scrollX": true,
				"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
					var nCells = nRow.getElementsByTagName('th');

					var datos = { id_pq:id_pq }
					$.post('pacientes/files-serverside/totales_detalles_pq.php',datos).done(function(data){
						var datosQ = data.split('}*');
						nCells[3].innerHTML = '<div align="center" style="font-size:1.5em;">$<span id="my_disponible_c">'+redondear(parseFloat(datosQ[0] * 100)/100,2)+"</span></div>";
						nCells[4].innerHTML = '<div align="center" style="font-size:1.2em;">$'+redondear(parseFloat(datosQ[1] * 100)/100,2)+"</div>";
						nCells[5].innerHTML = '<div align="center" style="font-size:1.2em;">$'+redondear(parseFloat(datosQ[2] * 100)/100,2)+"</div>";
						nCells[6].innerHTML = '<div align="center" style="font-size:1.5em;">$'+redondear(parseFloat(datosQ[3] * 100)/100,2)+"</div>";
					});
				},
				"aoColumns": [
					{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}
				],
				"sDom": '<""f>r<""t><""S><"">', deferRender: true, select: false, "processing": false,
				"sAjaxSource": "pacientes/datatable-serverside/conceptos_detalle_paquete.php", scroller: false, responsive: true,
				"fnServerParams": function(aoData, fnCallback){
					aoData.push( {"name": "id_pq", "value": id_pq } );
				},
				"oLanguage": {
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
					"sInfo": "FORMATOS FILTRADOS: _END_", "sInfoEmpty": "NINGÚN FORMATO FILTRADO.", "sInfoFiltered": " TOTAL DE FORMATOS: _MAX_", "sSearch": "",
					"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
				},"iDisplayLength": 5000, paging: false, destroy:true
			});

			$('#clickmeCPQ').click(function(e) {
				oTableCPQ.draw(); $('.marcado').prop("checked",false); $('#btn_genera_ov').addClass('disabled'); $('.marcado').removeClass('marcado');
			}); window.setTimeout(function(){$('#clickmeCPQ').click();},500);

			$('#tap_hcpq').click(function(){ $('#clickmeCPQ').click(); });

			var oTablePPQ = $('#dataTablePPQ').DataTable({
				serverSide: true,"sScrollY": tamCPQ-15, ordering: false, searching: false, scrollCollapse: false, "scrollX": true,
				"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
					var nCells = nRow.getElementsByTagName('th');

					var datos = { id_pq:id_pq }
					$.post('pacientes/files-serverside/totales_detalles_pq.php',datos).done(function(data){
						var datosQ = data.split('}*');
						var abonado = redondear(parseFloat((parseFloat(datosQ[1] * 100)/100)) + parseFloat((parseFloat(datosQ[0] * 100)/100)),2);
						var saldo = redondear(parseFloat(parseFloat(datosQ[2] * 100)/100)-parseFloat(abonado),2)
						nCells[1].innerHTML = '<div align="center" style="font-size:1.4em;">$'+abonado+"</div>";
						$('#mi_saldo_pq').text(saldo); $('#mi_total_pq').text('$ '+redondear(parseFloat(datosQ[2] * 100)/100,2));
						$('#mi_abonado_pq').text('$ '+abonado);
					});
				},
				"aoColumns": [ {"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true} ],
				"sDom": '<""f>r<""t><""S><"">', deferRender: true, select: false, "processing": false,
				"sAjaxSource": "pacientes/datatable-serverside/pagos_detalle_paquete.php", scroller: false, responsive: true,
				"fnServerParams": function(aoData, fnCallback){
					aoData.push( {"name": "id_pq", "value": id_pq } );
				},
				"oLanguage": {
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
					"sInfo": "FORMATOS FILTRADOS: _END_", "sInfoEmpty": "NINGÚN FORMATO FILTRADO.", "sInfoFiltered": " TOTAL DE FORMATOS: _MAX_", "sSearch": "",
					"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
				},"iDisplayLength": 5000, paging: false, destroy:true
			});

			$('#clickmePPQ').click(function(e) { oTablePPQ.draw(); }); window.setTimeout(function(){$('#clickmePPQ').click();},500);

			$('#tap_hppq').click(function(){ $('#clickmePPQ').click(); });

			$('#myModalx1').modal('show');
			$('#myModalx1').on('shown.bs.modal',function(e){ });
			$('#myModalx1').on('hidden.bs.modal',function(e){ $(".modal-content").remove(); $("#myModalx1").empty(); });
		}});
	},500);
}

function cancelar_abono(){$('.pago_abono').hide(); $('#mi_pago_abono').val('');}
function usar_c(id_concepto, precio,este){ //checkis
	var total = 0, total1 = 0, totalisimo =0, dispo = parseFloat($('#my_disponible_c').text());
	//Checamos si el nuevo precio del item junto con la suma de los anteriores precios no rebasa el disponible
	if($('#'+este).prop("checked") == true){
		$('.marcado').each(function(){//sumamos todos los precios de los conceptos seleccionados
			total1 = parseFloat(total1) + parseFloat($(this).prop("lang"));
		}); totalisimo = parseFloat($('#'+este).prop("lang")) + parseFloat(total1);
	}else{
		$('.marcado').each(function(){//sumamos todos los precios de los conceptos seleccionados
			total1 = parseFloat(total1) + parseFloat($(this).prop("lang"));
		}); totalisimo = parseFloat(total1);
	}

	if(parseFloat(totalisimo)>parseFloat(dispo)){
		$('#'+este).prop("checked",false);
		swal({title:"", type:"error", text:"El monto disponible es insuficiente para cubrir este concepto.", timer: 1800, showConfirmButton: false });
	}else{
		if($('#'+este).prop("checked") == true){ $('#'+este).addClass('marcado');
			//Se debe actualizar el saldo de usar y dejar marcado este checkbox si el disponible alcanza
			$('.marcado').each(function(){//sumamos todos los precios de los conceptos seleccionados
				total = parseFloat(total) + parseFloat($(this).prop("lang")); //alert($(this).prop("lang"));
			}); //alert($('#'+este).prop("class"));
		}else{ $('#'+este).removeClass('marcado');
			$('.marcado').each(function(){ total = parseFloat(total) + parseFloat($(this).prop("lang")); });
		}//alert(total);
		var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height() - $('#breadc').height() - 245;
		$('#dataTableCPQ').DataTable( {
			"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
				var nCells = nRow.getElementsByTagName('th');
				nCells[6].innerHTML = '<div align="center" style="font-size:1.4em;">$'+redondear(parseFloat(total * 100)/100,2)+"</div>";
			}, destroy: true, "scrollCollapse": false, "paging": false, searching: false, "sDom": '<""f>r<""t><""S><"">', ordering: false, "scrollY":tamP
		} );
	}
	if($('.marcado').length>0){$('#btn_genera_ov').removeClass('disabled');}else{$('#btn_genera_ov').addClass('disabled');}
}
function generar_orden(){
	if($('.marcado').length>0){
		swal({
			title: "GENERAR ORDEN", type: "", text: "¿Desea generar la orden?", showCancelButton: true, confirmButtonText: "Generar orden", cancelButtonText: "Cancelar", closeOnConfirm: false, showLoaderOnConfirm: true
		},
		function(){ var ids = ''; //Se manda un arreglo con los ids de los conceptos del paquete a vender, son los id_cb de la tabla conceptos_paquetes
			$('.marcado').each(function(){ ids = $(this).val()+";"+ids; }); //alert(ids.slice(0, -1)); $('#hpq_id_pa').val()
			var nv = new Date(); var aleatory = nv.format('Y-m-d-H-i-s-u').substring(0,22);

			var datos={id_p:$('#hpq_id_pa').val(),ids_ctos:ids.slice(0, -1),id_u:$('#id_user').val(),no_aleatorio:aleatory,abono:0,no_ctos:$('.marcado').length}
			$.post('pacientes/files-serverside/generar_orden_pq.php',datos).done(function(data){ var data1 = data.split('];');
				if(data1[0]==1){ $('#clickmeHPQ, #clickme, #clickmeCPQ').click(); $('#myModalx1').modal('hide');
					swal({
						title: "ORDEN GENERADA", type: "success", text: "La orden se generó correctamente. ¿Deseas imprimir el comprobante?", showCancelButton: true, confirmButtonText: "Imprimir", cancelButtonText: "Salir", closeOnConfirm: false, showLoaderOnConfirm: true
					},
					function(isConfirm){//Cerrar la ventana de Historial paquetes,imprimir ticket si se requiere,cerrar ventana ticket y volver abrir historial paquetes
						if(isConfirm){
							swal.close();
							$("#myModal1").load('pacientes/htmls/ticket_nuevo.php', function( response, status, xhr ){ if(status=="success"){
								var datosTi = {noAleatorio:data1[1]}
								$.post('pacientes/files-serverside/cargar_ticket.php',datosTi).done(function(data){
									$('#cuerpo_modal').html(data); $('#imprimirTic').click(function(e){ $('#tablaTicket').printElement();});
								});

								$('#myModal1').modal('show');
								$('#myModal1').on('shown.bs.modal',function(e){ });
								$('#myModal1').on('hidden.bs.modal',function(e){
									$(".modal-content").remove(); $("#myModal1").empty();
									window.setTimeout(function(){ detalles_pq(data1[6], data1[2], data1[7], data1[8], data1[9]); },300);
								});
							}});
						}else{window.setTimeout(function(){ detalles_pq(data1[6], data1[2], data1[7], data1[8], data1[9]); },300);}
					}); return;
				}else{alert(data);}
			});
		});
	}else{ swal({title:"", type:"error", text:"Debe de marcar al menos un concepto.", timer: 1800, showConfirmButton: false }); }
}

function abonar(nombre_pq, id_pq, folio_pq,saldo,no_temp_ov,referencia_ov){
	$('.pago_abono').show(); $('#saldo_a').val(saldo); $('#mi_name_pq').text(nombre_pq); $('#mi_folio_pq').text(folio_pq); $('#hpq_no_temp').val(no_temp_ov);
	$('#mi_pago_abono').val('').focus(); $('#id_pq').val(id_pq); $('#hpq_no_refe').val(referencia_ov);
	var nv = new Date(); $('#hpq_num_pago').val(nv.format('Y-m-d-H-i-s').substring(0,22)); //var aleatory = $('#aleatorio_pq').val();
}
function pagar_abono(algo){
	if(!parseFloat($('#mi_pago_abono').val())){ $('#mi_pago_abono').addClass('error').focus();
	   swal({title:"", type:"error", text:"Debe ingresar la cantidad a abonar.", timer: 1800, showConfirmButton: false });
	}else{
		var aleatory = $('#hpq_num_pago').val(); $('#hpq_mi_abu').val($('#mi_pago_abono').val());
		var datos={ pago:$('#mi_pago_abono').val(),id_u:$('#id_user').val(),id_pq:$('#id_pq').val(), aleatorio:aleatory }
		$.post('pacientes/files-serverside/abonarPaquete.php',datos).done(function(data){ var data1 = data.split('{]*}');
			if(data1[0]==1){ $('#clickmeHPQ').click(); $('.pago_abono').hide(); $('#mi_pago_abono').val('');
				if(algo==1){$('#myModalx1').modal('hide');}else{$('#myModalx').modal('hide');}
				swal({
					title: "ABONO REALIZADO", type: "success", text: "El pago ha sido registrado. ¿Deseas imprimir el ticket de pago?", showCancelButton: true, confirmButtonText: "Imprimir", cancelButtonText: "Salir", closeOnConfirm: false, showLoaderOnConfirm: true
				},
				function(isConfirm){
					if(isConfirm){
						swal.close();
						$("#myModal1").load('pacientes/htmls/ticket_nuevo.php', function( response, status, xhr ){ if(status=="success"){
							var datosTi = {noAleatorio:data1[6]}
							$.post('pacientes/files-serverside/cargar_ticket.php',datosTi).done(function(data){
								$('#cuerpo_modal').html(data); $('#imprimirTic').click(function(e){ $('#tablaTicket').printElement();});
							});

							$('#myModal1').modal('show');
							$('#myModal1').on('shown.bs.modal',function(e){ });
							$('#myModal1').on('hidden.bs.modal',function(e){
								$(".modal-content").remove(); $("#myModal1").empty();
								if(algo==1){//Abrir de nuevo detalles del paquete
									window.setTimeout(function(){
										detalles_pq(data1[1], data1[2], data1[3], data1[4], data1[5]); window.setTimeout(function(){$('#tap_hppq').click();},1000);
									},300);
								}else{
									window.setTimeout(function(){paquetes($('#hpq_id_pa').val(),$('#hpq_nombreP').val(),$('#hpq_opc').val(),$('#hpq_num_pq').val());},300);
								}
							});
						}});
					}else{
						if(algo==1){//Abrir de nuevo detalles del paquete
							window.setTimeout(function(){
								detalles_pq(data1[1], data1[2], data1[3], data1[4], data1[5]); window.setTimeout(function(){$('#tap_hppq').click();},1000);
							},300);
						}else{
							window.setTimeout(function(){paquetes($('#hpq_id_pa').val(),$('#hpq_nombreP').val(),$('#hpq_opc').val(),$('#hpq_num_pq').val());},300);
						}
					}
				});
				return;
			}else{alert(data);}
		});
	}
}

function finalizar_pq(id_pq, nombre_pq, folio_pq){
	swal({
		title: "FINALIZAR PAQUETE", type: "", text: "¿FINALIZAR "+nombre_pq+" CON FOLIO "+folio_pq+"?", showCancelButton: true, confirmButtonText: "Finalizar", cancelButtonText: "Salir", closeOnConfirm: false, showLoaderOnConfirm: true
	},
	function(){//swal.close();
		var datos={ id_pq:id_pq }
		$.post('pacientes/files-serverside/finalizarPaquete.php',datos).done(function(data){
			if(data==1){ $('#clickmeHPQ, #clickme').click();
				swal({title:"", type:"success", text:"El paquete ha sido finalizado.", timer: 1800, showConfirmButton: false }); return;
			}else{alert(data);}
		});
	});
}

function membresia(id_p, nombre_p, estatus_m, costo_m, periodo_m, fecha_i, fecha_f, fecha_i1, fecha_f1, nombre_membre, folio_mem, dias_dif, fecha_vencio){
	if(estatus_m==0){
		$("#myModal2").load('pacientes/htmls/para_afiliar.php', function( response, status, xhr ){ if(status=="success"){
			$('#titulo_modal').text('EL PACIENTE '+nombre_p+' NO ESTA AFILIADO'); tinymce.remove("#mi_formato");

			$('#membresia_comprar1').load('pacientes/genera/membresias_comprar.php',function(response,status,xhr){if(status=="success"){
				$('#membresia_comprar1').change(function(e){
					if(this.value==''){$('#btn_afiliar_p').addClass('disabled');}else{$('#btn_afiliar_p').removeClass('disabled');}
				});
			}});

			$('#membresia_integrar').load('pacientes/genera/membresias_integrar.php',function(response,status,xhr){if(status=="success"){
				$('#membresia_integrar').change(function(e){
					if(this.value==''){$('#btn_afiliar_p').addClass('disabled');}else{$('#btn_afiliar_p').removeClass('disabled');}
				});
			}});

			$('#btn_afiliar_p').click(function(){
				if($('#opcion_m').val()==1){
					if($('#membresia_comprar1').val()!=''){
						var nv = new Date(); $('#aleatorio_me').val(nv.format('Y-m-d-H-i-s-u').substring(0,22)); var aleatory = $('#aleatorio_me').val();

						var datos = {id_p:id_p, id_m:$('#membresia_comprar1').val(), id_u: $('#id_user').val(), no_aleatorio:$('#aleatorio_me').val()}
						$.post('pacientes/files-serverside/afiliarPaciente.php',datos).done(function(data){
							if(data==1){ $('#clickme').click(); $('#myModal2').modal('hide');
								swal({
									title: "AFILIACIÓN REALIZADA", type: "success", text: "El paciente ha sido afiliado. ¿Deseas imprimir el ticket de venta?", showCancelButton: true, confirmButtonText: "Imprimir", cancelButtonText: "Salir", closeOnConfirm: false
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
							}else{alert(data);}
						});
					}
				}else if($('#opcion_m').val()==2){
					if($('#membresia_integrar').val()!=''){
						var datos = {id_p:id_p, id_m:$('#membresia_integrar').val(), id_u: $('#id_user').val()}
						$.post('pacientes/files-serverside/integrarPaciente.php',datos).done(function(data){
							if(data==1){ $('#clickme').click(); $('#myModal2').modal('hide');
								swal({title: "AFILIACIÓN REALIZADA", type: "success", text: "El paciente ha sido afiliado.", timer: 1800, showConfirmButton: false }); return;
							}else if(data == 2){ $('#myModal2').modal('hide');
								swal({title:"ERROR", type:"error", text:"Esta membresía ya no tiene disponibilidad.", timer: 1800, showConfirmButton: false }); return;
							}
							else{alert(data);}
						});
					}
				}else{}
			});

			$('#myModal2').modal('show'); $('#myModal2').on('shown.bs.modal', function (e) { });
			$('#myModal2').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal2").empty(); });
		} });
	}else if(estatus_m==1){
		swal({
		  title:"DATOS DE AFILIACIÓN",showCancelButton: true, cancelButtonText: "Cerrar", showConfirmButton: false,
		  text:"LA AFILIACIÓN DEL PACIENTE "+nombre_p+" CON FOLIO "+folio_mem+" ES DESDE EL DÍA "+costo_m+" HASTA EL DÍA "+periodo_m,type:""
		});
	}else if(estatus_m==2){
		swal({
		  title: "MEMBRESÍA POR CADUCAR",
		  text: "'"+nombre_membre+"' DEL PACIENTE "+nombre_p+" VENCE EL PRÓXIMO "+fecha_vencio+". ¿DESEAS RENOVAR POR UN COSTO DE $"+costo_m+" CON VIGENCIA DEL "+fecha_i+" AL "+fecha_f+"? LOS DATOS DE LA MEMBRESÍA ANTERIOR EN CUANTO AL TITULAR Y LOS BENEFICIARIOS PERSISTIRÁN, SI DESEA CAMBIAR LOS DATOS DEBE ESPERAR A QUE LA MEMBRESÍA CADUQUE.", type: "",
		  showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Reafiliar", closeOnConfirm: false, cancelButtonText: "Cancelar"
		},
		function(){
			var nv = new Date(); $('#aleatorio_me').val(nv.format('Y-m-d-H-i-s-u').substring(0,22)); var aleatory = nv.format('Y-m-d-H-i-s-u').substring(0,22);

			var datos={id_p:id_p, costo_m:costo_m, id_u:$('#id_user').val(), fecha_i:fecha_i1, fecha_f:fecha_f1, no_aleatorio:aleatory, folio:folio_mem}
			$.post('pacientes/files-serverside/reAfiliarPaciente.php',datos).done(function(data){
				if(data==1){ $('#clickme').click();
					//swal({ title:"¡CONFIRMACIÓN!", type:"success", text:"La afiliación del paciente ha sido renovada.", timer:1800, showConfirmButton:false }); return;
					swal({
						title: "AFILIACIÓN RENOVADA", type: "success", text: "El paciente ha renovado su afiliación. ¿Deseas imprimir el ticket comprobante?", showCancelButton: true, confirmButtonText: "Imprimir", cancelButtonText: "Salir", closeOnConfirm: false
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
					//
				}else{alert(data);}
			});
		});
	}else if(estatus_m==3){
		swal({
		  title: "MEMBRESÍA VENCIDA",
		  text: nombre_membre+" CON FOLIO '"+folio_mem+"' DEL PACIENTE "+nombre_p+" EXPIRÓ DESDE "+fecha_vencio+" ("+dias_dif+" DÍAS). ¿DESEA ADQUIRIR ALGUNA MEMBRESÍA?", type: "", showCancelButton: true, confirmButtonColor:"#DD6B55", confirmButtonText: "Aceptar", closeOnConfirm: false, cancelButtonText: "Cancelar"
		},
		function(){ swal.close(); membresia(id_p,nombre_p,0,costo_m,periodo_m,fecha_i,fecha_f,fecha_i1,fecha_f1,nombre_membre,folio_mem,dias_dif,fecha_vencio); });
	}
}

$(document).ready(function(e) {
	//breadcrumb
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li>RECEPCIÓN</li><li class="active"><strong>PACIENTES</strong></li>');

	$('body').popover({selector: '[data-toggle="popover"]', 'trigger': 'hover', 'placement': 'left'});

	$(document).on('focus', ':not(.popover)', function(){ $('.popover').popover('hide'); }); //$('[data-toggle="popover"]').popover({ });

	$('#my_search').removeClass('hidden');

	var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-$('#breadc').height()-155;
	var oTableP = $('#dataTablePrincipal').DataTable({
		serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true,
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: false, responsive: true,
		"aoColumns": [
			{"bVisible":true}, {"bVisible":false },{ "bVisible": true }, { "bVisible": true }, { "bVisible": false },
			{"bVisible":true}, {"bVisible":true },{ "bVisible": true }, { "bVisible": true }, { "bVisible": false },
			{"bVisible":false}, {"bVisible":false },{ "bVisible": false }, { "bVisible": false }, {"bVisible": false}, {"bVisible": false}
		],
		"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"iS><"proc"p>',
		deferRender: true, select: false, "processing": false, "sAjaxSource": "datatable-serverside/pacientes.php",
		"fnServerParams": function (aoData, fnCallback) {
			var de = $('#top-search').val(), cv = $('#convenioP1').val();
			aoData.push( {"name": "nombre", "value": de } );
			aoData.push( {"name": "convenio", "value": cv } );
		},
		"oLanguage": {
			"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
			"sInfo": "PACIENTES FILTRADOS: _END_", "sInfoEmpty": "NINGÚN PACIENTE FILTRADO.", "sInfoFiltered": " TOTAL DE PACIENTES: _MAX_", "sSearch": "",
			"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
		},"iDisplayLength": 50, paging: true,
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

function nuevo_paciente(){ //Para poder crear un usuario nuevo, el usuario actual debe tener por lo menos una empresa asignada
	$("#myModal").load('pacientes/htmls/ficha_paciente.php', function( response, status, xhr ){ if(status=="success"){
		$.fn.datepicker.defaults.autoclose = true; $('#id_usr_reg').val($('#id_user').val()); $('#alerta_new_user').hide();
		$('#id_sucu').val(<?PHP echo $id_sucursal_u; ?>);
		$('#fecha_nacimiento_p1').on('changeDate', function(e) { $('#edad_p').text(calcular_edad(e.format())); });

		$("#ocupacion_us").load('pacientes/genera/ocupaciones.php',function(response,status,xhr){ if(status=="success"){
			window.setTimeout(function(){ $('#ocupacion_us').chosen(); window.setTimeout(function(){$('#ocupacion_us_chosen').width(100+'%'); },100); },500);
		} });

		$("#pais_p").load('genera/paises.php',function(response,status,xhr){if(status=="success"){ $(this).val(146);
			$(this).change(function(e) {
                if($(this).val()!=146){ $('#edo_nacimiento').val(28329); $('.de_mex').addClass('hidden'); }
				else{ $('#edo_nacimiento').val(''); $('.de_mex').removeClass('hidden');}
				$('#form-ficha_us').validator('update');
            });
		}});

		$('#edo_nacimiento').load('pacientes/files-serverside/genera_estados.php',function(response,status,xhr){
			// aquí voy a meter lo de las funciones de calcular RFC y CURP
			$('#edo_nacimiento').change(function(e) {
				var nombreXX=$('#nombre_p').val(),apaternoXX=$('#apaterno_p').val(),splitNombres=$('#nombre_p').val().split(" ");
				if (splitNombres[0] == 'JOSE' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'MARIA' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'MA.' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'MA' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'DE' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'LA' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'LAS' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'MC' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'VON' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'DEL' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'LOS' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'Y' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'MAC' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
				if (splitNombres[0] == 'VAN' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }

				var asa = $('#apaterno_p').val();

				if($('#apaterno_p').val()[0]=='Ñ'){ asa = asa.replace("Ñ", "X");}
				$('#curp_p').val((fnCalculaCURP(nombreXX,asa,$('#amaterno_p').val(),$('#fecha_nacimiento_p').val(),$('#sexo_us').val(),$('#edo_nacimiento').find(':selected').text()))); $('#rfc_p').val($('#curp_p').val().substr(0,10));
			});
			$('#nombre_p, #apaterno_p, #amaterno_p').keyup(function(e) {
				if($('#nombre_p').val()!='' & $('#apaterno_p').val()!='' & $('#fecha_nacimiento_p').val()!='' & $('#sexo_us').val()!=''){ $("#edo_nacimiento").load('pacientes/files-serverside/genera_estadosEN.php', function( response, status, xhr ) { if ( status == "success" ) { } });
				}else{
					$("#edo_nacimiento").load('pacientes/files-serverside/genera_nada.php', function( response, status, xhr ) {});
					$('#curp_p, #rfc_p').val('');
				}
			});
			$('#fecha_nacimiento_p, #sexo_us').change(function(e) {
				if($('#fecha_nacimiento_p').val()!='' & $('#sexo_us').val()!='' & $('#nombre_p').val()!='' & $('#apaterno_p').val()!=''){
					$("#edo_nacimiento").load('pacientes/files-serverside/genera_estadosEN.php',function(response,status,xhr){ if(status == "success"){ } });
				}else{
					$("#edo_nacimiento").load('pacientes/files-serverside/genera_nada.php', function( response, status, xhr ) {});
					$('#curp_p, #rfc_p').val('');
				}
			}); //Fin funciones calcular rfc y crup
		});

		$('#sangre_p').load('pacientes/files-serverside/genera_tsangre.php',function(response,status,xhr){});

		$("#estado_dir_p").load('pacientes/files-serverside/genera_estados.php',function(response,status,xhr){if(status=="success"){
			$("#estado_dir_p").change(function(event){
				$('#municipio_p').val(''); var id = $("#estado_dir_p").find(':selected').text();
				$("#municipio_p").load('pacientes/files-serverside/genera_municipios.php?id='+escape(id),function(response,status,xhr){if(status=="success"){}});
			});
		}});

		$('#estado_dir_p').change(function(e) {
			var address = $('#estado_dir_p').find(':selected').text()+' MÉXICO'; ubicacion(address); $('.mi_dir, #cp_us').val('');
        });

		$('.mi_dir').keyup(function(e){
			var address = $('#estado_dir_p').find(':selected').text()+' '+document.getElementById('ciudad_us').value+' '+document.getElementById('colonia_us').value+' '+document.getElementById('calle_us').value; ubicacion(address);
		});

		$("#estado_df").load('pacientes/files-serverside/genera_estados.php',function(response,status,xhr){if(status=="success"){
			$("#estado_df").change(function(event){
				$('#municipio_df').val(''); var id = $("#estado_df").find(':selected').text();
				$("#municipio_df").load('pacientes/files-serverside/genera_municipios.php?id='+escape(id),function(response,status,xhr){if(status=="success"){}});
			});
		}});

		$('#estado_df').change(function(e) { $('#municipio_df').val(''); });

		$('#form-ficha_us').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()) { // handle the invalid form...
			$("#alerta_new_user").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_new_user").slideUp(600); });
		  } else { // everything looks good!
			e.preventDefault();
			var $btn = $('#btn_new_u').button('loading'); $('#btn_cancel_new_u').hide();
			var datosP = $('#myModal #form-ficha_us').serialize();
			$.post('pacientes/files-serverside/addPaciente.php',datosP).done(function( data ) { var data2 = data.split(';-:');
				if (data2[0]==1){//si el paciente se Actualizó
					$('#clickme').click(); $btn.button('reset'); $('#btn_cancel_new_u').show(); $('#myModal').modal('hide');
					swal({
					  title: "¡CONFIRMACIÓN!", text: "El paciente se ha creado satisfactoriamente.", type: "success", showCancelButton: true,
					  confirmButtonColor: "#DD6B55", confirmButtonText: "Orden de venta", cancelButtonText: "Cerrar", closeOnConfirm: false
					}, function(){ swal.close(); nuevaVisita(data2[1], data2[2]); }); return;
				} else{alert(data);}
			});
		  }
		});

		$('#myModal').modal('show');
		$('#myModal').on('shown.bs.modal', function (e) {
			var i=0; $('#t_tDireccion').click(function(e) { if(i%2==0){i++; ubicacion('tren escenico cuautla morelos'); } });
			$('#form-ficha_us').validator(); $('#form-ficha_us input').keyup(function(e) { $('#alerta_new_user').hide(); });
		});
		$('#myModal').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal").empty(); });
	} });
}

function verPaciente(idP){
	$("#myModal").load('pacientes/htmls/ficha_paciente.php', function( response, status, xhr ){ if(status=="success"){
		$.fn.datepicker.defaults.autoclose = true;
		$('#id_usr_reg').val($('#id_user').val()); $('#alerta_new_user').hide(); $('#id_sucu').val(<?PHP echo $id_sucursal_u; ?>);
		$('#id_paciente_v').val(idP); var nowY = new Date().getTime(), dY = new Date();

		 var datos ={idP:idP, tempN:dY.format('Y-m-d-H-i-s-u').substring(0,22)}
		 $.post('pacientes/files-serverside/fichaPaciente.php',datos).done(function(data1){ //alert(data1);
			var datosI = data1.split('*}');

			$('#lat_us').text(redondear(datosI[56],4)); $('#lati_ud').val(datosI[56]);
			$('#lon_us').text(redondear(datosI[57],4)); $('#long_ud').val(datosI[57]);
			var i=0; $('#t_tDireccion').click(function(e) { if(i%2==0){ i++; siempre(datosI[56],datosI[57]); } });

			$('#titulo_modal').text('FICHA DEL PACIENTE'+datosI[1]+' '+datosI[2]+' '+datosI[3]+'. REGISTRADO POR '+datosI[40]+' '+datosI[41]);

			var fechaN1 = datosI[20].split('/'); var fxD = fechaN1[0], fxM = fechaN1[1], fxY = fechaN1[2];
			if(fxD.length == 1){fxD = '0'+fxD;} if(fxM.length == 1){fxM = '0'+fxM;}
			$("#fecha_nacimiento_p").val(fxD+'/'+fxM+'/'+fxY);
			$('#nombre_p').val(datosI[1]);$('#apaterno_p').val(datosI[2]);$('#amaterno_p').val(datosI[3]);
			$("#sexo_us").val(datosI[19]);$('#edad_p').text(calcular_edad(datosI[20]));
			$('#rfc_p').val(datosI[14]); $('#tel_personal_p').val(datosI[10]);$('#tel_particular_p').val(datosI[11]);
			$('#tel_trabajo_p').val(datosI[12]);$('#tel_trabajo_ext_p').val(datosI[13]);
			$('#id_sucu').val(datosI[17]); $('#curp_p').val(datosI[0]); $('#rfc_fp').val(datosI[51]);
			$('#email_p').val(datosI[18]); $('#contacto_emergencia_p').val(datosI[15]); $('#tel_emergencia_p').val(datosI[16]);
			$('#email_pf').val(datosI[61]); $('#ciudad_df').val(datosI[62]); $('#colonia_df').val(datosI[49]);
			$('#calle_df').val(datosI[44]); $('#cp_df').val(datosI[45]);

			$("#ocupacion_us").load('pacientes/genera/ocupaciones.php',function(response,status,xhr){ if(status=="success"){
				window.setTimeout(function(){ $('#ocupacion_us').chosen(); window.setTimeout(function(){$('#ocupacion_us_chosen').width(100+'%'); },100); },500);
				$('#ocupacion_us').val(datosI[63]); $("#ocupacion_us").trigger("chosen:updated");
			} });

			$('#fecha_nacimiento_p1').on('changeDate', function(e) { $('#edad_p').text(calcular_edad(e.format())); });

			$("#pais_p").load('genera/paises.php',function(response,status,xhr){if(status=="success"){
				$(this).val(datosI[24]);
				$(this).change(function(e) {
					if($(this).val()!=146){ $('.de_mex').addClass('hidden'); }else{ $('.de_mex').removeClass('hidden');}
					$('#form-ficha_us').validator('update');
				});
			}});

			$('#edo_nacimiento').load('pacientes/files-serverside/genera_estados.php',function(response,status,xhr){if(status=="success"){
				if(datosI[24]!=146){ $('#edo_nacimiento').val(28329); $('.de_mex').addClass('hidden'); }else{$('#edo_nacimiento').val(datosI[42]);}

				// aquí voy a meter lo de las funciones de calcular RFC y CURP
				$('#edo_nacimiento').change(function(e) {
					var nombreXX=$('#nombre_p').val(),apaternoXX=$('#apaterno_p').val(),splitNombres=$('#nombre_p').val().split(" ");
					if (splitNombres[0] == 'JOSE' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'MARIA' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'MA.' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'MA' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'DE' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'LA' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'LAS' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'MC' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'VON' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'DEL' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'LOS' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'Y' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'MAC' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }
					if (splitNombres[0] == 'VAN' && splitNombres[1] != undefined) { nombreXX = splitNombres[1]; } else {  }

					var asa = $('#apaterno_p').val();

					if($('#apaterno_p').val()[0]=='Ñ'){ asa = asa.replace("Ñ", "X");}
					$('#curp_p').val((fnCalculaCURP(nombreXX,asa,$('#amaterno_p').val(),$('#fecha_nacimiento_p').val(),$('#sexo_us').val(),$('#edo_nacimiento').find(':selected').text()))); $('#rfc_p').val($('#curp_p').val().substr(0,10));
				});
				$('#nombre_p, #apaterno_p, #amaterno_p').keyup(function(e) {
					if($('#nombre_p').val()!='' & $('#apaterno_p').val()!='' & $('#fecha_nacimiento_p').val()!='' & $('#sexo_us').val()!=''){ $("#edo_nacimiento").load('pacientes/files-serverside/genera_estadosEN.php', function( response, status, xhr ) { if ( status == "success" ) { } });
					}else{
						$("#edo_nacimiento").load('pacientes/files-serverside/genera_nada.php', function( response, status, xhr ) {});
						$('#curp_p, #rfc_p').val('');
					}
				});
				$('#fecha_nacimiento_p, #sexo_us').change(function(e) {
					if($('#fecha_nacimiento_p').val()!='' & $('#sexo_us').val()!='' & $('#nombre_p').val()!='' & $('#apaterno_p').val()!=''){
						$("#edo_nacimiento").load('pacientes/files-serverside/genera_estadosEN.php',function(response,status,xhr){ if(status == "success"){ } });
					}else{
						$("#edo_nacimiento").load('pacientes/files-serverside/genera_nada.php', function( response, status, xhr ) {});
						$('#curp_p, #rfc_p').val('');
					}
				}); //Fin funciones calcular rfc y crup
			}});
			$('#sangre_p').load('pacientes/files-serverside/genera_tsangre.php',function(response,status,xhr){ $(this).val(datosI[6]); });
			$("#estado_dir_p").load('pacientes/files-serverside/genera_estados.php',function(response,status,xhr){if(status=="success"){
				$(this).val(datosI[28]);
				$("#estado_dir_p").change(function(event){
					$('#municipio_p').val(''); var id = $("#estado_dir_p").find(':selected').text();
					$("#municipio_p").load('pacientes/files-serverside/genera_municipios.php?id='+escape(id),function(response,status,xhr){if(status=="success"){}});
				});
				if(datosI[28]!=''){
					var id = $("#estado_dir_p").find(':selected').text();
					$("#municipio_p").load('pacientes/files-serverside/genera_municipios.php?id='+escape(id),function(response,status,xhr){if(status=="success"){
						$(this).val(datosI[29]);
					}});
				}
			}});

			$('#estado_dir_p').change(function(e) {
				var address = $('#estado_dir_p').find(':selected').text()+' MÉXICO'; ubicacion(address); $('.mi_dir, #cp_us').val('');
			});
			$('.mi_dir').keyup(function(e){
				var address = $('#estado_dir_p').find(':selected').text()+' '+document.getElementById('ciudad_us').value+' '+document.getElementById('colonia_us').value+' '+document.getElementById('calle_us').value; ubicacion(address);
			});
			$("#estado_df").load('pacientes/files-serverside/genera_estados.php',function(response,status,xhr){if(status=="success"){
				$(this).val(datosI[47]);
				$("#estado_df").change(function(event){
					$('#municipio_df').val(''); var id = $("#estado_df").find(':selected').text();
					$("#municipio_df").load('pacientes/files-serverside/genera_municipios.php?id='+escape(id),function(response,status,xhr){if(status=="success"){}});
				});
				if(datosI[47]!=''){
					var id = $("#estado_df").find(':selected').text();
					$("#municipio_df").load('pacientes/files-serverside/genera_municipios.php?id='+escape(id),function(response,status,xhr){if(status=="success"){
						$(this).val(datosI[48]);
					}});
				}
			}});
			$('#estado_df').change(function(e) { $('#municipio_df').val(''); }); $('#razon_social').val(datosI[43]);

			$('#ciudad_us').val(datosI[60]);$('#colonia_us').val(datosI[30]);$('#calle_us').val(datosI[25]);
			$('#cp_us').val(datosI[31]);
		});

		$('#form-ficha_us').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()) { // handle the invalid form...
			$("#alerta_new_user").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_new_user").slideUp(600); });
		  } else { // everything looks good!
			e.preventDefault();
			var $btn = $('#btn_new_u').button('loading'); $('#btn_cancel_new_u').hide();
			var datosP = $('#myModal #form-ficha_us').serialize();
			$.post('pacientes/files-serverside/updatePaciente.php',datosP).done(function( data ) {
				if (data==1){//si el paciente se Actualizó
					$('#clickme').click(); $btn.button('reset'); $('#btn_cancel_new_u').show(); $('#myModal').modal('hide');
					swal({ title: "", type: "success", text: "Los datos del paciente se han actualizado.", timer: 2000, showConfirmButton: false }); return;
				} else{alert(data);}
			});
		  }
		});

		$('#myModal').modal('show');
		$('#myModal').on('shown.bs.modal', function(e){
			$('#form-ficha_us').validator(); $('#form-ficha_us input').keyup(function(e) { $('#alerta_new_user').hide(); });
		});
		$('#myModal').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal").empty(); });
	} });
}
function siempre(la,lo){
	  var map = new google.maps.Map(document.getElementById('map'), {
		center: new google.maps.LatLng(la, lo), zoom: 16, scrollwheel: false //Cuautla :3
	  });
	  marker = new google.maps.Marker({
		map: map, draggable: true, animation: google.maps.Animation.DROP, position: new google.maps.LatLng(la, lo)
	  });
	  $('#lat_us').text(redondear(la,4)); $('#lati_ud').val(la); $('#lon_us').text(redondear(lo,4)); $('#long_ud').val(lo);
	  marker.addListener('dragend', function(){
		  map.panTo(marker.getPosition()); var markerLatLng = marker.getPosition();
		  $('#lat_us').text(redondear(markerLatLng.lat(),4)); $('#lati_ud').val(markerLatLng.lat());
		  $('#lon_us').text(redondear(markerLatLng.lng(),4)); $('#long_ud').val(markerLatLng.lng());
	  });
	  google.maps.event.addListener(marker, 'click', function(){ }); var geocoder = new google.maps.Geocoder();
}
function agregar_me(nombre,apaterno,amaterno,sexo,opc){
	var datos = {nombre:nombre, apaterno:apaterno, amaterno:amaterno, sexo:sexo, id_u:$('#id_user').val()}
	$.post('pacientes/files-serverside/add_medico_e.php',datos).done(function(data){
		if(data==1){
			if(opc == 1){
				$('#medico_i').load('pacientes/genera/medicos_estudios.php',function(response,status,xhr){if(status=="success"){
					$("#medico_i").trigger("chosen:updated");
				}}); $('#cancelMedico_ext').click();
			}
			else{
				$('#medico_l').load('pacientes/genera/medicos_estudios.php',function(response,status,xhr){if(status=="success"){
					$("#medico_l").trigger("chosen:updated");
				}}); $('#cancelMedico_ext1').click();
			}
			swal({title:"MÉDICO AGREGADO",type:"success",text:"El médico se dió de alta correctamente.",timer:1800,showConfirmButton:false});
		}
		else{alert(data);}
	});
}

function ver_ov(id_p, name_p, ref, temp){
	$('#myModal2').modal('hide'); //alert(ref);
	window.setTimeout(function(){
		$("#myModal4").load('pacientes/htmls/ficha_ov.php', function( response, status, xhr ){ if(status=="success"){

			$('#altaMedico_e').click(function(e) { $('#new_med_ext').removeClass('hidden'); });
			$('#cancelMedico_ext').click(function(e){ $('.campos_m_e').val(''); $('#new_med_ext').addClass('hidden'); });
			$('#addMedico_ext').click(function(e) {
				if($('#nombre_m_e').val()!='' & $('#apaterno_m_e').val()!='' & $('#sexo_m_e').val()!=''){
					agregar_me($('#nombre_m_e').val(),$('#apaterno_m_e').val(),$('#amaterno_m_e').val(),$('#sexo_m_e').val(),1);
				}else{$("#alerta_me").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_me").slideUp(600); });}
			});

			$('#altaMedico_e1').click(function(e) { $('#new_med_ext1').removeClass('hidden'); });
			$('#cancelMedico_ext1').click(function(e){ $('.campos_m_e').val(''); $('#new_med_ext1').addClass('hidden'); });
			$('#addMedico_ext1').click(function(e) {
				if($('#nombre_m_e1').val()!='' & $('#apaterno_m_e1').val()!='' & $('#sexo_m_e1').val()!=''){
					agregar_me($('#nombre_m_e1').val(),$('#apaterno_m_e1').val(),$('#amaterno_m_e1').val(),$('#sexo_m_e1').val(),2);
				}else{$("#alerta_me1").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_me1").slideUp(600); });}
			});

			$.fn.datepicker.defaults.autoclose = true; var nv = new Date(); var k = 0; $('#alerta1, #alerta_me, #alerta_me1').hide();
			$('#aleatorio_ov, #aleatorio_ov_a').val(temp); $('#id_paciente_ov').val(id_p); $('#titulo_modal').text('NUEVA VISITA - '+name_p);

			$('#medico_c').load('pacientes/genera/medicos_consulta.php',function(response,status,xhr){if(status=="success"){
				window.setTimeout(function(){$('#medico_c').chosen();},500);
				$('#medico_c').change(function(e) {
					$('#beneficio_c, #mi_id_convenio').val(0); $('.depende_consulta').addClass('hidden');
					if($(this).val()!=''){ $('.depende_medico_c').removeClass('hidden'); }
					else{ $('.depende_medico_c, .depende_consulta').addClass('hidden'); }
					$('#clickmeCo').click(); reset_totales_consulta(); calcular_totales();
				});
			}});

			var dato = {ref:ref}
			$.post('pacientes/files-serverside/datos_orden_venta.php',dato).done(function(data){
				var datos = data.split(';-{');
				$('#sucursal_fi_p, #id_sucu').val(datos[13]); $('#id_usr_reg').val($('#id_user').val());

				$("#beneficio_c, #beneficio_i, #beneficio_l, #beneficio_s, #beneficio_p").load("pacientes/genera/beneficiosP.php?idP="+id_p, function(response,status,xhr){ });

				if(datos[0]){//Si hay consulta
					$('#medico_c').val(datos[0]), $('#mi_id_convenio').val(datos[4]);
					window.setTimeout(function(){
						$('#medico_c').val(datos[0]); $('#medico_c').change(); $('#beneficio_c').val(datos[4]);
						$('.depende_consulta').removeClass('hidden'); $('#motivo_c').val(datos[5]); $('#po_descuento_c').val(datos[6]);
						$('#da_descuento_c').val(datos[7]); $('#cargo_extra_c').val(datos[8]); $('#motivo_descuento_c').val(datos[9]);
						if(datos[6]>0 || datos[7]>0 || datos[8]>0){$('.depende_descuento_c').removeClass('hidden');}
						$('#precio_c').val(datos[10]); $('#to_descuento_c').val(datos[11]); $('#total_c').val(datos[12]);
						calcular_totales();
						$('#medico_c').change(function(e) { $('.depende_descuento_c').addClass('hidden'); });
					},200);

					//$('#clickmeCo').click();
				}else{//alert('No hay consulta');
					$('#medico_c').val(0), $('#mi_id_convenio').val(0);
				}

				var oTableCo = $('#dataTableCo').DataTable({
					serverSide: true,"sScrollY": 120, ordering: false, searching: false, scrollCollapse: false,
					"scrollX":true, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:true,
					"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
					"sDom": '<""f>r<""t><""S><"">',
					deferRender: true, select: { style: 'single' }, "processing": false, "sAjaxSource": "pacientes/js/datatable-serverside/buscar_consulta.php",
					"fnServerParams": function (aoData, fnCallback) {
						var de = $('#medico_c').val(), idConvenio = $('#mi_id_convenio').val();
						//if(idConvenio==null){idConvenio=0;}
						aoData.push( {"name": "idMedico", "value": de } ); aoData.push( {"name": "idConvenio", "value": idConvenio } );
						aoData.push( {"name": "idP", "value": id_p } );
					},
					"oLanguage": {
						"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
						"sInfo": "CONSULTAS FILTRADAS: _END_",
						"sInfoEmpty": "NINGUNA CONSULTA FILTRADA.", "sInfoFiltered": " TOTAL DE CONSULTAS: _MAX_", "sSearch": "",
						"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
					},"iDisplayLength": 5000, paging: false,
				});

				$('#clickmeCo').click(function(e){ oTableCo.draw(); reset_totales_consulta(); calcular_totales(); });

				$("#beneficio_c").change(function(e){ $('#clickmeCo').click(); $('#mi_id_convenio').val($(this).val())});

			});

			$('#myModal4').modal('show');
			$('#myModal4').on('shown.bs.modal', function (e) {
				$('#form-2').validator(); $('#form-2 input').keyup(function(e) { $('#alerta1').hide(); });
			});
			$('#myModal4').on('hidden.bs.modal', function (e) {
				if(ref){ window.setTimeout(function(){historialPaciente($('#mi_histo').val());},300); }else{ }
				$(".modal-content").remove(); $("#myModal4").empty();
			});
		} });
	},300);
}

function nuevaVisita(idP, nombreP){
	$("#myModal4").load('pacientes/htmls/ficha_ov.php', function( response, status, xhr ){ if(status=="success"){
		window.setTimeout(function(){ $('#tab_resumen').click(); window.setTimeout(function(){$('#tab_imgen').click();},200); },200);
		$('#altaMedico_e').click(function(e) { $('#new_med_ext').removeClass('hidden'); });
		$('#cancelMedico_ext').click(function(e){ $('.campos_m_e').val(''); $('#new_med_ext').addClass('hidden'); });
		$('#addMedico_ext').click(function(e) {
			if($('#nombre_m_e').val()!='' & $('#apaterno_m_e').val()!='' & $('#sexo_m_e').val()!=''){
				agregar_me($('#nombre_m_e').val(),$('#apaterno_m_e').val(),$('#amaterno_m_e').val(),$('#sexo_m_e').val(),1);
			}else{$("#alerta_me").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_me").slideUp(600); });}
    });

		$('#altaMedico_e1').click(function(e) { $('#new_med_ext1').removeClass('hidden'); });
		$('#cancelMedico_ext1').click(function(e){ $('.campos_m_e').val(''); $('#new_med_ext1').addClass('hidden'); });
		$('#addMedico_ext1').click(function(e) {
			if($('#nombre_m_e1').val()!='' & $('#apaterno_m_e1').val()!='' & $('#sexo_m_e1').val()!=''){
				agregar_me($('#nombre_m_e1').val(),$('#apaterno_m_e1').val(),$('#amaterno_m_e1').val(),$('#sexo_m_e1').val(),2);
			}else{$("#alerta_me1").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_me1").slideUp(600); });}
    });

		$.fn.datepicker.defaults.autoclose = true; var nv = new Date(); var k = 0;

		$('#aleatorio_ov, #aleatorio_ov_a').val(nv.format('Y-m-d-H-i-s-u').substring(0,22));
		var aleatory = nv.format('Y-m-d-H-i-s-u').substring(0,22);

		$('#id_paciente_ov').val(idP); $('#mi_tab_servicios').click(function(){$('#clickmeSe, #clickmeSmS').click();});

		$('#titulo_modal').text('NUEVA VISITA - '+nombreP);
		$('#id_usr_reg').val($('#id_user').val()); $('#alerta1, #alerta_me, #alerta_me1').hide(); $('#id_sucu').val(<?PHP echo $id_sucursal_u; ?>);

		$("#beneficio_c,#beneficio_i,#beneficio_l,#beneficio_s,#beneficio_p,#beneficio_c1").load("pacientes/genera/beneficiosP.php?idP="+idP, function(response,status,xhr){});

		var oTableCo = $('#dataTableCo').DataTable({
			serverSide: true,"sScrollY": 120, ordering: false, searching: false, scrollCollapse: false,
			"scrollX":true, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:true,
			"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
			"sDom": '<""f>r<""t><""S><"">',
			deferRender: true, select: { style: 'single' }, "processing": false, "sAjaxSource": "pacientes/js/datatable-serverside/buscar_consulta.php",
			"fnServerParams": function (aoData, fnCallback) {
				var de = $('#medico_c').val(), idConvenio = $('#mi_id_convenio').val(); //if(idConvenio==null){idConvenio=0;}
				aoData.push({"name": "idMedico", "value": de }); aoData.push({"name": "idConvenio", "value": idConvenio }); aoData.push({"name": "idP", "value": idP });
			},
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
				"sInfo": "CONSULTAS FILTRADAS: _END_", "sInfoEmpty": "NINGUNA CONSULTA FILTRADA.", "sInfoFiltered": " TOTAL DE CONSULTAS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 5000, paging: false
		});

		$('#clickmeCo').click(function(e){ oTableCo.draw(); reset_totales_consulta(); calcular_totales(); });

		$("#beneficio_c").change(function(e){ $('#clickmeCo').click(); $('#mi_id_convenio').val($(this).val())});

		$('#btn_liquidar_ov').click(function(e){
			$('#pago_ov_c').val(parseFloat($('#total_c1').val())+parseFloat($('#total_s').val())); $('#pago_ov_i').val($('#total_i').val());
			$('#pago_ov_l').val($('#total_l').val()); $('#pago_ov_f').val($('#total_p').val()); $('#form-2').validator('update');
		});

		$('#medico_c').load('pacientes/genera/medicos_consulta.php',function(response,status,xhr){if(status=="success"){
			window.setTimeout(function(){$('#medico_c').chosen();},500);
			$('#medico_c').change(function(e) {
				$('#beneficio_c, #mi_id_convenio').val(0); $('.depende_consulta').addClass('hidden');
				if($(this).val()!=''){ $('.depende_medico_c').removeClass('hidden'); }else{ $('.depende_medico_c, .depende_consulta').addClass('hidden'); }
				$('#clickmeCo').click(); reset_totales_consulta(); calcular_totales();
            });
		}});

		var dato = {id_p:idP}
		$.post('pacientes/files-serverside/datos_paciente_orden_venta.php',dato).done(function(data){
			var mis_datos = data.split(';-{');

			$('#sucursal_fi_p').val(<?PHP echo $id_sucursal_u; ?>);

			$('#procedencia_fi_p').load('pacientes/genera/procedencia.php',function(response,status,xhr){if(status=="success"){ $(this).val(1); }});
		});

		oTableCo.on( 'select', function ( e, dt, type, indexes ) {
			$('.depende_consulta').removeClass('hidden');
			var rowData = oTableCo.rows( indexes ).data().toArray(); //alert(rowData[0][6]);
			totales_consulta(rowData[0][3], $('#po_descuento_c').val(),$('#da_descuento_c').val(),$('#cargo_extra_c').val());
			calcular_totales(); $('#id_consulta_to').val(rowData[0][6]); //alert(rowData[0][12]);
			subir_concepto(1, rowData[0][6], $('#beneficio_c').val(), idP, $('#aleatorio_ov').val(), $('#id_user').val(), $('#medico_c').val(),rowData[0][3]);
		} )
		.on( 'deselect', function ( e, dt, type, indexes ){
			$('.depende_consulta').addClass('hidden'); reset_totales_consulta(); calcular_totales();
		} );

		$('.desc_cargo').change(function(e){ nota_desc_cargo(); }); $('.desc_cargo').keyup(function(e) { nota_desc_cargo(); });

		$('#beneficio_c').change(function(e){ reset_totales_consulta(); $('#clickmeCo').click(); calcular_totales(); });

		$('#cb_facturada_ov').click(function(e) {
            if(k%2==0){ $('#hay_iva_ov').val(1); /*$('#iva_ov_h').val(redondear(parseFloat($('#total_ov_h').val())*0.16,2));*/ calcular_totales();
			}else{ $('#hay_iva_ov').val(0); /*$('#iva_ov_h').val(0);*/ calcular_totales(); } k++;
    });

		$('#form-2').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()) { // handle the invalid form...
			$("#alerta1").fadeTo(2000,500).slideUp(500,function(){ $("#alerta1").slideUp(600); });
		  } else { // everything looks good!
			e.preventDefault();
			var $btn = $('#btn_save1').button('loading'); $('#btn_cancel1').hide();
			var datosP = $('#myModal4 #form-2').serialize();
			$.post('pacientes/files-serverside/guardar_ov.php',datosP).done(function( data ) { var datil = data.split(';]');
				if (datil[0]==1){//si el paciente se Actualizó
					$('#clickme').click(); $btn.button('reset'); $('#btn_cancel1').show(); $('#myModal4').modal('hide');
					swal({
					  title: "ORDEN REALIZADA", text: "¿Deseas imprimir el ticket de venta "+datil[1]+"?", type: "success", showCancelButton: true,
					  confirmButtonText: "Imprimir", cancelButtonText: "Salir", closeOnConfirm: false
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
				} else{alert(datil[0]);}
			});
		  }
		});

		$('#medico_i').load('pacientes/genera/medicos_estudios.php',function(response,status,xhr){if(status=="success"){
			window.setTimeout(function(){
				$('#medico_i').chosen(); window.setTimeout(function(){$('#medico_i_chosen').width(100+'%'); },100);
			},500);
			$('#medico_i').change(function(e) {
				if($(this).val()!=''){ $('.depende_medico_i').removeClass('hidden'); }
				else{ $('.depende_medico_i, .depende_img').addClass('hidden'); }
				$('#clickmeIm').click(); $('#clickmeEiS').click();
            });
		}});
		$('#medico_l').load('pacientes/genera/medicos_estudios.php',function(response,status,xhr){if(status=="success"){
			window.setTimeout(function(){
				$('#medico_l').chosen(); window.setTimeout(function(){$('#medico_l_chosen').width(100+'%'); },100);
			},500);
			$('#medico_l').change(function(e) {
				if($(this).val()!=''){ $('.depende_medico_l').removeClass('hidden'); }
				else{ $('.depende_medico_l, .depende_lab').addClass('hidden'); }
				$('#clickmeLa').click(); $('#clickmeElS').click();
            });
		}});

		$('.depende_medico_s').removeClass('hidden'); $('#div_buscar_medico_s').hide();

		$("#beneficio_i").change(function(e){ $('#mi_id_convenioI').val($(this).val())});
		$("#beneficio_l").change(function(e){ $('#mi_id_convenioL').val($(this).val())});
		$("#beneficio_s").change(function(e){ $('#mi_id_convenioS').val($(this).val())});
		$("#beneficio_p").change(function(e){ $('#mi_id_convenioP').val($(this).val())});
		$('#beneficio_c1').change(function(e){ reset_totales_consulta1(); $('#clickmeCo1').click(); calcular_totales(); });

		var oTableEim = $('#dataTableBestudiosI').DataTable({
			serverSide: true,"sScrollY": 100, ordering: false, searching: true, scrollCollapse: false,
			"scrollX":true, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:true,
			"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
			"sDom": '<"">r<""t><""S><"">',
			deferRender: true, select: { style: 'single' }, "processing": false, "sAjaxSource": "pacientes/js/datatable-serverside/buscar_estudios_imagen.php",
			"fnServerParams": function (aoData, fnCallback) {
				var idPaci = $('#id_paciente_ov').val(), idConvenio = $('#mi_id_convenioI').val();//if(idConvenio==null){idConvenio=0;}
				var aleatorio = $('#aleatorio_ov').val(), idSucursal = $('#sucursal_fi_p').val();
				aoData.push({"name": "idSucursal", "value": idSucursal} ); aoData.push({"name": "idConvenio", "value": idConvenio } );
				aoData.push({"name": "aleatorio", "value": aleatorio } ); aoData.push({"name": "idP", "value": idPaci } );
			},
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
				"sInfo": "ESTUDIOS FILTRADOS: _END_",
				"sInfoEmpty": "NINGUN ESTUDIO FILTRADO.", "sInfoFiltered": " TOTAL DE ESTUDIOS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 5000, paging: false,
		});
		$('#clickmeIm').click(function(e){ oTableEim.draw(); });
		//para los fintros individuales por campo de texto
		oTableEim.columns().every( function () {
			var that = this;

			$( 'input', this.footer() ).on( 'keyup change', function () { if ( that.search() !== this.value ) { that .search( this.value ) .draw(); } } );
		} );
		//fin filtros individuales por campo de texto
		oTableEim.on( 'select', function ( e, dt, type, indexes ) {
			$('.depende_img').removeClass('hidden');
			var rowData = oTableEim.rows( indexes ).data().toArray(); //alert(rowData[0][6]); //alert(rowData[0][9]);
			if(rowData[0][8]==undefined){var coveni = 0, ocu = 0;}else{var coveni = rowData[0][8], ocu = rowData[0][9];}
			subirEstudio(rowData[0][7], $('#aleatorio_ov').val(), idP, $('#id_usr_reg').val(), $('#medico_i').val(),
				$('#mi_id_convenioI').val(),$('#sucursal_fi_p').val(),$('#observacionesI_NV').val(), 2, rowData[0][2], 4, coveni, ocu
			);
			$('.desc_cargo_i').change(function(e){nota_desc_cargo_i();}); $('.desc_cargo_i').keyup(function(e){nota_desc_cargo_i();});
		} );

		var oTableEimS = $('#dataTableEiS').DataTable({
			serverSide: true,"sScrollY": 120, ordering: false, searching: true, scrollCollapse: false,
			"scrollX":true, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:true,
			"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
			"sDom": '<"">r<""t><""S><"">',
			deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/js/datatable-serverside/estudios_seleccionados_imagen.php",
			"fnServerParams": function (aoData, fnCallback) {
				var aleatorio = $('#aleatorio_ov').val();
				aoData.push({"name": "aleatorio", "value": aleatorio } );
			},
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "NO SE HA SELECCIONADO NINGÚN ESTUDIO",
				"sInfo": "ESTUDIOS FILTRADOS: _END_",
				"sInfoEmpty": "NINGUN ESTUDIO FILTRADO.", "sInfoFiltered": " TOTAL DE ESTUDIOS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 5000, paging: false,
		});
		$('#clickmeEiS').click(function(e){ oTableEimS.draw(); });

		$("#beneficio_i").change(function(e){ $('#clickmeIm').click();});

		var oTableEla = $('#dataTableBestudiosL').DataTable({
			serverSide: true,"sScrollY": 117, ordering: false, searching: true, scrollCollapse: false,
			"scrollX":true, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){
				$('body').popover({ selector: '[data-toggle="popover"]', 'trigger': 'hover', 'placement': 'auto' }); //$('[data-toggle="popover"]').popover({ });
			}, scroller:false, responsive:true,
			"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
			"sDom": '<"">r<""t><""S><"">',
			deferRender: true, select: { style: 'single' }, "processing": false, "sAjaxSource": "pacientes/js/datatable-serverside/buscar_estudios_laboratorio.php",
			"fnServerParams": function (aoData, fnCallback) {
				var idPaci = $('#id_paciente_ov').val(), idConvenio = $('#mi_id_convenioL').val();//if(idConvenio==null){idConvenio=0;}
				var aleatorio = $('#aleatorio_ov').val(), idSucursal = $('#sucursal_fi_p').val();
				aoData.push({"name": "idSucursal", "value": idSucursal } ); aoData.push({"name": "idConvenio", "value": idConvenio} );
				aoData.push({"name": "aleatorio", "value": aleatorio } ); aoData.push({"name": "idP", "value": idPaci } );
			},
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
				"sInfo": "ESTUDIOS FILTRADOS: _END_",
				"sInfoEmpty": "NINGUN ESTUDIO FILTRADO.", "sInfoFiltered": " TOTAL DE ESTUDIOS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 5000, paging: false,
		});
		$('#clickmeLa').click(function(e){ oTableEla.draw(); });
		//para los fintros individuales por campo de texto
		oTableEla.columns().every( function () {
			var that = this;

			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) { that .search( this.value ) .draw(); }
			} );
		} );
		//fin filtros individuales por campo de texto
		oTableEla.on( 'select', function ( e, dt, type, indexes ) {
			$('.depende_lab').removeClass('hidden');
			var rowData = oTableEla.rows( indexes ).data().toArray(); //alert(rowData[0][6]); //alert(rowData[0][9]);
			if(rowData[0][8]==undefined){var coveni = 0, ocu = 0;}else{var coveni = rowData[0][8], ocu = rowData[0][9];}
			subirEstudioL(rowData[0][7], $('#aleatorio_ov').val(), idP, $('#id_usr_reg').val(), $('#medico_l').val(),
				$('#mi_id_convenioL').val(),$('#sucursal_fi_p').val(),$('#observacionesL_NV').val(), 2, rowData[0][2], 3, coveni, ocu
			);
			$('.desc_cargo_l').change(function(e){nota_desc_cargo_l();}); $('.desc_cargo_l').keyup(function(e){nota_desc_cargo_l();});
		} );

		var oTableElaS = $('#dataTableElS').DataTable({
			serverSide: true,"sScrollY": 120, ordering: false, searching: true, scrollCollapse: false,
			"scrollX":true, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:true,
			"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
			"sDom": '<"">r<""t><""S><"">',
			deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/js/datatable-serverside/estudios_seleccionados_laboratorio.php",
			"fnServerParams": function (aoData, fnCallback) {
				var aleatorio = $('#aleatorio_ov').val();
				aoData.push({"name": "aleatorio", "value": aleatorio } );
			},
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "NO SE HA SELECCIONADO NINGÚN ESTUDIO",
				"sInfo": "ESTUDIOS FILTRADOS: _END_",
				"sInfoEmpty": "NINGUN ESTUDIO FILTRADO.", "sInfoFiltered": " TOTAL DE ESTUDIOS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 5000, paging: false,
		});
		$('#clickmeElS').click(function(e){ oTableElaS.draw(); });

		$("#beneficio_l").change(function(e){ $('#clickmeLa').click();});
		//Fin Laboratorio

		//Servicios
		var oTableSer = $('#dataTableBserviciosM').DataTable({
			serverSide: true,"sScrollY": 105, ordering: false, searching: true, scrollCollapse: false,
			"scrollX":true, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:true,
			"aoColumns":[{"bVisible":true},{"bVisible":false},{"bVisible":true},{"bVisible":true}],
			"sDom": '<"">r<""t><""S><"">',
			deferRender: true, select: { style: 'single' }, "processing": false, "sAjaxSource": "pacientes/js/datatable-serverside/buscar_servicios_medicos.php",
			"fnServerParams": function (aoData, fnCallback) {
				var idPaci = $('#id_paciente_ov').val(), idConvenio = $('#mi_id_convenioS').val();//if(idConvenio==null){idConvenio=0;}
				var aleatorio = $('#aleatorio_ov').val(), idSucursal = $('#sucursal_fi_p').val();
				aoData.push({"name": "idSucursal", "value": idSucursal } ); aoData.push({"name": "idConvenio", "value": idConvenio });
				aoData.push({"name": "aleatorio", "value": aleatorio } ); aoData.push({"name": "idP", "value": idPaci } );
			},
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
				"sInfo": "SERVICIOS FILTRADOS: _END_",
				"sInfoEmpty": "NINGUN SERVICIO FILTRADO.", "sInfoFiltered": " TOTAL DE SERVICIOS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 5000, paging: false,
		});
		$('#clickmeSe').click(function(e){ oTableSer.draw(); });
		//para los fintros individuales por campo de texto
		oTableSer.columns().every( function () {
			var that = this;

			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) { that .search( this.value ) .draw(); }
			} );
		} );
		//fin filtros individuales por campo de texto
		oTableSer.on( 'select', function ( e, dt, type, indexes ) {
			$('.depende_ser').removeClass('hidden');
			var rowData = oTableSer.rows( indexes ).data().toArray(); //alert(rowData[0][6]); //alert(rowData[0][9]);
			if(rowData[0][8]==undefined){var coveni = 0, ocu = 0;}else{var coveni = rowData[0][8], ocu = rowData[0][9];}
			subirEstudioS(rowData[0][4], $('#aleatorio_ov').val(), idP, $('#id_usr_reg').val(), $('#medico_s').val(),
				$('#mi_id_convenioS').val(),$('#sucursal_fi_p').val(),$('#observacionesS_NV').val(),2,rowData[0][2], 2, coveni, ocu
			);
			$('.desc_cargo_s').change(function(e){nota_desc_cargo_s();}); $('.desc_cargo_s').keyup(function(e){nota_desc_cargo_s();});
		} );

		var oTableSerS = $('#dataTableSmS').DataTable({
			serverSide: true,"sScrollY": 117, ordering: false, searching: true, scrollCollapse: false,
			"scrollX":true, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:true,
			"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":false},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
			"sDom": '<"">r<""t><""S><"">',
			deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/js/datatable-serverside/servicios_medicos_seleccionados.php",
			"fnServerParams": function (aoData, fnCallback) {
				var aleatorio = $('#aleatorio_ov').val();
				aoData.push({"name": "aleatorio", "value": aleatorio } );
			},
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "NO SE HA SELECCIONADO NINGÚN SERVICIO",
				"sInfo": "SERVICIOS FILTRADOS: _END_",
				"sInfoEmpty": "NINGUN SERVICIO FILTRADO.", "sInfoFiltered": " TOTAL DE SERVICIOS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 5000, paging: false,
		});
		$('#clickmeSmS').click(function(e){ oTableSerS.draw(); });

		$("#beneficio_s").change(function(e){ $('#clickmeSe').click();});
		//Fin servicios

		//CONSULTAS
		var oTableCo1 = $('#dataTableBconsultasM').DataTable({
			serverSide: true,"sScrollY": 125, ordering: false, searching: true, scrollCollapse: false,
			"scrollX":true, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:true,
			"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
			"sDom": '<"">r<""t><""S><"">',
			deferRender: true, select: { style: 'single' }, "processing": false, "sAjaxSource": "pacientes/js/datatable-serverside/buscar_consultas.php",
			"fnServerParams": function (aoData, fnCallback) {
				var idPaci = $('#id_paciente_ov').val(), idConvenio = $('#mi_id_convenioS').val();//if(idConvenio==null){idConvenio=0;}
				var aleatorio = $('#aleatorio_ov').val(), idSucursal = $('#sucursal_fi_p').val();
				aoData.push({"name": "idSucursal", "value": idSucursal } ); aoData.push({"name": "idConvenio", "value": idConvenio });
				aoData.push({"name": "aleatorio", "value": aleatorio } ); aoData.push({"name": "idP", "value": idPaci } );
			},
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
				"sInfo": "CONSULTAS FILTRADAS: _END_",
				"sInfoEmpty": "NINGUNA CONSULTA FILTRADA.", "sInfoFiltered": " TOTAL DE CONSULTAS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 5000, paging: false,
		});
		$('#clickmeCo1').click(function(e){ oTableCo1.draw(); });
		//para los fintros individuales por campo de texto
		oTableCo1.columns().every( function () {
			var that = this; $('input', this.footer()).on('keyup change', function(){ if(that.search() !== this.value){that.search(this.value).draw();} });
		} );
		//fin filtros individuales por campo de texto
		oTableCo1.on( 'select', function ( e, dt, type, indexes ) {
			$('.depende_con1').removeClass('hidden');
			var rowData = oTableCo1.rows( indexes ).data().toArray(); //alert(rowData[0][6]); //alert(rowData[0][9]);
			if(rowData[0][8]==undefined){var coveni = 0, ocu = 0;}else{var coveni = rowData[0][8], ocu = rowData[0][9];}
			subirEstudioC1(rowData[0][4], $('#aleatorio_ov').val(), idP, $('#id_usr_reg').val(), $('#medico_c1').val(),
				$('#mi_id_convenioC1').val(),$('#sucursal_fi_p').val(),$('#observacionesC1_NV').val(),2,rowData[0][2], 2, coveni, ocu
			);
			$('.desc_cargo_c1').change(function(e){nota_desc_cargo_c1();}); $('.desc_cargo_c1').keyup(function(e){nota_desc_cargo_c1();});
		} );

		var oTableCoS1 = $('#dataTableCmS1').DataTable({
			serverSide: true,"sScrollY": 125, ordering: false, searching: true, scrollCollapse: false,
			"scrollX":true, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:true,
			"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
			"sDom": '<"">r<""t><""S><"">',
			deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/js/datatable-serverside/consultas_seleccionadas.php",
			"fnServerParams": function (aoData, fnCallback) {
				var aleatorio = $('#aleatorio_ov').val(); aoData.push({"name": "aleatorio", "value": aleatorio } );
			},
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "NO SE HA SELECCIONADO NINGUNA CONSULTA",
				"sInfo": "CONSULTAS FILTRADAS: _END_",
				"sInfoEmpty": "NINGUNA CONSULTA FILTRADA.", "sInfoFiltered": " TOTAL DE CONSULTAS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 5000, paging: false,
		});
		$('#clickmeCoS1').click(function(e){ oTableCoS1.draw(); }); $('#t_con').click(function(e){ $('#clickmeCo1,#clickmeCoS1').click(); });

		$("#beneficio_c1").change(function(e){ $('#clickmeCo1').click();});
		//FIN CONSULTAS

		//FARMACIA
		var oTablePro = $('#dataTableBproductos').DataTable({
			serverSide: true,"sScrollY": 130, ordering: false, searching: true, scrollCollapse: false,
			"scrollX":true, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:true,
			"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
			"sDom": '<"">r<""t><""S><"">',
			deferRender: true, select: { style: 'single' }, "processing": false, "sAjaxSource": "pacientes/js/datatable-serverside/buscar_productos.php",
			"fnServerParams": function (aoData, fnCallback) {
				var idPaci = $('#id_paciente_ov').val(), idConvenio = $('#mi_id_convenioP').val();//if(idConvenio==null){idConvenio=0;}
				var aleatorio = $('#aleatorio_ov').val(), idSucursal = $('#sucursal_fi_p').val();
				aoData.push({"name": "idSucursal", "value": idSucursal } ); aoData.push({"name": "idConvenio", "value": idConvenio });
				aoData.push({"name": "aleatorio", "value": aleatorio } ); aoData.push({"name": "idP", "value": idPaci } );
			},
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
				"sInfo": "PRODUCTOS FILTRADOS: _END_",
				"sInfoEmpty": "NINGUN PRODUCTO FILTRADO.", "sInfoFiltered": " TOTAL DE PRODUCTOS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 5000, paging: false,
		});
		$('#clickmePr').click(function(e){ oTablePro.draw(); });
		//para los fintros individuales por campo de texto
		oTablePro.columns().every( function () {
			var that = this;
			$('input', this.footer()).on('keyup change',function(){ if(that.search() !== this.value){that .search(this.value) .draw();} });
		} );
		//fin filtros individuales por campo de texto
		oTablePro.on( 'select', function ( e, dt, type, indexes ) {
			$('.depende_pro').removeClass('hidden');
			var rowData = oTablePro.rows(indexes).data().toArray(); //alert(rowData[0][6]); //alert(rowData[0][9]);
			if(rowData[0][8]==undefined){var coveni = 0, ocu = 0;}else{var coveni = rowData[0][8], ocu = rowData[0][9];}
			subirProductoS(rowData[0][4], $('#aleatorio_ov').val(), idP, $('#id_usr_reg').val(),
				$('#mi_id_convenioP').val(),$('#sucursal_fi_p').val(),$('#observacionesS_NV').val(),3,rowData[0][2], 5, coveni, ocu
			);
			$('.desc_cargo_p').change(function(e){nota_desc_cargo_p();}); $('.desc_cargo_p').keyup(function(e){nota_desc_cargo_p();});
		} );

		var oTableProS = $('#dataTablePS').DataTable({
			serverSide: true,"sScrollY": 160, ordering: false, searching: true, scrollCollapse: false,
			"scrollX":true, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:true,
			"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
			"sDom": '<"">r<""t><""S><"">',
			deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/js/datatable-serverside/productos_seleccionados.php",
			"fnServerParams": function (aoData, fnCallback) {
				var aleatorio = $('#aleatorio_ov').val();
				aoData.push({"name": "aleatorio", "value": aleatorio } );
			},
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "NO SE HA SELECCIONADO NINGÚN PRODUCTO",
				"sInfo": "PRODUCTOS FILTRADOS: _END_",
				"sInfoEmpty": "NINGUN PRODUCTO FILTRADO.", "sInfoFiltered": " TOTAL DE PRODUCTOS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 5000, paging: false,
		});
		$('#clickmePS').click(function(e){ oTableProS.draw(); }); $('#t_farm').click(function(e){ $('#clickmePS,#clickmePr').click(); });

		$("#beneficio_p").change(function(e){ $('#clickmePr').click();});
		//FIN FARMACIA

		$('#myModal4').modal('show');
		$('#myModal4').on('shown.bs.modal', function (e) {
			$('#form-2').validator(); $('#form-2 input').keyup(function(e) { $('#alerta1').hide(); });
			window.setTimeout(function(){$('#clickmeCo1, #clickmeCoS1').click()},200)
		});
		$('#myModal4').on('hidden.bs.modal', function (e) {
			//if(ref){ window.setTimeout(function(){historialPaciente($('#mi_histo').val());},300); }else{ }
			$(".modal-content").remove(); $("#myModal4").empty();
		});
	} });
}

function borrarItemNV(idConcepto){//Imagen
	var datosBINV = {idConcepto:idConcepto}
	$.post('pacientes/files-serverside/eliminarItem.php',datosBINV).done(function( data ) {
	if (data==1){ $('#clickmeEiS,#clickmeIm').click();
		var datos={aleatorio:$('#aleatorio_ov').val()}
		$.post('pacientes/files-serverside/sumar_precios_imagen.php',datos).done(function(data){
			if(!parseFloat(data)){data=0;}else{data=data;}
			if($('#hay_iva_ov').val()==1){$('#cb_facturada_ov').click();}
			var pd = $('#po_descuento_i').val(), ce = $('#cargo_extra_i').val(), dd = $('#da_descuento_i').val();
			if(!parseFloat(pd)){var porcentaje_d = 0;}else{var porcentaje_d = pd;}
			if(parseFloat(ce)){var cargo_extra = ce;}else{var cargo_extra = 0;}

			$('#precio_i').val(data);
			if(parseFloat(pd)){ $('#to_descuento_i').val( (parseFloat(data)*parseFloat(pd))/100 ); }
			else if(parseFloat(dd)){$('#to_descuento_i').val(dd);}else{$('#to_descuento_i').val(0);}
			calcular_totales();
		});
	} else{alert(data);} });
}
function borrarItemNVL(idConcepto){
	var datosBINV = {idConcepto:idConcepto}
	$.post('pacientes/files-serverside/eliminarItem.php',datosBINV).done(function( data ) {
	if (data==1){ $('#clickmeElS,#clickmeLa').click();
		var datos={aleatorio:$('#aleatorio_ov').val()}
		$.post('pacientes/files-serverside/sumar_precios_laboratorio.php',datos).done(function(data){
			if(!parseFloat(data)){data=0;}else{data=data;}
			if($('#hay_iva_ov').val()==1){$('#cb_facturada_ov').click();}
			var pd = $('#po_descuento_l').val(), ce = $('#cargo_extra_l').val(), dd = $('#da_descuento_l').val();
			if(!parseFloat(pd)){var porcentaje_d = 0;}else{var porcentaje_d = pd;}
			if(parseFloat(ce)){var cargo_extra = ce;}else{var cargo_extra = 0;}

			$('#precio_l').val(data);
			if(parseFloat(pd)){ $('#to_descuento_l').val( (parseFloat(data)*parseFloat(pd))/100 ); }
			else if(parseFloat(dd)){$('#to_descuento_l').val(dd);}else{$('#to_descuento_l').val(0);}
			calcular_totales();
		});
	} else{alert(data);} });
}
function borrarItemNVS(idConcepto){
	var datosBINV = {idConcepto:idConcepto}
	$.post('pacientes/files-serverside/eliminarItem.php',datosBINV).done(function( data ) {
	if (data==1){ $('#clickmeSmS,#clickmeSe').click();
		var datos={aleatorio:$('#aleatorio_ov').val()}
		$.post('pacientes/files-serverside/sumar_precios_servicios.php',datos).done(function(data){
			if(!parseFloat(data)){data=0;}else{data=data;}
			if($('#hay_iva_ov').val()==1){$('#cb_facturada_ov').click();}
			var pd = $('#po_descuento_s').val(), ce = $('#cargo_extra_s').val(), dd = $('#da_descuento_s').val();
			if(!parseFloat(pd)){var porcentaje_d = 0;}else{var porcentaje_d = pd;}
			if(parseFloat(ce)){var cargo_extra = ce;}else{var cargo_extra = 0;}

			$('#precio_s').val(data);
			if(parseFloat(pd)){ $('#to_descuento_s').val( (parseFloat(data)*parseFloat(pd))/100 ); }
			else if(parseFloat(dd)){$('#to_descuento_s').val(dd);}else{$('#to_descuento_s').val(0);}
			calcular_totales();
		});
	} else{alert(data);} });
}
function borrarItemNVC1(idConcepto){
	var datosBINV = {idConcepto:idConcepto}
	$.post('pacientes/files-serverside/eliminarItem.php',datosBINV).done(function( data ) {
	if (data==1){ $('#clickmeCo1,#clickmeCoS1').click();
		var datos={aleatorio:$('#aleatorio_ov').val()}
		$.post('pacientes/files-serverside/sumar_precios_consultas.php',datos).done(function(data){
			if(!parseFloat(data)){data=0;}else{data=data;}
			if($('#hay_iva_ov').val()==1){$('#cb_facturada_ov').click();}
			var pd = $('#po_descuento_c1').val(), ce = $('#cargo_extra_c1').val(), dd = $('#da_descuento_c1').val();
			if(!parseFloat(pd)){var porcentaje_d = 0;}else{var porcentaje_d = pd;}
			if(parseFloat(ce)){var cargo_extra = ce;}else{var cargo_extra = 0;}

			$('#precio_c1').val(data);
			if(parseFloat(pd)){ $('#to_descuento_c1').val( (parseFloat(data)*parseFloat(pd))/100 ); }
			else if(parseFloat(dd)){$('#to_descuento_c1').val(dd);}else{$('#to_descuento_c1').val(0);}
			calcular_totales();
		});
	} else{alert(data);} });
}
function borrarItemNVP(idConcepto){
	var datosBINV = {idConcepto:idConcepto}
	$.post('pacientes/files-serverside/eliminarItem.php',datosBINV).done(function( data ) {
	if (data==1){ $('#clickmePS,#clickmePr').click();
		var datos={aleatorio:$('#aleatorio_ov').val()}
		$.post('pacientes/files-serverside/sumar_precios_productos.php',datos).done(function(data){
			if(!parseFloat(data)){data=0;}else{data=data;}
			if($('#hay_iva_ov').val()==1){$('#cb_facturada_ov').click();}
			var pd = $('#po_descuento_p').val(), ce = $('#cargo_extra_p').val(), dd = $('#da_descuento_p').val();
			if(!parseFloat(pd)){var porcentaje_d = 0;}else{var porcentaje_d = pd;}
			if(parseFloat(ce)){var cargo_extra = ce;}else{var cargo_extra = 0;}

			$('#precio_p').val(data);
			if(parseFloat(pd)){ $('#to_descuento_p').val( (parseFloat(data)*parseFloat(pd))/100 ); }
			else if(parseFloat(dd)){$('#to_descuento_p').val(dd);}else{$('#to_descuento_p').val(0);}
			calcular_totales();
		});
	} else{alert(data);} });
}
function subirEstudio(idE, noAleatorio, idP, idU, idMedico, idConvenio, idSucursal, observaciones, departamento,p,t,id_con_bene,ocup){
	var datosSENV = {noAleatorio:noAleatorio, idP:idP, idU:idU, idMedico:idMedico, idE:idE, agendar:$('#agendarOV').val(),
		idConvenio:idConvenio, idSucursal:idSucursal, observaciones:observaciones, departamento:departamento,
		precioTo:p,tipoConcepto:t,id_con_bene:id_con_bene,fechaC:$('#fichaNV').val()+' '+$('#horaNV').val(), ocupado:ocup
	}
	$.post('pacientes/files-serverside/guardarEstudioNV.php',datosSENV).done(function( data ) {
		if(data==1){
			$('#clickmeIm,#clickmeEiS').click();
			totales_imagen(p, $('#po_descuento_i').val(),$('#da_descuento_i').val(),$('#cargo_extra_i').val());
			calcular_totales();
		}else{alert(data);}
	});
}
function subirEstudioL(idE,noAleatorio, idP, idU, idMedico, idConvenio, idSucursal, observaciones, departamento,p,t,id_con_bene,ocup){
	var datosSENV = {noAleatorio:noAleatorio, idP:idP, idU:idU, idMedico:idMedico, idE:idE, agendar:$('#agendarOV').val(),
		idConvenio:idConvenio, idSucursal:idSucursal, observaciones:observaciones, departamento:departamento,
		precioTo:p,tipoConcepto:t,id_con_bene:id_con_bene,fechaC:$('#fichaNV').val()+' '+$('#horaNV').val(), ocupado:ocup
	}
	$.post('pacientes/files-serverside/guardarEstudioNV.php',datosSENV).done(function( data ) {
		if(data==1){
			$('#clickmeLa,#clickmeElS').click();
			totales_laboratorio(p, $('#po_descuento_l').val(),$('#da_descuento_l').val(),$('#cargo_extra_l').val()); calcular_totales();
		}else{alert(data);}
	});
}
function subirEstudioS(idE,noAleatorio,idP, idU, idMedico, idConvenio, idSucursal, observaciones, departamento,p,t,id_con_bene,ocup){
	var datosSENV = {noAleatorio:noAleatorio, idP:idP, idU:idU, idMedico:idMedico, idE:idE, agendar:$('#agendarOV').val(),
		idConvenio:idConvenio, idSucursal:idSucursal, observaciones:observaciones, departamento:departamento,
		precioTo:p,tipoConcepto:t,id_con_bene:id_con_bene,fechaC:$('#fichaNV').val()+' '+$('#horaNV').val(), ocupado:ocup
	}
	$.post('pacientes/files-serverside/guardarEstudioNV.php',datosSENV).done(function( data ) {
		if(data==1){
			$('#clickmeSe,#clickmeSmS').click();
			totales_servicios(p, $('#po_descuento_s').val(),$('#da_descuento_s').val(),$('#cargo_extra_s').val());
			calcular_totales();
		}else{alert(data);}
	});
}
function subirEstudioC1(idE,noAleatorio,idP, idU, idMedico, idConvenio, idSucursal, observaciones, departamento,p,t,id_con_bene,ocup){
	var datosSENV = {noAleatorio:noAleatorio, idP:idP, idU:idU, idMedico:idMedico, idE:idE, agendar:$('#agendarOV').val(),
		idConvenio:idConvenio, idSucursal:idSucursal, observaciones:observaciones, departamento:departamento,
		precioTo:p,tipoConcepto:t,id_con_bene:id_con_bene,fechaC:$('#fichaNV').val()+' '+$('#horaNV').val(), ocupado:ocup
	}
	console.log(datosSENV);
	$.post('pacientes/files-serverside/guardarEstudioNV.php',datosSENV).done(function( data ) {
		if(data==1){ $('#clickmeCo1,#clickmeCoS1').click();
			totales_consultas(p, $('#po_descuento_c1').val(),$('#da_descuento_c1').val(),$('#cargo_extra_c1').val()); calcular_totales();
		}else{alert(data);}
	});
}
function subirProductoS(idE,noAleatorio,idP, idU, idConvenio, idSucursal, observaciones, departamento,p,t,id_con_bene,ocup){
	var datosSENV = {noAleatorio:noAleatorio, idP:idP, idU:idU, idE:idE, agendar:$('#agendarOV').val(),
		idConvenio:idConvenio, idSucursal:idSucursal, observaciones:observaciones, departamento:departamento,
		precioTo:p,tipoConcepto:t,id_con_bene:id_con_bene,fechaC:$('#fichaNV').val()+' '+$('#horaNV').val(), ocupado:ocup
	}
	$.post('pacientes/files-serverside/guardarEstudioNV.php',datosSENV).done(function( data ) {
		if(data==1){
			$('#clickmePr,#clickmePS').click();
			totales_productos(p, $('#po_descuento_p').val(),$('#da_descuento_p').val(),$('#cargo_extra_p').val());
			calcular_totales();
		}else{alert(data);}
	});
}
function subir_concepto(tipo_c,id_c,id_beneficio,id_p,aleatorio,id_u,id_medico,precio){
	swal({
	  title: "Cargando datos...", text: "", type: "", showCancelButton: false, closeOnConfirm: false, showLoaderOnConfirm: true,
	  showConfirmButton:false
	});
	var datos={tipo_c:tipo_c,id_c:id_c,id_beneficio:id_beneficio,id_p:id_p,aleatorio:aleatorio,id_u:id_u,id_medico:id_medico,precio:precio}
	$.post('pacientes/files-serverside/subirConcepto.php',datos).done(function(data){ if(data==1){swal.close();}else{alert(data);}});
}

function bajar_concepto(id_c){
	swal({
	  title: "Cargando datos...", text: "", type: "", showCancelButton: false, closeOnConfirm: false, showLoaderOnConfirm: true,
	  showConfirmButton:false
	});
	var datos={id_c:id_c}
	$.post('pacientes/files-serverside/bajarConcepto.php',datos).done(function(data){ if(data==1){swal.close();}else{alert(data);}});
}

function cargos_descuentos_c1(v,id){
	$('.desc_cargo_c1').each(function(index, element) {
		if(this.id==id){} else{ if(parseFloat(v)){$('#'+this.id).val(0);} }
		if(id=='po_descuento_c1'){
			if(v<0){$('#po_descuento_c1').val(0);}else if(v>100){$('#po_descuento_c1').val(100);}
			if(!parseFloat(v)){$('#po_descuento_c1').val('');}
		}
		if(id=='da_descuento_c1'){
			if(v<0){$('#da_descuento_c1').val(0);}
			else if(v>parseFloat($('#precio_c1').val())){$('#da_descuento_c1').val(redondear($('#precio_c1').val(),2));}
			if(!parseFloat(v)){$('#da_descuento_c1').val('');}
		}
		if(id=='cargo_extra_c1'){ if(v<0){$('#cargo_extra_c1').val(0);} if(!parseFloat(v)){$('#cargo_extra_c1').val('');} }
		totales_consultas($('#precio_c1').val(), $('#po_descuento_c1').val(), $('#da_descuento_c1').val(), $('#cargo_extra_c1').val());
    });
}
function cargos_descuentos_i(v,id){
	$('.desc_cargo_i').each(function(index, element) {
		if(this.id==id){} else{ if(parseFloat(v)){$('#'+this.id).val(0);} }
		if(id=='po_descuento_i'){
			if(v<0){$('#po_descuento_i').val(0);}else if(v>100){$('#po_descuento_i').val(100);}
			if(!parseFloat(v)){$('#po_descuento_i').val('');}
		}
		if(id=='da_descuento_i'){
			if(v<0){$('#da_descuento_i').val(0);}
			else if(v>parseFloat($('#precio_i').val())){$('#da_descuento_i').val(redondear($('#precio_i').val(),2));}
			if(!parseFloat(v)){$('#da_descuento_i').val('');}
		}
		if(id=='cargo_extra_i'){
			if(v<0){$('#cargo_extra_i').val(0);} if(!parseFloat(v)){$('#cargo_extra_i').val('');}
		}
		totales_imagen($('#precio_i').val(), $('#po_descuento_i').val(), $('#da_descuento_i').val(), $('#cargo_extra_i').val());
    });
}
function cargos_descuentos_l(v,id){
	$('.desc_cargo_l').each(function(index, element) {
		if(this.id==id){} else{ if(parseFloat(v)){$('#'+this.id).val(0);} }
		if(id=='po_descuento_l'){
			if(v<0){$('#po_descuento_l').val(0);}else if(v>100){$('#po_descuento_l').val(100);}
			if(!parseFloat(v)){$('#po_descuento_l').val('');}
		}
		if(id=='da_descuento_l'){
			if(v<0){$('#da_descuento_l').val(0);}
			else if(v>parseFloat($('#precio_l').val())){$('#da_descuento_l').val(redondear($('#precio_l').val(),2));}
			if(!parseFloat(v)){$('#da_descuento_l').val('');}
		}
		if(id=='cargo_extra_l'){
			if(v<0){$('#cargo_extra_l').val(0);} if(!parseFloat(v)){$('#cargo_extra_l').val('');}
		}
		totales_laboratorio($('#precio_l').val(), $('#po_descuento_l').val(), $('#da_descuento_l').val(), $('#cargo_extra_l').val());
    });
}
function cargos_descuentos_s(v,id){
	$('.desc_cargo_s').each(function(index, element) {
		if(this.id==id){} else{ if(parseFloat(v)){$('#'+this.id).val(0);} }
		if(id=='po_descuento_s'){
			if(v<0){$('#po_descuento_s').val(0);}else if(v>100){$('#po_descuento_s').val(100);}
			if(!parseFloat(v)){$('#po_descuento_s').val('');}
		}
		if(id=='da_descuento_s'){
			if(v<0){$('#da_descuento_s').val(0);}
			else if(v>parseFloat($('#precio_s').val())){$('#da_descuento_s').val(redondear($('#precio_s').val(),2));}
			if(!parseFloat(v)){$('#da_descuento_s').val('');}
		}
		if(id=='cargo_extra_s'){
			if(v<0){$('#cargo_extra_s').val(0);} if(!parseFloat(v)){$('#cargo_extra_s').val('');}
		}
		totales_servicios($('#precio_s').val(), $('#po_descuento_s').val(), $('#da_descuento_s').val(), $('#cargo_extra_s').val());
    });
}
function cargos_descuentos_p(v,id){
	$('.desc_cargo_p').each(function(index, element) {
		if(this.id==id){} else{ if(parseFloat(v)){$('#'+this.id).val(0);} }
		if(id=='po_descuento_p'){
			if(v<0){$('#po_descuento_p').val(0);}else if(v>100){$('#po_descuento_p').val(100);}
			if(!parseFloat(v)){$('#po_descuento_p').val('');}
		}
		if(id=='da_descuento_p'){
			if(v<0){$('#da_descuento_p').val(0);}
			else if(v>parseFloat($('#precio_p').val())){$('#da_descuento_p').val(redondear($('#precio_p').val(),2));}
			if(!parseFloat(v)){$('#da_descuento_p').val('');}
		}
		if(id=='cargo_extra_p'){
			if(v<0){$('#cargo_extra_p').val(0);} if(!parseFloat(v)){$('#cargo_extra_p').val('');}
		}
		totales_productos($('#precio_p').val(), $('#po_descuento_p').val(), $('#da_descuento_p').val(), $('#cargo_extra_p').val());
    });
}
function calcular_totales(){
	$('#pago_ov_c, #pago_ov_i, #pago_ov_l, #pago_ov_f').val('');
	if(parseFloat($('#cargo_extra_c').val())){var cargo_extra = $('#cargo_extra_c').val();}else{var cargo_extra = 0;}
	if(parseFloat($('#cargo_extra_i').val())){var cargo_extra_i = $('#cargo_extra_i').val();}else{var cargo_extra_i = 0;}
	if(parseFloat($('#cargo_extra_l').val())){var cargo_extra_l = $('#cargo_extra_l').val();}else{var cargo_extra_l = 0;}
	if(parseFloat($('#cargo_extra_s').val())){var cargo_extra_s = $('#cargo_extra_s').val();}else{var cargo_extra_s = 0;}
	if(parseFloat($('#cargo_extra_p').val())){var cargo_extra_p = $('#cargo_extra_p').val();}else{var cargo_extra_p = 0;}
	if(parseFloat($('#cargo_extra_c1').val())){var cargo_extra_c = $('#cargo_extra_c1').val();}else{var cargo_extra_c = 0;}

	$('#total_i').val( parseFloat($('#precio_i').val())+parseFloat(cargo_extra_i)-parseFloat($('#to_descuento_i').val()) );
	$('#total_l').val( parseFloat($('#precio_l').val())+parseFloat(cargo_extra_l)-parseFloat($('#to_descuento_l').val()) );
	$('#total_s').val( parseFloat($('#precio_s').val())+parseFloat(cargo_extra_s)-parseFloat($('#to_descuento_s').val()) );
	$('#total_p').val( parseFloat($('#precio_p').val())+parseFloat(cargo_extra_p)-parseFloat($('#to_descuento_p').val()) );
	$('#total_c1').val( parseFloat($('#precio_c1').val())+parseFloat(cargo_extra_c)-parseFloat($('#to_descuento_c1').val()) );

	$('.1total_i').text( parseFloat($('#precio_i').val())+parseFloat(cargo_extra_i)-parseFloat($('#to_descuento_i').val()) );
	$('.1total_l').text( parseFloat($('#precio_l').val())+parseFloat(cargo_extra_l)-parseFloat($('#to_descuento_l').val()) );
	$('.1total_p').text( parseFloat($('#precio_p').val())+parseFloat(cargo_extra_p)-parseFloat($('#to_descuento_p').val()) );
	$('.1total_s').text(  );
	$('.1total_c1').text( parseFloat($('#precio_c1').val())+parseFloat(cargo_extra_c)-parseFloat($('#to_descuento_c1').val()) +parseFloat($('#precio_s').val())+parseFloat(cargo_extra_s)-parseFloat($('#to_descuento_s').val()) );

	if($('.1total_c1').text()<0.0001){ $('#pago_ov_c').val(0); }else{$('#pago_ov_c').val('');}
	if($('.1total_i').text()<0.0001){ $('#pago_ov_i').val(0); }else{$('#pago_ov_i').val('');}
	if($('.1total_l').text()<0.0001){ $('#pago_ov_l').val(0); }else{$('#pago_ov_l').val('');}
	if($('.1total_p').text()<0.0001){ $('#pago_ov_f').val(0); }else{$('#pago_ov_f').val('');}

	$('.total_imagen').text('$'+redondear($('#precio_i').val(),2));
	$('.total_laboratorio').text('$'+redondear($('#precio_l').val(),2));
	$('.total_servicios').text('$'+redondear($('#precio_s').val(),2));
	$('.total_productos').text('$'+redondear($('#precio_p').val(),2));
	$('.total_consulta').text('$'+redondear($('#precio_c1').val(),2));
	$('#subtotal_ov').text('$'+redondear(parseFloat($('#precio_i').val())+parseFloat($('#precio_l').val())+parseFloat($('#precio_s').val())+parseFloat($('#precio_p').val())+parseFloat($('#precio_c1').val()),2));
	$('#extras_ov').text('+ $'+redondear(parseFloat(cargo_extra)+parseFloat(cargo_extra_i)+parseFloat(cargo_extra_l)+parseFloat(cargo_extra_s)+parseFloat(cargo_extra_p)+parseFloat(cargo_extra_c),2));
	$('#descuento_ov').text('- $'+redondear(parseFloat($('#to_descuento_i').val())+parseFloat($('#to_descuento_l').val())+parseFloat($('#to_descuento_s').val())+parseFloat($('#to_descuento_p').val())+parseFloat($('#to_descuento_c1').val()),2));
	$('#iva_ov').text('+ $'+redondear($('#iva_ov_h').val(),2));
	$('#total_ov').text('$'+redondear(parseFloat($('#precio_c1').val())+parseFloat($('#precio_i').val())+parseFloat($('#precio_l').val())+parseFloat($('#precio_s').val())+parseFloat($('#precio_p').val())+parseFloat(cargo_extra_c)+parseFloat(cargo_extra_i)+parseFloat(cargo_extra_l)+parseFloat(cargo_extra_s)+parseFloat(cargo_extra_p)-parseFloat($('#to_descuento_c1').val())-parseFloat($('#to_descuento_i').val())-parseFloat($('#to_descuento_l').val())-parseFloat($('#to_descuento_s').val())-parseFloat($('#to_descuento_p').val())+parseFloat($('#iva_ov_h').val()),2));
	$('#total_ov_h').val(redondear(parseFloat($('#precio_c1').val())+parseFloat($('#precio_i').val())+parseFloat($('#precio_l').val())+parseFloat($('#precio_s').val())+parseFloat($('#precio_p').val())+parseFloat(cargo_extra_c)+parseFloat(cargo_extra_i)+parseFloat(cargo_extra_l)+parseFloat(cargo_extra_s)+parseFloat(cargo_extra_p)-parseFloat($('#to_descuento_c1').val())-parseFloat($('#to_descuento_i').val())-parseFloat($('#to_descuento_l').val())-parseFloat($('#to_descuento_s').val())-parseFloat($('#to_descuento_p').val())+parseFloat($('#iva_ov_h').val()),2));
	window.setTimeout(function(){
		if($('#precio_c1').val()>0){
			var datos={aleatorio:$('#aleatorio_ov').val()}
			$.post('pacientes/files-serverside/detalle_consulta.php',datos).done(function(data){
				var dato = data.split('{:;]}');
				$('#aqui_consulta').html(data);
			});
		}else{ $('#aqui_consulta').html(''); }
		if($('#precio_i').val()>0){
			var datos={aleatorio:$('#aleatorio_ov').val()}
			$.post('pacientes/files-serverside/detalle_imagen.php',datos).done(function(data){ $('#aqui_imagen').html(data); });
		}else{ $('#aqui_imagen').html(''); }
		if($('#precio_l').val()>0){
			var datos={aleatorio:$('#aleatorio_ov').val()}
			$.post('pacientes/files-serverside/detalle_laboratorio.php',datos).done(function(data){
				$('#aqui_laboratorio').html(data);
			});
		}else{ $('#aqui_laboratorio').html(''); }
		if($('#precio_s').val()>0){
			var datos={aleatorio:$('#aleatorio_ov').val()}
			$.post('pacientes/files-serverside/detalle_servicios.php',datos).done(function(data){ $('#aqui_servicios').html(data); });
		}else{ $('#aqui_servicios').html(''); }
		if($('#precio_p').val()>0){
			var datos={aleatorio:$('#aleatorio_ov').val()}
			$.post('pacientes/files-serverside/detalle_productos.php',datos).done(function(data){ $('#aqui_productos').html(data); });
		}else{ $('#aqui_productos').html(''); }
	},500);
}
function totales_servicios(precio, pd, dd, ce){ //alert(precio+';'+pd+';'+dd+';'+ce);
	if($('#hay_iva_ov').val()==1){$('#cb_facturada_ov').click();}
	if(!parseFloat(pd)){var porcentaje_d = 0;}else{var porcentaje_d = pd;}
	if(parseFloat(ce)){var cargo_extra = ce;}else{var cargo_extra = 0;} //$('#precio_i, #total_i').val(precio);
	//Sumar los precios
	var datos={aleatorio:$('#aleatorio_ov').val()}
	$.post('pacientes/files-serverside/sumar_precios_servicios.php',datos).done(function(data){
		if(!parseFloat(data)){data=0;}else{data=data;}
		$('#precio_s').val(data);
		if(parseFloat(pd)){ $('#to_descuento_s').val( (parseFloat(data)*parseFloat(pd))/100 ); }
		else if(parseFloat(dd)){$('#to_descuento_s').val(dd);}else{$('#to_descuento_s').val(0);}
		calcular_totales();
	});
}
function totales_consultas(precio, pd, dd, ce){ //alert(precio+';'+pd+';'+dd+';'+ce);
	if($('#hay_iva_ov').val()==1){$('#cb_facturada_ov').click();}
	if(!parseFloat(pd)){var porcentaje_d = 0;}else{var porcentaje_d = pd;}
	if(parseFloat(ce)){var cargo_extra = ce;}else{var cargo_extra = 0;} //$('#precio_i, #total_i').val(precio);
	//Sumar los precios
	var datos={aleatorio:$('#aleatorio_ov').val()}
	$.post('pacientes/files-serverside/sumar_precios_consultas.php',datos).done(function(data){
		if(!parseFloat(data)){data=0;}else{data=data;}
		$('#precio_c1').val(data);
		if(parseFloat(pd)){ $('#to_descuento_c1').val( (parseFloat(data)*parseFloat(pd))/100 ); }
		else if(parseFloat(dd)){$('#to_descuento_c1').val(dd);}else{$('#to_descuento_c1').val(0);}
		calcular_totales();
	});
}
function totales_productos(precio, pd, dd, ce){ //alert(precio+';'+pd+';'+dd+';'+ce);
	if($('#hay_iva_ov').val()==1){$('#cb_facturada_ov').click();}
	if(!parseFloat(pd)){var porcentaje_d = 0;}else{var porcentaje_d = pd;}
	if(parseFloat(ce)){var cargo_extra = ce;}else{var cargo_extra = 0;} //$('#precio_i, #total_i').val(precio);
	//Sumar los precios
	var datos={aleatorio:$('#aleatorio_ov').val()}
	$.post('pacientes/files-serverside/sumar_precios_productos.php',datos).done(function(data){
		if(!parseFloat(data)){data=0;}else{data=data;}
		$('#precio_p').val(data);
		if(parseFloat(pd)){ $('#to_descuento_p').val( (parseFloat(data)*parseFloat(pd))/100 ); }
		else if(parseFloat(dd)){$('#to_descuento_p').val(dd);}else{$('#to_descuento_p').val(0);}
		calcular_totales();
	});
}
function totales_imagen(precio, pd, dd, ce){ //alert(precio+';'+pd+';'+dd+';'+ce);
	if($('#hay_iva_ov').val()==1){$('#cb_facturada_ov').click();}
	if(!parseFloat(pd)){var porcentaje_d = 0;}else{var porcentaje_d = pd;}
	if(parseFloat(ce)){var cargo_extra = ce;}else{var cargo_extra = 0;} //$('#precio_i, #total_i').val(precio);
	//Sumar los precios
	var datos={aleatorio:$('#aleatorio_ov').val()}
	$.post('pacientes/files-serverside/sumar_precios_imagen.php',datos).done(function(data){
		if(!parseFloat(data)){data=0;}else{data=data;}
		$('#precio_i').val(data);
		if(parseFloat(pd)){ $('#to_descuento_i').val( (parseFloat(data)*parseFloat(pd))/100 ); }
		else if(parseFloat(dd)){$('#to_descuento_i').val(dd);}else{$('#to_descuento_i').val(0);}
		calcular_totales();
	});
}
function totales_laboratorio(precio, pd, dd, ce){ //alert(precio+';'+pd+';'+dd+';'+ce);
	if($('#hay_iva_ov').val()==1){$('#cb_facturada_ov').click();}
	if(!parseFloat(pd)){var porcentaje_d = 0;}else{var porcentaje_d = pd;}
	if(parseFloat(ce)){var cargo_extra = ce;}else{var cargo_extra = 0;} //$('#precio_i, #total_i').val(precio);
	//Sumar los precios
	var datos={aleatorio:$('#aleatorio_ov').val()}
	$.post('pacientes/files-serverside/sumar_precios_laboratorio.php',datos).done(function(data){
		if(!parseFloat(data)){data=0;}else{data=data;}
		$('#precio_l').val(data);
		if(parseFloat(pd)){ $('#to_descuento_l').val( (parseFloat(data)*parseFloat(pd))/100 ); }
		else if(parseFloat(dd)){$('#to_descuento_l').val(dd);}else{$('#to_descuento_l').val(0);}
		calcular_totales();
	});
}

function totales_consulta(precio_c, pd, dd, ce){ //alert(precio_c+';'+pd+';'+dd+';'+ce);
	if($('#hay_iva_ov').val()==1){$('#cb_facturada_ov').click();}
	if(!parseFloat(pd)){var porcentaje_d = 0;}else{var porcentaje_d = pd;}
	if(parseFloat(ce)){var cargo_extra = ce;}else{var cargo_extra = 0;}
	$('#precio_c, #total_c').val(precio_c); //$('#to_descuento_c, .desc_cargo').val(0);
	if(parseFloat(pd)){ $('#to_descuento_c').val( (parseFloat($('#precio_c').val())*parseFloat(pd))/100 ); }
	else if(parseFloat(dd)){$('#to_descuento_c').val(dd);}else{$('#to_descuento_c').val(0);}
	calcular_totales();
}

function reset_totales_consulta(){
	bajar_concepto($('#id_consulta_to').val());
	$('#precio_c, #to_descuento_c, #total_c, .desc_cargo').val(0); $('#id_consulta_to').val('');
	if($('#hay_iva_ov').val()==1){$('#cb_facturada_ov').click();}
}

function nota_desc_cargo_c1(){ var i = 0;
	$('.desc_cargo_c1').each(function(index, element) { if($(this).val()>0){i++;} });
	if(i>0){$('.depende_descuento_c1').removeClass('hidden');}else{$('.depende_descuento_c1').addClass('hidden');}
}
function nota_desc_cargo_i(){ var i = 0;
	$('.desc_cargo_i').each(function(index, element) { if($(this).val()>0){i++;} });
	if(i>0){$('.depende_descuento_i').removeClass('hidden');}else{$('.depende_descuento_i').addClass('hidden');}
}
function nota_desc_cargo_l(){ var i = 0;
	$('.desc_cargo_l').each(function(index, element) { if($(this).val()>0){i++;} });
	if(i>0){$('.depende_descuento_l').removeClass('hidden');}else{$('.depende_descuento_l').addClass('hidden');}
}
function nota_desc_cargo_s(){ var i = 0;
	$('.desc_cargo_s').each(function(index, element) { if($(this).val()>0){i++;} });
	if(i>0){$('.depende_descuento_s').removeClass('hidden');}else{$('.depende_descuento_s').addClass('hidden');}
}
function nota_desc_cargo_p(){ var i = 0;
	$('.desc_cargo_p').each(function(index, element) { if($(this).val()>0){i++;} });
	if(i>0){$('.depende_descuento_p').removeClass('hidden');}else{$('.depende_descuento_p').addClass('hidden');}
}
function su_pago_a(v,id){
	if(parseFloat(v)=='' || parseFloat(v)<0){$('#'+id).val(0);} if(!parseFloat(v)){if(parseFloat(v)==''){}else{$('#'+id).val('');}}
	if(parseFloat(v)>parseFloat($('#1total_c1').text())){$('#'+id).val(parseFloat($('#1total_c1').text()));}
}
function su_pago_i(v,id){
	if(parseFloat(v)=='' || parseFloat(v)<0){$('#'+id).val(0);} if(!parseFloat(v)){if(parseFloat(v)==''){}else{$('#'+id).val('');}}
	if(parseFloat(v)>parseFloat($('#1total_i').text())){$('#'+id).val(parseFloat($('#1total_i').text()));}
}
function su_pago_l(v,id){
	if(parseFloat(v)=='' || parseFloat(v)<0){$('#'+id).val(0);} if(!parseFloat(v)){if(parseFloat(v)==''){}else{$('#'+id).val('');}}
	if(parseFloat(v)>parseFloat($('#1total_l').text())){$('#'+id).val(parseFloat($('#1total_l').text()));}
}
function su_pago_p(v,id){
	if(parseFloat(v)=='' || parseFloat(v)<0){$('#'+id).val(0);} if(!parseFloat(v)){if(parseFloat(v)==''){}else{$('#'+id).val('');}}
	if(parseFloat(v)>parseFloat($('#1total_p').text())){$('#'+id).val(parseFloat($('#1total_p').text()));}
}

function historialPaciente(dataH){
	$('#mi_histo').val(dataH); var dataHV = dataH.split(';]{'); var idP = dataHV[0]; var nombreP = dataHV[1];//alert(idP);
	$("#myModal3").load("pacientes/htmls/historial_visitas.php", function(response,status,xhr){ if(status == "success"){
		$('#titulo_modal').text('HISTORIAL DE VISITAS DE '+nombreP);

		$('#facturados').click(function(e) {
			if($(this).prop('checked')==true){ $('#miFacturados').val('1'); $('#clickme_hv').click(); }
			else{ $('#miFacturados').val('0,1'); $('#clickme_hv').click(); }
		});
		$('#saldazos').click(function(e) {
			if($(this).prop('checked')==true){ $('#miSaldazos').val('1'); $('#clickme_hv').click(); }
			else{ $('#miSaldazos').val('0'); $('#clickme_hv').click(); }
		});

		var hH = $('#referencia').height()-330;
		var oTableHV = $('#dataTableHistorial').DataTable({
			"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { },
			"bProcessing" : false,"bDestroy" : true,"bAutoWidth" : false,"sScrollY": hH, "bScrollCollapse": false,
			"bSort" : false, "bStateSave": false, "bInfo": false, "bFilter": false, "bLengthChange": false,
			"aaSorting": [[1, "asc"]],"paging": false, ordering: false, "bJQueryUI": false,
			"aoColumns": [
				{ "class": "details-control","bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false },
				{ "bSortable": false }, { "bSortable": false, "bVisible":true }, { "bSortable": false, "bVisible":true }, { "bSortable": false },
				{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }
			],
			"iDisplayLength": 500, "bServerSide": true, "sAjaxSource": "pacientes/datatable-serverside/historial_visitas.php",
			"fnServerParams": function (aoData, fnCallback) {
				var idPaciente = idP; aoData.push(  {"name": "idPac", "value": idPaciente } );
				var facturado = $('#miFacturados').val(); aoData.push(  {"name": "facturado", "value": facturado } );
				var zaldazos = $('#miSaldazos').val(); aoData.push(  {"name": "zaldazos", "value": zaldazos } );
			},
			"sDom": '<"filtroCt"><"infoCt"><"data_tCt"t>', "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page",
				"sZeroRecords": "EL PACIENTE NO CUENTA CON HISTORIAL DE VISITAS", "sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered": "<br/>VISITAS: _MAX_", "sSearch": "BUSCAR" }
		});$('#clickme_hv').click(function(e) { oTableHV.draw(); });

		// Array to track the ids of the details displayed rows
		var detailRows = [];

		$('#dataTableHistorial tbody').on( 'click', 'tr td.details-control', function () {
			var tr = $(this).closest('tr');
			var row = oTableHV.row( tr );
			var idx = $.inArray( tr.attr('id'), detailRows );

			if ( row.child.isShown() ) {
				tr.removeClass( 'details' );
				row.child.hide();
				// Remove from the 'open' array
				detailRows.splice( idx, 1 );
			}
			else {
				tr.addClass( 'details' );
				var datoDHV ={ ref:row.data()[20] }
				$.post('pacientes/datatable-serverside/datosAdicionalesHV.php',datoDHV).done(function(data){ row.child( format( data ) ).show(); });
				// Add to the 'open' array
				if ( idx === -1 ) { detailRows.push( tr.attr('id') ); }
			}
		} );
		// On each draw, loop over the `detailRows` array and show any child rows
		oTableHV.on( 'draw', function(){ $.each( detailRows, function(i, id){ $('#'+id+' td.details-control').trigger( 'click' ); }); });

		$('#myModal3').modal('show');
		$('#myModal3').on('shown.bs.modal', function (e){ });
		$('#myModal3').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal3").empty(); });
	} });//fin de load
}

function format(d){ return d; }
function CancelItem(id, ref, concept){ //id es el id de vc
	swal({
	  title: "ELIMINAR EL CONCEPTO", text: "Esta acción no se puede deshacer", type: "warning", showCancelButton: true, confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Eliminar", cancelButtonText: "Cancelar", closeOnConfirm: false
	},
	function(){
		var datos = {id:id}
		$.post('pacientes/files-serverside/eliminarItemOV.php',datos).done(function( data ) { if (data==1){
			$('#clickme_hv').click();
			swal({ title: "", type: "success", text: "El concepto ha sido eliminado.", timer: 1800, showConfirmButton: false });
		} else{alert(data);} });
	});
}

function ubicacion(ubi){
	var geocoder = new google.maps.Geocoder(), address = ubi;

	geocoder.geocode({'address': address}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {//alert(results[0].address_components);
			if(results[0].address_components[6]){$('#cp_us').val(results[0].address_components[6].long_name);}
			var l_n = String(results[0].geometry.location), l_n1 = l_n.split(',');
			var lat1 = l_n1[0].split('('), lon1 = l_n1[1].split(')'); //alert(lat1[1]+', '+lon1[0]);

			var map = new google.maps.Map(document.getElementById('map'), {
				center: new google.maps.LatLng(lat1[1], lon1[0]), zoom: 16, scrollwheel: false //Cuautla :3
			});
			marker = new google.maps.Marker({
				map:map, draggable: true, animation: google.maps.Animation.DROP, position: new google.maps.LatLng(lat1[1], lon1[0])
			});

			$('#lat_us').text(redondear(lat1[1],4)); $('#lati_ud').val(lat1[1]);
			$('#lon_us').text(redondear(lon1[0],4)); $('#long_ud').val(lon1[0]);

			marker.addListener('dragend', function(){
				map.panTo(marker.getPosition());
				var markerLatLng = marker.getPosition();
				$('#lat_us').text(redondear(markerLatLng.lat(),4)); $('#lati_ud').val(markerLatLng.lat());
				$('#lon_us').text(redondear(markerLatLng.lng(),4)); $('#long_ud').val(markerLatLng.lng());
			});
		} //else { alert('Geocode was not successful for the following reason: ' + status); }
	});
}
function cancelar_ov(idVC,nombreP,refe){
	$('#pacienteCancelOV').text(nombreP); $('#refCancelOV').text(refe);
	swal({
	  title: "CANCELAR LA ORDEN DE VENTA "+refe, text: "¿Estás seguro de cancelar la orden?", type: "warning",
	  showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Cancelarla",
	  cancelButtonText: "Cerrar", closeOnConfirm: false, showLoaderOnConfirm: true
	},
	function(){
	  var datosCOV = {refe:refe}
		$.post('pacientes/files-serverside/cancelarOV.php',datosCOV).done(function( data ) {
			if (data==1){ window.setTimeout(function(){$('#clickme_hv, #clickme').click();},300);
				swal({ title: "", type: "success", text: "La orden de venta se ha cancelado", timer: 2000, showConfirmButton: false }); return;
			} else{alert(data);}
		});
	});
}

function documentos(id_p, nombre_p){
	$("#myModal5").load("pacientes/htmls/documentos.php", function(response,status,xhr){ if(status == "success"){
		$('#titulo_modal').text('DOCUMENTOS DEL PACIENTE '+nombre_p); $('#idp_doc').val(id_p);

		$('#a_t_d_1').click(function(e){
			$('#clickmeD_1').click(); $('#titulo_modal').text('DOCUMENTOS DEL PACIENTE '+nombre_p);
			$('#encabezado_documento').text('PARA CARGAR UN NUEVO DOCUMENTO, INGRESE SU TÍTULO Y SELECCIONE EL ARCHIVO A CARGAR.');
			$('#titulo_docu').text('* Título del documento'); $('#fileupload_foto').attr('accept', 'application/pdf');
		});
		$('#a_t_d_2').click(function(e){
			$('#clickmeD_2').click(); $('#titulo_modal').text('ESTUDIOS DE LABORATORIO DEL PACIENTE '+nombre_p);
			$('#encabezado_documento').text('PARA CARGAR UN NUEVO ESTUDIO DE LABORATORIO, INGRESE EL NOMBRE DEL ESTUDIO Y SELECCIONE EL ARCHIVO A CARGAR.');
			$('#titulo_docu').text('* Nombre del estudio'); $('#fileupload_foto').attr('accept', 'application/pdf');
		});
		$('#a_t_d_3').click(function(e){
			$('#clickmeD_3').click(); $('#titulo_modal').text('ESTUDIOS DE IMAGEN DEL PACIENTE '+nombre_p);
			$('#encabezado_documento').text('PARA CARGAR UN NUEVO ESTUDIO DE IMAGEN, INGRESE EL NOMBRE DEL ESTUDIO Y SELECCIONE EL ARCHIVO A CARGAR.');
			$('#titulo_docu').text('* Nombre del estudio'); $('#fileupload_foto').attr('accept', 'application/pdf');
		});
		$('#a_t_d_4').click(function(e){
			$('#clickmeD_4').click(); $('#titulo_modal').text('NOTAS MÉDICAS DEL PACIENTE '+nombre_p);
			$('#encabezado_documento').text('PARA CARGAR UNA NUEVA NOTA MÉDICA, INGRESE EL NOMBRE DE LA NOTA Y SELECCIONE EL ARCHIVO A CARGAR.');
			$('#titulo_docu').text('* Nombre de la nota'); $('#fileupload_foto').attr('accept', 'application/pdf');
		});
		$('#a_t_d_5').click(function(e){
			$('#clickmeD_5').click(); $('#titulo_modal').text('RECETAS DEL PACIENTE '+nombre_p);
			$('#encabezado_documento').text('PARA CARGAR UNA NUEVA RECETA, INGRESE EL NOMBRE DE LA RECETA Y SELECCIONE EL ARCHIVO A CARGAR.');
			$('#titulo_docu').text('* Nombre de la receta'); $('#fileupload_foto').attr('accept', 'application/pdf');
		});
		$('#a_t_d_7').click(function(e){
			$('#clickmeD_7').click(); $('#titulo_modal').text('IMÁGENES DEL PACIENTE '+nombre_p);
			$('#encabezado_documento').text('PARA CARGAR UNA NUEVA IMAGEN, INGRESE EL TÍTULO DE LA IMAGEN Y TÓMELA O CÁRGUELA.');
			$('#titulo_docu').text('* Título de la imagen'); $('#fileupload_foto').attr('accept', 'image/jpg, image/jpeg, image/png');
		});

		$('#titulo_doc').keyup(function(e) {
			if($(this).val()!=''){ $('#btn_add_doc').removeClass('disabled'); }else{ $('#btn_add_doc').addClass('disabled'); }
		});
		$('#btn_add_doc').click(function(e) { if($('#titulo_doc').val()!=''){ $('#fileupload_foto').click(); }else{ } });

		//Para el upload
		'use strict';
		// Change this to the location of your server-side upload handler:
		var ko = $('#id_user').val();
		var url = window.location.hostname === 'blueimp.github.io' ?
					'//jquery-file-upload.appspot.com/' : 'pacientes/documentos/index.php?idU='+ko+'&idP='+id_p+'&nombreD='+escape($('#titulo_doc').val());
		$('#fileupload_foto').fileupload({
			url: url, dataType: 'json',
			submit:function (e, data) {
				if($('#titulo_doc').val()!=''){
					$.each(data.files, function (index, file) {
						var input = $('#titulo_doc'); var fecha_doc = $('#fecha_doc').val();
						data.formData = {titulo_d: input.val(), ext_d:file.name.split('.')[1], tipo_d:$('#tipo_doc').val(), fecha_doc:fecha_doc };
					});
				}else{return false;}
			},
			progress: function(e, data){
				swal({title:"",type:"",text:"Cargando...",showConfirmButton:false});
				var progress = parseInt(data.loaded / data.total * 100, 10);$('#progress .bar').css( 'width', progress + '%' );
			},
			done: function (e, data) {
				swal({title:"",type:"success",text:"El documento se ha cargado correctamente!",timer:1800,showConfirmButton:false});
				$('#clickmeD_1,#clickmeD_2,#clickmeD_3,#clickmeD_4,#clickmeD_5,#clickmeD_7').click(); cancel_subir_doc();
			}
		}); //Para el upload

		$('#myModal5').modal('show');
		$('#myModal5').on('shown.bs.modal', function (e){
			var hH = $('#referencia').height()*0.5;

			var oTableD1 = $('#dataTable_d1').DataTable({
				serverSide: true,"sScrollY": hH, ordering: false, searching: true, scrollCollapse: false, destroy:true,
				"scrollX":false, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:false,
				"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
				"sDom": '<"">r<""t><""S><"">p',
				deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/datatable-serverside/documentos_pacientes.php",
				"fnServerParams": function (aoData, fnCallback) {
					aoData.push({"name": "id_p", "value": id_p } ); aoData.push({"name": "tipo", "value": 1 } ); aoData.push({"name": "que", "value": 'DOCUMENTO' } );
				},
				"oLanguage": {
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "DOCUMENTOS FILTRADOS: _END_",
					"sInfoEmpty": "NINGUN DOCUMENTO FILTRADO.", "sInfoFiltered": " TOTAL DE DOCUMENTOS: _MAX_", "sSearch": "",
					"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>",
					"sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
				},"iDisplayLength": 50, paging: true,
			}); $('#clickmeD_1').click(function(e){ oTableD1.draw(); });
			//para los fintros individuales por campo de texto
			oTableD1.columns().every( function () {
				var that = this; $('input', this.footer()).on('keyup change',function(){ if(that.search() !== this.value){that .search(this.value) .draw();} });
			});
			//fin filtros individuales por campo de texto

			var oTableD2 = $('#dataTable_d2').DataTable({
				serverSide: true,"sScrollY": hH, ordering: false, searching: true, scrollCollapse: false, destroy:true,
				"scrollX":false, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:false,
				"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
				"sDom": '<"">r<""t><""S><"">p',
				deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/datatable-serverside/documentos_pacientes.php",
				"fnServerParams": function (aoData, fnCallback) {
					aoData.push({"name": "id_p", "value": id_p } ); aoData.push({"name": "tipo", "value": 2 } );
					aoData.push({"name": "que", "value": 'ESTUDIO LABORATORIO' } );
				},
				"oLanguage": {
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "ESTUDIOS FILTRADOS: _END_",
					"sInfoEmpty": "NINGUN ESTUDIO FILTRADO.", "sInfoFiltered": " TOTAL DE ESTUDIOS: _MAX_", "sSearch": "",
					"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>",
					"sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
				},"iDisplayLength": 50, paging: true,
			}); $('#clickmeD_2').click(function(e){ oTableD2.draw(); });
			//para los fintros individuales por campo de texto
			oTableD2.columns().every( function () {
				var that = this; $('input', this.footer()).on('keyup change',function(){ if(that.search() !== this.value){that .search(this.value) .draw();} });
			});
			//fin filtros individuales por campo de texto

			var oTableD3 = $('#dataTable_d3').DataTable({
				serverSide: true,"sScrollY": hH, ordering: false, searching: true, scrollCollapse: false, destroy:true,
				"scrollX":false, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:false,
				"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
				"sDom": '<"">r<""t><""S><"">p',
				deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/datatable-serverside/documentos_pacientes.php",
				"fnServerParams": function (aoData, fnCallback) {
					aoData.push({"name": "id_p", "value": id_p } ); aoData.push({"name": "tipo", "value": 3 } );
					aoData.push({"name": "que", "value": 'ESTUDIO IMAGEN' } );
				},
				"oLanguage": {
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "ESTUDIOS FILTRADOS: _END_",
					"sInfoEmpty": "NINGUN ESTUDIO FILTRADO.", "sInfoFiltered": " TOTAL DE ESTUDIOS: _MAX_", "sSearch": "",
					"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>",
					"sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
				},"iDisplayLength": 50, paging: true,
			}); $('#clickmeD_3').click(function(e){ oTableD3.draw(); });
			//para los fintros individuales por campo de texto
			oTableD3.columns().every( function () {
				var that = this; $('input', this.footer()).on('keyup change',function(){ if(that.search() !== this.value){that .search(this.value) .draw();} });
			});
			//fin filtros individuales por campo de texto

			var oTableD4 = $('#dataTable_d4').DataTable({
				serverSide: true,"sScrollY": hH, ordering: false, searching: true, scrollCollapse: false, destroy:true,
				"scrollX":false, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:false,
				"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
				"sDom": '<"">r<""t><""S><"">p',
				deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/datatable-serverside/documentos_pacientes.php",
				"fnServerParams": function (aoData, fnCallback) {
					aoData.push({"name": "id_p", "value": id_p } ); aoData.push({"name": "tipo", "value": 4 } );
					aoData.push({"name": "que", "value": 'NOTA MEDICA' } );
				},
				"oLanguage": {
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "NOTAS FILTRADAS: _END_",
					"sInfoEmpty": "NINGUNA NOTA FILTRADA.", "sInfoFiltered": " TOTAL DE NOTAS: _MAX_", "sSearch": "",
					"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>",
					"sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
				},"iDisplayLength": 50, paging: true,
			}); $('#clickmeD_4').click(function(e){ oTableD4.draw(); });
			//para los fintros individuales por campo de texto
			oTableD4.columns().every( function () {
				var that = this; $('input', this.footer()).on('keyup change',function(){ if(that.search() !== this.value){that .search(this.value) .draw();} });
			});
			//fin filtros individuales por campo de texto

			var oTableD5 = $('#dataTable_d5').DataTable({
				serverSide: true,"sScrollY": hH, ordering: false, searching: true, scrollCollapse: false, destroy:true,
				"scrollX":false, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:false,
				"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
				"sDom": '<"">r<""t><""S><"">p',
				deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/datatable-serverside/documentos_pacientes.php",
				"fnServerParams": function (aoData, fnCallback) {
					aoData.push({"name": "id_p", "value": id_p } ); aoData.push({"name": "tipo", "value": 5 } );
					aoData.push({"name": "que", "value": 'RECETA' } );
				},
				"oLanguage": {
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "RECETAS FILTRADAS: _END_",
					"sInfoEmpty": "NINGUNA RECETA FILTRADA.", "sInfoFiltered": " TOTAL DE RECETAS: _MAX_", "sSearch": "",
					"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>",
					"sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
				},"iDisplayLength": 50, paging: true,
			}); $('#clickmeD_5').click(function(e){ oTableD5.draw(); });
			//para los fintros individuales por campo de texto
			oTableD5.columns().every( function () {
				var that = this; $('input', this.footer()).on('keyup change',function(){ if(that.search() !== this.value){that .search(this.value) .draw();} });
			});
			//fin filtros individuales por campo de texto

			var oTableD7 = $('#dataTable_d7').DataTable({
				serverSide: true,"sScrollY": hH, ordering: false, searching: true, scrollCollapse: false, destroy:true,
				"scrollX":false, "fnFooterCallback":function(nRow, aaData, iStart, iEnd, aiDisplay){}, scroller:false, responsive:false,
				"aoColumns":[{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true},{"bVisible":true}],
				"sDom": '<"">r<""t><""S><"">p',
				deferRender: true, select: false, "processing": false, "sAjaxSource": "pacientes/datatable-serverside/documentos_pacientes.php",
				"fnServerParams": function (aoData, fnCallback) {
					aoData.push({"name": "id_p", "value": id_p } ); aoData.push({"name": "tipo", "value": 7 } );
					aoData.push({"name": "que", "value": 'IMAGEN' } );
				},
				"oLanguage": {
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "IMÁGENES FILTRADAS: _END_",
					"sInfoEmpty": "NINGUNA IMAGEN FILTRADA.", "sInfoFiltered": " TOTAL DE IMÁGENES: _MAX_", "sSearch": "",
					"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>",
					"sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
				},"iDisplayLength": 100, paging: true,
			}); $('#clickmeD_7').click(function(e){ oTableD7.draw(); });
			//para los fintros individuales por campo de texto
			oTableD7.columns().every( function () {
				var that = this; $('input', this.footer()).on('keyup change',function(){ if(that.search() !== this.value){that .search(this.value) .draw();} });
			});
			//fin filtros individuales por campo de texto
		});
		$('#myModal5').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal5").empty(); });
	}});
}

function subir_doc(tipo){
	$('#panel_cargar_d1').removeClass('hidden'); $('.no_cargar_d').addClass('hidden');

	if(tipo==1){ $('#tipo_doc').val('DOCUMENTO'); } else if(tipo==2){ $('#tipo_doc').val('ESTUDIO LABORATORIO'); }
	else if(tipo==3){$('#tipo_doc').val('ESTUDIO IMAGEN');} else if(tipo==4){$('#tipo_doc').val('NOTA MEDICA');}
	else if(tipo==5){$('#tipo_doc').val('RECETA');} else if(tipo==7){$('#tipo_doc').val('IMAGEN');} else{$('#tipo_doc').val('DESCONOCIDO');}
}
function cancel_subir_doc(){
	$('#panel_cargar_d1').addClass('hidden'); $('.no_cargar_d').removeClass('hidden'); $('#titulo_doc, #tipo_doc').val(''); $('#btn_add_doc').addClass('disabled');
}
function ver_documento(id_doc, datos_doc, extension_d, time){
	$('.no_document').addClass('hidden'); $('.si_document').removeClass('hidden'); $('#datos_docu').text(datos_doc);
	var widi = $('#myModal5').width()*0.6;
	if(extension_d=='pdf'){
		x='pacientes/documentos/files/'+id_doc+'.pdf';
		var h=$('#referencia').height()-$('#nav-header').height()-$('#my_footer').height();
		$('#mi_documento').html('<a class="media" href=""> </a>'); $('a.media').media({width:790, height:h-136, src:x});
	}else{
		x='pacientes/documentos/files/'+id_doc+'.'+extension_d+'?'+time;
		$('#mi_documento').html('<img src='+x+' style="max-width:'+widi+'px; border:3px solid white; border-radius:4px; background-color:rgba(255, 255, 255, 1);">');
	}
}
function eliminar_documento(id_doc, nombre_doc, extension_d){//alert(extension_d);
	swal({
	  title: "Eliminar documento", text: "¿ESTÁ SEGURO QUE DESEA ELIMINAR EL DOCUMENTO "+nombre_doc+"?", type: "warning", showCancelButton: true,
	  confirmButtonColor: "#DD6B55", confirmButtonText: "Eliminar", cancelButtonText: "Cancelar", closeOnConfirm: false, showLoaderOnConfirm: true
	},
	function(isConfirm){
		if (isConfirm) {
			var datos = {id:id_doc, extension:extension_d}
			$.post('pacientes/files-serverside/eliminarDocumento.php',datos).done(function(data){
				if (data==1){ $('#clickmeD_1,#clickmeD_2,#clickmeD_3,#clickmeD_4,#clickmeD_5,#clickmeD_7').click();
					swal({title:"",type:"",text:"El documento se ha eliminado",timer:1800,showConfirmButton:false});
				}else{alert(data);}
			});
		}
	});
}
function cerrar_doc(){ $('.no_document').removeClass('hidden'); $('.si_document').addClass('hidden'); }

function initMap() { }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbPi4G3-wjEbEt_77OmTBhxWvmR23ds9Q&signed_in=true&callback=initMap"
	async defer>
</script>
