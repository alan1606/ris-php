<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_consulta">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><strong><span id="titulo_modal">VISUALIZAR EL ESTUDIO</span></strong></h4>
      </div>
      <div class="modal-body">

      <div class="panel panel-info">
          <!-- Default panel contents -->
          <div class="panel-heading">SELECCIONA EL VISIALIZADOR QUE DESEAS UTILIZAR</div>
          <div class="panel-body">
        <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed">
          <tr>
            <td width="1px" nowrap class="titulosTabla">PACIENTE</td>
            <td align="left" colspan="3">
             <input class="campoDatosTabla" name="paciente_est" id="paciente_est" type="text" readonly style="text-align:left; width:99%;">
            </td>
          </tr>
          <tr>
            <td class="titulosTabla">ESTUDIO</td>
            <td align="left" colspan="3">
                <input class="campoDatosTabla" name="folio_est" id="folio_est" type="text" readonly style="text-align:left; width:99%;">
            </td>
          </tr>
          <tr>
            <td class="titulosTabla">REFERENCIA</td>
            <td align="left" colspan="3">
            <input class="campoDatosTabla" name="referencia_est"id="referencia_est"type="text" style="text-align:left;width:99%;" readonly>
            </td>
          </tr>

          <tr>
            <td colspan="4" align="center" class="text-danger">* Si elige abrir los estudios con el visualizador AVANZADO favor de instalarlo en su equipo, elija su sistema operativo:</td>
          </tr>
          <tr>
            <td colspan="2" align="center" class="text-dark">WINDOWS</td>
            <td colspan="2" align="center" class="text-dark">MAC</td>
          </tr>
          <tr>
            <td colspan="2" align="center" class="text-dark">
              <a href="https://github.com/nroduit/Weasis/releases/download/v3.6.2/Weasis-3.6.2-x86-64.msi" target="_blank" class="btn btn-success btn-sm">Descargar <i class="fa fa-download"></i></a>
            </td>
            <td colspan="2" align="center" class="text-dark">
              <a href="https://github.com/nroduit/Weasis/releases/download/v3.6.2/Weasis-3.6.2.pkg" target="_blank" class="btn btn-sm btn-success">Descargar <i class="fa fa-download"></i></a>
            </td>
          </tr>

          <tr class="hidden">
            <td class="titulosTabla" nowrap>LINK V-SIMPLE</td>
            <td align="left" id="chosto" class="text-warning" colspan="3"> </td>
          </tr>
          <tr class="hidden">
            <td class="titulosTabla" nowrap>LINK V-AVANZADO</td>
            <td align="left" id="chosto1" class="text-warning" colspan="3"><a href="weasis://%24dicom%3Aget%20-w%20%22http%3A%2F%2Fweasis-launcher-weasis.apps.us-west-1.starter.openshift-online.com%2Fweasis-pacs-connector%2Fmanifest%3FstudyUID%3D1.2.840.113619.2.98.3467.1098086125.0.69%22" class="btn btn-default">Launch</a></td>
          </tr>
        </table>
        <input name="idEstudioPacs" type="hidden" value="" id="idEstudioPacs">
</div>
      </div>
<div class="modal-footer">
    <div class="form-group">
    <div class="col-sm-offset-0 col-sm-12">
        <button type='submit' id="btn_v_osirix" class="btn btn-info btn-sm hidden">Osirix</button>
		    <button type='submit' id="btn_v_html" class="btn btn-info btn-sm">Visualizador html</button>
        <button type='submit' id="btn_v_avanzado" class="btn btn-info btn-sm">Visualizador avanzado</button>
        <button type='submit' id="btn_reasignar_id" class="btn btn-primary btn-sm">Reasignar IDPACS</button>
        <button type='button' class="btn btn-warning btn-sm" data-dismiss="modal">Cerrar</button>
    </div>
    </div>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
