<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_usuario" style="font-size: 1.1em;">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong><span id="titulo_modal">TÍTULO MODAL</span></strong></h4>
      </div>
      <div class="modal-body"> <input type="hidden" id="opcion_m"> <input type="hidden" id="aleatorio_me">
		  <table width="100%" height="" id="dataTableHistorial" class="table-hover table-bordered table-condensed comparar" role="grid" style=""> 
			<thead id="cabecera_tBusquedaHistorial">
			  <tr role="row" class="bg-primary">
				<th></th>
				<th id="clickmeHPQ" style="vertical-align:middle;">#</th>
				<th style="vertical-align:middle;" nowrap>PAQUETE</th>
				<th style="vertical-align:middle; width: 1%; white-space: nowrap;" nowrap>FECHA COMPRA</th>
				<th style="vertical-align:middle; width: 1%;" nowrap>
					<select name="status_pqs" id="status_pqs" class="form-control input-sm">
						<option value="2">TODOS</option> <option value="1" selected>ACTIVOS</option> <option value="0">FINALIZADOS</option>
					</select>
				</th>
				<th style="vertical-align:middle; width: 1%;">FOLIO</th>
				<th style="vertical-align:middle; width: 1%; white-space: nowrap;" nowrap>FECHA FIN</th>
				<th style="vertical-align:middle; width: 1%; white-space: nowrap;" nowrap>ABONADO</th>
				<th style="vertical-align:middle; width: 1%; white-space: nowrap;" nowrap>SALDO</th>
			  </tr>
			</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
				<tfoot>
					<tr class="bg-primary" style="font-size: 1em;">
						<th></th>
						<th></th>
						<th><input type="text" class="form-control input-sm" placeholder="-Paquete-" style="width:98%;"/></th>
						<th></th>
						<th></th>
						<th><input type="text" class="form-control input-sm" placeholder="-FOLIO-" style="width:98%;"/></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</tfoot>
			</table>
		  <div class="pago_abono" align="right"> <input type="hidden" id="referencia_abono">
			  <input type="hidden" id="id_u_abono"> <input type="hidden" id="saldo_a"> <input type="hidden" id="id_pq"> <input type="hidden" id="aleatorio_pq">
		  	<table width="100%" class="bg-warning table-condensed" border="0" cellpadding="0" cellspacing="0" style="font-size: 1.1em;">
				<tr>
					<td width="95%">&nbsp;</td>
					<td nowrap>ABONAR $</td>
					<td width="1px">
						<input type="text" id="mi_pago_abono" name="mi_pago_abono" class="form-control" maxlength="8" style="width: 90px; text-align: right;" onKeyUp="numeros_decimales(this.value, this.name); pa_abonar(this.value)" placeholder="Cantidad">
					</td>
					<td align="left" nowrap>AL <span id="mi_name_pq"></span> CON FOLIO <span id="mi_folio_pq"></span>&nbsp;</td>
					<td><button type="button" class="btn btn-success" id="btn_guardar_abono" onClick="pagar_abono(0);">Abonar</button></td>
					<td><button type="button" class="btn btn-danger" id="btn_cancelar_abono">Cancelar</button></td>
				</tr>
			</table>
		  </div>
			
	</div>
      <div class="modal-footer">
      	<div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
          <div class="checkbox">
			<button type="button" class="btn btn-info" id="btn_un_comprar_pq">COMPRAR OTRO PAQUETE</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancel">SALIR</button>
          </div>
        </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->