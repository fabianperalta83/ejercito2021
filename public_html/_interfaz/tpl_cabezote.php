<?php
header("Content-Type: text/html;charset=utf-8");
/**
 * tpl_cabezote()
 * Maneja el template del cabezote según la plantilla
 */
define('_TBLSUBSITIO_GRAFICO', 'subsitio_grafico');// Carpetas con imagenes para usar en las páginas

function tpl_cabezote($tituloPagina, $idcategoria, $menuInstitucional) {
	// escogo el template que necesito
	$plantilla = substr(_PLANTILLA, 0, strlen(_PLANTILLA)-4);
	if (!preg_match('/^[a-zA-Z]+[0-9]+$/', $plantilla)) {
		return tpl_cabezote_nuevo($tituloPagina, $idcategoria, $menuInstitucional);
		break;
	} else {
		return tpl_cabezote_default($tituloPagina, $idcategoria, $menuInstitucional);
	}

}

/*
 *
 * tpl_cabezote_default()
 *
 * Template default
 *
 * @param _DIRRECURSOS
 * @param $tituloPagina
 * @return
 * */

function tpl_cabezote_default($tituloPagina, $idcategoria, $menuInstitucional) { 
	global $db;
	global $sroot;
	global $trazaCategoria;
	global $db;/** @see variables.php */

	$smarty = new Smarty_Plantilla;
	$smarty->assign('menuInstitucional', $menuInstitucional);

	/**
	 * Buscamos las utilidades según el root que sea
	 */

	if ($sroot == 1) {
	    echo "<script>EJC1</script>";
		$menuHerramientas = Funciones::BuscarHijos(2);
	} else {
		/**
		 * Busqueda de las utilidades del sistema
		 **/
		 echo "<script>EJC1</script>";
		$q1 = $db->prepare("SELECT idcategoria FROM "._TBLCATEGORIA." WHERE idpadre = ? AND nombre = ? AND eliminado = ?");
		$r1 = $db->Execute($q1, array($sroot, "Utilidades", 0)) or errorQuery(__LINE__, __FILE__);

		$menuHerramientas = array();
		if ($r1->NumRows() > 0) {
			$menuHerramientas = Funciones::BuscarHijos($r1->fields['idcategoria']);
		}
	}
	$smarty->assign('menuHerramientas', $menuHerramientas);

	$smarty->assign('anio', date("Y"));
	$smarty->assign('mes', date("n"));
	$smarty->assign('dia', date("j"));
	$smarty->assign('diasemana', date("w"));
	$smarty->assign('hora', date("G"));
	$smarty->assign('minuto', date("i"));
	$smarty->assign('segundo', date("s"));
	$smarty->assign('meridiano', date("a"));

	$smarty->assign('idcategoria', $idcategoria);
	$smarty->assign('unidadRoot', $sroot);
	$smarty->assign('tituloPagina', $tituloPagina);

	//Genera los cabezotes de las secciones
	$root   = Funciones::BuscarRoot($idcategoria);
	$banner = "";
	$foto   = "";

	$smarty->assign('tituloCategoria', empty($tituloCategoria)?$trazaCategoria[1]['nombre']:$tituloCategoria);
	list($ancho, $alto) = GetImageSize($banner);
	$smarty->assign('banneralto', $alto);
	$smarty->assign('cabezote_seccion', $banner);
	$smarty->assign('cabezote_foto', $foto);

	if (isset($_POST['enviar'])) {
		$letra  = isset($_POST['letra'])?$_POST['letra']:"";
		$tamano = isset($_POST['tamano'])?$_POST['tamano']:"";
		$zona   = isset($_POST['zona'])?$_POST['zona']:"";

		if ($letra == '') {
			$letra = 1;
		}
		if ($tamano == '') {
			$tamano = 1;
		}
		$_SESSION['personalizar']['zonas'] = $zona;
	} else {
		$smarty2->assign('letra', $_COOKIE["familiaFuenteNoticia"]);
		$smarty2->assign('tamano', $_COOKIE["tamanoFuenteNoticia"]);
		$smarty2->assign('zone', $_COOKIE["estiloZona"]);
	}

	$smarty->assign('personalizar', $smarty->fetch('tpl_personalizar.html'));

	return $smarty->fetch('tpl_cabezote.html');
}

function tpl_cabezote_nuevo($tituloPagina, $idcategoria, $menuInstitucional) {
	global $db;
	global $sroot;
	global $trazaCategoria;
	global $db;/** @see variables.php */

	$smarty  = new Smarty_Plantilla;
	$smarty2 = new Smarty_Plantilla;

	//	Fecaha de Actualizacion
	$sql = "	SELECT DATE_FORMAT(MAX(fecha3),'%Y-%m-%d') as max FROM categoria ";
	$rs  = $db->getone($sql) or errorQuery(__LINE__, __FILE__);
	$rs  = FuncionesInterfaz::datetotext($rs);
	$smarty->assign('fecha_ultima_actualizacion', $rs);

	$smarty->assign('menuInstitucional', $menuInstitucional);
	$smarty->assign('countmenuInstitucional' ,count($menuInstitucional));

	$idsmenu = "";
    foreach ($menuInstitucional as $key => $value) {
    	$idsmenu .= "-".$value['idcategoria'];
    }
    $smarty->assign('idsmenu'			, substr($idsmenu,1));

	/**
	 * Buscamos las utilidades según el root que sea
	 */
	 
	if ($sroot == 1) {
		$menuHerramientas = Funciones::BuscarHijos(2);
		$menuIdiomas      = Funciones::BuscarHijos(216741);
	} else {
		/**
		 * Busqueda de las utilidades del sistema
		 **/
		$q1 = $db->prepare("SELECT idcategoria FROM "._TBLCATEGORIA." WHERE idpadre = ? AND nombre = ? AND eliminado = ?");
		$r1 = $db->Execute($q1, array($sroot, "Utilidades", 0)) or errorQuery(__LINE__, __FILE__);

		$q2 = $db->prepare("SELECT idcategoria FROM "._TBLCATEGORIA." WHERE idpadre = ? AND nombre = ? AND eliminado = ?");
		$r2 = $db->Execute($q2, array($sroot, "Idiomas", 0)) or errorQuery(__LINE__, __FILE__);

		$menuHerramientas = array();
		if ($r1->NumRows() > 0) {
			$menuHerramientas = Funciones::BuscarHijos($r1->fields['idcategoria']);
		}
		$menuIdiomas = array();
		if ($r2->NumRows() > 0) {
			$menuIdiomas = Funciones::BuscarHijos($r2->fields['idcategoria']);
		}

	}
	$smarty->assign('menuHerramientas', $menuHerramientas);
	$smarty->assign('menuIdiomas', $menuIdiomas);
	$smarty->assign('anio', date("Y"));
	$smarty->assign('mes', date("n"));
	$smarty->assign('dia', date("j"));
	$smarty->assign('diasemana', date("w"));
	$smarty->assign('hora', date("G"));
	$smarty->assign('minuto', date("i"));
	$smarty->assign('segundo', date("s"));
	$smarty->assign('meridiano', date("a"));

	$smarty->assign('idcategoria', $idcategoria);
	$smarty->assign('unidadRoot', $sroot);
	$smarty->assign('tituloPagina', $tituloPagina);

	if (defined("_SIDIOMAS") && _SIDIOMAS != '') {
		$queryHijos  = $db->prepare("SELECT * FROM "._TBLCATEGORIA." WHERE activa != ? AND idpadre = ?");
		$resultHijos = $db->Execute($queryHijos, array(0, trim(_SIDIOMAS))) or errorQuery(__LINE__, __FILE__);

		if ($resultHijos->NumRows() > 0) {
			//			Hijos de Seccion destacada
			$hijoDestacado = array();
			while (!$resultHijos->EOF) {
				$data = $resultHijos->fields;
				array_push($hijoDestacado, $data);
				$resultHijos->MoveNext();
			}
			$smarty->assign('idiomas', $hijoDestacado);
		}
	}

	////*****   MODULO  ADMINISTRACION BANNER HOME *****////
	$fecha_servidor = date("Y-m-d");
	$queryBanner    = $db->prepare("SELECT * FROM "._TBLSUBSITIO_GRAFICO." WHERE subsitio_grafico_fecini <= ? AND subsitio_grafico_fecfin >= ? order by subsitio_grafico_fecini DESC LIMIT ?");
	$r              = $db->Execute($queryBanner, array($fecha_servidor, $fecha_servidor, 1)) or errorQuery(__LINE__, __FILE__);

	if ($r->NumRows() == 0) {
		//Traer banner por defecto
		$consulta = $db->prepare("SELECT * FROM "._TBLSUBSITIO_GRAFICO." WHERE subsitio_grafico_defecto = ? ORDER BY subsitio_grafico_fecini DESC LIMIT ?");
		$r        = $db->Execute($consulta, array("SI", 1)) or errorQuery(__LINE__, __FILE__);
	}

	if (_ROTABANNER == '1') {
		$queryBanner = $db->prepare("SELECT * FROM "._TBLSUBSITIO_GRAFICO." WHERE subsitio_grafico_fecini <= ? AND subsitio_grafico_fecfin >= ? order by subsitio_grafico_fecini DESC");
		$r           = $db->Execute($queryBanner, array($fecha_servidor, $fecha_servidor)) or errorQuery(__LINE__, __FILE__);

		if ($r->NumRows() == 0) {
			$consulta = $db->prepare("SELECT * FROM "._TBLSUBSITIO_GRAFICO." WHERE subsitio_grafico_defecto = ? ORDER BY subsitio_grafico_fecini DESC LIMIT ?");
			$r        = $db->Execute($consulta, array("SI", 1)) or errorQuery(__LINE__, __FILE__);
		}

		$banners = $r?$r->GetRows():array();
		$smarty->assign('banners', $banners);
		$smarty->assign('const', _ROTABANNER);
		$arreglo23 = array("0", "1", "2", "3", "4", "5", "6", "7"); 
		$smarty->assign('arreglo23', $arreglo23);
	}

	if(defined('_HOME_SLIDER') && _HOME_SLIDER != ""){ 
        $select_slider = sprintf("SELECT idcategoria, nombre, imagen, autor FROM categoria WHERE idcategoria IN (%s) AND activa = 1 AND eliminado = 0 ORDER BY fecha1 DESC", _HOME_SLIDER);
        $result_slider = $db->GetAll($select_slider);

        $smarty->assign('slider', $result_slider);
    }else{
        $imagen_default = _DIRIMAGES."subsitio/slider/photoslider_default.jpg";
        $slider = array('idcategoria' => $idcategoria, 'nombre' => $trazaCategoria[$idcategoria]['nombre'], 'imagen' => $imagen_default);
        $smarty->assign('slider_default', $slider);
    }

	$smarty->assign('link_banner', $r->fields['subsitio_grafico_link']);
	$smarty->assign('ruta_banner', $r->fields['subsitio_grafico_ruta']);
	$smarty->assign('descripcion_banner', $r->fields['subsitio_grafico_descripcion']);
	$smarty->assign('type', $r->fields['type']);

	//***   FIN CODIGO MODULO ADMINISTRACIÓN BANNER HOME  *****////

	//Genera los cabezotes de las secciones
	$root   = Funciones::BuscarRoot($idcategoria);
	$banner = "";
	$foto   = "";

	$smarty->assign('tituloCategoria', empty($tituloCategoria)?$trazaCategoria[1]['nombre']:$tituloCategoria);
	list($ancho, $alto) = (trim($banner) != '')?GetImageSize($banner):array(0, 0);
	$smarty->assign('banneralto', $alto);
	$smarty->assign('cabezote_seccion', $banner);
	$smarty->assign('cabezote_foto', $foto);

	//	Si es home se pone flash
	if (Funciones::BuscarRoot($idcategoria) == $idcategoria) {
		$smarty->assign('esHome', TRUE);
	}

	$smarty2->assign('column', 1);
	$smarty2->assign('letra', 1);
	$smarty2->assign('colo', 1);

	/**
	 * Miramos si existe un usuario en el momento
	 */
	if (isset($_SESSION['info_usuario']) and $_SESSION['info_usuario']["activo"] == 1) {
		$smarty->assign('hayUsuario', TRUE);
		$smarty->assign('infoUsuario', $_SESSION['info_usuario']);
		$smarty->assign('modoEdicion', $_SESSION['modo_edicion'] && $_SESSION['modo_edicion_aprovado']);
	}

	//consulto la tabla relacion de banners y levanto una session con el dato segun el sitio consultado
	$query1 = sprintf("SELECT * FROM rel_banners WHERE idcategoria=%s", $root);
	$result = $db->Execute($query1);

	//ahora se hara el nuevo funcionamiento del cabezote para la pagina del ejercito nacional
	//debo consultar los cabezotes para el sitio qu se este visitando
	$cabezotes = $db->prepare("SELECT * FROM banners WHERE idcategoria = ? AND activo = ? AND eliminado = ? and tipo = ?");
	$resultado = $db->Execute($cabezotes, array($root, 1, 0, $result->fields['tipo']));
	$banners   = array();
	if ($resultado->_numOfRows > 0) {
		if ($result->fields['tipo'] == 1) {
			while (!$resultado->EOF) {
				array_push($banners, $resultado->fields);
				$resultado->MoveNext();
			}
			$random         = rand(0, (count($banners)-1));
			$banner_asignar = $banners[$random]['banner'];
		} else {
			while (!$resultado->EOF) {
				array_push($banners, $resultado->fields);
				$resultado->MoveNext();
			}
			$random         = rand(0, (count($banners)-1));
			$banner_asignar = $banners[$random]['banner'];
		}
	} else {
		$banner_asignar = 'imgBanner.jpg';
	}

	$smarty->assign('tipo', $result->fields['tipo']);
	$smarty->assign('banner', $banner_asignar);

	if (isset($_POST['enviar'])) {
		$letra  = isset($_POST['letra'])?$_POST['letra']:"";
		$tamano = isset($_POST['tamano'])?$_POST['tamano']:"";
		$zona   = isset($_POST['zona'])?$_POST['zona']:"";

		if ($letra == '') {
			$letra = 1;
		}
		if ($tamano == '') {
			$tamano = 1;
		}
		if ($zona == '') {
			$zona = 1;
		}

		$_SESSION['personalizar']['zonas'] = $zona;

		$smarty2->assign('letra', $letra);
		$smarty2->assign('tamano', $tamano);
		$smarty2->assign('zona', $zona);

	} else {
		$smarty2->assign('letra', (isset($_COOKIE["familiaFuenteNoticia"])?$_COOKIE["familiaFuenteNoticia"]:''));
		$smarty2->assign('tamano', (isset($_COOKIE["tamanoFuenteNoticia"])?$_COOKIE["tamanoFuenteNoticia"]:''));
		$smarty2->assign('zone', (isset($_COOKIE["estiloZona"])?$_COOKIE["estiloZona"]:''));
	}

	// Nueva condición :: Se definen estas cookies para que no saliera warning o undefined en PHP
	if (isset($_COOKIE['familiaFuenteNoticia']) and isset($_COOKIE["tamanoFuenteNoticia"]) and isset($_COOKIE["estiloZona"])) {
		$smarty2->assign('letra', $_COOKIE["familiaFuenteNoticia"]);
		$smarty2->assign('tamano', $_COOKIE["tamanoFuenteNoticia"]);
		$smarty2->assign('zone', $_COOKIE["estiloZona"]);
	}

	//   FUNCION CARGAR IMAGENES EN EL HOME PARA EL BANNER ESCUELAS
	if (defined('_IMAGEN_BANNER_PRINCIPAL')) {
		if (_IMAGEN_BANNER_PRINCIPAL != '') {
			if (defined('_PLANTILLA') && _PLANTILLA == 'Cemil_2012' || _PLANTILLA == 'Emsub_2012' || _PLANTILLA == 'PRIMERADIVISION2013' || _PLANTILLA == 'TERCERA_DIVISION2013'
				 || _PLANTILLA == 'SEGUNDA_DIVISION2013' || _PLANTILLA == 'CUARTA_DIVISION2013' || _PLANTILLA == 'QUINTA_DIVISION2013' || _PLANTILLA == 'SEXTA_DIVISION2013'
				 || _PLANTILLA == 'SEPTIMA_DIVISION2013' || _PLANTILLA == 'OCTAVA_DIVISION2013' || _PLANTILLA == 'DAAVA-2013' || _PLANTILLA == 'INGLES2013'
				 || _PLANTILLA == 'EMSUB_2013' || _PLANTILLA == 'BRIGADACONTRA_NARCOTRAFICO2013' || _PLANTILLA == 'CEMIL_2013' || _PLANTILLA == 'ALEMAN_2013'
				 || _PLANTILLA == 'FRANCES_2013' || _PLANTILLA == 'PORTUGUES_2013' || _PLANTILLA == 'ESCOM_2013' || _PLANTILLA == 'BRIGADA27_2013' || _PLANTILLA == 'BRIGADA_LOGISTICA-2013'
				 || _PLANTILLA == 'JEFATURA_DDHH_2013' || _PLANTILLA == 'RECLUTAMIENTO2013' || _PLANTILLA == 'BRIGADA_COMUNICACIONES_2013' || _PLANTILLA == 'BATALLON_MANTENIMIENTO-2013'
				 || _PLANTILLA == 'ESAVE2013' || _PLANTILLA == 'BATALLON_INTENDENCIA2013' || _PLANTILLA == 'JEFATURA_FAMILIA2013' || _PLANTILLA == 'FUERZA_COMANDO_2014'
				 || _PLANTILLA == 'ESMAI_2013' || _PLANTILLA == 'ESING-2013' || _PLANTILLA == "ESCEQ-2013" || _PLANTILLA == "ESCAB-2013" || _PLANTILLA == "CENAE-2013"
				 || _PLANTILLA == "ESPRO-2013" || _PLANTILLA == "ESCUELA_JURIDICA2013" || _PLANTILLA == "MINERVA" || _PLANTILLA == "CENTRO_MINAS" || _PLANTILLA == "FUERTE_MILITAR" || _PLANTILLA == "ESPOM2013" || _PLANTILLA == "Obra_Social_Infanteria_2016" || _PLANTILLA == "Jedoc_2016" || _PLANTILLA == "Obra_Social_Infanteria_2016_Seccion_II" || _PLANTILLA == "Fuerza_Militar_Tolemaida_2016" || _PLANTILLA == "Coper_2016" || _PLANTILLA == "Escuela_logistica_2016" || _PLANTILLA == "centro_minas_2016" || _PLANTILLA == "Ejercito_Ingles_2016"
				 || _PLANTILLA == "escuela_armas_2016" || _PLANTILLA == "cotef_2016" || _PLANTILLA == "inteligencia_contra_inteligencia_2016" || _PLANTILLA == "centro_estudios_2016" || _PLANTILLA == "Desminado_2016" || _PLANTILLA == "Derechos_humanos_2016" || _PLANTILLA == "Coing_2016" || _PLANTILLA == "Emisora_Ejercito_2017" || _PLANTILLA == "Cedoc_2017" || _PLANTILLA == "Artilleria_2017" || _PLANTILLA == "Brcom_2017" || _PLANTILLA == "Cemil_2017" || _PLANTILLA == "Cotef_2017" || _PLANTILLA == "Eas_2017" || _PLANTILLA == "Esdih_2017" || _PLANTILLA == "Esici_2017" || _PLANTILLA == "Reclutamiento_2017" || _PLANTILLA == "Esmai_2017") {
				$catfotos = preg_replace('/[^0-9\,]/i', '', _IMAGEN_BANNER_PRINCIPAL);
				$catfotos = str_replace(',,', ',', $catfotos);

				$query = sprintf("SELECT idcategoria, nombre, IF (autor = '', 'javascript:;', autor) AS autor,imagen,descripcion FROM categoria WHERE activa = 1 AND eliminado = 0 AND idcategoria IN (%s) ORDER BY fecha1 DESC ", $catfotos);

				$imagenes_banner = $db->GetAll($query);

				$smarty->assign('imagen_banner', $imagenes_banner);
			}
		}
	}
	$smarty->assign('personalizar', $smarty2->fetch('tpl_personalizar.html'));

	/**************    CABEZOTE SUBSITIOS 2017 - Plantilla Unica **************/
	if (_PLANTILLA == "Default_Subsitio") {
		//Busca el logo del subsitio
		$select_logo = $db->prepare("SELECT nombre, imagen FROM categoria WHERE idcategoria = ? ");
		$result_logo = $db->Execute($select_logo, array(_SINICIO));

		if ($result_logo->fields['imagen'] != "") {
			$smarty->assign('logo_subsitio', $result_logo->fields['imagen']);
		} else {
			$smarty->assign('logo_default', _DIRIMAGES."/subsitio/cabezote/logo_default.png");
		}

		if (strlen($result_logo->fields['nombre']) > 40) {
			$smarty->assign('estilo_nombre', "1");
		}

		$smarty->assign('nombre_subsitio', stripslashes($result_logo->fields['nombre']));

	}

	/************** FIN CABEZOTE SUBSITIOS 2017 - Plantilla Unica **************/


	/**************  CABEZOTE HOME 2018  **************/
	if (defined('_PLANTILLA') && _PLANTILLA == 'DEFAULT2018') {
		if (file_exists(_DIRTEMPLATE_REL."templates/tpl_navegacion_institucional.html")){
	        $smarty->assign('navegacion_institucional'    , $smarty->fetch('tpl_navegacion_institucional.html'));
	    }

	    if (defined("_HOME_SLIDE") && _HOME_SLIDE != ''){
	        $query = sprintf("SELECT idcategoria, nombre, imagen FROM %s WHERE idpadre = %s AND eliminado = 0 AND activa = 1 ORDER BY orden ASC LIMIT 10", _TBLCATEGORIA, _HOME_SLIDE);
	        $slide_home = $db->GetAll($query);
	        $smarty->assign('slide_home', $slide_home);
	    }

	    FuncionesInterfaz::Migas($idcategoria,$smenu, $rutetoroot);
		if(count($rutetoroot) > 1){
			$rutetoroot = array_reverse($rutetoroot);
			$smarty->assign('rutetoroot',$rutetoroot);
		}
	}
	/**************  FIN CABEZOTE HOME 2018  **************/

	/**************  CABEZOTE SUBSITIOS 2018 **************/
	if (_PLANTILLA == "Subsitio2018") {
		//Busca el logo del subsitio
		$select_logo = $db->prepare("SELECT nombre, imagen FROM categoria WHERE idcategoria = ? ");
		$result_logo = $db->Execute($select_logo, array(_SINICIO));

		if ($result_logo->fields['imagen'] != "") {
			$smarty->assign('logo_subsitio', $result_logo->fields['imagen']);
		} else {
			$smarty->assign('logo_default', _DIRIMAGES."/subsitio/cabezote/logo_default.png");
		}

		if (strlen($result_logo->fields['nombre']) > 40) {
			$smarty->assign('estilo_nombre', "1");
		}

		$smarty->assign('nombre_subsitio', stripslashes($result_logo->fields['nombre']));

		if (file_exists(_DIRTEMPLATE_REL."templates/tpl_navegacion_institucional.html")){
	        $smarty->assign('navegacion_institucional'    , $smarty->fetch('tpl_navegacion_institucional.html'));
	    }

	    if (defined("_HOME_SLIDE") && _HOME_SLIDE != ''){
	       	

	        $query = sprintf("SELECT idcategoria, nombre, imagen,autor FROM %s WHERE idpadre = %s AND eliminado = 0 AND activa = 1 ORDER BY orden DESC LIMIT 10", _TBLCATEGORIA, _HOME_SLIDE);
	        $slide_home = $db->GetAll($query);
	        $smarty->assign('slide_home', $slide_home);

	        
			$queryBanner    =sprintf("SELECT * FROM subsitio_grafico WHERE global1 = 1 order by orden DESC LIMIT 10");
			$r              = $db->GetAll($queryBanner);

			$smarty->assign('slide_home1', $r);
			$arreglo234 = array("0", "1", "2", "3", "4", "5", "6", "7"); 
			$smarty->assign('arreglo234', $arreglo234);
	    }

	    FuncionesInterfaz::Migas($idcategoria,$smenu, $rutetoroot);
		if(count($rutetoroot) > 1){
			$rutetoroot = array_reverse($rutetoroot);
			// echo "<pre>"; var_dump(end($rutetoroot)); echo "</pre>";
			$smarty->assign('rutetoroot',end($rutetoroot));
		}


		if(defined("VIDEO_BANNER_YOUTUBE") && VIDEO_BANNER_YOUTUBE != ''){

                $consulta4  =   sprintf("SELECT * FROM categoria where idcategoria =  '%s' LIMIT 1",VIDEO_BANNER_YOUTUBE);        
                $resultado4 =   $db->GetAll($consulta4);

                //$smarty->assign('NOCHE_HEROES'    , $resultado3);

                foreach ($resultado4 as $key => $value) {



                    $smarty->assign('_video_banner1', $value["descripcion"]);
                   


                }
            }


	}


	return $smarty->fetch('tpl_cabezote.html');
}

?>
