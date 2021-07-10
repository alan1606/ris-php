<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_usuario" style="font-size: 1.1em;">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td><h4 class="modal-title"><strong><span id="titulo_modal">TÍTULO MODAL</span></strong></h4></td>
				<td width="1%"><button type="button" class="btn btn-warning" id="btn_regresar">REGRESAR</button></td>
			</tr>
		</table>
      </div>
      <div class="modal-body"> <input type="hidden" id="opcion_m"> <input type="hidden" id="aleatorio_me">
		  <table width="100%" height="100%" class="table-condensed table-bordered">
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
		  </table>
	</div>
      <!--<div class="modal-footer">
      	<div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
          
        </div>
        </div>
      </div>-->
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->