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
    
    <title>SISTEMA - EXPEDIENTE CLÍNICO</title>
    
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
	<script src='tinymce/tinymce.min.js'></script>
    
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
</head>
<?php include_once 'partes/header.php'; ?>
<!-- Contenido -->
<div id="div_tabla_pacientes" class="wrapper wrapper-content animated fadeIn" style="border:1px none red; vertical-align:top; margin-top:-9px; overflow: scroll;">
	<div class="row">
		<div class="col-lg-12">
			<div class="tabs-container">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab-1">HISTORIA CLÍNICA</a></li>
					<li class="hidden"><a data-toggle="tab" href="#tab-2">DOCUMENTOS</a></li>
					<li class=""><a data-toggle="tab" href="#tab-3" id="t_3">CONSULTAS</a></li>
					<li class=""><a data-toggle="tab" href="#tab-4">ESTUDIOS</a></li>
					<li class=""><a data-toggle="tab" href="#tab-7">DOCUMENTOS</a></li>
					<li class=""><a data-toggle="tab" href="#tab-5">SIGNOS VITALES</a></li>
					<li class=""><a data-toggle="tab" href="#tab-6">VACUNAS</a></li>
				</ul>
				<div class="tab-content">
					<div id="tab-1" class="tab-pane active">
						<form name="form-hc" id="form-hc" data-toggle="validator" role="form">
						<input type="hidden" id="id_paciente_hc" name="id_paciente_hc" value="<?PHP echo $_GET['idpa']; ?>" />
						<div class="panel-body">
							<div class="tabs-container">
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td>
											<ul class="nav nav-tabs">
												<li class="active"><a data-toggle="tab" href="#tab-1_1">GENERALES</a></li>
												<li class=""><a data-toggle="tab" href="#tab-1_7">ANTECEDENTES</a></li>
												<li class=""><a data-toggle="tab" href="#tab-1_2">PARTE 3</a></li>
												<li class=""><a data-toggle="tab" href="#tab-1_3">PARTE 4</a></li>
												<li class=""><a data-toggle="tab" href="#tab-1_4">PARTE 5</a></li>
												<li class=""><a data-toggle="tab" href="#tab-1_5">PARTE 6</a></li>
												<li class=""><a data-toggle="tab" href="#tab-1_6">PARTE 7</a></li>
											</ul>
										</td>
										<td width="1%">
											<button type="submit" class="btn btn-success btn-sm" id="btn_save_hc">
												<i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar HC
											</button>
										</td>
									</tr>
								</table>
								<div class="tab-content">
									<div id="tab-1_1" class="tab-pane active">
										<div class="panel-body">
											<table class="table-condensed" border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td>
														<table class="table-condensed table-bordered" width="100%">
															<tr class="bg-info"> <td>APELLIDO PATERNO</td><td>APELLIDO MATERNO</td><td>NOMBRE(S)</td><td>SEXO</td> </tr>
															<tr class="">
																<td><span id="a_paterno">ANZURES</span></td><td><span id="a_materno">BAUTISTA</span></td>
																<td><span id="nombre_p">EMMANUEL</span></td><td><span id="sexo_p">MASCULINO</span></td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td>
														<table class="table-condensed table-bordered" width="100%">
															<tr class="bg-info"> 
																<td nowrap>FECHA NACIMIENTO</td><td>EDAD</td><td nowrap>ENTIDAD DE NACIMIENTO</td><td nowrap>TELÉFONO PERSONAL</td> 
															</tr>
															<tr class="">
																<td><span id="fnac_p">20/09</span></td> <td><span id="edad_p">35 AÑOS</span></td>
																<td><span id="entidad_nac">MORELOS</span></td> <td><span id="telefono_p">(735)-288-8462</span></td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td>
														<table class="table-condensed table-bordered" width="100%">
															<tr class="bg-info"> <td nowrap>DIRECCIÓN. CALLE Y NÚMERO</td><td>COLONIA</td><td>LOCALIDAD</td><td>MUNICIPIO</td><td>ESTADO</td> </tr>
															<tr class="">
																<td><span id="calle_numero_d_p"></span></td>
																<td><span id="colonia_d_p"></span></td>
																<td><span id="localidad_d_p"></span></td>
																<td><span id="municipio_d_p"></span></td>
																<td><span id="estado_d_p"></span></td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td>
														<table class="table-condensed table-bordered" width="100%">
															<tr>
																<td class="bg-success" colspan="3">DIAGNÓSTICO: </td>
																<td class="bg-success" colspan="2">MÉDICO TRATANTE</td>
															</tr>
															<tr>
																<td colspan="3">
																	<input type="text" class="form-control input-sm" id="dx_p" name="dx_p" required>
																</td>
																<td colspan="2">
																	<select id="medico_tratante_p" name="medico_tratante_p" class="form-control input-sm" required></select>
																</td>
															</tr>
															<tr class="bg-success">
																<td>SERVICIO</td>
																<td>FECHA</td>
																<td>INGRESO</td>
																<td>CAMA No.</td>
																<td>REG.</td>
															</tr>
															<tr>
																<td><input type="text" class="form-control input-sm" id="servicio_p" name="servicio_p" required></td>
																<td><input type="text" class="form-control input-sm" id="fecha_p" name="fecha_p" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="text-align: center;" required readonly></td>
																<td><input type="text" class="form-control input-sm" id="ingreso_p" name="ingreso_p" required></td>
																<td><input type="text" class="form-control input-sm" id="cama_p" name="cama_p" required></td>
																<td><input type="text" class="form-control input-sm" id="reg_p" name="reg_p" required></td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td>
														<form id="form-uno" name="form-uno" data-toggle="validator" role="form">
															<table class="table-condensed table-bordered" width="100%">
																<tr class="bg-primary">
																	<td nowrap width="160">TIPO SANGUÍNEO</td>
																	<td nowrap>
																		CONTACTO EMERGENCIA
																		<button type="submit" class="btn btn-default btn-xs" id="btn-save-ce"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
																	</td>
																	<td nowrap width="140">PARENTESCO</td>
																	<td nowrap width="1%">TELÉFONO DEL CONTACTO</td>
																</tr>
																<tr class="">
																	<td><select id="tsanguineo_p" name="tsanguineo_p" class="form-control"></select></td>
																	<td>
																		<div class="form-group">
																		 <input type="text" id="contacto_p" name="contacto_p" value="" class="form-control" required onKeyUp="conMayusculas(this);">
																		 <div class="help-block with-errors"></div>
																		</div>
																	</td>
																	<td>
																		<div class="form-group">
																		 <select id="parentesco_c_p" name="parentesco_c_p" class="form-control" required></select>
																		 <div class="help-block with-errors"></div>
																		</div>
																	</td>
																	<td>
																		<div class="form-group">
																		 <input type="text" id="telefono_c_p" name="telefono_c_p" value="" class="form-control" data-mask="(999) 999-9999" maxlength="12" min="10" placeholder="Teléfono del contacto" required>
																		 <div class="help-block with-errors"></div>
																		</div>
																	</td>
																</tr>
															</table>
														</form>
													</td>
												</tr>
												<tr>
													<td>
														<form id="form-dos" name="form-dos" data-toggle="validator" role="form">
														<table class="table-condensed table-bordered" width="100%">
															<tr class="bg-primary">
																<td width="185" nowrap>RELIGIÓN</td> <td nowrap width="155">ESCOLARIDAD</td>
																<td>OCUPACIÓN<input type="hidden" id="id_ocupacion" value=""></td>
																<td nowrap>ESTADO CIVIL</td>
															</tr>
															<tr class="">
																<td><select id="religion_p" name="religion_p" class="form-control"></select></td>
																<td><select id="escolaridad_p" name="escolaridad_p" class="form-control"></select></td>
																<td>
																	<input type="text" id="ocupacion_p" name="ocupacion_p" value="" class="form-control typeahead" data-provide="typeahead" onKeyUp="conMayusculas(this);">
																</td>
																<td> <select id="edo_civil_p" name="edo_civil_p" class="form-control"></select> </td>
															</tr>
														</table>
														</form>
													</td>
												</tr>
												<tr>
													<td>
														<table class="table-condensed table-bordered" width="100%">
															<tr>
																<td class="bg-primary" width="1%">APGAR</td>
																<td>
																	<select id="apgar_p" name="apgar_p" class="form-control">
																		<option value="" selected>-Seleccionar-</option> <option value="0">0</option> <option value="1">1</option>
																		<option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option>
																		<option value="6">6</option> <option value="7">7</option> <option value="8">8</option> 
																		<option value="10">10</option>
																	</select>
																</td>
																<td class="bg-primary" width="1%">TAMIZ</td>
																<td>
																	<select id="tamiz_p" name="tamiz_p" class="form-control">
																		<option value="" selected>-Seleccionar-</option> <option value="1">POSITIVO</option> <option value="0">NEGATIVO</option>
																	</select>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td>
														<form id="form-tres" name="form-tres" data-toggle="validator" role="form">
														<table class="table-condensed table-bordered" width="100%">
															<tr> 
																<td width="1%" nowrap class="bg-primary">
																	ALÉRGIAS
																	<button type="submit" class="btn btn-default btn-xs" id="btn-save-ap"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
																</td>
																<td>
																	<div class="form-group">
																	 <textarea style="resize: none;" class="form-control" id="alergias_p" name="alergias_p" required onKeyUp="conMayusculas(this);"></textarea>
																	 <div class="help-block with-errors"></div>
																	</div>
																</td>
															</tr>
														</table>
														</form>
													</td>
												</tr>
												<tr>
													<td align="center" class="bg-success">
														ÚLTIMA TOMA DE SIGNOS VITALES <span class="badge badge-success" id="fecha_usv">20/09/1985</span> POR <span class="badge badge-success" id="usuario_usv">EMMANUEL</span>
														<button type="button" class="btn btn-default btn-sm" id="btn-tomar-sv" style="float: right;">Tomar nuevos datos <i class="fa fa-heartbeat" aria-hidden="true"></i></button>
													</td>
												</tr>
												<tr>
													<td>
														<table class="table-condensed table-bordered" width="100%">
															<tr class="bg-danger" align="center">
																<td>TALLA</td>
																<td>PESO</td>
																<td>IMC</td>
																<td>TEMP</td>
																<td>OXIMETRÍA</td>
															</tr>
															<tr class="">
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="talla_p" name="talla_p" value="1.70" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">m</span>
																	</div>
																</td>
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="peso_p" name="peso_p" value="88" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">kg</span>
																	</div>
																</td>
																<td nowrap align="center"><span id="imc_p"></span></td>
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="temp_p" name="temp_p" value="88" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">ºc</span>
																	</div>
																</td>
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="oxi_p" name="oxi_p" value="37" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">% SaO<sub>2</sub></span>
																	</div>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td>
														<table class="table-condensed table-bordered" width="100%">
															<tr class="bg-danger" align="center"> <td>T</td> <td>A</td> <td>FC</td> <td>FR</td> <td>GLUCOSA</td> </tr>
															<tr class="">
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="t_p" name="t_p" value="100" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">mmHg</span>
																	</div>
																</td>
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="a_p" name="a_p" value="110" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">mmHg</span>
																	</div>
																</td>
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="fc_p" name="fc_p" value="76" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">x min</span>
																	</div>
																</td>
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="fr_p" name="fr_p" value="55" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">x min</span>
																	</div>
																</td>
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="gluc_p" name="gluc_p" value="90" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">mg/dl</span>
																	</div>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td>
														<table class="table-condensed table-bordered" width="100%">
															<tr class="bg-danger" align="center">
																<td>PERÍMETRO ABDOMINAL</td> <td>PERIMETRO CEFALICO</td> <td>PERIMETRO TORACICO</td> <td>MEDIDA DEL PIE</td>
															</tr>
															<tr class="">
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="pa_p" name="pa_p" value="30" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">cm</span>
																	</div>
																</td>
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="pc_p" name="pc_p" value="40" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">cm</span>
																	</div>
																</td>
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="pt_p" name="pt_p" value="50" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">cm</span>
																	</div>
																</td>
																<td>
																	<div class="input-group margin-bottom-sm">
																	  <input type="text" id="pie_p" name="pie_p" value="8" class="form-control sv" style="text-align: right;">
																	  <span class="input-group-addon">cm</span>
																	</div>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td>
														<table class="table-condensed table-bordered" width="100%">
															<tr> 
																<td width="1%" nowrap class="bg-danger">NOTAS</td>
																<td><textarea style="resize: none;" class="form-control sv" id="notas_sv" name="notas_sv"></textarea></td>
															</tr>
														</table>
													</td>
												</tr>
											</table>											
										</div>
									</div>
									<div id="tab-1_2" class="tab-pane">
										<div class="panel-body">
											<table class="table-condensed table-bordered" width="100%">
												<thead><tr role="row" class="bg-primary"><td align="center">MOTIVO DE CONSULTA</td></tr></thead>
												<tbody>
													<tr>
														<td class="bg-success">
															<input style="resize:none; text-align:left" name="motivo_c" id="motivo_c" type="text" value="">
															<input type="hidden" name="motivo_c1" id="motivo_c1">
														</td>
													</tr>
												</tbody>
											</table>
											<table class="table-condensed table-bordered" width="100%">
												<thead><tr role="row" class="bg-primary"><td align="center">EVOLUCIÓN DEL PADECIMIENTO</td></tr></thead>
												<tbody>
													<tr>
														<td class="bg-success">
															<input style="resize:none; text-align:left" name="evolucion_pa" id="evolucion_pa" type="text" value="">
															<input type="hidden" name="evolucion_pa1" id="evolucion_pa1">
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div id="tab-1_3" class="tab-pane">
										<div class="panel-body">
											<table class="table-condensed table-bordered" width="100%">
												<thead><tr role="row" class="bg-primary"><td align="center">INTERROGACIÓN POR APARATOS Y SISTEMAS</td></tr></thead>
												<tbody>
													<tr>
														<td class="bg-success">
															<input style="resize:none; text-align:left" name="interrogacion_as" id="interrogacion_as" type="text" value="">
															<input type="hidden" name="interrogacion_as1" id="interrogacion_as1">
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div id="tab-1_4" class="tab-pane">
										<div class="panel-body">
											<table class="table-condensed table-bordered" width="100%">
												<thead><tr role="row" class="bg-primary"><td align="center">EXPLORACIÓN FÍSICA</td></tr></thead>
												<tbody>
													<tr>
														<td class="bg-success">
															<input style="resize:none; text-align:left" name="exploracion_f" id="exploracion_f" type="text" value="">
															<input type="hidden" name="exploracion_f1" id="exploracion_f1">
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div id="tab-1_5" class="tab-pane">
										<div class="panel-body">
											<table class="table-condensed table-bordered" width="100%">
												<thead><tr role="row" class="bg-primary"><td align="center">EXÁMENES DE LABORATORIO PREVIOS</td></tr></thead>
												<tbody>
													<tr>
														<td class="bg-success">
															<input style="resize:none; text-align:left" name="examenes_prev" id="examenes_prev" type="text" value="">
															<input type="hidden" name="examenes_prev1" id="examenes_prev1">
														</td>
													</tr>
												</tbody>
											</table>
											<table class="table-condensed table-bordered" width="100%">
												<thead><tr role="row" class="bg-primary"><td align="center">OBSERVACIONES / COMENTARIOS FINALES</td></tr></thead>
												<tbody>
													<tr>
														<td class="bg-success">
															<input style="resize:none; text-align:left" name="comentarios_fin" id="comentarios_fin" type="text" value="">
															<input type="hidden" name="comentarios_fin1" id="comentarios_fin1">
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div id="tab-1_6" class="tab-pane">
										<div class="panel-body">
											<table class="table-condensed table-bordered" width="100%">
												<thead><tr role="row" class="bg-primary"><td align="center">INTERROGACIÓN DIAGNÓSTICA</td></tr></thead>
												<tbody>
													<tr>
														<td class="bg-success">
															<input style="resize:none; text-align:left" name="interrogadion_dx" id="interrogadion_dx" type="text" value="">
															<input type="hidden" name="interrogadion_dx1" id="interrogadion_dx1">
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div id="tab-1_7" class="tab-pane">
										<div class="panel-body">
											<div class="tabs-container">
												<ul class="nav nav-tabs">
													<li class="active"><a data-toggle="tab" href="#tab-1_7_1">AHF</a></li>
													<li class=""><a data-toggle="tab" href="#tab-1_7_2">APNP</a></li>
													<li class=""><a data-toggle="tab" href="#tab-1_7_3">APP</a></li>
													<li class=""><a data-toggle="tab" href="#tab-1_7_4">AGO</a></li>
												</ul>
												<div class="tab-content">
													<div id="tab-1_7_1" class="tab-pane active">
														<div class="panel-body">
															<table class="table-condensed table-bordered" width="100%">
																<thead>
																  <tr role="row" class="bg-primary"><td align="center" colspan="4">ANTECEDENTES HEREDO FAMILIARES</td></tr>
																</thead>
																<tbody>
																	<tr>
																		<td class="bg-success">DIABETES</td>
																		<td><textarea class="form-control" id="diabetes_ahf" name="diabetes_ahf" style="resize: none;"></textarea></td>
																		<td class="bg-success" width="1%" nowrap>HIPERTENSIÓN</td>
																		<td>
																			<textarea class="form-control" id="hipertension_ahf" name="hipertension_ahf" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">CÁNCER</td>
																		<td>
																			<textarea class="form-control" id="cancer_ahf" name="cancer_ahf" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success" width="1%" nowrap>OBESIDAD</td>
																		<td>
																			<textarea class="form-control" id="obesidad_ahf" name="obesidad_ahf" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">CARDIOPATÍAS</td>
																		<td>
																			<textarea class="form-control" id="cardiopatias_ahf" name="cardiopatias_ahf" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success">NEFRÓPATAS</td>
																		<td><textarea class="form-control" id="nefropatas_ahf" name="nefropatas_ahf" style="resize: none;"></textarea></td>
																	</tr>
																	<tr>
																		<td class="bg-success" width="1%" nowrap>MALFORMACIONES</td>
																		<td>
																			<textarea class="form-control" id="malformaciones_ahf" name="malformaciones_ahf" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success">TUBERCULOSIS</td>
																		<td><textarea class="form-control" id="tuberculosis_ahf" name="tuberculosis_ahf" style="resize: none;"></textarea></td>
																	</tr>
																	<tr>
																		<td class="bg-success" width="1%" nowrap>PROBLEMAS DE VISTA</td>
																		<td>
																			<textarea class="form-control" id="problemas_vista_ahf" name="problemas_vista_ahf" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success">DEPORTES</td>
																		<td><textarea class="form-control" id="deportes_ahf" name="deportes_ahf" style="resize: none;"></textarea></td>
																	</tr>
																	<tr>
																		<td class="bg-success">OTROS</td>
																		<td colspan="3">
																			<textarea class="form-control" id="otros_ahf" name="otros_ahf" style="resize: none;"></textarea>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<div id="tab-1_7_2" class="tab-pane">
														<div class="panel-body">
															<table class="table-condensed table-bordered" width="100%">
																<thead>
																  <tr role="row" class="bg-primary"><td align="center" colspan="6">ANTECEDENTES PERSONALES NO PATOLÓGICOS</td></tr>
																</thead>
																<tbody>
																	<tr>
																		<td class="bg-success">TABAQUISMO</td>
																		<td colspan="5">
																			<textarea class="form-control" id="tabaquismo_p" name="tabaquismo_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">ALCOHOLISMO</td>
																		<td colspan="5">
																			<textarea class="form-control" id="alcoholismo_p" name="alcoholismo_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">DROGADICCIÓN</td>
																		<td colspan="5">
																			<textarea class="form-control" id="drogadiccion_p" name="drogadiccion_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">ALÉRGIAS</td>
																		<td colspan="5">
																			<textarea class="form-control" id="alergias_p" name="alergias_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success" width="1%" nowrap>TIPO SANGUÍNEO</td>
																		<td valign="">
																			<select id="tsanguineo_p" name="tsanguineo_p" class="form-control"></select>
																		</td>
																		<td class="bg-success" width="1%" nowrap>ALIMENTACIÓN ADECUADA</td>
																		<td>
																			<textarea class="form-control" id="alimentacion_p" name="alimentacion_p" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success" width="140">VIVIENDA CON SERVICIOS BÁSICOS</td>
																		<td>
																			<textarea class="form-control" id="vivienda_p" name="vivienda_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">OTROS</td>
																		<td colspan="5">
																			<textarea class="form-control" id="otros_apnp_p" name="otros_apnp_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<div id="tab-1_7_3" class="tab-pane">
														<div class="panel-body">
															<table class="table-condensed table-bordered" width="100%">
																<thead>
																  <tr role="row" class="bg-primary"><td align="center" colspan="4">ANTECEDENTES PERSONALES PATOLÓGICOS</td></tr>
																</thead>
																<tbody>
																	<tr>
																		<td class="bg-success" width="1%">ENFERMEDADES DE LA INFANCIA</td>
																		<td>
																			<textarea class="form-control" id="enfermedades_in_p" name="enfermedades_in_p" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success">HOSPITALIZCIONES PREVIAS</td>
																		<td>
																			<textarea class="form-control" id="hospitalizaciones_p" name="hospitalizaciones_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">ANTECEDENTES QUIRÚRGICOS</td>
																		<td>
																			<textarea class="form-control" id="a_quirurgicos_p" name="a_quirurgicos_p" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success" width="1%" nowrap>TRANSFUSIONES PREVIAS</td>
																		<td>
																			<textarea class="form-control" id="transfusiones_p" name="transfusiones_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">FRACTURAS</td>
																		<td>
																			<textarea class="form-control" id="fracturas_p" name="fracturas_p" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success">ACCIDENTES/TRAUMATISMOS</td>
																		<td>
																			<textarea class="form-control" id="accidentes_p" name="accidentes_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">ENFERMEDADES DE LA PIEL</td>
																		<td>
																			<textarea class="form-control" id="enfermedades_piel" name="enfermedades_piel" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success">DESNUTRICIÓN</td>
																		<td>
																			<textarea class="form-control" id="desnutricion_p" name="desnutricion_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">DEFECTOS POSTURALES</td>
																		<td>
																			<textarea class="form-control" id="posturales_p" name="posturales_p" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success">DEFECTOS POSTQUIRURGICO</td>
																		<td>
																			<textarea class="form-control" id="defectos_postqui_p" name="defectos_postqui_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">VIH</td>
																		<td>
																			<textarea class="form-control" id="vih_p" name="vih_p" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success">OSTEOPOROSIS</td>
																		<td>
																			<textarea class="form-control" id="osteoporosis_p" name="osteoporosis_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">SARAMPIÓN</td>
																		<td>
																			<textarea class="form-control" id="sarampion_p" name="sarampion_p" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success">PAROTIVITIS</td>
																		<td>
																			<textarea class="form-control" id="parotivitis_p" name="parotivitis_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">HEPATITIS</td>
																		<td>
																			<textarea class="form-control" id="hepatitis_p" name="hepatitis_p" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success">RUBEOLA</td>
																		<td>
																			<textarea class="form-control" id="rubeola_p" name="rubeola_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">ENFERMEDADES DE LOS ORGANOS DE LOS SENTIDOS</td>
																		<td>
																			<textarea class="form-control" id="organos_sentidos_p" name="organos_sentidos_p" style="resize: none;"></textarea>
																		</td>
																		<td class="bg-success">EXPOSICION LABORAL</td>
																		<td>
																			<textarea class="form-control" id="exp_laboral_p" name="exp_laboral_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">MEDICAMENTOS ACTUALES</td>
																		<td colspan="3">
																			<textarea class="form-control" id="medicaciones_p" name="medicaciones_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">OTRAS ENFERMEDADES</td>
																		<td colspan="3">
																			<textarea class="form-control" id="otras_enferm_p" name="otras_enferm_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<div id="tab-1_7_4" class="tab-pane">
														<div class="panel-body">
															<table class="table-condensed table-bordered" width="100%">
																<thead>
																  <tr role="row" class="bg-primary">
																	<td align="center" colspan="6">ANTECEDENTES GINECOBSTÉTRICOS</td>
																  </tr>
																</thead>
																<tbody>
																	<tr>
																		<td class="bg-success">MENARCA</td>
																		<td><input type="text" class="form-control input-sm" id="menarca_p" name="menarca_p"></td>
																		<td class="bg-success" width="" nowrap>CICLOS</td>
																		<td><input type="text" class="form-control input-sm" id="ciclos_p" name="ciclos_p"></td>
																		<td class="bg-success" width="1%" nowrap>RITMO</td>
																		<td><input type="text" class="form-control input-sm" id="ritmo_p" name="ritmo_p"></td>
																	</tr>
																	<tr>
																		<td class="bg-success">FECHA ÚLTIMA MENSTRUACIÓN</td>
																		<td><input type="text" class="form-control input-sm" id="fum_p" name="fum_p" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="text-align: center;" readonly></td>
																		<td class="bg-success">METRORRAGIA</td>
																		<td>
																			<select id="metrorragia_p" name="metrorragia_p" class="form-control input-sm">
																				<option value="" selected>-Selecciona una opción-</option>
																				<option value="MENORRAGIA">MENORRAGIA</option>
																				<option value="MENORREA">MENORREA</option>
																				<option value="PROIOMENORREA">PROIOMENORREA</option>
																				<option value="OPSOMENORREA">OPSOMENORREA</option>
																				<option value="POLIHIPERMENORREA">POLIHIPERMENORREA</option>
																				<option value="AMENORREA">AMENORREA</option>
																				<option value="OLIGOMENORREA">OLIGOMENORREA</option>
																				<option value="POLIMENORREA">POLIMENORREA</option>
																				<option value="HIPOMENORREA">HIPOMENORREA</option>
																				<option value="HIPERMENORREA">HIPERMENORREA</option>
																			</select>
																		</td>
																		<td class="bg-success">DISMENORREA</td>
																		<td>
																			<select id="dismenorrea_p" name="dismenorrea_p" class="form-control input-sm">
																				<option value="" selected>-Selecciona una opción-</option>
																				<option value="PRIMARIA">PRIMARIA</option>
																				<option value="SECUNDARIA">SECUNDARIA</option>
																			</select>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">IVSA</td>
																		<td><input type="text" class="form-control input-sm" id="ivsa_p" name="ivsa_p"></td>
																		<td class="bg-success">No. PAREJAS SEXUALES</td>
																		<td><input type="number" class="form-control input-sm" id="no_parejas_p" name="no_parejas_p" style="text-align: right" min="0" max="100" step="1"></td>
																		<td class="bg-success">GPAC</td>
																		<td><input type="text" class="form-control input-sm" id="gpac_p" name="gpac_p"></td>
																	</tr>
																	<tr>
																		<td class="bg-success" width="1%" nowrap>ÚLTIMA CITOLOGÍA (PAP)</td>
																		<td colspan="5">
																			<textarea class="form-control" id="ultima_cito_p" name="ultima_cito_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																	<tr>
																		<td class="bg-success">MÉTODO DE PLANIFICACIÓN FAMILIAR</td>
																		<td colspan="5">
																			<textarea class="form-control" id="metodo_pf_p" name="metodo_pf_p" style="resize: none;"></textarea>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						</form>
					</div>
					<div id="tab-2" class="tab-pane">
						<div class="panel-body">
							b
						</div>
					</div>
					<div id="tab-3" class="tab-pane">
						<div class="panel-body">
							<div class="tabs-container">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#tab-3_1" id="t_3_1">NOTAS</a></li>
									<li class=""><a data-toggle="tab" href="#tab-3_2" id="t_3_2">RECETAS</a></li>
									<li class=""><a data-toggle="tab" href="#tab-3_3" id="t_3_3">DIAGNÓSTICOS</a></li>
									<li class=""><a data-toggle="tab" href="#tab-3_4" id="t_3_4">MEDICAMENTOS</a></li>
									<li role="presentation" class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
											EXTERNOS <span class="caret"></span>
										</a>
										<ul class="dropdown-menu">
											<li class=""><a data-toggle="tab" href="#tab-3_5" id="a_t_d_5">NOTAS</a></li>
											<li class=""><a data-toggle="tab" href="#tab-3_6" id="a_t_d_6">RECETAS</a></li>
										</ul>
									</li>
								</ul>
								<div class="tab-content">
									<div id="tab-3_1" class="tab-pane active">
										<div class="panel-body">
											<table width="100%" border="0" cellpadding="0" cellspacing="4">
												<tr>
													<td width="350px" valign="top">
														<table width="100%" height="100%" class="table-condensed table-bordered table-striped" id="dataTable_3_1">
															<thead id="cabecera_t3_1" >
															  <tr class="bg-primary">
																<th id="clickme3_1" nowrap width="1%">#</th>
																<th width="1px">FECHA</th>
																<th>NOTA</th>
																<th>MÉDICO</th>
															  </tr>
															</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
															<tfoot>
																<tr>
																	<th></th>
																	<th><input type="text" class="form-control input-sm" placeholder="-FECHA-" style="width:99%;"/></th>
																	<th><input type="text" class="form-control input-sm" placeholder="-NOTA-" style="width:99%;"/></th>
																	<th><input type="text" class="form-control input-sm" placeholder="-MÉDICO-" style="width:99%;"/></th>
																</tr>
															</tfoot>
														</table>
													</td>
													<td valign="top">
														<div class="tabs-container">
															<ul class="nav nav-tabs">
																<li class="active"><a data-toggle="tab" href="#tab-3_1_1">NOTA</a></li>
																<li class=""><a data-toggle="tab" href="#tab-3_1_2">IMÁGENES</a></li>
															</ul>
															<div class="tab-content">
																<div id="tab-3_1_1" class="tab-pane active">
																	<div class="panel-body" id="panel_mi_nota" style="overflow-y: scroll;">
																		3_1_1
																	</div>
																</div>
																<div id="tab-3_1_2" class="tab-pane">
																	<div class="panel-body" id="panel_mis_imgs_nota" style="overflow-y: scroll;">
																		3_1_2
																	</div>
																</div>
															</div>
														</div>
													</td>
												</tr>
											</table>
										</div>
									</div>
									<div id="tab-3_2" class="tab-pane">
										<div class="panel-body">
											3_b
										</div>
									</div>
									<div id="tab-3_3" class="tab-pane">
										<div class="panel-body">
											3_c
										</div>
									</div>
									<div id="tab-3_4" class="tab-pane">
										<div class="panel-body">
											3_d
										</div>
									</div>
									<div id="tab-3_5" class="tab-pane">
										<div class="panel-body">
											3_e
										</div>
									</div>
									<div id="tab-3_6" class="tab-pane">
										<div class="panel-body">
											3_f
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="tab-4" class="tab-pane">
						<div class="panel-body">
							<div class="tabs-container">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#tab-4_1">LABORATORIO</a></li>
									<li class=""><a data-toggle="tab" href="#tab-4_2">IMAGEN</a></li>
									<li class=""><a data-toggle="tab" href="#tab-4_3">OTROS</a></li>
								</ul>
								<div class="tab-content">
									<div id="tab-4_1" class="tab-pane active">
										<div class="panel-body">
											4_a
										</div>
									</div>
									<div id="tab-4_2" class="tab-pane">
										<div class="panel-body">
											4_b
										</div>
									</div>
									<div id="tab-4_3" class="tab-pane">
										<div class="panel-body">
											4_c
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="tab-5" class="tab-pane">
						<div class="panel-body">
							<div class="tabs-container">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#tab-5_1">RIESGOS</a></li>
									<li class=""><a data-toggle="tab" href="#tab-5_2">HISTORIAL</a></li>
									<li class=""><a data-toggle="tab" href="#tab-5_3">GRÁFICAS</a></li>
								</ul>
								<div class="tab-content">
									<div id="tab-5_1" class="tab-pane active">
										<div class="panel-body">
											5_a
										</div>
									</div>
									<div id="tab-5_2" class="tab-pane">
										<div class="panel-body">
											5_b
										</div>
									</div>
									<div id="tab-5_3" class="tab-pane">
										<div class="panel-body">
											5_c
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="tab-6" class="tab-pane">
						<div class="panel-body">
							<div class="tabs-container">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#tab-6_1">CUADRO BÁSICO</a></li>
									<li class=""><a data-toggle="tab" href="#tab-6_2">OTRAS</a></li>
								</ul>
								<div class="tab-content">
									<div id="tab-6_1" class="tab-pane active">
										<div class="panel-body">
											6_a
										</div>
									</div>
									<div id="tab-6_2" class="tab-pane">
										<div class="panel-body">
											6_b
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="tab-7" class="tab-pane">
						<div class="panel-body">
							<div class="tabs-container">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#tab-7_1">GENERALES</a></li>
									<li class=""><a data-toggle="tab" href="#tab-7_2">IMÁGENES</a></li>
								</ul>
								<div class="tab-content">
									<div id="tab-7_1" class="tab-pane active">
										<div class="panel-body">
											7_a
										</div>
									</div>
									<div id="tab-7_2" class="tab-pane">
										<div class="panel-body">
											7_b
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <div id="auxiliar" class="hidden"></div> <div id="auxiliar1" class="hidden"></div>
<!-- FIN Contenido -->  
<?php include_once 'partes/footer.php'; ?>

<script>
$(document).ready(function(e) {
	//breadcrumb
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li class="active"><strong>EXPEDIENTE CLÍNICO</strong></li>');
	
	toastr.options = {
	  "closeButton":true,"debug":false,"progressBar":false,"preventDuplicates":true,"positionClass":"toast-top-right","onclick":null,"showDuration":"400",
	  "hideDuration":"1000","timeOut":"2000","extendedTimeOut":"1000","showEasing":"swing","hideEasing":"linear","showMethod": "fadeIn", "hideMethod": "fadeOut"
	}
	
	$('#form-hc').validator();

	$('#div_tabla_pacientes').height($('#referencia').height()-$('#breadc').height()-$('#navcit').height()-$('#my_footer').height()-81);
	
	tinyMCE.init({ selector:'#motivo_c', readonly:false, resize:false,height:$('#myModalx').height()*0.25, theme:"modern", menubar: false, toolbar:false });
	tinyMCE.init({ selector:'#evolucion_pa', readonly:false, resize:false,height:$('#myModalx').height()*0.25, theme:"modern", menubar: false, toolbar:false });
	tinyMCE.init({ selector:'#interrogacion_as', readonly:false, resize:false,height:$('#myModalx').height()*0.55, theme:"modern", menubar: false, toolbar:false });
	tinyMCE.init({ selector:'#exploracion_f', readonly:false, resize:false,height:$('#myModalx').height()*0.55, theme:"modern", menubar: false, toolbar:false });
	tinyMCE.init({ selector:'#examenes_prev', readonly:false, resize:false,height:$('#myModalx').height()*0.25, theme:"modern", menubar: false, toolbar:false });
	tinyMCE.init({ selector:'#comentarios_fin', readonly:false, resize:false,height:$('#myModalx').height()*0.25, theme:"modern", menubar: false, toolbar:false });
	tinyMCE.init({ selector:'#interrogadion_dx', readonly:false, resize:false,height:$('#myModalx').height()*0.55, theme:"modern", menubar: false, toolbar:false });
	
	var datosHC = {idP:$('#id_paciente_hc').val()}
	$.post('enfermeria/files-serverside/datos_historia_clinica.php',datosHC).done(function(data){ var datos = data.split(';*-');
		$('#apellidos_p').text(datos[1]+' '+datos[2]); $('#nombre_p').text(datos[0]); $('#sexo_edad_p').text(datos[3]); $('#dx_p').val(datos[4]);
		$('#medico_tratante_p').load('enfermeria/genera/medico_tratante.php',function(response,status,xhr){if(status=="success"){
			$('#medico_tratante_p').val(datos[5]); window.setTimeout(function(){$('#medico_tratante_p').chosen();},500);
		}});
		$('#servicio_p').val(datos[6]); $('#fecha_p').val(datos[7]); $('#ingreso_p').val(datos[8]); $('#cama_p').val(datos[9]); $('#reg_p').val(datos[10]);
		$('#diabetes_ahf').val(datos[11]); $('#cancer_ahf').val(datos[12]); $('#obesidad_ahf').val(datos[13]); $('#cardiopatias_ahf').val(datos[14]);
		$('#tuberculosis_ahf').val(datos[15]); $('#problemas_vista_ahf').val(datos[16]); $('#deportes_ahf').val(datos[17]); $('#tabaquismo_p').val(datos[18]);
		$('#alcoholismo_p').val(datos[19]); $('#drogadiccion_p').val(datos[20]); $('#alergias_p').val(datos[21]);
		$('#tsanguineo_p').load('enfermeria/genera/tipos_sanguineos.php',function(response,status,xhr){if(status=="success"){ $('#tsanguineo_p').val(datos[22]); }});
		$('#hospitalizaciones_p').val(datos[23]); $('#transfusiones_p').val(datos[24]); $('#fracturas_p').val(datos[25]); $('#enfermedades_piel').val(datos[26]);
		$('#desnutricion_p').val(datos[27]); $('#posturales_p').val(datos[28]); $('#defectos_postqui_p').val(datos[29]); $('#vih_p').val(datos[30]);
		$('#sarampion_p').val(datos[31]); $('#parotivitis_p').val(datos[32]); $('#hepatitis_p').val(datos[33]); $('#rubeola_p').val(datos[34]);
		$('#organos_sentidos_p').val(datos[35]); $('#exp_laboral_p').val(datos[36]); $('#medicaciones_p').val(datos[37]); $('#otras_enferm_p').val(datos[38]);
		$('#gpac_p').val(datos[39]); $('#hipertension_ahf').val(datos[40]); $('#nefropatas_ahf').val(datos[41]); $('#malformaciones_ahf').val(datos[42]);
		$('#otros_ahf').val(datos[43]); $('#alimentacion_p').val(datos[44]); $('#vivienda_p').val(datos[45]); $('#otros_apnp_p').val(datos[46]);
		$('#enfermedades_in_p').val(datos[47]); $('#a_quirurgicos_p').val(datos[48]); $('#accidentes_p').val(datos[49]); $('#menarca_p').val(datos[50]);
		$('#ciclos_p').val(datos[51]); $('#ritmo_p').val(datos[52]); $('#fum_p').val(datos[53]); $('#metrorragia_p').val(datos[54]); $('#dismenorrea_p').val(datos[55]);
		$('#ivsa_p').val(datos[56]); $('#no_parejas_p').val(datos[57]); $('#ultima_cito_p').val(datos[58]); $('#metodo_pf_p').val(datos[59]);
																								 
		window.setTimeout(function(){
			tinymce.get('motivo_c').setContent(datos[60]); tinymce.get('evolucion_pa').setContent(datos[61]); tinymce.get('interrogacion_as').setContent(datos[62]);
			tinymce.get('exploracion_f').setContent(datos[63]); tinymce.get('examenes_prev').setContent(datos[64]); tinymce.get('comentarios_fin').setContent(datos[65]);
			tinymce.get('interrogadion_dx').setContent(datos[66]); tinymce.get('osteoporosis_p').setContent(datos[67]);
		},1000);
																								 
		$('#form-hc').validator().on('submit', function(e){
		  $('#motivo_c1').val(tinyMCE.get('motivo_c').getContent()); $('#evolucion_pa1').val(tinyMCE.get('evolucion_pa').getContent());
		  $('#interrogacion_as1').val(tinyMCE.get('interrogacion_as').getContent()); $('#exploracion_f1').val(tinyMCE.get('exploracion_f').getContent());
		  $('#examenes_prev1').val(tinyMCE.get('examenes_prev').getContent()); $('#comentarios_fin1').val(tinyMCE.get('comentarios_fin').getContent());
		  $('#interrogadion_dx1').val(tinyMCE.get('interrogadion_dx').getContent());
			
		  if (e.isDefaultPrevented()) { // handle the invalid form...
			  toastr.error('','Favor de llenar todos los datos de la ficha de identificación.');
		  } else { // everything looks good!
			e.preventDefault();
			var datos = $('#form-hc').serialize();
			$.post('enfermeria/files-serverside/salvar_hc.php',datos).done(function(data){
				if (data==1){ toastr.success('','Los datos de la historia clínica se guardaron.'); } else{alert(data);}
			});
		  }
		});
																								 
		$('#t_3_1, #t_3').click(function(e){ $('#clickme3_1').click(); inicializar_notas($('#id_paciente_hc').val()); });
		$('#t_3_2').click(function(e){ $('#clickme3_2').click(); });
		$('#t_3_3').click(function(e){ $('#clickme3_3').click(); }); $('#t_3_4').click(function(e){ $('#clickme3_4').click(); });
		$('#t_3_5').click(function(e){ $('#clickme3_5').click(); });
																								 
		//Consultas
		var tamDT = ($('#div_tabla_pacientes').height())*0.68; $('#panel_mi_nota, #panel_mis_imgs_nota').height(tamDT);
		var oTable3_1 = $('#dataTable_3_1').DataTable({
			serverSide: true,"sScrollY": tamDT, ordering: false, searching: true, scrollCollapse: false, "scrollX": true, destroy:true,
			"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: false, responsive: false,
			"aoColumns": [ {"bVisible":true}, {"bVisible":true },{ "bVisible": true }, {"bVisible":true } ],
			"sDom": '<"">Tr<""t><""S><"">',
			deferRender: true, select: { style: 'single' }, "processing": false, "sAjaxSource": "pacientes/datatable-serverside/notas_ece.php",
			"fnServerParams": function(aoData, fnCallback){ var id_pa = $('#id_paciente_hc').val(); aoData.push( {"name": "id_p", "value": id_pa } ); },
			"oLanguage": {
				"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", 
				"sInfo": "NOTAS FILTRADAS: _END_", "sInfoEmpty": "NINGUNA NOTA FILTRADA.", "sInfoFiltered": " TOTAL DE NOTAS: _MAX_", "sSearch": "",
				"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
			},"iDisplayLength": 5, paging: true,
		});

		$('#clickme3_1').click(function(e) { oTable3_1.draw(); }); window.setTimeout(function(){$('#clickme3_1').click();},300);

		//para los fintros individuales por campo de texto
		oTable3_1.columns().every( function () {
			var that = this; $('input', this.footer()).on('keyup change', function () { if ( that.search() !== this.value ) { that .search( this.value ) .draw(); } } );
		} );
		//fin filtros individuales por campo de texto
		
		//Fin Consultas
	});
	
});
	
function inicializar_notas(id_p){
	var datos = {id_p:id_p}
	$.post('pacientes/files-serverside/inicializar_notas_ece.php',datos).done(function(data){
		$('#panel_mi_nota').html(data);
	});
}
</script>