<form id="form-uno" name="form-uno" data-toggle="validator" role="form">
<div class="modal-dialog modal-lg" role="document" id="">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong><span id="titulo_modal">FICHA DE ENFERMERÍA</span></strong></h4>
      </div>
      <div class="modal-body">
      	<input name="id_usuario_sv" id="id_usuario_sv" type="hidden" value=""> <input name="id_paciente_sv" id="id_paciente_sv" type="hidden" value="">
        <input name="id_consulta_sv" id="id_consulta_sv" type="hidden" value=""> <input name="numero_temp_sv" id="numero_temp_sv" type="hidden" value="">
        
		<table class="table-condensed table-responsive" border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td>
					<table class="table-condensed table-bordered table-responsive" width="100%">
						<tr class="bg-primary" align="center"> <td>* TALLA</td> <td>* PESO</td> <td>IMC</td> <td>* TEMP</td> <td>OXIMETRÍA</td> </tr>
						<tr class="">
							<td width="20%">
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="4" step="0.01" min="0" max="3" id="talla_p" name="talla_p" value="" class="form-control sv" style="text-align: right;" required autofocus>
									  <span class="input-group-addon">m</span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
							<td width="20%">
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="6" step="0.10" min="0" max="999" id="peso_p" name="peso_p" value="" class="form-control sv" style="text-align: right;" required>
									  <span class="input-group-addon">kg</span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
							<td nowrap align="center">
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="5" step="0.10" min="0" max="60" id="imc_p" name="imc_p" value="" class="form-control" readonly style="text-align: right;" required>
									  <span class="input-group-addon">kg/m<sup>2</sup></span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
							<td width="20%">
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="5" step="0.10" min="0" max="60" id="temp_p" name="temp_p" value="" class="form-control sv" style="text-align: right;" required>
									  <span class="input-group-addon">ºc</span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
							<td width="20%">
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="3" step="1" min="0" max="100" id="oxi_p" name="oxi_p" value="" class="form-control sv" style="text-align: right;">
									  <span class="input-group-addon">% SaO<sub>2</sub></span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="table-condensed table-bordered" width="100%">
						<tr class="bg-primary" align="center">
							<td width="20%">T</td> <td width="20%">A</td> <td width="20%">* FC</td> <td width="20%">* FR</td> <td width="20%">GLUCOSA</td>
						</tr>
						<tr class="">
							<td>
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="3" step="1" min="10" max="500" id="t_p" name="t_p" value="" class="form-control sv" style="text-align: right;">
									  <span class="input-group-addon">mmHg</span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
							<td>
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="3" step="1" min="10" max="500" id="a_p" name="a_p" value="" class="form-control sv" style="text-align: right;">
									  <span class="input-group-addon">mmHg</span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
							<td>
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="3" step="1" min="1" max="200" id="fc_p" name="fc_p" value="" class="form-control sv" style="text-align: right;" required>
									  <span class="input-group-addon">x min</span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
							<td>
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="3" step="1" min="1" max="200" id="fr_p" name="fr_p" value="" class="form-control sv" style="text-align: right;" required>
									  <span class="input-group-addon">x min</span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
							<td>
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="3" step="1" min="1" max="999" id="gluc_p" name="gluc_p" value="" class="form-control sv" style="text-align: right;" >
									  <span class="input-group-addon">mg/dl</span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="table-condensed table-bordered" width="100%">
						<tr class="bg-primary" align="center">
							<td width="25%">PERÍMETRO ABDOMINAL</td> <td width="25%">PERIMETRO CEFALICO</td>
							<td width="25%">PERIMETRO TORACICO</td> <td width="25%">MEDIDA DEL PIE</td>
						</tr>
						<tr class="">
							<td>
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="3" step="0.1" min="1" max="500" id="pa_p" name="pa_p" value="" class="form-control sv" style="text-align: right;">
									  <span class="input-group-addon">cm</span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
							<td>
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="3" step="0.1" min="1" max="200" id="pc_p" name="pc_p" value="" class="form-control sv" style="text-align: right;">
									  <span class="input-group-addon">cm</span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
							<td>
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="3" step="0.1" min="1" max="500" id="pt_p" name="pt_p" value="" class="form-control sv" style="text-align: right;">
									  <span class="input-group-addon">cm</span>
									</div>
									<div class="help-block with-errors"></div>
                     			</div>
							</td>
							<td>
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
									  <input type="number" maxlength="3" step="0.1" min="1" max="100" id="pie_p" name="pie_p" value="" class="form-control sv" style="text-align: right;">
									  <span class="input-group-addon">cm</span>
									</div>
									<div class="help-block with-errors"></div>
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
							<td width="1%" nowrap class="bg-primary">NOTAS</td>
							<td><textarea style="resize: none;" class="form-control sv" id="notas_sv" name="notas_sv" onKeyUp="conMayusculas(this);"></textarea></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
        <div class="bg-info p-xs b-r-sm"> NOTA: Los campos marcados con <strong>*</strong> son obligatorios.</div>
      </div>
      
    <div class="modal-footer">
      	<div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
          <div class="checkbox">
            <button type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin' aria-hidden='true'></i> Procesando..." class="btn btn-success" id="btn_save_sv"><i class="fa fa-cloud" aria-hidden="true"></i> Guardar</button>
            <button type="button" class="btn btn-warning" id="btn_cancel_sv"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
          </div>
        </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</form>