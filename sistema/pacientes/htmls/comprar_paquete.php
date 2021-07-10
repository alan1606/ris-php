<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_usuario" style="font-size: 1.1em;">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong><span id="titulo_modal">TÍTULO MODAL</span></strong></h4>
      </div>
      <div class="modal-body"> <input type="hidden" id="opcion_m"> <input type="hidden" id="aleatorio_me">
		  <table width="100%" height="100%" class="table-condensed table-bordered no_comparar">
			<tr id="fila_paquete_comprar" class="">
				<td width="90%"><h3 class="text-primary">Elija algún paquete</h3></td>
				<td nowrap> <h3 class="text-primary">Comparar</h3> </td>
			</tr>
			<tr>
				<td>
					<select data-placeholder="Selecciona la membresía a comprar" id="paquete_comprar" name="paquete_comprar" class="chosen-select form-control"> </select>
				</td>
				<td align="center">
					<button type="button" class="btn btn-info btn-sm disabled" id="btn_info_paq"><i class='fa fa-info' aria-hidden='true'></i></button>
				</td>
			</tr>
			<tr id="tabla_detalle" class="hidden">
				<td colspan="2">
					<table width="100%" class="table-condensed" border="0">
						<tr style="font-size: 1.3em;">
							<td class="text-info" width="16%" align="right">TOTAL</span></td>
							<td class="text-info" width="16%" align="left">$<span id="mi_total"></td>
							<td class="text-danger" width="18%" align="right"><strong>ABONO $</strong></td>
							<td class="text-danger" width="18%"><input type="text" class="form-control" id="mi_abono" name="mi_abono" placeholder="Abono" onKeyUp="numeros_decimales(this.value, this.name); abono(this.value)" style="text-align: right;" maxlength="8"></td>
							<td class="text-warning" width="16%" align="right">SALDO</td>
							<td class="text-warning" width="16%" align="left">$<span id="mi_saldo"></span></td>
						</tr>
					</table>
				</td>
			</tr>
		  </table>
			
		  <table width="100%" height="100%" id="dataTableComparar" class="table-hover table-bordered table-condensed comparar" role="grid"> 
			<thead id="cabecera_tBusquedaComparar">
			  <tr role="row" class="bg-primary">
				<th id="clickmeCPQ" style="vertical-align:middle;">#</th>
				<th style="vertical-align:middle;">CONCEPTO</th>
				<th style="vertical-align:middle;">CANTIDAD</th>
				<th style="vertical-align:middle; color: black;" class="bg-info" nowrap>PRECIO SIN PAQUETE</th>
				<th style="vertical-align:middle; color: black;" class="bg-success" nowrap>PRECIO CON PAQUETE</th>
				<th style="vertical-align:middle;" class="bg-danger">AHORRO</th>
			  </tr>
			</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
				<tfoot>
					<tr class="bg-primary" style="font-size: 1em;">
						<th></th>
						<th></th>
						<th></th>
						<th class="bg-info" style="color: black;"><div align="center">$<span id="suma_sin_pq"></span></div></th>
						<th class="bg-success" style="color: black;"><div align="center">$<span id="suma_con_pq"></span></div></th>
						<th class="bg-danger" id="div_con"><div align="center">$<span id="suma_ahorro"></span></div></th>
					</tr>
				</tfoot>
			</table>
			
	</div>
      <div class="modal-footer">
      	<div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
          <div class="checkbox">
			<button type="button" class="btn btn-success disabled no_comparar" id="btn_paquetar_p">COMPRAR PAQUETE</button>
            <button type="button" class="btn btn-danger no_comparar" data-dismiss="modal" id="btn_cancel">CANCELAR</button>
			<button type="button" class="btn btn-warning comparar" id="btn_regresar">REGRESAR</button>
          </div>
        </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->