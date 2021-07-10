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
    
    <title>SISTEMA - FICHA DE ENFERMERÍA</title>
    
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
	<script src='c3/c3.min.js'></script>
    <script src='c3/d3/d3.min.js'></script>
    <!-- Input Mask-->
    <script src="jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
	<!-- Typehead -->
    <script src="js/plugins/typehead/bootstrap3-typeahead.min.js"></script>
	<!-- Toastr script -->
    <script src="js/plugins/toastr/toastr.min.js"></script>
    <!-- Mis funciones -->
    <script src="funciones/js/inicio.js"></script>
    <script src="funciones/js/caracteres.js"></script>
    <script src="funciones/js/calcula_edad.js"></script>
    <script src="funciones/js/stdlib.js"></script>
    <script src="funciones/js/bs-modal-fullscreen.js"></script>
    
	<!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
	
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
	<link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
	<link href="c3/c3.css" rel="stylesheet">
</head>
<?php include_once 'partes/header.php'; ?>
<!-- Contenido -->
<div id="div_tabla_pacientes" class="table-responsive" style="border:1px none red; vertical-align:top; margin-top:-9px;">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id="dataTablePrincipal" class="table table-hover table-striped dataTables-example dataTable table-condensed" role="grid"> 
<thead id="cabecera_tBusquedaPrincipal">
  <tr role="row" class="bg-primary">
    <th id="clickme" style="vertical-align:middle;" width="1%">#</th>
    <th style="vertical-align:middle;" width="1%">REFERENCIA</th>
    <th style="vertical-align:middle;">PACIENTE</th>
    <th style="vertical-align:middle;">CONCEPTO</th>
    <th style="vertical-align:middle;">MÉDICO</th>
    <th style="vertical-align:middle;" width="1%" nowrap>SUCURSAL</th>
    <th style="vertical-align:middle;" width="1%">FICHA</th>
    <th style="vertical-align:middle;" nowrap width="1%">FECHA/HORA</th>
    <th style="vertical-align:middle;" nowrap width="1%">TIEMPO ESPERA</th>
  </tr>
</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
	<tfoot> <tr class="bg-primary">
            <th></th>
            <th><input type="text" class="form-control input-sm" placeholder="Referencia" style="width:99%;"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Paciente" style="width:99%;"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Concepto" style="width:99%;"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Médico" style="width:99%;"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Sucursal" style="width:99%;"/></th>
            <th></th>
            <th></th>
            <th></th>
    </tr> </tfoot>
</table>
</div>
<div id="auxiliar" class="hidden"></div> <div id="auxiliar1" class="hidden"></div>
<!-- FIN Contenido -->  
<?php include_once 'partes/footer.php'; ?>

<script>
$(document).ready(function(e) {
	//breadcrumb
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li class="active"><strong>FICHA DE ENFERMERÍA</strong></li>');
	
	$('#my_search').removeClass('hidden'); $.fn.datepicker.defaults.autoclose = true;
	
	var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-149-$('#breadc').height();
	var oTableP = $('#dataTablePrincipal').DataTable({
		serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true,
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: false, responsive: true,
		"aoColumns": [
			{"bVisible":true}, {"bVisible":true},{"bVisible": true }, {"bVisible":true}, {"bVisible":true},
			{"bVisible":true}, {"bVisible":true}, {"bVisible":true}, {"bVisible":true}
		],
		"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"S><"proc"p>', deferRender: true, select: false, "processing": false, 
		"sAjaxSource": "enfermeria/datatable-serverside/ficha_enfermeria.php?idU="+$('#id_user').val(),
		"fnServerParams": function (aoData, fnCallback) { 
			var nombre = $('#top-search').val();
			var de = $('#fechaDe').val()+' 00:00:00'; var a = $('#fechaA').val()+' 23:59:59';
			var accesoU = $('#acc_user').val(); var idU = $('#id_user').val();
			
			aoData.push( {"name": "nombre", "value": nombre } );
			aoData.push(  {"name": "min", "value": de } ); 
			aoData.push(  {"name": "max", "value": a } );
			aoData.push(  {"name": "accesoU", "value": accesoU } );
			aoData.push(  {"name": "idU", "value": idU } );
		},
		"oLanguage": {
			"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", 
			"sInfo": "PACIENTES FILTRADOS: _END_",
			"sInfoEmpty": "NINGÚN PACIENTE FILTRADO.", "sInfoFiltered": " TOTAL DE PACIENTES: _MAX_", "sSearch": "",
			"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
		},"iDisplayLength": 50000, paging: false,
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
	
	$('.infoPrincipal').append('<div id="divRangoFechas" style="text-align:left;"> <table width="100%" border="0" cellpadding="4" cellspacing="2" style="color:black; float:left;"> <tr> <td width="10px">De &nbsp;</td> <td width="1%"> <input name="fechaDe" class="fechas form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="width:100px;" type="text" id="fechaDe" value="<?php echo date("Y-m-d"); ?>" readonly > </td> <td width="10px">&nbsp; A &nbsp;</td> <td width="1%"> <input style="width:100px;" name="fechaA" type="text" class="fechas form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" id="fechaA" value="<?php echo date("Y-m-d"); ?>" readonly> </td> <td id="rangosFechas">&nbsp; <input type="radio" class="rad" id="radio1" name="radio" /><label for="radio1">&nbsp; Hoy &nbsp;</label> <input type="radio" class="rad" id="radio2" name="radio" /><label for="radio2">&nbsp; Todos &nbsp;</label> </td> </tr> </table> </div>');
	
	$('#radio1').click(function(e){ $('#fechaDe').val('<?php echo date("Y-m-d"); ?>');$('#fechaA').val('<?php echo date("Y-m-d"); ?>'); oTableP.draw(); });
	
	$('#radio2').click(function(e){ $('#fechaDe').val('2000-01-01'); $('#fechaA').val('<?php echo date("Y-m-d"); ?>'); oTableP.draw(); });
	
	$('#fechaDe').on('changeDate', function(e) { oTableP.draw(); }); $("#fechaA").on('changeDate', function(e) { oTableP.draw(); });
	
	setInterval(function(){$('#clickme').click();}, 45000);
	
	toastr.options = {
	  "closeButton":true,"debug":false,"progressBar":false,"preventDuplicates":true,"positionClass":"toast-top-right","onclick":null,"showDuration":"400",
	  "hideDuration":"1000","timeOut":"2000","extendedTimeOut":"1000","showEasing":"swing","hideEasing":"linear","showMethod": "fadeIn", "hideMethod": "fadeOut"
	}
});

function ficha_enfermeria(idP,idC,id_s){
	var datosCon = {idP:idP, idC:idC}
	$.post('enfermeria/files-serverside/datos_ficha.php',datosCon).done(function(data){var datos=data.split(';*-');
		$("#myModal").load('enfermeria/htmls/ficha_enfermeria.php',function(response,status,xhr){ if(status=="success"){
			var nv = new Date(); var aleatory = nv.format('Y-m-d-H-i-s-u').substring(0,22);
			
			$('#titulo_modal').text('FICHA DE ENFERMERÍA | '+datos[0]+' | FECHA DE INSCRIPCIÓN: '+datos[25]);
			$('#idUsuario_hc').val($('#id_user').val()); $('#id_cons').val(idC); $('#idPaciente_c').val(idP);

			//bloqueamos los campos que no son necesarios mantener abiertos para edición
			$('.sv').prop('readonly','readonly'); 
			
			if(datos[13]!=''){ $('#fecha_usv').text(datos[13]); $('#usuario_usv').text(datos[23]); }else{$('#usuario_usv, #fecha_usv').text('-');}
			
			$('#tsanguineo_p').load('enfermeria/genera/tipos_sanguineos.php',function(response,status,xhr){if(status=="success"){$('#tsanguineo_p').val(datos[36]);}});
			
			$('#parentesco_c_p').load('enfermeria/genera/parentescos.php',function(response,status,xhr){if(status=="success"){ $('#parentesco_c_p').val(datos[38]); }});
			$('#religion_p').load('enfermeria/genera/religion.php',function(response,status,xhr){if(status=="success"){ $('#religion_p').val(datos[40]); }});
			$('#escolaridad_p').load('enfermeria/genera/escolaridad.php',function(response,status,xhr){if(status=="success"){ $('#escolaridad_p').val(datos[41]); }});
			$('#edo_civil_p').load('enfermeria/genera/edo_civil.php',function(response,status,xhr){if(status=="success"){ $('#edo_civil_p').val(datos[54]); }});
			$('#ocupacion_p').typeahead({
				source:  function (query, process) {
					return $.get('pacientes/files-serverside/genera_ocupaciones.php',{query:query}, function(data){ //alert(data.name);
						console.log(data); data = $.parseJSON(data); return process(data);
					});
				}
			}); var $input = $("#ocupacion_p");
			
			$input.change(function() {
			  var current = $input.typeahead("getActive");
			  if (current) {
				// Some item from your model is active!alert('algo');
				if (current.name == $input.val()) {
				  // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
					$('#id_ocupacion').val(current.id); save_ocupacion(idP,$('#id_ocupacion').val());
				} else {
				  // This means it is only a partial match, you can either add a new item or take the active if you don't want new items
					toastr.error('','Favor de seleccionar un elemento de la lista de ocupaciones.');
				}
			  } else {
				// Nothing is active so it is a new value (or maybe empty value)alert('nada');
			  }
			});
			
			$('#edad_p').text(datos[1]); $('#sexo_p').text(datos[2]); $('#fnac_p').text(datos[22]); $('#a_paterno').text(datos[26]); $('#a_materno').text(datos[27]);
			$('#nombre_p').text(datos[28]); $('#entidad_nac').text(datos[29]); $('#telefono_p').text(datos[30]); $('#calle_numero_d_p').text(datos[31]);
			$('#colonia_d_p').text(datos[32]); $('#localidad_d_p').text(datos[33]); $('#municipio_d_p').text(datos[34]); $('#estado_d_p').text(datos[35]);
			$('#contacto_p').val(datos[37]); $('#telefono_c_p').val(datos[39]); $('#ocupacion_p').val(datos[42]); //$('#email_p').val(datos[43]);
			$('#apgar_p').val(datos[44]); $('#tamiz_p').val(datos[45]); $('#alergias_p').val(datos[46]); $('#gluc_p').val(datos[47]); $('#notas_sv').val(datos[48]);
			$('#talla_p').val(datos[3]); $('#peso_p').val(datos[4]); $('#imc_p').text(datos[5]); $('#temp_p').val(datos[11]); $('#oxi_p').val(datos[17]);
			$('#t_p').val(datos[7]); $('#a_p').val(datos[8]); $('#fc_p').val(datos[9]); $('#fr_p').val(datos[10]); $('#pa_p').val(datos[6]);
			$('#pc_p').val(datos[50]); $('#pt_p').val(datos[51]); $('#pie_p').val(datos[52]); $('#id_ocupacion').val(datos[53]);
			
			$('#tsanguineo_p').change(function(){ if($(this).val()!=''){save_tsanguineo(idP, $(this).val());}else{} });
			
			$('#form-uno').validator().on('submit', function(e){
			  if (e.isDefaultPrevented()) { // handle the invalid form...
				  toastr.error('','Favor de indicar los 3 campos del contacto.');
			  } else { // everything looks good!
				e.preventDefault(); 
				var datos = {id_p:idP, contacto:$('#contacto_p').val(),parentesco:$('#parentesco_c_p').val(),telefono:$('#telefono_c_p').val()}
				$.post('enfermeria/files-serverside/salvar_contacto_e.php',datos).done(function(data){
					if (data==1){ toastr.success('','Los datos del contacto de emergencia se actualizaron.'); } else{alert(data);}
				});
			  }
			});
			
			$('#religion_p').change(function(){ if($(this).val()!=''){save_religion(idP, $(this).val());}else{} });
			$('#escolaridad_p').change(function(){ if($(this).val()!=''){save_escolaridad(idP, $(this).val());}else{} });
			
			$('#form-tres').validator().on('submit', function(e){
			  if (e.isDefaultPrevented()) { // handle the invalid form...
				  toastr.error('','Favor de indicar las alergias del paciente.');
			  } else { // everything looks good!
				e.preventDefault(); 
				var datos = {id_p:idP, alergias:$('#alergias_p').val()}
				$.post('enfermeria/files-serverside/save_alergias.php',datos).done(function(data){
					if (data==1){ toastr.success('','Las alergias del paciente han sido actualizadas.'); } else{alert(data);}
				});
			  }
			});
			
			$('#apgar_p').change(function(){ if($(this).val()!=''){save_apgar(idP, $(this).val());}else{} });
			$('#tamiz_p').change(function(){ if($(this).val()!=''){save_tamiz(idP, $(this).val());}else{} });
			$('#edo_civil_p').change(function(){ if($(this).val()!=''){save_edo_civil(idP, $(this).val());}else{} });
			
			$('#btn-tomar-sv').click(function(){ tomar_signos_vitales(idP,idC,id_s,datos[0],datos[1],datos[2]); });
			
			//Cargamos los datos de los Signos Vitales
			cargar_todo_signos_vitales(idP,idC);
			
			$('#tAntece').load('enfermeria/genera/antecedentes.php?id_p='+idP,function(response,status,xhr){ if(status=='success'){
				$('.read_oc').each(function(index,value){$(this).attr('disabled','disabled');});
				$('.read_ot').each(function(index,value){$(this).attr('readonly','readonly');});
				
				$('.hide_p_a').each(function(index, value){ var n_index = index+1; if($(this).val()==1){ $('#check_p_a'+n_index).prop("checked", true); } });
				//$('.hide_p_a_a').each(function(index, value){ var n_index = index+1; if($(this).val()==1){ $('#check_p_a_a'+n_index).prop("checked", true); } });
				$('.hide_f_a').each(function(index, value){ var n_index = index+1; if($(this).val()==1){ $('#check_f_a'+n_index).prop("checked", true); } });
			
				$('.a_personal').click(function(){
					if($(this).prop("checked") == true){
						//$('#check_p_a_a'+$(this).val()).removeAttr('disabled');
						$('#ta_n_p_a'+$(this).val()).removeAttr('disabled'); $('#hide_p_a'+$(this).val()).val(1);
					}
					else if($(this).prop("checked") == false){
						//$('#check_p_a_a'+$(this).val()).attr('disabled','disabled'); $('#check_p_a_a'+$(this).val()).prop("checked", false);
						$('#ta_n_p_a'+$(this).val()).attr('disabled', 'disabled'); $('#ta_n_p_a'+$(this).val()).val('');
						$('#hide_p_a'+$(this).val()).val(0); //$('#hide_p_a_a'+$(this).val()).val(0);
					}
				});
				/*$('.a_personal_a').click(function(){
					if($(this).prop("checked") == true){ $('#hide_p_a_a'+$(this).val()).val(1); }
					else if($(this).prop("checked") == false){ $('#hide_p_a_a'+$(this).val()).val(0); }
				});*/
				$('.a_familiar').click(function(){
					if($(this).prop("checked") == true){ $('#hide_f_a'+$(this).val()).val(1); $('#ta_n_f_a'+$(this).val()).removeAttr('disabled'); }
					else if($(this).prop("checked") == false){
						$('#hide_f_a'+$(this).val()).val(0); $('#ta_n_f_a'+$(this).val()).attr('disabled', 'disabled'); $('#ta_n_f_a'+$(this).val()).val('');
					}
				});
				
				$('#btn_save_antecedentes').click(function(){
					var contador = 0;
					$('.hide_p_a').each(function(index, value){ if($(this).val()==1){contador++;} });
					$('.hide_f_a').each(function(index, value){ if($(this).val()==1){contador++;} });
					if(contador<1){
						toastr.error('','Nada que guardar.');
					}else{
						swal({
							title: "¿Guardar los antecedentes?", type: "warning", text: "Ten en cuenta que no se podrán realizar cambios.", showCancelButton: true, confirmButtonText: "Guardar", cancelButtonText: "Cancelar", closeOnConfirm: false, showLoaderOnConfirm: true
						},
						function(isConfirm){
							if(isConfirm){
								$('.hide_p_a').each(function(index, value){ var n_index = index+1;
									var datos = {id_p:idP, antecedente:$("#name_a"+n_index).text(), personal:$('#hide_p_a'+n_index).val(),nota_p:$('#ta_n_p_a'+n_index).val(),familiar:$('#hide_f_a'+n_index).val(),nota_f:$('#ta_n_f_a'+n_index).val(),aleatorio:aleatory}
									$.post('enfermeria/files-serverside/save_antecedentes.php',datos).done(function(data){
										if(data == 1){ toastr.success('','Los antecedentes del paciente han sido guardados.'); }else{alert(data);}
									});
									$('#check_p_a'+n_index).attr('disabled', 'disabled'); //$('#check_p_a_a'+n_index).attr('disabled', 'disabled');
									$('#check_f_a'+n_index).attr('disabled', 'disabled'); $('#ta_n_p_a'+n_index).attr('disabled', 'disabled');
									$('#ta_n_f_a'+n_index).attr('disabled', 'disabled');
								});
								$('#tr_btn_save_ante, #btn_save_antecedentes').remove(); swal.close();
							}else{}
						});
					}
				});
				
			} });
			$('#tEBV').load('enfermeria/genera/cuadro_basico_vacunacion.php?id_p='+idP,function(response,status,xhr){ if(status=='success'){
				$('.hide_c_v').each(function(index, value){ var n_index = index+1; 
					if($(this).val()==1){ $('#check_v'+n_index).prop("checked", true); $('#fecha_av'+n_index).removeAttr('disabled'); } 
				});
				
				$('.v_check').click(function(){
					if($(this).prop("checked") == true){ var ind = $(this).val();
						$('#fecha_av'+$(this).val()).removeAttr('disabled'); $('#hide_c_v'+$(this).val()).val(1);
						$('.date_fv').datepicker('hide'); window.setTimeout(function(){ $('#fecha_av'+ind).datepicker('show'); },300);
					}
					else if($(this).prop("checked") == false){ var ind = $(this).val();
						$('#fecha_av'+$(this).val()).attr('disabled', 'disabled'); $('#fecha_av'+$(this).val()).val('');
						$('#hide_c_v'+$(this).val()).val(0); $('#hide_p_a_a'+$(this).val()).val(0); $('#fecha_av'+ind).datepicker('hide');
					}
				});
				
				$('.v_checka').click(function(){
					if($(this).prop("checked") == true){ }
					else if($(this).prop("checked") == false){ var ind = $(this).val();
						var datos = {id_p:idP, id_v:$(this).val()}
						$.post('enfermeria/files-serverside/borrar_apl_v.php',datos).done(function(data){
							if(data == 1){ toastr.success('','La aplicación de la vacuna se eliminó.'); }else{alert(data);}
						});
					}
				});
				
				$('.date_fva').datepicker().on('changeDate', function(e) {
					// `e` here contains the extra attributes
					var id_va = $(this).attr('lang'); var fecha = $(this).val();
					var datos = {id_p:idP, id_va:id_va, fecha:fecha}
					$.post('enfermeria/files-serverside/update_apl_v.php',datos).done(function(data){
						if(data == 1){ toastr.success('','Los datos de la vacuna se han guardado.'); }else{alert(data);}
					});
				});
				
				$('#btn_save_vacunacion_b').click(function(){
					var contador = 0; var contador1 = 0;
					$('.hide_c_v').each(function(index, value){ if($(this).val()==1){contador++;} });
					$('.date_fv').each(function(index, value){ if($(this).val()!=''){contador1++;} });
					if(contador > 0 || contador1 > 0){
						if(contador == contador1){
							swal({
								title: "¿Guardar las vacunas?", type: "warning", text: "Si estás seguro que los datos son correctos da click en Guardar.", showCancelButton: true, confirmButtonText: "Guardar", cancelButtonText: "Cancelar", closeOnConfirm: false, showLoaderOnConfirm: true
							},
							function(isConfirm){
								if(isConfirm){
									//Primero borramos los registros anteriores
									var datos_b = {id_p:idP}
									$.post('enfermeria/files-serverside/borrar_v_a.php',datos_b).done(function(data){
										if(data == 1){
											$('.hide_c_v').each(function(index, value){ var n_index = index+1;
												var datos = {id_p:idP, vacuna:$("#name_v"+n_index).text(), aplicada:$('#hide_c_v'+n_index).val(),enfermedad:$('#enfermedad_v'+n_index).text(),edad:$('#edad_v'+n_index).text(),dosis:$('#dosis_v'+n_index).text(),fecha_a:$('#fecha_av'+n_index).val(),aleatorio:aleatory}
												$.post('enfermeria/files-serverside/save_vacunas_b.php',datos).done(function(data){
													if(data == 1){ toastr.success('','Las vacunas del paciente han sido guardadas.'); }else{alert(data);}
												});
											}); swal.close();
										}else{alert(data);}
									});
								}else{}
							});
						}else{toastr.error('','Ingrese las fechas de aplicación.');}
					}else{toastr.error('','Nada que guardar.');}
				});
				
				$('#vacuna_add').load('enfermeria/genera/vacunas2.php',function(response,status,xhr){if(status=="success"){ $('#id_pac_hv2').val(idP); }});
				$('#vacuna_add3').load('enfermeria/genera/vacunas3.php',function(response,status,xhr){if(status=="success"){ $('#id_pac_hv3').val(idP); }});
				
				$('#form-add_vacuna_2').validator().on('submit', function (e) {
				  if (e.isDefaultPrevented()) { // handle the invalid form...
				  } else { // everything looks good!
					e.preventDefault(); var $btn = $('#btn_add_vac_2').button('loading');
					var datos = $('#form-add_vacuna_2').serialize();
					$.post('enfermeria/files-serverside/save_vacuna2.php',datos).done(function(data){ 
						if(data==1){ 
							$btn.button('reset'); $('#clickmeV2').click(); document.getElementById('form-add_vacuna_2').reset();
							toastr.success('','La vacuna se agregó al paciente.');
						} else{alert(data);}
					});
				  }
				});
				$('#form-add_vacuna_3').validator().on('submit', function (e) {
				  if (e.isDefaultPrevented()) { // handle the invalid form...
				  } else { // everything looks good!
					e.preventDefault(); var $btn = $('#btn_add_vac_3').button('loading');
					var datos = $('#form-add_vacuna_3').serialize();
					$.post('enfermeria/files-serverside/save_vacuna3.php',datos).done(function(data){ 
						if(data==1){ 
							$btn.button('reset'); $('#clickmeV3').click(); document.getElementById('form-add_vacuna_3').reset();
							toastr.success('','La vacuna se agregó al paciente.');
						} else{alert(data);}
					});
				  }
				});
				
				var oTableV2;
				oTableV2 = $('#dataTable_vacunas2').DataTable({
					"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {  },
					ordering: false, scrollCollapse: false, "scrollX": true,
					"destroy": true, "bRetrieve": true, "sScrollY": $('#refencia').height()*0.84, "bAutoWidth": true, 
					"bStateSave": false, "bInfo": true, "bFilter": true, "aaSorting": [[0, "desc"]],
					"aoColumns":[
						{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bVisible": false }, 
						{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }
					],
					"iDisplayLength": 300, "bLengthChange": false, "bProcessing": true, serverSide: true,
					"sAjaxSource": "enfermeria/datatable-serverside/vacunas2.php",
					"fnServerParams": function (aoData, fnCallback) { var idPa = idP; aoData.push(  {"name": "idP", "value": idPa } ); },
					"sDom": '<"filtroSV">l<"infoSV">r<"data_tSV"t>', "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
					"oLanguage":{
						"sLengthMenu":"MONSTRANDO _MENU_ records per page","sZeroRecords":"EL PACIENTE NO CUENTA CON VACUNAS",
						"sInfo":"MOSTRADOS: _END_","sInfoEmpty":"MOSTRADOS: 0","sInfoFiltered":"<br/>REGISTROS: _MAX_","sSearch": "BUSCAR" 
					}
				});//fin datatable
				$('#clickmeV2').click(function(e) { oTableV2.draw(); }); $('#tab_tEAA').click(function(e){ $('#clickmeV2').click(); });
				
				var oTableV3;
				oTableV3 = $('#dataTable_vacunas3').DataTable({
					"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {  },
					ordering: false, scrollCollapse: false, "scrollX": true,
					"destroy": true, "bRetrieve": true, "sScrollY": $('#refencia').height()*0.84, "bAutoWidth": true, 
					"bStateSave": false, "bInfo": true, "bFilter": true, "aaSorting": [[0, "desc"]],
					"aoColumns":[
						{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bVisible": false }, 
						{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }
					],
					"iDisplayLength": 300, "bLengthChange": false, "bProcessing": true, serverSide: true,
					"sAjaxSource": "enfermeria/datatable-serverside/vacunas3.php",
					"fnServerParams": function (aoData, fnCallback) { var idPa = idP; aoData.push(  {"name": "idP", "value": idPa } ); },
					"sDom": '<"filtroSV">l<"infoSV">r<"data_tSV"t>', "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
					"oLanguage":{
						"sLengthMenu":"MONSTRANDO _MENU_ records per page","sZeroRecords":"EL PACIENTE NO CUENTA CON VACUNAS",
						"sInfo":"MOSTRADOS: _END_","sInfoEmpty":"MOSTRADOS: 0","sInfoFiltered":"<br/>REGISTROS: _MAX_","sSearch": "BUSCAR" 
					}
				});//fin datatable
				$('#clickmeV3').click(function(e) { oTableV3.draw(); }); $('#tab_tEOV').click(function(e){ $('#clickmeV3').click(); });
				
			} });
											
			$('#myModal').modal('show');
			$('#myModal').on('shown.bs.modal',function(e){
				$('#form-uno, #form-dos, #form-tres, #form-ficha, #form-add_vacuna_2, #form-add_vacuna_3').validator();
				$('#form-ficha input').keyup(function(e){ $('#alerta_new_user').hide(); });
			});
			$('#myModal').on('hidden.bs.modal',function(e){ $(".modal-content").remove(); $("#myModal").empty(); });
		} });
	});
}

function save_tsanguineo(id_p, tipo){ var datos = {id_p:id_p, tipo:tipo}
	$.post('enfermeria/files-serverside/salvar_tsanguineo.php',datos).done(function(data){
		if(data == 1){ toastr.success('','El tipo sanguíneo se ha actualizado.'); }else{alert(data);}
	});
}
function save_religion(id_p, id_re){ var datos = {id_p:id_p, id_re:id_re}
	$.post('enfermeria/files-serverside/save_religion.php',datos).done(function(data){
		if(data == 1){ toastr.success('','La religión del paciente se ha actualizado.'); }else{alert(data);}
	});
}
function save_escolaridad(id_p, id_es){ var datos = {id_p:id_p, id_es:id_es}
	$.post('enfermeria/files-serverside/save_escolaridad.php',datos).done(function(data){
		if(data == 1){ toastr.success('','La escolaridad del paciente se ha actualizado.'); }else{alert(data);}
	});
}
function save_ocupacion(id_p, id_o){ var datos = {id_p:id_p, id_o:id_o}
	$.post('enfermeria/files-serverside/save_ocupacion.php',datos).done(function(data){
		if(data == 1){ toastr.success('','La ocupación del paciente se ha actualizado.'); }else{alert(data);}
	});
}
function save_apgar(id_p, id_apgar){ var datos = {id_p:id_p, id_apgar:id_apgar}
	$.post('enfermeria/files-serverside/save_apgar.php',datos).done(function(data){
		if(data == 1){ toastr.success('','El resultado APGAR del paciente se ha actualizado.'); }else{alert(data);}
	});
}
function save_tamiz(id_p, id_tamiz){ var datos = {id_p:id_p, id_tamiz:id_tamiz}
	$.post('enfermeria/files-serverside/save_tamiz.php',datos).done(function(data){
		if(data == 1){ toastr.success('','El resultado del TAMIZ del paciente se ha actualizado.'); }else{alert(data);}
	});
}
function save_edo_civil(id_p, id_ec){ var datos = {id_p:id_p, id_ec:id_ec}
	$.post('enfermeria/files-serverside/save_edo_civil.php',datos).done(function(data){
		if(data == 1){ toastr.success('','El estado civil del paciente se ha actualizado.'); }else{alert(data);}
	});
}
function tomar_signos_vitales(idP,idC,idS,name_p,edad_p,sexo_p){ $('#myModal').modal('hide'); window.setTimeout(function(){
	$("#myModal1").load('enfermeria/htmls/signos_vitales.php',function(response,status,xhr){ if(status=="success"){
		$('#titulo_modal').text('TOMA DE SIGNOS VITALES | '+name_p+' | '+sexo_p+' | '+edad_p);
		$('#id_usuario_sv').val($('#id_user').val()); $('#id_consulta_sv').val(idC); $('#id_paciente_sv').val(idP);
		
		$('#peso_p').keyup(function(e){
			if( !parseFloat($(this).val()) ){ $('#peso_p').val(''); } if( parseFloat($(this).val())>850 ){ $('#peso_p').val(''); }
			imc($(this).val(),$('#talla_p').val()); 
		});
		$('#talla_p').keyup(function(e){ if( parseFloat($(this).val())>3 ){ $('#talla_p').val(''); } imc($('#peso_p').val(),$(this).val()); });
		
		$('#btn_cancel_sv').click(function(){ $('#myModal1').modal('hide'); window.setTimeout(function(){ficha_enfermeria(idP,idC,idS);},300); });
		
		$('#form-uno').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()) { // handle the invalid form...
		  } else { // everything looks good!
			e.preventDefault(); var $btn = $('#btn_save_sv').button('loading'); $('#btn_cancel_sv').hide();
			var datos = $('#form-uno').serialize();
			$.post('enfermeria/files-serverside/save_signos_vitales.php',datos).done(function(data){ 
				if(data==1){ 
					$btn.button('reset'); $('#btn_cancel_sv').show(); $('#clickme').click(); $('#myModal1').modal('hide');
					swal({ title: "", type: "success", text: "Los datos se han guardado satisfactoriamente.", timer: 1800, showConfirmButton: false });
					window.setTimeout(function(){ficha_enfermeria(idP,idC,idS);},1800);
				} else{alert(data);}
			});
		  }
		});
		
		$('#myModal1').modal('show');
		$('#myModal1').on('shown.bs.modal',function(e){ $('#form-uno').validator(); });
		$('#myModal1').on('hidden.bs.modal',function(e){ $(".modal-content").remove(); $("#myModal1").empty(); });
	} });
},300); }

function cargar_todo_signos_vitales(idP,idC){
	var datosCon = {idP:idP, idC:idC}
	$.post('enfermeria/files-serverside/datosSV.php',datosCon).done(function(data){var datos=data.split(';*-');
		//Riesgos
		$('#miIMC').text(datos[5]); $('#miMedidaCintura').text(datos[6]);
		if( datos[5] >= 18.5 & datos[5] < 25 ){
			$('.normalIMC').addClass('bg-danger'); $('#miRiesgoP').text('no está en riesgo latente');
			if(datos[2]=='FEMENINO'){
				if( datos[6] < 80 ){ $('.imc_1_1').addClass('bg-danger'); }
				else if( datos[6] >= 80 ){ $('.imc_1_2').addClass('bg-danger'); }
				else{$('.imc_1_1, .imc_1_2').removeClass('bg-danger');}
			}else if(datos[2]=='MASCULINO')
			{
				if( datos[6] < 90 ){ $('.imc_1_1').addClass('bg-danger'); }
				else if( datos[6] >= 90 ){ $('.imc_1_2').addClass('bg-danger'); }
				else{$('.imc_1_1, .imc_1_2').removeClass('bg-danger');}
			}
		} 
		else if( datos[5] >= 25 & datos[5] < 30 ){
			$('.sobrepesoIMC').addClass('bg-danger'); $('#miRiesgoP').text('tiene riesgo moderado');
			if(datos[2]=='FEMENINO'){
				if( datos[6] < 80 ){ $('.imc_2_1').addClass('bg-danger'); }
				else if( datos[6] >= 80 ){ $('.imc_2_2').addClass('bg-danger'); }
				else{$('.imc_2_1, .imc_2_2').removeClass('bg-danger');}
			}else if(datos[2]=='MASCULINO'){
				if( datos[6] < 90 ){ $('.imc_2_1').addClass('bg-danger'); }
				else if( datos[6] >= 90 ){ $('.imc_2_2').addClass('bg-danger'); }
				else{$('.imc_2_1, .imc_2_2').removeClass('bg-danger');}
			}
		} 
		else if( datos[5] >= 30 & datos[5] < 35 ){
			$('.obesidad1IMC').addClass('bg-danger'); $('#miRiesgoP').text('tiene riesgo alto');
			if(datos[2]=='FEMENINO'){
				if( datos[6] < 80 ){ $('.imc_3_1').addClass('bg-danger'); }
				else if( datos[6] >= 80 ){ $('.imc_3_2').addClass('bg-danger'); }
				else{$('.imc_3_1, .imc_3_2').removeClass('bg-danger');}
			}else if(datos[2]=='MASCULINO'){
				if( datos[6] < 90 ){ $('.imc_3_1').addClass('bg-danger'); }
				else if( datos[6] >= 90 ){ $('.imc_3_2').addClass('bg-danger'); }
				else{$('.imc_3_1, .imc_3_2').removeClass('bg-danger');}
			}
		} 
		else if( datos[5] >= 35 & datos[5] < 40 ){
			$('.obesidad2IMC').addClass('bg-danger'); $('#miRiesgoP').text('tiene riesgo muy alto');
			if(datos[2]=='FEMENINO'){
				if( datos[6] < 80 ){ $('.imc_3_1').addClass('bg-danger'); }
				else if( datos[6] >= 80 ){ $('.imc_3_2').addClass('bg-danger'); }
				else{$('.imc_3_1, .imc_3_2').removeClass('bg-danger');}
			}else if(datos[2]=='MASCULINO'){
				if( datos[6] < 90 ){ $('.imc_3_1').addClass('bg-danger'); }
				else if( datos[6] >= 90 ){ $('.imc_3_2').addClass('bg-danger'); }
				else{$('.imc_3_1, .imc_3_2').removeClass('bg-danger');}
			}
		} 
		else if( datos[5] >= 40 ){
			$('.obesidad3IMC').addClass('bg-danger'); $('#miRiesgoP').text('tiene riesgo extremadamente alto');
			if(datos[2]=='FEMENINO'){
				if( datos[6] < 80 ){ $('.imc_4_1').addClass('bg-danger'); }
				else if( datos[6] >= 80 ){ $('.imc_4_2').addClass('bg-danger'); }
				else{$('.imc_4_1, .imc_4_2').removeClass('bg-danger');}
			}else if(datos[2]=='MASCULINO'){
				if( datos[6] < 90 ){ $('.imc_4_1').addClass('bg-danger'); }
				else if( datos[6] >= 90 ){ $('.imc_4_2').addClass('bg-danger'); }
				else{$('.imc_4_1, .imc_4_2').removeClass('bg-danger');}
			}
		} else{$('.sobrepesoIMC').removeClass('bg-danger'); }

		if( datos[5] >= 18.5 & datos[5] < 25 ){
			$('#recomendacionRN').show(); $('#recomendacionSP, #recomendacionOB').hide();
			if(datos[2]=='FEMENINO'){
				if( datos[6] < 80 ){ $('#miRiesgoE').text('sin riesgo'); } else if( datos[6] >= 80 ){ $('#miRiesgoE').text('con riesgo alto'); } 
			}else if(datos[2]=='MASCULINO'){
				if( datos[6] < 90 ){ $('#miRiesgoE').text('sin riesgo'); } else if( datos[6] >= 90 ){ $('#miRiesgoE').text('con riesgo alto'); } 
			}
		} 
		else if( datos[5] >= 25 & datos[5] < 30 ){
			$('#recomendacionSP').show(); $('#recomendacionRN, #recomendacionOB').hide();
			if(datos[2]=='FEMENINO'){
				if( datos[6] < 80 ){ $('#miRiesgoE').text('con riesgo moderado'); } else if( datos[6] >= 80 ){ $('#miRiesgoE').text('con riesgo alto'); }
			}else if(datos[2]=='MASCULINO'){
				if( datos[6] < 90 ){ $('#miRiesgoE').text('con riesgo moderado'); } else if( datos[6] >= 90 ){ $('#miRiesgoE').text('con riesgo alto'); }
			}
		} 
		else if( datos[5] >= 30 & datos[5] < 35 ){
			$('#recomendacionOB').show(); $('#recomendacionRN, #recomendacionSP').hide();
			if(datos[2]=='FEMENINO'){
				if( datos[6] < 80 ){ $('#miRiesgoE').text('con alto a muy alto riesgo'); } else if( datos[6] >= 80 ){ $('#miRiesgoE').text('con muy alto riesgo'); }
			}else if(datos[2]=='MASCULINO'){
				if( datos[6] < 90 ){ $('#miRiesgoE').text('con alto a muy alto riesgo'); } else if( datos[6] >= 90 ){ $('#miRiesgoE').text('con muy alto riesgo'); }
			}
		} 
		else if( datos[5] >= 35 & datos[5] < 40 ){
			$('#recomendacionOB').show(); $('#recomendacionRN, #recomendacionSP').hide();
			if(datos[2]=='FEMENINO'){
				if( datos[6] < 80 ){ $('#miRiesgoE').text('con alto a muy alto riesgo'); } else if( datos[6] >= 80 ){ $('#miRiesgoE').text('con muy alto riesgo'); }
			}else if(datos[2]=='MASCULINO'){
				if( datos[6] < 90 ){ $('#miRiesgoE').text('con alto a muy alto riesgo'); } else if( datos[6] >= 90 ){ $('#miRiesgoE').text('con muy alto riesgo'); }
			}
		} 
		else if( datos[5] >= 40 ){
			$('#recomendacionOB').show(); $('#recomendacionRN, #recomendacionSP').hide();
			if(datos[2]=='FEMENINO'){
				if( datos[6] < 80 ){ $('#miRiesgoE').text('con  riesgo extremadamente alto'); }
				else if( datos[6] >= 80 ){ $('#miRiesgoE').text('con  riesgo extremadamente alto'); } 
			}else if(datos[2]=='MASCULINO'){
				if( datos[6] < 90 ){ $('#miRiesgoE').text('con  riesgo extremadamente alto'); }
				else if( datos[6] >= 90 ){ $('#miRiesgoE').text('con  riesgo extremadamente alto'); }
			}
		}
		//Riesgos
		
		//Historial sv
		var oTableSV;
		oTableSV = $('#dataTableSV').DataTable({
			"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {  },
			ordering: false, scrollCollapse: false, "scrollX": true,
			"destroy": true, "bRetrieve": true, "sScrollY": $('#myModalx').height()*0.48, "bAutoWidth": true, 
			"bStateSave": false, "bInfo": true, "bFilter": true, "aaSorting": [[0, "desc"]],
			"aoColumns":[
				{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, 
				{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, 
				{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }
			],
			"iDisplayLength": 30000, "bLengthChange": false, "bProcessing": true, serverSide: true,
			"sAjaxSource": "consultas/datatable-serverside/signos_vitales.php",
			"fnServerParams": function (aoData, fnCallback) { var idPa = idP; aoData.push(  {"name": "idP", "value": idPa } ); },
			"sDom": '<"filtroSV">l<"infoSV">r<"data_tSV"t>', "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
			"oLanguage":{
				"sLengthMenu":"MONSTRANDO _MENU_ records per page","sZeroRecords":"EL PACIENTE NO CUENTA CON SIGNOS VITALES",
				"sInfo":"MOSTRADOS: _END_","sInfoEmpty":"MOSTRADOS: 0","sInfoFiltered":"<br/>REGISTROS: _MAX_","sSearch": "BUSCAR" 
			}
		});//fin datatable
		$('#clickmeSV').click(function(e) { oTableSV.draw(); }); $('#mi_tab_h_sv').click(function(e){ $('#clickmeSV').click(); });
		//Fin historial sv
		
		//Gráficas grandes
		var h_g = $('#referencia').height()*0.20, w_g = $('#referencia').width()*0.30, h_g1 = $('#referencia').height()*0.50, w_g1 = $('#referencia').width()*0.60;
		var datosCHa = {idP:idP, idCo:idC}
		$.post('enfermeria/files-serverside/datos_grafias_sv.php',datosCHa).done(function(data){ var datosCH4=data.split(';*');
			
			var myvalues_1 = JSON.parse(datosCH4[29]);
			var chart = c3.generate({ bindto: '#myChartFC',
				data: { columns: [ myvalues_1 ] }, size: { height: h_g, width: w_g },
				regions: [ {axis: 'y', start: datosCH4[5], end: datosCH4[6], class: 'regionY'} ]
			});
			
			var myvalues1_1 = JSON.parse(datosCH4[28]); //alert(datosCH4[8]+';'+datosCH4[9]);
			var chart = c3.generate({ bindto: '#myChartFR',
				data: { columns: [ myvalues1_1 ] }, size: { height: h_g, width: w_g },
				regions: [ {axis: 'y', start: datosCH4[8], end: datosCH4[9], class: 'regionY'} ]
			});
			var chart2 = c3.generate({ bindto: '#myChartTL_',
				data: { columns: [ myvalues1_1 ] }, size: { height: h_g, width: w_g },
				regions: [ {axis: 'y', start: datosCH4[8], end: datosCH4[9], class: 'regionY'} ]
			});
			
			var myvalues2_1 = JSON.parse(datosCH4[26]); //alert(myvalues2_1);
			var chart = c3.generate({ bindto: '#myChartT1',
				data: { columns: [ myvalues2_1 ] }, size: { height: h_g, width: w_g },
				regions: [ {axis: 'y', start: datosCH4[11], end: datosCH4[12], class: 'regionY'} ]
			});

			var myvalues3_1 = JSON.parse(datosCH4[27]); //alert(myvalues2_1);
			var chart = c3.generate({ bindto: '#myChartTA',
				data: { columns: [ myvalues3_1 ] }, size: { height: h_g, width: w_g },
				regions: [ {axis: 'y', start: datosCH4[14], end: datosCH4[15], class: 'regionY'} ]
			});
		
			var myvalues4_1 = JSON.parse(datosCH4[31]);
			var chart = c3.generate({ bindto: '#myChartT',
				data: { columns: [ myvalues4_1 ] }, size: { height: h_g, width: w_g }, regions: [ {axis: 'y', start: 36.5, end: 37.5, class: 'regionY'} ]
			});
			
			var myvalues5_1 = JSON.parse(datosCH4[32]);
			var chart6 = c3.generate({ bindto: '#myChartPE',
				data: { columns: [ myvalues5_1 ] }, size: { height: h_g, width: w_g }, //regions: [ {axis: 'y', start: 36.5, end: 37.5, class: 'regionY'} ]
			});
			
			var myvalues6_1 = JSON.parse(datosCH4[33]);
			var chart7 = c3.generate({ bindto: '#myChartTL',
				data: { columns: [ myvalues6_1 ] }, size: { height: h_g, width: w_g }, //regions: [ {axis: 'y', start: 36.5, end: 37.5, class: 'regionY'} ]
			});
			
			var myvalues7_1 = JSON.parse(datosCH4[30]); 
			var chart = c3.generate({ bindto: '#myChartIMC',
				data: { columns: [ myvalues7_1 ] }, size: { height: h_g, width: w_g }, regions: [ {axis: 'y', start: 18.50, end: 25, class: 'regionY'} ]
			});
		});
		//Gráficas grandes FIN
	});
}

function imc(a,b){ var imc = 0; $('#imc_p').val('');
	imc=redondear((parseFloat(a)/(parseFloat(b)*parseFloat(b))),2); 
	if(parseFloat(imc)){ $('#imc_p').val(imc); }else{$('#imc_p').val('');}
}
</script>