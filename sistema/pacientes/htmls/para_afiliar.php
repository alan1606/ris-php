<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_usuario" style="font-size: 1.1em;">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong><span id="titulo_modal">TÍTULO MODAL</span></strong></h4>
      </div>
      <div class="modal-body"> <input type="hidden" id="opcion_m"> <input type="hidden" id="aleatorio_me">
		  <table width="100%" height="100%" class="table-condensed table-bordered">
			<tr>
				<td>
					<h3 class="text-primary">El paciente no está afiliado, si desea afiliarlo seleccione una de las siguientes opciones:</h3>
					<div class="i-checks"><label> <input type="radio" value="1" name="a" onClick="select_mem(this.value);"> <i></i> Comprar una membresía </label></div>
                    <div class="i-checks"><label> <input type="radio" value="2" name="a" onClick="select_mem(this.value);"> <i></i> Ser beneficiario de una membresía existente </label></div>
				</td>
			</tr>
			<tr id="fila_membresia_comprar" class="hidden">
				<td>
					<h3 class="text-primary">Elija la membresía que el paciente desea comprar:</h3>
					<div>
						<select data-placeholder="Selecciona la membresía a comprar" id="membresia_comprar1" name="membresia_comprar1" class="chosen-select form-control"> </select>
					</div>
				</td>
			</tr>
			<tr id="fila_membresia_existente" class="hidden">
				<td>
					<h3 class="text-primary">Elija al titular de la membresía a la cual el paciente desea integrarse:</h3>
					<div>
						<select data-placeholder="Selecciona la membresía a integrarse" id="membresia_integrar" name="membresia_integrar" class="chosen-select form-control"> </select>
					</div>
				</td>
			</tr>
		  </table>
	</div>
      <div class="modal-footer">
      	<div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
          <div class="checkbox">
			<!--<button type="button" class="btn btn-success hidden si_impre" id="btn_imprimir">IMPRIMIR</button>-->
			<button type="button" class="btn btn-success disabled" id="btn_afiliar_p">AFILIAR AL PACIENTE</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_cancel">CANCELAR</button>
          </div>
        </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->