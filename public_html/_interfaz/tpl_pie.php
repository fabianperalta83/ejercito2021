<?php
header("Content-Type: text/html;charset=utf-8");
/***************************/
//Template: Pie de Página
//Archivo Destino: tpl_pie.html
function tpl_pie($idcategoria){ 
	// escogo el template que necesito
	global $idcategoria;

	$plantilla		=	substr(_PLANTILLA,0,strlen(_PLANTILLA)-4);
	if(!preg_match('/^[a-zA-Z]+[0-9]+$/',$plantilla))
	{
		return tpl_pie_nuevo($idcategoria);
	}
	else
	{
		return tpl_pie_default($idcategoria);break;
	}
    
    //Contador
	$v = _CONTADOR;
	$visitas=number_format(($v + 1),0,'','.'); 
	$smarty->assign('visitas',$visitas);
}

function tpl_pie_default($idcategoria)
{
	global $detalle;
	global $db;

	$sql="	SELECT DATE_FORMAT(MAX(fecha3),'%Y-%m-%e %r') as max
			FROM categoria ";
	$rs=$db->getone($sql) or errorQuery(__LINE__,__FILE__);

	$inf = (isset($_GET['inf'])  && $_GET['inf'] > 0)?$_GET['inf']: 0;
	$inf = (isset($_POST['inf']) && $_POST['inf'] > 0)?$_POST['inf']: $inf;

	srand((double)microtime()*1000000);
	$ts = md5(rand(0,9999999));


	//Contador
	$v = _CONTADOR;
	$visitas=number_format(($v + 1),0,'','.'); 
	$smarty->assign('visitas',$visitas);

    $smarty = new Smarty_Plantilla;
	$smarty->assign('emailCredito', (_EMAILCREDITOS)?_EMAILCREDITOS:_EMAIL);
	$smarty->assign('fecha_ultima_actualizacion',$rs);
    return $smarty->fetch('tpl_pie.html');
}

function tpl_pie_nuevo($idcategoria)
{ 
	global $detalle;
	global $db;
	global $trazaCategoria;

    $smarty = new Smarty_Plantilla;
    $smarty2 = new Smarty_Plantilla;
	
	//Contador
	$v = _CONTADOR;
	$visitas=number_format(($v + 1),0,'','.'); 
	$smarty->assign('visitas',$visitas);

	$smarty->assign('emailCredito', (_EMAILCREDITOS)?_EMAILCREDITOS:_EMAIL);
	$smarty2->assign('idcategoria'		,$idcategoria);
	$smarty->assign('idcategoria'		,$idcategoria);

	$consultaJ	= sprintf("SELECT idcategoria, descripcion, nombre, imagen FROM categoria WHERE idpadre = '%s' AND activa = 1 AND eliminado = 0",_DESTACADOS_PIE);		  
	$resultadoJ	= $db->GetAll($consultaJ);

	$smarty->assign('destacados_footer'	,$resultadoJ);

	if ($trazaCategoria[$idcategoria]["iddisplay"] == 1){
	    $smarty->assign('esTemplateHome' ,1);
	}

	//	Si es home se pone flash
	if (Funciones::BuscarRoot($idcategoria) == $idcategoria) {
		$smarty->assign('esHome', TRUE);
	}

	if (defined('_PLANTILLA') && _PLANTILLA == 'DEFAULT2018') {
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
    }


	/**************    CABEZOTE SUBSITIOS 2017 - Plantilla Unica **************/
	if(defined('_HOME_ENTIDADES') && _HOME_ENTIDADES != ""){ 
        $select_enlaces = sprintf("SELECT idcategoria, nombre FROM categoria WHERE idpadre = %s AND activa = 1 AND eliminado = 0 LIMIT 16", _HOME_ENTIDADES);
        $result_enlaces = $db->GetAll($select_enlaces);
        $smarty->assign('enlaces', $result_enlaces);
    }
	/************** FIN CABEZOTE SUBSITIOS 2017 - Plantilla Unica **************/

    return $smarty->fetch('tpl_pie.html');
}
?>
