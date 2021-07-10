<form action="" method="post" name="formEstudio" id="formEstudio" target="_self">
<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_usuario">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">
			<strong><span id="titulo_modal">CONSULTA</span></strong>
		</h4>
      </div>
      <div class="modal-body">
 		<input name="idEstudioE" type="hidden" id="idEstudioE"> <input name="idUsuarioE" id="idUsuarioE" type="hidden" value="">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="form-group">
				 <label for="nombreE">* NOMBRE DE LA CONSULTA</label>
				 <input type="text" class="form-control input-sm" id="nombreE" name="nombreE" required>
				 </div>
			</div>
			<div class="col-sm-12 col-xs-12">
				<div class="form-group">
				 <label for="nombreDr">MÉDICO</label>
				 <input type="text" class="form-control input-sm" id="nombreDr" name="nombreDr" disabled>
				 </div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
				 <label for="precioE">* PRECIO PÚBLICO($)</label>
				 <input type="text" class="form-control input-sm" id="precioE" name="precioE" required onKeyUp="numeros_decimales(this.value, this.name);">
				 </div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
				 <label for="precioUrgenciaE">* PRECIO PÚBLICO URGENCIA($)</label>
				 <input type="text" class="form-control input-sm" id="precioUrgenciaE" name="precioUrgenciaE" required onKeyUp="numeros_decimales(this.value, this.name);">
				 </div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
				 <label for="precioME">* PRECIO DE MEMBRESÍA($)</label>
				 <input type="text" class="form-control input-sm" id="precioME" name="precioME" required onKeyUp="numeros_decimales(this.value, this.name);">
				 </div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
				 <label for="precioUrgenciaME">* PRECIO MEMBRESÍA URGENCIA($)</label>
				 <input type="text" class="form-control input-sm" id="precioUrgenciaME" name="precioUrgenciaME" required onKeyUp="numeros_decimales(this.value, this.name);">
				 </div>
			</div>
		</div>
	</div>
      <div class="modal-footer">
      	<div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
          <div class="checkbox">
            <button type="submit" form="formEstudio" data-loading-text="<i class='fa fa-circle-o-notch fa-spin' aria-hidden='true'></i> Procesando..." class="btn btn-success" id="btn_save1">Guardar</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancel1">Cancelar</button>
          </div>
        </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</form> 