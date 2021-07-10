<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_consulta">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><strong><span id="titulo_modal">ENVIAR EL ESTUDIO POR CORREO</span></strong></h4>
      </div>
      <div class="modal-body">

      <div id="alerta_form" class="alert alert-warning">
        <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Favor de revisar el formulario, hay algunos errores.
      </div>

      <form action="" method="post" name="form-mail" id="form-mail" target="_self" style="height:100%;">

      <div class="panel panel-info">
          <!-- Default panel contents -->
          <div class="panel-heading">VERIFIQUE LA DIRECCIÓN DE CORREO ELECTRÓNICO</div>
        <div class="panel-body">
        <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed">
          <tr>
            <td align="left">

              <div class="form-group col-md-12 col-sm-12 text-primary">
                <label for="email_pac" class="col-form-label">EMAIL DEL PACIENTE*</label>
                <input name="email_pac" id="email_pac" type="email" class="form-control form-control-sm" placeholder="Introduzca una dirección de correo electrónico" required>
                <div class="help-block with-errors"></div>
              </div>

            </td>
          </tr>

          <tr>
            <td align="left">

              <div class="form-group col-md-12 col-sm-12 text-primary">
                <label for="email_pac2" class="col-form-label">EMAIL DEL MÉDICO REFERENTE</label>
                <input name="email_pac2" id="email_pac2" type="email" class="form-control form-control-sm" placeholder="Introduzca una dirección de correo electrónico">
                <div class="help-block with-errors"></div>
              </div>

            </td>
          </tr>

          <tr>
            <td align="left">

              <div class="form-group col-md-12 col-sm-12 text-primary">
                <label for="medicoRadiologo" class="col-form-label">ASIGNA A UN MÉDICO RADIOLOGO</label>
                <select class="form-control form-control-lg" name="medicoRadiologo" id="medicoRadiologo">
                  <option selected>Selecciona a un medico radiologo</option>
                  <option value="1">Dr. Manuel Martinez</option>
                  <option value="2">Dr. Villa</option>
                  <option value="3">Dr. Miguel Herrera</option>
                  <option value="4">Dr. Alejandra</option>
                  <option value="4">Dr. Lya</option>
                  <option value="4">Dr. Perla</option>
                  <option value="4">Dr. Alberto</option>
                </select>

                <!--input name="email_pac3" id="email_pac3" type="email" class="form-control form-control-sm" placeholder="Introduzca una dirección de correo electrónico"-->
                <div class="help-block with-errors"></div>
              </div>

            </td>
          </tr>

          <tr>
            <td align="left">

              <div class="form-group col-md-12 col-sm-12 text-primary">
                <label for="tecnicoEstudio" class="col-form-label">QUIEN TOMO EL ESTUDIO</label>
                <select class="form-control form-control-lg" name="tecnicoEstudio" id="tecnicoEstudio">
                  <option selected>Asigna a un Tecnico radiologo</option>
                  <option value="1">Daniela</option>
                  <option value="2">Erick </option>
                  <option value="3">Victor</option>
                  <option value="4">Idalia</option>
                  <option value="4">Jose</option>
                </select>

                <!--input name="email_pac3" id="email_pac3" type="email" class="form-control form-control-sm" placeholder="Introduzca una dirección de correo electrónico"-->
                <div class="help-block with-errors"></div>
              </div>

            </td>
          </tr>

          <tr>
            <td align="left">
              <div class="form-group col-md-12 col-sm-12 text-primary">
                <label for="notasP" class="col-form-label">MENSAJE PARA RADIOLOGO(opcional)</label>
                  <textarea name="mensajeE" id="mensajeE" cols="" rows="5" style="resize:none;" class="form-control form-control-sm" placeholder="MENSAJE"></textarea>
                <div class="help-block with-errors"></div>
              </div>
            </td>
          </tr>
        </table>
        <input name="idEstudioPacs" type="hidden" value="" id="idEstudioPacs">
        </div>

      </form>

    </div>

<div class="modal-footer">
    <div class="form-group">
    <div class="col-sm-offset-0 col-sm-12">
        <button type='submit' id="send_mail" class="btn btn-primary btn-sm">Enviar</button>
        <button type='button' class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
    </div>
    </div>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
