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

    <title>SISTEMA - REPORTE DIARIO</title>

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

    <link href="c3/c3.css" rel="stylesheet">
</head>
<?php include_once 'partes/header.php'; ?>
<!-- Contenido -->
<div style="width:100%;">
	<table width="100%" border="0" cellpadding="5" id="tablita">
		<tr>
			<td width="200px" id="fechita">
				<div class="input-group date">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="mi_fecha" class="form-control" value="<?php echo date("m/Y"); ?>">
						<input type="hidden" id="mi_mes" value="<?php echo date("m"); ?>">
				</div>
			</td>
			<td width="5px"></td>
			<td width="1%" style="display: none;">
				<button type="button" class="btn btn-success" id="btn_save_all"><i class="fa fa-plus"></i> Ingresar dato</button>
			</td>
			<td align="right">
				<div class="radio radio-inline" style="vertical-align: top; margin-top: 0px;">
						<input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
						<label for="inlineRadio1" style="padding-left: 0px;"> Tabla </label>
				</div>
				<div class="radio radio-inline" style="vertical-align: top;">
						<input type="radio" id="inlineRadio2" value="option2" name="radioInline">
						<label for="inlineRadio2" style="padding-left: 0px;"> Gráfica </label>
				</div>
			</td>
		</tr>
	</table>
</div>
<br>
<div id="div_tabla_pacientes" class="table-responsive" style="border:1px none red; vertical-align:top; margin-top:-9px;">
<table width="100%" height="100%" border="1" id="dataTablePrincipal" class="table-hover table-striped table-condensed" style="font-size: small;">
	<thead>
		<tr class="bg-primary">
	    <th style="vertical-align:middle;">INDICADOR</th>
	    <th style="vertical-align:middle;">1</th>
	    <th style="vertical-align:middle;">2</th>
	    <th style="vertical-align:middle;">3</th>
	    <th style="vertical-align:middle;">4</th>
	    <th style="vertical-align:middle;">5</th>
	    <th style="vertical-align:middle;">6</th>
	    <th style="vertical-align:middle;">7</th>
			<th style="vertical-align:middle;">8</th>
			<th style="vertical-align:middle;">9</th>
			<th style="vertical-align:middle;">10</th>
			<th style="vertical-align:middle;">11</th>
	    <th style="vertical-align:middle;">12</th>
	    <th style="vertical-align:middle;">13</th>
	    <th style="vertical-align:middle;">14</th>
	    <th style="vertical-align:middle;">15</th>
	    <th style="vertical-align:middle;">16</th>
	    <th style="vertical-align:middle;">17</th>
			<th style="vertical-align:middle;">18</th>
			<th style="vertical-align:middle;">19</th>
			<th style="vertical-align:middle;">20</th>
			<th style="vertical-align:middle;">21</th>
	    <th style="vertical-align:middle;">22</th>
	    <th style="vertical-align:middle;">23</th>
	    <th style="vertical-align:middle;">24</th>
	    <th style="vertical-align:middle;">25</th>
	    <th style="vertical-align:middle;">26</th>
	    <th style="vertical-align:middle;">27</th>
			<th style="vertical-align:middle;">28</th>
			<th style="vertical-align:middle;">29</th>
			<th style="vertical-align:middle;" class="no28">30</th>
			<th style="vertical-align:middle;" class="no28 no30">31</th>
			<th style="vertical-align:middle;">TOTALES</th>
			<th style="vertical-align:middle;">GRAFICA</th>
	  </tr>
	</thead>
<tbody>
	<tr>
		<td nowrap>CONSULTAS U-M</td>
		<td id="1-1"></td>
		<td id="1-2"></td>
		<td id="1-3"></td>
		<td id="1-4"></td>
		<td id="1-5"></td>
		<td id="1-6"></td>
		<td id="1-7"></td>
		<td id="1-8"></td>
		<td id="1-9"></td>
		<td id="1-10"></td>
		<td id="1-11"></td>
		<td id="1-12"></td>
		<td id="1-13"></td>
		<td id="1-14"></td>
		<td id="1-15"></td>
		<td id="1-16"></td>
		<td id="1-17"></td>
		<td id="1-18"></td>
		<td id="1-19"></td>
		<td id="1-20"></td>
		<td id="1-21"></td>
		<td id="1-22"></td>
		<td id="1-23"></td>
		<td id="1-24"></td>
		<td id="1-25"></td>
		<td id="1-26"></td>
		<td id="1-27"></td>
		<td id="1-28"></td>
		<td id="1-29"></td>
		<td id="1-30" class="no28"></td>
		<td id="1-31" class="no28 no30"></td>
		<td id="t-1"></td>
		<td align="center">
			<button type="button" lang="CONSULTAS U-M" class="btn btn-xs btn-info mi_grafica" id="btn_grap_1"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>CONSULTAS U-V</td>
		<td id="2-1"></td>
		<td id="2-2"></td>
		<td id="2-3"></td>
		<td id="2-4"></td>
		<td id="2-5"></td>
		<td id="2-6"></td>
		<td id="2-7"></td>
		<td id="2-8"></td>
		<td id="2-9"></td>
		<td id="2-10"></td>
		<td id="2-11"></td>
		<td id="2-12"></td>
		<td id="2-13"></td>
		<td id="2-14"></td>
		<td id="2-15"></td>
		<td id="2-16"></td>
		<td id="2-17"></td>
		<td id="2-18"></td>
		<td id="2-19"></td>
		<td id="2-20"></td>
		<td id="2-21"></td>
		<td id="2-22"></td>
		<td id="2-23"></td>
		<td id="2-24"></td>
		<td id="2-25"></td>
		<td id="2-26"></td>
		<td id="2-27"></td>
		<td id="2-28"></td>
		<td id="2-29"></td>
		<td id="2-30" class="no28"></td>
		<td id="2-31" class="no28 no30"></td>
		<td id="t-2"></td>
		<td align="center">
			<button type="button" lang="CONSULTAS U-V" class="btn btn-xs btn-info mi_grafica" id="btn_grap_2"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>CONSULTAS U-N</td>
		<td id="3-1"></td>
		<td id="3-2"></td>
		<td id="3-3"></td>
		<td id="3-4"></td>
		<td id="3-5"></td>
		<td id="3-6"></td>
		<td id="3-7"></td>
		<td id="3-8"></td>
		<td id="3-9"></td>
		<td id="3-10"></td>
		<td id="3-11"></td>
		<td id="3-12"></td>
		<td id="3-13"></td>
		<td id="3-14"></td>
		<td id="3-15"></td>
		<td id="3-16"></td>
		<td id="3-17"></td>
		<td id="3-18"></td>
		<td id="3-19"></td>
		<td id="3-20"></td>
		<td id="3-21"></td>
		<td id="3-22"></td>
		<td id="3-23"></td>
		<td id="3-24"></td>
		<td id="3-25"></td>
		<td id="3-26"></td>
		<td id="3-27"></td>
		<td id="3-28"></td>
		<td id="3-29"></td>
		<td id="3-30" class="no28"></td>
		<td id="3-31" class="no28 no30"></td>
		<td id="t-3"></td>
		<td align="center">
			<button type="button" lang="CONSULTAS U-N" class="btn btn-xs btn-info mi_grafica" id="btn_grap_3"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>URGENCIAS CALIFICADAS</td>
		<td id="4-1"></td>
		<td id="4-2"></td>
		<td id="4-3"></td>
		<td id="4-4"></td>
		<td id="4-5"></td>
		<td id="4-6"></td>
		<td id="4-7"></td>
		<td id="4-8"></td>
		<td id="4-9"></td>
		<td id="4-10"></td>
		<td id="4-11"></td>
		<td id="4-12"></td>
		<td id="4-13"></td>
		<td id="4-14"></td>
		<td id="4-15"></td>
		<td id="4-16"></td>
		<td id="4-17"></td>
		<td id="4-18"></td>
		<td id="4-19"></td>
		<td id="4-20"></td>
		<td id="4-21"></td>
		<td id="4-22"></td>
		<td id="4-23"></td>
		<td id="4-24"></td>
		<td id="4-25"></td>
		<td id="4-26"></td>
		<td id="4-27"></td>
		<td id="4-28"></td>
		<td id="4-29"></td>
		<td id="4-30" class="no28"></td>
		<td id="4-31" class="no28 no30"></td>
		<td id="t-4"></td>
		<td align="center">
			<button type="button" lang="URGENCIAS CALIFICADAS" class="btn btn-xs btn-info mi_grafica" id="btn_grap_4"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>OTRAS URGENCIAS</td>
		<td id="5-1"></td>
		<td id="5-2"></td>
		<td id="5-3"></td>
		<td id="5-4"></td>
		<td id="5-5"></td>
		<td id="5-6"></td>
		<td id="5-7"></td>
		<td id="5-8"></td>
		<td id="5-9"></td>
		<td id="5-10"></td>
		<td id="5-11"></td>
		<td id="5-12"></td>
		<td id="5-13"></td>
		<td id="5-14"></td>
		<td id="5-15"></td>
		<td id="5-16"></td>
		<td id="5-17"></td>
		<td id="5-18"></td>
		<td id="5-19"></td>
		<td id="5-20"></td>
		<td id="5-21"></td>
		<td id="5-22"></td>
		<td id="5-23"></td>
		<td id="5-24"></td>
		<td id="5-25"></td>
		<td id="5-26"></td>
		<td id="5-27"></td>
		<td id="5-28"></td>
		<td id="5-29"></td>
		<td id="5-30" class="no28"></td>
		<td id="5-31" class="no28 no30"></td>
		<td id="t-5"></td>
		<td align="center">
			<button type="button" lang="OTRAS URGENCIAS" class="btn btn-xs btn-info mi_grafica" id="btn_grap_5"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>HOSPITALIZADOS GENERAL</td>
		<td id="6-1"></td>
		<td id="6-2"></td>
		<td id="6-3"></td>
		<td id="6-4"></td>
		<td id="6-5"></td>
		<td id="6-6"></td>
		<td id="6-7"></td>
		<td id="6-8"></td>
		<td id="6-9"></td>
		<td id="6-10"></td>
		<td id="6-11"></td>
		<td id="6-12"></td>
		<td id="6-13"></td>
		<td id="6-14"></td>
		<td id="6-15"></td>
		<td id="6-16"></td>
		<td id="6-17"></td>
		<td id="6-18"></td>
		<td id="6-19"></td>
		<td id="6-20"></td>
		<td id="6-21"></td>
		<td id="6-22"></td>
		<td id="6-23"></td>
		<td id="6-24"></td>
		<td id="6-25"></td>
		<td id="6-26"></td>
		<td id="6-27"></td>
		<td id="6-28"></td>
		<td id="6-29"></td>
		<td id="6-30" class="no28"></td>
		<td id="6-31" class="no28 no30"></td>
		<td id="t-6"></td>
		<td align="center">
			<button type="button" lang="HOSPITALIZADOS GENERAL" class="btn btn-xs btn-info mi_grafica" id="btn_grap_6"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>HOSPITALIZADOS PEDIATRIA</td>
		<td id="7-1"></td>
		<td id="7-2"></td>
		<td id="7-3"></td>
		<td id="7-4"></td>
		<td id="7-5"></td>
		<td id="7-6"></td>
		<td id="7-7"></td>
		<td id="7-8"></td>
		<td id="7-9"></td>
		<td id="7-10"></td>
		<td id="7-11"></td>
		<td id="7-12"></td>
		<td id="7-13"></td>
		<td id="7-14"></td>
		<td id="7-15"></td>
		<td id="7-16"></td>
		<td id="7-17"></td>
		<td id="7-18"></td>
		<td id="7-19"></td>
		<td id="7-20"></td>
		<td id="7-21"></td>
		<td id="7-22"></td>
		<td id="7-23"></td>
		<td id="7-24"></td>
		<td id="7-25"></td>
		<td id="7-26"></td>
		<td id="7-27"></td>
		<td id="7-28"></td>
		<td id="7-29"></td>
		<td id="7-30" class="no28"></td>
		<td id="7-31" class="no28 no30"></td>
		<td id="t-7"></td>
		<td align="center">
			<button type="button" lang="HOSPITALIZADOS PEDIATRIA" class="btn btn-xs btn-info mi_grafica" id="btn_grap_7"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>HOSPITALIZADOS NEONATOS</td>
		<td id="8-1"></td>
		<td id="8-2"></td>
		<td id="8-3"></td>
		<td id="8-4"></td>
		<td id="8-5"></td>
		<td id="8-6"></td>
		<td id="8-7"></td>
		<td id="8-8"></td>
		<td id="8-9"></td>
		<td id="8-10"></td>
		<td id="8-11"></td>
		<td id="8-12"></td>
		<td id="8-13"></td>
		<td id="8-14"></td>
		<td id="8-15"></td>
		<td id="8-16"></td>
		<td id="8-17"></td>
		<td id="8-18"></td>
		<td id="8-19"></td>
		<td id="8-20"></td>
		<td id="8-21"></td>
		<td id="8-22"></td>
		<td id="8-23"></td>
		<td id="8-24"></td>
		<td id="8-25"></td>
		<td id="8-26"></td>
		<td id="8-27"></td>
		<td id="8-28"></td>
		<td id="8-29"></td>
		<td id="8-30" class="no28"></td>
		<td id="8-31" class="no28 no30"></td>
		<td id="t-8"></td>
		<td align="center">
			<button type="button" lang="HOSPITALIZADOS NEONATOS" class="btn btn-xs btn-info mi_grafica" id="btn_grap_8"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>HOPITALIZADOS G-O</td>
		<td id="9-1"></td>
		<td id="9-2"></td>
		<td id="9-3"></td>
		<td id="9-4"></td>
		<td id="9-5"></td>
		<td id="9-6"></td>
		<td id="9-7"></td>
		<td id="9-8"></td>
		<td id="9-9"></td>
		<td id="9-10"></td>
		<td id="9-11"></td>
		<td id="9-12"></td>
		<td id="9-13"></td>
		<td id="9-14"></td>
		<td id="9-15"></td>
		<td id="9-16"></td>
		<td id="9-17"></td>
		<td id="9-18"></td>
		<td id="9-19"></td>
		<td id="9-20"></td>
		<td id="9-21"></td>
		<td id="9-22"></td>
		<td id="9-23"></td>
		<td id="9-24"></td>
		<td id="9-25"></td>
		<td id="9-26"></td>
		<td id="9-27"></td>
		<td id="9-28"></td>
		<td id="9-29"></td>
		<td id="9-30" class="no28"></td>
		<td id="9-31" class="no28 no30"></td>
		<td id="t-9"></td>
		<td align="center">
			<button type="button" lang="HOPITALIZADOS G-O" class="btn btn-xs btn-info mi_grafica" id="btn_grap_9"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>HOSPITALIZADOS M-I</td>
		<td id="10-1"></td>
		<td id="10-2"></td>
		<td id="10-3"></td>
		<td id="10-4"></td>
		<td id="10-5"></td>
		<td id="10-6"></td>
		<td id="10-7"></td>
		<td id="10-8"></td>
		<td id="10-9"></td>
		<td id="10-10"></td>
		<td id="10-11"></td>
		<td id="10-12"></td>
		<td id="10-13"></td>
		<td id="10-14"></td>
		<td id="10-15"></td>
		<td id="10-16"></td>
		<td id="10-17"></td>
		<td id="10-18"></td>
		<td id="10-19"></td>
		<td id="10-20"></td>
		<td id="10-21"></td>
		<td id="10-22"></td>
		<td id="10-23"></td>
		<td id="10-24"></td>
		<td id="10-25"></td>
		<td id="10-26"></td>
		<td id="10-27"></td>
		<td id="10-28"></td>
		<td id="10-29"></td>
		<td id="10-30" class="no28"></td>
		<td id="10-31" class="no28 no30"></td>
		<td id="t-10"></td>
		<td align="center">
			<button type="button" lang="HOSPITALIZADOS M-I" class="btn btn-xs btn-info mi_grafica" id="btn_grap_10"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>HOSPITALIZADOS CIRUGÍA</td>
		<td id="11-1"></td>
		<td id="11-2"></td>
		<td id="11-3"></td>
		<td id="11-4"></td>
		<td id="11-5"></td>
		<td id="11-6"></td>
		<td id="11-7"></td>
		<td id="11-8"></td>
		<td id="11-9"></td>
		<td id="11-10"></td>
		<td id="11-11"></td>
		<td id="11-12"></td>
		<td id="11-13"></td>
		<td id="11-14"></td>
		<td id="11-15"></td>
		<td id="11-16"></td>
		<td id="11-17"></td>
		<td id="11-18"></td>
		<td id="11-19"></td>
		<td id="11-20"></td>
		<td id="11-21"></td>
		<td id="11-22"></td>
		<td id="11-23"></td>
		<td id="11-24"></td>
		<td id="11-25"></td>
		<td id="11-26"></td>
		<td id="11-27"></td>
		<td id="11-28"></td>
		<td id="11-29"></td>
		<td id="11-30" class="no28"></td>
		<td id="11-31" class="no28 no30"></td>
		<td id="t-11"></td>
		<td align="center">
			<button type="button" lang="HOSPITALIZADOS CIRUGÍA" class="btn btn-xs btn-info mi_grafica" id="btn_grap_11"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>HOSPITALIZACIÓN JUNIOR S</td>
		<td id="12-1"></td>
		<td id="12-2"></td>
		<td id="12-3"></td>
		<td id="12-4"></td>
		<td id="12-5"></td>
		<td id="12-6"></td>
		<td id="12-7"></td>
		<td id="12-8"></td>
		<td id="12-9"></td>
		<td id="12-10"></td>
		<td id="12-11"></td>
		<td id="12-12"></td>
		<td id="12-13"></td>
		<td id="12-14"></td>
		<td id="12-15"></td>
		<td id="12-16"></td>
		<td id="12-17"></td>
		<td id="12-18"></td>
		<td id="12-19"></td>
		<td id="12-20"></td>
		<td id="12-21"></td>
		<td id="12-22"></td>
		<td id="12-23"></td>
		<td id="12-24"></td>
		<td id="12-25"></td>
		<td id="12-26"></td>
		<td id="12-27"></td>
		<td id="12-28"></td>
		<td id="12-29"></td>
		<td id="12-30" class="no28"></td>
		<td id="12-31" class="no28 no30"></td>
		<td id="t-12"></td>
		<td align="center">
			<button type="button" lang="HOSPITALIZACIÓN JUNIOR S" class="btn btn-xs btn-info mi_grafica" id="btn_grap_12"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>HOSPITALIZACIÓN MASTER S</td>
		<td id="13-1"></td>
		<td id="13-2"></td>
		<td id="13-3"></td>
		<td id="13-4"></td>
		<td id="13-5"></td>
		<td id="13-6"></td>
		<td id="13-7"></td>
		<td id="13-8"></td>
		<td id="13-9"></td>
		<td id="13-10"></td>
		<td id="13-11"></td>
		<td id="13-12"></td>
		<td id="13-13"></td>
		<td id="13-14"></td>
		<td id="13-15"></td>
		<td id="13-16"></td>
		<td id="13-17"></td>
		<td id="13-18"></td>
		<td id="13-19"></td>
		<td id="13-20"></td>
		<td id="13-21"></td>
		<td id="13-22"></td>
		<td id="13-23"></td>
		<td id="13-24"></td>
		<td id="13-25"></td>
		<td id="13-26"></td>
		<td id="13-27"></td>
		<td id="13-28"></td>
		<td id="13-29"></td>
		<td id="13-30" class="no28"></td>
		<td id="13-31" class="no28 no30"></td>
		<td id="t-13"></td>
		<td align="center">
			<button type="button" lang="HOSPITALIZACIÓN MASTER S" class="btn btn-xs btn-info mi_grafica" id="btn_grap_13"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>CIRUGÍAS DE URGENCIA</td>
		<td id="14-1"></td>
		<td id="14-2"></td>
		<td id="14-3"></td>
		<td id="14-4"></td>
		<td id="14-5"></td>
		<td id="14-6"></td>
		<td id="14-7"></td>
		<td id="14-8"></td>
		<td id="14-9"></td>
		<td id="14-10"></td>
		<td id="14-11"></td>
		<td id="14-12"></td>
		<td id="14-13"></td>
		<td id="14-14"></td>
		<td id="14-15"></td>
		<td id="14-16"></td>
		<td id="14-17"></td>
		<td id="14-18"></td>
		<td id="14-19"></td>
		<td id="14-20"></td>
		<td id="14-21"></td>
		<td id="14-22"></td>
		<td id="14-23"></td>
		<td id="14-24"></td>
		<td id="14-25"></td>
		<td id="14-26"></td>
		<td id="14-27"></td>
		<td id="14-28"></td>
		<td id="14-29"></td>
		<td id="14-30" class="no28"></td>
		<td id="14-31" class="no28 no30"></td>
		<td id="t-14"></td>
		<td align="center">
			<button type="button" lang="CIRUGÍAS DE URGENCIA" class="btn btn-xs btn-info mi_grafica" id="btn_grap_14"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>CIRUGÍAS PROGRAMADAS</td>
		<td id="15-1"></td>
		<td id="15-2"></td>
		<td id="15-3"></td>
		<td id="15-4"></td>
		<td id="15-5"></td>
		<td id="15-6"></td>
		<td id="15-7"></td>
		<td id="15-8"></td>
		<td id="15-9"></td>
		<td id="15-10"></td>
		<td id="15-11"></td>
		<td id="15-12"></td>
		<td id="15-13"></td>
		<td id="15-14"></td>
		<td id="15-15"></td>
		<td id="15-16"></td>
		<td id="15-17"></td>
		<td id="15-18"></td>
		<td id="15-19"></td>
		<td id="15-20"></td>
		<td id="15-21"></td>
		<td id="15-22"></td>
		<td id="15-23"></td>
		<td id="15-24"></td>
		<td id="15-25"></td>
		<td id="15-26"></td>
		<td id="15-27"></td>
		<td id="15-28"></td>
		<td id="15-29"></td>
		<td id="15-30" class="no28"></td>
		<td id="15-31" class="no28 no30"></td>
		<td id="t-15"></td>
		<td align="center">
			<button type="button" lang="CIRUGÍAS PROGRAMADAS" class="btn btn-xs btn-info mi_grafica" id="btn_grap_15"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>PACIENTES EN P.B.R.</td>
		<td id="16-1"></td>
		<td id="16-2"></td>
		<td id="16-3"></td>
		<td id="16-4"></td>
		<td id="16-5"></td>
		<td id="16-6"></td>
		<td id="16-7"></td>
		<td id="16-8"></td>
		<td id="16-9"></td>
		<td id="16-10"></td>
		<td id="16-11"></td>
		<td id="16-12"></td>
		<td id="16-13"></td>
		<td id="16-14"></td>
		<td id="16-15"></td>
		<td id="16-16"></td>
		<td id="16-17"></td>
		<td id="16-18"></td>
		<td id="16-19"></td>
		<td id="16-20"></td>
		<td id="16-21"></td>
		<td id="16-22"></td>
		<td id="16-23"></td>
		<td id="16-24"></td>
		<td id="16-25"></td>
		<td id="16-26"></td>
		<td id="16-27"></td>
		<td id="16-28"></td>
		<td id="16-29"></td>
		<td id="16-30" class="no28"></td>
		<td id="16-31" class="no28 no30"></td>
		<td id="t-16"></td>
		<td align="center">
			<button type="button" lang="PACIENTES EN P.B.R." class="btn btn-xs btn-info mi_grafica" id="btn_grap_16"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>LEGRADOS</td>
		<td id="17-1"></td>
		<td id="17-2"></td>
		<td id="17-3"></td>
		<td id="17-4"></td>
		<td id="17-5"></td>
		<td id="17-6"></td>
		<td id="17-7"></td>
		<td id="17-8"></td>
		<td id="17-9"></td>
		<td id="17-10"></td>
		<td id="17-11"></td>
		<td id="17-12"></td>
		<td id="17-13"></td>
		<td id="17-14"></td>
		<td id="17-15"></td>
		<td id="17-16"></td>
		<td id="17-17"></td>
		<td id="17-18"></td>
		<td id="17-19"></td>
		<td id="17-20"></td>
		<td id="17-21"></td>
		<td id="17-22"></td>
		<td id="17-23"></td>
		<td id="17-24"></td>
		<td id="17-25"></td>
		<td id="17-26"></td>
		<td id="17-27"></td>
		<td id="17-28"></td>
		<td id="17-29"></td>
		<td id="17-30" class="no28"></td>
		<td id="17-31" class="no28 no30"></td>
		<td id="t-17"></td>
		<td align="center">
			<button type="button" lang="LEGRADOS" class="btn btn-xs btn-info mi_grafica" id="btn_grap_17"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>PARTOS</td>
		<td id="18-1"></td>
		<td id="18-2"></td>
		<td id="18-3"></td>
		<td id="18-4"></td>
		<td id="18-5"></td>
		<td id="18-6"></td>
		<td id="18-7"></td>
		<td id="18-8"></td>
		<td id="18-9"></td>
		<td id="18-10"></td>
		<td id="18-11"></td>
		<td id="18-12"></td>
		<td id="18-13"></td>
		<td id="18-14"></td>
		<td id="18-15"></td>
		<td id="18-16"></td>
		<td id="18-17"></td>
		<td id="18-18"></td>
		<td id="18-19"></td>
		<td id="18-20"></td>
		<td id="18-21"></td>
		<td id="18-22"></td>
		<td id="18-23"></td>
		<td id="18-24"></td>
		<td id="18-25"></td>
		<td id="18-26"></td>
		<td id="18-27"></td>
		<td id="18-28"></td>
		<td id="18-29"></td>
		<td id="18-30" class="no28"></td>
		<td id="18-31" class="no28 no30"></td>
		<td id="t-18"></td>
		<td align="center">
			<button type="button" lang="PARTOS" class="btn btn-xs btn-info mi_grafica" id="btn_grap_18"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>CESAREAS URGENCIAS</td>
		<td id="19-1"></td>
		<td id="19-2"></td>
		<td id="19-3"></td>
		<td id="19-4"></td>
		<td id="19-5"></td>
		<td id="19-6"></td>
		<td id="19-7"></td>
		<td id="19-8"></td>
		<td id="19-9"></td>
		<td id="19-10"></td>
		<td id="19-11"></td>
		<td id="19-12"></td>
		<td id="19-13"></td>
		<td id="19-14"></td>
		<td id="19-15"></td>
		<td id="19-16"></td>
		<td id="19-17"></td>
		<td id="19-18"></td>
		<td id="19-19"></td>
		<td id="19-20"></td>
		<td id="19-21"></td>
		<td id="19-22"></td>
		<td id="19-23"></td>
		<td id="19-24"></td>
		<td id="19-25"></td>
		<td id="19-26"></td>
		<td id="19-27"></td>
		<td id="19-28"></td>
		<td id="19-29"></td>
		<td id="19-30" class="no28"></td>
		<td id="19-31" class="no28 no30"></td>
		<td id="t-19"></td>
		<td align="center">
			<button type="button" lang="CESAREAS URGENCIAS" class="btn btn-xs btn-info mi_grafica" id="btn_grap_19"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>CESAREAS PROGRAMADAS</td>
		<td id="20-1"></td>
		<td id="20-2"></td>
		<td id="20-3"></td>
		<td id="20-4"></td>
		<td id="20-5"></td>
		<td id="20-6"></td>
		<td id="20-7"></td>
		<td id="20-8"></td>
		<td id="20-9"></td>
		<td id="20-10"></td>
		<td id="20-11"></td>
		<td id="20-12"></td>
		<td id="20-13"></td>
		<td id="20-14"></td>
		<td id="20-15"></td>
		<td id="20-16"></td>
		<td id="20-17"></td>
		<td id="20-18"></td>
		<td id="20-19"></td>
		<td id="20-20"></td>
		<td id="20-21"></td>
		<td id="20-22"></td>
		<td id="20-23"></td>
		<td id="20-24"></td>
		<td id="20-25"></td>
		<td id="20-26"></td>
		<td id="20-27"></td>
		<td id="20-28"></td>
		<td id="20-29"></td>
		<td id="20-30" class="no28"></td>
		<td id="20-31" class="no28 no30"></td>
		<td id="t-20"></td>
		<td align="center">
			<button type="button" lang="CESAREAS PROGRAMADAS" class="btn btn-xs btn-info mi_grafica" id="btn_grap_20"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>INTERNAMIENTO URGENCIA</td>
		<td id="21-1"></td>
		<td id="21-2"></td>
		<td id="21-3"></td>
		<td id="21-4"></td>
		<td id="21-5"></td>
		<td id="21-6"></td>
		<td id="21-7"></td>
		<td id="21-8"></td>
		<td id="21-9"></td>
		<td id="21-10"></td>
		<td id="21-11"></td>
		<td id="21-12"></td>
		<td id="21-13"></td>
		<td id="21-14"></td>
		<td id="21-15"></td>
		<td id="21-16"></td>
		<td id="21-17"></td>
		<td id="21-18"></td>
		<td id="21-19"></td>
		<td id="21-20"></td>
		<td id="21-21"></td>
		<td id="21-22"></td>
		<td id="21-23"></td>
		<td id="21-24"></td>
		<td id="21-25"></td>
		<td id="21-26"></td>
		<td id="21-27"></td>
		<td id="21-28"></td>
		<td id="21-29"></td>
		<td id="21-30" class="no28"></td>
		<td id="21-31" class="no28 no30"></td>
		<td id="t-21"></td>
		<td align="center">
			<button type="button" lang="INTERNAMIENTO URGENCIA" class="btn btn-xs btn-info mi_grafica" id="btn_grap_21"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>INTERNAMIENTO REFERIDO</td>
		<td id="22-1"></td>
		<td id="22-2"></td>
		<td id="22-3"></td>
		<td id="22-4"></td>
		<td id="22-5"></td>
		<td id="22-6"></td>
		<td id="22-7"></td>
		<td id="22-8"></td>
		<td id="22-9"></td>
		<td id="22-10"></td>
		<td id="22-11"></td>
		<td id="22-12"></td>
		<td id="22-13"></td>
		<td id="22-14"></td>
		<td id="22-15"></td>
		<td id="22-16"></td>
		<td id="22-17"></td>
		<td id="22-18"></td>
		<td id="22-19"></td>
		<td id="22-20"></td>
		<td id="22-21"></td>
		<td id="22-22"></td>
		<td id="22-23"></td>
		<td id="22-24"></td>
		<td id="22-25"></td>
		<td id="22-26"></td>
		<td id="22-27"></td>
		<td id="22-28"></td>
		<td id="22-29"></td>
		<td id="22-30" class="no28"></td>
		<td id="22-31" class="no28 no30"></td>
		<td id="t-22"></td>
		<td align="center">
			<button type="button" lang="INTERNAMIENTO REFERIDO" class="btn btn-xs btn-info mi_grafica" id="btn_grap_22"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>RX SOLICITADOS M</td>
		<td id="23-1"></td>
		<td id="23-2"></td>
		<td id="23-3"></td>
		<td id="23-4"></td>
		<td id="23-5"></td>
		<td id="23-6"></td>
		<td id="23-7"></td>
		<td id="23-8"></td>
		<td id="23-9"></td>
		<td id="23-10"></td>
		<td id="23-11"></td>
		<td id="23-12"></td>
		<td id="23-13"></td>
		<td id="23-14"></td>
		<td id="23-15"></td>
		<td id="23-16"></td>
		<td id="23-17"></td>
		<td id="23-18"></td>
		<td id="23-19"></td>
		<td id="23-20"></td>
		<td id="23-21"></td>
		<td id="23-22"></td>
		<td id="23-23"></td>
		<td id="23-24"></td>
		<td id="23-25"></td>
		<td id="23-26"></td>
		<td id="23-27"></td>
		<td id="23-28"></td>
		<td id="23-29"></td>
		<td id="23-30" class="no28"></td>
		<td id="23-31" class="no28 no30"></td>
		<td id="t-23"></td>
		<td align="center">
			<button type="button" lang="RX SOLICITADOS M" class="btn btn-xs btn-info mi_grafica" id="btn_grap_23"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>RX SOLICITADOS V</td>
		<td id="24-1"></td>
		<td id="24-2"></td>
		<td id="24-3"></td>
		<td id="24-4"></td>
		<td id="24-5"></td>
		<td id="24-6"></td>
		<td id="24-7"></td>
		<td id="24-8"></td>
		<td id="24-9"></td>
		<td id="24-10"></td>
		<td id="24-11"></td>
		<td id="24-12"></td>
		<td id="24-13"></td>
		<td id="24-14"></td>
		<td id="24-15"></td>
		<td id="24-16"></td>
		<td id="24-17"></td>
		<td id="24-18"></td>
		<td id="24-19"></td>
		<td id="24-20"></td>
		<td id="24-21"></td>
		<td id="24-22"></td>
		<td id="24-23"></td>
		<td id="24-24"></td>
		<td id="24-25"></td>
		<td id="24-26"></td>
		<td id="24-27"></td>
		<td id="24-28"></td>
		<td id="24-29"></td>
		<td id="24-30" class="no28"></td>
		<td id="24-31" class="no28 no30"></td>
		<td id="t-24"></td>
		<td align="center">
			<button type="button" lang="RX SOLICITADOS V" class="btn btn-xs btn-info mi_grafica" id="btn_grap_24"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>RX SOLICITADOS NOCTURNO</td>
		<td id="25-1"></td>
		<td id="25-2"></td>
		<td id="25-3"></td>
		<td id="25-4"></td>
		<td id="25-5"></td>
		<td id="25-6"></td>
		<td id="25-7"></td>
		<td id="25-8"></td>
		<td id="25-9"></td>
		<td id="25-10"></td>
		<td id="25-11"></td>
		<td id="25-12"></td>
		<td id="25-13"></td>
		<td id="25-14"></td>
		<td id="25-15"></td>
		<td id="25-16"></td>
		<td id="25-17"></td>
		<td id="25-18"></td>
		<td id="25-19"></td>
		<td id="25-20"></td>
		<td id="25-21"></td>
		<td id="25-22"></td>
		<td id="25-23"></td>
		<td id="25-24"></td>
		<td id="25-25"></td>
		<td id="25-26"></td>
		<td id="25-27"></td>
		<td id="25-28"></td>
		<td id="25-29"></td>
		<td id="25-30" class="no28"></td>
		<td id="25-31" class="no28 no30"></td>
		<td id="t-25"></td>
		<td align="center">
			<button type="button" lang="RX SOLICITADOS NOCTURNO" class="btn btn-xs btn-info mi_grafica" id="btn_grap_25"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>USG</td>
		<td id="26-1"></td>
		<td id="26-2"></td>
		<td id="26-3"></td>
		<td id="26-4"></td>
		<td id="26-5"></td>
		<td id="26-6"></td>
		<td id="26-7"></td>
		<td id="26-8"></td>
		<td id="26-9"></td>
		<td id="26-10"></td>
		<td id="26-11"></td>
		<td id="26-12"></td>
		<td id="26-13"></td>
		<td id="26-14"></td>
		<td id="26-15"></td>
		<td id="26-16"></td>
		<td id="26-17"></td>
		<td id="26-18"></td>
		<td id="26-19"></td>
		<td id="26-20"></td>
		<td id="26-21"></td>
		<td id="26-22"></td>
		<td id="26-23"></td>
		<td id="26-24"></td>
		<td id="26-25"></td>
		<td id="26-26"></td>
		<td id="26-27"></td>
		<td id="26-28"></td>
		<td id="26-29"></td>
		<td id="26-30" class="no28"></td>
		<td id="26-31" class="no28 no30"></td>
		<td id="t-26"></td>
		<td align="center">
			<button type="button" lang="USG" class="btn btn-xs btn-info mi_grafica" id="btn_grap_26"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>MATUTINO</td>
		<td id="27-1"></td>
		<td id="27-2"></td>
		<td id="27-3"></td>
		<td id="27-4"></td>
		<td id="27-5"></td>
		<td id="27-6"></td>
		<td id="27-7"></td>
		<td id="27-8"></td>
		<td id="27-9"></td>
		<td id="27-10"></td>
		<td id="27-11"></td>
		<td id="27-12"></td>
		<td id="27-13"></td>
		<td id="27-14"></td>
		<td id="27-15"></td>
		<td id="27-16"></td>
		<td id="27-17"></td>
		<td id="27-18"></td>
		<td id="27-19"></td>
		<td id="27-20"></td>
		<td id="27-21"></td>
		<td id="27-22"></td>
		<td id="27-23"></td>
		<td id="27-24"></td>
		<td id="27-25"></td>
		<td id="27-26"></td>
		<td id="27-27"></td>
		<td id="27-28"></td>
		<td id="27-29"></td>
		<td id="27-30" class="no28"></td>
		<td id="27-31" class="no28 no30"></td>
		<td id="t-27"></td>
		<td align="center">
			<button type="button" lang="MATUTINO" class="btn btn-xs btn-info mi_grafica" id="btn_grap_27"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>VESPERTINO</td>
		<td id="28-1"></td>
		<td id="28-2"></td>
		<td id="28-3"></td>
		<td id="28-4"></td>
		<td id="28-5"></td>
		<td id="28-6"></td>
		<td id="28-7"></td>
		<td id="28-8"></td>
		<td id="28-9"></td>
		<td id="28-10"></td>
		<td id="28-11"></td>
		<td id="28-12"></td>
		<td id="28-13"></td>
		<td id="28-14"></td>
		<td id="28-15"></td>
		<td id="28-16"></td>
		<td id="28-17"></td>
		<td id="28-18"></td>
		<td id="28-19"></td>
		<td id="28-20"></td>
		<td id="28-21"></td>
		<td id="28-22"></td>
		<td id="28-23"></td>
		<td id="28-24"></td>
		<td id="28-25"></td>
		<td id="28-26"></td>
		<td id="28-27"></td>
		<td id="28-28"></td>
		<td id="28-29"></td>
		<td id="28-30" class="no28"></td>
		<td id="28-31" class="no28 no30"></td>
		<td id="t-28"></td>
		<td align="center">
			<button type="button" lang="VESPERTINO" class="btn btn-xs btn-info mi_grafica" id="btn_grap_28"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>NOCTURNO</td>
		<td id="29-1"></td>
		<td id="29-2"></td>
		<td id="29-3"></td>
		<td id="29-4"></td>
		<td id="29-5"></td>
		<td id="29-6"></td>
		<td id="29-7"></td>
		<td id="29-8"></td>
		<td id="29-9"></td>
		<td id="29-10"></td>
		<td id="29-11"></td>
		<td id="29-12"></td>
		<td id="29-13"></td>
		<td id="29-14"></td>
		<td id="29-15"></td>
		<td id="29-16"></td>
		<td id="29-17"></td>
		<td id="29-18"></td>
		<td id="29-19"></td>
		<td id="29-20"></td>
		<td id="29-21"></td>
		<td id="29-22"></td>
		<td id="29-23"></td>
		<td id="29-24"></td>
		<td id="29-25"></td>
		<td id="29-26"></td>
		<td id="29-27"></td>
		<td id="29-28"></td>
		<td id="29-29"></td>
		<td id="29-30" class="no28"></td>
		<td id="29-31" class="no28 no30"></td>
		<td id="t-29"></td>
		<td align="center">
			<button type="button" lang="NOCTURNO" class="btn btn-xs btn-info mi_grafica" id="btn_grap_29"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>INGRESOS</td>
		<td id="30-1"></td>
		<td id="30-2"></td>
		<td id="30-3"></td>
		<td id="30-4"></td>
		<td id="30-5"></td>
		<td id="30-6"></td>
		<td id="30-7"></td>
		<td id="30-8"></td>
		<td id="30-9"></td>
		<td id="30-10"></td>
		<td id="30-11"></td>
		<td id="30-12"></td>
		<td id="30-13"></td>
		<td id="30-14"></td>
		<td id="30-15"></td>
		<td id="30-16"></td>
		<td id="30-17"></td>
		<td id="30-18"></td>
		<td id="30-19"></td>
		<td id="30-20"></td>
		<td id="30-21"></td>
		<td id="30-22"></td>
		<td id="30-23"></td>
		<td id="30-24"></td>
		<td id="30-25"></td>
		<td id="30-26"></td>
		<td id="30-27"></td>
		<td id="30-28"></td>
		<td id="30-29"></td>
		<td id="30-30" class="no28"></td>
		<td id="30-31" class="no28 no30"></td>
		<td id="t-30"></td>
		<td align="center">
			<button type="button" lang="INGRESOS" class="btn btn-xs btn-info mi_grafica" id="btn_grap_30"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>EGRESOS</td>
		<td id="31-1"></td>
		<td id="31-2"></td>
		<td id="31-3"></td>
		<td id="31-4"></td>
		<td id="31-5"></td>
		<td id="31-6"></td>
		<td id="31-7"></td>
		<td id="31-8"></td>
		<td id="31-9"></td>
		<td id="31-10"></td>
		<td id="31-11"></td>
		<td id="31-12"></td>
		<td id="31-13"></td>
		<td id="31-14"></td>
		<td id="31-15"></td>
		<td id="31-16"></td>
		<td id="31-17"></td>
		<td id="31-18"></td>
		<td id="31-19"></td>
		<td id="31-20"></td>
		<td id="31-21"></td>
		<td id="31-22"></td>
		<td id="31-23"></td>
		<td id="31-24"></td>
		<td id="31-25"></td>
		<td id="31-26"></td>
		<td id="31-27"></td>
		<td id="31-28"></td>
		<td id="31-29"></td>
		<td id="31-30" class="no28"></td>
		<td id="31-31" class="no28 no30"></td>
		<td id="t-31"></td>
		<td align="center">
			<button type="button" lang="EGRESOS" class="btn btn-xs btn-info mi_grafica" id="btn_grap_31"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
	<tr>
		<td nowrap>PREALTAS</td>
		<td id="32-1"></td>
		<td id="32-2"></td>
		<td id="32-3"></td>
		<td id="32-4"></td>
		<td id="32-5"></td>
		<td id="32-6"></td>
		<td id="32-7"></td>
		<td id="32-8"></td>
		<td id="32-9"></td>
		<td id="32-10"></td>
		<td id="32-11"></td>
		<td id="32-12"></td>
		<td id="32-13"></td>
		<td id="32-14"></td>
		<td id="32-15"></td>
		<td id="32-16"></td>
		<td id="32-17"></td>
		<td id="32-18"></td>
		<td id="32-19"></td>
		<td id="32-20"></td>
		<td id="32-21"></td>
		<td id="32-22"></td>
		<td id="32-23"></td>
		<td id="32-24"></td>
		<td id="32-25"></td>
		<td id="32-26"></td>
		<td id="32-27"></td>
		<td id="32-28"></td>
		<td id="32-29"></td>
		<td id="32-30" class="no28"></td>
		<td id="32-31" class="no28 no30"></td>
		<td id="t-32"></td>
		<td align="center">
			<button type="button" lang="PREALTAS" class="btn btn-xs btn-info mi_grafica" id="btn_grap_32"><i class="fa fa-line-chart"></i></button>
		</td>
	</tr>
</tbody>
</table>
</div>
<div id="auxiliar" class="hidden"></div> <div id="auxiliar1" class="hidden"></div>
<!-- FIN Contenido -->
<?php include_once 'partes/footer.php'; ?>

<script>
$(document).ready(function(e) {
	//breadcrumb
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li>RECEPCIOÓN</li><li class="active"><strong>REPORTE DIARIO</strong></li>');

	$('#my_search').removeClass('hidden'); $.fn.datepicker.defaults.autoclose = true;

	var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height() - $('#tablita').height() - 57;

	var oTableP = $('#dataTablePrincipal').DataTable({
		"sScrollY": tamP - 40, ordering: false, scrollCollapse: false, "scrollX": true, deferRender: true, "iDisplayLength": 50, paging: false, searching: false,
		"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"S><"proc"p>'
	});

	$('#div_tabla_pacientes').height(tamP);

	$('#fechita .input-group.date').datepicker({
		minViewMode: 1,
		keyboardNavigation: false,
		forceParse: false,
		autoclose: true,
		todayHighlight: true,
		format: "mm/yyyy"
	});

	evalua_date( $('#mi_mes').val() );
	carga_datos( $('#mi_fecha').val() );

	$('#fechita .input-group.date').on('changeDate', function(e){
		// $('#mi_mes').val( e.format(0,"mm") );
		evalua_date( e.format(0,"mm") );
		carga_datos( e.format(0,"mm" )+'/'+e.format(0,"yyyy" ) );
	});

});

function evalua_date( date ) {
	if ( date === '04' || date === '06' || date === '09' || date === '11' ) {
		$('.no30').hide();
	} else {
		$('.no30').show();

		if ( date === '02' ) {
			$('.no28').hide();
		} else {
			$('.no28').show();
		}
	}
}

function carga_datos(date) {
	var data = {date:date}
	var i = 0; var j = 0; var x = 0;
	$.post('remote_files/getDataReporteDiario.php', data).done(function(data){
		console.log(data);

		var datos = data.split(';-}');

		for ( i = 1; i <= 32; i++ ){
			for ( j = 1; j <= 32; j++ ){
				console.log(i+'-'+j);
				if ( j < 32 ) {
					$('#'+i+'-'+j).html('<div onClick="editacion(this.id, '+datos[32*(i-1) + j-1]+', '+i+')" id="e-'+i+'-'+j+'">'+datos[32*(i-1) + j-1]+'</div>');
					console.log( 32*(i-1) + j-1 );
				} else {
					console.log( 32*(i-1) + j-1 );
					$('#t-'+i).html(datos[32*(i-1) + j-1]);
				}
			}
		}

	});
}

function editacion(id, val, fila){
	console.log(val);
	$('#'+id).hide();
	$('#'+id).after('<input id="i-'+id+'" type="text" style="width: 43px; height: 30px;" class="form-control" value="'+val+'">');
	window.setTimeout(function(){ $('#i-'+id).focus(); },100);

	$('#i-'+id).focusout(function(){
		console.log( $(this).val() );
		var valor = $(this).val();
		$(this).hide();
		$('#'+id).show();
		$('#'+id).replaceWith('<div onClick="editacion(this.id, '+valor+', '+fila+')" id="'+id+'">'+valor+'</div>');
		// Guardamos el valor en la Db
		var diax = id.split('-');
		var datos = {fila:fila, mesyanio:$('#mi_fecha').val(), dia:diax[2], valor:valor}
		$.post('remote_files/guardar_info.php', datos).done(function(data){
			if ( data == 1) {
				window.setTimeout(function(){ $('#'+id).html( valor ); },100);
				$('#t-'+fila).html( parseInt( $('#t-'+fila).html() ) + parseInt( valor ) );
			} else { alert(data); }
		});
	});
}

$('.mi_grafica').click(function(e){
	// alert( $(this).prop('lang') ); // btn_grap_1
	var titu = $(this).prop('lang'); // alert($('#mi_fecha').val());

	var datos = {id: $(this).prop('lang'), fecha:$('#mi_fecha').val()}
	$.post('remote_files/info_graficas_rd.php', datos).done(function(data1){
		console.log(data1);
		var myvalues = JSON.parse(data1);
		$("#myModal").load('htmls/grafica_rd.php', function( response, status, xhr ){ if(status=="success"){

			window.setTimeout(function(){
				c3.generate({
						bindto: '#lineChart',
						data: {
							columns: [ myvalues ],
							colors:{ data1: '#1ab394' }
						}
				});
			},500);

			$('#myModal').modal('show');
			$('#myModal').on('shown.bs.modal', function (e) {

			});
			$('#myModal').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal").empty(); });
		} });
	});
});

</script>
