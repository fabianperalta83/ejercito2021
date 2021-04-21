<?

define("_max_num_res"	, 15);
define('_DEBUGLEXEMA', FALSE);

include_once(_DIRBUSCAR."funciones.php");
include_once(_DIRBUSCAR."Buscar.class.php");
include_once(_DIRBUSCAR."Keymatch.class.php");

// Verifying the CSRF Token
$is_secure_form=false;
if (!empty($_REQUEST['token'])) {
    $is_secure_form=Funciones::hash_equals($_SESSION['token'], $_REQUEST['token']);
}
if(!$is_secure_form){
	$error[] = "Acceso incorrecto detectado.";
}

/* Motor de Búsqueda */
$smarty = new Smarty_Plantilla;
$pagina = basename($_SERVER['PHP_SELF']);
$pagina .= sprintf("?idcategoria=%s",$idcategoria);

// Titulo de la página
$archivo = sprintf("%s/categoria_%s.png",_DIRRECURSOS,$idcategoria);
$c_titulo = Funciones::BuscarNombre($idcategoria);
$smarty->assign('c_titulo',$c_titulo);
//Fin Título Página

$cadena_buscar = getVariable('cadena_buscar');

$paginaActual = isset($_GET["pags"]) ? $_GET["pags"] : 0;

if (!$cadena_buscar || !(strlen($cadena_buscar)>2)) {
	$error[] = _ROT_BUSCAR_ADVERTENCIA_MENSAJE;
}

$total_errores = isset($error) ? count($error) : $total_errores = 0;

if($cadena_buscar <> "" && $total_errores){
	$smarty1 = new Smarty_Plantilla;
    $smarty1->assign('rotMensaje',utf8_decode(_ROT_BUSCAR_ADVERTENCIA));
    $smarty1->assign('tipo'      ,"error");
    $smarty1->assign('elementoMenu',$error);
    $show = $smarty1->fetch('tpl_display_mensaje.html');
    $smarty->assign('subMenuError',$show);
}

//Constantes para el Formulario
$smarty->assign('c_action'           	,$pagina);
$smarty->assign('c_formulario_titulo'	,_ROT_BUSCAR_TXT);
$smarty->assign('c_buscar'				,_ROT_BUSCAR);
$smarty->assign('cadena_buscar'			,$cadena_buscar);
// $smarty->assign('tituloGet'				,isset($_GET["titulo"]) ? $_GET["titulo"] : "");
$smarty->assign('idcategoria'			,$idcategoria);

$campo['nombre'] = _ROT_BUSCAR_PALABRA;
$campo['clase']  = "";
$campo['input']  = sprintf("<input type='text' name='cadena_buscar' size='35' value='%s' class='input1'>",$cadena_buscar);
$campos[] = $campo;
$campo['nombre'] = "";
$campo['clase']  = "";
$campo['input']  = sprintf("<input type='hidden' name='idcategoria' value='%s'>",_SBUSCAR);
$campos[] = $campo;
$smarty->assign('campos',$campos);

/**
 * Tomando el tiempo
 **/
$mt = explode(' ', microtime());
$script_start_time = $mt[1] +$mt[0];

$query = '';
$palabrasReemplazar = '';
$isRelated = FALSE;
$isImages = FALSE;
$arrayKeymatch = array();

$unBuscar = new Buscar();
$unBuscar->registrosPagina = _max_num_res;

/**
 * Guarda el click del usuario
 */
guardarClick();

if (isset($_GET["sI"]) and $_GET["sI"] == "S") { 
	$isImages = TRUE;
}

if(!empty($cadena_buscar)&&$is_secure_form) {
	$query = $cadena_buscar;
	
	$accion = explode(":", $query);
	$accionExe = strtolower(trim($accion[0]));
	
	if (!isset($accion[1])) {
		$accion[1] = $query;
	}

	switch($accionExe) {
		case 'related':
			$isRelated = TRUE;
			break;
		case 'images':
			$isImages = TRUE;
			break;
	}
	
	
	/**
	 * Removiendo los stopwords
	 **/
	$unTransform = new Transform();
	$pattern = '/[A-Za-z0-9áéíóúüñ\.]+/';
	$queryWHSTOP = implode(" ", $unTransform->getValidWords($query, $pattern));
	$queryWHSTOP = $unTransform->removeStopwords(strtolower(html_entity_decode(strip_tags($queryWHSTOP))));
	
	/**
	 * Procesar la busqueda
	 **/
	switch(TRUE) {
		case $isImages:
			$unBuscar->procesar("images:".$query, $arrayKeymatch);
		break;
		
		case $isRelated:
			$unBuscar->procesar($query, $arrayKeymatch);
		break;
		
		default:
			$unBuscar->procesar($query, $arrayKeymatch);
	}
	
	
	//$unBuscar->procesar($queryWHSTOP, $arrayKeymatch);

	/**
	 * Paginacion e intervalo de resultados mostrados
	 **/
	$numShow = 0;
	
	if (empty($paginaActual) or !is_numeric($paginaActual)) {
		$paginaActual = 1;
	} elseif ($paginaActual > $unBuscar->registrosTotal) {
		$paginaActual = $unBuscar->numeroPaginas;
	}

	if ($paginaActual == 1 AND !$isImages AND !$isRelated) {
		/**
		 * Hayando los keymatch
		 **/
		$unKeymatch = new Keymatch();
		$arrayKeymatch = $unKeymatch->buscarKeymatch($queryWHSTOP);
		/**
		 * Quiso decir
		 **/
		//$unBuscar->quisoDecir($query);
	}
	
	$msgDiscriminado = "";
	if (isset($unBuscar->discriminados['alta']) AND !empty($unBuscar->discriminados['alta'])) { 
		if (strpos($unBuscar->discriminados['alta'], ",") === FALSE) {
			$msgDiscriminado = "El término <b>".$unBuscar->discriminados['alta']."</b> fue eliminado de la búsqueda por su alta frecuencia.";
		} else {
			$msgDiscriminado = "Los términos <b>".$unBuscar->discriminados['alta']."</b> fueron eliminados de la búsqueda por su alta frecuencia.";
		}
	}
	$smarty->assign('msgDiscriminado', $msgDiscriminado);
	
	if($unBuscar->registrosTotal <= $unBuscar->registrosPagina) {
		$numShow = $unBuscar->registrosTotal;
	} else {
		$numShow = $unBuscar->registrosPagina;
	}
	
	$desdeId = (($numShow*$paginaActual) - $unBuscar->registrosPagina);
	$hastaId = ($numShow*$paginaActual);
	
	if ($hastaId > $unBuscar->registrosTotal) {
		$hastaId = $unBuscar->registrosTotal;
	}
	
	if ($desdeId < 0) {
		$desdeId = 0;
	}
	$smarty->assign("hastaId", $hastaId);
	$smarty->assign("desdeId", $desdeId+1);
}

/**
 * Visualización del tiempo de generación de la página
 **/
$mt = explode(' ', microtime());
$total_time = $mt[1]+$mt[0] - $script_start_time;
$smarty->assign("Buscar", $unBuscar);
$smarty->assign('Keymatch', $arrayKeymatch);
$smarty->assign('total_time', sprintf("<b>%01.2f segundos</b>", $total_time));
$smarty->assign('isRelated', $isRelated);
$smarty->assign('isImages', $isImages);

/**
 * Rotulo de la busqueda
 **/
if ($isRelated === TRUE) {
	if (isset($_GET["titulo"]) and !empty($_GET["titulo"])) {
		$rotuloTxt = urldecode($_GET["titulo"]);
	} else {
		$rotuloTxt = "la categoria ".$accion[1];
	}
} else if ($isImages === TRUE and !empty($query)) {
	$rotuloTxt = $accion[1];
} else {
	
	//$rotuloTxt = $queryWHSTOP;
	$rotuloTxt = htmlentities($query);
}
$smarty->assign("rotuloBuscar",$rotuloTxt);

/**
 * Si hay resultados los despliego
 **/
if($unBuscar->registrosTotal > 0) {
	
	$resultado = array();
	$pattern = "<b>**1</b>";
	$indexCat = $desdeId;

	while ($indexCat < $hastaId and $indexCat < $unBuscar->registrosTotal) {
		$articuloActual = $unBuscar->resultados[$indexCat];
		
		$q = sprintf("SELECT idcategoria as idarticulo, nombre as titulo, imagen, entradilla as resumen, descripcion as contenido, iddisplay FROM %s WHERE idcategoria = '%s'"
					, _TBLCATEGORIA
					, $articuloActual['idarticulo']);
		$r = $db->Execute($q) or errorQuery(__LINE__, __FILE__);
		$d = $r->fields;
		
		
		/**
		 * Existencia de la imagen
		 **/
		$imagenAux = '';
		if (!empty($d["imagen"])) {
			if (!is_file(_DIRIMAGES_USER.$d["imagen"])) {
				$imagenAux = '';
			} else {
				$imagenAux = $d["imagen"];
			}
		} 
		
		$titulo = replaceWords($queryWHSTOP, $pattern,$d["titulo"]);
		$migas = array();
		FuncionesInterfaz::Migas($d["idarticulo"], 1, $migas);
		$migas = array_reverse($migas);
		$hashSitio = substr(md5(_NOMBRESITIO), 0, 20);
		
		array_push($resultado, array( "idarticulo" => $d["idarticulo"]
									, "bidarticulo" => base64_encode($d["idarticulo"])
									, "encodeTitulo" => urlencode($d["titulo"])
									, "migas" => $migas
									, "titulo" => $titulo
									, "tituloSinTags" => trim(strip_tags($titulo))
									, "imagen" => $imagenAux 
									, "contenido" => ($d["iddisplay"] == 0) ? getMatchExcerpt($queryWHSTOP, $pattern, html_entity_decode($d["resumen"]." ".$d["contenido"])) : ""
									, "bsitio" => $hashSitio
									)
					);
		$indexCat++;
	}
	
	$smarty->assign("resultado", $resultado);
	
	/**
	 * Manejo de la Paginación
	 **/
	$smarty->assign("paginaActual", $paginaActual);
	
	
	if ($isRelated) {
		// $linkPag = "cadena_buscar=".$query."&amp;titulo=".urlencode($_GET["titulo"]);
		$linkPag = "cadena_buscar=".$query;
	} else {	
		$linkPag = "cadena_buscar=".urlencode($query);
	}
	
	$arrayPags = array();
	
	$cantDisplay = 10;
	$desdePag = $paginaActual - $cantDisplay;
	$hastaPag = $paginaActual + $cantDisplay;
	
	if ($desdePag < 1) {
		$desdePag = 1;
	} 
	if ($hastaPag > $unBuscar->numeroPaginas) {
		$hastaPag = $unBuscar->numeroPaginas;
	}
	$in = $desdePag;
	
	while($in >= $desdePag and $in <= $hastaPag) {
		array_push($arrayPags, array("id" => $in, "link" => $linkPag));
		$in++;
	}
	$smarty->assign('paginacion', $arrayPags);
	
	/**
	 * Manejo del siguiente y el anterior
	 **/
	
	if ($paginaActual > 1) {
		$smarty->assign('anterior', array("id" => $paginaActual - 1, "link" => $linkPag));
	}
	
	if ($paginaActual < $unBuscar->numeroPaginas) {
		$smarty->assign('siguiente', array("id" => $paginaActual + 1, "link" => $linkPag));
	}
	
} 
return $smarty->fetch('tpl_buscar2.html');
?>