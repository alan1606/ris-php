<div class="modal-dialog modal-lg" role="document" id="">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong><span id="titulo_modal">DOCUMENTOS</span></strong></h4>
      </div>
      <div class="modal-body"> <input id="idp_doc" type="hidden" value=""> <input id="tipo_doc" type="hidden" value="">
		
		<div class="panel panel-warning hidden" id="panel_cargar_d1">
		  <div class="panel-heading" id="encabezado_documento">PARA CARGAR UN NUEVO DOCUMENTO, INGRESE SU TÍTULO Y SELECCIONE EL ARCHIVO A CARGAR.</div>
		  <div class="panel-body">
			<table width="100%" border="0" class="table-condensed table-bordered" style="border: 1px solid gold">
			  <tr>
				<td width="1%" nowrap valign="middle" id="titulo_docu">* Título del documento</td>
				<td align="left" colspan="2"> <input name="titulo_doc" type="text" class="form-control" id="titulo_doc" maxlength="70"> </td>
			  </tr>
			  <tr>
				<td nowrap valign="middle" id="">* Fecha del documento</td>
				<td align="left">
					<input name="fecha_doc" type="text" class="form-control" id="fecha_doc" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date("Y-m-d"); ?>" style="text-align: center;" readonly>
				</td>
				<td align="right" width="50%">
					<button type="button" class="btn btn-primary btn-sm disabled" id="btn_add_doc">
						CARGAR <i class="fa fa-file-text" aria-hidden="true"></i>
					</button>
				</td>
			  </tr>
			  <tr class="hidden">
				<td colspan="3" align="left"> <input id="fileupload_foto" type="file" name="files[]" accept="application/pdf"> </td>
			  </tr>
			</table>
		  </div>
		  <div class="panel-footer" align="right">
			<button type="button" class="btn btn-warning btn-sm" id="btn_cancel_u_d" onClick="cancel_subir_doc();">CANCELAR</button>
		  </div>
		</div>
		  
		<table id="tablaMiPDF" width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed si_document hidden">
			<tr> <td align="center" id="datos_docu" class="bg-primary"> </td> </tr>
			<tr> <td id="mi_documento" style="vertical-align:middle;"> <a class="media" href=""> </a> </td> </tr>
			<tr> <td align="right"> <button type="button" class="btn btn-warning btn-sm" id="btn_cerrar_docu" onClick="cerrar_doc();">REGRESAR</button> </td> </tr>
		</table>
		
		<div class="tabs-container no_cargar_d no_document" id="panel_principal">
			<ul class="nav nav-tabs">
				<li class="active docu no_visual"><a data-toggle="tab" href="#tab-d_1" id="a_t_d_1">GENERALES</a></li>
				<li role="presentation" class="dropdown docu no_visual">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						ESTUDIOS <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li class=""><a data-toggle="tab" href="#tab-d_2" id="a_t_d_2">LABORATORIO</a></li>
						<li class=""><a data-toggle="tab" href="#tab-d_3" id="a_t_d_3">IMAGENOLOGÍA</a></li>
					</ul>
				</li>
				<li class="docu no_visual"><a data-toggle="tab" href="#tab-d_4" id="a_t_d_4">NOTAS MÉDICAS</a></li>
				<li class="docu no_visual"><a data-toggle="tab" href="#tab-d_5" id="a_t_d_5">RECETAS</a></li>
				<li class="hidden no_docu visual" id="m_visual"><a data-toggle="tab" href="#tab-d_6" id="a_t_d_6">VISUALIZAR</a></li>
				<li class="docu no_visual"><a data-toggle="tab" href="#tab-d_7" id="a_t_d_7">IMAGENES</a></li>
			</ul>
			<div class="tab-content">
				<div id="tab-d_1" class="tab-pane active">
					<div class="panel-body">
						<table width="100%" class="table-condensed table-bordered table-striped" id="dataTable_d1">
							<thead id="cabecera_tD_1" >
							  <tr class="bg-primary">
								<th id="clickmeD_1" nowrap width="1px">#</th>
								<th>
									<button type="button" class="btn btn-xs btn-success" onClick="subir_doc(1)">DOCUMENTO <i class='fa fa-plus' aria-hidden='true'></i></button>
								</th>
								<th>FECHA</th>
								<th>USUARIO</th>
								<th width="10px" nowrap>VISUALIZAR</th>
								<th width="10px" nowrap>ELIMINAR</th>
							  </tr>
							</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
							<tfoot>
								<tr>
									<th></th>
									<th><input type="text" class="form-control input-sm" placeholder="-DOCUMENTO-" style="width:99%;"/></th>
									<th><input type="text" class="form-control input-sm" placeholder="-FECHA-" style="width:99%;"/></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div id="tab-d_2" class="tab-pane">
					<div class="panel-body">
						<table width="100%" class="table-condensed table-bordered table-striped" id="dataTable_d2">
							<thead id="cabecera_tD_2" >
							  <tr class="bg-primary">
								<th id="clickmeD_2" nowrap width="1px">#</th>
								<th>
									<button type="button" class="btn btn-xs btn-success" onClick="subir_doc(2)">ESTUDIO LABORATORIO <i class='fa fa-plus' aria-hidden='true'></i></button>
								</th>
								<th>FECHA</th>
								<th>USUARIO</th>
								<th width="10px" nowrap>VISUALIZAR</th>
								<th width="10px" nowrap>ELIMINAR</th>
							  </tr>
							</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
							<tfoot>
								<tr>
									<th></th>
									<th><input type="text" class="form-control input-sm" placeholder="-ESTUDIO LABORATORIO-" style="width:99%;"/></th>
									<th><input type="text" class="form-control input-sm" placeholder="-FECHA-" style="width:99%;"/></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div id="tab-d_3" class="tab-pane">
					<div class="panel-body">
						<table width="100%" class="table-condensed table-bordered table-striped" id="dataTable_d3">
							<thead id="cabecera_tD_3" >
							  <tr class="bg-primary">
								<th id="clickmeD_3" nowrap width="1px">#</th>
								<th>
									<button type="button" class="btn btn-xs btn-success" onClick="subir_doc(3)">ESTUDIO IMAGEN <i class='fa fa-plus' aria-hidden='true'></i></button>
								</th>
								<th>FECHA</th>
								<th>USUARIO</th>
								<th width="10px" nowrap>VISUALIZAR</th>
								<th width="10px" nowrap>ELIMINAR</th>
							  </tr>
							</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
							<tfoot>
								<tr>
									<th></th>
									<th><input type="text" class="form-control input-sm" placeholder="-ESTUDIO IMAGEN-" style="width:99%;"/></th>
									<th><input type="text" class="form-control input-sm" placeholder="-FECHA-" style="width:99%;"/></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div id="tab-d_4" class="tab-pane">
					<div class="panel-body">
						<table width="100%" class="table-condensed table-bordered table-striped" id="dataTable_d4">
							<thead id="cabecera_tD_4" >
							  <tr class="bg-primary">
								<th id="clickmeD_4" nowrap width="1px">#</th>
								<th>
									<button type="button" class="btn btn-xs btn-success" onClick="subir_doc(4)">NOTA MÉDICA <i class='fa fa-plus' aria-hidden='true'></i></button>
								</th>
								<th>FECHA</th>
								<th>USUARIO</th>
								<th width="10px" nowrap>VISUALIZAR</th>
								<th width="10px" nowrap>ELIMINAR</th>
							  </tr>
							</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
							<tfoot>
								<tr>
									<th></th>
									<th><input type="text" class="form-control input-sm" placeholder="-NOTA MÉDICA-" style="width:99%;"/></th>
									<th><input type="text" class="form-control input-sm" placeholder="-FECHA-" style="width:99%;"/></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div id="tab-d_5" class="tab-pane">
					<div class="panel-body">
						<table width="100%" class="table-condensed table-bordered table-striped" id="dataTable_d5">
							<thead id="cabecera_tD_5" >
							  <tr class="bg-primary">
								<th id="clickmeD_5" nowrap width="1px">#</th>
								<th>
									<button type="button" class="btn btn-xs btn-success" onClick="subir_doc(5)">RECETA <i class='fa fa-plus' aria-hidden='true'></i></button>
								</th>
								<th>FECHA</th>
								<th>USUARIO</th>
								<th width="10px" nowrap>VISUALIZAR</th>
								<th width="10px" nowrap>ELIMINAR</th>
							  </tr>
							</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
							<tfoot>
								<tr>
									<th></th>
									<th><input type="text" class="form-control input-sm" placeholder="-RECETA-" style="width:99%;"/></th>
									<th><input type="text" class="form-control input-sm" placeholder="-FECHA-" style="width:99%;"/></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div id="tab-d_6" class="tab-pane">
					<div class="panel-body">
						visualizar
					</div>
				</div>
				<div id="tab-d_7" class="tab-pane">
					<div class="panel-body">
						<table width="100%" class="table-condensed table-bordered table-striped" id="dataTable_d7">
							<thead id="cabecera_tD_7" >
							  <tr class="bg-primary">
								<th id="clickmeD_7" nowrap width="1px">#</th>
								<th>
									<button type="button" class="btn btn-xs btn-success" onClick="subir_doc(7)">IMAGEN <i class='fa fa-plus' aria-hidden='true'></i></button>
								</th>
								<th>FECHA</th>
								<th>USUARIO</th>
								<th width="10px" nowrap>VISUALIZAR</th>
								<th width="10px" nowrap>ELIMINAR</th>
							  </tr>
							</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
							<tfoot>
								<tr>
									<th></th>
									<th><input type="text" class="form-control input-sm" placeholder="-IMAGEN-" style="width:99%;"/></th>
									<th><input type="text" class="form-control input-sm" placeholder="-FECHA-" style="width:99%;"/></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
		  
	</div>
    <div class="modal-footer no_cargar_d no_document">
      	<div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
          <div class="checkbox">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
        </div>
    </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->