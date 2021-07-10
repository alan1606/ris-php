<div class="modal-dialog modal-lg" role="document" id="">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
		  <table class="table-condensed" width="100%">
		  	<tr>
				<td width="99%">
					<button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        			<h4 class="modal-title"><strong><span id="titulo_modal">GENERAR UN NUEVO CONCEPTO DE GASTO</span></strong></h4>
				</td>
				<td nowrap>
					<button type='submit' class="btn btn-success" id="btn_guardar" form="form-concepto">Generar</button> 
        			<button type='button' class="btn btn-danger" data-dismiss="modal" id="btn_cancelar">Cancelar</button>
				</td>
			</tr>
		  </table>
      </div>
      <div class="modal-body">
      	<form data-toggle="validator" role="form" id="form-concepto">
			<div class="row">
				<div class="col-sm-12">
                     <div class="form-group">
                     <label for="para_g">* ¿Para quién es el dinero?</label>
                     <select data-placeholder="Selecciona a la persona que recibirá el dinero" id="para_g" name="para_g" class="chosen-select form-control" required> </select>
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
			</div>
			<div class="row">
				<div class="col-sm-4">
                     <div class="form-group">
                     <label for="monto_g">* Monto $</label>
                     <input type="text" class="form-control" id="monto_g" name="monto_g" placeholder="Monto del gasto" onKeyUp="numeros_decimales(this.value, this.name); monto(this.id, this.value);" required style="text-align: right;">
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
				<div class="col-sm-4">
                     <div class="form-group">
                     <label for="entregado_g">* Entregado $</label>
                     <input type="text" class="form-control" id="entregado_g" name="entregado_g" placeholder="Total entregado a la persona" onKeyUp="numeros_decimales(this.value, this.name); entregado(this.id, this.value);" required style="text-align: right;">
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
				<div class="col-sm-4">
                     <div class="form-group">
                     <label for="cambio_g">CAMBIO $</label>
                     <input type="text" class="form-control" readonly id="cambio_g" name="cambio_g" placeholder="Cambio" onKeyUp="" style="text-align: right;">
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
			</div>
			<div class="row">
				<div class="col-sm-12">
                     <div class="form-group">
                     <label for="concepto_g">* Concepto</label>
                     <select data-placeholder="Selecciona el concepto" id="concepto_g" name="concepto_g" class="chosen-select form-control" required> </select>
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
			</div>
			<div class="row">
				<div class="col-sm-7">
                     <div class="form-group">
                     <label for="nota_g">Nota</label>
                     <textarea class="form-control" name="nota_g" id="nota_g" cols="1" rows="3" style="resize:none;" onKeyUp="conMayusculas(this);" placeholder="Si es necesario, escribe una nota"></textarea>
                     </div>
                </div>
				<div class="col-sm-5">
                     <div class="form-group">
                     <label for="departamento_g">* Departamento</label>
                     <select data-placeholder="Selecciona el departamento para el gasto" id="departamento_g" name="departamento_g" class="chosen-select form-control" required> </select>
					 <div class="help-block with-errors"></div>
                     </div>
                </div>
			</div>

		<input name="id_cto" id="id_cto" type="hidden" value="">
		<input name="idUsuarioC" id="idUsuarioC" type="hidden" value="">
		<input name="aleatorio_cto" id="aleatorio_cto" type="hidden" value="">
	  </form>
  </div>
  <div class="modal-footer hidden">
    <div class="form-group">
    <div class="col-sm-offset-0 col-sm-12">
    	
    </div>
    </div>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->