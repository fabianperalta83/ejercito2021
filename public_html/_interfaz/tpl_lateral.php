<?php
header("Content-Type: text/html;charset=utf-8");
function tpl_lateral($seccion,$menuInstitucional, $idcategoria)
{
    global $idcategoria;
    $plantilla		=	substr(_PLANTILLA,0,strlen(_PLANTILLA)-4);
    if(!preg_match('/^[a-zA-Z]+[0-9]+$/',$plantilla))
    {
        return tpl_lateral_nuevo($seccion,$menuInstitucional,$idcategoria);
    }
    else
    {
        return tpl_lateral_default($seccion,$menuInstitucional,$idcategoria);
    }
}

/**
 * tpl_lateral_default()
 *
 * @param $rutaRecursos
 * @param $seccion
 * @param $menuInstitucional
 * @param $idcategoria
 * @return
 **/

function tpl_lateral_default($seccion, $menuInstitucional, $idcategoria)
{

    global $db;
    global $sroot;

    $smarty = new Smarty_Plantilla;
    setlocale (LC_TIME,"spanish");
    $long_date = str_replace("De","de",ucwords(strftime("%A %d de %B de %Y")));
    /**
	 * Miramos si existe un usuario en el momento
	 */
    if (isset($_SESSION['info_usuario']) and $_SESSION['info_usuario']["activo"] == 1) {
        $smarty->assign('hayUsuario', TRUE);
        $smarty->assign('infoUsuario', $_SESSION['info_usuario']);
        $smarty->assign('modoEdicion', $_SESSION['modo_edicion'] && $_SESSION['modo_edicion_aprovado']);
    }

    $smarty->assign('menuInstitucional'	,$menuInstitucional);

    $smarty->assign('fecha'				,$long_date);
    $smarty->assign('seccion'			,$seccion);
    $smarty->assign('idcategoria'		,$idcategoria);
    $smarty->assign('sroot'				,$sroot);
    $encuesta = null;

    if($idcategoria == 1) $encuesta = FuncionesInterfaz::MostrarEncuesta();

    $smarty->assign('encuesta'		,$encuesta);


    /**
	 *Home tabla
	 **/
    if (defined("_DESTACADOS_LATERAL")) {
        $catsTabla = explode(',', _DESTACADOS_LATERAL);
        $i = 0;
        foreach ($catsTabla as $categoria){
            $categoria1 = trim($categoria);
            $query= $db->prepare("SELECT * FROM categoria WHERE idcategoria= ?");
            $result = $db->Execute($query, array($categoria1)) /* or errorQuery(__LINE__, __FILE__) */;
            $resultado2[$i] = $result->fields;

            $orden_tmp = Funciones::BusquedaRecursiva($categoria, "orden_sub");
            $tmp = Funciones::BusquedaRecursiva($categoria, "asc_sub");

            switch ($tmp) {
                case 1:	$orden_tmp .= " desc";break;
                case 2:	$orden_tmp .= " asc";break;
            }

            $query=$db->prepare("SELECT * FROM categoria WHERE activa != ? AND eliminado != ? AND idpadre= ? order by ?");
            $result2 = $db->Execute($query, array(0, 1, trim($categoria),  $orden_tmp)) /* or errorQuery(__LINE__, __FILE__) */;

            for (;!$result2->EOF;$result2->MoveNext()) {
                $dato = $result2->fields;
                $resultado2[$i]['hijos'][]=$dato;
            }
            $i++;
        }


        $smarty->assign('tabla_home',$resultado2);

    }

    /*******************************
	 * SECCIÓN NOS ESCRIBEN
	 ********************************/

    /**
	 * INFORMACIÓN NOS ESCRIBEN
	 */
    if (defined("_NOS_ESCRIBEN") and _NOS_ESCRIBEN != '')
    {
        $query = $db->prepare("SELECT idcategoria FROM "._TBLCATEGORIA." WHERE activa != ? AND idcategoria = ?  ORDER BY fecha2 DESC");
        $NOS_ESCRIBEN = _NOS_ESCRIBEN;
        $result_papa = $db->Execute($query, array(0, $NOS_ESCRIBEN)) /* or errorQuery(__LINE__, __FILE__) */;

        $cartas = array();

        if ($result_papa->NumRows() > 0) {

            /**
			 * hijos de destacado
			 **/

            $cartas = array();
            $query = sprintf("SELECT idcategoria, entradilla, autor FROM %s WHERE activa != 0 AND idpadre = %s and fecha2 != '%s' ORDER BY fecha2 desc" , _TBLCATEGORIA , _NOS_ESCRIBEN, '0000-00-00 00:00:00');
            $result = $db->SelectLimit($query, 1) /* or errorQuery(__LINE__, __FILE__) */;

            if ($result->NumRows() > 0) {
                while(!$result->EOF) {
                    $data = $result->fields;
                    array_push($cartas, $data);
                    $result->MoveNext();
                }

                $smarty->assign('idcategoriaEscriben', $result_papa->fields['idcategoria']);

            }
            $smarty->assign('carta', $cartas);
            $smarty->assign('secEscriben', TRUE);
        }
    }

    /**
	 * Resumen Subportales
	 */
    $query_resumen = $db->prepare("SELECT * FROM "._TBLCATEGORIA." WHERE activa != 0 AND idpadre IN (SELECT idcategoria FROM "._TBLCATEGORIA." WHERE nombre = 'Noticias') AND fecha2 >= ? LIMIT 3 ");
    $result_resumen = $db->Execute($query_resumen, array(date('Y-m-d h:i:s'))) /* or errorQuery(__LINE__, __FILE__) */;

    $resumen_subportales = array();
    while(!$result_resumen->EOF)
    {
        //Buscamos el subsitio al cual pertenece la categoria
        $subportal = Funciones::BuscarRoot($result_resumen->fields['idcategoria']);

        //Traemos el nombre del subsitio al cual pertenece
        $query_root = $db->prepare("SELECT nombre FROM "._TBLCATEGORIA." WHERE activa != ? AND idcategoria = ? ORDER BY fecha1");
        $result_root = $db->Execute($query_root, array(0, $subportal)) /* or errorQuery(__LINE__, __FILE__) */;

        $auxResumen = array();
        $auxResumen['idcategoria'] = $result_resumen->fields['idcategoria'];
        $auxResumen['nombre'] = $result_resumen->fields['nombre'];
        $auxResumen['fecha'] = $result_resumen->fields['fecha1'];
        $auxResumen['root'] = $result_root->fields['nombre'];
        array_push($resumen_subportales, $auxResumen);

        $result_resumen->MoveNext();
    }

    $ultimaModificacion = ultimaModificacion();  /** @see Ver en la parte final de este archivo para encontrar la funcion */

    $smarty->assign('resumen_subportales',$resumen_subportales);
    $smarty->assign('ultimaActualizacion',$ultimaModificacion);
    return $smarty->fetch('tpl_lateral.html');

}

/**
 * ultimaModificacion
 * @date  2008 -  10  - 27
 * @return cadena  del lapso de tiempo que paso desde la ultima modificacion de la informacion del portal
*  @author: clopez (  clopez@micrositios.net)
*/

function ultimaModificacion()
{
    global $db;
    $sql="	SELECT MAX(fecha3) as max
			       FROM categoria where fecha3 < now() ";
    $rs=$db->getone($sql) or errorQuery(__LINE__,__FILE__);

    // Convertimos  la fecha-tiempo devuelto de la base de datos a timestamp de UNIX para hacer
    // la resta con el timestamp actual y saber hace cuanto se actualizo la pagina en segundos
    $ultimaActualizacion = strtotime($rs);
    $segundos = 	time() - $ultimaActualizacion;

    //Convertimos los segundos a horas / minutos / segundos
    $actualizadoHace = array("dia"=>'',"hora"=>'',"minuto"=>'',"segundo"=>'');
    $actualizadoHace['segundo'] = $segundos;
    /*
	foreach (array_reverse($actualizadoHace) as $key => $elemTiempo)
	{
	  $actualizadoHace['minuto']  = intval($actualizadoHace['segundo'] /60);
	  $actualizadoHace['segundo'] = $actualizadoHace['segundo'] -($actualizadoHace['minuto'] * 60);
	}
	*/
    $actualizadoHace['segundo'] = $segundos;

    $actualizadoHace['minuto']  = intval($actualizadoHace['segundo'] /60);
    $actualizadoHace['segundo'] = $actualizadoHace['segundo'] -($actualizadoHace['minuto'] * 60);

    $actualizadoHace['hora']    = intval($actualizadoHace['minuto'] /60);
    $actualizadoHace['minuto']  = $actualizadoHace['minuto'] - ($actualizadoHace['hora'] * 60);

    $actualizadoHace['dia']    = intval($actualizadoHace['hora'] /24);
    $actualizadoHace['hora']   = $actualizadoHace['hora'] - ($actualizadoHace['dia'] * 24);
    // creamos una cadena compuesta de las horas / minutos / para mostrar al usuario ()los segundos los obviamos
    $cadena = "";
    unset ($actualizadoHace['segundo']);
    foreach ($actualizadoHace as $elemTiempo => $valor)
    {
        $plural = ($valor <= 1)?'':'s';
        $cadena = ($valor == 0)?$cadena:$cadena.' '.$valor.' '.$elemTiempo.$plural;
    }
    return $cadena;
}


function tpl_lateral_2010($seccion, $menuInstitucional, $idcategoria) 
{

    global $db;
    global $sroot;

    $smarty = new Smarty_Plantilla;

    /**
	 * Miramos si existe un usuario en el momento
	 */
    if (isset($_SESSION['info_usuario']) and $_SESSION['info_usuario']["activo"] == 1) {
        $smarty->assign('hayUsuario', TRUE);
        $smarty->assign('infoUsuario', $_SESSION['info_usuario']);
        $smarty->assign('modoEdicion', $_SESSION['modo_edicion'] && $_SESSION['modo_edicion_aprovado']);
    }

    $smarty->assign('menuInstitucional'	,$menuInstitucional);
    $smarty->assign('seccion'			,$seccion);
    $smarty->assign('idcategoria'		,$idcategoria);
    $smarty->assign('sroot'				,$sroot);
    $encuesta = null;

    if($idcategoria == 1) $encuesta = FuncionesInterfaz::MostrarEncuesta();

    $smarty->assign('encuesta'		,$encuesta);

    //Traemos la nube de etiquetas si existe la constante de subsitio y si es S
    if(defined('_NUBETAGS'))
    {
        if(_NUBETAGS == 'S')
        {
            $nube = FuncionesInterfaz::nubeEtiquetas();

            $smarty->assign('nube',$nube);

        }
    }
    //valido si se mostraran los eventos
    if(defined('__EVENTOS') and __EVENTOS !='')
    {
        $dato				=	new ejercito();
        //realizo el proceso para mostrar los ventos

        $nombre_padre_evento	=	$dato->NombrePadre(__EVENTOS);
        $eventos			=	$dato->separaDatos(__EVENTOS,'1');
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

    $smarty2 = new Smarty_Plantilla();

    $smarty->assign('destacados_navegacion', @$smarty2->fetch('tpl_static/tpl_destacados_navegacion.html'));
    return $smarty->fetch('tpl_cabezote.html');
}

function tpl_lateral_nuevo($seccion, $menuInstitucional, $idcategoria) 
{

    global $db;
    global $sroot;
    
    $smarty = new Smarty_Plantilla;

    /**
	 * Miramos si existe un usuario en el momento
	 */
    if (isset($_SESSION['info_usuario']) and $_SESSION['info_usuario']["activo"] == 1) {
        $smarty->assign('hayUsuario', TRUE);
        $smarty->assign('infoUsuario', $_SESSION['info_usuario']);
        $smarty->assign('modoEdicion', $_SESSION['modo_edicion'] && $_SESSION['modo_edicion_aprovado']);
    }

    $smarty->assign('menuInstitucional'	,$menuInstitucional);
    $smarty->assign('seccion'			,$seccion);
    $smarty->assign('idcategoria'		,$idcategoria);
    $smarty->assign('sroot'				,$sroot);
    $encuesta = null;

    if($idcategoria == 1) $encuesta = FuncionesInterfaz::MostrarEncuesta();

    $smarty->assign('encuesta'		,$encuesta);

    //Traemos la nube de etiquetas si existe la constante de subsitio y si es S
    if(defined('_NUBETAGS'))
    {
        if(_NUBETAGS == 'S')
        {
            $nube = FuncionesInterfaz::nubeEtiquetas();

            $smarty->assign('nube',$nube);

        }
    }
    //valido si se mostraran los eventos
    if(defined('__EVENTOS') and __EVENTOS !='')
    {
        $dato				=	new ejercito();
        //realizo el proceso para mostrar los ventos

        $nombre_padre_evento	=	$dato->NombrePadre(__EVENTOS);
        $eventos			=	$dato->separaDatos(__EVENTOS,'1');
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

    $smarty2 = new Smarty_Plantilla();

    $smarty->assign('destacados_navegacion', @$smarty2->fetch('tpl_static/tpl_destacados_navegacion.html'));
    
    //comprueba que no sea pagina principal y genera el arreglo para el submenu de 2 nivel
    if ($infoCategoria["iddisplay"] != 1 && $idcategoria != _SINSTITUCIONAL && $idcategoria!= _SUTILIDADES && $idcategoria != _SINICIO)
    {
        $smarty->assign('esTemplateHome'  ,FALSE);
        
        $resulmenu=SegundoNivel($db,$idcategoria);
        $smarty->assign('menuSegNivel',$resulmenu);

        $queryhijo = $db->prepare("SELECT idpadre,iddisplay_sub FROM "._TBLCATEGORIA." WHERE idcategoria = ? and activa != ?");
        $resulthijos = $db->Execute($queryhijo, array($idcategoria, 0));
        
        

        $smarty->assign('padre',$resulthijos->fields['idpadre']);    
        $smarty->assign('sub_display', $resulthijos->fields['iddisplay_sub']);           
    }
    
    return $smarty->fetch('tpl_lateral.html');
}

function SegundoNivel($db, $id)
{
    $query = $db->prepare("SELECT idpadre,iddisplay_sub FROM "._TBLCATEGORIA." WHERE idcategoria = ? and activa != ?");
    $result = $db->Execute($query, array($id, 0)) /* or errorQuery(__LINE__, __FILE__) */;

    if($result->fields['idpadre']==_SINSTITUCIONAL || $result->fields['idpadre'] ==_SINICIO)
    {
        $orden_tmp = Funciones::BusquedaRecursiva(Funciones::BuscarPadre($id),"orden_sub");
        $tmp = Funciones::BusquedaRecursiva($id,"asc_sub");

        switch ($tmp) 
        {
            case 1: $asc_tmp = "desc"; break;
            case 2: $asc_tmp = "asc"; break;
        }
        
        $queryhermanos = $db->prepare("SELECT convert(cast(convert(nombre using utf8) as binary) using latin1) AS nombre, idcategoria FROM "._TBLCATEGORIA." WHERE idpadre = ? and activa != ? ORDER BY ".$orden_tmp." ".$asc_tmp."");
        $resulth = $db->Execute($queryhermanos, array($id, 0)) /* or errorQuery(__LINE__, __FILE__) */;
        $MenuSeg= $resulth?$resulth->GetRows():array();

    }else{
        $MenuSeg= SegundoNivel($db,$result->fields['idpadre'],_TBLCATEGORIA, $id);
    }
 
    return $MenuSeg;   
}


?>
