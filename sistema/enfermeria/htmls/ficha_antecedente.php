<div class="modal-dialog modal-lg" role="document" id="">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong><span id="titulo_modal">NUEVO ANTECEDENTE</span></strong></h4>
      </div>
      <div class="modal-body">
      	<form action="" method="post" name="formEstudio" id="formEstudio" target="_self">
 			<input name="idEstudioE" type="hidden" id="idEstudioE"> <input name="idUsuarioE" id="idUsuarioE" type="hidden" value="">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
					 	<label for="nombreE" class="text-primary">* NOMBRE DEL ANTECEDENTE</label>
					 	<input type="text" class="form-control" id="nombreE" name="nombreE" required onKeyUp="conMayusculas(this);">
						<div class="help-block with-errors"></div>
					</div>
				</div>
			</div>
        </form> 
	  </div>
		
      <div class="modal-footer">
      	<div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
            <button type="submit" form="formEstudio" data-loading-text="<i class='fa fa-circle-o-notch fa-spin' aria-hidden='true'></i> Procesando..." class="btn btn-success" id="btn_save1">Guardar</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancel1">Cancelar</button>
        </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->