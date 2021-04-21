<?php
//Funcion de presentacion de la plantilla de Home

header("Content-Type: text/html;charset=utf-8");

function TemplateHome() 
{
    global $template;
    global $idcategoria;

    $plantilla		= _PLANTILLA;//_PLANTILLA;substr(_PLANTILLA,0,strlen(_PLANTILLA)-4);


    if(preg_match('/^[a-zA-Z_-]+[0-9]{4}$/',$plantilla))
    {
        return TemplateHomeNuevo();
    }
    elseif(preg_match('/^(Revista)$/',$plantilla))
    {
        return TemplateHomeRevista();
    }
    else
    { 
        return TemplateHomeDefault();
    }
}


function TemplateHomeRevista() 
{
    global $db;	/** @see variables.php */
    global $idcategoria;
    global $trazaCategoria;

    $smarty = new Smarty_Plantilla;
    // Cambio # 1
    $query = $db->prepare("SELECT * FROM "._TBLCATEGORIA." WHERE activa != ? AND idpadre = ? ORDER BY orden ASC");
    $result = $db->Execute($query, array(0, $idcategoria)) /* or errorQuery(__LINE__, __FILE__) */;

    if ($result->NumRows() > 0) {
        $d = $result->fields;
        $contenido = $d["descripcion"];

        /**
		 * Limpiando contenido
		 **/
        $contenido = str_replace(' ', '', $contenido);
        $contenido = explode(',', $contenido);
        $arraySecciones = array();

        while(!$result->EOF) {

            //$seccion = explode('#', $seccionActual);
            $parametros	= count($result);
            //$seccionBuscar = $seccion[0];

            $cantidad	= 3;
            $conresumen = 1;

            switch ($parametros){
                case 2 :
                    $cantidad	= $seccion[1];
                    break;
                case 3 :
                    $conresumen	= $seccion[2];
                    $cantidad	= $seccion[1];
                    break;
            }

            /**
			*	Verifica que la categoria escogida este activa
			**/

            $queryActiva = $db->prepare("SELECT activa,idcategoria FROM "._TBLCATEGORIA." WHERE idcategoria = ? ORDER BY orden ASC");
            $resultActiva = $db->Execute($queryActiva, array($result->fields['idcategoria'])) /* or errorQuery(__LINE__, __FILE__) */;

            if ($resultActiva->NumRows() > 0 && $resultActiva->fields['activa'] == 1)
            {
                /**
				 * Buscando los hijos de la seccion elegida
				 **/
                $queryHijos = sprintf("SELECT * FROM %s WHERE activa != 0 AND idcategoria = '%s' ORDER BY orden ASC" , _TBLCATEGORIA , $resultActiva->fields['idcategoria']);
                $resultHijos = $db->SelectLimit($queryHijos, $cantidad) /* or errorQuery(__LINE__, __FILE__) */;

                if ($resultHijos->NumRows() > 0) {

                    /**
					 *  Buscando info de la seccion elegida
					 **/
                    $querySeccion = $db->prepare("SELECT * FROM "._TBLCATEGORIA." WHERE activa != ? AND idpadre = ? ORDER BY orden ASC");
                    $resultSeccion = $db->Execute($querySeccion, array(0, $resultHijos->fields['idcategoria'])) /* or errorQuery(__LINE__, __FILE__) */;
                    $dSeccion = $resultSeccion->fields;

                    $arraySeccionActual = $dSeccion;
                    $arraySeccionActual['cantidad'] = $cantidad - 1;
                    $arraySeccionActual['conresumen'] = $conresumen < $cantidad ? $conresumen : $cantidad;
                    $arraySeccionActual['sinresumen'] = $resultHijos->NumRows() - $arraySeccionActual['conresumen'];

                    /**
					 * Sacando la informacion de los hijos
					 **/
                    $arrayhijos = array();

                    while(!$resultHijos->EOF) {
                        $dHijos = $resultHijos->fields;

                        $auxHijos = array();
                        $auxHijos['idcategoria'] = $dHijos['idcategoria'];
                        $auxHijos['nombre'] = $dHijos['nombre'];
                        $auxHijos['subtitulo'] = $dHijos['subtitulo'];
                        $auxHijos['cuenta'] = strlen($dHijos['nombre']);
                        $auxHijos['resumen'] = stripslashes($dHijos['entradilla']);
                        $auxHijos['contenido'] = stripslashes($dHijos['descripcion']);
                        $auxHijos['imagen'] = $dHijos['imagen'];
                        $auxHijos['autor'] = $dHijos['autor'];
                        $auxHijos['fecha'] = $dHijos['fecha1'];
                        $auxHijos['antetitulo'] = $dHijos['antetitulo'];
                        $fecha3 = explode(" ",date("Y-m-d h:i a",strtotime($dHijos['fecha3'])) );
                        $auxHijos['fecha3'] = $fecha3[1].' '.$fecha3[2] ;
                        array_push($arrayhijos, $auxHijos);

                        $resultHijos->MoveNext();
                    }

                    $arraySeccionActual['hijos'] = $arrayhijos;
                    array_push($arraySecciones, $arraySeccionActual);
                }
            }
            $result->MoveNext();
        }

        /**
		 * Informacion de Top 5
		 */

        /**
		 * papa de Top 5
		 */
        global $idcategoria;

        if ($idcategoria==430)
        {
            $query = $db->prepare("SELECT idcategoria, nombre FROM "._TBLCATEGORIA." WHERE activa != ? AND idcategoria = ? ");
            $result = $db->Execute($query, array(0, 94728)) /* or errorQuery(__LINE__, __FILE__) */;

            if ($result->NumRows() > 0) {

                $smarty->assign('tituloTop', $result->fields['nombre']);
                $smarty->assign('idcategoriaTop', $result->fields['idcategoria']);

                /**
				 * hijos de Top 5
				 */
                $top5 = array();
                define('max_cat', 5);
                $query = sprintf("SELECT idcategoria, nombre, entradilla, subtitulo, imagen,antetitulo FROM %s WHERE activa != 0 AND idpadre = %s ORDER BY idcategoria DESC" , _TBLCATEGORIA , 94728);
                $result = $db->SelectLimit($query, max_cat) /* or errorQuery(__LINE__, __FILE__) */;

                if ($result->NumRows() > 0) {
                    while(!$result->EOF) {
                        $data = $result->fields;
                        array_push($top5, $data);
                        $result->MoveNext();
                    }
                }
                $smarty->assign('top5', $top5);
            }

        }


        $smarty->assign('secciones', $arraySecciones);
        $smarty->assign('resumen', stripslashes($d["entradilla"]));

    }

    // /*** Verifica si existe el flash foto_noticia.swf ***/
    // if (file_exists("recursos_foto_noticia/foto_noticias.swf")){
    //     $smarty->assign('archivo_flash', true);
    // }else{
    //     $smarty->assign('archivo_flash', false);
    // }
    // /*** Verifica si existe el flash foto_noticia_ingles.swf ***/
    // if (file_exists("recursos_foto_noticia/foto_noticias_ingles.swf")){
    //     $smarty->assign('archivo_flash_ingles', true);
    // }else{
    //     $smarty->assign('archivo_flash_ingles', false);
    // }
    // /*** Verifica si existe el flash foto_noticia_frances.swf ***/
    // if (file_exists("recursos_foto_noticia/foto_noticias_frances.swf")){
    //     $smarty->assign('archivo_flash_frances', true);
    // }else{
    //     $smarty->assign('archivo_flash_frances', false);
    // }

    /**** Parte del Usuario ****/
    if (isset($_SESSION['info_usuario'])) {
        $smarty -> assign('homeUsuario',	FuncionesInterfaz::homeUsuario());
        $smarty -> assign('existsUsuario',	TRUE);
    }
    $smarty->assign('infoPrincipal', $trazaCategoria[$idcategoria]);
    $smarty->assign('idcategoria', $idcategoria);

    return $smarty -> fetch('tpl_home.html');
}

function TemplateHomeDefault() 
{
    global $db;	/** @see variables.php */
    global $idcategoria;
    global $trazaCategoria;
    $home	=	new ejercito();

    $smarty = new Smarty_Plantilla;

    $query = $db->prepare("SELECT * FROM "._TBLCATEGORIA." WHERE activa != ? AND idcategoria = ? ");
    $result = $db->Execute($query, array(0, $idcategoria)) /* or errorQuery(__LINE__, __FILE__) */;
    $smarty->assign('es_algo', "info");

    if ($result->NumRows() > 0) {
        $d = $result->fields;
        $contenido = $d["descripcion"];
        $arraySecciones = $home->nuevoHome($contenido);
        $smarty->assign('secciones', $arraySecciones);
        $smarty->assign('es_root', "root".$d["es_root"]);
        $smarty->assign('resumen', stripslashes($d["entradilla"]));
        $smarty->assign('datosCategoria',$d);
    }
    
    if(defined('__TELEVISOR') and __TELEVISOR!='')
    {
        //creo la consulta que me traera el contenido de la categoria seleccionada
        $consulta_televisor		=	$db->prepare("select * from categoria where idcategoria= ?");
        $TELEVISOR = __TELEVISOR;
        //ejecuto la consulta
        $resultado_televisor	=	$db->Execute($consulta_televisor, array($TELEVISOR));
        $smarty->assign('video'		, $resultado_televisor->fields['descripcion']);
        $smarty->assign('imagen'		, $resultado_televisor->fields['imagen']);
        $smarty->assign('titulo'		, $resultado_televisor->fields['nombre']);
        $smarty->assign('categoria'		, $resultado_televisor->fields['idcategoria']);

    }

    ////////////////////////PINTA EL FUNCIONAMIENTO DE LAS IMAGENES DESTACADAS//////////////////////////
    if(defined('__IMAGENES') and __IMAGENES!='')
    {
        //traigo los hijos de la categoria correspondiente
        $resultado_imagenes		=	$home->separaDatos(__IMAGENES,'0');
        //traigo el nombre de la categoria padre
        $nombre_padre_imagenes	=	$home->NombrePadre(__IMAGENES);
        $smarty->assign('imagenes'					, $resultado_imagenes);
        $smarty->assign('galeria_imagen'            , $resultado_imagenes);
        $smarty->assign('nombre_padre_imagenes'		, $nombre_padre_imagenes);
    }

    ////////////////////////PINTA EL FUNCIONAMIENTO DE LOS RESUMENES CENTRALES//////////////////////////
    if(defined('__LADOFOTONOTICIA') and __LADOFOTONOTICIA!='')
    {
        //traigo los hijos de la catergria correspondiente
        $resultado_principales		=	$home->separaDatos(__LADOFOTONOTICIA,'0');
        //traigo el nombre de la categoria padre
        $nombre_padre_principales	=	$home->nuevoHome(__LADOFOTONOTICIA);
        $id_padre_principales	=	$home->nuevoHome(__LADOFOTONOTICIA);
        $smarty->assign('resumenes_centrales'					, $resultado_principales);
        $smarty->assign('nombre_padre_resumenes_centrales'		, $nombre_padre_principales[0]['nombre']);
        $smarty->assign('id_padre_resumenes_centrales'		    , $id_padre_principales[0]['idcategoria']);
    }

    ////////////////////////PINTA EL LADO DERECHO DE LOS SUBSITIOS//////////////////////////
    if(defined('_SECCION_DERECHA') and _SECCION_DERECHA!='')
    {
        //traigo los hijos de la catergria correspondiente
        $resultado_hijos		=	$home->separaDatos(_SECCION_DERECHA."#3#3",'0');
        //traigo el nombre de la categoria padre
        $nombre_padre	=	$home->nuevoHome(_SECCION_DERECHA);
        $id_padre	=	$home->nuevoHome(_SECCION_DERECHA);
        $smarty->assign('seccion_hijos'					, $resultado_hijos);
        $smarty->assign('nombre_padre'		, $nombre_padre[0]['nombre']);
        $smarty->assign('id_padre'		    , $id_padre[0]['idcategoria']);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////
    $constante = '__RECOMENDADOS';
    //echo (defined($constante))?"buena constante":"mala";
    $parametros = '';
    eval("\$parametros = $constante;");
    //echo $parametros;

    function algo($constante, &$funcionesHome, &$smarty)
    {
        if(! defined($constante) ) return false;
        eval("\$parametros = $constante;");
        if($parametros=='' ) return false;

        //Informacion sobre la categoria
        $categoria	    =	$funcionesHome->NombrePadre($parametros);
        //Traemos los hijos
        $hijos		    =	$funcionesHome->separaDatos($parametros,'0');


        $smarty->assign('recomendados'					, $hijos);
        $smarty->assign('nombre_padre_recomendados'		, $categoria);
        return true;
    }
    algo('__RECOMENDADOS',$home, $smarty);
    ////////////////////////////////////////////////////////////////////////////

    /**
	 * Foto Noticia
	 */

    if(defined('_FOTONOTICIA'))
    {
        if(_FOTONOTICIA != '')
        {
            //realizo un explode de la constante fotonoticia para sacar cuantas viene en realidad
            $cantidad	= explode(',',_FOTONOTICIA);
            //xxx
            $cuenta		=	count($cantidad);
            $cont		=	1;
            $arreglo_paginas	=	array();
            foreach($cantidad as $datos)
            {
                //realizo la consulta de las correspondientes categorias para traer el titulo y pintarlo en el tool tip text de las paginas de la fotonoticia
                $consulta_titulo	=	$db->prepare("SELECT nombre FROM categoria WHERE idcategoria= ?");
                $titulo				=	$db->Execute($consulta_titulo, array($datos));
                $paginas	=	array('page'=>$cont,
                                      'cat'=>$datos,
                                      'titulo'=>$titulo->fields['nombre']);
                array_push($arreglo_paginas,$paginas);
                $cont++;
            }

            $smarty->assign('fotonoticia',true);
            $smarty->assign('cantidad',$arreglo_paginas);
            $smarty->assign('fotonoticia_categorias',_FOTONOTICIA);

        }
    }

    ////////////////////////////////////////////////////////////////////////////

    /*** Verifica si existe el flash foto_noticia.swf ***/

    // if (file_exists("recursos_foto_noticia/foto_noticias.swf")){
    //     $smarty->assign('archivo_flash', true);
    // }else{
    //     $smarty->assign('archivo_flash', false);
    // }
    // /*** Verifica si existe el flash foto_noticia_ingles.swf ***/
    // if (file_exists("recursos_foto_noticia/foto_noticias_ingles.swf")){
    //     $smarty->assign('archivo_flash_ingles', true);
    // }else{
    //     $smarty->assign('archivo_flash_ingles', false);
    // }
    // /*** Verifica si existe el flash foto_noticia_frances.swf ***/
    // if (file_exists("recursos_foto_noticia/foto_noticias_frances.swf")){
    //     $smarty->assign('archivo_flash_frances', true);
    // }else{
    //     $smarty->assign('archivo_flash_frances', false);
    // }

    /**** Parte del Usuario ****/
    if (isset($_SESSION['info_usuario'])) {
        $smarty -> assign('homeUsuario',	FuncionesInterfaz::homeUsuario());
        $smarty -> assign('existsUsuario',	TRUE);
    }
    $smarty->assign('infoPrincipal', $trazaCategoria[$idcategoria]);
    $smarty->assign('idcategoria', $idcategoria);

    /*
	 * Subsitio: ingenieros militares
	 * */
    try{
        $smarty->assign('carrusel_vertical' , $smarty->fetch('tpl_carrusel_vertical.html'));
    }catch(Exception $e)
    {}
 
    /**************    CABEZOTE SUBSITIOS 2017 - Plantilla Unica **************/
    if(defined('_HOME_SLIDER') && _HOME_SLIDER != ""){ 
       	$select_slider = sprintf("SELECT idcategoria, nombre, imagen, autor FROM categoria WHERE idpadre= %s AND activa = 1 AND eliminado = 0 ORDER BY fecha1 DESC", _HOME_SLIDER);
        $result_slider = $db->GetAll($select_slider);


        $smarty->assign('slider', $result_slider);
    }else{
        $imagen_default = _DIRIMAGES."subsitio/slider/photoslider_default.jpg";
        $slider = array('idcategoria' => $idcategoria, 'nombre' => $trazaCategoria[$idcategoria]['nombre'], 'imagen' => $imagen_default);
        $smarty->assign('slider_default', $slider);
    }

    // if(defined('_HOME_VIDEOS') && _HOME_VIDEOS != ""){ 
    //     $select_videos = sprintf("SELECT idcategoria, nombre, descripcion, autor FROM categoria WHERE idpadre = %s AND activa = 1 AND eliminado = 0 order by fecha1 DESC LIMIT 3", _HOME_VIDEOS);
    //     $result_videos = $db->GetAll($select_videos);

    //     $videos = array();
    //     foreach ($result_videos as $key => $value) {
    //         $array_tipo_video   = explode(".", $value["descripcion"]);
    //         $tipo_video         = end($array_tipo_video);

    //         $videos[$key] = array(  'idcategoria'   => $value["idcategoria"]
    //                                 ,'video'        => html_entity_decode(str_replace('\"', '"',$value["descripcion"]))
    //                                 ,'nombre'       => $value["nombre"]
    //                                 ,'imagen'       => $value["imagen"]
    //                                 ,'tipo_video'   => $tipo_video
    //                                 ,'url'          => $value["autor"]
    //                                 ,'img'          => get_youtube_id($value["descripcion"])
    //                               );
    //     } 
    //     $smarty->assign('videos',$videos);
    // }

    if(defined('_HOME_NOTICIAS') && _HOME_NOTICIAS != ""){ 
        // ini_set("display_errors", 1);

        $consultar_orden = sprintf("SELECT orden_sub FROM categoria WHERE idcategoria = %s LIMIT 1", _HOME_NOTICIAS);
        $ejecutar_consultar_orden = $db->getAll($consultar_orden);

        foreach ($ejecutar_consultar_orden as $key => $value) {

            $ordenamiento = $value["orden_sub"];
        }

        if ($ordenamiento == "")
        {
            $ordenamiento = "orden";
        }

        $select_noticias = sprintf("SELECT idcategoria, nombre, imagen, fecha1 FROM categoria WHERE idpadre = %s AND activa = 1 AND eliminado = 0 ORDER BY %s DESC LIMIT 12", _HOME_NOTICIAS, $ordenamiento);
        $result_noticias = $db->Execute($select_noticias);

        $home_noticias = array();
        while(!$result_noticias->EOF) {
            $dHijos = $result_noticias->fields;
            $valores = array();

            $valores['idcategoria'] = $dHijos['idcategoria'];
            $valores['nombre']      = $dHijos['nombre'];
            $valores['imagen']      = $dHijos['imagen'];
            $valores['fecha']       = ($dHijos['fecha1']);
            $valores['fecha2']      = strtotime($dHijos['fecha1']);
            
            array_push($home_noticias, $valores);
            $result_noticias->MoveNext();
        }
        // echo "<pre>"; print_r($home_noticias); echo "</pre>";
        $smarty->assign('home_noticias', $home_noticias);
    }else{
        $noticias_default = "32";
        $select_noticias = sprintf("SELECT idcategoria, nombre, imagen, fecha2 FROM categoria WHERE idpadre = %s AND activa = 1 AND eliminado = 0 ORDER BY fecha2 DESC LIMIT 12", $noticias_default);
        $result_noticias = $db->Execute($select_noticias);

        $home_noticias = array();
        while(!$result_noticias->EOF) {
            $dHijos = $result_noticias->fields;
            $valores = array();

            $valores['idcategoria'] = $dHijos['idcategoria'];
            $valores['nombre']      = $dHijos['nombre'];
            $valores['imagen']      = $dHijos['imagen'];
            $valores['fecha']       = ($dHijos['fecha2']);
            $valores['fecha2']      = strtotime($dHijos['fecha2']);
            
            array_push($home_noticias, $valores);
            $result_noticias->MoveNext();
        }
        // echo "<pre>"; print_r($home_noticias); echo "</pre>";
        $smarty->assign('home_noticias', $home_noticias);
    }

    if(defined('_HOME_BANNERS') && _HOME_BANNERS != ""){ 
        $select_banner = sprintf("SELECT idcategoria, nombre, imagen FROM categoria WHERE idpadre = %s AND activa = 1 AND eliminado = 0 ORDER BY fecha1", _HOME_BANNERS);
        $result_banner = $db->GetAll($select_banner);
        $smarty->assign('home_banner', $result_banner);
    }

    if (defined("_HOME_LOGOS") && _HOME_LOGOS != ''){
        $selectLogos = sprintf("SELECT idcategoria, nombre, imagen, descripcion FROM %s WHERE idpadre = %s AND activa = 1 AND eliminado = 0 ORDER BY orden ASC", _TBLCATEGORIA, _HOME_LOGOS);
        $resultLogos = $db->GetAll($selectLogos);

        $LogosAll = array();
        $array4 = array();
        foreach ($resultLogos as $key => $imagen) {
            $array4[] = $imagen;
            if(count($array4) == 4){ // grupos de imagenes de 4 items
                $LogosAll[] = $array4;
                unset($array4);
                $array4 = null;
                $array4 = array();
            }elseif($key+1>=count($resultLogos)){
                $LogosAll[] = $array4;
                unset($array4);
                $array6 = null;
                $array6 = array();
            }
        }

        $smarty->assign('resultLogos'   , $LogosAll);
        $smarty->assign('logos'         , $resultLogos);
        $smarty->assign('countlogos'    , count($resultLogos));
    }

    if(defined('_RED_EMISORAS') && _RED_EMISORAS != ""){ 
        $consulta = $db->prepare("SELECT * FROM "._TBLCATEGORIA." WHERE idpadre = ? AND activa=1 AND eliminado=0 ORDER BY nombre ASC");
        $r = $db->Execute($consulta, array(_RED_EMISORAS));
        $emisoras = $r->GetArray();
        $smarty->assign('emisoras', $emisoras);
    }

    if(defined('_HOME_GALERIA') && _HOME_GALERIA != ""){ 
        //$select = sprintf("SELECT idcategoria, nombre, imagen, idpadre FROM %s WHERE activa = 1 AND eliminado = 0 AND idpadre in (%s) ORDER BY fecha2 DESC", _TBLCATEGORIA, _HOME_GALERIA);
        $select = sprintf("SELECT idcategoria, nombre, imagen, idpadre FROM %s WHERE activa = 1 AND eliminado = 0 AND idpadre in (%s) ORDER BY orden DESC", _TBLCATEGORIA, _HOME_GALERIA);
        $result = $db->GetAll($select);
        $galeriaFin=array();
        $group=array();
        foreach ($result as $key => $value) {
            $group[]=$value;
            if(count($group)>=18){
                $galeriaFin[]=$group;
                unset($group);
                $group=array();
                $slides=count($galeriaFin);
                $quedan=(count($result))-($slides*18);
                if($quedan<18 && $quedan>0){
                    $galeriaFin[$slides-1][17]['quedan']='+'.$quedan;
                    $galeriaFin[$slides-1][17]['idpadre']=$result[(count($result)-1)]['idpadre'];
                    break;
                }else{
                    $galeriaFin[$slides-1][17]['quedan']=false;
                }
            }
        }
        if(count($group)>0){
            $galeriaFin[]=$group;
        }
        $smarty->assign("galeriasAll", $galeriaFin);
    }

    // conoce a k-bito club lancita ninios
    if(defined('_CONOCE_KBITO') && _CONOCE_KBITO != ""){ 
        $conoce_kbito = sprintf("SELECT idcategoria, nombre, imagen FROM categoria WHERE idcategoria = %s", _CONOCE_KBITO);
        $conoce_kbito = $db->GetAll($conoce_kbito);
       $smarty->assign('conoce_kbito', $conoce_kbito[0]);
    }
    // galeria club lancita ninios
    if(defined('_GALERIA_LANCITA') && _GALERIA_LANCITA != ""){ 
        $galeria_lancita = sprintf("SELECT idcategoria, nombre, imagen, descripcion FROM categoria WHERE idpadre = %s AND activa = 1 AND eliminado = 0 ORDER BY fecha1 DESC LIMIT 12", _GALERIA_LANCITA);
        $galeria_lancita = $db->GetAll($galeria_lancita);
       $smarty->assign('galeria_lancita', $galeria_lancita);
    }
    // fechas club lancita ninios
    if(defined('_FECHAS_LANCITA') && _FECHAS_LANCITA != ""){ 
        $fechas_lancita = sprintf("SELECT * FROM categoria WHERE idpadre = %s AND activa = 1 AND eliminado = 0 ORDER BY orden DESC LIMIT 20", _FECHAS_LANCITA);
        $fechas_lancita = $db->GetAll($fechas_lancita);
       $smarty->assign('fechas_lancita', $fechas_lancita);
    }
    // videos club lancita ninios
    if(defined('_VIDEOS_LANCITA') && _VIDEOS_LANCITA != ""){ 
        $query='select nombre, descripcion
            from categoria
            where idpadre="'._VIDEOS_LANCITA.'" 
            and eliminado=0
            and activa=1
            order by orden asc
            limit 6
            ';

            $all=$db->getAll($query);
            foreach ($all as $key => $value) {
                $v = get_youtube_id(html_entity_decode($value['descripcion']));
                if($v!=false){
                    $all[$key]['descripcion']=$v;
                }
            }

       $smarty->assign('videos_lancita', $all);
    }


    /************** FIN CABEZOTE SUBSITIOS 2017 - Plantilla Unica **************/

    return $smarty -> fetch('tpl_home.html');
}

function TemplateHomeNuevo() 
{

    global $db;	/** @see variables.php */
    global $idcategoria;
    global $trazaCategoria;

    $home	=	new ejercito();
    $smarty = new Smarty_Plantilla;

    if(isset($_SESSION['info_usuario']) and $_SESSION['info_usuario']["activo"] == 1) 
    {
        $smarty->assign('hayUsuario', TRUE);
        $smarty->assign('infoUsuario', $_SESSION['info_usuario']);
        $smarty->assign('modoEdicion', $_SESSION['modo_edicion'] && $_SESSION['modo_edicion_aprovado']);
    }
    
    // Cambio # 11
    $query = $db->prepare("SELECT * FROM "._TBLCATEGORIA." WHERE activa != ? AND idcategoria = ? ");
    $result = $db->Execute($query, array(0, $idcategoria)) /* or errorQuery(__LINE__, __FILE__) */;
    $smarty->assign('es_algo', "info");

    if ($result->NumRows() > 0) {
        $d = $result->fields;
        $contenido = $d["descripcion"];
        $arraySecciones = $home->nuevoHome($contenido);

        $smarty->assign('secciones', $arraySecciones);
        $smarty->assign('es_root', "root".$d["es_root"]);
        $smarty->assign('resumen', stripslashes($d["entradilla"]));
        $smarty->assign('subtitulo',$d["subtitulo"]);
        $smarty->assign('datosCategoria',$d);
    }

    //////////////////PINTA EL FUNCIONAMIENTO DEL HOME EN EL LATERAL DERECHO//////////////////////
    if(defined('__LATERAL_DERECHO_1') and __LATERAL_DERECHO_1!='')
    {
        $resultado	=	$home->nuevoHome2(__LATERAL_DERECHO_1);
        $smarty->assign('secciones_derecho', $resultado);
        $smarty->assign('resumen_derecho', stripslashes($d["entradilla"]));
    }
    /////////////////////////////////////////////////////////////////////////////////////////////
    $arryfecha1= Array();
    $arryfecha2= Array();
    ////////////////////////PINTA EL FUNCIONAMIENTO DE LOS RESUMENES CENTRALES//////////////////////////
    if(defined('__LADOFOTONOTICIA') and __LADOFOTONOTICIA!='')
    {
        //traigo los hijos de la catergria correspondiente
        $resultado_principales		=	$home->separaDatos(__LADOFOTONOTICIA,'0');

        if(defined('_PLANTILLA') && _PLANTILLA == 'Default2011' || _PLANTILLA == 'Cemil_2012' || _PLANTILLA == 'DEFAULT2012' || _PLANTILLA == 'INGLES2013' || _PLANTILLA == 'TERCERA_DIVISION2013'
           || _PLANTILLA == 'PRIMERADIVISION2013' || _PLANTILLA == 'SEGUNDA_DIVISION2013' || _PLANTILLA == 'CUARTA_DIVISION2013' || _PLANTILLA == 'QUINTA_DIVISION2013'
           || _PLANTILLA == 'SEPTIMA_DIVISION2013' || PLANTILLA == 'OCTAVA_DIVISION2013' || _PLANTILLA == 'DAAVA-2013' || _PLANTILLA == 'SEXTA_DIVISION2013' 
           || _PLANTILLA == 'EMSUB_2013' || _PLANTILLA == 'BRIGADACONTRA_NARCOTRAFICO2013' || _PLANTILLA == 'ALEMAN_2013' || _PLANTILLA == 'BRIGADA27_2013' || _PLANTILLA == 'BRIGADA_LOGISTICA-2013'
           || _PLANTILLA == 'JEFATURA_DDHH_2013' || _PLANTILLA == 'BRIGADA_COMUNICACIONES_2013' || _PLANTILLA == 'BATALLON_MANTENIMIENTO' || _PLANTILLA == 'JETATURA_FAMILIA2013' || _PLANTILLA == 'FUERZA_COMANDO' 
           || _PLANTILLA == 'DEFAULT2014' || _PLANTILLA == "ESCAB-2013" || _PLANTILLA == "ESCUELA_JURIDICA2013" || _PLANTILLA == "MINERVA" || _PLANTILLA == 'DEFAULT2016')
        {
            $limitenoticias = 9; // para mantener la presentacion plantilla 2011 mas estatica
            $cuentaimagen = 0;
            for($i = 0, $rplen = count($resultado_principales); $i < $rplen; $i++)
            { 
                //print_r ($resultado_principales[$i]);
                $arryfecha2=$arryfecha1=explode(' ',$resultado_principales[$i]['fecha1']);
                $arryfecha1=explode(' ',date('h:i a', strtotime($resultado_principales[$i]['fecha1'])));
                // $resultado_principales[$i]['fecha1']= $arryfecha2[0];
                $resultado_principales[$i]['fecha1']=  ucwords(strtolower($arryfecha2[0]));
                $resultado_principales[$i]['hora1']= $arryfecha1[0]." ".$arryfecha1[1];
                if(trim($resultado_principales[$i]['imagen']) != '')
                {
                    $cuentaimagen++;
                }

                if($cuentaimagen > 2)
                {
                    $limitenoticias = 5;
                }


                if($i >= $limitenoticias)
                {
                    unset($resultado_principales[$i]);
                }
            }
        }
        //traigo el nombre de la categoria padre
        // $nombre_padre_principales	=	$home->nuevoHome(__LADOFOTONOTICIA);
        // $id_padre_principales	=	$home->nuevoHome(__LADOFOTONOTICIA);
        $smarty->assign('resumenes_centrales'					, $resultado_principales);
        $smarty->assign('nombre_padre_resumenes_centrales'		, $nombre_padre_principales[0]['nombre']);
        $smarty->assign('id_padre_resumenes_centrales'		    , $id_padre_principales[0]['idcategoria']);
    }

     if(defined('__LADOFOTONOTICIA2') and __LADOFOTONOTICIA2!='')
    {
        //traigo los hijos de la catergria correspondiente
        $resultado_principales      =   $home->separaDatos(__LADOFOTONOTICIA2,'0');

        if(defined('_PLANTILLA') && _PLANTILLA == 'Default2011' || _PLANTILLA == 'Cemil_2012' || _PLANTILLA == 'DEFAULT2012' || _PLANTILLA == 'INGLES2013' || _PLANTILLA == 'TERCERA_DIVISION2013'
           || _PLANTILLA == 'PRIMERADIVISION2013' || _PLANTILLA == 'SEGUNDA_DIVISION2013' || _PLANTILLA == 'CUARTA_DIVISION2013' || _PLANTILLA == 'QUINTA_DIVISION2013'
           || _PLANTILLA == 'SEPTIMA_DIVISION2013' || PLANTILLA == 'OCTAVA_DIVISION2013' || _PLANTILLA == 'DAAVA-2013' || _PLANTILLA == 'SEXTA_DIVISION2013' 
           || _PLANTILLA == 'EMSUB_2013' || _PLANTILLA == 'BRIGADACONTRA_NARCOTRAFICO2013' || _PLANTILLA == 'ALEMAN_2013' || _PLANTILLA == 'BRIGADA27_2013' || _PLANTILLA == 'BRIGADA_LOGISTICA-2013'
           || _PLANTILLA == 'JEFATURA_DDHH_2013' || _PLANTILLA == 'BRIGADA_COMUNICACIONES_2013' || _PLANTILLA == 'BATALLON_MANTENIMIENTO' || _PLANTILLA == 'JETATURA_FAMILIA2013' || _PLANTILLA == 'FUERZA_COMANDO' 
           || _PLANTILLA == 'DEFAULT2014' || _PLANTILLA == "ESCAB-2013" || _PLANTILLA == "ESCUELA_JURIDICA2013" || _PLANTILLA == "MINERVA" || _PLANTILLA == 'DEFAULT2016')
        {
            $limitenoticias = 9; // para mantener la presentacion plantilla 2011 mas estatica
            $cuentaimagen = 0;
            for($i = 0, $rplen = count($resultado_principales); $i < $rplen; $i++)
            { 
                //print_r ($resultado_principales[$i]);
                $arryfecha2=$arryfecha1=explode(' ',$resultado_principales[$i]['fecha1']);
                $arryfecha1=explode(' ',date('h:i a', strtotime($resultado_principales[$i]['fecha1'])));
                // $resultado_principales[$i]['fecha1']= $arryfecha2[0];
                $resultado_principales[$i]['fecha1']=  ucwords(strtolower($arryfecha2[0]));
                $resultado_principales[$i]['hora1']= $arryfecha1[0]." ".$arryfecha1[1];
                if(trim($resultado_principales[$i]['imagen']) != '')
                {
                    $cuentaimagen++;
                }

                if($cuentaimagen > 2)
                {
                    $limitenoticias = 5;
                }


                if($i >= $limitenoticias)
                {
                    unset($resultado_principales[$i]);
                }
            }
        }
        //traigo el nombre de la categoria padre
        // $nombre_padre_principales   =   $home->nuevoHome(__LADOFOTONOTICIA2);
        // $id_padre_principales   =   $home->nuevoHome(__LADOFOTONOTICIA2);
        $smarty->assign('resumenes_centrales2'                   , $resultado_principales);
        $smarty->assign('nombre_padre_resumenes_centrales2'      , $nombre_padre_principales[0]['nombre']);
        $smarty->assign('id_padre_resumenes_centrales2'          , $id_padre_principales[0]['idcategoria']);
    }

    if(defined('_MAS_INTERNACIONAL') and _MAS_INTERNACIONAL!='')
    {
        if(defined('_PLANTILLA') && _PLANTILLA == 'DEFAULT2016')
        {
            $seccionBuscar = _MAS_INTERNACIONAL;
            $queryHijos  = $db->prepare("SELECT * FROM "._TBLCATEGORIA." WHERE activa != 0 AND idpadre = ? ORDER BY fecha1 DESC");
            $resultHijos = $db->Execute($queryHijos, array($seccionBuscar));

            if ($resultHijos->NumRows() > 0) {
                /**
                 * Sacando la informacion de los hijos
                 **/
                $arrayhijos = array();

                while(!$resultHijos->EOF) {
                    $dHijos = $resultHijos->fields;
                    $auxHijos = array();
                    $auxHijos['idcategoria'] = $dHijos['idcategoria'];
                    $auxHijos['antetitulo'] = $dHijos['antetitulo'];
                    $auxHijos['nombre'] = $dHijos['nombre'];
                    $auxHijos['entradilla'] = stripslashes($dHijos['entradilla']);
                    $auxHijos['contenido'] = stripslashes($dHijos['descripcion']);
                    $auxHijos['imagen'] = $dHijos['imagen'];
                    $auxHijos['autor'] = $dHijos['autor'];
                    $auxHijos['fecha'] = $dHijos['fecha1'];
                    $auxHijos['fecha2'] = $dHijos['fecha1'];
                    $auxHijos['subtitulo'] = mb_strtoupper($dHijos['subtitulo'],'iso-8859-1');
                    array_push($arrayhijos, $auxHijos);

                    $resultHijos->MoveNext();
                }
            }
            
            $smarty->assign('seccion_internacional'    , $arrayhijos);
            $smarty->assign('home_internacional'    , $smarty->fetch('tpl_home_internacional.html'));
        }
    }
    /** Sección video principal 2016 - HOME SECCION INTERNACIONAL **/
    // if(defined("_VIDEO_HOME_PPAL") && _VIDEO_HOME_PPAL != '')
    // {          
    //      //creo la consulta que me traera el contenido de la categoria seleccionada
    //     $consulta_video_principalHome  = sprintf("SELECT idcategoria, nombre, descripcion, entradilla,imagen FROM categoria WHERE idpadre='%s' AND activa=1 AND eliminado=0 order by fecha1 desc LIMIT 5",_VIDEO_HOME_PPAL);          
    //     //ejecuto la consulta
    //     $resultado_video_principalHome = $db->GetAll($consulta_video_principalHome);
    //     $videos = array();

    //     foreach ($resultado_video_principalHome as $key => $value) {

    //             $array_tipo_video   = explode(".", $value["descripcion"]);
    //             $tipo_video         = end($array_tipo_video);


    //             if($value["entradilla"] != ""){
    //                 $array_id_video   = explode("/", $value["entradilla"]);
    //                 $id_video         = end($array_id_video);
    //                 //echo $id_video."<br>";
    //             }else{
    //                 $id_video = "none";
    //             }

    //             $videos[$key] = array(
    //                                     'idcategoria'   => $value["idcategoria"]
    //                                     ,'file'         => html_entity_decode(str_replace('\"', '"',$value["descripcion"]))
    //                                     ,'id_video'     => $id_video
    //                                     ,'nombre'       => $value["nombre"]
    //                                     ,'imagen'       => $value["imagen"]
    //                                     ,'tipo_video'   => $tipo_video
    //                                   );
    //             // fix add title attribute to youtube embed iframes -> tawdis 2017
    //             if(strpos($videos[$key]['file'],"iframe")){
    //                 $html = new DOMDocument();
    //                 $html->loadHtml($videos[$key]['file']);
    //                 $html->getElementsByTagName('iframe')->item(0)->setAttribute('title',$value["nombre"]);
    //                 $fullHtml = $html->saveHtml();
    //                 // trim <html><body>
    //                 $videos[$key]['file'] = substr($fullHtml,strpos($fullHtml, '<iframe'),-15);
    //             }
    //         }
    //     $smarty->assign('videos',$videos);

    //     $queryMultimediaAudios     = sprintf("SELECT entradilla,idcategoria, nombre, descripcion  FROM %s WHERE activa != 0 AND idpadre =%s  order by fecha1 desc LIMIT 4" , _TBLCATEGORIA , _SAUDIOS);
    //         $resultMultimediaAudios = $db->getAll($queryMultimediaAudios);
            
    //         $audios =  array();
    //         foreach ($resultMultimediaAudios as $key => $value) {

    //             $array_audio_video = explode(".", $value["descripcion"]);
    //             $tipo_audio        = end($array_audio_video);
    //             $audios[$key] = array(
    //                                 'idcategoria'   => $value["idcategoria"]
    //                                 ,'nombre'       => $value["nombre"]
    //                                 ,'file'         => $value["descripcion"]
    //                                 ,'entradilla'   => substr($value["entradilla"],0,138)
    //                                 ,'tipo_audio'   => $tipo_audio
    //                             );
    //         }
    //         $smarty->assign('audios',$audios);

    //     $smarty->assign('home_multimedia'   , $smarty->fetch('tpl_home_multimedia.html'));
    // }

    if(defined("_NOTICIAS_DEL_DIA") && _NOTICIAS_DEL_DIA != ''){
          
         //creo la consulta que me traera el contenido de la categoria seleccionada
        $consulta   =   sprintf("SELECT idcategoria,nombre,imagen FROM categoria WHERE idpadre='%s' AND activa=1 AND eliminado=0 ORDER BY fecha2 DESC",_NOTICIAS_DEL_DIA);          
        $resultado  =   $db->GetAll($consulta);

        setlocale(LC_TIME,"es_ES");
        $smarty->assign('arrayNotasDia'     , $resultado);
        $smarty->assign('diaNotas'          , date("d"));
        $smarty->assign('mesNotas'          , substr(date("F"),0,3));
        $smarty->assign('slogan_heroes'     , _SLOGAN_HEROES);
        $smarty->assign('home_notas'        , $smarty->fetch('tpl_home_notasDias.html'));
    }

    if(defined("_EJERCITO_EN_MEDIOS_") && _EJERCITO_EN_MEDIOS_ != ''){
          
         //creo la consulta que me traera el contenido de la categoria seleccionada
        $consulta   =   sprintf("SELECT idcategoria,nombre,imagen,entradilla FROM categoria WHERE idpadre='%s' AND activa=1 AND eliminado=0 ORDER BY orden DESC",_EJERCITO_EN_MEDIOS_);          
        $resultado  =   $db->GetAll($consulta);

        setlocale(LC_TIME,"es_ES");
        $smarty->assign('ejercito_medios'     , $resultado);
        $smarty->assign('home_notas'        , $smarty->fetch('tpl_home_notasDias.html'));
    }
    ////////////////////////////////////////////////////////////////////////////////////////////

    ////////////////////////PINTA EL LADO DERECHO DE LOS SUBSITIOS//////////////////////////
    if(defined('_SECCION_DERECHA') and _SECCION_DERECHA!='')
    {
        //traigo los hijos de la catergria correspondiente
        $resultado_hijos		=	$home->separaDatos(_SECCION_DERECHA,'0');
        //traigo el nombre de la categoria padre
        $nombre_padre	=	$home->nuevoHome(_SECCION_DERECHA);
        $id_padre	=	$home->nuevoHome(_SECCION_DERECHA);
        $smarty->assign('seccion_hijos'					, $resultado_hijos);
        $smarty->assign('nombre_padre'		, $nombre_padre[0]['nombre']);
        $smarty->assign('id_padre'		    , $id_padre[0]['idcategoria']);
    }
    ////////////////////////////////////////////////////////////////////////////////////////////

    $constante = '__RECOMENDADOS';
    //echo (defined($constante))?"buena constante":"mala";
    $parametros = '';
    eval("\$parametros = $constante;");
    //echo $parametros;

    function algo($constante, &$funcionesHome, &$smarty)
    {
        if(! defined($constante) ) return false;
        eval("\$parametros = $constante;");
        if($parametros=='' ) return false;

        //Informacion sobre la categoria
        $categoria	    =	$funcionesHome->NombrePadre($parametros);
        //Traemos los hijos
        $hijos		    =	$funcionesHome->separaDatos($parametros,'0');

        $smarty->assign('recomendados'					, $hijos);
        $smarty->assign('nombre_padre_recomendados'		, $categoria);
        return true;
    }

    algo('__RECOMENDADOS',$home, $smarty);

    ////////////////////////PINTA EL FUNCIONAMIENTO DE LAS ESCUELAS DE FORMACION//////////////////////////
    if(defined('__ESCUELAS') and __ESCUELAS!='')
    {
        //traigo los hijos de la categoria correspondiente
        $resultado_escuelas		=	$home->separaDatos(__ESCUELAS,'0');
        //traigo el nombre de la categoria padre
        $datos_padre_escuelas	=	$home->NombrePadre(__ESCUELAS);


        $smarty->assign('escuelas'					, $resultado_escuelas);
        $smarty->assign('info_escuelas'				, $datos_padre_escuelas);

    }

    ////////////////////////PINTA EL FUNCIONAMIENTO DE LAS IMAGENES DESTACADAS//////////////////////////
    if(defined('__IMAGENES') and __IMAGENES!='')
    {
        //traigo los hijos de la categoria correspondiente
        $resultado_imagenes		=	$home->separaDatos(__IMAGENES,'0');
        //traigo el nombre de la categoria padre
        $nombre_padre_imagenes	=	$home->NombrePadre(__IMAGENES);
        $smarty->assign('imagenes'					, $resultado_imagenes);
        $smarty->assign('galeria_imagen'            , $resultado_imagenes);
        $smarty->assign('nombre_padre_imagenes'		, $nombre_padre_imagenes);
    }

    ////////////////////////SE MUESTRA EL LISTADO DE LAS DIVISIONES////////////////////////////
    if(defined('__DIVISIONES_EJERCITO') and  __DIVISIONES_EJERCITO != '')
    {

        $datos	=	explode('#',__DIVISIONES_EJERCITO);
        $categoria		=	$datos[0];	//id categoria a consultar
        $consulta=sprintf("select nombre from categoria where idcategoria=%s",$categoria);
        $nom_categoria = $db->GetAll($consulta);

        $div_ejercito			=	new ejercito();
        //llamo la funcion para que me traiga los hijos de la historia del ejercito
        $divisiones	                =	$div_ejercito->separaDatos( __DIVISIONES_EJERCITO,'0');
        $nombre_padre_divisiones	=	$div_ejercito->NombrePadre(__DIVISIONES_EJERCITO);

        //asigno un arreglo
        $arreglo_div_ejercito	=	array();
        //recorro el resultado
        foreach($divisiones as $info_divisiones)
        {
            array_push($arreglo_div_ejercito,$info_divisiones);
        }
        $num = count($arreglo_div_ejercito);
        $residuo = $num%2;

        //$reg_col = ($residuo == 0)?($num / 2):(round($num / 2));
        if (($residuo == 0))
        {
            $reg_col = $num / 2;
        }else
        {$reg_col= round($num / 2);}

        $smarty->assign('nombre_categoria', $nom_categoria);
        $smarty->assign('divisiones_ejercito', $arreglo_div_ejercito);
        $smarty->assign('reg_col', $reg_col);
        $smarty->assign('nombre_padre_divisiones', $nombre_padre_divisiones);

    }
    /////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////PINTA EL FUNCIONAMIENTO DELTELEVISOR//////////////////////////
    if(defined('__TELEVISOR') and __TELEVISOR!='')
    {
        // Cambio # 12
        $TW = _TW;
        $consulta_tw		=	$db->prepare("select * from categoria where idcategoria= ? and activa= ?");
        $resultado_tw	    =	$db->Execute($consulta_tw, array($TW, 1));
        $embe= str_replace('\"', '"', $resultado_tw->fields['descripcion']);

        if($embe)
        {	$smarty->assign('tw'		, html_entity_decode($embe));
         $smarty->assign('titulo'		, $resultado_tw->fields['entradilla']);
         $smarty->assign('video','');

        }else
        {
            $TELEVISOR = __TELEVISOR;
            $consulta_televisor		=	$db->prepare("select * from categoria where idcategoria= ?");
            $resultado_televisor	=	$db->Execute($consulta_televisor, array($TELEVISOR));
            $smarty->assign('video'		, $resultado_televisor->fields['descripcion']);
            $smarty->assign('imagen'		, $resultado_televisor->fields['imagen']);
            $smarty->assign('titulo'		, $resultado_televisor->fields['nombre']);
            $smarty->assign('categoria'		, $resultado_televisor->fields['idcategoria']);

        }
    }

    //******  GalerÃ­a grande que se ubica en el home del subsitio "Soldados de Colombia"    *******//
    if(defined('_GALERIA_PRINCIPAL') and _GALERIA_PRINCIPAL!='')
    {
        //realizo un explode de la constante _GALERIA_PRINCIPAL para sacar cuantas viene en realidad
        $cantidad	= explode(',',_GALERIA_PRINCIPAL);

        $cuenta		=	count($cantidad);
        $cont		=	1;
        $imagenes = array();
        $directorios = "";
        foreach($cantidad as $datos)
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_galeria		=	$db->prepare("select * from categoria where idcategoria=?");
            $resultado_galeria	=	$db->Execute($consulta_galeria, array($datos));
            $imagenes_temp	=	array('imagen_numero'=>$cont,
                                      'imagen'=>$resultado_galeria->fields['imagen'],
                                      'titulo'=>$resultado_galeria->fields['nombre']);
            if($cont != $cuenta){
                $directorios .= "recursos_user/imagenes/".$resultado_galeria->fields['imagen']."#";
            }else{
                $directorios .= "recursos_user/imagenes/".$resultado_galeria->fields['imagen'];
            }
            array_push($imagenes,$imagenes_temp);
            $cont++;
        }
        $smarty->assign('imagenes_galeria_existe'		, true);
        $smarty->assign('imagenes_galeria'		, $imagenes);
        $smarty->assign('cantidad_imagenes'     , $cuenta);
        $smarty->assign('direcciones_imagenes'  , $directorios);
    }

    /**  GALERIA PRINCIPAL subsitio SuCausaColombia  **/
    if(defined('_GALERIA_PRINCIPAL') and _GALERIA_PRINCIPAL!='' )
    {
        if(defined('_PLANTILLA') && _PLANTILLA == 'SuCausaColombia')
        {
            //realizo un explode de la constante _GALERIA_PRINCIPAL para sacar cuantas viene en realidad
            $cantidad	= explode(',',_GALERIA_PRINCIPAL);

            $cuenta		=	count($cantidad);
            $cont		=	1;
            $imagenes = array();
            $directorios = "";
            foreach($cantidad as $datos)
            {
                //creo la consulta que me traera el contenido de la categoria seleccionada
                $consulta_galeria		=	$db->prepare("select * from categoria where idcategoria=?");
                //ejecuto la consulta
                $resultado_galeria	=	$db->Execute($consulta_galeria, array($datos));
                $imagenes_temp	=	array('imagen_numero'=>$cont,
                                          'imagen'=>$resultado_galeria->fields['imagen'],
                                          'titulo'=>$resultado_galeria->fields['nombre']);
                if($cont != $cuenta){
                    $directorios .= "recursos_user/imagenes/".$resultado_galeria->fields['imagen']."#";
                }else{
                    $directorios .= "recursos_user/imagenes/".$resultado_galeria->fields['imagen'];
                }
                array_push($imagenes,$imagenes_temp);
                $cont++;
            }
            $smarty->assign('imagenes_galeria_existe'		, true);
            $smarty->assign('imagenes_galeria'		, $imagenes);
            $smarty->assign('cantidad_imagenes'     , $cuenta);
            $smarty->assign('direcciones_imagenes'  , $directorios);
        }
    }

    /** FIN galeria SuCausaEsColombia **/

    /**
	 * Foto Noticia
	 */
    if(defined('_FOTONOTICIA'))
    {
        if(_FOTONOTICIA != '')
        {
            if(defined('_PLANTILLA') && _PLANTILLA == 'Default2011')
            {
                $catfotos = preg_replace('/[^0-9\,]/i', '', _FOTONOTICIA);
                $catfotos = str_replace(',,', ',', $catfotos);

                $query = sprintf("SELECT idcategoria, nombre, imagen FROM categoria WHERE activa = 1 AND eliminado = 0 AND idcategoria IN (%s) ORDER BY fecha1 DESC", $catfotos);

                $fotonoticias = $db->GetAll($query);
                $smarty->assign('fotonoticias11', $fotonoticias);
            }
            else
            {
                //realizo un explode de la constante fotonoticia para sacar cuantas viene en realidad
                $cantidad	= explode(',',_FOTONOTICIA);

                $cuenta		=	count($cantidad);
                $cont		=	1;
                $arreglo_paginas	=	array();
                foreach($cantidad as $datos)
                {
                    /* realizo la consulta de las correspondientes categorias para traer el titulo y pintarlo en el tool tip text de las paginas de la fotonoticia */
                    $consulta_titulo	=	$db->prepare("SELECT nombre FROM categoria WHERE idcategoria= ?");
                    $titulo				=	$db->Execute($consulta_titulo, array($datos));
                    $paginas	=	array('page'=>$cont,
                                          'cat'=>$datos,
                                          'titulo'=>$titulo->fields['nombre']);
                    array_push($arreglo_paginas,$paginas);
                    $cont++;
                }

                $smarty->assign('fotonoticia',true);
                $smarty->assign('cantidad',$arreglo_paginas);
                $smarty->assign('fotonoticia_categorias',_FOTONOTICIA);
            }
        }
    }

    if(defined('_SECCION_AMIGOS') and _SECCION_AMIGOS !='')
    {
        $SECCION_AMIGOS = trim(_SECCION_AMIGOS);
        $queryRotulo	 = $db->prepare("select * from "._TBLCATEGORIA." where activa != ? and idcategoria = ? ");
        $resultRotulo = $db->Execute($queryRotulo, array(0, $SECCION_AMIGOS)) /* or errorQuery(__LINE__, __FILE__) */;
        if ($resultRotulo !== FALSE and $resultRotulo->NumRows() > 0)
        {
            $smarty->assign('rotulo', $resultRotulo->fields["antetitulo"]);
        }

        $SECCION_AMIGOS = trim(_SECCION_AMIGOS);
        $queryAmigos	 = $db->prepare("select * from "._TBLCATEGORIA." where activa != ? and idpadre = ? and fecha2 != ? ORDER BY fecha2 DESC");
        $resultAmigos = $db->Execute($queryAmigos, array(0, $SECCION_AMIGOS, "0000-00-00 00:00:00")) /* or errorQuery(__LINE__, __FILE__) */;
        if ($resultAmigos !== FALSE and $resultAmigos->NumRows() > 0)
        {
            while (!$resultAmigos->EOF){

                $rowAmigos = $resultAmigos->fields;
                $categoria1['idcategoria'] = $rowAmigos["idcategoria"];
                $categoria1['nombre'] = $rowAmigos["nombre"];
                $categoria1['antetitulo'] = $rowAmigos["antetitulo"];
                $categoria1['imagen'] = $rowAmigos["imagen"];
                $categorias1[] = $categoria1;
                $categoria1 = "";
                $resultAmigos->MoveNext();
            }
            $smarty->assign('Amigos', $categorias1);
        }
        $smarty->assign('categoria_amigos', _SECCION_AMIGOS);
    }
    //valido si se mostraran los eventos
    if(defined('__EVENTOS') and __EVENTOS !='')
    {
        $dato				=	new ejercito();
        
        //realizo el proceso para mostrar los ventos
        $nombre_padre_evento	=	$dato->NombrePadre(__EVENTOS);
        $eventos			=	$dato->calendario(__EVENTOS,'1');
        $arreglo_eventos	=	array();
        //recorro la informacion para sacar los datos necesarios para mostrar
        foreach($eventos as $key=>$info)
        {
            //separo la fecha de la hora
            $fecha	=	explode(' ',$info['fecha2']);
            //separo el mes
            $mes	=	explode('-',$fecha[0]);
            //pregunto por le mes
            switch ($mes[1])
            {
                case '01':
                    $texto_mes 	=	'Ene';
                    break;

                case '02':
                    $texto_mes 	=	'Feb';
                    break;

                case '03':
                    $texto_mes 	=	'Mar';
                    break;

                case '04':
                    $texto_mes 	=	'Abr';
                    break;

                case '05':
                    $texto_mes 	=	'May';
                    break;

                case '06':
                    $texto_mes 	=	'Jun';
                    break;

                case '07':
                    $texto_mes 	=	'Jul';
                    break;

                case '08':
                    $texto_mes 	=	'Ago';
                    break;

                case '09':
                    $texto_mes 	=	'Sep';
                    break;

                case '10':
                    $texto_mes 	=	'Oct';
                    break;

                case '11':
                    $texto_mes 	=	'Nov';
                    break;

                case '12':
                    $texto_mes 	=	'Dic';
                    break;

            }
            $padre	=	$info['idpadre'];

            //armo el arreglo con la nueva informacion
            $arreglo_datos_eventos	=	array('titulo'=>$info['nombre'],
                                              'resumen'=>$info['entradilla'],
                                              'contenido'=>$info['descripcion'],
                                              'mes'=>$texto_mes,
                                              'dia_evento'=>$mes[2],
                                              'id'=>$info['idcategoria'],
                                              'padre'=>$info['idpadre']);
            array_push($arreglo_eventos,$arreglo_datos_eventos);
        }
        $smarty->assign('eventos', $arreglo_eventos);
        $smarty->assign('padre', isset($padre)?$padre:"");
        $smarty->assign('padreNombre', $nombre_padre_evento);

    }

    //valido se se mostraran la historia del ejercito
    if(defined('__HISTORIA') and __HISTORIA != '')
    {
        $dato_historia			=	new ejercito();
        //llamo la funcion para que me traiga los hijos de la historia del ejercito
        $historia	=	$dato_historia->separaDatos(__HISTORIA,'0');
        $nombre_padre_historia	=	$dato_historia->NombrePadre(__HISTORIA);
        //asigno un arreglo
        $arreglo_info_historia	=	array();
        //recorro el resultado
        foreach($historia as $info_historia)
        {

            array_push($arreglo_info_historia,$info_historia);
        }
        $smarty->assign('info_historia', $arreglo_info_historia);
        $smarty->assign('datos_historia', $nombre_padre_historia);

    }

    //******    INICIO VARIABLES SITIO DE INGENIEROS MILITARES   *****//
    if(defined('_PLANTILLA') && _PLANTILLA == 'esing_2011')
    {
        if(defined('__CONTRATACION') and __CONTRATACION != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_contratacion = $db->prepare("SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ? ");
            $CONTRATACION = __CONTRATACION;
            $resultado_contratacion =   $db->Execute($consulta_contratacion, array($CONTRATACION));
            $smarty->assign('entradillaContratacion'        , $resultado_contratacion->fields['entradilla']);
            $smarty->assign('imagenContratacion'            , $resultado_contratacion->fields['imagen']);
            $smarty->assign('nombreContratacion'            , $resultado_contratacion->fields['nombre']);
            $smarty->assign('categoriaContratacion'         , $resultado_contratacion->fields['idcategoria']);          
        }

        if(defined('__CONVOCATORIAS') and __CONVOCATORIAS != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_convocatoria = $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $CONVOCATORIAS = __CONVOCATORIAS;
            $resultado_convocatoria =   $db->Execute($consulta_convocatoria, array($CONVOCATORIAS));
            $smarty->assign('entradillaConvocatoria'        , $resultado_convocatoria->fields['entradilla']);
            $smarty->assign('imagenConvocatoria'            , $resultado_convocatoria->fields['imagen']);
            $smarty->assign('nombreConvocatoria'            , $resultado_convocatoria->fields['nombre']);
            $smarty->assign('categoriaConvocatoria'         , $resultado_convocatoria->fields['idcategoria']);          
        }

        if(defined('__INGENIEROS') and __INGENIEROS != '')
        {
            // CAmbio # 21
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_ingeniero     =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            //ejecuto la consulta
            $INGENIEROS = __INGENIEROS;
            $resultado_ingeniero    =   $db->Execute($consulta_ingeniero, array($INGENIEROS));
            $smarty->assign('entradillaIngeniero'       , $resultado_ingeniero->fields['entradilla']);
            $smarty->assign('imagenIngeniero'           , $resultado_ingeniero->fields['imagen']);
            $smarty->assign('nombreIngeniero'           , $resultado_ingeniero->fields['nombre']);
            $smarty->assign('categoriaIngeniero'        , $resultado_ingeniero->fields['idcategoria']);         
        }

        if(defined('__CIUDADANOS') and __CIUDADANOS != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_ciudadano     =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $CIUDADANOS = __CIUDADANOS;
            $resultado_ciudadano    =   $db->Execute($consulta_ciudadano, array($CIUDADANOS));
            $smarty->assign('entradillaCiudadano'       , $resultado_ciudadano->fields['entradilla']);
            $smarty->assign('imagenCiudadano'           , $resultado_ciudadano->fields['imagen']);
            $smarty->assign('nombreCiudadano'           , $resultado_ciudadano->fields['nombre']);
            $smarty->assign('categoriaCiudadano'            , $resultado_ciudadano->fields['idcategoria']);         
        }

        if(defined('__FINCAR') and __FINCAR != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_fincaraiz     =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $FINCAR = __FINCAR;
            $resultado_fincaraiz    =   $db->Execute($consulta_fincaraiz, array($FINCAR));
            $smarty->assign('entradillaFincaraiz'       , $resultado_fincaraiz->fields['entradilla']);
            $smarty->assign('imagenFincaraiz'           , $resultado_fincaraiz->fields['imagen']);
            $smarty->assign('nombreFincaraiz'           , $resultado_fincaraiz->fields['nombre']);
            $smarty->assign('categoriaFincaraiz'            , $resultado_fincaraiz->fields['idcategoria']);         
        }

        if(defined('__CARTOGRAFIA') and __CARTOGRAFIA != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_cartografia   =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $CARTOGRAFIA = __CARTOGRAFIA;
            $resultado_cartografia  =   $db->Execute($consulta_cartografia, array($CARTOGRAFIA));
            $smarty->assign('entradillaCartografia'     , $resultado_cartografia->fields['entradilla']);
            $smarty->assign('imagenCartografia'         , $resultado_cartografia->fields['imagen']);
            $smarty->assign('nombreCartografia'         , $resultado_cartografia->fields['nombre']);
            $smarty->assign('categoriaCartografia'      , $resultado_cartografia->fields['idcategoria']);           
        }

        if(defined('__TRANSPARENCIA') and __TRANSPARENCIA != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_transparencia     =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $TRANSPARENCIA = __TRANSPARENCIA;
            $resultado_transparencia    =   $db->Execute($consulta_transparencia, array($TRANSPARENCIA));
            $smarty->assign('entradillaTransparencia'       , $resultado_transparencia->fields['entradilla']);
            $smarty->assign('imagenTransparencia'           , $resultado_transparencia->fields['imagen']);
            $smarty->assign('nombreTransparencia'           , $resultado_transparencia->fields['nombre']);
            $smarty->assign('categoriaTransparencia'        , $resultado_transparencia->fields['idcategoria']);
        }

        if(defined('__NOTICIAS') and __NOTICIAS != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_noticias      =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $NOTICIAS = __NOTICIAS;
            $resultado_noticias =   $db->Execute($consulta_noticias, array($NOTICIAS));
            $smarty->assign('entradillaNoticias'        , $resultado_noticias->fields['entradilla']);
            $smarty->assign('imagenNoticias'            , $resultado_noticias->fields['imagen']);
            $smarty->assign('nombreNoticias'            , $resultado_noticias->fields['nombre']);
            $smarty->assign('categoriaNoticias'         , $resultado_noticias->fields['idcategoria']);
        }

        if(defined('__OBRAS') and __OBRAS != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_obras     =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $OBRAS = __OBRAS;
            $resultado_obras    =   $db->Execute($consulta_obras, array($OBRAS));
            $smarty->assign('entradillaObra'        , $resultado_obras->fields['entradilla']);
            $smarty->assign('imagenObra'            , $resultado_obras->fields['imagen']);
            $smarty->assign('nombreObra'            , $resultado_obras->fields['nombre']);
            $smarty->assign('categoriaObra'         , $resultado_obras->fields['idcategoria']);     
        }

        if(defined('__ATENCIONDESASTRE') and __ATENCIONDESASTRE != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_atencion      =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $ATENCIONDESASTRE = __ATENCIONDESASTRE;
            $resultado_atencion =   $db->Execute($consulta_atencion, array($ATENCIONDESASTRE));
            $smarty->assign('entradillaAtencion'        , $resultado_atencion->fields['entradilla']);
            $smarty->assign('imagenAtencion'            , $resultado_atencion->fields['imagen']);
            $smarty->assign('nombreAtencion'            , html_entity_decode($resultado_atencion->fields['nombre']));
            $smarty->assign('categoriaAtencion'         , $resultado_atencion->fields['idcategoria']);      
        }

        if(defined('__AMBIENTAL') and __AMBIENTAL != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_ambiental     =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $AMBIENTAL = __AMBIENTAL;
            $resultado_ambiental    =   $db->Execute($consulta_ambiental, array($AMBIENTAL));
            $smarty->assign('entradillaAmbiental'       , $resultado_ambiental->fields['entradilla']);
            $smarty->assign('imagenAmbiental'           , $resultado_ambiental->fields['imagen']);
            $smarty->assign('nombreAmbiental'           , $resultado_ambiental->fields['nombre']);
            $smarty->assign('categoriaAmbiental'        , $resultado_ambiental->fields['idcategoria']);         
        }

        if(defined('__DESMINADO') and __DESMINADO != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_desminado     =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $DESMINADO = __DESMINADO;
            $resultado_desminado    =   $db->Execute($consulta_desminado, array($DESMINADO));
            $smarty->assign('entradillaDesminado'       , $resultado_desminado->fields['entradilla']);
            $smarty->assign('imagenDesminado'           , $resultado_desminado->fields['imagen']);
            $smarty->assign('nombreDesminado'           , $resultado_desminado->fields['nombre']);
            $smarty->assign('categoriaDesminado'        , $resultado_desminado->fields['idcategoria']);         
        }

        if(defined('__TECNOLOGIA') and __TECNOLOGIA != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_tecnologia    =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $TECNOLOGIA = __TECNOLOGIA;
            $resultado_tecnologia   =   $db->Execute($consulta_tecnologia, array($TECNOLOGIA));
            $smarty->assign('entradillaTecnologia'      , $resultado_tecnologia->fields['entradilla']);
            $smarty->assign('imagenTecnologia'          , $resultado_tecnologia->fields['imagen']);
            $smarty->assign('nombreTecnologia'          , $resultado_tecnologia->fields['nombre']);
            $smarty->assign('categoriaTecnologia'       , $resultado_tecnologia->fields['idcategoria']);            
        }

        if(defined('__COMBATE') and __COMBATE != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_combate   =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $COMBATE = __COMBATE;
            $resultado_combate  =   $db->Execute($consulta_combate, array($COMBATE));
            $smarty->assign('entradillaCombate'     , $resultado_combate->fields['entradilla']);
            $smarty->assign('imagenCombate'         , $resultado_combate->fields['imagen']);
            $smarty->assign('nombreCombate'         , $resultado_combate->fields['nombre']);
            $smarty->assign('categoriaCombate'      , $resultado_combate->fields['idcategoria']);           
        }

        if(defined('__DISENO') and __DISENO != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_diseno    =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $DISENO = __DISENO;
            $resultado_diseno   =   $db->Execute($consulta_diseno, array($DISENO));
            $smarty->assign('entradillaDiseno'      , $resultado_diseno->fields['entradilla']);
            $smarty->assign('imagenDiseno'          , $resultado_diseno->fields['imagen']);
            $smarty->assign('nombreDiseno'          , $resultado_diseno->fields['nombre']);
            $smarty->assign('categoriaDiseno'       , $resultado_diseno->fields['idcategoria']);            
        }

        if(defined('__AUDITORIA') and __AUDITORIA != '')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_auditoria =   $db->prepare(" SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idcategoria= ?");
            $AUDITORIA = __AUDITORIA;
            $resultado_auditoria    =   $db->Execute($consulta_auditoria, array($AUDITORIA));
            $smarty->assign('entradillaAuditoria'       , $resultado_auditoria->fields['entradilla']);
            $smarty->assign('imagenAuditoria'           , $resultado_auditoria->fields['imagen']);
            $smarty->assign('nombreAuditoria'           , $resultado_auditoria->fields['nombre']);
            $smarty->assign('categoriaAuditoria'        , $resultado_auditoria->fields['idcategoria']);         
        }
    }

    if(defined('_FOTONOTICIA') and _FOTONOTICIA != '')
    {
        if(defined('_PLANTILLA') && _PLANTILLA == 'esing_2011')
        {
            $catfotos = preg_replace('/[^0-9\,]/i', '', _FOTONOTICIA);
            $catfotos = str_replace(',,', ',', $catfotos);

            $query = sprintf("SELECT idcategoria, nombre, imagen FROM categoria WHERE activa = 1 AND eliminado = 0 AND idcategoria IN (%s)", $catfotos);

            $fotonoticias = $db->GetAll($query);
            $smarty->assign('fotonoticias11', $fotonoticias);
        }
        else
        {
            //realizo un explode de la constante fotonoticia para sacar cuantas viene en realidad
            $cantidad   = explode(',',_FOTONOTICIA);

            $cuenta     =   count($cantidad);
            $cont       =   1;
            $arreglo_paginas    =   array();
            foreach($cantidad as $datos)
            {
                /* realizo la consulta de las correspondientes categorias para traer el titulo y pintarlo en el tool tip text de las paginas de la fotonoticia */
                $consulta_titulo    =   $db->prepare("SELECT nombre FROM categoria WHERE idcategoria=?");
                $titulo             =   $db->Execute($consulta_titulo, array($datos));
                $paginas    =   array('page'=>$cont,
                                      'cat'=>$datos,
                                      'titulo'=>$titulo->fields['nombre']);
                array_push($arreglo_paginas,$paginas);
                $cont++;
            }

            $smarty->assign('fotonoticia',true);
            $smarty->assign('cantidad',$arreglo_paginas);
            $smarty->assign('fotonoticia_categorias',_FOTONOTICIA);
        }
    }
    try{
        $smarty->assign('carrusel_vertical' , $smarty->fetch('tpl_carrusel_vertical.html'));
    }catch(Exception $e){}
    //******    FIN VARIABLES SITIO DE INGENIEROS MILITARES   *****//    

    /* Funcion Heroes de Colombia, plantilla 2012-2013*/
    if(defined('__HEROES') and __HEROES != '')
    {
        if(defined('_PLANTILLA') && _PLANTILLA == 'DEFAULT2012' || _PLANTILLA == 'INGLES2013' || _PLANTILLA == 'FUERZA_COMANDO' || _PLANTILLA == 'DEFAULT2014' 
           || _PLANTILLA == 'DEFAULT2015')
        {
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_heroes    =   $db->prepare("SELECT idcategoria,nombre,entradilla,imagen FROM categoria WHERE idpadre=? AND activa=? ORDER BY fecha1 DESC LIMIT ?");
            $HEROES = __HEROES;
            $resultado_heroes   =   $db->Execute($consulta_heroes, array($HEROES, 1, 1));
            $smarty->assign('entradillaHeroes'      , ereg_replace("[\]","",$resultado_heroes->fields['entradilla']));
            $smarty->assign('imagenHeroes'          , $resultado_heroes->fields['imagen']);
            $smarty->assign('nombreHeroes'          , $resultado_heroes->fields['nombre']);
            $smarty->assign('categoriaHeroes'       , $resultado_heroes->fields['idcategoria']);            

        }

    }

    /**
     * FOTONOTICIAS DIVISIONES EJECITO NACIONAL NUEVO DISEÑO 2011
     * FUNCION  Foto Noticia carga la parte inferior de la plantilla llamada Galeria.
    **/

    /*********  PLANTILLAS  Divisiones y Ingles  Derechos Humanos, Emsub *********/
    if(defined('_FOTONOTICIA') and _FOTONOTICIA != '')
    {
        if(defined('_PLANTILLA') && _PLANTILLA == 'Tercera_division2011' OR _PLANTILLA == 'Cuarta_division2011' OR _PLANTILLA =='Quinta_division2011'
           OR _PLANTILLA == 'Sexta_division2011' OR _PLANTILLA =='Septima_division2011' OR  _PLANTILLA == 'Primera_division2011' OR _PLANTILLA == 'Segunda_division2011'
           OR _PLANTILLA == 'Octava_division2011' OR _PLANTILLA =='Jefatura_DDHH_2011' OR  _PLANTILLA == 'Emsub2011' 
           OR _PLANTILLA == 'Reclutamiento2011' OR _PLANTILLA == 'BrigadaAviacion2011' OR _PLANTILLA == 'AviacionBrigada1225'
           OR _PLANTILLA == 'AviacionBrigada3212' OR _PLANTILLA == 'BrigadaVentisiete2011' OR _PLANTILLA == 'BrigadaNarcotrafico2011' OR _PLANTILLA == 'BrigadaLogisticaUno2011' 
           OR _PlANTILLA == 'FUERZA_COMANDO')
        {
            $catfotos = preg_replace('/[^0-9\,]/i', '', _FOTONOTICIA);
            $catfotos = str_replace(',,', ',', $catfotos);

            $query = sprintf("SELECT idcategoria, nombre, imagen FROM categoria WHERE activa = 1 AND eliminado = 0 AND idcategoria IN (%s) ORDER BY fecha1 DESC", $catfotos);

            $fotonoticias = $db->GetAll($query);
            $smarty->assign('fotonoticias11', $fotonoticias);
        }
        else
        {
            //realizo un explode de la constante fotonoticia para sacar cuantas viene en realidad
            $cantidad	= explode(',',_FOTONOTICIA);

            $cuenta		=	count($cantidad);
            $cont		=	1;
            $arreglo_paginas	=	array();
            foreach($cantidad as $datos)
            {
                /* realizo la consulta de las correspondientes categorias para traer el titulo y pintarlo en el tool tip text de las paginas de la fotonoticia */
                $consulta_titulo	=	$db->prepare("SELECT nombre FROM categoria WHERE idcategoria=?");
                $titulo				=	$db->Execute($consulta_titulo, array($datos));
                $paginas	=	array('page'=>$cont,
                                      'cat'=>$datos,
                                      'titulo'=>$titulo->fields['nombre']);
                array_push($arreglo_paginas,$paginas);
                $cont++;
            }

            $smarty->assign('fotonoticia',true);
            $smarty->assign('cantidad',$arreglo_paginas);
            $smarty->assign('fotonoticia_categorias',_FOTONOTICIA);
        }
    }

    /**** Personalizacion ****/
    if(isset($_SESSION['personalizar']) && $_SESSION['personalizar']['zonas'] != '')
    {
        $zona = $_SESSION['personalizar']['zonas'];
    }else
    {
        $zona = 1;
    }

    $smarty -> assign('zona',	$zona);	

    /**********    NUEVOS FUNCIONES PARA LA NUEVA PLANTILLA DE ESCUELAS    **********/
    // Galeria de Audio  ESCUELAS Ejercito

    if (defined("_AUDIO") && _AUDIO != '')
    {
        $audioCategories = explode(',', _AUDIO);
        $resultadoAudio = array();
        foreach ($audioCategories as $categoria)
        {
            if (trim($categoria) != '')
            {
                $categoria1 = trim($categoria);
                $queryAudio=$db->prepare("SELECT * FROM "._TBLCATEGORIA." WHERE activa != ? AND idcategoria= ?");
                $resultAudio = $db->Execute($queryAudio, array(0, $categoria1)) /* or errorQuery(__LINE__, __FILE__) */;
                if($resultAudio->NumRows() > 0)
                {
                    array_push($resultadoAudio,$resultAudio->fields);
                }
            }
        }
        $smarty->assign('menuAudio',$resultadoAudio);
    }

    //SECCION VISUALIZA TITULOS DE la seccion mas notas
    if(defined("__MAS_NOTICIAS") && __MAS_NOTICIAS != ''){
        $MAS_NOTICIAS = trim(__MAS_NOTICIAS);
        $queryHijosMasNoticias = $db->prepare("SELECT nombre,idcategoria,TIME(fecha1) AS hora1, imagen FROM "._TBLCATEGORIA." WHERE activa != ? AND idpadre = ? and fecha2 != ? ORDER BY fecha2 DESC LIMIT 6,10");
        $resultHijosMasNoticias = $db->Execute($queryHijosMasNoticias, array(0, $MAS_NOTICIAS, '0000-00-00 00:00:00')) /* or errorQuery(__LINE__, __FILE__) */;

        if ($resultHijosMasNoticias->NumRows() > 0)
        {
            $MAS_NOTICIAS = trim(__MAS_NOTICIAS);
            $querySeccionDestacada = $db->prepare("SELECT idcategoria, nombre, imagen FROM "._TBLCATEGORIA." WHERE activa != ? AND idcategoria = ?");
            $resultSeccionDestacada = $db->Execute($querySeccionDestacada, array(0, $MAS_NOTICIAS)) /* or errorQuery(__LINE__, __FILE__) */;

            $smarty->assign('tituloSeccionMasNotas', htmlentities($resultSeccionDestacada->fields['nombre'], ENT_QUOTES, "UTF-8"));
            $smarty->assign('idcategoriaMasNotas', $resultSeccionDestacada->fields['idcategoria']);
            $smarty->assign('imagenMasNotas',  $resultSeccionDestacada->fields['imagen']);
            
            // Hijos de Seccion destacada
            $hijoDestacado = array();
            while(!$resultHijosMasNoticias->EOF) {
                $data = $resultHijosMasNoticias->fields;
                array_push($hijoDestacado, $data);
                $resultHijosMasNoticias->MoveNext();
            }
            $smarty->assign('hijoDestacadoMasNotas', $hijoDestacado);
        }
    }

    /********* SECCION INCOPORACIONES PLANTILLA 2014 *********/
    if(defined("__INCORPORACIONES") && __INCORPORACIONES != ''){
        $queryHijosIncorporaciones = $db->prepare("SELECT nombre,idcategoria,TIME(fecha1) AS hora1,imagen,entradilla
                			                  FROM "._TBLCATEGORIA."
											  WHERE activa != ? AND idpadre = ?
											  ORDER BY fecha3 DESC
											  LIMIT 1,3");
        $INCORPORACIONES = trim(__INCORPORACIONES);
        $resultHijosIncorporaciones = $db->Execute($queryHijosIncorporaciones, array(0, $INCORPORACIONES)) /* or errorQuery(__LINE__, __FILE__) */;

        if ($resultHijosIncorporaciones->NumRows() > 0)
        {
            $INCORPORACIONES = trim(__INCORPORACIONES);
            $querySeccionDestacada = $db->prepare("SELECT idcategoria, nombre,entradilla FROM "._TBLCATEGORIA." WHERE activa != ? AND idcategoria = ?");
            $resultSeccionDestacada = $db->Execute($querySeccionDestacada, array(0, $INCORPORACIONES)) /* or errorQuery(__LINE__, __FILE__) */;

            $smarty->assign('tituloIncorporaciones', htmlentities($resultSeccionDestacada->fields['nombre'], ENT_QUOTES, "UTF-8"));
            $smarty->assign('idcategoriaIncorporaciones', $resultSeccionDestacada->fields['idcategoria']);
            $smarty->assign('imagenIncorporaciones', $resultSeccionDestacada->fields['imagen']);
            $smarty->assign('entradillaIncorporaciones', $resultSeccionDestacada->fields['entradilla']);
            // Hijos de Seccion destacada
            $hijoIncorporacion = array();
            while(!$resultHijosIncorporaciones->EOF) {
                $data = $resultHijosIncorporaciones->fields;
                array_push($hijoIncorporacion, $data);
                $resultHijosIncorporaciones->MoveNext();
            }
            $smarty->assign('hijoDestacadoIncorporaciones', $hijoIncorporacion);
        }

    }

    /// SECCION MEDIOS palntilla 2014
    if(defined("__MEDIOS") && __MEDIOS != ''){
        $queryHijosMedios = $db->prepare("SELECT nombre,idcategoria,TIME(fecha1) AS hora1,imagen
                			                  FROM "._TBLCATEGORIA."
											  WHERE activa != ? AND idpadre = ?
											  ORDER BY idcategoria DESC
											  LIMIT 4");
        $MEDIOS = trim(__MEDIOS);
        $resultHijosMedios = $db->Execute($queryHijosMedios, array(0, $MEDIOS)) /* or errorQuery(__LINE__, __FILE__) */;

        if ($resultHijosMedios->NumRows() > 0)
        {
            $MEDIOS = trim(__MEDIOS);
            $querySeccionMedios= $db->prepare("SELECT idcategoria, nombre, entradilla FROM "._TBLCATEGORIA." WHERE activa != ? AND idcategoria = ?");
            $resultSeccionMedios = $db->Execute($querySeccionMedios, array(0, $MEDIOS)) /* or errorQuery(__LINE__, __FILE__) */;

            $smarty->assign('tituloIncorporaciones', htmlentities($resultSeccionMedios->fields['nombre'], ENT_QUOTES, "UTF-8"));
            $smarty->assign('idcategoriaIncorporaciones', $resultSeccionMedios->fields['idcategoria']);
            $smarty->assign('imagenIncorporaciones', $resultSeccionMedios->fields['imagen']);
            $smarty->assign('entradillaIncorporaciones', $resultSeccionMedios->fields['entradilla']);
            // Hijos de Seccion destacada
            $hijoMedios = array();
            while(!$resultHijosMedios->EOF) {
                $data = $resultHijosMedios->fields;
                array_push($hijoMedios, $data);
                $resultHijosMedios->MoveNext();
            }
            $smarty->assign('hijoDestacadoMedios', $hijoMedios);
        }
    }

    /** Seccion videos 2015 - HOME **/
    if(defined("__ME_SIENTO_ORGULLOSO") && __ME_SIENTO_ORGULLOSO != ''){
        $consulta_orgulloso	=	$db->prepare("SELECT idcategoria,nombre,imagen FROM categoria WHERE idcategoria=?");
        $ME_SIENTO_ORGULLOSO = __ME_SIENTO_ORGULLOSO;
        $resultado_orgulloso	=	$db->Execute($consulta_orgulloso, array($ME_SIENTO_ORGULLOSO));
        $smarty->assign('imagenMeSientoOrgulloso'	    	, $resultado_orgulloso->fields['imagen']);
        $smarty->assign('nombreMeSientoOrgulloso'		    , $resultado_orgulloso->fields['nombre']);
        $smarty->assign('categoriaMeSientoOrgulloso'		, $resultado_orgulloso->fields['idcategoria']);		 
    }

    /** Seccion video principal 2015 - HOME **/
    if(defined("__VIDEO_PRINCIPAL") && __VIDEO_PRINCIPAL != ''){
        //creo la consulta que me traera el contenido de la categoria seleccionada
        $consulta_video_principal	=	$db->prepare("SELECT idcategoria,nombre,imagen FROM categoria WHERE idcategoria= ?");
        $VIDEO_PRINCIPAL = __VIDEO_PRINCIPAL;
        $resultado_video_principal	=	$db->Execute($consulta_video_principal, array($VIDEO_PRINCIPAL));
        $smarty->assign('imagenVideoPrincipal'	    	, $resultado_video_principal->fields['imagen']);
        $smarty->assign('nombreVideoPrincipal'		    , $resultado_video_principal->fields['nombre']);
        $smarty->assign('categoriaVideoPrincipal'		, $resultado_video_principal->fields['idcategoria']);		
    }

    /** seccion infografia home 2015 **/
    if(defined("__INFOGRAFIA") && __INFOGRAFIA != ''){
        //creo la consulta que me traera el contenido de la categoria seleccionada
        $consulta_infografia	=	$db->prepare("SELECT idcategoria,nombre,imagen  FROM categoria WHERE idcategoria= ?");
        $INFOGRAFIA = __INFOGRAFIA;
        $resultado_infografia	=	$db->Execute($consulta_infografia, array($INFOGRAFIA));
        $smarty->assign('imagenInfografia'	    	, $resultado_infografia->fields['imagen']);
        $smarty->assign('nombreInfografia'		    , $resultado_infografia->fields['nombre']);
        $smarty->assign('categoriaInfografia'		, $resultado_infografia->fields['idcategoria']);		
    }

    /** Funcionalidad para subsitios de educacion militar EMSUB y CEMIL 2015 **/
    if(defined("__DESTACADO") && __DESTACADO != ''){
        $consulta_destacada = $db->prepare("SELECT nombre,idcategoria,TIME(fecha1) AS hora1,entradilla,imagen
                			                  FROM "._TBLCATEGORIA."
											  WHERE activa != ? AND idpadre = ?
											  ORDER BY idcategoria DESC");
        $DESTACADO = trim(__DESTACADO);
        $resultado_destacada = $db->Execute($consulta_destacada, array(0, $DESTACADO)) /* or errorQuery(__LINE__, __FILE__) */;

        if ($resultado_destacada->NumRows() > 0)
        {
            $DESTACADO = trim(__DESTACADO);
            $querySeccionDestacada = $db->prepare("SELECT idcategoria, nombre FROM "._TBLCATEGORIA." WHERE activa != ? AND idcategoria = ?");
            $resultSeccionDestacada = $db->Execute($querySeccionDestacada, array(0, $DESTACADO)) /* or errorQuery(__LINE__, __FILE__) */;

            $smarty->assign('tituloDestacado', htmlentities($resultSeccionDestacada->fields['nombre'], ENT_QUOTES, "UTF-8"));
            $smarty->assign('idcategoriaDestacada', $resultSeccionDestacada->fields['idcategoria']);
            // Hijos de Seccion destacada
            $hijoDestacado = array();
            while(!$resultado_destacada->EOF) {
                $data = $resultado_destacada->fields;
                array_push($hijoDestacado, $data);
                $resultado_destacada->MoveNext();
            }
            $smarty->assign('destacados', $hijoDestacado);
        }

    }

    /**** Parte del Usuario ****/
    if (isset($_SESSION['info_usuario'])) {
        $smarty -> assign('homeUsuario',	FuncionesInterfaz::homeUsuario());
        $smarty -> assign('existsUsuario',	TRUE);
    }
    $smarty->assign('infoPrincipal', $trazaCategoria[$idcategoria]);
    $encuesta = null;
    
    if($idcategoria == 1) $encuesta = FuncionesInterfaz::MostrarEncuesta();
    $smarty->assign('encuesta'		,$encuesta);

    $flagfirefox = 0;
    if(isset($_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'],"Firefox") != false)
    {
        $flagfirefox = 1;
    }

    $smarty->assign('flagfirefox'   , $flagfirefox);
    $smarty->assign('actualidad'    , $smarty->fetch('tpl_home_actualidad.html'));

    if(defined('_PLANTILLA') && _PLANTILLA == 'DEFAULT2012'){
        $smarty->assign('medios_banner' , $smarty->fetch('tpl_medios_banner.html'));
        $smarty->assign('incorporaciones', $smarty->fetch('tpl_incorporaciones.html')); 
    }

    // Archivos tabs home
    if(defined('_PLANTILLA') && _PLANTILLA == 'DEFAULT2014'){ 
        $smarty->assign('medios_home'	      , $smarty->fetch('tpl_home_medios.html'));
        $smarty->assign('incorporaciones_home', $smarty->fetch('tpl_home_incorporaciones.html'));
        $smarty->assign('mas_noticias'        , $smarty->fetch('tpl_mas_noticias.html'));
    }

    if(defined('_PLANTILLA') && _PLANTILLA == 'DEFAULT2016'){         
        $smarty->assign('destacados_home'     , $smarty->fetch('tpl_home_destacados.html'));
        $smarty->assign('destacados_home2'     , $smarty->fetch('tpl_home_destacados_ingles.html'));
        $smarty->assign('actualidad'          , $smarty->fetch('tpl_home_actualidad.html'));
        
        $consulta = $db->prepare("SELECT * FROM "._TBLCATEGORIA." WHERE idpadre = ? and activa=1 and eliminado=0");
        $r = $db->Execute($consulta, array(_RED_EMISORAS));
        $radios=$r->GetArray();
        $smarty->assign('radios'     , $radios);
        $smarty->assign('home_videos', $smarty->fetch('tpl_home_videos.html'));


        if(defined('_CONOCE_KBITO') && _CONOCE_KBITO != ""){ 
        $conoce_kbito = sprintf("SELECT idcategoria, nombre, imagen FROM categoria WHERE idcategoria = %s", _CONOCE_KBITO);
        $conoce_kbito = $db->GetAll($conoce_kbito);
        $smarty->assign('conoce_kbito', $conoce_kbito[0]);
        }
        // galeria club lancita ninios
        if(defined('_GALERIA_LANCITA') && _GALERIA_LANCITA != ""){ 
            $galeria_lancita = sprintf("SELECT idcategoria, nombre, imagen, descripcion FROM categoria WHERE idpadre = %s AND activa = 1 AND eliminado = 0 ORDER BY fecha1 DESC LIMIT 12", _GALERIA_LANCITA);
            $galeria_lancita = $db->GetAll($galeria_lancita);
           $smarty->assign('galeria_lancita', $galeria_lancita);
        }
        // fechas club lancita ninios
        if(defined('_FECHAS_LANCITA') && _FECHAS_LANCITA != ""){ 
            $fechas_lancita = sprintf("SELECT * FROM categoria WHERE idpadre = %s AND activa = 1 AND eliminado = 0 ORDER BY fecha1 DESC LIMIT 20", _FECHAS_LANCITA);
            $fechas_lancita = $db->GetAll($fechas_lancita);
           $smarty->assign('fechas_lancita', $fechas_lancita);
        }
        // videos club lancita ninios
        if(defined('_VIDEOS_LANCITA') && _VIDEOS_LANCITA != ""){ 
            $query='select nombre, descripcion
                from categoria
                where idpadre="'._VIDEOS_LANCITA.'" 
                and eliminado=0
                and activa=1
                order by orden asc
                limit 6
                ';

                $all=$db->getAll($query);
                foreach ($all as $key => $value) {
                    $v = get_youtube_id(html_entity_decode($value['descripcion']));
                    if($v!=false){
                        $all[$key]['descripcion']=$v;
                    }
                }

           $smarty->assign('videos_lancita', $all);
        }

        
        if(defined('_HOME_NOTICIAS') && _HOME_NOTICIAS != ""){ 
        // ini_set("display_errors", 1);

            $consultar_orden = sprintf("SELECT orden_sub FROM categoria WHERE idcategoria = %s LIMIT 1", _HOME_NOTICIAS);
            $ejecutar_consultar_orden = $db->getAll($consultar_orden);

            foreach ($ejecutar_consultar_orden as $key => $value) {

                $ordenamiento = $value["orden_sub"];
            }

            if ($ordenamiento == "")
            {
                $ordenamiento = "orden";
            }

            $select_noticias = sprintf("SELECT idcategoria, nombre, imagen, fecha1 FROM categoria WHERE idpadre = %s AND activa = 1 AND eliminado = 0 ORDER BY %s DESC LIMIT 12", _HOME_NOTICIAS, $ordenamiento);
            $result_noticias = $db->Execute($select_noticias);

            $home_noticias = array();
            while(!$result_noticias->EOF) {
                $dHijos = $result_noticias->fields;
                $valores = array();

                $valores['idcategoria'] = $dHijos['idcategoria'];
                $valores['nombre']      = $dHijos['nombre'];
                $valores['imagen']      = $dHijos['imagen'];
                $valores['fecha']       = ($dHijos['fecha1']);
                $valores['fecha2']      = strtotime($dHijos['fecha1']);
                
                array_push($home_noticias, $valores);
                $result_noticias->MoveNext();
            }
            // echo "<pre>"; print_r($home_noticias); echo "</pre>";
            $smarty->assign('home_noticias', $home_noticias);
        }

         if(defined('_HOME_BANNERS') && _HOME_BANNERS != ""){ 
            $select_banner = sprintf("SELECT idcategoria, nombre, imagen FROM categoria WHERE idpadre = %s AND activa = 1 AND eliminado = 0 ORDER BY fecha1", _HOME_BANNERS);
            $result_banner = $db->GetAll($select_banner);
            $smarty->assign('home_banner', $result_banner);
        }

        if(defined('_HOME_SLIDER') && _HOME_SLIDER != ""){ 
            $select_slider = sprintf("SELECT idcategoria, nombre, imagen, autor FROM categoria WHERE idpadre= %s AND activa = 1 AND eliminado = 0 ORDER BY fecha1 DESC", _HOME_SLIDER);
            $result_slider = $db->GetAll($select_slider);

            $smarty->assign('slider', $result_slider);
        }else{
            $imagen_default = _DIRIMAGES."subsitio/slider/photoslider_default.jpg";
            $slider = array('idcategoria' => $idcategoria, 'nombre' => $trazaCategoria[$idcategoria]['nombre'], 'imagen' => $imagen_default);
            $smarty->assign('slider_default', $slider);
        }
    }

    $smarty->assign('medios'	, $smarty->fetch('tpl_home_medios.html'));

    if(_ROTABANNER=='1')
    {    
        $fecha_servidor = date("Y-m-d");
        $queryBanner = $db->prepare("SELECT * FROM "._TBLSUBSITIO_GRAFICO." WHERE subsitio_grafico_fecini <= ? AND subsitio_grafico_fecfin >= ? order by subsitio_grafico_fecini DESC");
        $r = $db->Execute($queryBanner, array($fecha_servidor, $fecha_servidor)); 

        if($r->NumRows() == 0)
        {
            //Traer banner por defecto
            $consulta = $db->prepare("SELECT * FROM "._TBLSUBSITIO_GRAFICO." WHERE subsitio_grafico_defecto = ? ORDER BY subsitio_grafico_fecini DESC LIMIT ?");
            $r = $db->Execute($consulta, array("SI", 1)) or errorQuery(__LINE__, __FILE__);               

        }
        $banners = $r?$r->GetRows():array();
        $smarty->assign('banners', $banners);
        $smarty->assign('const', _ROTABANNER);
    }   

    $categoria = $_GET['idcategoria'];

    if (defined('_PLANTILLA') && _PLANTILLA != 'DEFAULT2016')
    {

     if(defined('_HOME_SLIDER') && _HOME_SLIDER != ""){ 
        $select_slider = sprintf("SELECT idcategoria, nombre, imagen, autor FROM categoria WHERE idcategoria IN (%s) AND activa = 1 AND eliminado = 0 ORDER BY fecha1 DESC", _HOME_SLIDER);
        $result_slider = $db->GetAll($select_slider);

        $smarty->assign('slider', $result_slider);
    }else{
        $imagen_default = _DIRIMAGES."subsitio/slider/photoslider_default.jpg";
        $slider = array('idcategoria' => $idcategoria, 'nombre' => $trazaCategoria[$idcategoria]['nombre'], 'imagen' => $imagen_default);
        $smarty->assign('slider_default', $slider);
    }
    }
    /**************  HOME 2018  **************/
    if (defined('_PLANTILLA') && _PLANTILLA == 'DEFAULT2018') {
        
        $smarty->assign('destacados_home', $smarty->fetch('tpl_home_destacados.html'));
        $smarty->assign('destacados_home_ingles', $smarty->fetch('tpl_home_destacados_ingles.html'));

        if(_ROTABANNER=='1')
        {    
            $fecha_servidor = date("Y-m-d");
            $queryBanner = $db->prepare("SELECT * FROM "._TBLSUBSITIO_GRAFICO." WHERE subsitio_grafico_fecini <= ? AND subsitio_grafico_fecfin >= ? order by subsitio_grafico_fecini DESC");
            $r = $db->Execute($queryBanner, array($fecha_servidor, $fecha_servidor)); 
            if($r->NumRows() > 0)
            {
                //Traer banner por defecto
                $consulta = $db->prepare("SELECT * FROM "._TBLSUBSITIO_GRAFICO." WHERE subsitio_grafico_defecto = ? ORDER BY subsitio_grafico_fecini DESC LIMIT ?");
                $r = $db->Execute($consulta, array("SI", 1)) or errorQuery(__LINE__, __FILE__);               

            }
            $banners = $r?$r->GetRows():array();
            $smarty->assign('banners', $banners);
            $smarty->assign('const', _ROTABANNER);
        } 

        if(defined('_HOME_SLIDER') && _HOME_SLIDER != ""){ 
            $select_slider = sprintf("SELECT idcategoria, nombre, imagen, autor FROM categoria WHERE idpadre= %s AND activa = 1 AND eliminado = 0 ORDER BY fecha1 DESC", _HOME_SLIDER);
            $result_slider = $db->GetAll($select_slider);

            $smarty->assign('slider', $result_slider);
        }else{
            $imagen_default = _DIRIMAGES."subsitio/slider/photoslider_default.jpg";
            $slider = array('idcategoria' => $idcategoria, 'nombre' => $trazaCategoria[$idcategoria]['nombre'], 'imagen' => $imagen_default);
            $smarty->assign('slider_default', $slider);
        }
        
        if (defined("_SECCIONES_RSS") && _SECCIONES_RSS != ''){
            $query2 = sprintf("SELECT idcategoria, nombre, imagen, entradilla, fecha1 FROM %s WHERE idpadre = %s AND eliminado = 0 AND activa = 1 ORDER BY orden DESC LIMIT 16", _TBLCATEGORIA, _SECCIONES_RSS);
            $noticia = $db->GetAll($query2);
            
            $noticiasAll = array();
            $array4 = array();
            foreach ($noticia as $key => $imagen) {
                $array4[] = $imagen;
                if(count($array4) == 4){ // grupos de imagenes de 4 items
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }elseif($key+1>=count($noticia)){
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }
            }

            $smarty->assign('noticias' , $noticiasAll);
            $smarty->assign('noticia'  , $noticia);
        }

        if (defined("_SECCIONES_RSS_2") && _SECCIONES_RSS_2 != ''){
            $query3 = sprintf("SELECT idcategoria, nombre, imagen, entradilla, fecha1 FROM %s WHERE idpadre = %s AND eliminado = 0 AND activa = 1 ORDER BY orden DESC LIMIT 16", _TBLCATEGORIA, _SECCIONES_RSS_2);
            $result = $db->GetAll($query3);

            $noticiasAll1 = array();
            $array4 = array();
            foreach ($result as $key => $imagen) {
                $array4[] = $imagen;
                if(count($array4) == 4){ // grupos de imagenes de 4 items
                    $noticiasAll1[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }elseif($key+1>=count($result)){
                    $noticiasAll1[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }
            }

            $smarty->assign('actualidad' , $noticiasAll1);
            $smarty->assign('actu'       , $result);
        }

         if (defined("_MAS_INTERNACIONAL") && _MAS_INTERNACIONAL != ''){
            $query4 = sprintf("SELECT idcategoria, nombre, imagen, entradilla, fecha1 FROM %s WHERE idpadre = %s AND eliminado = 0 AND activa = 1 ORDER BY fecha2 DESC LIMIT 16", _TBLCATEGORIA, _MAS_INTERNACIONAL);
            $inter = $db->GetAll($query4);

            $noticiasAll2 = array();
            $array4 = array();
            foreach ($inter as $key => $imagen) {
                $array4[] = $imagen;
                if(count($array4) == 4){ // grupos de imagenes de 4 items
                    $noticiasAll2[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }elseif($key+1>=count($inter)){
                    $noticiasAll2[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }
            }

            $smarty->assign('internacional' , $noticiasAll2);
            $smarty->assign('inter'         , $inter);



        }


        if (defined("_SECCIONES_RSS") && _SECCIONES_RSS != '' && defined("_SECCIONES_RSS_2") && _SECCIONES_RSS_2 != '' && defined("_MAS_INTERNACIONAL") && _MAS_INTERNACIONAL != '')
        {

            $query2 = sprintf("SELECT idcategoria, nombre, imagen, entradilla, fecha1, idpadre, descripcion FROM %s WHERE activa = 1 AND idpadre = %s OR idpadre = %s OR idpadre = %s ORDER BY orden DESC LIMIT 6", _TBLCATEGORIA, _SECCIONES_RSS,  _SECCIONES_RSS_2, _MAS_INTERNACIONAL);
            $noticia = $db->GetAll($query2);
            
            $noticiasAll = array();
            $array4 = array();
            foreach ($noticia as $key => $imagen) {
                $array4[] = $imagen;
                if(count($array4) == 4){ // grupos de imagenes de 4 items
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }elseif($key+1>=count($noticia)){
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }
            }

            $smarty->assign('noticias3' , $noticiasAll);
            $smarty->assign('noticia3'  , $noticia);
        }


        if (defined("_SECCIONES_RSS") && _SECCIONES_RSS != '')
        {

            $query2 = sprintf("SELECT idcategoria, nombre, imagen, entradilla, fecha1, idpadre, descripcion FROM %s WHERE activa = 1 AND idpadre = %s ORDER BY orden DESC LIMIT 16", _TBLCATEGORIA, _SECCIONES_RSS);
            $noticia = $db->GetAll($query2);
            
            $noticiasAll = array();
            $array4 = array();
            foreach ($noticia as $key => $imagen) {
                $array4[] = $imagen;
                if(count($array4) == 16){ // grupos de imagenes de 4 items
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }elseif($key+1>=count($noticia)){
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }
            }

            $smarty->assign('noticias4' , $noticiasAll);
            $smarty->assign('noticia4'  , $noticia);
        }


        if (defined("_NOTIMEDIOS") && _NOTIMEDIOS != '')
        {

            $query2 = sprintf("SELECT idcategoria, nombre, imagen, entradilla, fecha1, idpadre, descripcion FROM %s WHERE activa = 1 AND idpadre = %s ORDER BY orden DESC LIMIT 16", _TBLCATEGORIA, _NOTIMEDIOS);
            $noticia = $db->GetAll($query2);
            
            $noticiasAll = array();
            $array4 = array();
            foreach ($noticia as $key => $imagen) {
                $array4[] = $imagen;
                if(count($array4) == 16){ // grupos de imagenes de 4 items
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }elseif($key+1>=count($noticia)){
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }
            }

            $smarty->assign('medios2' , $noticiasAll);
            $smarty->assign('medio2'  , $noticia);



        }


        if (defined("_REPESPECIALES") && _REPESPECIALES != '')
        {

            $query2 = sprintf("SELECT idcategoria, nombre, imagen, entradilla, fecha1, idpadre, descripcion FROM %s WHERE activa = 1 AND idpadre = %s ORDER BY orden DESC LIMIT 16", _TBLCATEGORIA, _REPESPECIALES);
            $noticia = $db->GetAll($query2);
            
            $noticiasAll = array();
            $array4 = array();
            foreach ($noticia as $key => $imagen) {
                $array4[] = $imagen;
                if(count($array4) == 16){ // grupos de imagenes de 4 items
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }elseif($key+1>=count($noticia)){
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }
            }

            $smarty->assign('especiales2' , $noticiasAll);
            $smarty->assign('especiale2'  , $noticia);
        }


        if (defined("_SECCIONES_RSS") && _SECCIONES_RSS != '')
        {

            $query2 = sprintf("SELECT idcategoria, nombre, imagen, entradilla, fecha1, idpadre, descripcion FROM %s WHERE activa = 1 AND idpadre = 497783 ORDER BY orden DESC LIMIT 16", _TBLCATEGORIA);
            $noticia = $db->GetAll($query2);
            
            $noticiasAll = array();
            $array4 = array();
            foreach ($noticia as $key => $imagen) {
                $array4[] = $imagen;
                if(count($array4) == 16){ // grupos de imagenes de 4 items
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }elseif($key+1>=count($noticia)){
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }
            }

            $smarty->assign('podcast2' , $noticiasAll);
            $smarty->assign('podcas2'  , $noticia);
        }


        if (defined("_SECCIONES_RSS") && _SECCIONES_RSS != '')
        {

            $query2 = sprintf("SELECT idcategoria, nombre, imagen, entradilla, fecha1, idpadre, descripcion FROM %s WHERE activa = 1 AND idpadre = 498031 ORDER BY orden DESC LIMIT 16", _TBLCATEGORIA);
            $noticia = $db->GetAll($query2);
            
            $noticiasAll = array();
            $array4 = array();
            foreach ($noticia as $key => $imagen) {
                $array4[] = $imagen;
                if(count($array4) == 16){ // grupos de imagenes de 4 items
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }elseif($key+1>=count($noticia)){
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }
            }

            $smarty->assign('ejercitotv2' , $noticiasAll);
            $smarty->assign('ejercitot2'  , $noticia);
        }



        if(defined("_VIDEO_HOME_PPAL") && _VIDEO_HOME_PPAL != ''){      
            $consulta_video_principalHome  = sprintf("SELECT idcategoria, nombre, descripcion, imagen, fecha1 FROM categoria WHERE idpadre = '%s' AND activa = 1 AND eliminado = 0 order by idcategoria desc LIMIT 4", _VIDEO_HOME_PPAL);          
            $resultadoVideo = $db->GetAll($consulta_video_principalHome);
            $videos_home_ppal = array();

            foreach ($resultadoVideo as $key => $value) {
                $array_tipo_video   = explode(".", $value["descripcion"]);
                $tipo_video         = end($array_tipo_video);

                if ($tipo_video == "flv" || $tipo_video == "mp4") {
                    $tipo_video_final = "archivo";
                }else{
                    $tipo_video_final = "youtube";
                }

                if($value["entradilla"] != ""){
                    $array_id_video   = explode("/", $value["entradilla"]);
                    $id_video         = end($array_id_video);
                }else{
                    $id_video = "none";
                }

                $videos_home_ppal[$key] = array(
                    'idcategoria'   => $value["idcategoria"]
                    ,'archivo'      => html_entity_decode(str_replace('\"', '"',$value["descripcion"]))
                    ,'id_video'     => $id_video
                    ,'nombre'       => $value["nombre"]
                    ,'imagen'       => $value["imagen"]
                    ,'tipo_video'   => $tipo_video
                    ,'descripcion'  => html_entity_decode(str_replace('\"', '"',$value["descripcion"]))
                    ,'video'        => str_replace('"', '\"', $value["descripcion"])
                    ,'tipo_video_final'  => $tipo_video_final
                  );
                // fix add title attribute to youtube embed iframes -> tawdis 2017
                if(strpos($videos_home_ppal[$key]['archivo'],"iframe")){
                    $html = new DOMDocument();
                    $html->loadHtml($videos_home_ppal[$key]['archivo']);
                    $html->getElementsByTagName('iframe')->item(0)->setAttribute('title',$value["nombre"]);
                    $html->getElementsByTagName('iframe')->item(0)->setAttribute('name',$value["nombre"]);
                    $fullHtml = $html->saveHtml();
                    $videos_home_ppal[$key]['archivo'] = substr($fullHtml,strpos($fullHtml, '<iframe'),-15);
                }
            }

            // echo "<pre>"; print_r($videos_home_ppal); echo "</pre>";
            $smarty->assign('videos_home_ppal',$videos_home_ppal);

            //            $queryMultimediaAudios = sprintf("SELECT entradilla,idcategoria, nombre, descripcion  FROM %s WHERE activa != 0 AND idpadre =%s  order by fecha1 desc LIMIT 4" , _TBLCATEGORIA , _SAUDIOS);
            $queryMultimediaAudios = sprintf("SELECT entradilla,idcategoria, nombre, descripcion  FROM %s WHERE activa != 0 AND idpadre =%s  order by orden desc LIMIT 4" , _TBLCATEGORIA , _SAUDIOS);
            $resultMultimediaAudios = $db->getAll($queryMultimediaAudios);
            
            $audios =  array();
            foreach ($resultMultimediaAudios as $key => $value) {

                $array_audio_video = explode(".", $value["descripcion"]);
                $tipo_audio        = end($array_audio_video);
                $audios[$key] = array(
                    'idcategoria'   => $value["idcategoria"]
                    ,'nombre'       => $value["nombre"]
                    ,'file'         => $value["descripcion"]
                    ,'entradilla'   => substr($value["entradilla"],0,138)
                    ,'tipo_audio'   => $tipo_audio
                );
            }
            // echo "<pre>"; print_r($audios); echo "</pre>";
            $smarty->assign('audios',$audios);

            if (defined("_GALERIA_FOTOGRAFICA") && _GALERIA_FOTOGRAFICA != ''){
                $consulta_especial  = $db->prepare("SELECT idcategoria, nombre, imagen, descripcion, entradilla FROM categoria WHERE idpadre = ? and activa = 1 and eliminado = 0 ORDER BY fecha1 DESC LIMIT 8");
                $resultado_especial = $db->Execute($consulta_especial, array(_GALERIA_FOTOGRAFICA)); 
                $resultadoImagenes  = $resultado_especial->GetArray();
                
                $smarty->assign('galeria_imagenppal' , $resultadoImagenes);
            }

            $smarty->assign('home_seccion_videos', $smarty->fetch('tpl_home_videos.html'));
        }
        if(defined("_BANNERS_") && _BANNERS_ != ''){
            //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta_especial  = $db->prepare("SELECT idcategoria,nombre,imagen FROM categoria WHERE idpadre = ? and eliminado = 0 and activa = 1");
            $resultado_especial = $db->Execute($consulta_especial, array(_BANNERS_)); 
            $banners            = $resultado_especial->GetArray();
            
            $es_ingles = _EN_INGLES;

            $smarty->assign('ingles'     , $es_ingles);
            $smarty->assign('banners'    , $banners);

            $smarty->assign('home_destacados_interna', $smarty->fetch('tpl_home_destacados_interna.html'));
        }

        $es_ingles = _EN_INGLES;

        $smarty->assign('ingles',$es_ingles);

        if(defined("_JEFATURAS") && _COMANDO_EJERCITO_NACIONAL != ''){
             //creo la consulta que me traera el contenido de la categoria seleccionada
            $consultaJ  =   sprintf("SELECT idcategoria,nombre,antetitulo FROM categoria WHERE idpadre='%s' AND activa=1 AND eliminado=0 ORDER BY orden",_COMANDO_EJERCITO_NACIONAL);         
            $resultadoJ =   $db->GetAll($consultaJ);

            $smarty->assign('array_comando_ejercito_nacional'   , $resultadoJ);
            $smarty->assign('home_jefaturas'    , $smarty->fetch('tpl_home_jefaturas.html'));
        }

        if(defined("_JEFATURAS") && _COMANDO_EJERCITO_NACIONAL_2 != ''){
             //creo la consulta que me traera el contenido de la categoria seleccionada
            $consultaJ  =   sprintf("SELECT idcategoria,nombre,antetitulo FROM categoria WHERE idpadre='%s' AND activa=1 AND eliminado=0 ORDER BY orden",_COMANDO_EJERCITO_NACIONAL_2);       
            $resultadoJ =   $db->GetAll($consultaJ);

            $smarty->assign('array_comando_ejercito_nacional_2' , $resultadoJ);
            $smarty->assign('home_jefaturas'    , $smarty->fetch('tpl_home_jefaturas.html'));
        }

        if(defined("_JEFATURAS") && _JEFATURAS != ''){
             //creo la consulta que me traera el contenido de la categoria seleccionada
            $consultaJ  =   sprintf("SELECT idcategoria,nombre,antetitulo FROM categoria WHERE idpadre='%s' AND activa=1 AND eliminado=0 ORDER BY orden",_JEFATURAS);         
            $resultadoJ =   $db->GetAll($consultaJ);

            $smarty->assign('arrayJefaturas'    , $resultadoJ);
            $smarty->assign('home_jefaturas'    , $smarty->fetch('tpl_home_jefaturas.html'));
        }

        if(defined("_ESCUELA_FORMACION") && _ESCUELA_FORMACION != ''){
             //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta1  =   sprintf("SELECT idcategoria,nombre FROM categoria WHERE idpadre='%s' AND activa=1 AND eliminado=0 ORDER BY orden",_ESCUELA_FORMACION);        
            $resultado1 =   $db->GetAll($consulta1);

            $smarty->assign('arrayEscuelas1'    , $resultado1);
            $smarty->assign('home_jefaturas'    , $smarty->fetch('tpl_home_jefaturas.html'));
        }
        if(defined("_ESCUELA_CAPACITACION") && _ESCUELA_CAPACITACION != ''){
             //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta2  =   sprintf("SELECT idcategoria,nombre FROM categoria WHERE idpadre='%s' AND activa=1 AND eliminado=0 ORDER BY orden",_ESCUELA_CAPACITACION);         
            $resultado2 =   $db->GetAll($consulta2);

            $smarty->assign('arrayEscuelas2'    , $resultado2);
            $smarty->assign('home_jefaturas'    , $smarty->fetch('tpl_home_jefaturas.html'));
        }
        if(defined("_ESCUELA_ENTRENAMIENTO") && _ESCUELA_ENTRENAMIENTO != ''){
             //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta3  =   sprintf("SELECT idcategoria,nombre FROM categoria WHERE idpadre='%s' AND activa=1 AND eliminado=0 ORDER BY orden",_ESCUELA_ENTRENAMIENTO);        
            $resultado3 =   $db->GetAll($consulta3);

            $smarty->assign('arrayEscuelas3'    , $resultado3);
            $smarty->assign('home_jefaturas'    , $smarty->fetch('tpl_home_jefaturas.html'));
        }


        if(defined("_ENCUESTA") && _ENCUESTA != ''){
             //creo la consulta que me traera el contenido de la categoria seleccionada
            $consulta4  =   sprintf("SELECT cat1.idpadre, cat1.idcategoria, cat1.entradilla, (select cat3.entradilla from ejercito_portal.categoria as cat3 where cat3.idcategoria = cat1.idpadre limit 1) as pregunta FROM categoria as cat1 WHERE cat1.idpadre in(select cat2.idcategoria from ejercito_portal.categoria as cat2 where cat2.idpadre= '%s' and activa = 1) order by cat1.idpadre, cat1.idcategoria  limit 300", _ENCUESTA);


            $resultado4 =   $db->GetAll($consulta4);

            $smarty->assign('arrayEncuestas', $resultado4);
            
        }
        
    }

    /**************  FIN HOME 2018  **************/

    /**************  CABEZOTE SUBSITIOS 2018 **************/
    if (defined('_PLANTILLA') && _PLANTILLA == "Subsitio2018") {

        if (defined("_HOME_NOTICIAS") && _HOME_NOTICIAS != ''){

            $consultar_orden = sprintf("SELECT orden_sub FROM categoria WHERE idcategoria = %s LIMIT 1", _HOME_NOTICIAS);
            $ejecutar_consultar_orden = $db->getAll($consultar_orden);

            foreach ($ejecutar_consultar_orden as $key => $value) {

                $ordenamiento = $value["orden_sub"];
            }

            if ($ordenamiento == "")
            {
                $ordenamiento = "orden";
            }

            $query2 = sprintf("SELECT idpadre, idcategoria, nombre, imagen, entradilla, fecha1, descripcion FROM %s WHERE idpadre = %s AND eliminado = 0 AND activa = 1 ORDER BY %s DESC LIMIT 6", _TBLCATEGORIA, _HOME_NOTICIAS, $ordenamiento);
            $noticia = $db->GetAll($query2);
            
            $noticiasAll = array();
            $array4 = array();
            foreach ($noticia as $key => $imagen) {
                $array4[] = $imagen;
                if(count($array4) == 4){ // grupos de imagenes de 4 items
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }elseif($key+1>=count($noticia)){
                    $noticiasAll[] = $array4;
                    unset($array4);
                    $array4 = null;
                    $array4 = array();
                }
            }

            $smarty->assign('noticias' , $noticiasAll);
            $smarty->assign('noticia'  , $noticia);

            $consulta4  =   sprintf("SELECT nombre FROM categoria where idcategoria = %s", _HOME_NOTICIAS);        
            $resultado4 =   $db->GetAll($consulta4);

            
            foreach ($resultado4 as $key => $value) {



                $smarty->assign('nombre_padre1', $value["nombre"]);
               


            }
        }

        if(defined("_HOME_VIDEOS") && _HOME_VIDEOS != ''){      
            $consulta_video_principalHome  = sprintf("SELECT idcategoria, nombre, descripcion, imagen, fecha1 FROM categoria WHERE idpadre = '%s' AND activa = 1 AND eliminado = 0 order by idcategoria desc LIMIT 3", _HOME_VIDEOS);          
            $resultadoVideo = $db->GetAll($consulta_video_principalHome);
            $videos_home_ppal = array();

            foreach ($resultadoVideo as $key => $value) {
                $array_tipo_video   = explode(".", $value["descripcion"]);
                $tipo_video         = end($array_tipo_video);

                if($value["entradilla"] != ""){
                    $array_id_video   = explode("/", $value["entradilla"]);
                    $id_video         = end($array_id_video);
                }else{
                    $id_video = "none";
                }

                $videos_home_ppal[$key] = array(
                    'idcategoria'   => $value["idcategoria"]
                    ,'archivo'         => html_entity_decode(str_replace('\"', '"',$value["descripcion"]))
                    ,'id_video'     => $id_video
                    ,'nombre'       => $value["nombre"]
                    ,'imagen'       => $value["imagen"]
                    ,'tipo_video'   => $tipo_video
                    ,'descripcion'  => html_entity_decode(str_replace('\"', '"',$value["descripcion"]))
                  );
                // fix add title attribute to youtube embed iframes -> tawdis 2017
                if(strpos($videos_home_ppal[$key]['archivo'],"iframe")){
                    $html = new DOMDocument();
                    $html->loadHtml($videos_home_ppal[$key]['archivo']);
                    $html->getElementsByTagName('iframe')->item(0)->setAttribute('title',$value["nombre"]);
                    $fullHtml = $html->saveHtml();
                    $videos_home_ppal[$key]['archivo'] = substr($fullHtml,strpos($fullHtml, '<iframe'),-15);
                }
            }

            // echo "<pre>"; print_r($videos_home_ppal); echo "</pre>";
            $smarty->assign('videos_home_ppal',$videos_home_ppal);

            if (defined("_HOME_GALERIA") && _HOME_GALERIA != ''){
                $selectImages = sprintf("SELECT idcategoria, nombre, imagen, idpadre FROM %s WHERE activa = 1 AND eliminado = 0 AND idpadre in (%s) ORDER BY fecha2 DESC LIMIT 6", _TBLCATEGORIA, _HOME_GALERIA);
                $resultadoImags = $db->GetAll($selectImages);
                                
                $smarty->assign('galeria_imagen' , $resultadoImags);
            }

            $smarty->assign('home_seccion_videos', $smarty->fetch('tpl_home_videos.html'));
        }
        
            $consulta3  =   sprintf("SELECT * FROM categoria where idcategoria = 483667 LIMIT 1");        
            $resultado3 =   $db->GetAll($consulta3);

            //$smarty->assign('NOCHE_HEROES'    , $resultado3);

            foreach ($resultado3 as $key => $value) {



                $smarty->assign('url_popup_global', $value["descripcion"]);
               


            }



        if(defined("_URL_YOUTUBE_POPUP") && _URL_YOUTUBE_POPUP != ''){

            $consulta4  =   sprintf("SELECT * FROM categoria where idcategoria =  '%s' LIMIT 1",_URL_YOUTUBE_POPUP);        
            $resultado4 =   $db->GetAll($consulta4);

            //$smarty->assign('NOCHE_HEROES'    , $resultado3);

            foreach ($resultado4 as $key => $value) {



                $smarty->assign('_popup_sub', $value["descripcion"]);
               


            }
        }

             

           
       

    }



    $smarty->assign('idcategoria',$categoria);
    
    $smarty->assign('link_banner'           , $r->fields['subsitio_grafico_link']);
    $smarty->assign('ruta_banner'           , $r->fields['subsitio_grafico_ruta']);
    $smarty->assign('descripcion_banner'    , $r->fields['subsitio_grafico_descripcion']);  
    $smarty->assign('type'                  , $r->fields['type']);    

    return $smarty -> fetch('tpl_home.html');
}


function   ingr_dat_streaming_on()
{
    global $db;
    $consulta3  =   sprintf("SELECT * FROM err_stream ORDER BY fecha DESC");        
    $resultado3 =   $db->GetAll($consulta3);

    //$smarty->assign('NOCHE_HEROES'    , $resultado3);
    
    $entro = false;

    foreach ($resultado3 as $key => $value) {
        if( $entro == false)
        {
            if ($value["valor"] == "1")
            {
                $consulta4  =   sprintf("INSERT INTO `ejercito_portal`.`err_stream` (`valor`) VALUES ('0');");        
                $resultado4 =   $db->GetAll($consulta4);
            }
            
            $entro = true;
            

        }
        


        //$smarty->assign('url_popup_global', $value["descripcion"]);
       


    }
}


function get_youtube_id($url){
	if (strpos( $url,"v=") !== false){
		return substr($url, strpos($url, "v=") + 2, 11);
	}elseif(strpos( $url,"embed/") !== false){
		return substr($url, strpos($url, "embed/") + 6, 11);
	}
    return false;
}

function getContentType($data){
    $type = false;
    if(get_youtube_id()===false){
        $type = explode(".", strtolower($data));
        $type = end($type);
    }else{
        $type = "youtube";
    }
    return $type;
}

?>
