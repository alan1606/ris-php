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
    
    <title>SISTEMA - CATÁLOGO DE PAQUETES</title>
    
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
	<script src="chosen/chosen.jquery.js" type="text/javascript"></script>
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
	<link rel="stylesheet" href="chosen/chosen.css">
    <link rel="stylesheet" href="chosen/chosen-bootstrap.css">
    <link href="jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
</head>
<?php include_once 'partes/header.php'; ?>
<!-- Contenido -->
<div id="div_tabla_pacientes" class="table-responsive" style="border:1px none red; vertical-align:top; margin-top:-9px;">
<table width="100%" height="100%" id="dataTablePrincipal" class="table-hover table-bordered table-condensed" role="grid"> 
<thead id="cabecera_tBusquedaPrincipal">
  <tr role="row" class="bg-primary">
    <th id="clickme" style="vertical-align:middle;">#</th>
    <th style="vertical-align:middle; white-space:nowrap;"><button type='button' class='btn btn-success btn-xs' id='btnAddPaquete' onClick='nuevoPaquete()' title='Agregar un nuevo paquete'><i class='fa fa-plus' aria-hidden='true'></i> PAQUETE</button></th>
    <th style="vertical-align:middle;" width="1%">PRECIO</th>
  </tr>
</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
	<tfoot>
        <tr class="bg-primary">
            <th></th>
            <th><input type="text" class="form-control input-sm" placeholder="Nombre del paquete" style="width: 98%;"/></th>
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
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li>ADMINISTRACIÓN</li><li>PAQUETES</li><li class="active"><strong>CATÁLOGO DE PAQUETES</strong></li>');
	
	$('#my_search').removeClass('hidden');
	
	var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-147-$('#breadc').height();
	var oTableP = $('#dataTablePrincipal').DataTable({
		serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true,
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: false, responsive: true,
		"aoColumns": [ {"bVisible":true}, {"bVisible":true },{ "bVisible": true } ],
		"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"S><"proc"p>', 
		deferRender: true, select: false, "processing": false, 
		"sAjaxSource": "paquetes/datatable-serverside/paquetes.php",
		"fnServerParams": function (aoData, fnCallback) { 
			var nombre = $('#top-search').val(); var acceso = $('#acc_user').val(); var idU = $('#id_user').val();
			
			aoData.push( {"name": "nombre", "value": nombre } );
			aoData.push(  {"name": "accesoU", "value": acceso } );
			aoData.push(  {"name": "idU", "value": idU } );
		},
		"oLanguage": {
			"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", 
			"sInfo": "PAQUETES FILTRADOS: _END_",
			"sInfoEmpty": "NINGÚN PAQUETE FILTRADO.", "sInfoFiltered": " TOTAL DE PAQUETES: _MAX_", "sSearch": "",
			"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
		},"iDisplayLength": 500, paging: true
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
	$('#top-search').keyup(function(e) { $('#dataTablePrincipal_filter input').val($(this).val()); $('#dataTablePrincipal_filter input').keyup(); }).focus();
	
	$('.filtro1Principal').addClass('hidden');
});

function nuevoPaquete(){
	$("#myModal").load("paquetes/htmls/paquete.php",function(response,status,xhr){ if(status=="success"){ $('#idUsuarioE').val(<?PHP echo $id_u; ?>);
		
		var nv = new Date(); var aleatorio_pa = nv.format('Y-m-d-H-i-s-u').substring(0,22); $('#aleatorio_paq').val(aleatorio_pa);
																												 
		$('#tipo_concepto_add').load('paquetes/genera/tipo_concepto_agregar.php',function(response,status,xhr){if(status=="success"){
			$('#tipo_concepto_add').change(function(e){ $('#btn_add_concepto').addClass('disabled');
				$('#concepto_agregar').load('paquetes/genera/concepto_agregar.php?t='+$('#tipo_concepto_add').val()+'&aleat='+aleatorio_pa,function(response,status,xhr){if(status=="success"){
					$('#concepto_agregar').change(function(e){
						if(this.value==''){$('#btn_add_concepto').addClass('disabled');}else{$('#btn_add_concepto').removeClass('disabled');}
					});
				}}); window.setTimeout(function(){$('#concepto_agregar').chosen();},500);
				window.setTimeout(function(){$("#concepto_agregar").trigger("chosen:updated");},650);
			});
		}});
																										 
		var tamPA = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-147-$('#breadc').height();
		var oTablePA = $('#dataTablePaquetes').DataTable({
			serverSide: true,"sScrollY": 300, ordering: false, searching: false, scrollCollapse: false, "scrollX": true, scroller: false, responsive: true,
			"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
				
			},
			"aoColumns": [ {"bVisible":true}, {"bVisible":true },{ "bVisible": true }, {"bVisible":true}, {"bVisible":true },{ "bVisible": true },{"bVisible": true} ],
			"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"S><"proc"p>', deferRender: true, select: false, "processing": false, 
			"sAjaxSource": "paquetes/datatable-serverside/conceptos_asignados.php",
			"fnServerParams": function (aoData, fnCallback) { 
				var nombre = $('#top-search').val(); var acceso = $('#acc_user').val(); var idU = $('#id_user').val(); var aleat = aleatorio_pa;

				aoData.push( {"name": "nombre", "value": nombre } ); aoData.push(  {"name": "accesoU", "value": acceso } );
				aoData.push(  {"name": "idU", "value": idU } ); aoData.push(  {"name": "aleat", "value": aleat } );
			},
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "NINGÚN CONCEPTO EN EL PAQUETE", 
				"sInfo": "CONCEPTOS FILTRADOS: _END_",
				"sInfoEmpty": "NINGÚN CONCEPTO FILTRADO.", "sInfoFiltered": " TOTAL DE CONCEPTOS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 500, paging: false
		});

		$('#clickmePA').click(function(e) { oTablePA.draw(); }); window.setTimeout(function(){$('#clickmePA').click();},500);
																										 
		$('#btn_add_concepto').click(function(){
			if($('#concepto_agregar').val()!='' & $('#concepto_agregar').val()!=null){
				var datos_ac = { id_concepto_a:$('#concepto_agregar').val(), idU:$('#id_user').val(), aleatorio:aleatorio_pa }
				$.post('paquetes/files-serverside/add_concepto.php',datos_ac).done(function( data ) {
					if (data==1){
						$('#clickmePA, #clickme').click();
						$('#tipo_concepto_add').val(''); $('#btn_add_concepto').addClass('disabled');
						$('#concepto_agregar').load('paquetes/genera/concepto_agregar.php?t=0&aleat=0',function(response,status,xhr){if(status=="success"){
							window.setTimeout(function(){$('#concepto_agregar').trigger("chosen:updated");},500);
						}});
					} else{alert(data);}
				});
			}else{ }
		});
		
		$('#formEstudio').validator().on('submit', function (e) {
			if (e.isDefaultPrevented()) { // handle the invalid form...
		  	} else { // everything looks good!
			e.preventDefault();
			var datosP = $('#myModal #formEstudio').serialize();
			$.post('paquetes/files-serverside/add_paquete.php',datosP).done(function( data ) {
				if (data==1){//si el paciente se Actualizó 
					$('#clickme').click(); $('#myModal').modal('hide');
					swal({ title: "", type: "success", text: "El paquete ha sido creado.", timer: 1800, showConfirmButton: false }); return;
				}else if(data==2){
					swal({ title: "", type: "error", text: "El paquete no se puede crear porque no tiene conceptos asignados.", timer: 2000, showConfirmButton: false }); return;
				}else if(data==3){
					swal({ title: "", type: "error", text: "El paquete no se puede crear porque no esta completa la información de alguno de sus conceptos asignados, revise los precios unitarios y las cantidades.", timer: 2000, showConfirmButton: false }); return;
				}
				else{alert(data);}
			});
		  }
		});
		
		$('#myModal').modal('show');
		$('#myModal').on('shown.bs.modal', function (e) { $('#formEstudio').validator(); });
		$('#myModal').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal").empty(); });
	} });
}

function fichaPaquete(idE, nameS){
	$("#myModal1").load("paquetes/htmls/paquete.php",function(response,status,xhr){ if(status=="success"){
		$('#btn_save1').text('Actualizar'); $('#titulo_modal').text('FICHA DEL PAQUETE: '+nameS);
		
		var datos ={idE:idE}
		$.post('paquetes/files-serverside/ficha_paquete.php',datos).done(function( data1 ) {
			var datosI = data1.split('*}'); var aleatorio_pa = datosI[2];
			$('#idUsuarioE').val(<?PHP echo $id_u; ?>); $('#idEstudioE').val(idE); $('#nombreE').val(datosI[0]); $('#aleatorio_paq').val(datosI[2]);
			
			$('#tipo_concepto_add').load('paquetes/genera/tipo_concepto_agregar.php',function(response,status,xhr){if(status=="success"){
				$('#tipo_concepto_add').change(function(e){ $('#btn_add_concepto').addClass('disabled');
					$('#concepto_agregar').load('paquetes/genera/concepto_agregar.php?t='+$('#tipo_concepto_add').val()+'&aleat='+aleatorio_pa,function(response,status,xhr){if(status=="success"){
						$('#concepto_agregar').change(function(e){
							if(this.value==''){$('#btn_add_concepto').addClass('disabled');}else{$('#btn_add_concepto').removeClass('disabled');}
						});
					}}); window.setTimeout(function(){$('#concepto_agregar').chosen();},500);
					window.setTimeout(function(){$("#concepto_agregar").trigger("chosen:updated");},650);
				});
			}});

			var tamPA = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-147-$('#breadc').height();
			var oTablePA = $('#dataTablePaquetes').DataTable({
				serverSide: true,"sScrollY": 300, ordering: false, searching: false, scrollCollapse: false, "scrollX": true, scroller: false, responsive: true,
				"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
					/* Calculate the market share for browsers on this page */
					var iAbonado = 0;
					for ( var i=iStart ; i<iEnd ; i++ ) { iAbonado += aaData[ aiDisplay[i] ][8]*aaData[ aiDisplay[i] ][9]; }

					/* Modify the footer row to match what we want */
					var nCells = nRow.getElementsByTagName('th');
					nCells[3].innerHTML = '$'+redondear(parseFloat(iAbonado * 100)/100,2);
				},
				"aoColumns": [ {"bVisible":true}, {"bVisible":true },{ "bVisible": true }, {"bVisible":true}, {"bVisible":true },{ "bVisible": true },{"bVisible": true} ],
				"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"S><"proc"p>', deferRender: true, select: false, "processing": false, 
				"sAjaxSource": "paquetes/datatable-serverside/conceptos_asignados.php",
				"fnServerParams": function (aoData, fnCallback) { 
					var nombre = $('#top-search').val(); var acceso = $('#acc_user').val(); var idU = $('#id_user').val(); var aleat = aleatorio_pa;

					aoData.push( {"name": "nombre", "value": nombre } ); aoData.push(  {"name": "accesoU", "value": acceso } );
					aoData.push(  {"name": "idU", "value": idU } ); aoData.push(  {"name": "aleat", "value": aleat } );
				},
				"oLanguage": {
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "NINGÚN CONCEPTO EN EL PAQUETE", 
					"sInfo": "CONCEPTOS FILTRADOS: _END_",
					"sInfoEmpty": "NINGÚN CONCEPTO FILTRADO.", "sInfoFiltered": " TOTAL DE CONCEPTOS: _MAX_", "sSearch": "",
					"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
				},"iDisplayLength": 500, paging: false
			});

			$('#clickmePA').click(function(e) { oTablePA.draw(); }); window.setTimeout(function(){$('#clickmePA').click();},500);

			$('#btn_add_concepto').click(function(){
				if($('#concepto_agregar').val()!='' & $('#concepto_agregar').val()!=null){
					var datos_ac = { id_concepto_a:$('#concepto_agregar').val(), idU:$('#id_user').val(), aleatorio:aleatorio_pa }
					$.post('paquetes/files-serverside/add_concepto.php',datos_ac).done(function( data ) {
						if (data==1){
							$('#clickmePA, #clickme').click();
							$('#tipo_concepto_add').val(''); $('#btn_add_concepto').addClass('disabled');
							$('#concepto_agregar').load('paquetes/genera/concepto_agregar.php?t=0&aleat=0',function(response,status,xhr){if(status=="success"){
								window.setTimeout(function(){$('#concepto_agregar').trigger("chosen:updated");},500);
							}});
						} else{alert(data);}
					});
				}else{ }
			});
		});
		
		$('#formEstudio').validator().on('submit', function (e) {
			if (e.isDefaultPrevented()) { // handle the invalid form...
		  	} else { // everything looks good!
			e.preventDefault(); 
			var datosP = $('#myModal1 #formEstudio').serialize();
			$.post('paquetes/files-serverside/update_paquete.php',datosP).done(function( data ) {
				if (data==1){//si el paciente se Actualizó 
					$('#clickme').click(); $('#myModal1').modal('hide');
					swal({ title: "", type: "success", text: "El paquete ha sido actualizado.", timer: 1800, showConfirmButton: false }); return;
				}else if(data==2){
					swal({ title: "", type: "error", text: "El paquete no se puede actualizar porque no tiene conceptos asignados.", timer: 2000, showConfirmButton: false }); return;
				}else if(data==3){
					swal({ title: "", type: "error", text: "El paquete no se puede actualizar porque no esta completa la información de alguno de sus conceptos asignados, revise los precios unitarios y las cantidades.", timer: 2000, showConfirmButton: false }); return;
				}
				else{alert(data);}
			});
		  }
		});
		
		$('#myModal1').modal('show');
		$('#myModal1').on('shown.bs.modal', function (e) { $('#formEstudio').validator(); });
		$('#myModal1').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal1").empty(); });
	} });
}
	
function borrarItem(id,nombre){
	swal({
	  title: "Quitar concepto", text: "¿Desea quitar el concepto "+nombre+" del paquete?", type: "warning", showCancelButton: true,
	  cancelButtonText: "No quitar", confirmButtonText: "Quitar concepto", closeOnConfirm: false, confirmButtonColor: "#DD6B55", showLoaderOnConfirm: true
	},
	function(){
		var datos = {id:id}
		$.post('paquetes/files-serverside/quitar_concepto.php',datos).done(function( data ) {
			if (data==1){ $('#clickmePA, #clickme').click(); }
			else if(data==2){ swal({ title: "", type: "error", text: "Usted no puede realizar esta acción.", timer: 1800, showConfirmButton: false }); return; }
			else{alert(data);} swal.close();
		});
	}); return;
}
function guardarItem(id_c, id_cp, id_cc){
	if($('#'+id_cp).val()!='' & $('#'+id_cc).val()!=''){
		var datos = {id:id_c, precio:$('#'+id_cp).val(), cantidad:$('#'+id_cc).val()}
		$.post('paquetes/files-serverside/update_concepto.php',datos).done(function( data ) {
			if (data==1){ $('#clickmePA, #clickme').click();
				swal({ title: "", type: "success", text: "Los datos del concepto se actualizaron.", timer: 1800, showConfirmButton: false }); return;
			} else{alert(data);} swal.close();
		});
	}else{ swal({ title: "", type: "error", text: "Favor de revisar los datos ingresados.", timer: 1800, showConfirmButton: false }); return; }
}
function updateItem(id_c, id_cp, id_cc, precio, cantidad, id_boton){
	var id_cp1 = "'"+id_cp+"'"; var id_cc1 = "'"+id_cc+"'"; var precio1 = "'"+precio+"'"; var cantidad1 = "'"+cantidad+"'";  var id_boton1 = "'"+id_boton+"'";
	$('#'+id_boton).replaceWith('<button type="button" class="btn btn-xs btn-primary" onClick="guardarItem('+id_c+','+id_cp1+','+id_cc1+');" id="b1_'+id_c+'" title="Guardar"><i class="fa fa-save" aria-hidden="true"></i></button>&nbsp;<button type="button" class="btn btn-xs btn-warning" onClick="restaurarItem('+id_c+','+id_cp1+','+id_cc1+','+precio1+','+cantidad1+');" id="b2_'+id_c+'" title="Cancelar"><i class="fa fa-ban" aria-hidden="true"></i></button>');
	
	$('#'+id_cp).replaceWith('<div align="center">$ <input name="p_'+id_c+'" class="form-control input-sm" id="p_'+id_c+'" value="'+precio+'" style="width:75px;text-align:right;"maxlength="8" onKeyUp="numeros_decimales(this.value, this.name);"></div>');
	
	$('#'+id_cc).replaceWith('<div align="center"><input name="c_'+id_c+'" class="form-control input-sm" id="c_'+id_c+'" value="'+cantidad+'" style="width:60px;text-align:right;"maxlength="3" onKeyUp="solo_numeros(this.value, this.name);"></div>');
}
function restaurarItem(id_c, id_cp, id_cc, precio, cantidad){
	$('#clickmePA, #clickme').click();
}

</script>