<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_usuario">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong><span id="titulo_modal">GRÁFICA</span></strong></h4>
      </div>
      <div class="modal-body">
        <input name="id_usr_reg" type="hidden" value="" id="id_usr_reg">
        <input name="id_usr_update" type="hidden" value="x" id="id_usr_update">
        <input name="id_unidad_m" type="hidden" value="x" id="id_unidad_m">

       <div>
           <div id="lineChart"></div>
       </div>

      </div>
      <div class="modal-footer">
      	<div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
          <div class="checkbox">
            <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancel_new_u">Cerrar</button>
          </div>
        </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
