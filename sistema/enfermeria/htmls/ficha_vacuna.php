<div class="modal-dialog modal-lg" role="document" id="">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong><span id="titulo_modal">NUEVA VACUNA</span></strong></h4>
      </div>
      <div class="modal-body">
      	<form action="" method="post" name="formEstudio" id="formEstudio" target="_self">
 			<input name="idEstudioE" type="hidden" id="idEstudioE"> <input name="idUsuarioE" id="idUsuarioE" type="hidden" value="">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
					 	<label for="nombre_v" class="text-primary">* NOMBRE DE LA VACUNA</label>
					 	<input type="text" class="form-control" id="nombre_v" name="nombre_v" required onKeyUp="conMayusculas(this);">
						<div class="help-block with-errors"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					 	<label for="enfermedad_v" class="text-primary">* ENFERMEDAD QUE PREVIENE</label>
						<textarea class="form-control" style="resize: none;" id="enfermedad_v" name="enfermedad_v" required onKeyUp="conMayusculas(this);"></textarea>
						<div class="help-block with-errors"></div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
					 	<label for="edad_v" class="text-primary">* EDAD</label>
						<textarea class="form-control" style="resize: none;" id="edad_v" name="edad_v" required onKeyUp="conMayusculas(this);"></textarea>
						<div class="help-block with-errors"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					 	<label for="aplicacion_v" class="text-primary">* APLICACIÓN</label>
						<textarea class="form-control" style="resize: none;" id="aplicacion_v" name="aplicacion_v" required onKeyUp="conMayusculas(this);"></textarea>
						<div class="help-block with-errors"></div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
					 	<label for="dosis_v" class="text-primary">* DOSIS</label>
						<select class="form-control" id="dosis_v" name="dosis_v" required>
							<option value="">-Selecciona una opción-</option>
							<option value="UNICA">UNICA</option>
							<option value="PRIMERA">PRIMERA</option>
							<option value="SEGUNDA">SEGUNDA</option>
							<option value="TERCERA">TERCERA</option>
							<option value="CUARTA">CUARTA</option>
							<option value="REFUERZO">REFUERZO</option>
							<option value="REVACUNACION">REVACUNACION</option>
							<option value="ADICIONAL">ADICIONAL</option>
							<option value="ADOLECENTES EMBARAZADAS">ADOLECENTES EMBARAZADAS</option>
							<option value="EN EMBARAZADAS">EN EMBARAZADAS</option>
							<option value="UNA DOSIS">UNA DOSIS</option>
							<option value="OTRAS">OTRAS</option>
						</select>
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