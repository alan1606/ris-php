<div class="modal-dialog modal-lg" role="document" id="">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
		  <table class="table-condensed" width="100%">
		  	<tr>
				<td width="99%">
					<button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        			<h4 class="modal-title"><strong><span id="titulo_modal">CREAR UN NUEVO PRODUCTO</span></strong></h4>
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
                     <label for="nombre_p">* Nombre del producto</label>
                     <input type="text" class="form-control" id="nombre_p" name="nombre_p" placeholder="Nombre del producto" required onKeyUp="conMayusculas(this);">
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
			</div>
			<div class="row">
				<div class="col-sm-6">
                     <div class="form-group">
                     <label for="grupo_p">* Gupo</label>
					 <select data-placeholder="Selecciona el grupo" id="grupo_p" name="grupo_p" required class="chosen-select form-control"> </select>
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
				<div class="col-sm-6">
                     <div class="form-group">
                     <label for="categoria_p">* Categoría</label>
				     <select data-placeholder="Selecciona la categoría" id="categoria_p" name="categoria_p" required class="chosen-select form-control"> </select>
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
			</div>
			<div class="row">
				<div class="col-sm-6">
                     <div class="form-group">
                     <label for="umedida_p">* Unidad de medida</label>
					 <select data-placeholder="Selecciona la unidad de medida" id="umedida_p" name="umedida_p" required class="chosen-select form-control"> </select>
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
				<div class="col-sm-6">
                     <div class="form-group">
                     <label for="presentacion_p">* Presentación</label>
					 <select data-placeholder="Selecciona la presentación" id="presentacion_p" name="presentacion_p" required class="chosen-select form-control"> </select>
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
			</div>
			<div class="row">
				<div class="col-sm-6">
                     <div class="form-group">
                     <label for="marca_p">* Marca</label>
					 <select data-placeholder="Selecciona la marca" id="marca_p" name="marca_p" required class="chosen-select form-control"> </select>
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
				<div class="col-sm-6">
                     <div class="form-group">
                     <label for="modelo_p">Modelo</label>
					 <select data-placeholder="Selecciona el modelo" id="modelo_p" name="modelo_p" class="chosen-select form-control"> </select>
                     </div>
                </div>
			</div>
			<div class="row">
				<div class="col-sm-3">
                     <div class="form-group">
                     <label for="costo_p">* Costo $</label>
                     <input type="text" class="form-control" id="costo_p" name="costo_p" placeholder="Costo" style="text-align: right;" required onKeyUp="numeros_decimales(this.value, this.name);">
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
				<div class="col-sm-3">
                     <div class="form-group">
                     <label for="precio_p_p">* Precio publico $</label>
                     <input type="text" class="form-control" id="precio_p_p" name="precio_p_p" placeholder="Precio publico" style="text-align: right;" required onKeyUp="numeros_decimales(this.value, this.name);">
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
				<div class="col-sm-3">
                     <div class="form-group">
                     <label for="precio_m_p">* Precio membresía $</label>
                     <input type="text" class="form-control" id="precio_m_p" name="precio_m_p" placeholder="Precio membresía" style="text-align: right;" required onKeyUp="numeros_decimales(this.value, this.name);">
                     <div class="help-block with-errors"></div>
                     </div>
                </div>
				<div class="col-sm-3">
                     <div class="form-group">
                     <label for="cb_p">Código de barras</label>
                     <input type="text" class="form-control" id="cb_p" name="cb_p" placeholder="Código de barras" onKeyUp="">
                     </div>
                </div>
			</div>
			<div class="row">
				<div class="col-sm-12">
                     <div class="form-group">
                     <label for="descripcion_p">Descripción</label>
                     <textarea class="form-control" name="descripcion_p" id="descripcion_p" cols="1" rows="3" style="resize:none;" onKeyUp="conMayusculas(this);" placeholder="Descripción del producto"></textarea>
                     </div>
                </div>
			</div>

		<input name="id_pdt" id="id_pdt" type="hidden" value=""> <input name="id_user_reg_cf" id="id_user_reg_cf" type="hidden" value="">
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