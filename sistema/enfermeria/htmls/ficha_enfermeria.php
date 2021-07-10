<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_consulta">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong><span id="titulo_modal">FICHA DE ENFERMERÍA</span></strong></h4>
      </div>
      <div class="modal-body">
      	<input name="idUsuario_c" id="idUsuario_c" type="hidden" value=""> 
		<input name="idPaciente_c" id="idPaciente_c" type="hidden" value="">
        <input name="id_cons" id="id_cons" type="hidden" value="">
		<input name="numeroTemporalC" id="numeroTemporalC" type="hidden" value="">
        <!-- Nav tabs -->
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td nowrap>
					<ul class="nav nav-tabs" role="tablist" id="tabs_ficha">
						<li role="presentation" class="active">
							<a href="#tPRIN" aria-controls="tPRIN" role="tab" data-toggle="tab" id="tab_my_principal">PRINCIPAL</a>
						</li>
						<li role="presentation" class="" id="tab_antece">
							<a href="#tAntece" aria-controls="tAntece" role="tab" data-toggle="tab" id="my_tb_antece">ANTECEDENTES</a>
						</li>
						<li role="presentation" class="" id="tabs_vacuna">
							<a href="#tVacuna" aria-controls="tVacuna" role="tab" data-toggle="tab" id="my_tb_vacuna">VACUNACIÓN</a>
						</li>
						<li role="presentation" class="" id="tabs_nutri">
							<a href="#tNutri" aria-controls="tNutri" role="tab" data-toggle="tab">NUTRICIÓN</a>
						</li>
						<li role="presentation" class="">
							<a href="#tHSV" aria-controls="tHSV" role="tab" data-toggle="tab" id="tab_sv_1">HISTORIAL SV</a>
						</li>
					</ul>
				</td>
				<td align="right" nowrap class=""> <button type="button" class="btn btn-warning" data-dismiss="modal" id="salirSGconsulta">SALIR</button> </td>
			</tr>
		</table>
        
        <!-- Tab panes -->
        <div class="tab-content" style="font-size: 1em;">
			<div role="tabpanel" class="tab-pane active" id="tPRIN">
				<table class="table-condensed" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td>
							<table class="table-condensed table-bordered" width="100%">
								<tr class="bg-info"> <td>APELLIDO PATERNO</td><td>APELLIDO MATERNO</td><td>NOMBRE(S)</td><td>SEXO</td> </tr>
								<tr class="">
									<td><span id="a_paterno">ANZURES</span></td><td><span id="a_materno">BAUTISTA</span></td>
									<td><span id="nombre_p">EMMANUEL</span></td><td><span id="sexo_p">MASCULINO</span></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table class="table-condensed table-bordered" width="100%">
								<tr class="bg-info"> 
									<td nowrap>FECHA NACIMIENTO</td><td>EDAD</td><td nowrap>ENTIDAD DE NACIMIENTO</td><td nowrap>TELÉFONO PERSONAL</td> 
								</tr>
								<tr class="">
									<td><span id="fnac_p">20/09</span></td> <td><span id="edad_p">35 AÑOS</span></td>
									<td><span id="entidad_nac">MORELOS</span></td> <td><span id="telefono_p">(735)-288-8462</span></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table class="table-condensed table-bordered" width="100%">
								<tr class="bg-info"> <td nowrap>DIRECCIÓN. CALLE Y NÚMERO</td><td>COLONIA</td><td>LOCALIDAD</td><td>MUNICIPIO</td><td>ESTADO</td> </tr>
								<tr class="">
									<td><span id="calle_numero_d_p"></span></td>
									<td><span id="colonia_d_p"></span></td>
									<td><span id="localidad_d_p"></span></td>
									<td><span id="municipio_d_p"></span></td>
									<td><span id="estado_d_p"></span></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<form id="form-uno" name="form-uno" data-toggle="validator" role="form">
								<table class="table-condensed table-bordered" width="100%">
									<tr class="bg-primary">
										<td nowrap width="160">TIPO SANGUÍNEO</td>
										<td nowrap>
											CONTACTO EMERGENCIA
											<button type="submit" class="btn btn-default btn-xs" id="btn-save-ce"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
										</td>
										<td nowrap width="140">PARENTESCO</td>
										<td nowrap width="1%">TELÉFONO DEL CONTACTO</td>
									</tr>
									<tr class="">
										<td><select id="tsanguineo_p" name="tsanguineo_p" class="form-control"></select></td>
										<td>
											<div class="form-group">
											 <input type="text" id="contacto_p" name="contacto_p" value="" class="form-control" required onKeyUp="conMayusculas(this);">
											 <div class="help-block with-errors"></div>
                     						</div>
										</td>
										<td>
											<div class="form-group">
											 <select id="parentesco_c_p" name="parentesco_c_p" class="form-control" required></select>
											 <div class="help-block with-errors"></div>
                     						</div>
										</td>
										<td>
											<div class="form-group">
											 <input type="text" id="telefono_c_p" name="telefono_c_p" value="" class="form-control" data-mask="(999) 999-9999" maxlength="12" min="10" placeholder="Teléfono del contacto" required>
											 <div class="help-block with-errors"></div>
                     						</div>
										</td>
									</tr>
								</table>
							</form>
						</td>
					</tr>
					<tr>
						<td>
							<form id="form-dos" name="form-dos" data-toggle="validator" role="form">
							<table class="table-condensed table-bordered" width="100%">
								<tr class="bg-primary">
									<td width="185" nowrap>RELIGIÓN</td> <td nowrap width="155">ESCOLARIDAD</td>
									<td>OCUPACIÓN<input type="hidden" id="id_ocupacion" value=""></td>
									<td nowrap>ESTADO CIVIL</td>
								</tr>
								<tr class="">
									<td><select id="religion_p" name="religion_p" class="form-control"></select></td>
									<td><select id="escolaridad_p" name="escolaridad_p" class="form-control"></select></td>
									<td>
										<input type="text" id="ocupacion_p" name="ocupacion_p" value="" class="form-control typeahead" data-provide="typeahead" onKeyUp="conMayusculas(this);">
									</td>
									<td> <select id="edo_civil_p" name="edo_civil_p" class="form-control"></select> </td>
								</tr>
							</table>
							</form>
						</td>
					</tr>
					<tr>
						<td>
							<table class="table-condensed table-bordered" width="100%">
								<tr>
									<td class="bg-primary" width="1%">APGAR</td>
									<td>
										<select id="apgar_p" name="apgar_p" class="form-control">
											<option value="" selected>-Seleccionar-</option> <option value="0">0</option> <option value="1">1</option>
											<option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option>
											<option value="6">6</option> <option value="7">7</option> <option value="8">8</option> 
											<option value="10">10</option>
										</select>
									</td>
									<td class="bg-primary" width="1%">TAMIZ</td>
									<td>
										<select id="tamiz_p" name="tamiz_p" class="form-control">
											<option value="" selected>-Seleccionar-</option> <option value="1">POSITIVO</option> <option value="0">NEGATIVO</option>
										</select>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<form id="form-tres" name="form-tres" data-toggle="validator" role="form">
							<table class="table-condensed table-bordered" width="100%">
								<tr> 
									<td width="1%" nowrap class="bg-primary">
										ALÉRGIAS
										<button type="submit" class="btn btn-default btn-xs" id="btn-save-ap"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
									</td>
									<td>
										<div class="form-group">
										 <textarea style="resize: none;" class="form-control" id="alergias_p" name="alergias_p" required onKeyUp="conMayusculas(this);"></textarea>
										 <div class="help-block with-errors"></div>
                     					</div>
									</td>
								</tr>
							</table>
							</form>
						</td>
					</tr>
					<tr>
						<td align="center" class="bg-success">
							ÚLTIMA TOMA DE SIGNOS VITALES <span class="badge badge-success" id="fecha_usv">20/09/1985</span> POR <span class="badge badge-success" id="usuario_usv">EMMANUEL</span>
							<button type="button" class="btn btn-default btn-sm" id="btn-tomar-sv" style="float: right;">Tomar nuevos datos <i class="fa fa-heartbeat" aria-hidden="true"></i></button>
						</td>
					</tr>
					<tr>
						<td>
							<table class="table-condensed table-bordered" width="100%">
								<tr class="bg-danger" align="center">
									<td>TALLA</td>
									<td>PESO</td>
									<td>IMC</td>
									<td>TEMP</td>
									<td>OXIMETRÍA</td>
								</tr>
								<tr class="">
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="talla_p" name="talla_p" value="1.70" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">m</span>
										</div>
									</td>
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="peso_p" name="peso_p" value="88" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">kg</span>
										</div>
									</td>
									<td nowrap align="center"><span id="imc_p"></span></td>
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="temp_p" name="temp_p" value="88" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">ºc</span>
										</div>
									</td>
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="oxi_p" name="oxi_p" value="37" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">% SaO<sub>2</sub></span>
										</div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table class="table-condensed table-bordered" width="100%">
								<tr class="bg-danger" align="center"> <td>T</td> <td>A</td> <td>FC</td> <td>FR</td> <td>GLUCOSA</td> </tr>
								<tr class="">
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="t_p" name="t_p" value="100" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">mmHg</span>
										</div>
									</td>
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="a_p" name="a_p" value="110" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">mmHg</span>
										</div>
									</td>
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="fc_p" name="fc_p" value="76" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">x min</span>
										</div>
									</td>
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="fr_p" name="fr_p" value="55" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">x min</span>
										</div>
									</td>
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="gluc_p" name="gluc_p" value="90" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">mg/dl</span>
										</div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table class="table-condensed table-bordered" width="100%">
								<tr class="bg-danger" align="center">
									<td>PERÍMETRO ABDOMINAL</td> <td>PERIMETRO CEFALICO</td> <td>PERIMETRO TORACICO</td> <td>MEDIDA DEL PIE</td>
								</tr>
								<tr class="">
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="pa_p" name="pa_p" value="30" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">cm</span>
										</div>
									</td>
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="pc_p" name="pc_p" value="40" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">cm</span>
										</div>
									</td>
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="pt_p" name="pt_p" value="50" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">cm</span>
										</div>
									</td>
									<td>
										<div class="input-group margin-bottom-sm">
										  <input type="text" id="pie_p" name="pie_p" value="8" class="form-control sv" style="text-align: right;">
										  <span class="input-group-addon">cm</span>
										</div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table class="table-condensed table-bordered" width="100%">
								<tr> 
									<td width="1%" nowrap class="bg-danger">NOTAS</td>
									<td><textarea style="resize: none;" class="form-control sv" id="notas_sv" name="notas_sv"></textarea></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
            </div>
			
            <div role="tabpanel" class="tab-pane" id="tHSV"><br>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" id="tabs_sv">
                    <li role="presentation" class="active tab_sv hide_nsv"><a href="#tRI_sv" aria-controls="tRI_sv" role="tab" data-toggle="tab">RIESGOS</a></li>
					<li role="presentation" class="tab_sv hide_nsv"><a href="#tRE_sv" aria-controls="tRE_sv" role="tab" data-toggle="tab">RECOMENDACIONES</a></li>
                    <li role="presentation" class="tab_sv hide_nsv" id="mi_tab_h_sv"><a href="#tHi_sv" aria-controls="tHi_sv" role="tab" data-toggle="tab">HISTORIAL</a></li>
					<li role="presentation" class="tab_sv hide_nsv"><a href="#tEs_sv" aria-controls="tEs_sv" role="tab" data-toggle="tab">ESTADISTICAS</a></li>
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tRI_sv"><br>
                    	<div class="panel panel-warning">
                          <div class="panel-heading">
                            <h3 class="panel-title"> CLASIFICACIÓN DEL PACIENTE EN CUANTO A SOBREPESO Y OBESIDAD </h3>
                          </div>
                          <div class="panel-body">
                            <div align="justify" class="well well-sm">De acuerdo a los datos proporcionados en los signos vitales del paciente con un <var class="mouseOver" title="El índice de masa corporal (IMC) es una medida de asociación entre la masa y la talla de un individuo ideada por el estadístico belga Adolphe Quetelet, por lo que también se conoce como índice de Quetelet.
Se calcula según la expresión matemática: IMC = masa/(estatura^2). Donde la masa se expresa en kilogramos y el cuadrado de la estatura en metros cuadrados">IMC</var> de <var id="miIMC"></var> y una medida de circunferencia de cintura de <var id="miMedidaCintura"></var> cms</div>
							<table width="100%" border="0" cellspacing="0"cellpadding="0" class="table table-condensed table-bordered">
                              <tr class="bg-info">
                                <td align="center">IMC (kg/m^2)</td> <td align="center">CLASIFICACIÓN</td>
                              </tr>
                              <tr>
                                <td class="normalIMC" align="left">18.50 - 24.99</td>
                                <td align="left" class="normalIMC">Rango normal</td>
                              </tr>
                              <tr>
                                <td align="left">>= 25.00</td> <td align="left">Sobrepeso</td>
                              </tr>
                              <tr>
                                <td class="sobrepesoIMC" align="left">25.00 - 29.99</td>
                                <td class="sobrepesoIMC" align="left">Preobesidad</td>
                              </tr>
                              <tr>
                                <td align="left">>= 30.00</td> <td align="left">Obesidad</td>
                              </tr>
                              <tr>
                                <td class="obesidad1IMC" align="left">30.00 - 34.99</td>
                                <td class="obesidad1IMC" align="left">Clase I</td>
                              </tr>
                              <tr>
                                <td class="obesidad2IMC" align="left">35.00 - 39.99</td>
                                <td class="obesidad2IMC" align="left">Clase II</td>
                              </tr>
                              <tr>
                                <td class="obesidad3IMC" align="left">>= 40.00</td>
                                <td class="obesidad3IMC" align="left">Clase III</td>
                              </tr>
                              <tr>
                                <td colspan="2" align="justify" class="bg-success">
                                <samp align="justify">* Esto indica que el paciente <span id="miRiesgoP"></span> de contraer <span id="defDiabetes" class="mouseOver" title="La diabetes mellitus tipo 2 es un trastorno metabólico que se caracteriza por hiperglucemia (nivel alto de azúcar en la sangre) en el contexto de resistencia a la insulina y falta relativa de insulina; en contraste con la diabetes mellitus tipo 1, en la que hay una falta absoluta de insulina debido a la destrucción de los islotes pancreáticos. Los síntomas clásicos son sed excesiva, micción frecuente y hambre constante. La diabetes tipo 2 representa alrededor del 90 % de los casos de diabetes, con el otro 10 % debido principalmente a la diabetes mellitus tipo 1 y la diabetes gestacional. Se piensa que la obesidad es la causa primaria de la diabetes tipo 2 entre personas con predisposición genética a la enfermedad.">diebetes mellitus tipo 2</span>, <span class="mouseOver" id="defHipertension" title="La hipertensión arterial (HTA) es una enfermedad crónica caracterizada por un incremento continuo de las cifras de la presión sanguínea en las arterias. Aunque no hay un umbral estricto que permita definir el límite entre el riesgo y la seguridad, de acuerdo con consensos internacionales, una presión sistólica sostenida por encima de 139 mmHg o una presión diastólica sostenida mayor de 89 mmHg, están asociadas con un aumento medible del riesgo de aterosclerosis y por lo tanto, se considera como una hipertensión clínicamente significativa.">hipertensión</span> y <span class="mouseOver" id="defEnfermedadC" title="En sentido amplio, el término cardiopatía (del gr. kardí(ā) καρδία 'corazón' y pátheia πάθεια 'enfermedad') puede englobar a cualquier padecimiento del corazón o del resto del sistema cardiovascular. Habitualmente se refiere a la enfermedad cardíaca producida por asma o por colesterol.
Sin embargo, en sentido estricto se suele denominar cardiopatía a las enfermedades propias de las estructuras del corazón.">enfermedad cardiovascular.</span></samp>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2" align="justify" style="font-size:0.8em; opacity:0.7;">
                                    Fuente: World Health Organization 
                                    <cite><span style="cursor:pointer" onClick="window.open('http://www.who.int/bmi/index.jsp?introPage=intro_3.html');">
                                        http://www.who.int/bmi/index.jsp?introPage=intro_3.html
                                    </span></cite>
                                </td>
                              </tr>
                            </table>
                            
							<div align="justify" class="well well-sm">Riesgo de enfermedad para el paciente según la medida de la circunferencia de su cintura e imc</div>
                            <table width="100%" border="0" cellspacing="0"cellpadding="0" class="table table-condensed table-bordered">
                              <tr class="bg-info">
                                <td rowspan="2" align="center" valign="middle">IMC</td>
                                <td>Cintura <strong>hombres</strong> < 90 cms</td> <td>Cintura <strong>hombres</strong> >= 90 cms</td>
                              </tr>
                              <tr class="bg-info">
                                <td>Cintura <strong>mujeres</strong> < 80 cms</td> <td>Cintura <strong>mujeres</strong> >= 80 cms</td>
                              </tr>
                                
                              </tr>
                              <tr>
                                <td align="left">18.5 - 24.9</td>
                                <td class="imc_1_1" align="left">Sin riesgo</td>
                                <td class="imc_1_2" align="left">Riesgo alto</td>
                              </tr>
                              <tr>
                                <td align="left">25.0 - 29.9</td>
                                <td class="imc_2_1" align="left">Riesgo moderado</td>
                                <td class="imc_2_2" align="left">Riesgo alto</td>
                              </tr>
                              <tr>
                                <td align="left">30.0 - 39.9</td>
                                <td class="imc_3_1" align="left">Alto a muy alto riesgo</td>
                                <td class="imc_3_2" align="left">Muy alto riesgo</td>
                              </tr>
                              <tr>
                                <td align="left"> > 40 </td>
                                <td class="imc_4_1" align="left">Extremadamente alto</td>
                                <td class="imc_4_2" align="left">Extremadamente alto</td>
                              </tr>
                              <tr>
                                <td colspan="3" align="justify" style="font-size:0.8em; color:black; opacity:0.7;">
                                Fuente: 
                                <cite><span style="cursor:pointer" onClick="window.open('http://www.cenetec.salud.gob.mx/descargas/gpc/CatalogoMaestro/046_GPC_ObesidadAdulto/IMSS_046_08_GRR.pdf');">
                                National Health and Medical Research Council. Clinical Practice Guidelines for the Management of Overweight and Obesity in Adults. Australia 2003.</cite>
                                </span>
                                </td>
                              </tr>
                            </table>
                            
                          </div>
                        </div>
                    </div>
					<div role="tabpanel" class="tab-pane" id="tRE_sv"><br>
                    	<div class="panel panel-warning">
                          <div class="panel-body">
                            <div align="justify" class="well well-sm">
                            	De acuerdo con la tabla de IMC para el <span class="mouseOver" title="Los factores de riesgo cardiovascular asociados con la obesidad en la infancia y adolescencia son: hipertensión arterial, dislipidemia, hiperinsulinemia y alteraciones en la masa ventricular cardiaca izquierda.">riesgo de enfermedad</span> en adultos con sobrepeso y obesidad, el paciente se encuantra <span id="miRiesgoE"></span>.
                            </div>
                            <table width="100%" border="0" cellspacing="0"cellpadding="0" class="table table-condensed table-bordered">
                              <tr class="bg-info">
                                <td align="center" valign="middle" colspan="2">Se recomienda que:</td>
                              </tr>
                              <tr id="recomendacionRN">
                                <td align="left" colspan="2">
                                <li> Se oriente al paciente en una adecuada educación alimentaria.</li>
                                <li> Se sugiera un programa de actividad física regular moderada de cuatro veces por semana.</li>
                                <li> Recomendar al paciente que evite el alcoholismo y el tabaquismo, que modere la ingesta de café, fomentar la higiene del  sueño y control de estrés.</li>
                                <li> Que mantenga vigilado su IMC semestralmente y utilice <span class="mouseOver">medidas de prevención primaria</span>.</li>
                                </td>
                              </tr>
                              <tr class="recomendacionSP bg-info">
                                <td colspan="2" align="center">El paciente cuenta con enfermedades o condiciones asociadas</td>
                              </tr>
                              <tr class="recomendacionSP bg-success" align="center">
                                <td width="50%">NO</td> <td>SI</td>
                              </tr>
                              <tr class="recomendacionSP" align="justify">
                                <td>
                                <li> Sugerir un programa dietético personalizado.</li>
                                <li> Establecer metas de reducción de peso óptimas (reducción del 5%-10% del peso corporal o reducción de 0.5 a 1 kg por semana por 6 meses).</li>
                                <li> Actividad física regular aeróbica moderada individualizada por 155 a 255 minutos por semana.</li>
                                <li> Evaluación psicológica y social para la identificación de barreras que limiten el seguimiento de un tratamiento.</li>
                                </td>
                                <td>
                                <li> Manejo integral de la comorbilidad.</li>
                                <li> Atención y manejo por equipo transdisciplinario:<br>-Licenciado en nutición, Nutricionista/Dietista<br>-Psicólogo<br>-Trabajo Social<br>-Médico Internista/Endocrinólogo</li>
                                <li> Establecer un plan dieto-Terapéutico individualizado, actividad física y cambios en estilos de vida saludable.</li>
                                </td>
                              </tr>
                              <tr class="recomendacionSP bg-info">
                                <td colspan="2" align="center">Logro de metas y éxito terapéutico</td>
                              </tr>
                              <tr class="recomendacionSP bg-success" align="center">
                                <td>SI</td> <td>NO</td>
                              </tr>
                              <tr class="recomendacionSP">
                                <td>Vigilar y promover mantenimiento de reducción de peso, seguimiento al IMC y circunferencia abdominal.</td>
                                <td>Volver al principio</td>
                              </tr>
                            <tr class="recomendacionOB">
                                <td colspan="2">
                                <li> Crear e iniciar inmediatamente un programa individualizado y adecuado de dieta para el paciente.</li>
                                <li> Crear e iniciar inmediatamente un <span class="mouseOver">programa individualizado y adecuado de actividad física</span> para el paciente.</li>
                                <li> Crear e iniciar inmediatamente un programa individualizado y adecuado de terepia cognitivo-conductual para el paciente.</li>
                                <li> Apoyo <span class="mouseOver">psicosocial</span>.</li>
                                </td>
                              </tr>
                              <tr class="recomendacionOB bg-info">
                                <td colspan="2" align="center">Éxito terapéutico con evidencia de apego</td>
                              </tr>
                              <tr class="recomendacionOB bg-success" align="center">
                                <td width="50%">SI</td> <td>NO</td>
                              </tr>
                              <tr class="recomendacionOB" align="justify">
                                <td>
                                <li> Reforzar estilos de vida saludables adquiridos.</li>
                                <li> Vigilancia estrecha mensual del control de peso por un lapso de 12 meses y en fechas críticas(festividades, reuniones ,etc.).</li>
                                <li> Mantener comunicación continua e información de los riesgos y beneficios de los fármacos administrados.</li>
                                <li> Continuar con la terapia conductual.</li>
                                </td>
                                <td>
                                <li> Indagar falta de apego al tratamiento farmacológico y no farmacológico.</li>
                                <li> Investigar transtornos del estado de ánimo.</li>
                                <li> Investigar transtornos de alimentación.</li>
                                <li> Investigar transtornos metabólicos.</li>
                                <li> Investigar interacciones farmacológicas que influyan en la ganancia de peso.</li>
                                <li> Evaluar la adición de otras opciones de tratamiento.</li>
                                </td>
                            </tr>
                            </table>
                          </div>
                        </div>
                    </div>
					<div role="tabpanel" class="tab-pane" id="tHi_sv"><br>
                      <input name="id_medicoLab" id="id_medicoLab" type="hidden" value="">
                      <input name="id_DepartamentoLab" id="id_DepartamentoLab" type="hidden" value="1">
                      <table width="100%" id="dataTableSV" class="table table-hover table-striped dataTable table-condensed" role="grid"> 
                        <thead id="">
                          <tr role="row" class="bg-info">
                            <th id="clickmeSV">#</th>
                            <th>FECHA</th>
                            <th>PESO</th>
                            <th>TALLA</th>
                            <th>IMC</th>
                            <th>CINTURA</th>
                            <th>T/A</th>
                            <th>FR</th>
                            <th>FC</th>
                            <th>TEMP</th>
                            <th>OXI</th>
                          </tr>
                        </thead>
                        <tbody class="cuerpo_datatable"> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
                      </table>
                    </div>
					<div role="tabpanel" class="tab-pane" id="tEs_sv"><br>
                    	<input name="id_pMedico" id="id_pMedico" type="hidden" value="">
                        <input name="id_DepartamentoSer" id="id_DepartamentoSer" type="hidden" value="4">
                        <table id="grafiasSV" width="100%" class="table table-condensed table-bordered">
                          <tr>
                          	<td colspan="2" class="bg-info" align="center">GRÁFICAS DE LOS PRINCIPALES SIGNOS VITALES</td>
                          </tr>
                          <tr>
                            <td width="50%" height="50%">
                            <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
                              <tr> <td height="1%" align="center" width="">Presión arterial sistólica (T)</td> </tr>
                              <tr> <td id="contenedorCHT"><div class="miCanva" id="myChartT1" ></div></td> </tr>
                            </table>
                            </td>
                            <td>
                            <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
                              <tr> <td height="1%" align="center">Presión arterial diastólica (A)</td> </tr>
                              <tr> <td id="contenedorCHta"><div class="miCanva" id="myChartTA" ></div></td> </tr>
                            </table>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
                              <tr> <td height="1%" align="center">Frecuencia respiratoria</td> </tr>
                              <tr> <td id="contenedorCHfr"><div class="miCanva" id="myChartFR" ></div></td> </tr>
                            </table>
                            </td>
                            <td>
                            <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
                              <tr> <td height="1%" align="center">Frecuencia cardiaca</td> </tr>
                              <tr> <td id="contenedorCHfc"><div class="miCanva" id="myChartFC" ></div></td> </tr>
                            </table>
                            </td>
                          </tr>
                          <tr>
                            <td width="50%" height="50%">
                            <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
                              <tr> <td height="1%" align="center" width="">Índice de Masa Corporal</td> </tr>
                              <tr> <td id="contenedorCH"><div class="miCanva" id="myChartIMC" ></div></td> </tr>
                            </table>
                            </td>
                            <td>
                            <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
                              <tr> <td height="1%" align="center">Temperatura</td> </tr>
                              <tr> <td id="contenedorCHt"><div class="miCanva" id="myChartT" ></div></td> </tr>
                            </table>
                            </td>
                          </tr>
						  <tr>
                            <td width="50%" height="50%">
                            <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
                              <tr> <td height="1%" align="center" width="">Talla</td> </tr>
                              <tr> <td id="contenedorCHtl"><div class="miCanva" id="myChartTL" ></div></td> </tr>
                            </table>
                            </td>
                            <td>
                            <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
                              <tr> <td height="1%" align="center">Peso</td> </tr>
                              <tr> <td id="contenedorCHpe"><div class="miCanva" id="myChartPE" ></div></td> </tr>
                            </table>
                            </td>
                          </tr>
                        </table>
                    </div>
                </div>
            </div>
		  
            <div role="tabpanel" class="tab-pane" id="tAntece"> </div>
		  
            <div role="tabpanel" class="tab-pane" id="tVacuna"><br>
            	<ul class="nav nav-tabs" role="tablist" id="tabs_ficha">
					<li role="presentation" class="active">
						<a href="#tEBV" aria-controls="tEBV" role="tab" data-toggle="tab">ESQUEMA BÁSICO</a>
					</li>
					<li role="presentation" class="" id="">
						<a href="#tEAA" aria-controls="tEAA" role="tab" data-toggle="tab" id="tab_tEAA">ESQUEMA ADOLESCENTES Y ADULTOS</a>
					</li>
					<li role="presentation" class="" id="">
						<a href="#tEOV" aria-controls="tEOV" role="tab" data-toggle="tab" id="tab_tEOV">OTRAS VACUNAS</a>
					</li>
				</ul>
				<!-- Tab panes -->
        		<div class="tab-content" style="font-size: 1em;">
					<div role="tabpanel" class="tab-pane active" id="tEBV"> </div>
					<div role="tabpanel" class="tab-pane" id="tEAA"><br>
                		<div class="bg-info"><h3>Para agregarle una vacuna al paciente, seleccione la vacuna e indique la fecha en que fue aplicada.</h3></div>
						<form id="form-add_vacuna_2" data-toggle="validator" role="form"> <input type="hidden" id="id_pac_hv2" name="id_pac_hv2">
							<table width="100%" class="table-condensed table-bordered">
								<tr>
									<td><select id="vacuna_add" name="vacuna_add" class="form-control" required></select></td>
									<td width="150px">
										<input type="text" class="form-control" id="date_apvac" name="date_apvac" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="text-align: right;" required readonly>
									</td>
									<td width="1%"><button type="submit" id="btn_add_vac_2" class="btn btn-primary btn-sm">Agregar</button></td>
								</tr>
							</table>
						</form><br>
						<table width="100%" id="dataTable_vacunas2" class="table-condensed table-hover table-striped" role="grid"> 
							<thead id="">
							  <tr role="row" class="bg-info">
								<th id="clickmeV2">#</th>
								<th>VACUNA</th>
								<th>ENFERMEDAD PREVIENE</th>
								<th>EDAD</th>
								<th>DOSIS</th>
								<th>FECHA APLICACIÓN</th>
								<th>ELIMINAR</th>
							  </tr>
							</thead>
							<tbody class="cuerpo_datatable"> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
						</table>
            		</div>
					<div role="tabpanel" class="tab-pane" id="tEOV"><br>
                		<div class="bg-info"><h3>Para agregarle una vacuna al paciente, seleccione la vacuna e indique la fecha en que fue aplicada.</h3></div>
						<form id="form-add_vacuna_3" data-toggle="validator" role="form"> <input type="hidden" id="id_pac_hv3" name="id_pac_hv3">
							<table width="100%" class="table-condensed table-bordered">
								<tr>
									<td><select id="vacuna_add3" name="vacuna_add3" class="form-control" required></select></td>
									<td width="150px">
										<input type="text" class="form-control" id="date_apvac3" name="date_apvac3" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="text-align: right;" required readonly>
									</td>
									<td width="1%"><button type="submit" id="btn_add_vac_3" class="btn btn-primary btn-sm">Agregar</button></td>
								</tr>
							</table>
						</form><br>
						<table width="100%" id="dataTable_vacunas3" class="table-condensed table-hover table-striped" role="grid"> 
							<thead id="">
							  <tr role="row" class="bg-info">
								<th id="clickmeV3">#</th>
								<th>VACUNA</th>
								<th>ENFERMEDAD PREVIENE</th>
								<th>EDAD</th>
								<th>DOSIS</th>
								<th>FECHA APLICACIÓN</th>
								<th>ELIMINAR</th>
							  </tr>
							</thead>
							<tbody class="cuerpo_datatable"> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
						</table>
            		</div>
				</div>
            </div>
		  
            <div role="tabpanel" class="tab-pane" id="tNutri"><br>
                
            </div>

            <div role="tabpanel" class="tab-pane" id="tHantece"><br>
            
            </div>
            
            
        </div>
        
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->