<?php


require_once(_DIRLIB."rtf/Rtf.php"); //Clase RTF creación word
require_once(_DIRLIB."pqr/PqrAnalisis.class.php"); //Clase RTF creación word






class ReporteGerencialWord
{

	var $tipos_solicitudes      = array();
	var $cant_solicitudes     	= 0;
	var $cant_tipos_solicitud 	= 0;
	var $reiteraciones 		  	= 0;
	var $arregloreiteraciones 	= array();
	var $Reporte_padre		  	= null;
	var $tiempo_respuesta     	= true;
	var $indicadorEAC			= 0;

	 function ReporteGerencialWord()
	{
		$this->Reporte_padre = new Reporte();
	}

	  function mesCastellano($mes)
	{
		switch ($mes)
		{
			case 'January' :	$mes='Enero';
								break;

			case 'February' :	$mes='Febrero';
								break;

			case 'March' 	:	$mes='Marzo';
								break;

			case 'April' 	:	$mes='Abril';
								break;

			case 'May' 		:	$mes='Mayo';
								break;

			case 'June' 	:	$mes='Junio';
								break;

			case 'July' 	:	$mes='Julio';
								break;

			case 'August' 	:	$mes='Agosto';
								break;

			case 'September' :	$mes='Septiembre';
								break;

			case 'October' :	$mes='Octubre';
								break;

			case 'November' :	$mes='Noviembre';
								break;

			case 'December' :	$mes='Diciembre';
								break;

			case '01' 		:	$mes='Enero';
								break;

			case '02' 		:	$mes='Febrero';
								break;

			case '03' 		:	$mes='Marzo';
								break;

			case '04' 		:	$mes='Abril';
								break;

			case '05' 		:	$mes='Mayo';
								break;

			case '06' 		:	$mes='Junio';
								break;

			case '07' 		:	$mes='Julio';
								break;

			case '08' 		:	$mes='Agosto';
								break;

			case '09' 		:	$mes='Septiembre';
								break;

			case '10' 		:	$mes='Octubre';
								break;

			case '11' 		:	$mes='Noviembre';
								break;

			case '12' 		:	$mes='Diciembre';
								break;

			default 		:	$mes = $mes;
								break;
		}

		return $mes;

	}// Fin función mesCastellano

 	public static function presentacionReporte($Section, $font, $parRight, $parJustify, $parLeft, $fecha_inicial_texto, $fecha_final_texto, $mes) {

	//$Section->writeText('<br><br>Bogotá, D.C., ' . $mes . ' ' . date('d') . ' de ' . date('Y')."<br/><br/>", $font, $parRight);
	$Section->writeText("<br><br>No.90744/ MDN-CGFM-CE-AYF-OAC-29.27<br/><br/>", $font, $parLeft);
	$Section->writeText(utf8_encode("Señor Coronel<br /><B>" . _PQRDIRECTORGENERAL . "</B><br/>Ayudante General del Ejercito<br/>Bogota D.C.<br/>"), $font, $parLeft);
	
	$Section->writeText(utf8_encode('<br><br><b>INFORME DE GESTIÓN ATENCIÓN AL CIUDADANO DEL '.$fecha_inicial_texto.'</b>'), $font, $parLeft);

	$text = "<br /><br />";
	$text .= "En cumplimiento a lo ordenado en la Directiva Transitoria No. 0172 de 2008 y la ";
	$text .= "Directiva Minesterial No 31800-MDSGAOC-577 del 25 de Julio de 2006, con toda";
	$text .= "atención me permito presentar el nforme de Resultados de Peticiones, Quejas";
	$text .= "Reclamos, Felicitaciones y consltas de la ciudadanía, democratización de la";
	$text .= "gestion pública y lucha contra la corrupción correspondiente al periodo ".$fecha_inicial_texto . "-" . $fecha_final_texto;
	$text .= "Quejas, Reclamos, Sugerencias y Consultas, adelantado por la Coordinación  de Atención y Orientación Ciudadana para el periodo " . $fecha_inicial_texto . "-" . $fecha_final_texto . " así:";
	
	$Section->writeText(utf8_encode($text), $font, $parJustify);


	return $Section;
    	}

	function CrearInformeWord()
	{
		global $db;
		setlocale( LC_ALL, "es_ES.UTF-8" );
		set_time_limit(0);
		//ini_set('display_errors',1);

		$fecha_inicial      = getVariable('fecha_inicial');
		$fecha_final	    = getVariable('fecha_final');

		//$fecha_inicial_ant	= getVariable('fecha_inicial_ant');
		//$fecha_final_ant	= getVariable('fecha_final_ant');

		list($year,$mon,$day) = explode('-',$fecha_inicial);
		$fecha_inicial_texto = $this->mesCastellano($mon)." ".$day." de ".$year;

		list($year,$mon,$day) = explode('-',$fecha_final);
		$fecha_final_texto =  $this->mesCastellano($mon)." ".$day." de ".$year;

		/*le sumo un día a la fecha final, para que me tenga en cuenta todas las de la fecha final indicada, incluso hasta las 24:00*/
		$fecha_final_plus = date('Y-m-d',mktime(0,0,0,$mon,$day,$year));

		/*list($year,$mon,$day) = explode('-',$fecha_final_ant);
		$fecha_final_ant_plus = date('Y-m-d',mktime(0,0,0,$mon,$day+1,$year));
		*/
		$mes = $this->mesCastellano(date('F'));

		/*******************************************************************/
		/** Primero se sacan todas las tablas, luego si se arma el archivo */
		/** Inicialmente se valida que hayan solicitudes en el periodo consultado. Datos para resumen tabla reportes estadísticos */
		$solicitudes_periodo = $this->SolicitudesPeriodo($fecha_inicial, $fecha_final_plus, $fecha_final_plus);

		if($solicitudes_periodo['Recibidas']==0)
		{
			return false;
		}

		

		/*** I. SOLICITUDES DEL CIUDADANO */

		/** 1. SEGUIMIENTO SOLICITUDES PERIODO ANTERIOR */
/*
		$solicitudes_ant  = $this->SolicitudesPeriodo($fecha_inicial_ant, $fecha_final_ant_plus, $fecha_final_ant_plus);
		$solicitudes_temp = $this->SolicitudesPeriodo($fecha_inicial_ant, $fecha_final_ant_plus, $fecha_final_plus);
		$solicitudes_ant['Pendientes_Periodo_Actual'] = isset($solicitudes_temp['Pendientes_Periodo_Anterior']) ? $solicitudes_temp['Pendientes_Periodo_Anterior'] : 0;
		$solicitudes_ant['Avance_Periodo_Actual'] = $solicitudes_temp['Avance_Periodo_Anterior'];
		*/
		/** 2. DATOS ESTADÍSTICOS DE LOS REQUERIMIENTOS RECIBIDOS EN PERIODO ACTUAL */

		/** Obtiene los Tipos de solicitudes existentes en la BD */
		$this->tipos_solicitudes = $this->Reporte_padre->ObtieneTiposSolicitudes();
		$this->cant_tipos_solicitud = count($this->tipos_solicitudes);

		/** Tabla jefatura Tipo */
		$arregloJefaturaTipo = $this->tablaJefaturaTipo($fecha_inicial,$fecha_final_plus);

		/** Tabla medio de recepción */
		$arregloMediosRecepcion = $this->tablaMediosRecepcion($fecha_inicial, $fecha_final_plus);

		/** Tabla Asunto Tipo */
		$arregloAsuntoTipo = $this->tablaAsuntoTipo($fecha_inicial, $fecha_final_plus);

		/** Se calcula las slicitudes No asignadas **/
		$arregloSolicitudesSinDependencias = new PqrAnalisis();	
		$arregloSolicitudesSinDependencias->getAllSolicitudSinDependencia($db,$fecha_inicial, $fecha_final_plus);
		$contSolicitudSinDependencias = count($arregloSolicitudesSinDependencias->getArrSolicitudes());

		/** Se calcula las slicitudes con dependencias eliminadas **/
		$arregloSolicitudesDependenciasEliminadas = new PqrAnalisis();	
		$arregloSolicitudesDependenciasEliminadas->getAllSolicitudesByTransaccionAndDependencia($db, 1, $fecha_inicial, $fecha_final_plus);
		$contSolicitudesDependenciasEliminadas = count($arregloSolicitudesDependenciasEliminadas->getArrSolicitudes());
	
		/** Se calcula la solicitudes vencidas **/
		//ini_set("display_errors",1);
		$arregloSolicitudesVencidas = new PqrAnalisis();
                
		$arregloSolicitudesVencidas->getAllPQRVencidas($db, $fecha_inicial, $fecha_final_plus);
		$arregloSolicitudesVencidas->loadAllDependencias($db);
		$tablasolicitudVencidas = $arregloSolicitudesVencidas->totalizarAlertas();
		
		/** Se calcula la tabla de Respuestas de la Encuesta*/
		//ini_set('display_errors',1);
		$tablaEncuesta = array('Buenas'=>0,'Malas'=>0,'Total'=>0);
                $encuestas = $this->contarEncuestas($fecha_inicial,$fecha_final);
                $tablaEncuesta['Buenas'] = $encuestas['buenas'];
                $tablaEncuesta['Malas']  = $encuestas['malas'];
                $tablaEncuesta['Total']  = $encuestas['buenas'] + $encuestas['malas'];
		//$respuesta = PqrAnalisis::loadTotalRespuestas($db, array('BUENO','SI','CLARA','MUY CLARA','FACIL','MUY FACIL'), _PQRENCUESTAS.","._PQRENCUESTANTERIOR,$fecha_inicial, $fecha_final_plus);
		//$tablaEncuesta['Buenas'] = $respuesta;
		//echo $respuesta;
		//$respuesta = PqrAnalisis::loadTotalRespuestas($db, array('MALO','REGULAR','NO','POCO CLARA','POCO FACIL'), _PQRENCUESTAS.","._PQRENCUESTANTERIOR,$fecha_inicial, $fecha_final_plus);
		//$tablaEncuesta['Malas'] = $respuesta;
		//$tablaEncuesta['Total'] = $tablaEncuesta['Buenas']+$tablaEncuesta['Malas'];
		//echo $respuesta;
		//ini_set("display_errors",1);
		//print_r($arregloSolicitudesVencidas->getPqrAlertas());
		//print_r($arregloSolicitudesDependenciasEliminadas->getArrSolicitudes());
		//die();

		$complementoEliminadoAndsinAsignar = "";
		$conector = false;
		if($contSolicitudesDependenciasEliminadas != 0){
			$complementoEliminadoAndsinAsignar .= $contSolicitudesDependenciasEliminadas. " solicitudes asignadas a dependencias eliminadas durante este periodo";
			$conector = true;	
		}

		if($contSolicitudSinDependencias != 0){
			if($conector){
				$complementoEliminadoAndsinAsignar .= " y ";
			}
			$complementoEliminadoAndsinAsignar .= $contSolicitudSinDependencias." solicitudes sin dependencias asignadas durante este periodo.<br>";
		}
	
		if($complementoEliminadoAndsinAsignar != ""){
			$complementoEliminadoAndsinAsignar = "<b>Nota : ".$complementoEliminadoAndsinAsignar."</b><br>";
		}


		/** 3. SEGUIMIENTO RESPUESTA POR PARTE DE LAS INSTANCIAS COMPETENTES COMPETENTES */
		/** Obtiene las reiteraciones */
		$hay_reiteraciones = $this->obtieneReiteraciones($fecha_inicial,$fecha_final_plus);


		/** 4. INDICADORES */
		/** Obtiene los indicadores */
		$incumplimientos = $this->IncumplimientosPeriodo($fecha_inicial, $fecha_final_plus, $fecha_final_plus);
		$solicitudes_periodo['incumplimientos'] = $incumplimientos;

		$arreglo_efectividad = $this->obtieneEfectividad($fecha_inicial,$fecha_final_plus);

		$indicadorSatisfaccion = $this->obtieneIndicadorSatisfaccion($fecha_inicial, $fecha_final_plus, $fecha_final_plus);

		$indicadorTiempoRta = $this->obtieneIndicadorTiempoRta($fecha_inicial, $fecha_final_plus);

		$indicadorOportunidad = $this->obtieneIndicadorOportunidad($fecha_inicial,$fecha_final_plus);
		

		/*******************************************************************/
		/** Arma el archivo WORD con el reporte gerencial **/
		$rtf        = new Rtf();

		$arial6 	= new Font(6, 'Arial');
		$arial8 	= new Font(8, 'Arial');
		$arial10 	= new Font(10, 'Arial');
		$arial11 	= new Font(11, 'Arial');
		$arial12 	= new Font(12, 'Arial');
		$arial14 	= new Font(14, 'Arial');
		$arialInfo 	= new Font(10, 'Arial', '#FF0000');

		$parCenter 	= new ParFormat('center');
		$parRight 	= new ParFormat('right');
		$parJustify = new ParFormat('justify');
		$parLeft 	= new ParFormat('left');
		$parF 		= new ParFormat();

		$quince 	= 15; //tamañó máximo de la tabla (horizontalmente)
		$doce 		= 12; //tamañó para tablas más pequeñas
		$diez 		= 10; //tamañó para tablas más pequeñas
		$null       = null;

		$sect = &$rtf->addSection();


		//Asi se agrega un encabezado
		$header = &$rtf->addHeader('all');
		//$header->writeText("", $arial10, $parF);

		//Asi se agrega un pie de página
		//$footer = &$rtf->addFooter('all');
		//$footer->writeText("<br><br>", $arial10, $parF);
		//$footer->addImage('_templates/Default/recursos/images/piedepagina.jpg', $parF, 15, 2);


		/*** IMAGEN INTRODUCCIÓN */
		$sect->addImage('_templates/Default2009/recursos/images/encabezadoinforme.jpg', $parCenter, '','');


		$sect = ReporteGerencialWord::presentacionReporte($sect, $arial11, $parRight, $parJustify, $parLeft, $fecha_inicial_texto,$fecha_final_texto, $mes);

		/** Crea un objeto de reporte **/
		$reporte = new ReporteGerencial();
		/* Asigna los atributos */
		$reporte->setDependenciaId('');
		$reporte->setFechaInicial($fecha_inicial);
		$reporte->setFechaFinal($fecha_final);

		/** 1 CLASES DE SOLICITUDES RECIBIDAS EN EL PERIODO  - GRÁFICA POR TIPO DE SOLICITUD - 1  OK (Torta) */

		$reporte->setTipoReporte(1);
		$reporte->setTipoPresentacion(2);
		$respuesta = $reporte->createImage(true);
		

		if($respuesta)
		{
			$sect->writeText(utf8_encode('<br><br><b>1. CANTIDAD DE DERECHOS DE PETICIÓN, PETICIONES, QUEJAS RECLAMOS, CONSULTAS RECEPCION EN EL PERIODO '.$fecha_inicial_texto.'</b>'), $arial12, $parLeft);
			$ruta = _DIRRECURSOS_USER."pqr/reporte/Imagen".$reporte->getTipoReporte().".png";
			$sect->addImage($ruta, $parF);
		}
		$totalPQR = 0;
		$sect->writeText(utf8_encode('<br>En el periodo  '.$fecha_inicial_texto.' se recepcionaron un total de '. $reporte->totalSolicitudes.' solicitudes evidenciandose que el tipo de solicitud más instaurada por la ciudadania son las '.$reporte->tiposolicitumayor ), $arial12, $parJustify);
		


		/*** FIN TABLA SEGUIMIENTO SOLICITUDES PENDIENTES */

		/** 2. DATOS ESTADÍSTICOS DE LOS REQUERIMIENTOS RECIBIDOS EN PERIODO ACTUAL */
		$sect->writeText(utf8_encode('<br><b>2. DATOS ESTADÍSTICOS DE LAS SOLICITUDES RECIBIDAS EN LAS JEFATURAS, DIRECCIONES, UNIDADES OPERATIVAS MAYORES Y MENORES DURANTE EL PERIODO</B>'), $arial12, $parLeft);


		/*** TABLAS SOLICITUDES PERIODO ACTUAL */


		/*** TABLA JEFATURA TIPO */

		$sect->writeText("<br><br>", $arial12, $parCenter);
		$table = &$sect->addTable();

		$filas = sizeof($arregloJefaturaTipo)+ 1;	//Mas una fila de Titulos
		$columnas = $this->cant_tipos_solicitud + 3;	//Más una fila de nombres de dependencias, una de Total y una de Porcentaje
		$tamanio_columna = $quince/$columnas;			//Tamaño de las columnas (se divide 15 que es el tamaño máximo entre el número de columnas)
		$i = 1; 										//Contador de las filas
		$j = 1; 										//Contador de las columnas
		$arreglo_columnas = array();
		$tamaño_fila = 0.5;

		while ($i <= $columnas)
		{
			$arreglo_columnas[] = $tamanio_columna;
			$i++;
		}

		$i = 1;

		$table->addRows($filas, $tamaño_fila);		//A esta función se le envia la cantidad de filas de la tabla

		$table->addColumnsList($arreglo_columnas); 	//A esta función se le envia un arreglo con los tamaños de cada columna,
		//el tamaño del arreglo determina el número de columnas

		$table->setBordersOfCells(new BorderFormat(1), $i, $j, $filas, $columnas); // Establecer el borde de la tabla
		$table->setVerticalAlignmentOfCells('center', $i, $j, $filas, $columnas);


		/*** TITULOS - TABLA JEFATURA TIPO*/

		$table->writeToCell($i,   $j++, "<b>JEFATURA</b>", $arial6, $parCenter);

		foreach($this->tipos_solicitudes as $titulo => $valor)
		{
			$table->writeToCell($i,   $j++, utf8_encode("<b>".$valor."</b>"), $arial6, $parCenter);
		}

		$table->writeToCell($i,   $j++, "<b>TOTAL</b>", $arial6, $parCenter);

		$table->writeToCell($i,   $j++, "<b>%</b>", $arial6, $parCenter);

		/*** DATOS - TABLA JEFATURA TIPO*/
		foreach($arregloJefaturaTipo as $fila)
		{
			$j = 1;
			$i++;

			$table->writeToCell($i,  $j++, utf8_encode($fila['jefatura']), $arial6, $parCenter);

			foreach($this->tipos_solicitudes as $titulo => $valor)
			{
				$table->writeToCell($i,   $j++, (isset($fila[$valor])?utf8_encode($fila[$valor]):0), $arial6, $parCenter);
			}

			$table->writeToCell($i,   $j++, utf8_encode($fila['total']), $arial6, $parCenter);
			
			$table->writeToCell($i,   $j++, round((($fila['total']/$this->cant_solicitudes)*100))."%", $arial6, $parCenter);
		}
		/*** FIN TABLA JEFATURA TIPO */


		/** TEXTO TABLA DE DATOS ESTADÍSTICOS DE LOS REQUERIMIENTOS RECIBIDOS EN PERIODO ACTUAL */
		$texto = $complementoEliminadoAndsinAsignar.
		"Durante el periodo comprendido entre ".$fecha_inicial_texto." al ".$fecha_final_texto.", se recibieron ".$solicitudes_periodo['Recibidas'].
		" solicitudes, de las cuales ".($solicitudes_periodo['Recibidas'] - $solicitudes_periodo['Pendientes_Periodo_Anterior'])." fueron respondidas de " .
		"forma definitiva y ".$solicitudes_periodo['Pendientes_Periodo_Anterior']." se encuentran en trámite.";
		$sect->writeText(utf8_encode($texto), $arial12, $parJustify);

		$sect->writeText(utf8_encode('<br><b>3. MEDIOS DE RECEPCIÓN POR LOS CUALES LA CIUDADANÍA PUEDE INSTAURAR SUS SOLICITUDES.</B>'), $arial12, $parLeft);
	
		/** TABLA MEDIOS DE RECEPCIÓN */
		$sect->writeText("<br><br>", $arial12, $parCenter);
		$table = &$sect->addTable('center');

		$filas = sizeof($arregloMediosRecepcion)+ 1;	//Mas una fila de Titulos
		$columnas = 3;									//Medio, Cantidad, Porcentaje
		$tamanio_columna = $doce/$columnas;				//Tamaño de las columnas (Solo es de 3 columnas, asi que el tamaño total será de 12)
		$i = 1; 										//Contador de las filas
		$j = 1; 										//Contador de las columnas
		$arreglo_columnas = array();
		$tamaño_fila = 1;

		while ($i <= $columnas)
		{
			$arreglo_columnas[] = $tamanio_columna;
			$i++;
		}

		$i = 1;

		$table->addRows($filas, $tamaño_fila);		//A esta función se le envia la cantidad de filas de la tabla

		$table->addColumnsList($arreglo_columnas); 	//A esta función se le envia un arreglo con los tamaños de cada columna,
		//el tamaño del arreglo determina el número de columnas

		$table->setBordersOfCells(new BorderFormat(1),$i, $j, $filas, $columnas); // Establecer el borde de la tabla
		$table->setVerticalAlignmentOfCells('center', $i, $j, $filas, $columnas);

		/*** TITULOS - MEDIOS DE RECEPCIÓN*/

		$table->writeToCell($i,   $j++, utf8_encode("<b>MEDIO DE RECEPCIÓN</b>"), $arial10, $parCenter);
		$table->writeToCell($i,   $j++, utf8_encode("<b>CANTIDAD</b>"), $arial10, $parCenter);
		$table->writeToCell($i,   $j++, utf8_encode("<b>%</b>"), $arial10, $parCenter);

		/*** DATOS  - MEDIOS DE RECEPCIÓN*/
		foreach($arregloMediosRecepcion as $fila)
		{
			$j = 1;
			$i++;

			$table->writeToCell($i,  $j++, utf8_encode($fila['medio_nombre']), $arial10, $parCenter);
			$table->writeToCell($i,   $j++, utf8_encode($fila['cantidad']), $arial10, $parCenter);
			$promedio = str_replace(',','.',$fila['porcentaje']);
			$table->writeToCell($i,   $j++, round($promedio,2), $arial10, $parCenter);
			//$table->writeToCell($i,   $j++, utf8_encode($fila['porcentaje']), $arial10, $parCenter);
		}
		/** FIN TABLA MEDIOS DE RECEPCIÓN */


		/** TEXTO TABLA DE MEDIOS DE RECEPCIÓN */
		$texto =
		"El medio más utilizado durante este periodo fue ".$arregloMediosRecepcion[0]['medio_nombre'].
		" (".$arregloMediosRecepcion[0]['porcentaje']." de las veces).";
		$sect->writeText(utf8_encode($texto), $arial12, $parJustify);

		/** 2 UTILIZACION DE LOS MEDIOS DE CONTACTO EN EL PERIODO - GRÁFICA POR MEDIOS DE CONTACTO - 4 OK (Torta) */


		$reporte->setTipoReporte(4);
		$reporte->setTipoPresentacion(2);
		$respuesta = $reporte->createImage(true);
		if($respuesta)
		{
			$sect->writeText(utf8_encode('<br><br><b>UTILIZACION DE LOS MEDIOS DE CONTACTO EN EL PERIODO<br><br></b>'), $arial12, $parCenter);
			$ruta = _DIRRECURSOS_USER."pqr/reporte/Imagen".$reporte->getTipoReporte().".png";
			$sect->addImage($ruta, $parF);
		}

		/*** TABLA TIPO Y ASUNTO */
		$sect->writeText("<br><br><b>SOLICITUDES POR TIPO Y ASUNTO</b><br><br>", $arial12, $parCenter);
		$table = &$sect->addTable();

		$filas = sizeof($arregloAsuntoTipo)+ 1;			//Mas una fila de Titulos
		$columnas = $this->cant_tipos_solicitud + 3;	//Más una fila de nombres de dependencias, una de Total y una de Porcentaje
		$tamanio_columna = $quince/$columnas;			//Tamaño de las columnas (se divide 15 que es el tamaño máximo entre el número de columnas)
		$i = 1; 										//Contador de las filas
		$j = 1; 										//Contador de las columnas

		$arreglo_columnas = array();
		$tamaño_fila = 0.5;

		while ($i <= $columnas)
		{
			$arreglo_columnas[] = $tamanio_columna;
			$i++;
		}

		$i = 1;

		$table->addRows($filas, $tamaño_fila);		//A esta función se le envia la cantidad de filas de la tabla

		$table->addColumnsList($arreglo_columnas); 	//A esta función se le envia un arreglo con los tamaños de cada columna,
		//el tamaño del arreglo determina el número de columnas

		$table->setBordersOfCells(new BorderFormat(1),$i, $j, $filas, $columnas); // Establecer el borde de la tabla
		$table->setVerticalAlignmentOfCells('center', $i, $j, $filas, $columnas);

		/*** TITULOS -  TABLA TIPO Y ASUNTO*/

		$table->writeToCell($i,   $j++, utf8_encode("<b>ASUNTO / TIPO</b>"), $arial6, $parCenter);

		foreach($this->tipos_solicitudes as $titulo => $valor)
		{
			$table->writeToCell($i,   $j++, utf8_encode("<b>".$valor."</b>"), $arial6, $parCenter);
		}

		$table->writeToCell($i,   $j++, utf8_encode("<b>TOTAL</b>"), $arial6, $parCenter);

		$table->writeToCell($i,   $j++, utf8_encode("<b>%</b>"), $arial6, $parCenter);

		/*** DATOS - TABLA TIPO Y ASUNTO */
		foreach($arregloAsuntoTipo as $fila)
		{
			$j = 1;
			$i++;

			$table->writeToCell($i,  $j++, utf8_encode($fila['Asunto']), $arial6, $parCenter);

			foreach($this->tipos_solicitudes as $titulo => $valor)
			{
				$table->writeToCell($i,   $j++, (isset($fila[$valor])?utf8_encode($fila[$valor]):0), $arial6, $parCenter);
			}

			$table->writeToCell($i,   $j++, utf8_encode($fila['total']), $arial6, $parCenter);
			$table->writeToCell($i,   $j++, round((($fila['total']/$this->cant_solicitudes)*100))."%", $arial6, $parCenter);
		}
		
	
		/*** TABLA TIPO Y ASUNTO */
		$sect->writeText("<br><br><b>SEGUIMIENTO RESPUESTAS POR PARTE DELAS INTANCIAS COMPETENTES</b><br><br>", $arial12, $parCenter);
		$texto ="Hace referencia a la reiteración efectuada por una vez a las instancias competentes de dar respuesta a las solicitudes, con el fin de verificar las respuestas. En incumplimiento de los terminos de Ley.";
		$sect->writeText(utf8_encode($texto), $arial12, $parJustify);

		$table = &$sect->addTable();
		$filas = sizeof($tablasolicitudVencidas)+ 1;			//Mas una fila de Titulos
		$columnas = 3;	//Más una fila de nombres de dependencias, una de Total y una de Porcentaje
		$tamanio_columna = $quince/$columnas;			//Tamaño de las columnas (se divide 15 que es el tamaño máximo entre el número de columnas)
		$i = 1; 										//Contador de las filas
		$j = 1; 										//Contador de las columnas
		$arreglo_columnas = array();
		$tamaño_fila = 0.5;

		while ($i <= $columnas)
		{
			$arreglo_columnas[] = $tamanio_columna;
			$i++;
		}

		$i = 1;

		$table->addRows($filas, $tamaño_fila);		//A esta función se le envia la cantidad de filas de la tabla

		$table->addColumnsList($arreglo_columnas); 	//A esta función se le envia un arreglo con los tamaños de cada columna,
		//el tamaño del arreglo determina el número de columnas

		$table->setBordersOfCells(new BorderFormat(1),$i, $j, $filas, $columnas); // Establecer el borde de la tabla
		$table->setVerticalAlignmentOfCells('center', $i, $j, $filas, $columnas);

		//$table->writeToCell($i,   $j++, utf8_encode("<b>JEFATURA / DIVISIONES</b>"), $arial10, $parCenter);
		$table->writeToCell($i,   $j++, utf8_encode("<b>DIVISIONES</b>"), $arial10, $parCenter);
		$table->writeToCell($i,   $j++, utf8_encode("<b>CANTIDAD VENCIDAS</b>"), $arial10, $parCenter);
		$table->writeToCell($i,   $j++, utf8_encode("<b>PROMEDIO DIAS VENCIDAS</b>"), $arial10, $parCenter);

		
		foreach($tablasolicitudVencidas as $fila)
		{
			$j = 1;
			$i++;

			//$table->writeToCell($i,  $j++, utf8_encode($fila['jefatura']), $arial6, $parCenter);
			$table->writeToCell($i,  $j++, utf8_encode($fila['Nombre']), $arial6, $parCenter);
			$table->writeToCell($i,  $j++, utf8_encode($fila['cantidad']), $arial6, $parCenter);
			$promedio = str_replace(',','.',$fila['promedio']);
			$table->writeToCell($i,  $j++, round($promedio,0), $arial6, $parCenter);
		}
		
		/*** TABLA RESPUESTAS ENCUESTAS ***/
		$sect->writeText("<br><br><b>IMPACTO DEL SERVICIO EN LOS CIUDADANOS</b><br><br>", $arial12, $parCenter);
		$texto ="Está relacionado con la medición de los factores genrados de satisfacción e insatisfacción y de las necesidades y espectativas de la ciudadanía en genral.<br><br>ESTAMEDICION SE REALIZA DE ACUERDO A LAS ENCUESTAS REALIZADAS A LA CIUDADANIA";
		$sect->writeText(utf8_encode($texto), $arial12, $parJustify);
		
		$table = &$sect->addTable();
		$filas = sizeof($tablaEncuesta)+ 1;			//Mas una fila de Titulos
		$columnas = 2;	//Más una fila de nombres de dependencias, una de Total y una de Porcentaje
		$tamanio_columna = $quince/$columnas;			//Tamaño de las columnas (se divide 15 que es el tamaño máximo entre el número de columnas)
		$i = 1; 										//Contador de las filas
		$j = 1; 										//Contador de las columnas
		$arreglo_columnas = array();
		$tamaño_fila = 0.5;

		while ($i <= $columnas)
		{
			$arreglo_columnas[] = $tamanio_columna;
			$i++;
		}

		$i = 1;

		$table->addRows($filas, $tamaño_fila);		//A esta función se le envia la cantidad de filas de la tabla

		$table->addColumnsList($arreglo_columnas); 	//A esta función se le envia un arreglo con los tamaños de cada columna,
		//el tamaño del arreglo determina el número de columnas

		$table->setBordersOfCells(new BorderFormat(1),$i, $j, $filas, $columnas); // Establecer el borde de la tabla
		$table->setVerticalAlignmentOfCells('center', $i, $j, $filas, $columnas);
		
		//print_r($tablaEncuesta);
		//die();
		$j = 1;	
		$table->writeToCell($i,   $j++, utf8_encode("<b></b>"), $arial10, $parCenter);
		$table->writeToCell($i,   $j++, utf8_encode("<b>No. ENCUESTAS</b>"), $arial10, $parCenter);
		$i++;
		$j = 1;
		$table->writeToCell($i,  $j++, utf8_encode("<b>PRONUNCIAMIENTOS<br>FAVORABLES (BUENAS)</b>"), $arial10, $parCenter);
		$table->writeToCell($i,  $j++, utf8_encode($tablaEncuesta['Buenas']), $arial10, $parCenter);
		$i++;
		$j = 1;
		$table->writeToCell($i,  $j++, utf8_encode("<b>PRONUNCIAMIENTOS<br>DESFAVORABLES<br>(REGULARES+MALAS)</b>"), $arial10, $parCenter);
		$table->writeToCell($i,  $j++, utf8_encode($tablaEncuesta['Malas']), $arial10, $parCenter);
		$i++;
		$j = 1;
		$table->writeToCell($i,  $j++, utf8_encode("<b>TOTAL</b>"), $arial10, $parCenter);
		$table->writeToCell($i,  $j++, utf8_encode($tablaEncuesta['Total']), $arial10, $parCenter);
				
		$sect->writeText(utf8_encode('<br><b>ACTIVIDADES RELEVANTES EN EL PERIODO '.$fecha_inicial_texto.' AL '.$fecha_final_texto.'</b>'), $arial12, $parCenter);
	
		$parrafo = "<b>1.</b> Se realiza el traslado de la oficina a las nuevas instalaciones ubicadas Barrio la esmeralda en la carrera 58 No. 44B -12  se realizaron coordinaciones con la empresa de E.T.B para el traslado de las líneas telefónicas como también con la dirección de telemática  para la instalación de los computadores  asignados a esta oficina.<br><br>";
		$sect->writeText(utf8_encode($parrafo), $arial12, $parJustify);

		$parrafo = "<b>2.</b> Se realiza una reunión con los gestores de las diferentes jefaturas, direcciones de Comando Ejécito donde se establecen  criterios de trabajo  y propuestas  de mejora en las respuestas que se brindan a las peticiones suscritas por la ciudadanía que hace uso de este medio.<br><br>";
		$sect->writeText(utf8_encode($parrafo), $arial12, $parJustify);

		$parrafo = "<b>3.</b> Asiste a reunión la señora  AA06. Kelly Y. Ramírez Camacho con Ministerio de Defensa , Armada Nacional ,Fuerza Aérea y Policía Nacional , donde dan a conocer el nuevo aplicativo de P.Q.R. que se va a implementar a nivel Ministerial.<br><br>";
		$sect->writeText(utf8_encode($parrafo), $arial12, $parJustify);

		$parrafo = "<b>4.</b> Recibe la señora AA05.Yeraldine Mesa  Romero el Diploma otorgado por la Escuela Superior de Administración Publica por aprobar satisfactoriamente el Diplomado en Servicio Ciudadano que realizo en los meses de Octubre y Noviembre  del año 2011.<br><br>";
		$sect->writeText(utf8_encode($parrafo), $arial12, $parJustify);

		$sect->writeText(utf8_encode('<br><b>CONCLUSIONES</b><br><br>'), $arial12, $parCenter);
		$parrafo = "El nivel de recepción de los PQR en la oficina de Atención al Ciudadano a diario incrementa, donde se evidencia que el medio mas frecuentado por la ciudadanía es Link Atención al Ciudadano; esta debido al buen manejo publicitario por parte del personal de gestores de las oficinas a nivel nacional.";
		$sect->writeText(utf8_encode($parrafo), $arial12, $parJustify);

		$sect->writeText(utf8_encode('<br><b>RECOMENDACIONES</b><br><br>'), $arial12, $parCenter);
		$parrafo = "Se recomienda muy respetuosamente al Señor Coronel Ayudante General de Comando Ejercito el apoyo en la publicidad para la Oficina dando a conocer la nueva ubicación de la misma y números telefónicos esto con el fin de brindar un mejor servicio a la ciudadanía.";
		$sect->writeText(utf8_encode($parrafo), $arial12, $parJustify);

		/** ANEXO A */
		$sect->writeText(utf8_encode('<br><br><b>ANEXO A</b>'), $arial12, $parCenter);

		/** INFORMACIÓN GRÁFICA – SOLICITUDES DEL CIUDADANO */
		$sect->writeText(utf8_encode('<br><b>INFORMACIÓN GRÁFICA - SOLICITUDES DEL CIUDADANO </b>'), $arial12, $parCenter);
		$sect->writeText("<br><br>", $arial12, $parCenter);


		/** 3 SOLICITUDES POR TIPO Y ASUNTO EN EL PERIODO - GRÁFICA POR TIPO DE SOLICITUD Y ASUNTO - 7 (Barras)*/

		$reporte->setTipoReporte(7);
		$reporte->setTipoPresentacion(1);
		$respuesta = $reporte->createImage(true);

		if($respuesta)
		{
			$sect->writeText(utf8_encode('<br><br><b>SOLICITUDES POR TIPO Y ASUNTO EN EL PERIODO<br><br></b>'), $arial12, $parCenter);

			foreach($reporte->resultado as $key => $individual)
			{
				$ruta = _DIRRECURSOS_USER."pqr/reporte/Imagen".$reporte->getTipoReporte().$key.".png";
				$sect->addImage($ruta, $parF);
				$sect->writeText("<br>", $arial12, $parCenter);
			}
		}
	

		/** 5 TIEMPO MEDIO DE RESPUESTA A LAS SOLICITUDES EN DIAS EN EL PERIODO - 11 - (Barras)*/
		if($this->tiempo_respuesta)
		{
			$reporte->setTipoReporte(11);
			$reporte->setTipoPresentacion(2);
			$respuesta = $reporte->createImage(true);
			if($respuesta)
			{
				$sect->writeText(utf8_encode('<br><br><b>TIEMPO MEDIO DE RESPUESTA A LAS SOLICITUDES EN DIAS EN EL PERIODO<br><br></b>'), $arial12, $parCenter);
				$ruta = _DIRRECURSOS_USER."pqr/reporte/Imagen".$reporte->getTipoReporte().".png";
				$sect->addImage($ruta, $parF);
			}
		}


		/** FIN CREACIÓN DE REPORTE EN WORD **/
		$nombre = 'Reporte'.date('Y-m-d-His');
		$rtf->sendRtf($nombre);

	}// Fin función CrearInformeWord()



	function SolicitudesPeriodo($fecha_inicial,$fecha_final, $fecha_final_transaccion, $dependencia = "")
	{
		/*
		 * Las primeras dos fechas indican el periodo, la tercera fecha indica la comparación de en qué estado estaba la solicitud en cierta fecha
		 */
        set_time_limit(0);  

	    global $db;
		$porcentaje_cien = 100;

		$solicitudes['Recibidas'] = 0;

		
		
		$solicitudes['Pendientes_Periodo_Anterior'] = 0;
		$solicitudes['Pendientes_Periodo_Actual'] = 0;
		$solicitudes['Avance_Periodo_Anterior'] = 0;
		
		$dep_cond = "";
		if($dependencia != "")//Aquí tiene en cuenta las dependencias que trae como parámetro
		{
			$dep_cond = sprintf("AND t.dependencia_id IN (%s)",$dependencia);
		}
		
		
		$sql_anteriores = sprintf("SELECT COUNT(t.solicitud_id) AS cantidad, e.estado_id, e.tipo, LEFT(e.estado_nombre,35) AS estado_nombre
			FROM %s s 


			INNER JOIN %s t ON s.estado_actual = t.transaccion_id 
			INNER JOIN pqr_tipo p ON t.tipo_id = p.tipo_id 
			INNER JOIN %s e ON t.estado_id = e.estado_id
			WHERE (s.creacion BETWEEN '%s 00:00:00' AND '%s 23:59:59') %s AND p.eliminado = 0
			GROUP BY e.estado_id ORDER BY cantidad DESC"
			, _TBL_PQR_SOLICITUD, _TBL_PQR_TRANSACCION, _TBL_PQR_ESTADO, $fecha_inicial, $fecha_final, $dep_cond);

		$resultado_solicitudes_estado_anterior =$db->GetAll($sql_anteriores); //or errorQuery(__LINE__, __FILE__);

		$solicitudes['Recibidas'] = 0;

		foreach($resultado_solicitudes_estado_anterior as $res)
		{
			$cantidad      = $res['cantidad'];
			$estado_id     = $res['estado_id'];
			$estado_nombre = $res['estado_nombre'];

			$solicitudes['Recibidas'] = $solicitudes['Recibidas'] + $cantidad;

			if ($res['tipo'] == 'A')
			{
				if(isset($solicitudes['Pendientes_Periodo_Anterior']))
				{
					$solicitudes['Pendientes_Periodo_Anterior'] = $solicitudes['Pendientes_Periodo_Anterior'] + $cantidad;
				}
				else
				{
					$solicitudes['Pendientes_Periodo_Anterior'] = $cantidad;
				}
			}
			else
			{
				if(isset($solicitudes[$estado_nombre]))
				{
					$solicitudes[$estado_nombre] = $solicitudes[$estado_nombre] + $cantidad;
				}
				else
				{
					$solicitudes[$estado_nombre] = $cantidad;
				}
			}
		}

		$solicitudes['Pendientes_Periodo_Actual'] = 0;

		$recibidas = isset($solicitudes['Recibidas'])? $solicitudes['Recibidas'] : 0;
		$solicitudes['Recibidas'] = $recibidas;
		$pendientes = isset($solicitudes['Pendientes_Periodo_Anterior'])? $solicitudes['Pendientes_Periodo_Anterior'] : 0;
		$solicitudes['Pendientes_Periodo_Anterior'] = $pendientes;

		if($recibidas > 0)
		{
			$solicitudes['Avance_Periodo_Anterior'] = round(((($recibidas - $pendientes) / $recibidas) * $porcentaje_cien),2)."%";
		}

		return $solicitudes;
	}




	function tablaJefaturaTipo($fecha_inicial,$fecha_final_plus)
	{

	    global $db;
		 set_time_limit(0); 

		/** Declaración de variables */

		$arregloJefaturaTipo	  =	array();	//Arreglo final
	
	
	$query1 = sprintf("SELECT COUNT(s.solicitud_id) AS cantidad, p.tipo_nombre, d.dependencia_id, d.dependencia_nombre 
		FROM pqr_solicitud s 
		INNER JOIN pqr_transaccion t ON s.estado_actual = t.transaccion_id 
		INNER JOIN pqr_tipo p ON t.tipo_id = p.tipo_id 
		INNER JOIN pqr_dependencia d ON t.dependencia_id = d.dependencia_id 
		WHERE (d.dependencia_id_padre  IN (SELECT dependencia_id FROM pqr_dependencia WHERE es_jefatura = 1 AND eliminado=0) OR d.es_jefatura = 1 AND d.eliminado=0) 
		AND s.creacion BETWEEN '%s 00:00:00' AND '%s 23:59:59' AND p.eliminado = 0 AND d.eliminado=0
		GROUP BY d.dependencia_nombre , p.tipo_nombre 
		ORDER BY d.dependencia_nombre ASC, p.tipo_nombre ASC"
		, $fecha_inicial, $fecha_final_plus);
	//echo $query1;
	
	$arrjefaturas = $db->GetAll($query1);
	
	$prearregloJefaturaTipo = array();
	$pretotal = array('jefatura' => 'TOTAL', 'total' => 0);
	$voidlist = array();
	
	foreach($arrjefaturas as $arr)
	{
		if(isset($prearregloJefaturaTipo[$arr['dependencia_id']]))
		{
			$prearregloJefaturaTipo[$arr['dependencia_id']][$arr['tipo_nombre']] = $arr['cantidad'];
			$prearregloJefaturaTipo[$arr['dependencia_id']]['total'] = $prearregloJefaturaTipo[$arr['dependencia_id']]['total'] + $arr['cantidad'];
		}
		else
		{
			$prearregloJefaturaTipo[$arr['dependencia_id']] = array(
				'jefatura' => $arr['dependencia_nombre'], 
				$arr['tipo_nombre'] => $arr['cantidad'],
				'total' => $arr['cantidad']);
		}
		
		if(isset($pretotal[$arr['tipo_nombre']]))
		{
			$pretotal[$arr['tipo_nombre']] = $pretotal[$arr['tipo_nombre']] + $arr['cantidad'];
			$pretotal['total'] += $arr['cantidad'];
		}
		else
		{
			$pretotal[$arr['tipo_nombre']] = $arr['cantidad'];
			$pretotal['total'] += $arr['cantidad'];
		}
		
		array_push($voidlist, $arr['dependencia_id']);
	}
	
 	
	
	$query2 = sprintf("SELECT COUNT(s.solicitud_id) AS cantidad, p.tipo_nombre, d.dependencia_id, d.dependencia_nombre 
		FROM pqr_solicitud s 
		INNER JOIN pqr_transaccion t ON s.estado_actual = t.transaccion_id 
		INNER JOIN pqr_tipo p ON t.tipo_id = p.tipo_id 
		INNER JOIN pqr_dependencia d ON t.dependencia_id = d.dependencia_id 
		WHERE (d.dependencia_id NOT IN (%s)) AND d.eliminado=0
		AND s.creacion BETWEEN '%s 00:00:00' AND '%s 23:59:59' AND p.eliminado = 0
		GROUP BY d.dependencia_nombre , p.tipo_nombre 
		ORDER BY d.dependencia_nombre ASC, p.tipo_nombre ASC"
		, implode(",", $voidlist), $fecha_inicial, $fecha_final_plus);
	//echo "<br>".$query2;
	//die();
	$arrotras = $db->GetAll($query2);
	
	foreach($arrotras as $arr)
	{
		if(isset($prearregloJefaturaTipo[$arr['dependencia_id']]))
		{
			$prearregloJefaturaTipo[$arr['dependencia_id']][$arr['tipo_nombre']] = $arr['cantidad'];
			$prearregloJefaturaTipo[$arr['dependencia_id']]['total'] = $prearregloJefaturaTipo[$arr['dependencia_id']]['total'] + $arr['cantidad'];
		}
		else
		{
			$prearregloJefaturaTipo[$arr['dependencia_id']] = array(
				'jefatura' => $arr['dependencia_nombre'], 
				$arr['tipo_nombre'] => $arr['cantidad'],
				'total' => $arr['cantidad']);
		}
		
		if(isset($pretotal[$arr['tipo_nombre']]))
		{
			$pretotal[$arr['tipo_nombre']] = $pretotal[$arr['tipo_nombre']] + $arr['cantidad'];
			$pretotal['total'] += $arr['cantidad'];
		}
		else
		{
			$pretotal[$arr['tipo_nombre']] = $arr['cantidad'];
			$pretotal['total'] += $arr['cantidad'];
		}
		
		array_push($voidlist, $arr['dependencia_id']);
	}
	
	array_push($prearregloJefaturaTipo, $pretotal);
	

//	$arregloTotalesTipo["total"] = $contador;
//	array_push($arregloJefaturaTipo,$arregloTotalesTipo);

//	$this->cant_solicitudes  = $contador;
	$this->cant_solicitudes  = $pretotal['total'];

	$arregloJefaturaTipo = $prearregloJefaturaTipo;
 
	return $arregloJefaturaTipo;

	}// Fin función tablaJefaturaTipo()




	function obtieneReiteraciones($fecha_inicial,$fecha_final_plus)
	{
		global $db;
		
		 set_time_limit(0); 

		/** Declaración de variables */
		$contador_reiteraciones           = 0; 			//Hace el conteo del total de las reiteraciones del periodo
		$contador_rta_reiteraciones       = 0; 		    //Hace el conteo del total de las respuestas a las reiteraciones del periodo
		$lista_plus               		= "";			//Irá almacenando las dependencias que son jefatura o son hijas de jefatura,
		//para después hallar las que no lo son y también tenerlas en cuenta
		$arregloTotalesTipo		  = array("jefatura"=>"TOTAL");	//Se usa para hacer la sumatoria vertical de las solicitudes por tipo
		//Se inicializa de esta manera para conservar el formato de todas las filas del arreglo

		
		//primero se consultan las solicitudes reiteradas del periodo
		$query = sprintf("SELECT solicitud_id FROM %s WHERE reiterado = 1 and creacion between '%s' and '%s'", _TBL_PQR_SOLICITUD, $fecha_inicial, $fecha_final_plus);
		$result = $db->Execute($query);

		if($result->NumRows() > 0)
		{
			while(!$result->EOF)
			{
				$reiteradas[] = $result->fields('solicitud_id');
				$result->MoveNext();
			}

			//aqui se consultan los estados de tipo B que existen, los estados tipo B son los que ya no cuentan tiempo, como (cerrado, desistimiento, etc)
			$query = sprintf("select estado_id from %s where tipo = 'B'", _TBL_PQR_ESTADO);
			$result = $db->Execute($query);

			while(!$result->EOF)
			{
				$estados_cerrados[] = $result->fields('estado_id');
				$result->MoveNext();
			}

			/** JEFATURAS*/
			/** Se consultan todas las dependencias que son jefatura */
			$padres = sprintf("select * from %s where es_jefatura = 1", _TBL_PQR_DEPENDENCIA);
			$resultado_padres = $db->Execute($padres) or errorQuery(__LINE__, __FILE__);

			while(!$resultado_padres->EOF)

			{
				$temp_reiteraciones = 0;
				$temp_rta_reiteraciones = 0;

				/** Con esto trae todos los hijos de una jefatura dada*/
				$hijos_dependencia = array();
				array_push ($hijos_dependencia, $resultado_padres->fields['dependencia_id']);
				$hijos_dependencia = $this->Reporte_padre->traerHijosDependencias($resultado_padres->fields['dependencia_id'], $hijos_dependencia);
				$lista = implode(", ", $hijos_dependencia);
				$lista_plus .= $lista.", ";

				/** Va armando el arreglo definitivo */
				$datos_tmp	=	array("jefatura"=>$resultado_padres->fields['dependencia_nombre']);

				foreach($reiteradas as $solicitud_reiterada)
				{
				
					/*consulta reiteraciones del periodo*/
					$query_reiteraciones	=	sprintf("SELECT transaccion_id, estado_id, dependencia_id  FROM %s t " .
					"WHERE solicitud_id = %s ORDER BY transaccion_id DESC LIMIT 1",
					_TBL_PQR_TRANSACCION, $solicitud_reiterada);

					$resultado_reiteraciones	=	$db->Execute($query_reiteraciones) or errorQuery(__LINE__, __FILE__);

					if($resultado_reiteraciones->NumRows()> 0)
					{
						if(in_array($resultado_reiteraciones->fields('dependencia_id'), $hijos_dependencia))
						{
							$temp_reiteraciones ++;
							$contador_reiteraciones  ++;

							if(in_array($resultado_reiteraciones->fields('estado_id'), $estados_cerrados))
							{
								$temp_rta_reiteraciones ++;
								$contador_rta_reiteraciones  ++;
							}
						}
					}
				}

				$datos_tmp['reiteraciones'] = $temp_reiteraciones;
				$datos_tmp['rta_reiteraciones'] = $temp_rta_reiteraciones;

				//Si hubo reiteraciones, agrega la dependencia a la tabla que se va a mostrar
				if($temp_reiteraciones > 0)
				array_push($this->arregloreiteraciones,$datos_tmp);

				$resultado_padres->MoveNext();
			}


			/** OTRAS DEPENDENCIAS*/
			/** Aqui valida las dependencias que no hicieron parte de la anterior validación por no ser jefetauras ni dependencias hijas de jefaturas */
			//$lista_plus contiene todas las dependencias que fueron tenidas en cuenta en el punto anterior, ahora se consultarán las que no están en la lista
			$lista_plus	= substr($lista_plus,0,strlen($lista_plus)-2);

			if($lista_plus != "")
			{
		
				$otras_dependencias = sprintf("select dependencia_id, dependencia_nombre from %s where dependencia_id NOT in (%s)", _TBL_PQR_DEPENDENCIA, $lista_plus);
			}
			else
			{
			   
				$otras_dependencias = sprintf("select dependencia_id, dependencia_nombre from %s", _TBL_PQR_DEPENDENCIA, $lista_plus);
			}

			$resultado_otras_dependencias = $db->Execute($otras_dependencias) or errorQuery(__LINE__, __FILE__);


			while(!$resultado_otras_dependencias->EOF)
			{
				$arreglo_otras_dep[] = $resultado_otras_dependencias->fields['dependencia_id'];
				$resultado_otras_dependencias->MoveNext();
			}
			$lista = implode(", ", $arreglo_otras_dep);

			$temp_reiteraciones = 0;
			$temp_rta_reiteraciones = 0;

			/** Va armando el arreglo definitivo */
			$datos_tmp	=	array("jefatura"=>"OTRAS DEPENDENCIAS");

			foreach($reiteradas as $solicitud_reiterada)
			{
			
			   
				/*consulta reiteraciones del periodo*/
				$query_reiteraciones	=	sprintf("SELECT transaccion_id, estado_id, dependencia_id  FROM %s t " .
				"WHERE solicitud_id = %s ORDER BY transaccion_id DESC LIMIT 1",
				_TBL_PQR_TRANSACCION, $solicitud_reiterada);

				$resultado_reiteraciones	=	$db->Execute($query_reiteraciones) or errorQuery(__LINE__, __FILE__);

				if($resultado_reiteraciones->NumRows()> 0)
				{
					if(in_array($resultado_reiteraciones->fields('dependencia_id'), $hijos_dependencia))
					{
						$temp_reiteraciones ++;
						$contador_reiteraciones  ++;

						if(in_array($resultado_reiteraciones->fields('estado_id'), $estados_cerrados))
						{
							$temp_rta_reiteraciones ++;
							$contador_rta_reiteraciones  ++;
						}
					}
				}
			}

			$datos_tmp['reiteraciones'] = $temp_reiteraciones;
			$datos_tmp['rta_reiteraciones'] = $temp_rta_reiteraciones;

			//Si hubo reiteraciones, agrega la dependencia a la tabla que se va a mostrar
			if($temp_reiteraciones > 0)
			{
				array_push($this->arregloreiteraciones,$datos_tmp);
			}


			$arregloTotalesTipo["reiteraciones"] = $contador_reiteraciones  ;
			$arregloTotalesTipo["rta_reiteraciones"] = $contador_rta_reiteraciones;
			array_push($this->arregloreiteraciones,$arregloTotalesTipo);

			$this->reiteraciones = $contador_reiteraciones;

			return true;
		}
		else
		{
			return false;
		}
	}// Fin función obtieneReiteraciones()


	function tablaMediosRecepcion($fecha_inicial, $fecha_final_plus)
	{

		
		global $db;
		$contador = 0;
		set_time_limit(0); 

		// $arregloMediosRecepcion = array();
		// $sql_solicitudes_medio =sprintf('
							// SELECT count(s.medio_id) as cantidad, m.medio_id, medio_nombre
							// FROM %s s, %s m
							// WHERE 	s.medio_id = m.medio_id
									// and s.creacion between "%s" and "%s"
							// GROUP BY m.medio_id
							// ORDER BY cantidad desc',

		// _TBL_PQR_SOLICITUD,
		// _TBL_PQR_MEDIO,
		// $fecha_inicial,
		// $fecha_final_plus);
		
		// $resultado_solicitudes_medio = $db->Execute($sql_solicitudes_medio) or errorQuery(__LINE__, __FILE__);
		
	
		
		$query1 = sprintf("SELECT COUNT(s.medio_id) AS cantidad, m.medio_id, medio_nombre
			FROM pqr_solicitud s INNER JOIN pqr_medio m ON s.medio_id = m.medio_id 
			WHERE s.estado_actual AND s.creacion BETWEEN '%s 00:00:00' AND '%s 23:59:59'
			GROUP BY m.medio_id
			ORDER BY cantidad DESC"
			, $fecha_inicial, $fecha_final_plus);

		$arregloMediosRecepcion = $db->GetAll($query1);
		$amr = count($arregloMediosRecepcion);
		
		for($i = 0; $i < $amr; $i++)
		{
			$contador = $contador + $arregloMediosRecepcion[$i]['cantidad'];
		}
		
		if($contador < $this->cant_solicitudes)
		{
			$diferencia = ($this->cant_solicitudes - $contador);
			array_push($arregloMediosRecepcion, array('medio_nombre' => 'Sin Definir', 'cantidad' => $diferencia));
			$contador = $contador + $diferencia;
		}
		
		$amr = count($arregloMediosRecepcion);
		for($i = 0; $i < $amr; $i++)
		{
			$arregloMediosRecepcion[$i]['porcentaje'] = round((($arregloMediosRecepcion[$i]['cantidad'] * 100) / $contador), 3)."%";
		}
		
		array_push ($arregloMediosRecepcion, array('medio_nombre' => 'Total','cantidad' => $contador, 'porcentaje' => '100%'));

		// while(!$resultado_solicitudes_medio->EOF)
		// {
			// $array_medios['medio_nombre']	  = $resultado_solicitudes_medio->fields['medio_nombre'];
			// $array_medios['cantidad']         = $resultado_solicitudes_medio->fields['cantidad'];
			// $array_medios['porcentaje']    	  = round((($resultado_solicitudes_medio->fields['cantidad'] / $this->cant_solicitudes)* 100), 2)."%";

			// $contador = $contador + $array_medios['cantidad'];
			// array_push ($arregloMediosRecepcion, $array_medios);

			// $resultado_solicitudes_medio->MoveNext();
		// }

		// if($contador < $this->cant_solicitudes)
		// {
			// $diferencia = ($this->cant_solicitudes - $contador);
			// $array_medios['medio_nombre']	  = "Sin Definir";
			// $array_medios['cantidad']         = $diferencia;
			// $array_medios['porcentaje']    	  = round((($diferencia / $this->cant_solicitudes)* 100), 2)."%";
		// }

		// $array_medios['medio_nombre']	  = "Total";
		// $array_medios['cantidad']         = $this->cant_solicitudes;
		// $array_medios['porcentaje']    	  = "100%";

		// array_push ($arregloMediosRecepcion, $array_medios);

		return $arregloMediosRecepcion;

	} // Fin función tablaMediosRecepcion()



	function tablaAsuntoTipo($fecha_inicial, $fecha_final_plus)
	{
	
		global $db;
		set_time_limit(0); 

		/** Declaración de variables */
		$arregloAsuntoTipo	  =	array();					//Almacena todos los datos de la tabla de solicitudes recibidas

		// $contador             = 0; 							//Hace el conteo del total de las solicitudes recibidas en el periodo

		// $arregloTotalesTipo	  =	array("Asunto"=>"TOTAL"); /*Almacena los totales de manera vertical*/
															/*Se inicializa de esa forma para que conserve el formato de todas las filas*/


		// /** Se consultan los Asuntos */
		// $asuntos = sprintf("select * from %s", _TBL_PQR_ASUNTO);
		// $resultado_asuntos = $db->Execute($asuntos) or errorQuery(__LINE__, __FILE__);

		// while(!$resultado_asuntos->EOF)
		// {
			// /** Esto va almacenando el total de solicitudes recibida por asunto (incluyendo todos los tipos) */
			// $total_asuntos_tipo	= 0;				//Almacena los totales de manera horizontal

			// /** Primer paso para armar la fila: Nombre del Asunto */
			// $datos_tmp	=	array("Asunto"=>$resultado_asuntos->fields['asunto_nombre']);

			// /** Se consultan la cantidad de solicitudes por cada asunto, agrupandolas por tipo de solicitud */
			// $tipos_asunto	=	sprintf("SELECT count(t.asunto_id) as cantidad, t.tipo_id FROM %s t, %s s WHERE t.asunto_id = (%s) ".
					// "and t.transaccion_id = s.estado_actual and s.creacion between '%s' and '%s' group by t.tipo_id ",
					// _TBL_PQR_TRANSACCION, _TBL_PQR_SOLICITUD, $resultado_asuntos->fields['asunto_id'], $fecha_inicial, $fecha_final_plus);

			// $resultado_tipos_asunto	=	$db->Execute($tipos_asunto) or errorQuery(__LINE__, __FILE__);

			// while(!$resultado_tipos_asunto->EOF)
			// {
				// $nombre_tipo = $this->tipos_solicitudes[$resultado_tipos_asunto->fields['tipo_id']];

				// /** Segundo paso para armar la fila: cantidad por cada tipo de solicitud */
				// $datos_tmp[$nombre_tipo] = $resultado_tipos_asunto->fields['cantidad'];

				// /*Esta parte es para la suma horizontal*/
				// $total_asuntos_tipo = $total_asuntos_tipo + $resultado_tipos_asunto->fields['cantidad'];

				// /*Esta parte es para la suma vertical*/
				// if (isset($arregloTotalesTipo[$nombre_tipo]))
				// {
					// $arregloTotalesTipo[$nombre_tipo] = $arregloTotalesTipo[$nombre_tipo] + $resultado_tipos_asunto->fields['cantidad'];
				// }
				// else
				// {
					// $arregloTotalesTipo[$nombre_tipo] = $resultado_tipos_asunto->fields['cantidad'];
				// }

				// $resultado_tipos_asunto->MoveNext();
			// }

			// /** Último paso para armar la fila: total de solicitudes por asunto */
			// $datos_tmp["total"] = $total_asuntos_tipo;
			// $contador = $contador + $datos_tmp["total"];

			// /** Si el total fue mayor que cero (0), lo hace parte de la tabla que se va a mostrar */
			// if($datos_tmp["total"] > 0)
				// array_push($arregloAsuntoTipo,$datos_tmp);

			// $resultado_asuntos->MoveNext();
		// }
		
		

		
		$query1 = sprintf("SELECT COUNT(s.solicitud_id) AS cantidad, p.tipo_nombre, a.asunto_id, a.asunto_nombre 
			FROM pqr_solicitud s 
			INNER JOIN pqr_transaccion t ON s.estado_actual = t.transaccion_id 
			INNER JOIN pqr_tipo p ON t.tipo_id = p.tipo_id 
			INNER JOIN pqr_asunto a ON t.asunto_id = a.asunto_id 
			WHERE s.creacion BETWEEN '%s 00:00:00' AND '%s 23:59:59' AND p.eliminado = 0
			GROUP BY a.asunto_nombre , p.tipo_nombre 
			ORDER BY a.asunto_nombre ASC, p.tipo_nombre ASC"
			, $fecha_inicial, $fecha_final_plus);
		
		$arrasunto = $db->GetAll($query1);
	
		$prearregloAsuntoTipo = array();
		$pretotal = array('Asunto' => 'TOTAL', 'total' => 0);
		
		foreach($arrasunto as $arr)
		{
			if(isset($prearregloAsuntoTipo[$arr['asunto_id']]))
			{
				$prearregloAsuntoTipo[$arr['asunto_id']][$arr['tipo_nombre']] = $arr['cantidad'];
				$prearregloAsuntoTipo[$arr['asunto_id']]['total'] = $prearregloAsuntoTipo[$arr['asunto_id']]['total'] + $arr['cantidad'];
			}
			else
			{
				$prearregloAsuntoTipo[$arr['asunto_id']] = array(
					'Asunto' => $arr['asunto_nombre'], 
					$arr['tipo_nombre'] => $arr['cantidad'],
					'total' => $arr['cantidad']);
			}
			
			if(isset($pretotal[$arr['tipo_nombre']]))
			{
				$pretotal[$arr['tipo_nombre']] = $pretotal[$arr['tipo_nombre']] + $arr['cantidad'];
				$pretotal['total'] += $arr['cantidad'];
			}
			else
			{
				$pretotal[$arr['tipo_nombre']] = $arr['cantidad'];
				$pretotal['total'] += $arr['cantidad'];
			}
		}
		
		array_push($prearregloAsuntoTipo, $pretotal);

		/** Agrega la fila de los totales verticales */
		// $arregloTotalesTipo["total"] = $contador;
		// array_push($arregloAsuntoTipo,$arregloTotalesTipo);
		$arregloAsuntoTipo = $prearregloAsuntoTipo;

		return $arregloAsuntoTipo;

	}// Fin función tablaAsuntoTipo()



	function IncumplimientosPeriodo($fecha_inicial,$fecha_final, $fecha_final_transaccion, $dependencia = "")
	{
	    global $db;
		$incumplimiento = 0;
		 set_time_limit(0); 
		// $arreglo_solicitudes = array();

		// /* Consulto solicitudes ingresadas entre las fechas indicadas */
		// $sql_solicitudes_periodo = sprintf("SELECT MAX(transaccion_id) as id, t.solicitud_id FROM %s as t 
				// WHERE t.creacion <= '%s' AND t.solicitud_id in (select s.solicitud_id FROM 
				// %s as s WHERE s.creacion BETWEEN '%s' and '%s') GROUP BY solicitud_id", _TBL_PQR_TRANSACCION,
				// $fecha_final_transaccion, _TBL_PQR_SOLICITUD, $fecha_inicial, $fecha_final);

		// $resultado_solicitudes_periodo =$db->Execute($sql_solicitudes_periodo) or errorQuery(__LINE__, __FILE__);

		// while (!$resultado_solicitudes_periodo->EOF)
		// {
			// $sql_solicitudes = sprintf('
						// SELECT s.solicitud_id, s.creacion, t.tipo_plazo_total, e.tipo, t.dependencia_id
						// FROM %s t, %s s, %s e
						// WHERE e.estado_id = t.estado_id AND s.solicitud_id = t.solicitud_id AND s.solicitud_id = %s AND t.transaccion_id = %s',
				// _TBL_PQR_TRANSACCION, _TBL_PQR_SOLICITUD, _TBL_PQR_ESTADO,
				// $resultado_solicitudes_periodo->fields['solicitud_id'],
				// $resultado_solicitudes_periodo->fields['id']);

			// $resultado_solicitudes =$db->Execute($sql_solicitudes) or errorQuery(__LINE__, __FILE__);

			// if($resultado_solicitudes->fields['tipo'] == 'A')
			// {

				// if($dependencia != "")
				// {
					// if(in_array($resultado_solicitudes->fields['dependencia_id'], $dependencia))
					// {

						// $creacion = $resultado_solicitudes->fields['creacion'];
						// $plazo    = $resultado_solicitudes->fields['tipo_plazo_total'];

						// $fecha_limite 	= CalculaFechaLimite($creacion, $plazo);

						// $tiempo_restante = CalculaDiasHabiles($fecha_final, $fecha_limite);

						// if($tiempo_restante <= 0)
						// {
							// $incumplimiento++;
						// }
					// }
				// }
			// }
			// $resultado_solicitudes_periodo->MoveNext();
		// }
		
	
		
		$query1 = sprintf("SELECT s.solicitud_id, s.creacion, t.tipo_plazo_total, e.tipo, t.dependencia_id
			FROM pqr_solicitud s 
			INNER JOIN pqr_transaccion t ON s.estado_actual = t.transaccion_id 
			INNER JOIN pqr_estado e ON t.estado_id = e.estado_id
			WHERE s.creacion BETWEEN '%s' AND '%s'"
			, $fecha_inicial, $fecha_final);
		
		$solicitudes = $db->GetAll($query1);
		
		foreach($solicitudes as $sol)
		{
			if($sol['tipo'] == 'A')
			{

				if($dependencia != "")
				{
					if(in_array($sol['dependencia_id'], $dependencia))
					{

						$creacion = $sol['creacion'];
						$plazo    = $sol['tipo_plazo_total'];

						$fecha_limite 	= CalculaFechaLimite($creacion, $plazo);

						$tiempo_restante = CalculaDiasHabiles($fecha_final, $fecha_limite);

						if($tiempo_restante <= 0)
						{
							$incumplimiento++;
						}
					}
				}
			}
		}

		return $incumplimiento;
	}



	function IncumplimientosPeriodo2($fecha_inicial,$fecha_final, $fecha_final_transaccion, $dependencia = "")
	{
	
	    global $db;
		$incumplimiento = 0;
		$arreglo_solicitudes = array();
		 set_time_limit(0); 
		
	

		$sql_solicitudes_periodo = sprintf('SELECT MAX(transaccion_id) as id, t.solicitud_id, e.tipo, t.dependencia_id FROM %s as t, %s as e ' .
				'WHERE t.creacion <= \'%s\' AND e.estado_id = t.estado_id AND t.solicitud_id in (select s.solicitud_id FROM ' .
				'%s as s WHERE s.creacion BETWEEN \'%s\' and \'%s\') ', _TBL_PQR_TRANSACCION, _TBL_PQR_ESTADO,
				$fecha_final_transaccion, _TBL_PQR_SOLICITUD, $fecha_inicial, $fecha_final);

		if($dependencia != "")
		{

			$sql_solicitudes_periodo .= sprintf(' and dependencia_id in (%s) ',$dependencia);
		}

		$sql_solicitudes_periodo .= sprintf('GROUP BY solicitud_id');

		$resultado_solicitudes_periodo =$db->Execute($sql_solicitudes_periodo) or errorQuery(__LINE__, __FILE__);

		while (!$resultado_solicitudes_periodo->EOF)
		{
			if($resultado_solicitudes_periodo->fields('tipo') == 'A')//Obtenemos las solicitudes estado abierto
			{
				$solicitud_id   = $resultado_solicitudes_periodo->fields('solicitud_id');
				$transaccion_id = $resultado_solicitudes_periodo->fields('id');
				$arreglo_solicitudes[$solicitud_id] = $transaccion_id;
			}

			$resultado_solicitudes_periodo->MoveNext();
		}

		foreach ($arreglo_solicitudes as $solicitud_id => $transaccion_id )
		{
		   
			
			$sql_solicitudes = sprintf('
						SELECT s.solicitud_id, s.creacion, t.tipo_plazo_total
						FROM %s t, %s s
						WHERE s.solicitud_id = t.solicitud_id AND s.solicitud_id = %s AND t.transaccion_id = %s',
				_TBL_PQR_TRANSACCION,
				_TBL_PQR_SOLICITUD,
				$solicitud_id,
				$transaccion_id);

			$resultado_solicitudes =$db->Execute($sql_solicitudes) or errorQuery(__LINE__, __FILE__);

			$creacion = $resultado_solicitudes->fields['creacion'];
			$plazo    = $resultado_solicitudes->fields['tipo_plazo_total'];

			$fecha_limite 	= CalculaFechaLimite($creacion, $plazo);

			$tiempo_restante = CalculaDiasHabiles($fecha_final, $fecha_limite);

			if($tiempo_restante <= 0)
			{
				$incumplimiento++;
			}

		}

		return $incumplimiento;
	}




	function obtieneEfectividad($fecha_inicial,$fecha_final_plus)
	{
	
	    global $db;
		 set_time_limit(0); 

		/** Declaración de variables */

		$arregloEfectividad	  =	array();	//Arreglo final

		$lista_plus           = "";			//Irá almacenando las dependencias que son jefatura o son hijas de jefatura,
											//para después hallar las que no lo son y también tenerlas en cuenta

		//Se usa para hacer la sumatoria vertical de las solicitudes por tipo
		//Se inicializa de esta manera para conservar el formato de todas las filas del arreglo
		$arregloTotalesTipo		  = array("JEFATURA"=>"TOTAL_EFECTIVIDAD_ARC");
		$arregloTotalesTipo['Total_de_Casos']			= 0;
		$arregloTotalesTipo['respuestas_Definitivas']	= 0;
		$arregloTotalesTipo['Incompletos']				= 0;
		$arregloTotalesTipo['Desistimiento']			= 0;
		$arregloTotalesTipo['Respuestas_Pendientes']	= 0;
		$arregloTotalesTipo['Incumplimiento']			= 0;
		$arregloTotalesTipo['EAC_(%)']					= 0;

		/** JEFATURAS*/
		/** Se consultan todas las dependencias que son jefatura */
		
		$padres = sprintf("select dependencia_id, dependencia_nombre from %s where es_jefatura = 1", _TBL_PQR_DEPENDENCIA);
		$resultado_padres = $db->Execute($padres) or errorQuery(__LINE__, __FILE__);

		while(!$resultado_padres->EOF)
		{
			/** Con esto trae todos los hijos de una jefatura dada*/
			$hijos_dependencia = array();
			array_push ($hijos_dependencia, $resultado_padres->fields['dependencia_id']);
			$hijos_dependencia = $this->Reporte_padre->traerHijosDependencias($resultado_padres->fields['dependencia_id'], $hijos_dependencia);
			$lista = implode(", ", $hijos_dependencia);
			$lista_plus .= $lista.", ";

			$arreglo = $this->SolicitudesPeriodo($fecha_inicial, $fecha_final_plus, $fecha_final_plus, $lista);

			if($arreglo['Recibidas'] > 0)
			{
				$datos_tmp	=	array("JEFATURA"=>$resultado_padres->fields['dependencia_nombre']);
				$datos_tmp['Total_de_Casos'] 			= isset($arreglo['Recibidas']) 					 ? $arreglo['Recibidas'] 					: 0;
				$arregloTotalesTipo['Total_de_Casos']	+= $datos_tmp['Total_de_Casos'];

				$datos_tmp['respuestas_Definitivas'] 	= isset($arreglo['Cerrado']) 					 ? $arreglo['Cerrado'] 						: 0;
				$arregloTotalesTipo['respuestas_Definitivas']	+= $datos_tmp['respuestas_Definitivas'];

				$datos_tmp['Incompletos'] 				= isset($arreglo['Incompleta']) 				 ? $arreglo['Incompleta'] 					: 0;
				$arregloTotalesTipo['Incompletos']		+= $datos_tmp['Incompletos'];

				$datos_tmp['Desistimiento'] 			= isset($arreglo['Desistimiento']) 				 ? $arreglo['Desistimiento'] 				: 0;
				$arregloTotalesTipo['Desistimiento']	+= $datos_tmp['Desistimiento'];

				$datos_tmp['Respuestas_Pendientes'] 	= isset($arreglo['Pendientes_Periodo_Anterior']) ? $arreglo['Pendientes_Periodo_Anterior']  : 0;
				$arregloTotalesTipo['Respuestas_Pendientes']	+= $datos_tmp['Respuestas_Pendientes'];

				$datos_tmp['Incumplimiento'] 			= $this->IncumplimientosPeriodo($fecha_inicial, $fecha_final_plus, $fecha_final_plus, $hijos_dependencia);
				$arregloTotalesTipo['Incumplimiento']	+= $datos_tmp['Incumplimiento'];


				$indicador = round((($datos_tmp['respuestas_Definitivas'] - (2 * $datos_tmp['Incumplimiento']))/($datos_tmp['Total_de_Casos'] - ($datos_tmp['Incompletos'] + $datos_tmp['Desistimiento']))*100),2);

				$datos_tmp['EAC_(%)'] 			= $indicador;

				array_push($arregloEfectividad,$datos_tmp);
			}
			$resultado_padres->MoveNext();
		}


		/** OTRAS DEPENDENCIAS*/
		/** Aqui valida las dependencias que no hicieron parte de la anterior validación por no ser jefetauras ni dependencias hijas de jefaturas */
		//$lista_plus contiene todas las dependencias que fueron tenidas en cuenta en el punto anterior, ahora se consultarán las que no están en la lista
		$lista_plus	= substr($lista_plus,0,strlen($lista_plus)-2);

		if($lista_plus != "")
			$otras_dependencias = sprintf("select dependencia_id, dependencia_nombre from %s where dependencia_id NOT in (%s)", _TBL_PQR_DEPENDENCIA, $lista_plus);
		else
			$otras_dependencias = sprintf("select dependencia_id, dependencia_nombre from %s", _TBL_PQR_DEPENDENCIA, $lista_plus);

		$resultado_otras_dependencias = $db->Execute($otras_dependencias) or errorQuery(__LINE__, __FILE__);


		while(!$resultado_otras_dependencias->EOF)
		{
			$arreglo_otras_dep[] = $resultado_otras_dependencias->fields['dependencia_id'];
			$resultado_otras_dependencias->MoveNext();
		}
		$lista = implode(", ", $arreglo_otras_dep);

		$arreglo = $this->SolicitudesPeriodo($fecha_inicial, $fecha_final_plus, $fecha_final_plus, $lista);

		if($arreglo['Recibidas'] > 0)
		{
			$datos_tmp	=	array("JEFATURA"=>$resultado_padres->fields['dependencia_nombre']);
			$datos_tmp['Total_de_Casos'] 			= isset($arreglo['Recibidas']) 					 ? $arreglo['Recibidas'] 					: 0;
			$arregloTotalesTipo['Total_de_Casos']	+= $datos_tmp['Total_de_Casos'];

			$datos_tmp['respuestas_Definitivas'] 	= isset($arreglo['Cerrado']) 					 ? $arreglo['Cerrado'] 						: 0;
			$arregloTotalesTipo['respuestas_Definitivas']	+= $datos_tmp['respuestas_Definitivas'];

			$datos_tmp['Incompletos'] 				= isset($arreglo['Incompleta']) 				 ? $arreglo['Incompleta'] 					: 0;
			$arregloTotalesTipo['Incompletos']		+= $datos_tmp['Incompletos'];

			$datos_tmp['Desistimiento'] 			= isset($arreglo['Desistimiento']) 				 ? $arreglo['Desistimiento'] 				: 0;
			$arregloTotalesTipo['Desistimiento']	+= $datos_tmp['Desistimiento'];

			$datos_tmp['Respuestas_Pendientes'] 	= isset($arreglo['Pendientes_Periodo_Anterior']) ? $arreglo['Pendientes_Periodo_Anterior']  : 0;
			$arregloTotalesTipo['Respuestas_Pendientes']	+= $datos_tmp['Respuestas_Pendientes'];

			$datos_tmp['Incumplimiento'] 			= $this->IncumplimientosPeriodo($fecha_inicial, $fecha_final_plus, $fecha_final_plus, $arreglo_otras_dep);
			$arregloTotalesTipo['Incumplimiento']	+= $datos_tmp['Incumplimiento'];


			$indicador = round((($datos_tmp['respuestas_Definitivas'] - (2 * $datos_tmp['Incumplimiento']))/($datos_tmp['Total_de_Casos'] - ($datos_tmp['Incompletos'] + $datos_tmp['Desistimiento']))*100),2);

			$datos_tmp['EAC_(%)'] 			= $indicador;

			array_push($arregloEfectividad,$datos_tmp);
		}

		$indicador = round((($arregloTotalesTipo['respuestas_Definitivas'] - (2 * $arregloTotalesTipo['Incumplimiento']))/($arregloTotalesTipo['Total_de_Casos'] - ($arregloTotalesTipo['Incompletos'] + $arregloTotalesTipo['Desistimiento']))*100),2);

		$arregloTotalesTipo['EAC_(%)']	= $indicador;

		array_push($arregloEfectividad,$arregloTotalesTipo);

		if ($indicador != 0)
		{
			$this->indicadorEAC = "La efectividad en atención al ciudadano es de ".$indicador."%.";
		}
		else
		{
			$this->indicadorEAC = "Este indicador no se puede medir, ya que todas las solicitudes de este periodo aun se encuentran abiertas.";
		}

		return $arregloEfectividad;

	}// Fin función obtieneEfectividad()



	function obtieneIndicadorEfectividad($solicitudes_periodo)
	{
		//CASOS CERRADOS - (2 * INCUMPLIMIENTOS) / TOTAL SOLICITUDES- (INCOMPLETAS + DESISTIMIENTOS)
		
		global $db;
		 set_time_limit(0); 

		$cerrados          = isset($solicitudes_periodo['Cerrado'])         ? $solicitudes_periodo['Cerrado']        : 0;
		$incumplimientos   = isset($solicitudes_periodo['Incumplimientos']) ? $solicitudes_periodo['Incumplimientos']: 0;
		$total_solicitudes = isset($solicitudes_periodo['Recibidas'])       ? $solicitudes_periodo['Recibidas']      : 0;
		$incompletas       = isset($solicitudes_periodo['Incompleta'])      ? $solicitudes_periodo['Incompleta']     : 0;
		$desistimientos    = isset($solicitudes_periodo['Desistimiento'])   ? $solicitudes_periodo['Desistimiento']  : 0;

		$indicador = round((($cerrados - (2 * $incumplimientos))/($total_solicitudes - ($incompletas + $desistimientos))*100),2);

		if ($indicador != 0)
		{
			$texto_indicador = "La efectividad en atención al ciudadano es de ".$indicador."%.";
		}
		else
		{
			$texto_indicador = "Este indicador no se puede medir, ya que todas las solicitudes de este periodo aun se encuentran abiertas.";
		}

		return $texto_indicador;

	}// Fin función obtieneIndicadorEfectividad()

        function contarEncuestas($fecha_inicial,$fecha_final)
	{
            global $db;
            
            $encuestas_realizadas_query = "
                    SELECT
                        distinct(solicitud_id) solicitud_id
                    FROM
                        pqr_respuestas_encuesta 
                    WHERE
                        creacion > '" . $fecha_inicial . "' AND
                        creacion < '" . $fecha_final . "' 
                   
                ";
    
                $encuestas_realizadas = $db->GetAll($encuestas_realizadas_query);
                $conteo_encuestas_buenas = 0;
                $conteo_encuestas_malas = 0;
                $cantidad_encuestas_aplicadas = count($encuestas_realizadas);
                $arreglo = array();
                $indicador = '';
                $conteo_encuestas_malas = 0;
                
                if($cantidad_encuestas_aplicadas > 0){
                    foreach ($encuestas_realizadas as $encuesta) {
                        $respuestas_encuesta_query = "
                            SELECT
                                *
                            FROM
                                pqr_respuestas_encuesta 
                            WHERE
                                solicitud_id = " . $encuesta['solicitud_id'] . "

                        ";



                        $respuestas_encuesta = $db->GetAll($respuestas_encuesta_query);
                        $count_res_buenas = 0;


                        foreach ($respuestas_encuesta as $respuesta) {
                            if(trim(strtoupper($respuesta['valor_respuesta'])) == 'BUENO')
                                $count_res_buenas++;

                        }

                        if($count_res_buenas < 3){
                            $conteo_encuestas_malas++;
                        }
                    }

                    
                    
                    $cantidad_encuestas_aprobadas = $cantidad_encuestas_aplicadas - $conteo_encuestas_malas;
                    
                  
                    
                    
                }else{
                    
                    $cantidad_encuestas_aprobadas = 0;
                    $conteo_encuestas_malas = 0;
                    
                }
                
                $arreglo['buenas']= $cantidad_encuestas_aprobadas;
                $arreglo['malas']= $conteo_encuestas_malas;
                
                
              
                
                return $arreglo;
                
        }

	function obtieneIndicadorSatisfaccion($fecha_inicial,$fecha_final)
	{
		//NÚMERO DE ENCUESTAS APROBADAS/NÚMERO DE ENCUESTAS APLICADAS
		
		global $db;
		 //set_time_limit(0); 

		$lista_preguntas   = "212614, 212615, 212567, 212568, 212582, 212603, 212613";
		$cantidad_encuestas_aplicadas = 0;
		$cantidad_encuestas_aprobadas = 0;

		/** Obtiene cantidad de encuestas aplicadas */
		$sql_encuestas_aplicadas = sprintf('SELECT COUNT(distinct(solicitud_id)) as cantidad FROM %s WHERE solicitud_id in (SELECT ' .
											'solicitud_id FROM %s WHERE creacion BETWEEN \'%s\' and \'%s\')',
											_TBL_PQR_ENCUESTA, _TBL_PQR_SOLICITUD, $fecha_inicial, $fecha_final);

		$resultado_encuestas_aplicadas =$db->Execute($sql_encuestas_aplicadas) or errorQuery(__LINE__, __FILE__);

		$cantidad_encuestas_aplicadas = $resultado_encuestas_aplicadas->fields['cantidad'];

		if ($cantidad_encuestas_aplicadas > 0)
		{
			
			$promedio_respuestas	=	sprintf("SELECT
										SUM(r.valor_respuesta) as suma, COUNT(r.valor_respuesta) as cantidad
										FROM %s r
										WHERE solicitud_id in (SELECT solicitud_id FROM %s WHERE creacion BETWEEN '%s' and '%s')
										AND id_padre in (%s)
										GROUP BY r.solicitud_id"
										,_TBL_PQR_ENCUESTA, _TBL_PQR_SOLICITUD, $fecha_inicial, $fecha_final, $lista_preguntas);

			$result_promedio_respuestas	=	$db->Execute($promedio_respuestas);

			while(!$result_promedio_respuestas->EOF)
			{
				$suma     = $result_promedio_respuestas->fields['suma'];
				$cantidad = $result_promedio_respuestas->fields['cantidad'];
				$promedio = $suma / $cantidad;

				if( 8 <= $promedio )
					$cantidad_encuestas_aprobadas++;

				$result_promedio_respuestas->MoveNext();
			}

			$indicador = round((($cantidad_encuestas_aprobadas / $cantidad_encuestas_aplicadas)*100), 2);
			$texto_indicador = "El nivel de satisfacción del ciudadano es ".$indicador."%.";

		}
		else
		{
			$indicador = 0;
			$cantidad_encuestas_aprobadas = 0;
			$cantidad_encuestas_aplicadas = 0;
			$texto_indicador = "Ninguna de las solicitudes del periodo ha sido evaluada mediante la encuesta.";
		}

		$arreglo['indicador']= $indicador;
		$arreglo['numerador']= $cantidad_encuestas_aprobadas;
		$arreglo['denominador']= $cantidad_encuestas_aplicadas;
		$arreglo['texto']= $texto_indicador;

		return $arreglo;

	}// Fin función obtieneIndicadorSatisfaccion()



	function obtieneIndicadorTiempoRta($fecha_inicial,$fecha_final)
	{
	
		//? TIEMPO DE RESPUESTAS DE QUEJAS Y RECLAMOS / TOTAL DE QUEJAS Y RECLAMOS
		global $db;//$db->debug = true;
		$sumatoria_tiempo = 0;
		$contador = 0;
		
		set_time_limit(0); 

		// $sql_solicitudes_periodo = sprintf("SELECT solicitud_id, creacion as inicial FROM %s WHERE creacion BETWEEN '%s' AND '%s'"
				// , _TBL_PQR_SOLICITUD, $fecha_inicial, $fecha_final);

		// $resultado_solicitudes_periodo = $db->Execute($sql_solicitudes_periodo) or errorQuery(__LINE__, __FILE__);

		// while (!$resultado_solicitudes_periodo->EOF)
		// {

			// $solicitud_id = $resultado_solicitudes_periodo->fields('solicitud_id');

			// $sql_fecha_final = sprintf('SELECT creacion as final ' .
					// 'FROM %s  ' .
					// 'WHERE estado_id = 3 AND solicitud_id = %s ' .
					// 'order by transaccion_id ASC limit 1'
					// , _TBL_PQR_TRANSACCION, $solicitud_id);

			// $resultado_fecha_final =$db->Execute($sql_fecha_final) or errorQuery(__LINE__, __FILE__);

			// if($resultado_fecha_final && $resultado_fecha_final->fields('final') != null)
			// {

				// $inicial = $resultado_solicitudes_periodo->fields('inicial');
				// $final   = $resultado_fecha_final->fields('final');

				// $inicial = date("Y-m-d", strtotime($inicial));
				// $final   = date("Y-m-d", strtotime($final));

				// $tiempo_respuesta = CalculaDiasHabiles($inicial, $final);

				// $sumatoria_tiempo = $sumatoria_tiempo + $tiempo_respuesta;
				// $contador++;
			// }

			// $resultado_solicitudes_periodo->MoveNext();
		// } 
		
		$query1 = sprintf("SELECT s.solicitud_id, s.creacion AS inicial, t.creacion AS final 
			FROM pqr_solicitud s 
			INNER JOIN pqr_transaccion t ON s.estado_actual = t.transaccion_id 
			WHERE (s.creacion BETWEEN '2009-11-11' AND '2009-12-01') AND t.estado_id = 3"
			,$fecha_inicial, $fecha_final);
		
		$tiempos = $db->GetAll($query1);
		
		foreach($tiempos as $tie)
		{
			if($tie['inicial'] != '' && $tie['final'] != '')
			{
				$inicial = $tie['inicial'];
				$final   = $tie['final'];

				$inicial = date("Y-m-d", strtotime($inicial));
				$final   = date("Y-m-d", strtotime($final));

				$tiempo_respuesta = CalculaDiasHabiles($inicial, $final);

				$sumatoria_tiempo = $sumatoria_tiempo + $tiempo_respuesta;
				$contador++;
			}
		}

		if($contador > 0)
		{
			$indicador = round(($sumatoria_tiempo / $contador), 1);
			$texto_indicador = "El tiempo de respuesta promedio de quejas y reclamos es ".$indicador." días.";
			$this->tiempo_respuesta = true;
		}
		else
		{
			$indicador = 0;
			$sumatoria_tiempo = 0;
			$contador = 0;
			$texto_indicador = "Este indicador no se puede medir, ya que todas las solicitudes de este periodo aun se encuentran abiertas.";
			$this->tiempo_respuesta = false;
		}

		$arreglo['indicador']= $indicador;
		$arreglo['numerador']= $sumatoria_tiempo;
		$arreglo['denominador']= $contador;
		$arreglo['texto']= $texto_indicador;

		return $arreglo;

	}// Fin función obtieneIndicadorTiempoRta()



	function obtieneIndicadorOportunidad($fecha_inicial,$fecha_final)
	{
	
		//? Numero de Quejas y Reclamos resueltos oportunamente / Total de Quejas y reclamos
		global $db;
		$sumatoria_tiempo = 0;
		$contador_recibidas = 0;
		$contador_resueltas = 0;
		 set_time_limit(0); 

		// $sql_solicitudes_periodo =
		// sprintf("SELECT solicitud_id, creacion as inicial 
				// FROM %s 
				// WHERE creacion BETWEEN '%s' AND '%s'"
				// , _TBL_PQR_SOLICITUD, $fecha_inicial, $fecha_final);

		// $resultado_solicitudes_periodo = $db->Execute($sql_solicitudes_periodo) or errorQuery(__LINE__, __FILE__);

		// while (!$resultado_solicitudes_periodo->EOF)
		// {
			// $solicitud_id = $resultado_solicitudes_periodo->fields('solicitud_id');

			// $sql_fecha_final =
			// sprintf('SELECT creacion as final, tipo_plazo_total as plazo ' .
					// 'FROM %s  ' .
					// 'WHERE estado_id = 3 AND solicitud_id = %s ' .
					// 'order by transaccion_id ASC limit 1'
					// , _TBL_PQR_TRANSACCION, $solicitud_id);

			// $resultado_fecha_final =$db->Execute($sql_fecha_final) or errorQuery(__LINE__, __FILE__);

			// if($resultado_fecha_final && $resultado_fecha_final->fields('final') != null)
			// {

				// $inicial = $resultado_solicitudes_periodo->fields('inicial');
				// $final   = $resultado_fecha_final->fields('final');

				// $inicial = date("Y-m-d", strtotime($inicial));
				// $final   = date("Y-m-d", strtotime($final));

				// $tiempo_respuesta = CalculaDiasHabiles($inicial, $final);

				// if($resultado_fecha_final->fields('plazo') > $tiempo_respuesta)
					// $contador_resueltas++;

			// }
			// $contador_recibidas ++;
			// $resultado_solicitudes_periodo->MoveNext();
		// }
		
		
		$query1 = sprintf("SELECT s.solicitud_id, s.creacion AS inicial, t.creacion AS final, t.tipo_plazo_total as plazo 
			FROM pqr_solicitud s 
			INNER JOIN pqr_transaccion t ON s.estado_actual = t.transaccion_id 
			WHERE (s.creacion BETWEEN '2009-11-11' AND '2009-12-01') AND t.estado_id = 3"
			,$fecha_inicial, $fecha_final);
		
		$plazos = $db->GetAll($query1);
		
		foreach($plazos as $pla)
		{
			if($pla['inicial'] != '' && $pla['final'] != '')
			{
				$inicial = $pla['inicial'];
				$final   = $pla['final'];

				$inicial = date("Y-m-d", strtotime($inicial));
				$final   = date("Y-m-d", strtotime($final));

				$tiempo_respuesta = CalculaDiasHabiles($inicial, $final);

				if($pla['plazo'] > $tiempo_respuesta)
				{
					$contador_resueltas++;
				}
			}
			$contador_recibidas ++;
		}

		if($contador_resueltas > 0)
		{
			$indicador = round((($contador_resueltas / $contador_recibidas)*100), 1);
			$texto_indicador = "La oportunidad en la respuesta de las quejas y reclamos es de ".$indicador." %.";
			$this->tiempo_respuesta = true;
		}
		else
		{
			$indicador = 0;
			$contador_resueltas = 0;
			$contador_recibidas = 0;
			$texto_indicador = "Este indicador no se puede medir, ya que todas las solicitudes de este periodo aun se encuentran abiertas.";
			$this->tiempo_respuesta = false;
		}

		$arreglo['indicador']= $indicador;
		$arreglo['numerador']= $contador_resueltas;
		$arreglo['denominador']= $contador_recibidas;
		$arreglo['texto']= $texto_indicador;

		return $arreglo;

	}// Fin función obtieneIndicadorOportunidad()
}
?>
