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
    
    <title>SISTEMA - CATÁLOGO DE PRODUCTOS DE FARMACIA</title>
    
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
    <th id="clickme" style="vertical-align:middle;">#</th>
    <th style="vertical-align:middle; white-space:nowrap;" nowrap><button type='button' class='btn btn-success btn-xs' id='btnAddEstudio' onClick='nuevoProducto()' title='Agregar un nuevo producto'><i class='fa fa-plus' aria-hidden='true'></i> PRODUCTO</button></th>
    <th style="vertical-align:middle; white-space:nowrap;" nowrap>GRUPO</th>
    <th style="vertical-align:middle;">CATEGORÍA</th>
    <th style="vertical-align:middle;">MEDIDA</th>
    <th style="vertical-align:middle;">PRESENTACIÓN</th>
    <th style="vertical-align:middle;">MARCA</th>
    <th style="vertical-align:middle;">COSTO</th>
    <th style="vertical-align:middle; white-space:nowrap;" nowrap>PRECIO P</th>
    <th style="vertical-align:middle; white-space:nowrap;" nowrap>PRECIO M</th>
  </tr>
</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
	<tfoot>
        <tr class="bg-primary">
            <th></th>
            <th><input type="text" class="form-control input-sm" placeholder="Nombre producto"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Grupo"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Categoría" style="width:98%;"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Medida"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Presentación" style="width:98%;"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Marca" style="width:98%;"/></th>
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
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li>FARMACIA</li><li class="active"><strong>CATÁLOGO DE PRODUCTOS</strong></li>');
	
	$('#my_search').removeClass('hidden'); $.fn.datepicker.defaults.autoclose = true; 
	
	var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-147-$('#breadc').height();
	var oTableP = $('#dataTablePrincipal').DataTable({
		serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true,
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: false, responsive: true,
		"aoColumns": [
			{"bVisible":true}, {"bVisible":true },{ "bVisible": true }, {"bVisible":true}, {"bVisible":true},
			{"bVisible":true}, {"bVisible":true}, {"bVisible":true}, {"bVisible":true}, {"bVisible":true}
		],
		"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"S><"proc"p>', 
		deferRender: true, select: false, "processing": false, 
		"sAjaxSource": "farmacia/productos/datatable-serverside/productos.php",
		"fnServerParams": function (aoData, fnCallback) { 
			var nombre = $('#top-search').val(); var acceso = $('#acc_user').val(); var idU = $('#id_user').val(); var de = $("#miSucursal").val();
			
			aoData.push( {"name": "nombre", "value": nombre } );
			aoData.push(  {"name": "accesoU", "value": acceso } );
			aoData.push(  {"name": "idU", "value": idU } ); aoData.push({"name": "idSu", "value": de });
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

function nuevoProducto(){
	$("#myModal1").load("farmacia/medicamentos/htmls/ficha_producto.php",function(response,status,xhr){ if(status=="success"){
		$('#id_user_reg_cf').val($('#id_user').val());
		
		$('#grupo_p').load('farmacia/genera/grupos_productos.php',function(response,status,xhr){if(status=="success"){
			window.setTimeout(function(){$('#grupo_p').chosen();},500);
			$('#grupo_p').change(function(e){ var id = $(this).val();
				$('#categoria_p').load('farmacia/genera/categorias_productos.php?id_g='+id,function(response,status,xhr){if(status=="success"){
					$("#categoria_p").trigger("chosen:updated");
				}});
			});
		}}); window.setTimeout(function(){$('#categoria_p, #modelo_p').chosen();},500);
		
		$('#umedida_p').load('farmacia/genera/unidades_medida.php',function(response,status,xhr){if(status=="success"){
			window.setTimeout(function(){$('#umedida_p').chosen();},500);
		}});
		
		$('#marca_p').load('farmacia/genera/marcas_productos.php',function(response,status,xhr){if(status=="success"){
			window.setTimeout(function(){$('#marca_p').chosen();},500);
			$('#marca_p').change(function(e){ var id = $(this).val();
				$('#modelo_p').load('farmacia/genera/modelos_marcas.php?id_m='+id,function(response,status,xhr){if(status=="success"){
					$("#modelo_p").trigger("chosen:updated");
				}});
			});
		}});
		
		$('#presentacion_p').load('farmacia/genera/presentaciones.php',function(response,status,xhr){if(status=="success"){
			window.setTimeout(function(){$('#presentacion_p').chosen();},500);
		}});
		
		$('#form-concepto').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()){ // handle the invalid form...
			//$("#alerta_new_user").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_new_user").slideUp(600); });
		  } else { // everything looks good!
			e.preventDefault(); 
			var $btn = $('#btn_guardar').button('loading'); $('#btn_cancelar').hide();
			var datosP = $('#form-concepto').serialize();
			$.post('farmacia/productos/files-serverside/add_producto.php',datosP).done(function( data ) {
				if (data==1){//si el paciente se Actualizó 
					$('#clickme').click(); $('#myModal1').modal('hide'); $btn.button('reset'); $('#btn_cancelar').show(); 
					swal({ title: "", type: "success", text: "El producto se ha sido creado", timer: 1800, showConfirmButton: false }); return;
				} else{alert(data);}
			});
		  }
		});
		
		$('#myModal1').modal('show');
		$('#myModal1').on('shown.bs.modal', function (e) { $('#form-concepto').validator(); });
		$('#myModal1').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal1").empty(); });
	} });
}
function ver_producto(id_pr, nombre_pr){
	$("#myModal2").load("farmacia/medicamentos/htmls/ficha_producto.php",function(response,status,xhr){ if(status=="success"){
		$('#id_user_reg_cf').val($('#id_user').val()); $('#id_pdt').val(id_pr);
		$('#titulo_modal').text('FICHA DEL PRODUCTO '+nombre_pr); $('#btn_guardar').text('Actualizar');
		
		var datos = {id_pr:id_pr}
		$.post('farmacia/productos/files-serverside/ficha_producto.php',datos).done(function( data ) {
			var datox = data.split('{]*}');
			$('#nombre_p').val(datox[0]);
			
			$('#grupo_p').load('farmacia/genera/grupos_productos.php',function(response,status,xhr){if(status=="success"){
				window.setTimeout(function(){$('#grupo_p').chosen();},500); $('#grupo_p').val(datox[5]);
				$('#grupo_p').change(function(e){ var id = $(this).val();
					$('#categoria_p').load('farmacia/genera/categorias_productos.php?id_g='+id,function(response,status,xhr){if(status=="success"){
						$("#categoria_p").trigger("chosen:updated");
					}});
				});
			}});
			
			$('#categoria_p').load('farmacia/genera/categorias_productos.php?id_g='+datox[5],function(response,status,xhr){if(status=="success"){
				window.setTimeout(function(){$('#categoria_p').chosen();},500); $('#categoria_p').val(datox[6]);
			}});

			$('#umedida_p').load('farmacia/genera/unidades_medida.php',function(response,status,xhr){if(status=="success"){
				window.setTimeout(function(){$('#umedida_p').chosen();},500); $('#umedida_p').val(datox[7]);
			}});

			$('#marca_p').load('farmacia/genera/marcas_productos.php',function(response,status,xhr){if(status=="success"){
				window.setTimeout(function(){$('#marca_p').chosen();},500); $('#marca_p').val(datox[8]);
				$('#marca_p').change(function(e){ var id = $(this).val();
					$('#modelo_p').load('farmacia/genera/modelos_marcas.php?id_m='+id,function(response,status,xhr){if(status=="success"){
						$("#modelo_p").trigger("chosen:updated");
					}});
				});
			}});
			
			$('#modelo_p').load('farmacia/genera/modelos_marcas.php?id_m='+datox[8],function(response,status,xhr){if(status=="success"){
				window.setTimeout(function(){$('#modelo_p').chosen();},500); $('#modelo_p').val(datox[9]);
			}});

			$('#presentacion_p').load('farmacia/genera/presentaciones.php',function(response,status,xhr){if(status=="success"){
				window.setTimeout(function(){$('#presentacion_p').chosen();},500); $('#presentacion_p').val(datox[10]);
			}});
			
			$('#costo_p').val(datox[3]); $('#precio_p_p').val(datox[1]); $('#precio_m_p').val(datox[2]); $('#descripcion_p').val(datox[11]);
			$('#cb_p').val(datox[4]);
		});
		
		$('#form-concepto').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()) { // handle the invalid form...
			//$("#alerta_new_user").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_new_user").slideUp(600); });
		  } else { // everything looks good!
			e.preventDefault(); 
			var $btn = $('#btn_guardar').button('loading'); $('#btn_cancelar').hide();
			var datosP = $('#form-concepto').serialize();
			$.post('farmacia/productos/files-serverside/update_producto.php',datosP).done(function( data ) {
				if (data==1){//si el paciente se Actualizó 
					$('#clickme').click(); $('#myModal2').modal('hide'); $btn.button('reset'); $('#btn_cancelar').show(); 
					swal({ title: "", type: "success", text: "Los datos del producto se han actualizado.", timer: 1800, showConfirmButton: false }); return;
				} else{alert(data);}
			});
		  }
		});
					
		$('#myModal2').modal('show');
		$('#myModal2').on('shown.bs.modal', function (e) { $('#form-concepto').validator(); });
		$('#myModal2').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal2").empty(); });
	} });
}
</script>