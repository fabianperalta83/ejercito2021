<?php

			/** SOLICITUD DE ARCHIVOS REQUERIDOS **/

			
require_once(_DIRLIB.'pqr/funciones_pqr.php');

require_once(_DIRLIB.'smarty/libs/Smarty.class.php');

/* Incluye la clase de validaciones y de funciones */

require_once(_DIRCORE.'Validacion.class.php');

require_once(_DIRCORE.'Funciones.class.php');

require_once(_DIRLIB.'pqr/Reporte_Gerencial_Pdf.class.php');

require_once(_DIRCORE.'reporte_gerencial.php');

			
		/** INICIALIZACION DE VARIABLES **/

$texto_introduccion='';

$errores=array();

$continuar='ok';

//$reporte10=$_REQUEST['grafico10'];
//var_dump($reporte10);

$pdf='';

$imagen_reporte='_include/imagen_reporte_pdf.php';
$imagen_reporte1='_include/imagen_reporte_pdf.php';
$imagen_reporte2='_include/imagen_reporte_pdf.php';
$imagen_reporte3='_include/imagen_reporte_pdf.php';
$imagen_reporte4='_include/imagen_reporte_pdf.php';
$imagen_reporte5='_include/imagen_reporte_pdf.php';
$imagen_reporte6='_include/imagen_reporte_pdf.php';
$imagen_reporte7='_include/imagen_reporte_pdf.php';
$imagen_reporte8='_include/imagen_reporte_pdf.php';
$imagen_reporte9='_include/imagen_reporte_pdf.php';
$imagen_reporte10='_include/imagen_reporte_pdf.php';
$imagen_reporte11='_include/imagen_reporte_pdf.php';
$imagen_reporte12='_include/imagen_reporte_pdf.php';
$imagen_reporte13='_include/imagen_reporte_pdf.php';
$imagen_reporte14='_include/imagen_reporte_pdf.php';
$imagen_reporte15='_include/imagen_reporte_pdf.php';
$imagen_reporte16='_include/imagen_reporte_pdf.php';
$imagen_reporte17='_include/imagen_reporte_pdf.php';


			/** CONFIGURACIÓN DEL FORMULARIO **/

/* Creación de las opciones para el select del tipo de reporte */

$reporte = new Reporte();


			/** CAPTURA DE LA INFORMACION INGRESADA POR EL USUARIO **/

$fecha_inicial		=	getVariable('fecha_inicial',$reporte->getFechaInicial());

$fecha_final		=	getVariable('fecha_final',$reporte->getFechaFinal());

$titulo_informe		= "Tercer Trimestre año 2008";

$oficio_numero      = "Oficio No. 002";

$asuntos_trimestres = "Escriba aquí información detallada sobre cada uno de los asuntos tratados durante el trimestre.";
/* ACA TRAIGO LAS VARIABLES QUE ME HARAN LA REINSIDENCIA DEL LOS CAMPOS QUE APARECEN----------------------------FP*/
$asunto=getVariable('asunto');
$al								=	getVariable('al');
$firma							=	getVariable('firma');
$datos							=	getVariable('datos');
$rango							=	getVariable('rango');
$nombre							=	getVariable('nombre');
$visto							=	getVariable('visto');
$elaboro						=	getVariable('elaboro');
$ayudante						=	getVariable('ayudante');
$ayudante_cargo					=	getVariable('ayudante_cargo');
$periodo						=	getVariable('periodo');
/*FIN DE ASIGNACION DE LAS VARIABLES-------------------------------------------------FP*/
/* Verifica si el formulario ha sido enviado */

if(isset($_POST['enviar'])){
	$enviar='ok';
}

else{
	$enviar='no';
}

if(isset($_POST['pdf'])){
	ob_start();
	CrearInformePdf();
	ob_end_flush();	
}


			/** PROCESAMIENTO DE LA INFORMACION **/

/* Si el formulario ha sido enviado hace el procesamiento de la información */

if($enviar=='ok'){
	global $db;

			/** VALIDACIÓN DE LA INFORMACIÓN CAPTURADA **/


	/* Valida la fecha inicial */

	/* si es una fecha inválida registra el error */

	if(!$reporte->setFechaInicial($fecha_inicial)){

		array_push($errores,'La fecha inicial no es válida, por favor escribala de nuevo, recuerde que el formato es aaaa-mm-dd por ejemplo 2008-01-01 para indicar el primero de enero del 2007');

	}

	$fecha_inicial=$reporte->getFechaInicial();

	
		/* Valida la fecha final */

	/* si es una fecha inválida registra el error */

	if(!$reporte->setFechaFinal($fecha_final)){

		array_push($errores,'La fecha final no es válida, por favor escribala de nuevo, recuerde que el formato es aaaa-mm-dd por ejemplo 2007-01-01 para indicar el primero de enero del 2007');

	}

	$fecha_final=$reporte->getFechaFinal();
	
	if($_POST['titulo_informe']==''){

		array_push($errores,'No hay título para el informe, por favor escribalo.');
		
	}
	
	if($_POST['oficio_numero']==''){

		array_push($errores,'No hay número de oficio para el informe, por favor escribalo.');
		
	}
	/* VALIDA EL ERROR DEL SELECT SI NO SE SELECCIONA NUNGUNA OPCION-----------------------------FP*/
	if($_POST['datos']==0){

		array_push($errores,'Debe de seleccionar un tipo de reporte para poder continuar');
		
	}
	/* TERMINA LA VALIDACIÓN DEL SELECT*/
	
	/* VALIDA SI SE SELCCIONO LA PRIMERA OPCION Y VALIDA LS CAJAS DE TEXTO QUE APARECERAN-----------------------FP*/
	if($_POST['datos']==1 && $_POST['asunto']==''){

		array_push($errores,'Debe escribir un asunto para poder continuar');
		
	}
	if($_POST['datos']==1 && $_POST['al']==''){

		array_push($errores,'Debe escribir a quien va dirigido el informe');
		
	}
	if($_POST['datos']==1 && $_POST['firma']==''){

		array_push($errores,'Debe escribir el cargo de la persona a la que va dirigido el informe');
		
	}
	if($_POST['datos']==1 && $_POST['rango']==''){

		array_push($errores,'Debe escribir el Rango del Jefe de Atención al ciudadano');
		
	}
	if($_POST['datos']==1 && $_POST['nombre']==''){

		array_push($errores,'Debe escribir el Nombre del Jefe de Atención al ciudadano');
		
	}
	if($_POST['datos']==1 && $_POST['elaboro']==''){

		array_push($errores,'Debe escribir el Nombre de quien elaboro el informe');
		
	}
	if($_POST['datos']==1 && $_POST['visto']==''){

		array_push($errores,'Debe escribir el Nombre de quien da el visto bueno');
		
	}
	if($_POST['datos']==1 && $_POST['ayudante']==''){

		array_push($errores,'Debe escribir el Nombre del Ayudante General Comando Ejercito');
		
	}
	if($_POST['datos']==1 && $_POST['ayudante_cargo']==''){

		array_push($errores,'Debe escribir el Cargo del Ayudante General Comando Ejercito');
		
	}
	/* TERMINA LA VALIDACION DE LAS OPCIONES DEL SELECT Y DE LAS CAJAS--------------------------------------------------FP*/
	
	$cantidad_errores=count($errores);

	if($cantidad_errores>0){

		$continuar='no';
	}
	
	/* Si no hay errores en los datos, se envian los parametros a la imagen */

	if($continuar=='ok'){

		$cantidad_errores=0;
		
		$errores=0;
					
		/*ELIMINO LAS TEMPORALES SI EXISTEN Y CREO LA ESTRUCTURA DE LAS TABLAS TEMPORALES A USAR*/
				
		$sql_eliminar_pqr_informe_gerencial=sprintf('DROP TABLE IF EXISTS `pqr_informe_gerencial`');
		$resultado_pqr_informe_gerencial=$db->Execute($sql_eliminar_pqr_informe_gerencial);
		
		$sql_crear_pqr_informe_gerencial=sprintf('
				CREATE TABLE `pqr_informe_gerencial` (                                 
				`id_parte_informe` bigint(20) unsigned NOT NULL auto_increment,                                  
				`fecha_inicial` date NOT NULL, 
				`fecha_final` date NOT NULL, 
				`titulo_informe` tinytext NOT NULL,   
				`oficio_numero` tinytext NOT NULL,    
				`asuntos_trimestres` text NOT NULL,                          
				 PRIMARY KEY  (`id_parte_informe`))');
		
		$resultado_pqr_informe_gerencial=$db->Execute($sql_crear_pqr_informe_gerencial);	
	
		/* Le adiciona los parametros necesarios al archivo que genera la imagen*/

  		$titulo_informe 		= Autenticacion::secureSQL($_POST['titulo_informe'],'');
		$oficio_numero 			= Autenticacion::secureSQL($_POST['oficio_numero'],''); 		
		$asuntos_trimestres 	= Autenticacion::secureSQL($_POST['asuntos_trimestres'],'');
		
		/* Crea la sentencia de inserción de la solicitud en la base de datos*/

		$sql_insert_partes = '
			INSERT INTO pqr_informe_gerencial (
				fecha_inicial,
				fecha_final,
				titulo_informe,
				oficio_numero,
				asuntos_trimestres)
			values (
				"' . $fecha_inicial . '",
				"' . $fecha_final . '",
				"' . $titulo_informe . '",
				"' . $oficio_numero . '",
				"' . $asuntos_trimestres.'")';

        $resultado_insert_partes = $db->Execute($sql_insert_partes) or errorQuery(__LINE__, __FILE__);	
		                
		$obtiene_id_dependencia_usuario = sprintf('SELECT dependencia_id 

		from pqr_rel_dependencia_usuario 

		where idusuario=%s', $_SESSION['info_usuario']['idusuario']);

		$resultado_relacion = $db->Execute($obtiene_id_dependencia_usuario);

		$dependencia_usuario = $resultado_relacion->fields['dependencia_id'];	
		
		//var_dump($dependencia_usuario); 
		
		//echo $resultado_relacion->fields['dependencia_id'];
		
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile1.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile1.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile2.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile2.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile3.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile3.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile4.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile4.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile5.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile5.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile6.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile6.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile7.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile7.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile8.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile8.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile9.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile9.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile10.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile10.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile11.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile11.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile12.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile12.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile13.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile13.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile14.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile14.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile15.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile15.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile16.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile16.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile17.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile17.jpg');
		}
		if (file_exists(_DIRRECURSOS_USER.'reporte/imagefile18.jpg')) {
			unlink(_DIRRECURSOS_USER.'reporte/imagefile18.jpg');
		}			
			
			$tipo_reporte		=	1;
			$tipo_presentacion	=	1;
			
			$imagen_reporte.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
			
			$tipo_reporte		=	1;
			$tipo_presentacion	=	2;
			
			$imagen_reporte1.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
			
			$tipo_reporte		=	2;
			$tipo_presentacion	=	1;
			
			$imagen_reporte2.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
						
			$tipo_reporte		=	2;
			$tipo_presentacion	=	2;
			
			$imagen_reporte3.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
						
			$tipo_reporte		=	3;
			$tipo_presentacion	=	1;
			
			$imagen_reporte4.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
						
			$tipo_reporte		=	3;
			$tipo_presentacion	=	2;
			
			$imagen_reporte5.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;		
				
			$tipo_reporte		=	4;
			$tipo_presentacion	=	1;
			
			$imagen_reporte6.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
						
			$tipo_reporte		=	4;
			$tipo_presentacion	=	2;
			
			$imagen_reporte7.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
			
			$tipo_reporte		=	5;
			$tipo_presentacion	=	1;
			
			$imagen_reporte8.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;					
			
			$tipo_reporte		=	5;
			$tipo_presentacion	=	2;
			
			$imagen_reporte9.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
						
			$tipo_reporte		=	6;
			$tipo_presentacion	=	1;
			
			$imagen_reporte10.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
						
			$tipo_reporte		=	6;
			$tipo_presentacion	=	2;
			
			$imagen_reporte11.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
						
			$tipo_reporte		=	7;
			$tipo_presentacion	=	1;
			
			$imagen_reporte12.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
						
			$tipo_reporte		=	7;
			$tipo_presentacion	=	2;
			
			$imagen_reporte13.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
			
			$tipo_reporte		=	8;
			$tipo_presentacion	=	1;
			
			$imagen_reporte14.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;		
						
			$tipo_reporte		=	8;
			$tipo_presentacion	=	2;
			
			$imagen_reporte15.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
			
			$tipo_reporte		=	9;
			$tipo_presentacion	=	1;
			
			$imagen_reporte16.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;
			
			$tipo_reporte		=	9;
			$tipo_presentacion	=	2;
			
			$imagen_reporte17.='?reporte='.$tipo_reporte.

			'&presentacion='.$tipo_presentacion.

			'&fecha_inicial='.$fecha_inicial.

			'&fecha_final='.$fecha_final;					
	}
}

	
			/** PASO DE VARIABLES A LA PLANTILLA DE SMARTY **/

$descargar_pdf='listo';

/* Se crea una nueva instancia de Smarty */

$smarty = new Smarty_Plantilla();

/* Asigna a una variable la ruta de la hoja de estilos */

$smarty->assign('DIRCSS', _DIRCSS);

/* Asigna a una variable la ruta de los archivos de funciones javascript */

$smarty->assign('DIRJS', _DIRJS);

/* Asigna a una variable la ruta de las imágenes del administrador */

$smarty->assign('dir_admin_images', _URL.'_administracion/recursos/images/');

/* Pasa la url de esta página */

$smarty->assign('esta_pagina',_URL.'?idcategoria='.$idcategoria);

/* Asigna el contenido de los titulos, textos y etiquetas */

$smarty->assign('lb_titulo_pagina', 'REPORTE GERENCIAL');

$smarty->assign('lb_titulo_reportes', 'Informe de Gestión en Atención al Ciudadano');

$smarty->assign('lb_fecha_inicial', 'Fecha inicial');

$smarty->assign('lb_fecha_final', 'Fecha final');


/* Asignación de los valores seleccionados por el usuario */

$smarty->assign('fecha_inicial',$fecha_inicial);

$smarty->assign('fecha_final',$fecha_final);

$smarty->assign('titulo_informe',$titulo_informe);

$smarty->assign('oficio_numero',$oficio_numero);

$smarty->assign('asuntos_trimestres',$asuntos_trimestres);
$smarty->assign('titulo_tipo_y_jefatura','SOLICITUDES POR TIPO Y JEFATURA');
$smarty->assign('titulo_medio_recepcion','SOLICITUDES POR MEDIO DE RECEPCIÓN');
$smarty->assign('titulo_tipo_y_asunto','SOLICITUDES POR TIPO Y ASUNTO');
$smarty->assign('tiempo_medio','TIEMPO MEDIO DE RESPUESTA');
$smarty->assign('titulo_seguimiento','3. SEGUIMIENTO RESPUESTA POR PARTE DE LAS INSTANCIAS COMPETENTES');
$smarty->assign('titulo_conclusiones','6. CONCLUSIONES');
$smarty->assign('titulo_recomendaciones','7. RECOMENDACIONES');
$smarty->assign('titulo_demo','II. DEMOCRATIZACÓN DE LA GESTIÓN PÚBLICA');
$smarty->assign('titulo_apoyo','III. APOYO A LA LUCHA CONTRA LA CORRUPCIÓN');
$smarty->assign('titulo_indicadores','5. INDICADORES DE EFECTIVIDAD (EAC)');

/* ACA ASIGNO LOS TITULOS DEL SELECT QCON EL QUE SE ESCOGERA EL TIPO DE INFORME-------------------------------------FP*/
$smarty->assign('titulo_1','Reporte Especifico ');
$smarty->assign('titulo_2','Reporte Básico');
$smarty->assign('titulo_asunto','Asunto:');
$smarty->assign('titulo_select',' Seleccione el tipo de Reporte a Generar:');
$smarty->assign('titulo_espe1','Datos del encabezado del Informe:');
$smarty->assign('titulo_espe2','Datos firma del informe:');
$smarty->assign('base', _RUTABASE);
$smarty->assign('asunto',$asunto);
$smarty->assign('al',$al);
$smarty->assign('elaboro',$elaboro);
$smarty->assign('ayudante',$ayudante);
$smarty->assign('ayudante_cargo',$ayudante_cargo);
$smarty->assign('periodo',$periodo);
$smarty->assign('visto',$visto);
$smarty->assign('firma',$firma);
$smarty->assign('dato',$datos);
$smarty->assign('rango',$rango);
$smarty->assign('nombre',$nombre);
/* TERMINO LA ASIGANCION DE LOS TITULOS PARA EL SELECT DE TIPO DE INFORME ----------------------------FP*/
/* Asigna el nombre de la imagen con los parametros */

$smarty->assign('imagen_reporte',$imagen_reporte);
$smarty->assign('imagen_reporte1',$imagen_reporte1);
$smarty->assign('imagen_reporte2',$imagen_reporte2);
$smarty->assign('imagen_reporte3',$imagen_reporte3);
$smarty->assign('imagen_reporte4',$imagen_reporte4);
$smarty->assign('imagen_reporte5',$imagen_reporte5);
$smarty->assign('imagen_reporte6',$imagen_reporte6);
$smarty->assign('imagen_reporte7',$imagen_reporte7);
$smarty->assign('imagen_reporte8',$imagen_reporte8);
$smarty->assign('imagen_reporte9',$imagen_reporte9);
$smarty->assign('imagen_reporte10',$imagen_reporte10);
$smarty->assign('imagen_reporte11',$imagen_reporte11);
$smarty->assign('imagen_reporte12',$imagen_reporte12);
$smarty->assign('imagen_reporte13',$imagen_reporte13);
$smarty->assign('imagen_reporte14',$imagen_reporte14);
$smarty->assign('imagen_reporte15',$imagen_reporte15);
$smarty->assign('imagen_reporte16',$imagen_reporte16);
$smarty->assign('imagen_reporte17',$imagen_reporte17);

/* Resultado de la validación */

$smarty->assign('errores', $errores);

/* Asigna las variables de control */

$smarty->assign('flg_enviar',$enviar);

$smarty->assign('continuar',$continuar);


/* Se usa fetch cuando esta en el portal */

$resultado_pagina=$smarty->fetch('tpl_reporte_gerencial.html');

return $resultado_pagina;
?>