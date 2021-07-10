<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento sin título</title>
</head>

<body>

<div id="tabs_sv" style="width:100%; height:99%;" class="miDvisSV">
<form action="" method="post" name="formSignosVitales" id="formSignosVitales" target="_self" style="height:100%">
<input name="idUsuario_sv" id="idUsuario_sv" type="hidden" value=""> <input name="idPaciente_sv" id="idPaciente_sv" type="hidden" value="">
<input name="numeroTemporalSV" id="numeroTemporalSV" type="hidden" value="">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:0.9em;">
  <tr>
    <td id="tabsSV1">
    <ul>
        <li><a id="tabs-1-1" href="#tabs-1" style="color:; font-size:1em;">ÚLTIMOS</a></li>
        <li><a id="tabs-2-1" href="#tabs-2" style="color:; font-size:1em;">RIESGOS</a></li>
        <li><a id="tabs-3-1" href="#tabs-3" style="color:; font-size:1em;">RECOMENDACIONES</a></li>
        <li><a id="tabs-4-1" href="#tabs-4" style="color:; font-size:1em;">HISTORIAL</a></li>
        <li><a id="tabs-5-1" href="#tabs-5" style="color:; font-size:1em;">ESTADISTICAS</a></li>
    </ul>
    </td>
    <td align="right" style="padding-right:15px;">
    <button id="tomarNSV">Tomar</button>
    <button id="saveNSV">Guardar</button>&nbsp;
    <button id="cancelNSV">Cancelar</button>
    </td>
  </tr>
</table>
  
  <div id="tabs-1" style="width:100%; height:91%; padding-top:2px;">
  <table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="grisecito">
    <tbody align="left">
      <tr>
        <td> 
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr> 
                <td class="titulosTabs">Paciente</td> 
                <td class="titulosTabs" width="130px">Edad</td> 
                <td class="titulosTabs" width="120px">Sexo</td> 
              </tr>
              <tr> 
                <td><input name="pacienteSV" id="pacienteSV" type="text" readonly></td> 
                <td><input name="edadSV" id="edadSV" type="text" readonly></td> 
                <td><input name="sexoSV" id="sexoSV" type="text" readonly></td> 
              </tr>
            </table>
        </td>
        <td width="20%" style="max-width:100px;border:1px none gold;" rowspan="3" valign="top" id="miFotito">
        	<ul id="gallery" style="border:1px none red; text-align:center;"> <!-- Cargar Fotos --> </ul>
        </td>
      </tr>
      <tr>
        <td>
        <table width="100%" border="1" cellspacing="0" cellpadding="2">
          <tr> 
          	<td width="25%">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
              	<td align="left" class="titulosTabs" width="1px" nowrap>Peso</td>
                <td>
                <input name="pesoSV" type="text" id="pesoSV" onKeyUp="numeros_decimales(this.value, this.name);" maxlength="6" style="text-align:right;" class="required ignore">
                </td>
                <td align="left" class="titulosTabs">kg</td>
              </tr>
            </table>
            </td>
            <td width="25%">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
              	<td align="left" class="titulosTabs" width="1px" nowrap>Talla</td>
                <td><input name="tallaSV" type="text" id="tallaSV" onKeyUp="numeros_decimales(this.value, this.name);" maxlength="5" style="text-align:right;" class="required ignore"></td><td align="left" class="titulosTabs">mts</td>
              </tr>
            </table>
            </td>
            <td width="25%">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
              	<td align="left"class="titulosTabs"width="1px"nowrap>IMC</td>
                <td><input name="imcSV"type="text" id="imcSV" style="text-align:right;" readonly class="required ignore"></td>
                <td align="left" class="titulosTabs">kg/m^2</td>
              </tr>
            </table>
            </td>
            <td width="25%">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
              	<td align="left"class="titulosTabs"width="1px"nowrap>Cintura</td><td><input name="cinturaSV"type="text"id="cinturaSV"onKeyUp="numeros_decimales(this.value, this.name);"maxlength="5"style="text-align:right;" class="required ignore"></td>
                <td align="left" class="titulosTabs">cm</td>
              </tr>
            </table>
            </td> 
          </tr>
          <tr> 
          	<td width="25%">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
              	<td align="left" class="titulosTabs" width="1px" nowrap>T/A</td><td><input name="tSV" type="text" id="tSV" onKeyUp="numeros_decimales(this.value, this.name);" maxlength="4" style="text-align:right;" class="required ignore"></td>
                <td align="left" class="titulosTabs" width="1px" nowrap>/</td><td><input name="aSV" type="text" id="aSV" onKeyUp="numeros_decimales(this.value, this.name);" maxlength="4" style="text-align:right;" class="required ignore"></td>
              </tr>
            </table>
            </td>
            <td width="25%">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
              	<td align="left" class="titulosTabs" width="1px" nowrap>FR</td><td><input name="frSV" type="text" id="frSV" onKeyUp="solo_numeros(this.value, this.name);" maxlength="3" style="text-align:right;" class="required ignore"></td>
                <td align="left" class="titulosTabs" nowrap>x min</td>
              </tr>
            </table>
            </td>
            <td width="25%">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
              	<td align="left"class="titulosTabs"width="1px"nowrap>FC</td><td><input name="fcSV"type="text" id="fcSV" onKeyUp="solo_numeros(this.value, this.name);" maxlength="4" style="text-align:right;" class="required ignore"></td>
                <td align="left" class="titulosTabs" nowrap>x min</td>
              </tr>
            </table>
            </td>
            <td width="25%">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
              	<td align="left"class="titulosTabs"width="1px"nowrap>Temp</td><td><input name="tempSV"type="text"id="tempSV"onKeyUp="numeros_decimales(this.value, this.name);"maxlength="4"style="text-align:right;" class="required ignore"></td>
                <td align="left"class="titulosTabs" nowrap>ºC</td>
              </tr>
            </table>
            </td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td>
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td align="left"class="titulosTabs"width="1px"nowrap valign="top">Notas</td>
            <td>
            <textarea name="notasSV" id="notasSV" cols="1" rows="2" style="resize:none; height:50px;" onKeyUp="conMayusculas(this); solo_letras_numeros(this.value, this.name);"></textarea>
            </td>
          </tr>
        </table>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
  
<div id="tabs-2" style="width:97.5%; height:90%; font-size:0.8em; color:">
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr> <td style="font-size:1.1em; color:black;">
  	CLASIFICACIÓN DEL PACIENTE EN CUANTO A SOBREPESO Y <span class="mouseOver" title="La obesidad es una enfermedad sistemática, crónica, progresiva y multifactorial que se define como una acumulación anormal o excesiva de grasa. En su etiología se involucran alteraciones en el gasto energético, desequilibrio en el balance entre el aporte y utilización de las grasas, causas de caracter neuroendocrino, metabólicas, genéticas, factores del medio ambiente y psicógenas. La obesidad se clasifica fundamentalmente con base en el índice de masa corporal (IMC) o índice de Quetelet, que se define como el peso en kg dividido por la talla expresada en metros y elevada al cuadrado, en el adulto un IMC >= 30 kg/m^2 determina obesidad.">OBESIDAD</span>.
  </td> </tr>
  <tr>
    <td align="justify">De acuerdo a los datos proporcionados en los signos vitales del paciente con un <span class="mouseOver" title="El índice de masa corporal (IMC) es una medida de asociación entre la masa y la talla de un individuo ideada por el estadístico belga Adolphe Quetelet, por lo que también se conoce como índice de Quetelet.
Se calcula según la expresión matemática: IMC = masa/(estatura^2). Donde la masa se expresa en kilogramos y el cuadrado de la estatura en metros cuadrados">IMC</span> de <span id="miIMC" style="text-decoration:underline;"></span> y una medida de circunferencia de cintura de <span id="miMedidaCintura" style="text-decoration:underline;"></span> cms</td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="1" cellspacing="0" cellpadding="2">
      <tr>
      	<td>IMC (kg/m^2)</td>
        <td>CLASIFICACIÓN</td>
      </tr>
      <tr>
      	<td class="normalIMC">18.50 - 24.99</td>
        <td align="left" class="normalIMC">Rango normal</td>
      </tr>
      <tr>
      	<td>>= 25.00</td>
        <td align="left">Sobrepeso</td>
      </tr>
      <tr>
      	<td class="sobrepesoIMC">25.00 - 29.99</td>
        <td class="sobrepesoIMC" align="left">Preobesidad</td>
      </tr>
      <tr>
      	<td>>= 30.00</td>
        <td align="left">Obesidad</td>
      </tr>
      <tr>
      	<td class="obesidad1IMC">30.00 - 34.99</td>
        <td class="obesidad1IMC" align="left">Clase I</td>
      </tr>
      <tr>
      	<td class="obesidad2IMC">35.00 - 39.99</td>
        <td class="obesidad2IMC" align="left">Clase II</td>
      </tr>
      <tr>
      	<td class="obesidad3IMC">>= 40.00</td>
        <td class="obesidad3IMC" align="left">Clase III</td>
      </tr>
      <tr>
        <td colspan="2" align="justify" style="font-size:0.8em; color:black; opacity:0.7;">
        	Fuente: World Health Organization 
        	<span style="cursor:pointer" onClick="window.open('http://www.who.int/bmi/index.jsp?introPage=intro_3.html');">
            	http://www.who.int/bmi/index.jsp?introPage=intro_3.html
            </span>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td align="justify">* Esto indica que el paciente <span id="miRiesgoP" style="text-decoration:underline;"></span> de contraer <span id="defDiabetes" class="mouseOver" title="La diabetes mellitus tipo 2 es un trastorno metabólico que se caracteriza por hiperglucemia (nivel alto de azúcar en la sangre) en el contexto de resistencia a la insulina y falta relativa de insulina; en contraste con la diabetes mellitus tipo 1, en la que hay una falta absoluta de insulina debido a la destrucción de los islotes pancreáticos. Los síntomas clásicos son sed excesiva, micción frecuente y hambre constante. La diabetes tipo 2 representa alrededor del 90 % de los casos de diabetes, con el otro 10 % debido principalmente a la diabetes mellitus tipo 1 y la diabetes gestacional. Se piensa que la obesidad es la causa primaria de la diabetes tipo 2 entre personas con predisposición genética a la enfermedad.">diebetes mellitus tipo 2</span>, <span class="mouseOver" id="defHipertension" title="La hipertensión arterial (HTA) es una enfermedad crónica caracterizada por un incremento continuo de las cifras de la presión sanguínea en las arterias. Aunque no hay un umbral estricto que permita definir el límite entre el riesgo y la seguridad, de acuerdo con consensos internacionales, una presión sistólica sostenida por encima de 139 mmHg o una presión diastólica sostenida mayor de 89 mmHg, están asociadas con un aumento medible del riesgo de aterosclerosis y por lo tanto, se considera como una hipertensión clínicamente significativa.">hipertensión</span> y <span class="mouseOver" id="defEnfermedadC" title="En sentido amplio, el término cardiopatía (del gr. kardí(ā) καρδία 'corazón' y pátheia πάθεια 'enfermedad') puede englobar a cualquier padecimiento del corazón o del resto del sistema cardiovascular. Habitualmente se refiere a la enfermedad cardíaca producida por asma o por colesterol.
Sin embargo, en sentido estricto se suele denominar cardiopatía a las enfermedades propias de las estructuras del corazón.">enfermedad cardiovascular</span></td>
  </tr>
  <tr>
    <td style="font-size:1.1em; color:black;">RIESGO DE ENFERMEDAD PARA EL PACIENTE SEGUN LA MEDIDA DE LA CIRCUNFERENCIA DE SU CINTURA E IMC</td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="1" cellspacing="0" cellpadding="2">
      <tr>
        <td>IMC</td>
        <td colspan="2">
        <table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td>Cintura <strong>hombres</strong> < 90 cms</td>
            <td>Cintura <strong>hombres</strong> > 90 cms</td>
          </tr>
          <tr>
            <td>Cintura <strong>mujeres</strong> < 80 cms</td>
            <td>Cintura <strong>mujeres</strong> > 80 cms</td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td>18.5 - 29.5</td>
        <td class="imc_1_1">Sin riesgo</td>
        <td class="imc_1_2">Riesgo alto</td>
      </tr>
      <tr>
        <td>25.0 - 29.9</td>
        <td class="imc_2_1">Riesgo moderado</td>
        <td class="imc_2_2">Riesgo alto</td>
      </tr>
      <tr>
        <td>30.0 - 39.9</td>
        <td class="imc_3_1">Alto a muy alto riesgo</td>
        <td class="imc_3_2">Muy alto riesgo</td>
      </tr>
      <tr>
        <td> > 40 </td>
        <td class="imc_4_1">Extremadamente alto</td>
        <td class="imc_4_2">Extremadamente alto</td>
      </tr>
      <tr>
        <td colspan="3" align="justify" style="font-size:0.8em; color:white; opacity:0.7;">
        Fuente: 
        <span style="cursor:pointer" onClick="window.open('http://www.cenetec.salud.gob.mx/descargas/gpc/CatalogoMaestro/046_GPC_ObesidadAdulto/IMSS_046_08_GRR.pdf');">
        National Health and Medical Research Council. Clinical Practice Guidelines for the Management of Overweight and Obesity in Adults. Australia 2003.
        </span>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>
</div>
  
<div id="tabs-3" style="width:97.5%; height:90%; font-size:0.8em;">
<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
	<td align="justify">
    De acuerdo con la tabla de IMC para el <span class="mouseOver" title="Los factores de riesgo cardiovascular asociados con la obesidad en la infancia y adolescencia son: hipertensión arterial, dislipidemia, hiperinsulinemia y alteraciones en la masa ventricular cardiaca izquierda.">riesgo de enfermedad</span> en adultos con sobrepeso y obesidad, el paciente se encuantra <span id="miRiesgoE" style="text-decoration:underline"></span>.
    </td>
</tr>
<tr>
	<td align="justify" style="color:white;"> Se recomienda que: </td>
</tr>
<tr id="recomendacionRN">
	<td align="left">
    <li> Se oriente al paciente en una adecuada educación alimentaria.</li>
    <li> Se sugiera un programa de actividad física regular moderada de cuatro veces por semana.</li>
    <li> Recomendar al paciente que evite el alcoholismo y el tabaquismo, que modere la ingesta de café, fomentar la higiene del  sueño y control de estrés.</li>
    <li> Que mantenga vigilado su IMC semestralmente y utilice <span class="mouseOver">medidas de prevención primaria</span>.</li>
    </td>
</tr>
<tr id="recomendacionSP">
	<td align="left">
    <table width="100%" border="1" cellspacing="0" cellpadding="2">
      <tr>
        <td colspan="2" align="center" style="color:white">El paciente cuenta con enfermedades o condiciones asociadas</td>
      </tr>
      <tr align="center">
        <td width="50%">NO</td>
        <td>SI</td>
      </tr>
      <tr align="justify">
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
      <tr>
        <td colspan="2" align="center" style="color:white;">Logro de metas y éxito terapéutico</td>
      </tr>
      <tr align="center">
        <td>SI</td>
        <td>NO</td>
      </tr>
      <tr>
        <td>Vigilar y promover mantenimiento de reducción de peso, seguimiento al IMC y circunferencia abdominal.</td>
        <td>Volver al principio</td>
      </tr>
    </table>
    </td>
</tr>
<tr id="recomendacionOB">
	<td align="left">
    <table width="100%" border="1" cellspacing="0" cellpadding="2">
      <tr>
        <td colspan="2">
        <li> Crear e iniciar inmediatamente un programa individualizado y adecuado de dieta para el paciente.</li>
        <li> Crear e iniciar inmediatamente un <span class="mouseOver">programa individualizado y adecuado de actividad física</span> para el paciente.</li>
        <li> Crear e iniciar inmediatamente un programa individualizado y adecuado de terepia cognitivo-conductual para el paciente.</li>
        <li> Apoyo <span class="mouseOver">psicosocial</span>.</li>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center" style="color:white;">
        Éxito terapéutico con evidencia de apego
        </td>
      </tr>
      <tr align="center">
        <td width="50%">SI</td>
        <td>NO</td>
      </tr>
      <tr align="justify">
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
    </td>
</tr>
</table>
</div>

  <div id="tabs-4" style="width:97.5%; height:90%;"> 
  <input name="id_medicoLab" id="id_medicoLab" type="hidden" value="">
  <input name="id_DepartamentoLab" id="id_DepartamentoLab" type="hidden" value="1">
  <table width="100%" height="100%" border="0" cellpadding="4" cellspacing="0" id="dataTableSV" class="tablilla" bgcolor="#FFFFFF">
    <thead id="cabecera_tBusquedaSV">
      <tr>
        <th style="color:white;" id="clickmeSV" width="1px">#</th>
        <th style="color:white;" width="10px">FECHA</th>
        <th style="color:white;" nowrap>PESO(kg)</th>
     	<th style="color:white;" nowrap>TALLA(mts)</th>
        <th style="color:white;" nowrap>IMC(kg/m^2)</th>
		<th style="color:white;" nowrap>CINTURA(cm)</th>
        <th style="color:white;" nowrap>T/A</th>
		<th style="color:white;" nowrap>FR(xMin)</th>
        <th style="color:white;" nowrap>FC(xMin)</th>
        <th style="color:white;" nowrap>T(ºc)</th>
      </tr>
    </thead>
    <tbody style="color:navy; font-size:0.9em;"> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
  </table>
  </div>
  
<div id="tabs-5" style="width:97.5%; height:90%;"> <input name="id_pMedico" id="id_pMedico" type="hidden" value=""><input name="id_DepartamentoSer" id="id_DepartamentoSer" type="hidden" value="4">
	<table id="grafiasSV" width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#CCC;">
      <tr>
        <td width="50%" height="50%">
        <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
          <tr> <td height="1%" align="center" width="">IMC</td> </tr>
          <tr> <td id="contenedorCH"><canvas class="miCanva" id="myChartIMC" ></canvas></td> </tr>
        </table>
        </td>
        <td>
        <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
          <tr> <td height="1%" align="center">T/A</td> </tr>
          <tr> <td id="contenedorCHta"><canvas class="miCanva" id="myChartTA" ></canvas></td> </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td>
        <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
          <tr> <td height="1%" align="center">FR</td> </tr>
          <tr> <td id="contenedorCHfr"><canvas class="miCanva" id="myChartFR" ></canvas></td> </tr>
        </table>
        </td>
        <td>
        <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
          <tr> <td height="1%" align="center">FC</td> </tr>
          <tr> <td id="contenedorCHfc"><canvas class="miCanva" id="myChartFC" ></canvas></td> </tr>
        </table>
        </td>
      </tr>
    </table>
</div>
  
</form>
</div>

</body>
</html>
