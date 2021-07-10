<div class="modal-dialog" role="document" id="contenido_ficha_usuario">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong><span id="titulo_modal">NUEVA MEMBRESÍA</span></strong></h4>
      </div>
      <div class="modal-body">
      	<form action="" method="post" name="formEstudio" id="formEstudio" target="_self">
			<div class="row">
				<input name="idEstudioE" type="hidden" id="idEstudioE"> <input name="idUsuarioE" id="idUsuarioE" type="hidden" value="">
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
					 <label for="nombreE">* NOMBRE DE LA MEMBRESÍA</label>
					 <input type="text" class="form-control input-sm" id="nombreE" name="nombreE" required>
					 </div>
				</div>
				<div class="col-sm-6 col-md-6">
					<div class="form-group">
					 <label for="precioE">* PRECIO ($)</label>
					 <input type="text" class="form-control input-sm" id="precioE" name="precioE" required onKeyUp="numeros_decimales(this.value, this.name);">
					 </div>
				</div>
				<div class="col-sm-6 col-md-6">
					<div class="form-group">
					 <label for="precioUrgenciaE">* NÚMERO DE BENEFICIARIOS</label>
					 <input maxlength="3" type="text" class="form-control input-sm" id="no_beneficiarios" name="no_beneficiarios" required onKeyUp="solo_numeros(this.value, this.name);">
					 </div>
				</div>
			</div>
        </form>      
	</div>
      <div class="modal-footer">
      	<div class="form-group">
        	<div class="col-sm-12">
            	<button type="submit" form="formEstudio" data-loading-text="<i class='fa fa-circle-o-notch fa-spin' aria-hidden='true'></i> Procesando..." class="btn btn-success" id="btn_save1">Guardar</button>
            	<button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancel1">Cancelar</button>
        	</div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->