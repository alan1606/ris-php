<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_paquete">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="97%"> <strong><span id="titulo_modal">NUEVO PAQUETE</span></strong> </td>
					<td width="1%">
						<button type="submit" form="formEstudio" data-loading-text="<i class='fa fa-circle-o-notch fa-spin' aria-hidden='true'></i> Procesando..." class="btn btn-success" id="btn_save1">Guardar</button>
					</td>
					<td width="13px">&nbsp;</td>
					<td width="1%"> <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancel1">Cancelar</button> </td>
				</tr>
			</table>
		</h4>
      </div>
      <div class="modal-body">
      	<form action="" method="post" name="formEstudio" id="formEstudio" target="_self">
			<div class="row">
				<input name="idEstudioE" type="hidden" id="idEstudioE"> <input name="idUsuarioE" id="idUsuarioE" type="hidden" value="">
				<input name="aleatorio_paq" id="aleatorio_paq" type="hidden" value="">
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
					 <label for="nombreE">* NOMBRE DEL PAQUETE</label>
					 <input type="text" class="form-control input-sm" id="nombreE" name="nombreE" required>
					 </div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 col-md-3">
					<select data-placeholder="Tipo de concepto a agregar" id="tipo_concepto_add" name="tipo_concepto_add" class="form-control"> </select>
				</div>
				<div class="col-sm-7 col-md-7">
					<select data-placeholder="Selecciona el concepto a agregar al paquete" id="concepto_agregar" name="concepto_agregar" class="chosen-select form-control"> </select>
				</div>
				<div class="col-sm-2 col-md-2" align="left">
					<button type="button" class="btn btn-sm btn-primary disabled" id="btn_add_concepto">Agregar</button>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<table width="100%" height="100%" id="dataTablePaquetes" class="table-hover table-bordered table" role="grid"> 
					<thead id="cabecera_tBusquedaPaquetes">
					  <tr role="row" class="bg-primary">
						<th id="clickmePA" style="width: 1%;" width="1%;">#</th>
						<th width="70%">CONCEPTO</th>
						<th>TIPO</th>
						<th style="vertical-align:middle; white-space: nowrap;" width="1%" nowrap>PRECIO UNITARIO</th>
						<th>CANTIDAD</th>
						<th nowrap width="" style="white-space: nowrap; width:;">GUARDAR</th>
						<th>&nbsp;</th>
					  </tr>
					</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
						<tfoot>
							<tr class="bg-primary">
								<th style="width: 1px;"></th>
								<th></th>
								<th></th>
								<th>&nbsp;</th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</tfoot>
					</table>
					<div class="text-info" style="font-size: 0.9em;">* El precio total del paquete es la suma de los precios asignados a cada concepto agregado multiplicado por la cantidad de los mismos.</div>
				</div>
			</div>
        </form>      
	</div>
      <!--<div class="modal-footer">
      	<div class="form-group">
        	<div class="col-sm-12">
            	
            	
        	</div>
        </div>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->