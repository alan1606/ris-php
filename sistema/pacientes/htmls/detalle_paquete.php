<div class="modal-dialog" role="document" id="" style="">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td width="98%"><h4 class="modal-title"><strong><span id="titulo_modal"> </span></strong></h4></td>
				<td nowrap><button type='button' id="btn_back_hpq" class="btn btn-warning">Regresar</button></td>
			</tr>
		</table>
      </div>
      <div class="modal-body" align="center">
      
		<!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tConceptosPQ" aria-controls="tConceptosPQ" role="tab" data-toggle="tab" id="tap_hcpq">CONCEPTOS</a></li>
            <li role="presentation"><a href="#tPagosPQ" aria-controls="tPagosPQ" role="tab" data-toggle="tab" id="tap_hppq">PAGOS</a></li>
        </ul>
		<!-- Tab panes -->
        <div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="tConceptosPQ"><br>
				<table width="100%" height="1%" id="dataTableCPQ" class="table-hover table-bordered table" role="grid" style=""> 
					<thead id="cabecera_tBusquedaCPQ">
					  <tr role="row" class="bg-primary">
						<th id="clickmeCPQ" width="1%">#</th>
						<th nowrap>CONCEPTO</th>
						<th nowrap width="1%"> </th>
						<th width="1%">DISPONIBLE</th>
						<th nowrap width="50px;">FECHA USO</th>
						<th nowrap>PRECIO</th>
						<th nowrap width="1px">USAR</th>
					  </tr>
					</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
					<tfoot>
						<tr class="bg-primary" style="">
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>&nbsp;</th>
						</tr>
					</tfoot>
				</table>
				<div align="right">
					<button type="button" class="btn btn-success disabled" id="btn_genera_ov" onClick="generar_orden()">Generar Orden</button>
				</div>
			</div>
			
			<div role="tabpanel" class="tab-pane" id="tPagosPQ"><br>
				<table width="100%" height="" id="dataTablePPQ" class="table-hover table-bordered table" role="grid" style=""> 
					<thead id="cabecera_tBusquedaPPQ">
					  <tr role="row" class="bg-primary">
						<th id="clickmePPQ">#</th>
						<th nowrap>MONTO</th>
						<th nowrap>FECHA</th>
						<th>USUARIO</th>
						<th nowrap>TICKET</th>
					  </tr>
					</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
					<tfoot>
						<tr class="bg-primary" style="">
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>&nbsp;</th>
						</tr>
					</tfoot>
				</table>
				<div id="div_pago_abono" align="right"> <input type="hidden" id="referencia_abono">
					<input type="hidden" id="id_u_abono"> <input type="hidden" id="saldo_a"> <input type="hidden" id="id_pq"> <input type="hidden" id="aleatorio_pq">
					<table width="100%" class="bg-warning table-condensed" border="0" cellpadding="0" cellspacing="0" style="font-size: 1.1em;">
						<tr>
							<td width="95%">&nbsp;</td>
							<td align="right" nowrap style="font-size: 1.2em;">TOTAL <span id="mi_total_pq"></span>&nbsp;</td>
							<td align="right" nowrap style="font-size: 1.2em;">ABONADO <span id="mi_abonado_pq"></span>&nbsp;</td>
							<td align="right" nowrap style="font-size: 1.4em; color:black;">SALDO $<span id="mi_saldo_pq"></span>&nbsp;</td>
							<td nowrap>ABONAR $</td>
							<td width="1px">
								<input type="text" id="mi_pago_abono" name="mi_pago_abono" class="form-control" maxlength="8" style="width: 90px; text-align: right;" onKeyUp="numeros_decimales(this.value, this.name); pa_abonar1(this.value)" placeholder="Cantidad">
							</td>
							<td><button type="button" class="btn btn-success" id="btn_guardar_abono" onClick="pagar_abono(1);">Abonar</button></td>
						</tr>
					</table>
				</div>
			</div>
		</div>

	  </div>
      <div class="modal-footer hidden">
      	<div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
            
        </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->