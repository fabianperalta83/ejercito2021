<?php

require_once('../_config/constantes.php');

require_once(_DIRCORE.'Funciones.class.php');

require_once(_DIRCORE.'FuncionesInterfaz.class.php');

require_once(_RUTABASE.'_config/variables.php');

require_once(_DIRLIB.'pqr/Reporte_Gerencial_Pdf.class.php');


include (_DIRJPGRAPH.'jpgraph.php');

include (_DIRJPGRAPH.'jpgraph_line.php');

include (_DIRJPGRAPH.'jpgraph_pie.php');

include (_DIRJPGRAPH.'jpgraph_pie3d.php');

include (_DIRJPGRAPH.'jpgraph_bar.php');


/* Inicialización de variables */

$data=array();

$nombres=array();

if(isset($_GET['reporte']) && isset($_GET['presentacion']) && isset($_GET['fecha_inicial']) && isset($_GET['fecha_final'])){

	$tipo_reporte		=	$_GET['reporte'];

	$tipo_presentacion	=	$_GET['presentacion'];

	$fecha_inicial		=	$_GET['fecha_inicial'];

	$fecha_final		=	$_GET['fecha_final'];

	if(isset($_GET['dependencia_id']))
	{
		$dependencia_id		=	$_GET['dependencia_id'];

	}

	else 
	{
		$dependencia_id='';
	}

	/* Crea un objeto de reporte */

	$reporte = new Reporte();

	/* Asigna los atributos */

	$reporte->setTipoReporte($tipo_reporte);

	$reporte->setTipoPresentacion($tipo_presentacion);

	$reporte->setFechaInicial($fecha_inicial);

	$reporte->setFechaFinal($fecha_final);

	$reporte->setDependenciaId($dependencia_id);

	/* Crea la imagen */

	$reporte->createImage();

}

?>
