<div class="modal-dialog modal-lg" role="document" id="">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
		  <table class="table-condensed" width="100%">
		  	<tr>
				<td width="99%">
					<button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        			<h4 class="modal-title"><strong><span id="titulo_modal">CREAR UN NUEVO GASTO</span></strong></h4>
				</td>
				<td nowrap>
					<button type='submit' class="btn btn-success" id="btn_guardar" form="form-concepto">Guardar</button> 
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
                     <label for="nombre_p">* Nombre del gasto</label>
                     <input type="text" class="form-control" id="nombre_g" name="nombre_g" placeholder="Nombre del gasto" required onKeyUp="conMayusculas(this);">
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
			</div>
			<div class="row">
				<div class="col-sm-12">
                     <div class="form-group">
                     <label for="descripcion_p">Descripción</label>
                     <textarea class="form-control" name="descripcion_g" id="descripcion_g" cols="1" rows="3" style="resize:none;" onKeyUp="conMayusculas(this);" placeholder="Descripción del gasto"></textarea>
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